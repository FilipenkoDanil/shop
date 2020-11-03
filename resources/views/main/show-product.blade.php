@extends('layouts.main')

@section('title', $product->manufacturer . ' ' . $product->name)

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
                        <li>
                            <a href="{{route('category', [$product->category->alias])}}">{{$product->category->__('name')}}</a>
                        </li>
                        <li class="active"><a href="#">{{$product->name}}</a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <!-- CATEGORY-MENU-LIST START -->
                @include('templates.categories')
                <!-- END CATEGORY-MENU-LIST -->
                @include('templates.bestseller')
                <!-- START SIDEBAR-BANNER -->
                    <div class="sidebar-banner hidden-sm hidden-xs">
                        <div class="active-sidebar-banner">
                            <div class="single-sidebar-banner">
                                <a href="#"><img src="/img/banner/1.jpg" alt="Product Banner"></a>
                            </div>
                            <div class="single-sidebar-banner">
                                <a href="#"><img src="/img/banner/2.jpg" alt="Product Banner"></a>
                            </div>
                        </div>
                    </div>
                    <!-- END SIDEBAR-BANNER -->
                </div>
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <!-- Start Toch-Prond-Area -->
                    @php
                        $image = '';
                        if(count($product->images) == 0){
                            $image = 'no_image.png';
                        }
                    @endphp
                    <div class="toch-prond-area">
                        <div class="row">
                            <div class="col-md-5 col-sm-5 col-xs-12">
                                <div class="clear"></div>
                                <div class="tab-content">
                                    <!-- Product = display-1-1 -->
                                    @if($image == 'no_image.png')
                                        <div role="tabpanel" class="tab-pane fade in active" id="display-1">
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <div class="toch-photo">
                                                        <a href="#"><img class="img-correct-263"
                                                                         src="/img/product/small/{{$image}}"
                                                                         data-imagezoom="true" alt="#"/></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        @foreach($product->images as $img)
                                            @if($loop->first)
                                                <div role="tabpanel" class="tab-pane fade in active"
                                                     id="display-{{$loop->iteration}}">
                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                            <div class="toch-photo">
                                                                <a href="#"><img src="{{Storage::url($img['img'])}}"
                                                                                 data-imagezoom="true" alt="#"/></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <div role="tabpanel" class="tab-pane fade in"
                                                     id="display-{{$loop->iteration}}">
                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                            <div class="toch-photo">
                                                                <a href="#"><img src="{{Storage::url($img['img'])}}"
                                                                                 data-imagezoom="true" alt="#"/></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        @endif
                                    @endforeach
                                @endif
                                <!-- End Product = display-1-1 -->
                                </div>
                                <!-- Start Toch-prond-Menu -->
                                <div class="toch-prond-menu">
                                    <ul role="tablist">
                                        @foreach($product->images as $img)
                                            @if($loop->first)
                                                <li role="presentation" class=" active"><a href="#display-1" role="tab"
                                                                                           data-toggle="tab"><img
                                                            src="{{Storage::url($img['img'])}}" alt="#"/></a></li>
                                            @else
                                                <li role="presentation"><a href="#display-{{$loop->iteration}}"
                                                                           role="tab" data-toggle="tab"><img
                                                            src="{{Storage::url($img['img'])}}" alt="#"/></a></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                                <!-- End Toch-prond-Menu -->
                            </div>
                            <div class="col-md-7 col-sm-7 col-xs-12">
                                <h2 class="title-product">{{$product->name}}</h2>
                                <div class="about-toch-prond">
                                    <p>
											@include('templates.rating')
                                        <a href="#description">@lang('main.reviews') ({{count($product->comments)}})</a>
                                    </p>
                                    <hr/>
                                    <p class="short-description">{{mb_substr($product->__('description'), 0, 350)}}
                                        ..</p>
                                    <hr/>
                                    <span class="current-price"> {{ $currencySymbol }}  {{$product->price}}</span>
                                    @if($product->isAvailable())
                                        <span class="item-stock">@lang('main.available'): <span
                                                class="text-stock">@lang('main.available_yes')</span></span>
                                    @else
                                        <span class="item-stock">@lang('main.available'): <span class="text-stock"
                                                                                                style="color: red">@lang('main.available_no')</span></span>
                                    @endif
                                </div>

                                <div class="product-quantity form-inline">
                                    @if($product->isAvailable())
                                        <br>
                                        <form action="{{route('cart-add', $product)}}" method="post"
                                              class="form-inline">
                                            @csrf
                                            <button type="submit"
                                                    class="toch-button toch-add-cart"> @lang('main.add_to_cart')</button>
                                        </form>
                                    @endif
                                    <form action="{{route('add-wish', $product)}}" method="POST">
                                        <button type="submit" class="toch-button toch-wishlist">@lang('main.wishlist')</button>
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Start Toch-Box -->
                        <div class="toch-box">
                            <div class="row">
                                <div class="col-xs-12">
                                    <!-- Start Toch-Menu -->
                                    <div class="toch-menu">
                                        <ul role="tablist">
                                            <li role="presentation" class=" active"><a href="#description" role="tab"
                                                                                       data-toggle="tab">@lang('main.description')</a>
                                            </li>
                                            <li role="presentation"><a href="#reviews" role="tab" data-toggle="tab">@lang('main.reviews')
                                                    ({{count($product->comments)}})</a></li>
                                        </ul>
                                    </div>
                                    <!-- End Toch-Menu -->
                                    <div class="tab-content toch-description-review">
                                        <!-- Start display-description -->
                                        <div role="tabpanel" class="tab-pane fade in active" id="description">
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <div class="toch-description">
                                                        <p>{{$product->__('description')}}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End display-description -->
                                        <div role="tabpanel" class="tab-pane fade" id="reviews">
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <div class="toch-reviews">
                                                        <div class="toch-table">
                                                            @foreach($product->comments()->with('user')->get() as $comment)

                                                                <table class="table table-striped table-bordered">
                                                                    <tbody>
                                                                    <tr>
                                                                        <td><strong>{{$comment->user->name}}</strong>
                                                                        </td>
                                                                        <td class="text-right">
                                                                            <div
                                                                                class="btn-block cart-put form-inline change">
                                                                                <strong>{{date('d/m/Y', strtotime($comment->created_at))}}</strong>
                                                                                @auth
                                                                                    @if(Auth::id() == $comment->user->id)
                                                                                        <form class="form-inline"
                                                                                              id="delete_comment_{{$comment->id}}" action="{{route('delete-comment', $comment)}}" method="POST">
                                                                                            <a href="javascript:{}"
                                                                                               onclick="document.getElementById('delete_comment_{{$comment->id}}').submit();">x</a>
                                                                                            @csrf
                                                                                        </form>
                                                                                    @endif
                                                                                @endauth
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2">
                                                                            <p>{{$comment->comment}}</p>
                                                                            @for($i = 0; $i<5; $i++)
                                                                                @if($i < $comment->rating)
                                                                                    <span><i
                                                                                            class="fa fa-star"></i></span>
                                                                                @else
                                                                                    <span><i
                                                                                            class="fa fa-star-o"></i></span>
                                                                                @endif
                                                                            @endfor
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            @endforeach
                                                        </div>
                                                        <br>
                                                        @auth
                                                            <div class="toch-review-title">
                                                                <h2>@lang('main.write_review')</h2>
                                                            </div>
                                                            <form action="{{route('add-comment', $product)}}" method="POST">
                                                                <div class="review-message">
                                                                    <div class="col-xs-12">
                                                                        <p>
                                                                        <textarea name="comment" class="form-control"
                                                                                  placeholder="@lang('main.write_here')" required></textarea>
                                                                        </p>
                                                                    </div>
                                                                    <div class="get-rating">
                                                                        <span><sup>*</sup>@lang('main.rating') </span>
                                                                        <br>
                                                                        @lang('main.bad')
                                                                        <input type="radio" value="1" name="rating"
                                                                               required/>
                                                                        <input type="radio" value="2" name="rating"/>
                                                                        <input type="radio" value="3" name="rating"/>
                                                                        <input type="radio" value="4" name="rating"/>
                                                                        <input type="radio" value="5" name="rating"/>
                                                                        @lang('main.good')
                                                                    </div>
                                                                    <div class="buttons clearfix">
                                                                        <button type="submit"
                                                                                class="btn btn-primary pull-right">
                                                                            @lang('main.continue')
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                @csrf
                                                            </form>
                                                        @endauth
                                                        @guest
                                                            <h5 class="text-center"><a href="{{route('login')}}">@lang('main.sign_write_review')</a></h5>
                                                        @endguest
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Toch-Box -->
                        <!-- START PRODUCT-AREA -->
                        <div class="product-area">
                            <div class="row">
                                <div class="col-xs-12 col-md-12">
                                    <!-- Start Product-Menu -->
                                    <div class="product-menu">
                                        <div class="product-title">
                                            <h3 class="title-group-2 gfont-1">@lang('main.related_products')</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Product-Menu -->
                            <div class="clear"></div>
                            <!-- Start Product -->
                            <div class="product carosel-navigation">
                                <div class="row">
                                    <div class="active-product-carosel">
                                        <!-- Start Single-Product -->
                                        @foreach($productRec as $prodRec)
                                            <div class="col-xs-12">
                                                <div class="single-product">
                                                    <div class="product-img">
                                                        <a href="{{route('product', [$prodRec->category->alias, $prodRec->alias])}}">
                                                            @if(count($prodRec->images) > 0)
                                                                <img class="primary-img"
                                                                     src="{{Storage::url($prodRec->images[0]['img'])}}"
                                                                     alt="Product">
                                                            @else
                                                                <img class="primary-img"
                                                                     src="/img/product/small/no_image.png"
                                                                     alt="Product">
                                                            @endif
                                                        </a>
                                                    </div>
                                                    <div class="product-description">
                                                        <h5>
                                                            <a href="{{route('product', [$prodRec->category->alias, $prodRec->alias])}}">{{$prodRec->name}}</a>
                                                        </h5>
                                                        <div class="price-box">
                                                            <span
                                                                class="price">{{$currencySymbol}} {{$prodRec->price}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single-Product -->
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!-- End Product -->
                        </div>
                        <!-- END PRODUCT-AREA -->
                    </div>
                    <!-- End Toch-Prond-Area -->
                </div>
            </div>
        </div>
    </section>
@endsection

@section('custom_js')
    <!-- Image zoom js
		============================================ -->
    <script src="/js/imagezoom.js"></script>
@endsection
