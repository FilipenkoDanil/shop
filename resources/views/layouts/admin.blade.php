<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="/js/app.js" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/admin.css" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{route('index')}}">
                Вернуться на сайт
            </a>

            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="{{route('categories.index')}}">Категории</a></li>
                    <li><a href="{{route('products.index')}}">Товары</a></li>
                    <li><a href="{{route('product-images.index')}}">Изображения</a></li>
                    <li><a href="{{route('home')}}">Заказы</a></li>
                    <li><a href="{{route('comments')}}">Комментарии<span class="badge badge-danger">{{count(\App\Models\Comment::where('status', 0)->get())}}</span></a></li>
                </ul>


                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false" v-pre>
                            {{\Illuminate\Support\Facades\Auth::user()->name}}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('get_logout')}}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Выйти
                            </a>

                            <form id="logout-form" action="{{route('get_logout')}}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="py-4">
        <div class="container">
            @yield('content')
        </div>
    </div>
</div>
</body>
</html>
