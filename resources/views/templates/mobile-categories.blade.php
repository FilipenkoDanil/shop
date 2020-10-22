<div class="mobile-menu-area hidden-md hidden-lg">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <nav id="mobile-menu">
                    <ul>
                        <li><a href="{{route('index')}}">Home</a>
                        </li>
                        @foreach($catsMenu as $category)
                            <li>
                                <a href="{{route('category', $category->alias)}}">{{$category->__('name')}}</a>
                            </li>
                        @endforeach
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<hr>
