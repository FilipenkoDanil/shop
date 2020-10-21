@extends('layouts.main')

@section('title', 'Поиск')

@section('cart')
    @include('templates.cart')
@endsection

@section('content')
    <!-- START PAGE-CONTENT -->
    <!-- Start Mobile-menu -->
    @include('templates.mobile-categories')
    <!-- End Mobile-menu -->
    <section class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="page-menu">
                        <li><a href="{{route('index')}}">@lang('main.home')</a></li>
                        <li class="active"><a href="#">@lang('main.search')</a></li>
                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    @include('templates.categories')
                </div>
                <div class="col-md-9 col-xs-12">
                    <div class="product-banner">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="banner">
                                    <a href="#"><img src="/img/banner/12.jpg" alt="Product Banner"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-area">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="product-menu">
                                    <div class="product-title">
                                        <h3 class="title-group-3 gfont-1">@lang('main.all_products_found')</h3>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-md-12">
                                <div class="product">
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade in  active" id="display-1-2">
                                            <div class="row products">
                                                @forelse($products as $product)
                                                    <div class="col-md-3 col-sm-4 col-xs-12">
                                                        @include('templates.product')
                                                    </div>
                                                @empty
                                                    <div class="col-md-12 text-center">
                                                        <br>
                                                        <h3>Ничего не найдено.</h3>
                                                    </div>
                                                @endforelse
                                            </div>
                                            <div class="pagination-area">
                                                <div class="row">
                                                    <div class="col-xs-5">
                                                        <div class="pagination">
                                                            {{$products->appends(request()->query())->links()}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
