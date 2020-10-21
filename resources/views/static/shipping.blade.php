@extends('layouts.main')

@section('title', 'Доставка')

@section('cart')
    @include('templates.cart')
@endsection

@section('content')
    @include('templates.mobile-categories')
    <!-- START PAGE-CONTENT -->
    <section class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="page-menu">
                        <li><a href="{{route('index')}}">@lang('main.home')</a></li>
                        <li class="active"><a href="{{route('shipping')}}">@lang('main.payment')</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="about-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="f-title text-center">
                            <h3 class="title text-uppercase">@lang('main.payment')</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="about-page-cntent">
                            <h3>Внимание!</h3>
                            <p>Тщательно проверяйте заказ при получении! Тщательно проверяйте заказ при получении!
                                В случае выявления некомплекта или повреждений, вы имеете право не оплачивать товар и отказаться от его получения, составив акт (претензию).
                                Мы не можем гарантировать решения спорных ситуаций с товаром в вашу пользу, если товар не был проверен при получении.
                                Пожалуйста, всегда проверяйте целостность упаковки, отсутствие механических повреждений и комплектацию, наличие всех единиц товара при получении заказа.</p>
                            <blockquote>
                                <p>Из-за напряженной ситуации в восточном регионе, временно приостановлена доставка товаров в г. Донецк и г. Луганск.
                                    Вместе с тем сильно ограничена и задерживается доставка по Луганской и Донецкой областям.</p>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
