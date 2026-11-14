<?php

use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Dashboard\DashboardController;
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
//     return view('home.index');
// })->middleware(['auth', 'verified'])->name('dashboard');


require __DIR__ . '/dashboard.php';

Route::middleware('auth')->group(function () {
    Route::get('dashboard/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('dashboard/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('dashboard/profile/info', [ProfileController::class, 'update'])->name('profile.info.update');
    Route::patch('dashboard/profile/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.avatar.update');
    Route::patch('dashboard/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
    Route::delete('dashboard/profile/delete', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
