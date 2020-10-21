<div class="left-category-menu hidden-sm hidden-xs">
    <div class="left-product-cat">
        <div class="category-heading">
            <h2>@lang('main.categories')</h2>
        </div>
        <div class="category-menu-list">
            <ul>
                <!-- Single menu start -->
                @foreach($catsMenu as $category)
                <li>
                    <a href="{{route('category', $category->alias)}}">{{$category->__('name')}}</a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
