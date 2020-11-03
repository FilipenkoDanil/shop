<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::get('/logout', 'Auth\LoginController@logout')->name('get_logout');
Route::group(
    ['middleware' => 'auth'], function () {

    Route::group(['middleware' => 'is_admin', 'namespace' => 'Admin', 'prefix' => 'admin'], function () {
        Route::get('/orders', "OrderController@index")->name('home');
        Route::get('/orders/{order}', "OrderController@show")->name('order.show');
        Route::resource('categories', 'CategoryController');
        Route::resource('products', 'ProductController');
        Route::resource('product-images', 'ProductImageController');
        Route::get('/comments', "CommentController@index")->name('comments');
        Route::post('/comment/publish/{comment}', "CommentController@publish")->name('admin-publish-comment');
        Route::post('/comment/delete/{comment}', "CommentController@destroy")->name('admin-delete-comment');
    });

});


Route::get('/locale/{locale}', 'ChangeController@changeLocale')->name('locale');
Route::get('/currency/{currencyCode}', 'ChangeController@changeCurrency')->name('currency');

Route::middleware('set_locale')->group(function () {

    Auth::routes([
        'reset' => false,
        'confirm' => false,
        'verify' => false
    ]);

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/account', "AccountController@account")->name('account');
        Route::post('/account/change-info', "AccountController@change")->name('change-acinform');
        Route::post('/account/add-wish/{product}', "AccountController@addWish")->name('add-wish');
        Route::post('/account/remove-wish/{product}', "AccountController@removeWish")->name('remove-wish');
        Route::post('/product/{product}/add-comment', "CommentController@addComment")->name('add-comment');
        Route::post('/product/delete-comment/{comment}', "CommentController@deleteComment")->name('delete-comment');
    });

    Route::get('/', "MainController@index")->name('index');
    Route::get('/search', "MainController@search")->name('search');
    Route::get('/category/{category}', "MainController@category")->name('category');
    Route::get('/new-products', "MainController@newProducts")->name('new-products');
    Route::get('/product/{category}/{product}', "MainController@product")->name('product');


    Route::get('/about', "StaticController@about")->name('about');
    Route::get('/contact', "StaticController@contact")->name('contact');
    Route::post('/sendMail', "StaticController@sendMail")->name('sendMail');
    Route::get('/shipping', "StaticController@shipping")->name('shipping');
    Route::get('/warranty', "StaticController@warranty")->name('warranty');


    Route::group(['prefix' => 'cart'], function () {
        Route::post('/add/{product}', "CartController@cartAdd")->name('cart-add');

        Route::group(['middleware' => 'cart_not_empty'], function () {
            Route::get('/', "CartController@cart")->name('cart');
            Route::get('/place', "CartController@cartPlace")->name('cart-place');
            Route::post('/confirm', "CartController@cartConfirm")->name('cart-confirm');
            Route::post('/remove/{product}', "CartController@cartRemove")->name('cart-remove');
            Route::post('/delete/{product}', "CartController@deleteProduct")->name('delete-product');
        });

    });

});
