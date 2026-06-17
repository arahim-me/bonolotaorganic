<?php

use App\Http\Controllers\FrontEnd\AboutController;
use App\Http\Controllers\FrontEnd\CategoriesController;
use App\Http\Controllers\FrontEnd\ContactController;
use App\Http\Controllers\FrontEnd\FaqsController;
use App\Http\Controllers\FrontEnd\HomeController;
use App\Http\Controllers\FrontEnd\ProductsController;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/faqs', [FaqsController::class, 'index'])->name('faqs');
Route::get('/categories', [CategoriesController::class, 'index'])->name('categories');
Route::get('/products', [ProductsController::class, 'index'])->name('products');
// Route::get('/products/{id}', [ProductsController::class, 'show'])->name('products.show');


