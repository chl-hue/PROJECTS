<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Admin Routes
Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->group(function() {
    Route::get('dashboard', 'AdminController@dashboard')->name('admin.dashboard');
});

// Seller Routes
Route::prefix('seller')->namespace('App\Http\Controllers\Seller')->group(function() {
    Route::get('dashboard', 'SellerController@dashboard')->name('seller.dashboard');
});

// Customer Routes
Route::prefix('customer')->namespace('App\Http\Controllers\Customer')->group(function() {
    Route::get('dashboard', 'CustomerController@dashboard')->name('customer.dashboard');
});

