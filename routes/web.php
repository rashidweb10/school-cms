<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Group routes under the 'backend' prefix
Route::prefix('backend')->group(function () {

    // Public login route (does not require authentication)
    Route::get('/login', function () {
        return view('backend.login');
    })->name('backend.login');

    // Authenticated admin routes
    Route::middleware([])->group(function () { //'auth'
        Route::get('/dashboard', function () {
            return view('backend.dashboard');
        })->name('backend.dashboard');

        // Additional backend routes can be added here
        Route::get('/settings', function () {
            return 'Settings Page';
        })->name('backend.settings');
    });
});