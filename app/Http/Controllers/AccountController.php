<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountRequest;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductUser;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function account()
    {
        $user = Auth::user();
        $wishes = $user->products->map->product;
        $orders = Order::where('status', 1)->where('user_id', $user->id)->get();

        return view('auth.account', compact(['user', 'orders', 'wishes']));
    }

    public function change(AccountRequest $request)
    {
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        return redirect()->route('account');
    }

    public function addWish(Product $product)
    {
        $wish = new ProductUser();

        if (!Auth::user()->products->map->product->contains($product)) {
            $wish->product_id = $product->id;
            $wish->user_id = Auth::id();
            $wish->save();
        }

        return redirect()->route('account');
    }

    public function removeWish($product)
    {
        $wishProduct = ProductUser::where('product_id', $product)->where('user_id', Auth::id())->first();
        $wishProduct->delete();

        return redirect()->route('account');
    }
}
