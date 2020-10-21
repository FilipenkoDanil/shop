@extends('layouts.main')

@section('title', 'Связаться')

@section('cart')
    @include('templates.cart')
@endsection

@section('content')

    @include('templates.mobile-categories')

    <section class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="page-menu">
                        <li><a href="{{route('index')}}">@lang('main.home')</a></li>
                        <li class="active"><a href="#">@lang('main.contact_us')</a></li>
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
                    <!-- Start Contact-Message -->
                    <div class="contact-message">
                        <fieldset>
                            <form method="post" action="mail.php">
                                <legend>@lang('contact.contact_form')</legend>
                                <div class="form-group form-horizontal">
                                    <div class="row">
                                        <label class="col-sm-2 control-label"><sup>*</sup>@lang('contact.your_name')</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="name"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-horizontal">
                                    <div class="row">
                                        <label class="col-sm-2 control-label"><sup>*</sup>@lang('contact.email')</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="email" name="email"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-horizontal">
                                    <div class="row">
                                        <label class="col-sm-2 control-label"><sup>*</sup>@lang('contact.message')</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" rows="10" name="message"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="buttons pull-right">
                                    <input class="btn btn-primary" type="submit" value="@lang('contact.submit')" name="submit"/>
                                </div>
                            </form>
                        </fieldset>
                    </div>
                    <!-- End Contact-Message -->
                </div>
            </div>
        </div>

@endsection
