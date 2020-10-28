@for($i = 0; $i<5; $i++)
    @if($i < $product->rating)
        <span class="rating"><i
                class="fa fa-star"></i></span>
    @else
        <span class="rating"><i
                class="fa fa-star-o"></i></span>
    @endif
@endfor
