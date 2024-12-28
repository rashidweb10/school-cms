<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthController;

Route::get('/', function () {
    return view('welcome');
});

// Group routes under the 'backend' prefix
Route::prefix('backend')->group(function () {

    // Public login/logout routes
    
    Route::get('/login', [AuthController::class, 'showLoginForm'])->middleware('auth.guest')->name('backend.login');
    Route::post('/login', [AuthController::class, 'login'])->name('backend.login.submit');
    Route::get('/logout', [AuthController::class, 'logout'])->name('backend.logout');

    // Authenticated admin routes
    Route::middleware(['auth.backend'])->group(function () {
        Route::get('/dashboard', function () {
            return view('backend.dashboard');
        })->name('backend.dashboard');
    });
});