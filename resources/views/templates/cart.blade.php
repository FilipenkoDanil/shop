@if(!is_null($cart) and count($cart->products) > 0)

    <div class="top-cart">
        <ul>
            <li>
                <a href="{{route('cart')}}">
                    <span class="cart-icon"><i class="fa fa-shopping-cart"></i></span>
                    <span class="cart-total">
                        <span class="cart-title">@lang('main.cart')</span>
                        <span class="cart-item">{{count($cart->products)}} @lang('main.cart_item') </span>
                        <span class="top-cart-price">{{ $currencySymbol }} {{$cart->getFullPrice()}}</span>
                    </span>
                </a>
                <div class="mini-cart-content">
                    @foreach($cart->products as $product)
                        <div class="cart-img-details">
                            <div class="cart-img-photo">

                                @if(count($product->images) > 0)
                                    <a href="{{route('product', [$product->category->alias, $product->alias])}}"><img
                                            src="{{Storage::url($product->images[0]["img"])}}" alt="#"></a>
                                @else
                                    <a href="{{route('product', [$product->category->alias, $product->alias])}}"><img
                                            src="/img/product/small/no_image.png" alt="#"></a>
                                @endif
                            </div>
                            <div class="cart-img-content">
                                <a href="{{route('product', [$product->category->alias, $product->alias])}}">
                                    <h4>{{$product->name}}</h4></a>
                                <span>
															<strong
                                                                class="text-right">{{$product->countInOrder}} x</strong>
															<strong
                                                                class="cart-price text-right">{{ $currencySymbol }} {{$product->price}}</strong>
														</span>
                            </div>
                            <div class="pro-del">
                                <form id="delete_form" action="{{route('delete-product', $product)}}" method="POST">
                                    <a href="javascript:{}"
                                       onclick="document.getElementById('delete_form').submit();"><i
                                            class="fa fa-times"></i></a>
                                    @csrf
                                </form>

                            </div>
                        </div>
                        <div class="clear"></div>
                    @endforeach

                    <div class="cart-inner-bottom">
													<span class="total">
														@lang('main.total'):
														<span
                                                            class="amount">{{ $currencySymbol }} {{$cart->getFullPrice()}}</span>
													</span>
                        <span class="cart-button-top">
														<a href="{{route('cart-place')}}">@lang('main.check_out')</a>
													</span>
                    </div>
                </div>
            </li>
        </ul>
    </div>

@else
    <div class="top-cart">
        <ul>
            <li>
                <a href="{{route('cart')}}">
                    <span class="cart-icon"><i class="fa fa-shopping-cart"></i></span>
                    <span class="cart-total">
                        <span class="cart-title">@lang('cart.cart')</span>
                        <span class="cart-item">@lang('main.cart_empty') </span>
                    </span>
                </a>
                <div class="mini-cart-content">
                    <div class="cart-inner-bottom">
                            <span class="total" style="text-align: center">
														@lang('main.cart_empty_2')
													</span>
                    </div>
                </div>
            </li>
        </ul>
    </div>
@endif
