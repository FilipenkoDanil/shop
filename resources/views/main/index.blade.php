@extends('layouts.main')

@section('title', 'Главная')

@section('cart')
    @include('templates.cart')
@endsection

@section('content')



    <!-- Start Mobile-menu -->
    @include('templates.mobile-categories')
    <!-- End Mobile-menu -->

    <!-- Category slider area start -->
    <div class="category-slider-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <!-- CATEGORY-MENU-LIST START -->
                @include('templates.categories')
                <!-- END CATEGORY-MENU-LIST -->
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
                <!-- slider -->
                    <div class="slider-area">
                        <div class="bend niceties preview-1">
                            <div id="ensign-nivoslider" class="slides">
                                <img src="img/sliders/slider-1/bg1.jpg" alt="Malias" title="#slider-direction-1"/>
                                <img src="img/sliders/slider-1/bg2.jpg" alt="Malias" title="#slider-direction-2"/>
                                <img src="img/sliders/slider-1/bg3.jpg" alt="Malias" title="#slider-direction-3"/><!--
									<img src="img/sliders/slider-1/bg4.jpg" alt="" title="#slider-direction-4"/>  -->
                            </div>
                            <!-- direction 1 -->
                            <div id="slider-direction-1" class="t-lfr slider-direction">
                                <div class="slider-progress"></div>
                                <!-- layer 1 -->
                                <div class="layer-1-1 ">
                                    <h1 class="title1">LUMIA 888 DESIGN</h1>
                                </div>
                                <!-- layer 2 -->
                                <div class="layer-1-2">
                                    <p class="title2">Elegant design for business</p>
                                </div>
                                <!-- layer 3 -->
                                <div class="layer-1-3">
                                    <h2 class="title3">$966.82</h2>
                                </div>
                                <!-- layer 4 -->
                                <div class="layer-1-4">
                                    <a href="{{route('category', 'phones')}}"
                                       class="title4">@lang('main.shopping_now')</a>
                                </div>
                            </div>
                            <!-- direction 2 -->
                            <div id="slider-direction-2" class="slider-direction">
                                <div class="slider-progress"></div>
                                <!-- layer 1 -->
                                <div class="layer-2-1">
                                    <h1 class="title1">WATERPROOF SMARTPHONE</h1>
                                </div>
                                <!-- layer 2 -->
                                <div class="layer-2-2">
                                    <p class="title2">RODUCTS ARE EYE-CATCHING DESIGN. YOU CAN TAKE PHOTOS EVEN WHEN
                                        Y</p>
                                </div>
                                <!-- layer 3 -->
                                <div class="layer-2-3">
                                    <a href="{{route('category', 'phones')}}"
                                       class="title3">@lang('main.shopping_now')</a>
                                </div>
                            </div>
                            <!-- direction 3 -->
                            <div id="slider-direction-3" class="slider-direction">
                                <div class="slider-progress"></div>
                                <!-- layer 1 -->
                                <div class="layer-3-1">
                                    <h2 class="title1">BUY AIR LACOTE</h2>
                                </div>
                                <!-- layer 2 -->
                                <div class="layer-3-2">
                                    <h1 class="title2">SUPER TABLET, SUPER GIFT</h1>
                                </div>
                                <!-- layer 3 -->
                                <div class="layer-3-3">
                                    <p class="title3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                        eiusmod tempor incididunt ut labore et.</p>
                                </div>
                                <!-- layer 4 -->
                                <div class="layer-3-4">
                                    <a href="{{route('category', 'phones')}}"
                                       class="title4">@lang('main.shopping_now')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- slider end-->
                </div>
            </div>
        </div>
    </div>
    <!-- Category slider area End -->
    <!-- START PAGE-CONTENT -->
    <section class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3">

                @include('templates.bestseller')

                <!-- START SIDEBAR-BANNER -->
                    <div class="sidebar-banner">
                        <div class="active-sidebar-banner">
                            <div class="single-sidebar-banner">
                                <a href="#"><img src="img/banner/1.jpg" alt="Product Banner"></a>
                            </div>
                            <div class="single-sidebar-banner">
                                <a href="#"><img src="img/banner/2.jpg" alt="Product Banner"></a>
                            </div>
                        </div>
                    </div>
                    <!-- END SIDEBAR-BANNER -->
                </div>
                <div class="col-md-9 col-sm-9">
                    <!-- START PRODUCT-BANNER -->
                    <div class="product-banner home1-banner">
                        <div class="row">
                            <div class="col-md-7 banner-box1">
                                <div class="single-product-banner">
                                    <a href="#"><img src="img/banner/3.jpg" alt="Product Banner"></a>
                                    <div class="banner-text banner-1">
                                        <h2>head phone 2015</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 banner-box2">
                                <div class="single-product-banner">
                                    <a href="#"><img src="img/banner/4.jpg" alt="Product Banner"></a>
                                    <div class="banner-text banner-2">
                                        <h2>Deals <span>50%</span></h2>
                                        <p>lumina n85</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END PRODUCT-BANNER -->
                    <!-- START PRODUCT-AREA (1) -->
                    <div class="product-area">
                        <div class="row">
                            <div class="col-xs-12 col-md-12">
                                <!-- Start Product-Menu -->
                                <div class="product-menu">
                                    <div class="product-title">
                                        <h3 class="title-group-2 gfont-1">{{$catsMenu->first()->__('name')}}</h3>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- End Product-Menu -->
                        <div class="clear"></div>
                        <!-- Start Product -->
                        <div class="row">
                            <div class="col-xs-12 col-md-12">
                                <div class="product carosel-navigation">
                                    <div class="tab-content">
                                        <!-- Product = display-1-1 -->
                                        <div role="tabpanel" class="tab-pane fade in active" id="display-1-1">
                                            <div class="row">
                                                <div class="active-product-carosel">
                                                    <!-- Start Single-Product -->
                                                    @foreach($catsMenu->first()->products()->with('category')->with('images')->take(5)->get() as $product)
                                                        <div class="col-xs-12">
                                                            @include('templates.product')
                                                        </div>
                                                        <!-- End Single-Product -->
                                                    @endforeach

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END PRODUCT-AREA (1) -->
                                    <!-- START PRODUCT-BANNER -->
                                    <div class="product-banner">
                                        <div class="row">
                                            <div class="col-md-7 banner-box1">
                                                <div class="single-product-banner">
                                                    <a href="#"><img src="img/banner/5.jpg" alt="Product Banner"></a>
                                                    <div class="banner-text banner-1">
                                                        <h2>ApBle 4s</h2>
                                                        <p>Vibrant colors beautifully designed</p>
                                                        <span>$888.66</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5 banner-box2">
                                                <div class="single-product-banner">
                                                    <a href="#"><img src="img/banner/6.jpg" alt="Product Banner"></a>
                                                    <div class="banner-text banner-2">
                                                        <h2>Htc <span>N8.</span></h2>
                                                        <p>lumina n85</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END PRODUCT-BANNER -->
                                    <!-- START  -->
                                    <!-- START SMALL-PRODUCT-AREA (1) -->
                                    <div class="small-product-area">
                                        <!-- Start Product-Menu -->
                                        <div class="row">
                                            <div class="col-xs-12 col-md-12">
                                                <div class="product-menu">
                                                    <ul role="tablist">
                                                        <li role="presentation" class="active">
                                                            <a href="#display-4-1" role="tab"
                                                               data-toggle="tab">@lang('main.random_products')</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Product-Menu -->
                                        <!-- Start Product -->
                                        <div class="row">
                                            <div class="col-xs-12 col-md-12">
                                                <div class="product carosel-navigation">
                                                    <div class="tab-content">
                                                        <!-- Product = display-4-1 -->
                                                        <div role="tabpanel" class="tab-pane fade in active"
                                                             id="display-4-1">
                                                            <div class="row">
                                                                <div class="active-small-product">
                                                                    <!-- Start Single-Product -->
                                                                    @foreach($randomProducts as $product)
                                                                        <div class="col-xs-12">
                                                                            <div class="single-product">
                                                                                <div class="product-img">
                                                                                    <a href="{{route('product', [$product->category->alias, $product->alias])}}">
                                                                                        @if(count($product->images) > 0)
                                                                                            <img
                                                                                                class="primary-img img-correct-100"
                                                                                                src="{{Storage::url($product->images[0]['img'])}}"
                                                                                                alt="Product">
                                                                                        @else
                                                                                            <img
                                                                                                class="primary-img img-correct-100"
                                                                                                src="img/product/small/no_image.png"
                                                                                                alt="Product">
                                                                                        @endif
                                                                                    </a>
                                                                                </div>
                                                                                <div class="product-description">
                                                                                    <h5>
                                                                                        <a href="{{route('product', [$product->category->alias, $product->alias])}}">{{$product->name}}</a>
                                                                                    </h5>
                                                                                    <div class="price-box">
                                                                                        <span
                                                                                            class="price">{{ $currencySymbol }} {{$product->price}}</span>
                                                                                        @if($product->old_price > $product->price)
                                                                                            <span
                                                                                                class="old-price">{{ $currencySymbol }} {{$product->old_price}}</span>
                                                                                        @endif
                                                                                    </div>
                                                                                    @if($product->isAvailable())
                                                                                        <div class="product-action-small">
                                                                                            <div
                                                                                                class="product-button-2">
                                                                                                <form method="POST"
                                                                                                      action="{{route('cart-add', $product)}}">
                                                                                                    @csrf
                                                                                                    <button
                                                                                                        type="submit">
                                                                                                        <a href="#"
                                                                                                           data-toggle="tooltip"
                                                                                                           title="@lang('main.add_to_cart')"><i
                                                                                                                class="fa fa-shopping-cart"></i></a>
                                                                                                    </button>
                                                                                                </form>
                                                                                            </div>
                                                                                        </div>
                                                                                    @else
                                                                                        <div class="product-action-small">
                                                                                            <div
                                                                                                class="product-button-2">
                                                                                                <a href="#"
                                                                                                   data-toggle="tooltip"
                                                                                                   title="@lang('main.available_no')"><i
                                                                                                        class="fa fa-shopping-cart"></i></a>
                                                                                            </div>
                                                                                        </div>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                            <!-- End Product = display-4-1 -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Product -->
                                        </div>
                                        <!-- END SMALL-PRODUCT-AREA (1) -->
                                    </div>
                                </div>
                            </div>
    </section>


@endsection
