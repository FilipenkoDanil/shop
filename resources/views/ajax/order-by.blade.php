<!-- Start Product-->
<div role="tabpanel" class="tab-pane fade in  active" id="display-1-2">
    <div class="row products">
        <!-- Start Single-Product -->
        @foreach($products as $product)
            <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="single-product">
                    <div class="product-img">
                        <a href="{{route('product', [$product->category->alias, $product->alias])}}">
                            @if(count($product->images) > 0)
                                <img class="primary-img"
                                     src="{{Storage::url($product->images[0]['img'])}}"
                                     alt="Product">
                            @else
                                <img class="primary-img"
                                     src="/img/product/small/no_image.png"
                                     alt="Product">
                            @endif
                        </a>
                    </div>
                    <div class="product-description">
                        <h5><a href="{{route('product', [$product->category->alias, $product->alias])}}">{{$product->name}}</a></h5>
                        <div class="price-box">
                            <span class="price">{{ $currencySymbol }} {{$product->price}}</span>
                            @if($product->old_price > $product->price)
                                <span class="old-price">{{ $currencySymbol }} {{$product->old_price}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="product-action">
                        <div class="button-group">
                            <div class="product-button">
                                <form method="POST" action="{{route('cart-add', $product)}}">
                                    @csrf
                                    <button><i class="fa fa-shopping-cart"></i> @lang('main.add_to_cart')</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    @endforeach
    <!-- End Single-Product -->

    </div>
    <!-- Start Pagination Area -->
    <div class="pagination-area">
        <div class="row">
            <div class="col-xs-5">
                <div class="pagination">
                    {{$products->appends(request()->query())->links()}}

                </div>
            </div>
        </div>
    </div>
    <!-- End Pagination Area -->

</div>
<!-- End Product = TV -->
</div>
