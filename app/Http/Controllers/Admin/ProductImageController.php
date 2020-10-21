<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productImages = ProductImage::paginate(20);

        return view('auth.product-image.index', compact('productImages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::get();
        return view('auth.product-image.form', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $path = $request->file('img')->store('product-images');
        $params = $request->all();
        $params['img'] = $path;
        ProductImage::create($params);
        return redirect()->route('product-images.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\ProductImage $productImage
     * @return \Illuminate\Http\Response
     */
    public function show(ProductImage $productImage)
    {
        return view('auth.product-image.show', compact('productImage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\ProductImage $productImage
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductImage $productImage)
    {
        $products = Product::get();
        return view('auth.product-image.form', compact(['productImage', 'products']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ProductImage $productImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductImage $productImage)
    {
        if ($request->has('img')) {
            Storage::delete($productImage->img);
            $path = $request->file('img')->store('product-images');
            $params = $request->all();
            $params['img'] = $path;
            $productImage->update($params);

            return redirect()->route('product-images.index');
        }

        $params = $request->all();
        $params['img'] = $productImage->img;
        $productImage->update($params);
        return redirect()->route('product-images.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\ProductImage $productImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductImage $productImage)
    {
        Storage::delete($productImage->img);
        $productImage->delete();
        return redirect()->route('product-images.index');
    }
}
