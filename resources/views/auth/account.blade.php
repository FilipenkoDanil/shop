@extends('layouts.main')

@section('title', 'Аккаунт')

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
                    <li class="active"><a href="#">@lang('main.my_account')</a></li>
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
                <!-- entry-header-area start -->
                <div class="entry-header-area">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="entry-header">
                                <h2 class="entry-title">@lang('main.my_account')</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- entry-header-area end -->
                <!-- Start checkout-area -->
                <div class="checkout-area">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Accordion start -->
                            <div class="panel-group" id="accordion">
                                <!-- Start Order History And Details -->
                                <div class="panel panel_default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="accordion-trigger collapsed" data-toggle="collapse" data-parent="#accordion" href="#checkout-confirm">Прошлые заказы <i class="fa fa-caret-down"></i> </a>
                                        </h4>
                                    </div>
                                    <div id="checkout-confirm" class="collapse">
                                        <div class="panel-body">
                                            <!-- Start Table -->
                                            <div class="table-responsive">
                                                @forelse($orders as $order)
                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <td class="text-center">@lang('cart.image')</td>
                                                            <td class="text-left">@lang('cart.title')</td>
                                                            <td class="text-left">@lang('cart.manufacturer')</td>
                                                            <td class="text-left">@lang('cart.count')</td>
                                                            <td class="text-right">@lang('cart.unit')</td>
                                                            <td class="text-right">@lang('main.total')</td>
                                                        </tr>
                                                            @foreach($order->products as $product)
                                                            <tr>
                                                                <td class="text-center">
                                                                    <a href="#"><img class="img-thumbnail" style="width: 86px" src="@if(count($product->images) > 0) {{Storage::url($product->images[0]['img'])}} @else /img/product/small/no_image.png @endif " alt="#" /></a>
                                                                </td>
                                                                <td class="text-left">
                                                                    <a href="#">{{$product->name}}</a>
                                                                </td>
                                                                <td class="text-left">{{$product->manufacturer}}</td>
                                                                <td class="text-center">
                                                                    {{$product->pivot->count}}
                                                                </td>
                                                                <td class="text-right">{{$order->currency->symbol}} {{$product->price}}</td>
                                                                <td class="text-right">{{$order->currency->symbol}} {{$product->getPriceForCount()}}</td>
                                                            </tr>
                                                            @endforeach
                                                        <tr>
                                                            <td class="text-right" colspan="5">
                                                                <strong>@lang('cart.sub_total'):</strong>
                                                            </td>
                                                            <td class="text-right">{{$order->currency->symbol}} {{$order->sum}}</td>
                                                        </tr>
                                                    </table>
                                                @empty
                                                    <h5 class="entry-title text-center">Вы ещё ничего не заказали!</h5>
                                                @endforelse
                                            </div>
                                            <!-- End Table -->
                                        </div>
                                    </div>
                                </div>
                                <!-- End Order History And Details -->
                                <!-- Start My Address -->
                                <div class="panel panel_default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="accordion-trigger collapsed" data-toggle="collapse" data-parent="#accordion" href="#shipping-address">Контактная информация <i class="fa fa-caret-down"></i> </a>
                                        </h4>
                                    </div>
                                    <div id="shipping-address" class="collapse">
                                        <div class="panel-body">
                                            <div class="form-horizontal">
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label"><sup>*</sup>ФИО</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" placeholder="First Name" value="{{$user->name}}" name="name" readonly />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label"><sup>*</sup>Email</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" placeholder="Last Name" value="{{$user->email}}" name="email" readonly />
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End My Address -->
                            </div>
                            <!-- Accordion end -->
                        </div>
                    </div>
                </div>
                <!-- End Shopping-Cart -->

                <!-- My-Account-Area start -->
                <div class="my-account-area">
                    <div class="row">
                        <div class="col-md-6">

                        </div>
                    </div>
                </div>
                <!-- My-Account-Area end -->
            </div>
        </div>
    </div>

</section>
<!-- END PAGE-CONTENT -->
@endsection
