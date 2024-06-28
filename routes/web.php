<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Home route
Route::get('/', [HomeController::class, 'index'])->name('home');

// Product routes
Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
    Route::resource('products', ProductController::class);
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::get('/create', [ProductController::class, 'create'])->name('create');
    Route::post('/', [ProductController::class, 'store'])->name('store');
    Route::get('/{product}', [ProductController::class, 'show'])->name('show');
});

// Category routes
Route::resource('categories', CategoryController::class);
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

// Cart routes
Route::group(['prefix' => 'cart', 'as' => 'cart.'], function () {
    Route::get('/', [CartController::class, 'index'])->name('index');
    Route::post('/add/{product}', [CartController::class, 'add'])->name('add');
    Route::post('/update', [CartController::class, 'update'])->name('update');
    Route::post('/remove', [CartController::class, 'remove'])->name('remove');
});


//auth
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Routes that require authentication
Route::middleware(['auth'])->group(function () {
    // Order routes
    Route::group(['prefix' => 'orders', 'as' => 'orders.'], function () {
        Route::get('/', [OrderController::class, 'index'])->name('index');
        Route::get('/{order}', [OrderController::class, 'show'])->name('show');
        Route::post('/', [OrderController::class, 'store'])->name('store');
    });

    // User profile route (if you decide to add one)
    // Route::get('/profile', [UserController::class, 'show'])->name('profile');
});

// Admin routes (protected by auth and admin middleware)
// Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    // Product management
    // Route::resource('products', AdminProductController::class)->except(['show']);

    // // Category management
    // Route::resource('categories', AdminCategoryController::class)->except(['show']);

    // // Order management
    // Route::get('/orders', [AdminOrderController::class, 'index'])->name('admin.orders.index');
    // Route::get('/orders/{order}', [AdminOrderController::class, 'show'])->name('admin.orders.show');
    // Route::put('/orders/{order}', [AdminOrderController::class, 'update'])->name('admin.orders.update');
// });
