@extends('layouts.main')

@section('title', 'Авторизация')

@section('cart')
    @include('templates.cart')
@endsection

@section('content')
<!-- START PAGE-CONTENT -->
@include('templates.mobile-categories')
<section class="page-content">
    <!-- Start Account-Create-Area -->
    <div class="account-create-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="page-menu">
                        <li><a href="index.html">@lang('main.home')</a></li>
                        <li class="active"><a href="account.html">@lang('main.my_account')</a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="area-title">
                        <h3 class="title-group gfont-1">Авторизация</h3>
                    </div>
                </div>
            </div>
            <div class="account-create">
                <form action="{{route('login')}}" method="POST">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="account-create-box">
                                <h2 class="box-info">Login Information</h2>
                                <div class="row">
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <div class="single-create">
                                            @error('email')
                                                <div class="alert alert-danger">{{$message}}</div>
                                            @enderror
                                            <p>Email <sup>*</sup></p>
                                            <input class="form-control" type="email" name="email" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <div class="single-create">
                                            @error('password')
                                                 <div class="alert alert-danger">{{$message}}</div>
                                            @enderror
                                            <p>Пароль <sup>*</sup></p>
                                            <input class="form-control" type="password" name="password" required/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="submit-area">
                                <p class="required text-right">* Обязательные поля</p>
                                <button type="submit" class="btn btn-primary floatright">Войти</button>
                                <a href="{{route('register')}}" class="float-left"><span><i class="fa fa-angle-double-left"></i></span> Зарегестрироваться</a>
                            </div>
                        </div>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>
    <!-- End Account-Create-Area -->
</section>
<!-- END PAGE-CONTENT -->

@endsection
