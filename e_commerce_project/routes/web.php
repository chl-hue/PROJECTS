<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

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

// Dashboard Routes (Para sa ating Sidebar)
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Overview (Dashboard) Route
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Products Route
    Route::get('/products', function () {
        // I-assume natin na ipapasa mo ang data dito galing sa isang Controller
        // Para sa demo, magre-render lang tayo ng view.
        return view('products.index');
    })->name('products.index'); // <-- Ito ang kulang!

    // Customers Route
    Route::get('/customers', function () {
        return view('customers.index');
    })->name('customers.index');

    // Reports Route
    Route::get('/reports', function () {
        return view('reports.index');
    })->name('reports.index');

    // Settings Route
    Route::get('/settings', function () {
        return view('settings.index');
    })->name('settings.index');
    
});

// ... Iba pang uses...

Route::middleware(['auth', 'verified'])->group(function () {
    
    // OVERVIEW (DASHBOARD) ROUTE
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // PRODUCT MANAGEMENT ROUTES
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::post('/products', [ProductController::class, 'storeProduct'])->name('products.store');
    Route::post('/categories', [ProductController::class, 'storeCategory'])->name('categories.store');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    
    // CUSTOMERS ROUTE
    Route::get('/customers', function () {
        return view('customers.index');
    })->name('customers.index');

    // REPORTS ROUTE
    Route::get('/reports', function () {
        return view('reports.index');
    })->name('reports.index');

    // SETTINGS ROUTE
    Route::get('/settings', function () {
        return view('settings.index');
    })->name('settings.index'); // <-- Ito ang nagko-complete ng navigation
    
});

    Route::middleware(['auth'])->group(function () {
    Route::resource('categories', CategoryController::class)->except(['create', 'edit', 'show']);

    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
});