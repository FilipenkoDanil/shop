<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    protected $fillable = ['currency_id', 'sum'];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot(['count', 'price'])->withTimestamps();
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function getFullPrice()
    {
        $sum = 0;
        foreach ($this->products as $product){
           $sum += $product->price * $product->countInOrder;
        }
        return $sum;
    }

    public function saveOrder($name, $city, $phone, $address)
    {
        $this->name = $name;
        $this->city = $city;
        $this->phone = $phone;
        $this->address = $address;

        $this->status = 1;

        $this->sum = $this->getFullPrice();

        if(Auth::check()){
            $this->user_id = Auth::id();
        }

        $products = $this->products;

        $this->save();

        foreach ($products as $productInOrder){
            $this->products()->attach($productInOrder, [
                'count' => $productInOrder->countInOrder,
                'price' => $productInOrder->price,
            ]);
        }


        session()->forget('order');
        return true;
    }
}
