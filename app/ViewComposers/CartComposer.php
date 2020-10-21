<?php


namespace App\ViewComposers;


use Illuminate\View\View;

class CartComposer
{
    public function compose(View $view)
    {
        $cart = session('order');
        $view->with('cart', $cart);
    }
}
