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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function () {

    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

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
        Route::get('/products/{product}/edit', 'edit');
        Route::put('/products/{product}', 'update');
        Route::get('/product-image/{product_image_id}/delete','destroyImage');
        Route::get('/products/{product_id}/delete', 'destroy');
    });

    //Route::controller(App\Http\Controllers\Admin\SliderController::class)->group(function () {
    //    Route::get('sliders', 'index');
    //    Route::get('sliders/create', 'create');
    //    Route::post('sliders/create', 'store');
    //    Route::get('sliders/{slider}/edit', 'edit');
    //    Route::put('sliders/{slider}', 'update');
    //    Route::get('sliders/{slider}/delete', 'destroy');
    //});

    //Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function () {
    //    Route::get('/products', 'index');
    //    Route::get('/products/create', 'create');
    //    Route::post('/products', 'store');
    //    Route::get('/products/{product}/edit', 'edit');
    //    Route::put('/products/{product}', 'update');
    //    Route::get('/product-image/{product_image_id}/delete','destroyImage');
    //    Route::get('/products/{product_id}/delete', 'destroy');
    //});

    //Route::get('/brands', App\Http\Livewire\Admin\Brand\Index::class);
});
