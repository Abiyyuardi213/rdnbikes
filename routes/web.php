<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BikeProductController;
use App\Http\Controllers\Admin\ApparelProductController;
use App\Http\Controllers\Admin\ComponentProductController;
use App\Http\Controllers\Admin\ProductStockController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('road-bikes', [App\Http\Controllers\ProductController::class, 'roadBikes'])->name('road-bikes');
Route::get('gravel-bikes', [App\Http\Controllers\ProductController::class, 'gravelBikes'])->name('gravel-bikes');
Route::get('bike-components', [App\Http\Controllers\ProductController::class, 'bikeComponents'])->name('bike-components');
Route::get('apparel/cycling-jerseys', [App\Http\Controllers\ProductController::class, 'cyclingJerseys'])->name('apparel.jerseys');
Route::get('apparel/bib-shorts', [App\Http\Controllers\ProductController::class, 'bibShorts'])->name('apparel.bib-shorts');
Route::get('apparel/vests-outerwear', [App\Http\Controllers\ProductController::class, 'vestsOuterwear'])->name('apparel.vests');
Route::get('apparel/socks-accessories', [App\Http\Controllers\ProductController::class, 'socksAccessories'])->name('apparel.accessories');

Route::get('custom-jersey', function () {
    return view('custom-jersey');
})->name('custom-jersey');

Route::get('stories', function () {
    return view('stories');
})->name('stories');

Route::get('about-us', function () {
    return view('about-us');
})->name('about-us');

use App\Http\Controllers\CartController;

Route::get('products/{slug}', [ProductController::class, 'show'])->name('products.show');

// Shopping Cart Routes
Route::get('cart', [CartController::class, 'index'])->name('cart.index');
Route::post('cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::post('cart/update/{key}', [CartController::class, 'update'])->name('cart.update');
Route::delete('cart/remove/{key}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('cart/clear', [CartController::class, 'clear'])->name('cart.clear');

// Authentication Routes
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::get('registrasi', [AuthController::class, 'showRegistrationForm']);
Route::post('register', [AuthController::class, 'register']);
Route::post('registrasi', [AuthController::class, 'register']);

Route::get('admin/login', [AuthController::class, 'showAdminLoginForm'])->name('admin.login');
Route::post('admin/login', [AuthController::class, 'adminLogin']);

// Admin Panel Group (Protected by 'admin' middleware)
Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('products', BikeProductController::class);
    Route::resource('apparel', ApparelProductController::class);
    Route::resource('components', ComponentProductController::class);

    // Product Stock & Variant Management
    Route::get('stocks', [ProductStockController::class, 'index'])->name('stocks.index');
    Route::post('products/{product}/stocks', [ProductStockController::class, 'store'])->name('products.stocks.store');
    Route::put('products/{product}/stocks/{stock}', [ProductStockController::class, 'update'])->name('products.stocks.update');
    Route::delete('products/{product}/stocks/{stock}', [ProductStockController::class, 'destroy'])->name('products.stocks.destroy');
});
