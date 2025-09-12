<?php

use App\Http\Controllers\user\HomeController;
use App\Http\Controllers\user\ProductController;
use App\Http\Controllers\user\SectionController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', [HomeController::class , 'index'])->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';


Route::get('products', [ProductController::class , 'index'])->name('products');

Route::get('contact', function () {
    return view('contact');
})->name('contact');

















Route::get('section/{slug}', [SectionController::class , 'index'])->name('section');


















Route::get('product_details/{slug}',[ProductController::class , 'showproduct'])->name('product_details');



















Route::get('checkout', function () {
    return view('checkout');
})->name('checkout');
Route::get('terms', function () {
    return view('terms');
})->name('terms');
Route::get('privacy', function () {
    return view('privacy');
})->name('privacy');
Route::get('replacmentpolicy', function () {
    return view('replacmentpolicy');
})->name('replacmentpolicy');


Route::post('cart/add', [\App\Http\Controllers\user\CartController::class,
 'addToCart']);
Route::post('cart/show', [\App\Http\Controllers\user\CartController::class,
 'showCart']);
Route::delete('cart/delete', [\App\Http\Controllers\user\CartController::class,
 'removeFromCart']);