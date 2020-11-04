<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['main.*', 'static.*', 'cart.*', 'auth.account', 'auth.login', 'auth.register'], 'App\ViewComposers\CategoriesComposer');
        View::composer('*', 'App\ViewComposers\CurrenciesComposer');
        View::composer(['main.*', 'static.*', 'cart.*', 'auth.account', 'auth.login', 'auth.register', 'auth.account'], 'App\ViewComposers\CartComposer');
        View::composer(['main.*', 'static.contact'  , 'cart.*', 'auth.account'], 'App\ViewComposers\BestProductsComposer');
        View::composer(['auth.categories.*', 'auth.comments.*', 'auth.orders.*', 'auth.product-image.*', 'auth.products.*'], 'App\ViewComposers\NewCommentsComposer');
    }
}
