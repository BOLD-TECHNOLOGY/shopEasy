<?php

use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProductController;
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
    Route::get('/{shop}', [ShopController::class, 'show'])->name('show'); // ✅ FIXED HERE
    Route::put('/{shop}', [ShopController::class, 'update'])->name('update');
    Route::delete('/{shop}', [ShopController::class, 'destroy'])->name('destroy');
});

// product routes
Route::prefix('products')->middleware('auth')->name('products.')->group(function () {
    Route::post('/', [ProductController::class, 'store'])->name('store');
    Route::put('/{product}', [ProductController::class, 'update'])->name('update');
    Route::delete('/{product}', [ProductController::class, 'destroy'])->name('destroy');
});




Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
