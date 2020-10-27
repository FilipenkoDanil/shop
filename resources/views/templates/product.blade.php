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
                @if($product->isAvailable())
                    <form method="POST" action="{{route('cart-add', $product)}}">
                        @csrf
                        <button><i class="fa fa-shopping-cart"></i> @lang('main.add_to_cart')</button>
                    </form>
                @else
                    <p>@lang('main.available_no')</p>
                @endif
            </div>
            <div class="product-button-2">
                <form id="wish_form_{{$product->id}}" method="POST" action="{{route('add-wish', $product)}}">
                    @csrf
                    <a href="javascript:{}" onclick="document.getElementById('wish_form_{{$product->id}}').submit();"
                       data-toggle="tooltip" title="Хочу"><i class="fa fa-heart-o"></i></a>
                </form>
            </div>
        </div>
    </div>
</div>
