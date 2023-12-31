<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Category\Index;
use App\Http\Controllers\Home\CartController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Home\OrderController;
use App\Http\Controllers\Admin\ChartController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Home\ProfileController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Home\BlogPostController;
use App\Http\Controllers\Home\CheckoutController;
use App\Http\Controllers\Home\WishlistController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\DashboardController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');


// Home Routes

Route::controller(App\Http\Controllers\Home\HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/collections', 'categories')->name('collections');
    Route::get('/collections/{category}', 'products')->name('products');
    Route::get('/collections/{category}/{product}', 'productView')->name('productView');
    Route::get('/new-arrivals', 'newArrivals')->name('newArrivals');
    Route::get('/all-products', 'allProducts')->name('allProducts');
    Route::get('/featured-products', 'featuredProducts')->name('search');
    Route::get('/home-appliances', 'productCatDisplay')->name('productCatDisplay');
    Route::get('/search', 'search')->name('search');
    Route::get('about-us', 'aboutUs')->name('aboutUs');
    Route::get('/contact-us', 'contactUs')->name('contactUs');
    Route::post('/contact-us', 'contactUsPost')->name('contactUsPost');
    Route::get('/blogs', 'blogs')->name('blogs');
});


// Authenticated User Routes

Route::middleware(['auth'])->group(function () {
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::get('/wishlist/{product}', [App\Http\Controllers\Home\WishlistController::class, 'delete'])->name('wishlist.delete');
    Route::get('/cart', [App\Http\Controllers\Home\CartController::class, 'index'])->name('cart.index');
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::get('/orders', [App\Http\Controllers\Home\OrderController::class, 'index'])->name('orders.index');
    Route::get('orders/{orderId}', [App\Http\Controllers\Home\OrderController::class, 'show'])->name('orders.show');
    Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/change-password', [ProfileController::class, 'changePswd']);
    Route::post('/change-password', [ProfileController::class, 'changePassword']);
});

// User Blog Routes
Route::controller(BlogPostController::class)->group(function () {

    Route::get('/blogs/{blog}', 'show')->name('blogs.show');
});


Route::get('/thank-you', [App\Http\Controllers\Home\HomeController::class, 'thankYou'])->name('thankYou');


// Admin Routes

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

    // Products Routes
    Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function () {
        Route::get('/products', 'index')->name('admin.products');
        Route::get('/products/create', 'create')->name('admin.products.create');
        Route::post('/products', 'store')->name('admin.products.store');
        Route::get('/products/edit/{product}', 'edit')->name('admin.products.edit');
        Route::put('/products/{product}', 'update')->name('admin.products.update');
        Route::get('/product-image/{product_image_id}/delete', 'destroyImage')->name('admin.products.destroyImage');
        Route::get('/products/delete/{product}', 'destroy')->name('admin.products.destroy');
        Route::post('/product-color-update/{id}', 'updateProductColorQty')->name('admin.products.updateProductColorQty');
        Route::get('/product-color-delete/{id}', 'destroyProductColor')->name('admin.products.destroyProductColor');
    });

    // Color Routes
    Route::controller(App\Http\Controllers\Admin\ColorController::class)->group(function () {
        Route::get('/colors', 'index')->name('admin.colors');
        Route::get('/colors/create', 'create')->name('admin.colors.create');
        Route::post('/colors/create', 'store')->name('admin.colors.store');
        Route::get('/colors/edit/{color}', 'edit')->name('admin.colors.edit');
        Route::put('/colors/{color}', 'update')->name('admin.colors.update');
        Route::get('/colors/delete/{color}', 'destroy')->name('admin.colors.destroy');
    });

    // Slider Routes
    Route::controller(App\Http\Controllers\Admin\SliderController::class)->group(function () {
        Route::get('/sliders', 'index')->name('admin.sliders');
        Route::get('/sliders/create', 'create')->name('admin.sliders.create');
        Route::post('/sliders/create', 'store')->name('admin.sliders.store');
        Route::get('/sliders/edit/{slider}', 'edit')->name('admin.sliders.edit');
        Route::put('/sliders/{slider}', 'update')->name('admin.sliders.update');
        Route::get('/sliders/delete/{slider}', 'destroy')->name('admin.sliders.destroy');
    });

    // Order Routes
    Route::controller(App\Http\Controllers\Admin\OrdersController::class)->group(function () {
        Route::get('/orders', 'index')->name('admin.orders');
        Route::get('/orders/{order}', 'show')->name('admin.orders.show');
        Route::put('/orders/{order}/', 'update')->name('admin.orders.update');
        Route::get('/invoice/{order}/generate', 'generateInvoice')->name('admin.invoice.generateInvoice');
        Route::get('/invoice/{order}', 'viewInvoice')->name('admin.invoice.viewInvoice');
        Route::get('/invoice/{order}/mail', 'sendInvoice');
    });

    // Blog Routes
    Route::controller(BlogController::class)->group(function () {
        // Blog Category
        Route::get('/blogs/category', 'showCategory')->name('admin.blogs.showCategory');
        Route::get('/blogs/category/create', 'createBlogCategory')->name('admin.blogs.createBlogCategory');
        Route::post('/blogs/category/create', 'storeBlogCategory')->name('admin.blogs.storeBlogCategory');
        Route::get('blogs/category/edit/{blogCategory}', 'editBlogCategory')->name('admin.blogs.editBlogCategory');
        Route::put('blogs/category/{blogCategory}', 'updateBlogCategory')->name('admin.blogs.updateBlogCategory');
        Route::get('blogs/category/delete/{blogCategory}', 'deleteBlogCategory')->name('admin.blogs.deleteBlogCategory');

        // Blog Posts
        Route::get('/blogs/view', 'index')->name('admin.blogs.view');
        Route::get('/blogs/create', 'create')->name('admin.blogs.create');
        Route::post('/blogs/create', 'store')->name('admin.blogs.store');
        Route::get('/blogs/edit/{blog}', 'edit')->name('admin.blogs.edit');
        Route::put('/blogs/{blog}', 'update')->name('admin.blogs.update');
        Route::get('/blogs/delete/{blog}', 'destroy')->name('admin.blogs.destroy');
    });

    // Admin Site Seeing Routes

    Route::get('/site-settings', [SettingsController::class, 'index'])->name('admin.settings');
    Route::post('/settings', [SettingsController::class, 'update'])->name('admin.settings.update');
    Route::post('/team', [SettingsController::class, 'store'])->name('admin.settings.store');

    // Admin User Routes
    Route::controller(UserController::class)->group(function () {
        Route::get('/users', 'index')->name('admin.users');
        Route::get('/users/create', 'create')->name('admin.users.create');
        Route::post('/users/create', 'store')->name('admin.users.store');
        Route::get('/users/edit/{user}', 'edit')->name('admin.users.edit');
        Route::put('/users/{user}', 'update')->name('admin.users.update');
        Route::get('/users/delete/{user}', 'destroy')->name('admin.users.destroy');
    });

    // Admin Brand Routes

    Route::get('/brands', App\Livewire\Admin\Brand\Index::class);
});
