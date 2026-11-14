<?php

use App\Http\Controllers\Dashboard\BrandController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\CourierBookingController;
use App\Http\Controllers\Dashboard\CourierLogController;
use App\Http\Controllers\Dashboard\CourierSettingController;
use App\Http\Controllers\Dashboard\CourierTrackingController;
use App\Http\Controllers\Dashboard\FacilityController;
use App\Http\Controllers\Dashboard\FraudCheckController;
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

    Route::prefix('courier')->name('courier.')->group(function () {

        // Courier Settings
        Route::get('/settings', [CourierSettingController::class, 'index'])
            ->name('settings.index');

        Route::put('/settings/{courier}', [CourierSettingController::class, 'update'])
            ->name('settings.update');

        Route::post(
            '/courier-settings/{courier}/test',
            [CourierSettingController::class, 'testConnection']
        )->name('courier-settings.test');

        // Fraud Checker
        Route::get('/fraud-check', [FraudCheckController::class, 'index'])
            ->name('fraud-check.index');

        Route::post('/fraud-check', [FraudCheckController::class, 'check'])
            ->name('fraud-check.check');

        // Courier Booking
        Route::post('/orders/{order}/book', [CourierBookingController::class, 'store'])
            ->name('booking.store');

        // Cancel Booking
        Route::post('/shipments/{shipment}/cancel', [CourierBookingController::class, 'cancel'])
            ->name('booking.cancel');

        // Tracking
        Route::get('/shipments/{shipment}/track', [CourierTrackingController::class, 'show'])
            ->name('tracking.show');

        // Courier Logs
        Route::get('/logs', [CourierLogController::class, 'index'])
            ->name('logs.index');
    });


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
    Route::get('dashboard/categories/filter', [CategoryController::class, 'filter'])->name('categories.filter');
    Route::resource('dashboard/categories', CategoryController::class);

    // Product Management Routes
    Route::get('dashboard/products/filter', [ProductController::class, 'filter'])->name('products.filter');
    Route::resource('dashboard/products', ProductController::class);
    Route::patch(
        '/admin/products/{product}/toggle-published',
        [ProductController::class, 'togglePublished']
    )->name('products.togglePublished');
    Route::post('dashboard/products/{product}/images', [
        ProductController::class,
        'uploadImages'
    ])->name('products.images.upload');

    // Product Brand Management Routes
    Route::get('dashboard/brands/filter', [
        BrandController::class,
        'filter'
    ])->name('brands.filter');
    Route::resource('dashboard/brands', BrandController::class);
    Route::get('dashboard/brands/{brand}/toggle-published', [
        BrandController::class,
        'togglePublished'
    ])->name('brands.togglePublished');

    // Section Management Routes
    Route::get('dashboard/product-sections/{section}/toggle-status', [
        ProductSectionController::class,
        'toggleStatus'
    ])->name('product-sections.toggle-status');
    Route::resource('dashboard/product-sections', ProductSectionController::class);

    // Review Management Routes
    Route::get('dashboard/reviews/{review}/toggle-status', [
        ReviewController::class,
        'toggleStatus'
    ])->name('reviews.toggle-status');
    Route::resource('dashboard/reviews', ReviewController::class);

    // Facility Management Routes
    Route::resource('dashboard/facilities', FacilityController::class);


    // Messages [inbox] Management Routes
    Route::resource('dashboard/messages', MessageController::class);
    // AJAX Search & Filter
    Route::get('/messages/filter', [MessageController::class, 'filter'])
        ->name('messages.filter');
    // Mark as Read
    Route::patch('/messages/{message}/read', [MessageController::class, 'markRead'])
        ->name('messages.read');

    // Orders Management
    Route::get('invoice/{invoice}', [InvoiceController::class, 'show'])->name('invoice.show');
    Route::resource('dashboard/orders', OrderController::class);
    // Payment Methods Management
    Route::resource('dashboard/payment-methods', PaymentMethodController::class);
    Route::get('dashboard/payment-methods/{payment_method}/toggle', [
        PaymentMethodController::class,
        'toggle'
    ])->name('payment-methods.toggle');
    // Payment Gateway Settings (admin & super-admin only) - simple forms
    Route::resource('dashboard/payment-gateways', PaymentGwatewayController::class);
    // Shipping Fee
    Route::resource('dashboard/shipping-fees', ShippingFeeController::class);


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
