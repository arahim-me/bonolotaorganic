<?php

use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\FacilityController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

require __DIR__ . '/frontend.php';

// Route::get('/', [\App\Http\Controllers\FrontEnd\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
// Route::get('/dashboard', function () {
//     return view('dashboard.home.index');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/delete', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Management Routes (only role_id 1 and 2)
    Route::middleware(\App\Http\Middleware\AdminRoleMiddleware::class.':1,2')->group(function () {
        // User Management Routes
        Route::patch('users/{user}/avatar', [UserController::class, 'updateAvatar'])->name('users.avatar.update');
        Route::patch('users/{user}/password', [UserController::class, 'updatePassword'])->name('users.password.update');
        Route::resource('users', UserController::class);

        // Category Management Routes
        Route::resource('categories', CategoryController::class);

        // Product Management Routes
        Route::resource('products', ProductController::class);
        Route::post('products/{product}/images', [ProductController::class, 'uploadImages'])->name('products.images.upload');

        // Facility Management Routes
        Route::resource('facilities', FacilityController::class);

        // Orders Management
        Route::resource('orders', \App\Http\Controllers\Dashboard\OrderController::class);
        // Payment Methods Management
        Route::resource('payment-methods', \App\Http\Controllers\Dashboard\PaymentMethodController::class);
        Route::get('payment-methods/{payment_method}/toggle', [\App\Http\Controllers\Dashboard\PaymentMethodController::class, 'toggle'])->name('payment-methods.toggle');
        // Payment Gateway Settings (admin & super-admin only) - simple forms
        Route::resource('payment-gateways', \App\Http\Controllers\Dashboard\PaymentGwatewayController::class);

    });
});

require __DIR__ . '/auth.php';

