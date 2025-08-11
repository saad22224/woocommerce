<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('index2');
})->name('home');

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


Route::get('products', function () {
    return view('products');
})->name('products');

Route::get('contact', function () {
    return view('contact');
})->name('contact');
Route::get('section', function () {
    return view('section');
})->name('section');
Route::get('product_details', function () {
    return view('product-detail');
})->name('product_details');
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