<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountRequest;
use App\Http\Requests\SearchRequest;
use App\Models\Category;
use App\Models\Currency;
use App\Models\Order;
use App\Models\Product;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index()
    {
        $randomProducts = Product::with('category')->with('images')->orderBy(DB::raw('RAND()'))->take(8)->get();
        return view('main.index', compact(['randomProducts']));
    }

    public function search(SearchRequest $request)
    {
        $categoryId = $request->cat;
        $search = $request->search;

        if (strlen($search) >= 1) {
            if ($categoryId == 0) {
                $products = Product::where('name', 'LIKE', '%' . $search . '%')->with('category')->with('images')->paginate(10);
            } else {
                $products = Product::where('name', 'LIKE', '%' . $search . '%')->where('category_id', $categoryId)->with('category')->with('images')->paginate(10);
            }

            return view('main.search', compact('products'));
        }

        return redirect()->route('index');
    }


    public function category(Request $request, $catAlias)
    {
        $category = Category::where('alias', $catAlias)->first();

        $paginate = 10;

        $products = Product::where('category_id', $category->id)->with('category')->paginate($paginate);

        if (isset($request->orderBy)) {
            if ($request->orderBy == 'name-a-z') {
                $products = Product::where('category_id', $category->id)->with('category')->orderBy('name')->paginate($paginate);
            } else if ($request->orderBy == 'name-z-a') {
                $products = Product::where('category_id', $category->id)->with('category')->orderByDesc('name')->paginate($paginate);
            } else if ($request->orderBy == 'price-min-high') {
                $products = Product::where('category_id', $category->id)->with('category')->orderBy('price')->paginate($paginate);
            } else if ($request->orderBy == 'price-high-min') {
                $products = Product::where('category_id', $category->id)->with('category')->orderByDesc('price')->paginate($paginate);
            }
        }

        if ($request->ajax()) {
            return view('ajax.order-by', compact('products'))->render();
        }

        return view('main.products', compact(['category', 'products']));
    }


    public function newProducts(Request $request)
    {
        $paginate = 10;

        $products = Product::where('count', '>', 0)->where('created_at', '>', Carbon::now()->subDays(10))->with('category')->with('images')->orderByDesc('created_at')->paginate($paginate);

        if (isset($request->orderBy)) {
            if ($request->orderBy == 'name-a-z') {
                $products = Product::where('count', '>', 0)->where('created_at', '>', Carbon::now()->subDays(10))->with('category')->with('images')->orderBy('name')->paginate($paginate);
            } else if ($request->orderBy == 'name-z-a') {
                $products = Product::where('count', '>', 0)->where('created_at', '>', Carbon::now()->subDays(10))->with('category')->with('images')->orderByDesc('name')->paginate($paginate);
            } else if ($request->orderBy == 'price-min-high') {
                $products = Product::where('count', '>', 0)->where('created_at', '>', Carbon::now()->subDays(10))->with('category')->with('images')->orderBy('price')->paginate($paginate);
            } else if ($request->orderBy == 'price-high-min') {
                $products = Product::where('count', '>', 0)->where('created_at', '>', Carbon::now()->subDays(10))->with('category')->with('images')->orderByDesc('price')->paginate($paginate);
            }
        }

        if ($request->ajax()) {
            return view('ajax.order-by', compact('products'))->render();
        }

        return view('main.new-products', compact('products'));
    }


    public function product($catAlias, $productAlias)
    {

        $product = Product::where('alias', $productAlias)->first();
        $productRec = Product::where('category_id', $product->category_id)->where('id', '!=', $product->id)->get()->take(6);
        return view('main.show-product', compact(['product', 'productRec']));
    }

    public function account()
    {
        $user = Auth::user();

        $orders = Order::where('status', 1)->where('user_id', $user->id)->get();
        return view('auth.account', compact(['user', 'orders']));
    }

    public function change(AccountRequest $request)
    {
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        return redirect()->route('account');
    }

}
