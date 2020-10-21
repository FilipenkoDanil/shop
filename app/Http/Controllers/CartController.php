<?php

namespace App\Http\Controllers;

use App\Classes\Cart;
use App\Http\Requests\OrderConfirmRequest;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function cart()
    {
        $order = (new Cart())->getOrder();

        return view('cart.cart', compact(['order']));
    }

    public function cartPlace()
    {
        $cart = new Cart();
        $order = $cart->getOrder();
        if(!$cart->countAvailable()){
            session()->flash('warning', 'Товар не доступен для заказа в полном объеме!' );
            return redirect()->route('cart');
        }

        return view('cart.order', compact('order'));
    }

    public function cartAdd(Product $product)
    {
        $result = (new Cart(true))->addProduct($product);

        if($result){
            session()->flash('success', 'Добавлен товар ' . $product->name );
        } else {
            session()->flash('warning', 'Товар ' . $product->name . ' в большем количетсве не доступен для заказа' );
        }

        return redirect()->route('cart');
    }

    public function cartRemove(Product $product)
    {
        (new Cart())->removeProduct($product);
        session()->flash('warning', 'Удален товар ' . $product->name );

        return redirect()->route('cart');
    }

    public function cartConfirm(OrderConfirmRequest $request)
    {
        $email = Auth::check() ? Auth::user()->email : $request->email;

        if((new Cart())->saveOrder($request->name, $request->city, $request->phone, $request->address, $email)){
            session()->flash('success', 'Ваш заказ принят в обработку!');
        } else{
            session()->flash('warning', 'Товар не доступен для заказа в полном объеме.');
        }

        return redirect()->route('index');
    }
}
