<?php

use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\FacilityController;
use App\Http\Controllers\Dashboard\InvoiceController;
use App\Http\Controllers\Dashboard\OrderController;
use App\Http\Controllers\Dashboard\PaymentGwatewayController;
use App\Http\Controllers\Dashboard\PaymentMethodController;
use App\Http\Controllers\Dashboard\PolicyController;
use App\Http\Controllers\Dashboard\PolicyTypeController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\ProductSectionController;
use App\Http\Controllers\Dashboard\ReviewController;
use App\Http\Controllers\Dashboard\SiteInfoController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminRoleMiddleware;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

require __DIR__.'/frontend.php';

// Route::get('/', [\App\Http\Controllers\FrontEnd\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
// Route::get('/dashboard', function () {
//     return view('dashboard.home.index');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('dashboard/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('dashboard/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('dashboard/profile/info', [ProfileController::class, 'update'])->name('profile.info.update');
    Route::patch('dashboard/profile/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.avatar.update');
    Route::patch('dashboard/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
    Route::delete('dashboard/profile/delete', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Management Routes (only role_id 1 and 2)
    Route::middleware(AdminRoleMiddleware::class.':1,2')->group(function () {
        // Site Information Routes
        Route::resource('dashboard/site-info', SiteInfoController::class);

        // Policies Management Routes
        Route::get('dashboard/policies/{type}/create', [PolicyController::class, 'createPolicy'])->name('dashboard.policies.create');
        Route::resource('dashboard/policies', PolicyController::class);

        // User Management Routes
        Route::get('dashboard/users/filter', [UserController::class, 'filter'])->name('users.filter');
        Route::patch('dashboard/users/{user}/avatar', [UserController::class, 'updateAvatar'])->name('users.avatar.update');
        Route::patch('dashboard/users/{user}/password', [UserController::class, 'updatePassword'])->name('users.password.update');
        Route::resource('dashboard/users', UserController::class);

        // Category Management Routes
        Route::get('dashboard/categories/{category}/toggle-status', [CategoryController::class, 'toggleStatus'])->name('dashboard.categories.toggle-status');
        Route::get('dashboard/categories/filter', [CategoryController::class, 'filter'])->name('dashboard.categories.filter');
        Route::resource('dashboard/categories', CategoryController::class);

        // Product Management Routes
        Route::get('dashboard/products/filter', [ProductController::class, 'filter'])->name('dashboard.products.filter');
        Route::resource('dashboard/products', ProductController::class);
        Route::get('dashboard/products/{product}/toggle-status', [ProductController::class, 'toggleStatus'])->name('products.toggle-status');
        Route::post('dashboard/products/{product}/images', [ProductController::class, 'uploadImages'])->name('products.images.upload');

        // Section Management Routes
        Route::get('dashboard/product-sections/{section}/toggle-status', [ProductSectionController::class, 'toggleStatus'])->name('product-sections.toggle-status');
        Route::resource('dashboard/product-sections', ProductSectionController::class);

        // Review Management Routes
        Route::get('dashboard/reviews/{review}/toggle-status', [ReviewController::class, 'toggleStatus'])->name('reviews.toggle-status');
        Route::resource('dashboard/reviews', ReviewController::class);

        // Facility Management Routes
        Route::resource('dashboard/facilities', FacilityController::class);

        // Policy Types Management Routes
        Route::get('dashboard/policy-types/{type}/toggle-status', [PolicyTypeController::class, 'toggleStatus'])->name('policy-types.toggle-status');
        Route::resource('dashboard/policy-types', PolicyTypeController::class);

        // Orders Management
        Route::get('dashboard/orders/{order}/invoice', [InvoiceController::class, 'show'])->name('orders.invoice');
        Route::resource('dashboard/orders', OrderController::class);
        // Payment Methods Management
        Route::resource('dashboard/payment-methods', PaymentMethodController::class);
        Route::get('dashboard/payment-methods/{payment_method}/toggle', [PaymentMethodController::class, 'toggle'])->name('payment-methods.toggle');
        // Payment Gateway Settings (admin & super-admin only) - simple forms
        Route::resource('dashboard/payment-gateways', PaymentGwatewayController::class);

    });
});

require __DIR__.'/auth.php';
