<div class="small-product-area carosel-navigation">
    <div class="row">
        <div class="col-md-12">
            <div class="area-title">
                <h3 class="title-group gfont-1">@lang('main.bestseller')</h3>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="active-bestseller sidebar">
            <!-- Start Single-Product -->
            @foreach($bestProducts as $bestProduct)
                @if($loop->first || $loop->index == 4)
                    <div class="col-xs-12">
                        @endif
                        <div class="single-product">
                            <div class="product-img">
                                <a href="{{route('product', [$bestProduct->category->alias, $bestProduct->alias])}}">
                                    @if(count($bestProduct->images) > 0)
                                        <img class="primary-img img-correct-100"
                                             src="{{Storage::url($bestProduct->images[0]['img'])}}"
                                             alt="Product">
                                    @else
                                        <img class="primary-img img-correct-100"
                                             src="/img/product/small/no_image.png"
                                             alt="Product">
                                    @endif
                                </a>
                            </div>
                            <div class="product-description">
                                <h5><a href="{{route('product', [$bestProduct->category->alias, $bestProduct->alias])}}">{{$bestProduct->name}}</a></h5>
                                <div class="price-box">
                                                        <span
                                                            class="price">{{ $currencySymbol }} {{$bestProduct->price}}</span>
                                    @if($bestProduct->old_price > $bestProduct->price)
                                        <span
                                            class="old-price">{{ $currencySymbol }} {{$bestProduct->old_price}}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- End Single-Product -->
                        @if($loop->index == 3)
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>

</div>
