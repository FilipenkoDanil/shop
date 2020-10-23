@extends('layouts.main')

@section('title', 'Оформление заказа')

@section('content')
<!-- START PAGE-CONTENT -->
@include('templates.mobile-categories')
<section class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="page-menu">
                    <li><a href="{{route('index')}}">@lang('main.home')</a></li>
                    <li><a href="{{route('cart')}}">@lang('cart.cart')</a></li>
                    <li class="active"><a href="{{route('cart-place')}}">@lang('main.check_out')</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <!-- CATEGORY-MENU-LIST START -->
                @include('templates.categories')
                <!-- END CATEGORY-MENU-LIST -->
                <!-- START SMALL-PRODUCT-AREA -->
                @include('templates.bestseller')
                <!-- END SMALL-PRODUCT-AREA -->
            </div>
            <div class="col-md-9">
                <!-- Start checkout-area -->
                <div class="checkout-area">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="cart-title">
                                <h2 class="entry-title">Оформление заказа</h2>
                            </div>
                            <!-- Accordion start -->
                            <div class="panel-group" id="accordion">
                                <!-- Start 1 Checkout-options -->

                                <!-- Start 3 shipping-Address -->
                                <form method="post" action="{{route('cart-confirm')}}">
                                    <div class="panel panel_default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a class="accordion-trigger collapsed" data-toggle="collapse" data-parent="#accordion" href="#shipping-address">Шаг 1: Сведения о доставке <i class="fa fa-caret-down"></i> </a>
                                            </h4>
                                        </div>
                                        <div id="shipping-address" class="collapse">
                                            <div class="panel-body">
                                                <div class="form-horizontal">
                                                    @foreach($errors->all() as $message)
                                                        <div class="alert alert-danger">{{$message}}</div>
                                                    @endforeach
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label"><sup>*</sup>ФИО</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="name" @auth value="{{Auth::user()->name}}" @endauth value="{{old('name')}}" required />
                                                        </div>
                                                    </div>

                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label"><sup>*</sup>Email</label>
                                                            <div class="col-sm-10">
                                                                <input type="email" class="form-control" name="email" @auth value="{{Auth::user()->email}}" @endauth value="{{old('email')}}" required/>
                                                            </div>
                                                        </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label"><sup>*</sup>Адрес</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="address" value="{{old('address')}}" required />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label"><sup>*</sup>Город</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control"name="city" value="{{old('city')}}" required />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label"><sup>*</sup>Телефон</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" placeholder="+380981231234" name="phone" value="{{old('phone')}}" required/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End shipping-Address -->

                                    <!-- Start 5 Payment-Method -->
                                    <div class="panel panel_default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a class="accordion-trigger collapsed" data-toggle="collapse" data-parent="#accordion" href="#payment-method">Шаг 2: Способ оплаты  <i class="fa fa-caret-down"></i> </a>
                                            </h4>
                                        </div>
                                        <div id="payment-method" class="collapse">
                                            <div class="panel-body">
                                                <p>Отправка осуществляется Новой Почтой наложеным платежом</p>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" checked/>
                                                        Новая Почта
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Payment-Method -->
                                    <!-- Start 6 Checkout-Confirm -->
                                    <div class="panel panel_default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a class="accordion-trigger collapsed" data-toggle="collapse" data-parent="#accordion" href="#checkout-confirm">Шаг 3: Подтверждение заказа <i class="fa fa-caret-down"></i> </a>
                                            </h4>
                                        </div>
                                        <div id="checkout-confirm" class="collapse">
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-hover">
                                                        <thead>
                                                        <tr>
                                                            <td class="text-left">Название</td>
                                                            <td class="text-left">Производитель</td>
                                                            <td class="text-left">Количество</td>
                                                            <td class="text-left">Цена за ед.</td>
                                                            <td class="text-left">Итого</td>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($order->products as $product)
                                                            <tr>
                                                                <td class="text-left">
                                                                    <a href="#">{{$product->name}}</a>
                                                                </td>
                                                                <td class="text-left">{{$product->manufacturer}}</td>
                                                                <td class="text-left">{{$product->countInOrder}}</td>
                                                                <td class="text-left">{{ $currencySymbol }} {{$product->price}}</td>
                                                                <td class="text-left">{{ $currencySymbol }} {{$product->getPriceForCount()}}</td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                        <tr>
                                                            <td class="text-right" colspan="4">
                                                                <strong>Общий итог:</strong>
                                                            </td>
                                                            <td class="text-right">{{ $currencySymbol }} {{$order->getFullPrice()}}</td>
                                                        </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                                <div class="buttons pull-right">
                                                    <button type="submit" class="btn btn-primary">Подтвердить заказ</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @csrf
                                </form>
                                <!-- End Checkout-Confirm -->
                            </div>
                            <!-- Accordion end -->
                        </div>
                    </div>
                </div>
                <!-- End Shopping-Cart -->
            </div>
        </div>
    </div>
</section>
<!-- END PAGE-CONTENT -->
@endsection
