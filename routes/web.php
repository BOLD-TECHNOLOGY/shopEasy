<?php

use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnalyticsController;
use Illuminate\Support\Facades\Route;

use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// user
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified', 'user'])
    ->name('dashboard');

// admin
Route::view('admin/dashboard', 'admin.dashboard')
    ->middleware(['auth', 'verified' , 'admin'])
    ->name('admin.dashboard');

// blogger
Route::view('blogger/dashboard', 'blogger.dashboard')
    ->middleware(['auth', 'verified' , 'blogger'])
    ->name('blogger.dashboard');

// vendor
Route::view('vendor/dashboard', 'vendor.dashboard')
    ->middleware(['auth', 'verified' , 'vendor'])
    ->name('vendor.dashboard');

// customer
Route::view('customer/dashboard', 'customer.dashboard')
    ->middleware(['auth', 'verified' , 'customer'])
    ->name('customer.dashboard');


// shop routes
Route::middleware(['auth'])->prefix('shops')->name('shops.')->group(function () {
    Route::get('/', [ShopController::class, 'index'])->name('index');
    Route::post('/', [ShopController::class, 'store'])->name('store');
    Route::get('/{shop}', [ShopController::class, 'show'])->name('show');
    Route::put('/{shop}', [ShopController::class, 'update'])->name('update');
    Route::delete('/{shop}', [ShopController::class, 'destroy'])->name('destroy');
});

// product routes
Route::prefix('products')->middleware('auth')->name('products.')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::post('/', [ProductController::class, 'store'])->name('store');
    Route::put('/{product}', [ProductController::class, 'update'])->name('update'); 
    Route::delete('/{product}', [ProductController::class, 'destroy'])->name('destroy');
});


// admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});

Route::prefix('admin/posts')->middleware(['auth', 'admin'])->name('admin.posts.')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('index');
    Route::post('/', [PostController::class, 'store'])->name('store');
    Route::put('/{post}', [PostController::class, 'update'])->name('update');
    Route::delete('/{post}', [PostController::class, 'destroy'])->name('destroy');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/analytics', [AnalyticsController::class, 'index'])->name('admin.analytics');
});






Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
