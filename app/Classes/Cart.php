<?php


namespace App\Classes;


use App\Mail\OrderCreated;
use App\Models\Order;
use App\Models\Product;
use App\Services\CurrencyConversion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class Cart
{
    protected $order;

    /**
     * Cart constructor.
     */
    public function __construct($createOrder = false)
    {
        $order = session('order');

        if (is_null($order) && $createOrder) {
            $data = [];
            if (Auth::check()) {
                $data['user_id'] = Auth::id();
            }
            $data['currency_id'] = CurrencyConversion::getCurrentCurrencyFromSession()->id;
            //dd($data);

            $this->order = new Order($data);
            session(['order' => $this->order]);
        } else {
            $this->order = $order;
        }

    }

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return $this->order;
    }

    public function saveOrder($name, $city, $phone, $address, $email)
    {
        if (!$this->countAvailable(true)) {
            return false;
        }

        $this->order->saveOrder($name, $city, $phone, $address);
        Mail::to($email)->send(new OrderCreated($name, $this));

        return true;
    }


    public function addProduct(Product $product)
    {
        if ($this->order->products->contains($product)) {
            $pivotRow = $this->order->products->where('id', $product->id)->first();
            if ($pivotRow->countInOrder >= $product->count) {
                return false;
            }

            if($this->order->currency_id != CurrencyConversion::getCurrentCurrencyFromSession()->id){
                $this->order->currency_id = CurrencyConversion::getCurrentCurrencyFromSession()->id;
            }

            $pivotRow->countInOrder++;
        } else {
            if ($product->count == 0) {
                return false;
            }
            $product->countInOrder = 1;
            $this->order->products->push($product);
        }

        return true;
    }


    public function removeProduct(Product $product)
    {
        if ($this->order->products->contains($product )) {

            if($this->order->currency_id != CurrencyConversion::getCurrentCurrencyFromSession()->id){
                $this->order->currency_id = CurrencyConversion::getCurrentCurrencyFromSession()->id;
            }

            $pivotRow = $this->order->products->where('id', $product->id)->first();
            if ($pivotRow->countInOrder < 2) {
                $this->order->products->pop($product);
            } else {
                $pivotRow->countInOrder--;
            }
        }


    }


    public function countAvailable($updateCount = false)
    {
        $products = collect([]);
        foreach ($this->order->products as $orderProduct) {
            $product = Product::find($orderProduct->id);
            if ($orderProduct->countInOrder > $orderProduct->count) {
                return false;
            }
            if ($updateCount) {
                $orderProduct->count -= $orderProduct->countInOrder;
                $product->push($product);
            }
        }

        if ($updateCount) {
            $products->map->save();
        }
        return true;
    }
}
