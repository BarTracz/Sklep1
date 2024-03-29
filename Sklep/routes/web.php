<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);

Route::controller(App\Http\Controllers\Frontend\FrontendController::class)->group(function () {

    Route::get('/', 'index');
    Route::get('/collections', 'categories');
    Route::get('/collections/{category_name}', 'products');
    Route::get('/collections/{category_name}/{product_id}', 'productView');

    Route::get('/search', 'searchProducts');
});

Route::get('wishlist', [App\Http\Controllers\Frontend\WishlistController::class, 'index']);
Route::get('cart', [App\Http\Controllers\Frontend\CartController::class, 'index']);
Route::get('order', [App\Http\Controllers\Frontend\OrderController::class, 'index']);
Route::post('order/store', [App\Http\Controllers\Frontend\OrderController::class, 'store']);
Route::get('order/success', [App\Http\Controllers\Frontend\OrderController::class, 'success']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function () {

    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    Route::controller(App\Http\Controllers\Admin\SliderController::class)->group(function () {
        Route::get('sliders', 'index');
        Route::get('sliders/create', 'create');
        Route::post('sliders/create', 'store');
        Route::get('sliders/{slider}/edit', 'edit');
        Route::put('sliders/{slider}', 'update');
        Route::get('sliders/{slider}/delete', 'destroy');
    });

    Route::controller(App\Http\Controllers\Admin\BrandController::class)->group(function () {
        Route::get('/brand', 'index');
        Route::get('/brand/create', 'create');
        Route::post('/brand', 'store');
        Route::get('/brand/{brand}/edit', 'edit');
        Route::put('/brand/{brand}', 'update');
    });

    Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function () {
        Route::get('/products', 'index');
        Route::get('/products/create', 'create');
        Route::post('/products', 'store');
        Route::get('/products/{product}/editpc', 'editpc');
        Route::get('/products/{product}/editlaptop', 'editlaptop');
        Route::get('/products/{product}/editmobile', 'editmobile');
        Route::get('/products/{product}/editsmartwatch', 'editsmartwatch');
        Route::get('/products/{product}/editconsole', 'editconsole');
        Route::put('/products/{product}', 'update');
        Route::get('/product-image/{product_image_id}/delete','destroyImage');
        Route::get('/products/{product_id}/delete', 'destroy');
    });

});
