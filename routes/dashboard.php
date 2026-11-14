<?php

use App\Http\Controllers\Dashboard\BrandController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\CourierBookingController;
use App\Http\Controllers\Dashboard\FacilityController;
use App\Http\Controllers\Dashboard\Courier\FraudCheckController;
use App\Http\Controllers\Dashboard\InvoiceController;
use App\Http\Controllers\Dashboard\MessageController;
use App\Http\Controllers\Dashboard\NotificationController;
use App\Http\Controllers\Dashboard\OrderController;
use App\Http\Controllers\Dashboard\PaymentGwatewayController;
use App\Http\Controllers\Dashboard\PaymentMethodController;
use App\Http\Controllers\Dashboard\PolicyController;
use App\Http\Controllers\Dashboard\PolicyTypeController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\ProductSectionController;
use App\Http\Controllers\Dashboard\ReviewController;
use App\Http\Controllers\Dashboard\ShippingFeeController;
use App\Http\Controllers\Dashboard\SiteInfoController;
use App\Http\Controllers\Dashboard\TagController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Middleware\AdminRoleMiddleware;
// Management Routes (only role_id 1 and 2)
Route::middleware(AdminRoleMiddleware::class . ':1,2')->prefix('dashboard')->name('dashboard.')->group(function () {
    // Site Information Routes
    Route::resource('site-info', SiteInfoController::class);

    Route::prefix('courier')
        ->name('courier.')
        ->middleware(['auth'])
        ->group(function () {

            Route::get('/fraud', [FraudCheckController::class, 'index'])
                ->name('fraud.index');

            Route::post('/fraud/check', [FraudCheckController::class, 'check'])
                ->name('fraud.check');

        });

    Route::post(
        '/orders/{order}/courier-booking',
        [CourierBookingController::class, 'store']
    )->name('orders.courier-booking');
    Route::resource('tags', TagController::class);

    // Policy Types Management Routes
    Route::get('policy-types/{type}/toggle-status', [
        PolicyTypeController::class,
        'toggleStatus'
    ])->name('policy-types.toggle-status');
    Route::resource('policy-types', PolicyTypeController::class);

    // Policies Management Routes
    Route::get('policies/{type}/create', [PolicyController::class, 'createPolicyType'])->name('policy-type.create');
    Route::resource('policies', PolicyController::class);

    // User Management Routes
    Route::get('users/filter', [UserController::class, 'filter'])->name('users.filter');
    Route::patch('users/{user}/avatar', [UserController::class, 'updateAvatar'])->name('users.avatar.update');
    Route::patch('users/{user}/password', [UserController::class, 'updatePassword'])->name('users.password.update');
    Route::resource('users', UserController::class);

    // Category Management Routes
    Route::get('/categories/{category}/toggle-status', [
        CategoryController::class,
        'toggleStatus'
    ])->name('categories.toggle-status');
    Route::get('categories/filter', [CategoryController::class, 'filter'])->name('categories.filter');
    Route::resource('categories', CategoryController::class);

    // Product Management Routes
    Route::get('products/filter', [ProductController::class, 'filter'])->name('products.filter');
    Route::resource('products', ProductController::class);
    Route::patch(
        '/admin/products/{product}/toggle-published',
        [ProductController::class, 'togglePublished']
    )->name('products.togglePublished');
    Route::post('products/{product}/images', [
        ProductController::class,
        'uploadImages'
    ])->name('products.images.upload');

    // Product Brand Management Routes
    Route::get('brands/filter', [
        BrandController::class,
        'filter'
    ])->name('brands.filter');
    Route::resource('brands', BrandController::class);
    Route::get('brands/{brand}/toggle-published', [
        BrandController::class,
        'togglePublished'
    ])->name('brands.togglePublished');

    // Section Management Routes
    Route::get('product-sections/{section}/toggle-status', [
        ProductSectionController::class,
        'toggleStatus'
    ])->name('product-sections.toggle-status');
    Route::resource('product-sections', ProductSectionController::class);

    // Review Management Routes
    Route::get('reviews/{review}/toggle-status', [
        ReviewController::class,
        'toggleStatus'
    ])->name('reviews.toggle-status');
    Route::resource('reviews', ReviewController::class);

    // Facility Management Routes
    Route::resource('facilities', FacilityController::class);


    // Messages [inbox] Management Routes
    Route::resource('messages', MessageController::class);
    // AJAX Search & Filter
    Route::get('/messages/filter', [MessageController::class, 'filter'])
        ->name('messages.filter');
    // Mark as Read
    Route::patch('/messages/{message}/read', [MessageController::class, 'markRead'])
        ->name('messages.read');

    // Orders Management
    Route::get('invoice/{invoice}', [InvoiceController::class, 'show'])->name('invoice.show');
    Route::resource('orders', OrderController::class);
    // Payment Methods Management
    Route::resource('payment-methods', PaymentMethodController::class);
    Route::get('payment-methods/{payment_method}/toggle', [
        PaymentMethodController::class,
        'toggle'
    ])->name('payment-methods.toggle');
    // Payment Gateway Settings (admin & super-admin only) - simple forms
    Route::resource('payment-gateways', PaymentGwatewayController::class);
    // Shipping Fee
    Route::resource('shipping-fees', ShippingFeeController::class);


    Route::get('notifications', [NotificationController::class, 'index'])->name('notifications.index');

    Route::get('/notifications/{id}', [
        NotificationController::class,
        'show'
    ])->name('notifications.show');

    Route::post('/notifications/{id}/read', [
        NotificationController::class,
        'markAsRead'
    ])->name('notifications.read');

    Route::post('/notifications/read-all', [
        NotificationController::class,
        'markAllAsRead'
    ])->name('notifications.read-all');


});
