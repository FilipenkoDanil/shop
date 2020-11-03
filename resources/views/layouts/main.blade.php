<!doctype html>
<html class="no-js" lang="@php $locale = session('locale'); echo $locale; @endphp">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title') | Malias</title>
    <meta name="description" content="@yield('title')">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">

    <meta property="og:title" content="@yield('title')">
    <meta property="og:site_name" content="malias shop">
    <meta property="og:url" content="{{url()->current()}}">
    <meta property="og:description" content="malias shop">
    <meta property="og:image" content="/img/logo.png">


    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">

    <!-- Google Fonts
		============================================ -->
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,600' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>

    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <!-- Font awesome CSS
		============================================ -->
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="/css/owl.carousel.css">
    <link rel="stylesheet" href="/css/owl.theme.css">
    <link rel="stylesheet" href="/css/owl.transitions.css">
    <!-- nivo slider CSS
		============================================ -->
    <link rel="stylesheet" href="/css/nivo-slider.css" type="text/css" />
    <!-- meanmenu CSS
		============================================ -->
    <link rel="stylesheet" href="/css/meanmenu.min.css">
    <!-- jquery-ui CSS
		============================================ -->
    <link rel="stylesheet" href="/css/jquery-ui.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="/css/animate.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="/css/main.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="/css/style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="/css/responsive.css">

    @yield('custom_css')
</head>
<body>

<!-- HEADER-AREA START -->
<header class="header-area">
    <!-- HEADER-TOP START -->
    <div class="header-top hidden-xs">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="top-menu">
                        <!-- Start Language -->
                        <ul class="language">
                            @if($locale == 'ru')
                                <li><a href="#"><img class="right-5" src="/img/flags/ru.png" alt="#">Русский<i class="fa fa-caret-down left-5"></i></a>
                                    @elseif($locale == 'en')
                                <li><a href="#"><img class="right-5" src="/img/flags/gb.png" alt="#">English<i class="fa fa-caret-down left-5"></i></a>
                                    @else
                                <li><a href="#"><img class="right-5" src="/img/flags/ru.png" alt="#">Русский<i class="fa fa-caret-down left-5"></i></a>
                            @endif
                                <ul>
                                    <li><a href="{{route('locale', 'en')}}"><img class="right-5" src="/img/flags/gb.png" alt="#">English</a></li>
                                    <li><a href="{{route('locale', 'ru')}}"><img class="right-5" src="/img/flags/ru.png" alt="#">Русский</a></li>
                                </ul>
                            </li>
                        </ul>
                        <!-- End Language -->
                        <!-- Start Currency -->
                        <ul class="currency">
                            <li><a href="#"><strong> {{ $currencySymbol }} </strong> {{ App\Models\Currency::byCode(session('currency', 'UAH'))->first()->code }} <i class="fa fa-caret-down left-5"></i></a>
                                <ul>
                                    @foreach($currencies as $currency)
                                        <li><a href="{{route('currency', $currency->code)}}">{{$currency->symbol}} {{$currency->code}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                        <!-- End Currency -->
                        <p class="welcome-msg">Default welcome msg!</p>
                    </div>
                    <!-- Start Top-Link -->
                    <div class="top-link">
                        <ul class="link">
                            @auth
                                @admin
                                    <li><a href="{{route('home')}}"><i class="fa fa-table"></i> @lang('main.admin')</a></li>
                                @endadmin
                                <li><a href="{{route('account')}}"><i class="fa fa-user"></i> @lang('main.my_account')</a></li>
                                <li><a href="{{route('get_logout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i> @lang('main.logout')</a></li>
                            @endauth
                            @guest
                                <li><a href="{{route('login')}}"><i class="fa fa-unlock-alt"></i> @lang('main.login')</a></li>
                            @endguest
                        </ul>
                    </div>
                    <!-- End Top-Link -->
                </div>
            </div>
        </div>
    </div>
    <!-- HEADER-TOP END -->
    <!-- HEADER-MIDDLE START -->
    <div class="header-middle">
        <div class="container">
            <!-- Start Support-Client -->
            <div class="support-client hidden-xs">
                <div class="row">
                    <!-- Start Single-Support -->
                    <div class="col-md-3 hidden-sm">
                        <div class="single-support">
                            <div class="support-content">
                                <i class="fa fa-clock-o"></i>
                                <div class="support-text">
                                    <h1 class="zero gfont-1">@lang('main.working_time')</h1>
                                    <p>@lang('main.work_time')</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single-Support -->
                    <!-- Start Single-Support -->
                    <div class="col-md-3 col-sm-4">
                        <div class="single-support">
                            <i class="fa fa-truck"></i>
                            <div class="support-text">
                                <h1 class="zero gfont-1">@lang('main.shipping_free')</h1>
                                <p>@lang('main.shipping_free_order')</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Single-Support -->
                    <!-- Start Single-Support -->
                    <div class="col-md-3 col-sm-4">
                        <div class="single-support">
                            <i class="fa fa-money"></i>
                            <div class="support-text">
                                <h1 class="zero gfont-1">@lang('main.money_back')</h1>
                                <p>@lang('main.money_back_2')</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Single-Support -->
                    <!-- Start Single-Support -->
                    <div class="col-md-3 col-sm-4">
                        <div class="single-support">
                            <i class="fa fa-phone-square"></i>
                            <div class="support-text">
                                <h1 class="zero gfont-1">@lang('main.phone_company')</h1>
                                <p>@lang('main.phone_company_2')</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Single-Support -->
                </div>
            </div>
            <!-- End Support-Client -->
            <!-- Start logo & Search Box -->
            <div class="row">
                <div class="col-md-3 col-sm-12">
                    <div class="logo">
                        <a href="{{route('index')}}" title="Malias"><img src="/img/logo.png" alt="Malias"></a>
                    </div>
                </div>
                <div class="col-md-9 col-sm-12">
                    <div class="quick-access">
                        <div class="search-by-category">
                            <form method="GET" action="{{route('search')}}" name="form-search" onsubmit='return validate()' >
                                <div class="search-container">
                                    <select name="cat">
                                        <option selected value="0">@lang('main.all_categories')</option>
                                        @foreach($catsMenu as $category)
                                            <option class="c-item" value="{{$category->id}}">{{$category->__('name')}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="header-search">
                                        <input type="text" placeholder="@lang('main.search')" name="search">
                                        <button type="submit"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                        @yield('cart')
                    </div>
                </div>
            </div>
            <!-- End logo & Search Box -->
        </div>
    </div>
    <!-- HEADER-MIDDLE END -->
    <!-- START MAINMENU-AREA -->
    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mainmenu hidden-sm hidden-xs">
                        <nav>
                            <ul>
                                <li><a href="{{route('index')}}">@lang('main.home')</a></li>
                                <li class="new"><a href="{{route('new-products')}}">@lang('main.new_products')</a></li>
                                <li><a href="{{route('about')}}">@lang('main.about_us')</a></li>
                                <li><a href="{{route('contact')}}">@lang('main.contact_us')</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN-MENU-AREA -->

</header>

@yield('content')

<!-- END HOME-PAGE-CONTENT -->
<!-- FOOTER-AREA START -->
<footer class="footer-area">
    <!-- Footer Start -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="footer-title">
                        <h5>@lang('main.my_account')</h5>
                    </div>
                    <nav>
                        <ul class="footer-content">
                            <li><a href="{{route('account')}}">@lang('main.my_account')</a></li>
                            <li><a href="{{route('account')}}">@lang('main.order_history')</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="footer-title">
                        <h5>@lang('main.cust_service')</h5>
                    </div>
                    <nav>
                        <ul class="footer-content">
                            <li><a href="{{route('contact')}}">@lang('main.contact_us')</a></li>
                            <li><a href="{{route('about')}}">@lang('main.about_us')</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-xs-12 hidden-sm col-md-3">
                    <div class="footer-title">
                        <h5>@lang('main.payment')</h5>
                    </div>
                    <nav>
                        <ul class="footer-content">
                            <li><a href="{{route('shipping')}}">@lang('main.payment')</a></li>
                            <li><a href="{{route('warranty')}}">@lang('main.warranty')</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="footer-title">
                        <h5>@lang('main.payment')</h5>
                    </div>
                    <nav>
                        <ul class="footer-content box-information">
                            <li>
                                <i class="fa fa-home"></i><span>Towerthemes, 1234 Stret Lorem, LPA States, Libero</span>
                            </li>
                            <li>
                                <i class="fa fa-envelope-o"></i><p><a href="{{route('contact')}}">admin@shopmalias.ru</a></p>
                            </li>
                            <li>
                                <i class="fa fa-phone"></i>
                                <span>01234-56789</span> <br> <span> 01234-56789</span>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->
    <!-- Copyright-area Start -->
    <div class="copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <p>Copyright &copy; Взято с <a href="http://bayguzin.ru" target="_blank"> bayguzin.ru</a> All rights reserved.</p>
                        <div class="payment">
                            <a href="#"><img src="/img/payment.png" alt="Payment"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright-area End -->
</footer>
<!-- FOOTER-AREA END -->


<!-- jquery
		============================================ -->
<script src="/js/jquery-1.11.3.min.js"></script>
<!-- bootstrap JS
		============================================ -->
<script src="/js/bootstrap.min.js"></script>
<!-- wow JS
		============================================ -->
<script src="/js/wow.min.js"></script>
<!-- meanmenu JS
		============================================ -->
<script src="/js/jquery.meanmenu.js"></script>
<!-- owl.carousel JS
		============================================ -->
<script src="/js/owl.carousel.min.js"></script>
<!-- scrollUp JS
		============================================ -->
<script src="/js/jquery.scrollUp.min.js"></script>
<!-- countdon.min JS
		============================================ -->
<script src="/js/countdon.min.js"></script>
<!-- jquery-price-slider js
		============================================ -->
<script src="/js/jquery-price-slider.js"></script>
<!-- Nivo slider js
		============================================ -->
<script src="/js/jquery.nivo.slider.js" type="text/javascript"></script>
<!-- plugins JS
		============================================ -->
<script src="/js/plugins.js"></script>
<!-- main JS
		============================================ -->
<script src="/js/main.js"></script>

<script type='text/javascript'>
    function validate(){
        var search =document.forms['form-search']['search'].value;
        if (search.length==0){
            alert('@lang('main.fill_search')');
            return false;
        }
    }
</script>

@yield('custom_js')
</body>
</html>
