@extends('layouts.main')

@section('title', 'Регистрация')

@section('content')
    @include('templates.mobile-categories')
    <section class="page-content">
        <!-- Start Account-Create-Area -->
        <div class="account-create-area">
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
                    <div class="col-md-12">
                        <div class="area-title">
                            <h3 class="title-group gfont-1">@lang('auth.creation_of_account')</h3>
                        </div>
                    </div>
                </div>
                <div class="account-create">
                    <form action="{{route('register')}}" method="POST">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="account-create-box">
                                    <h2 class="box-info">@lang('auth.personal_information')</h2>
                                    <div class="row">
                                        <div class="col-sm-4 col-xs-12">
                                            <div class="single-create">
                                                @error('name')
                                                <div class="alert alert-danger">{{$message}}</div>
                                                @enderror
                                                <p>@lang('auth.full_name') <sup>*</sup></p>
                                                <input class="form-control" type="text" name="name"
                                                       value="{{old('name')}}" required/>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-xs-12">
                                            <div class="single-create">
                                                @error('email')
                                                <div class="alert alert-danger">{{$message}}</div>
                                                @enderror
                                                <p>Email <sup>*</sup></p>
                                                <input class="form-control" type="email" name="email"
                                                       value="{{old('email')}}" required/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="account-create-box">
                                    <h2 class="box-info">@lang('auth.login_information')</h2>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <div class="single-create">
                                                @error('password')
                                                <div class="alert alert-danger">{{$message}}</div>
                                                @enderror
                                                <p>@lang('auth.password') <sup>*</sup></p>
                                                <input class="form-control" type="password" name="password" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <div class="single-create">
                                                @error('password_confirmation')
                                                <div class="alert alert-danger">{{$message}}</div>
                                                @enderror
                                                <p>@lang('auth.repeat_password') <sup>*</sup></p>
                                                <input class="form-control" type="password" name="password_confirmation"
                                                       required/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-area">
                                    <p class="required text-right">* @lang('auth.required_fields')</p>
                                    <button type="submit" class="btn btn-primary floatright">@lang('auth.register')</button>
                                    <a href="{{route('login')}}" class="float-left"><span><i
                                                class="fa fa-angle-double-left"></i></span> @lang('main.login')</a>
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
