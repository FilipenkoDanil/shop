@extends('layouts.main')

@section('title', 'Корзина')

@section('cart')
    @include('templates.cart')
@endsection

@section('content')
<!-- START PAGE-CONTENT -->
@include('templates.mobile-categories')
<section class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="page-menu">
                    <li><a href="{{route('index')}}">@lang('main.home')</a></li>
                    <li class="active"><a href="#">@lang('main.cart')</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <!-- CATEGORY-MENU-LIST START -->
               @include('templates.categories')
                <!-- END CATEGORY-MENU-LIST -->
                @include('templates.bestseller')
            </div>
            <div class="col-md-9">
                @if(session()->has('success'))
                    <div class="alert alert-success text-center" role="alert">
                        {{session()->get('success')}}
                    </div>
                @elseif(session()->has('warning'))
                    <div class="alert alert-warning text-center" role="alert">
                        {{session()->get('warning')}}
                    </div>
                 @endif
                <!-- START PRODUCT-BANNER -->
                <div class="product-banner">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="banner">
                                <a href="#"><img src="img/banner/12.jpg" alt="Product Banner"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END PRODUCT-BANNER -->
                <!-- Start Shopping-Cart -->
                <div class="shopping-cart">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="cart-title">
                                <h2 class="entry-title">@lang('cart.cart')</h2>
                            </div>
                            <!-- Start Table -->
                            <div class="table-ajax">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <td class="text-center">@lang('cart.image')</td>
                                            <td class="text-left">@lang('cart.title')</td>
                                            <td class="text-left">@lang('cart.manufacturer')</td>
                                            <td class="text-left">@lang('cart.count')</td>
                                            <td class="text-right">@lang('cart.unit')</td>
                                            <td class="text-right">@lang('main.total')</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($order->products as $product)
                                            <tr>
                                                <td class="text-center">
                                                    @if(count($product->images) > 0)
                                                        <a href="{{route('product', [$product->category->alias, $product->alias])}}"><img class="img-thumbnail" style="max-width: 80px; max-height: 100px" src="{{Storage::url($product->images[0]['img'])}}" alt="#" /></a>
                                                    @else
                                                        <a href="{{route('product', [$product->category->alias, $product->alias])}}"><img class="img-thumbnail" style="max-width: 80px; max-height: 100px" src="/img/product/small/no_image.png" alt="#" /></a>
                                                    @endif
                                                </td>
                                                <td class="text-left">
                                                    <a href="{{route('product', [$product->category->alias, $product->alias])}}">{{$product->name}}</a>
                                                </td>
                                                <td class="text-left">{{$product->manufacturer}}</td>
                                                <td class="text-left">
                                                    <div class="btn-block cart-put form-inline change">

                                                        <div class="input-group-btn cart-buttons">
                                                            <span class="badge">{{$product->countInOrder}}</span>
                                                            <form action="{{route('cart-remove', $product)}}" method="POST">
                                                                <button class="btn btn-danger" data-toggle="tooltip" title="@lang('cart.delete')">
                                                                    <i class="fa fa-minus"></i>
                                                                </button>
                                                                @csrf
                                                            </form>
                                                            <form class="form-inline" action="{{route('cart-add', $product)}}" method="POST">
                                                                <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="@lang('cart.add')">
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                                @csrf
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-right">{{ $currencySymbol }} {{$product->price}}</td>
                                                <td class="text-right">{{ $currencySymbol }} {{$product->price * $product->countInOrder}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- End Table -->

                                <div class="row">
                                    <div class="col-sm-4 col-sm-offset-8">
                                        <table class="table table-bordered">
                                            <tbody>
                                            <tr>
                                                <td class="text-right">
                                                    <strong>@lang('main.total'):</strong>
                                                </td>
                                                <td class="text-right">{{ $currencySymbol }}   {{$order->getFullPrice()}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="shopping-checkout">
                                <a href="{{route('index')}}" class="btn btn-default pull-left">@lang('cart.cont_shopping')</a>
                                <a href="{{route('cart-place')}}" class="btn btn-primary pull-right">@lang('main.check_out')</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Shopping-Cart -->
            </div>
        </div>
    </div>
</section>
@endsection
