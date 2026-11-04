<?php

use App\Http\Controllers\FrontEnd\AboutController;
use App\Http\Controllers\FrontEnd\CategoriesController;
use App\Http\Controllers\FrontEnd\CheckoutController;
use App\Http\Controllers\FrontEnd\ContactController;
use App\Http\Controllers\FrontEnd\HomeController;
use App\Http\Controllers\FrontEnd\ProductsController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/categories', [CategoriesController::class, 'index'])->name('categories');
Route::get('/categories/{category}/{slug}', [ProductsController::class, 'categoryProducts'])->name('category.products');
Route::get('/products/show/{id}', [ProductsController::class, 'show'])->name('products.show');
Route::get('/products', [ProductsController::class, 'index'])->name('products');
Route::get('policies/{policyType}', [HomeController::class, 'showPolicy'])->name('policies.show');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
// Route::get('/products/{id}', [ProductsController::class, 'show'])->name('products.show');
