<?php

use Illuminate\Support\Facades\Auth;
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


Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {

    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');

    // Category Routes

    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function () {

        Route::get('/category', 'index')->name('admin.category');

        Route::post('/category',  'store')->name('admin.category.store');

        Route::get('/category/create',  'create')->name('admin.category.create');

        Route::put('/category/{category}',  'update')->name('admin.category.update');

        Route::get('/category/{category}/edit', 'edit')->name('admin.category.edit');
    });

    Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function () {
        Route::get('/products', 'index')->name('admin.products');
        Route::get('/products/create', 'create')->name('admin.products.create');
        Route::post('/products', 'store')->name('admin.products.store');
        Route::get('/products/edit/{product}', 'edit')->name('admin.products.edit');
        Route::put('/products/{product}', 'update')->name('admin.products.update');
        Route::get('/product-image/{product_image_id}/delete', 'destroyImage')->name('admin.products.destroyImage');
        Route::get('/products/delete/{product}', 'destroy')->name('admin.products.destroy');
    });

    Route::get('/brands', App\Livewire\Admin\Brand\Index::class);
});
