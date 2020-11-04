@extends('layouts.main')

@section('title', 'Новые товары')

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
                        <li class="active"><a href="#">@lang('main.new_products')</a></li>
                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <!-- CATEGORY-MENU-LIST START -->
                @include('templates.categories')
                <!-- END CATEGORY-MENU-LIST -->
                </div>
                <div class="col-md-9 col-xs-12">
                    <!-- START PRODUCT-BANNER -->
                    <div class="product-banner">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="banner">
                                    <a href="#"><img src="/img/banner/12.jpg" alt="Product Banner"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END PRODUCT-BANNER -->
                    <!-- START PRODUCT-AREA -->
                    <div class="product-area">
                        <div class="row">
                            <div class="col-xs-12">
                                <!-- Start Product-Menu -->
                                <div class="product-menu">
                                    <div class="product-title">
                                        <h3 class="title-group-3 gfont-1">@lang('main.new_product')</h3>
                                    </div>
                                </div>
                                @if(count($products) > 0)
                                    <div class="product-filter">
                                        <div class="sort">
                                            <label>@lang('main.sort'):</label>
                                            <select id="product_sorting_btn">
                                                <option value="default">@lang('sort.default')</option>
                                                <option value="name-a-z">@lang('sort.name_a_z')</option>
                                                <option value="name-z-a">@lang('sort.name_z_a')</option>
                                                <option value="price-min-high">@lang('sort.price_min_high')</option>
                                                <option value="price-high-min">@lang('sort.price_high_min')</option>
                                            </select>
                                        </div>
                                    </div>
                            @endif

                                <!-- End Product-Menu -->
                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-md-12">
                                <!-- Start Product -->
                                <div class="product">
                                    <div class="tab-content">
                                        <!-- Start Product-->
                                        <div role="tabpanel" class="tab-pane fade in  active" id="display-1-2">
                                            <div class="row products">
                                                <!-- Start Single-Product -->
                                                @forelse($products as $product)
                                                    <div class="col-md-3 col-sm-4 col-xs-12">
                                                        @include('templates.product')
                                                    </div>
                                                @empty
                                                    <div class="col-md-12 text-center">
                                                        <br>
                                                        <h3>@lang('main.nothing_here')</h3>
                                                    </div>
                                                @endforelse
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
                                </div>

                                <!-- End Product -->
                            </div>
                        </div>
                    </div>

                    <!-- END PRODUCT-AREA -->
                </div>
            </div>
        </div>
        <!-- START BRAND-LOGO-AREA -->

        <!-- END BRAND-LOGO-AREA -->
        <!-- START SUBSCRIBE-AREA -->

    </section>
    <!-- END PAGE-CONTENT -->
    <!-- FOOTER-AREA START -->

@endsection

@section('custom_js')
    <script>
        $(document).ready(function () {
            $('#product_sorting_btn').change(function () {
                let orderBy = $(this).val()

                $.ajax({
                    url: "{{route('new-products')}}",
                    type: "GET",
                    data: {
                        orderBy: orderBy,
                        page: {{isset($_GET['page']) ? $_GET['page'] : 1}},
                    },

                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },

                    success: (data) => {
                        let positionParameters = location.pathname.indexOf('?');
                        let url = location.pathname.substring(positionParameters, location.pathname.length);
                        let newUrl = url + "?";
                        newUrl += 'orderBy=' + orderBy + "&page={{isset($_GET['page']) ? $_GET['page'] : 1}}";
                        history.pushState({}, '', newUrl);


                        $('.tab-content').html(data);
                    }

                })
            })
        })
    </script>
@endsection
