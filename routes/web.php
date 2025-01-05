<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\AizUploadController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/clear-caches', function () {
    return env("DB_DATABASE"); 
    // Clear the caches
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('config:cache');
    
    // Regenerate the application key
    Artisan::call('key:generate');

    // Create the symbolic storage link
    Artisan::call('storage:link');    

    // Return a response
    return 'Caches cleared and config cached successfully!';
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

    // Aiz upload routes 
    Route::middleware(['auth.backend'])->resource('/uploaded-files', AizUploadController::class);
    Route::middleware(['auth.backend'])->controller(AizUploadController::class)->group(function () {
        Route::any('/uploaded-files/file-info', 'file_info')->name('uploaded-files.info');
        Route::get('/uploaded-files/destroy/{id}', 'destroy')->name('uploaded-files.destroy');
        Route::post('/bulk-uploaded-files-delete', 'bulk_uploaded_files_delete')->name('bulk-uploaded-files-delete');
        Route::get('/all-file', 'all_file');
        Route::post('/aiz-uploader', 'show_uploader');
        Route::post('/aiz-uploader/upload', 'upload');
        Route::get('/aiz-uploader/get-uploaded-files', 'get_uploaded_files');
        Route::post('/aiz-uploader/get_file_by_ids', 'get_preview_files');
        Route::get('/aiz-uploader/download/{id}', 'attachment_download')->name('download_attachment');        
    });   
});
