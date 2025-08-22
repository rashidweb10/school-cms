<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

//Backend
use App\Http\Controllers\CommandController;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\UploadController;
use App\Http\Controllers\Backend\CompanyController;
use App\Http\Controllers\Backend\TeamCategoryController;
use App\Http\Controllers\Backend\TeamController;
use App\Http\Controllers\Backend\CampusController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Backend\FormController as BackendFormController;

//Frontend
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\FormController;

Route::prefix('command')->group(function () {
    Route::get('cache-clear', [CommandController::class, 'cacheClear']);
    Route::get('config-clear', [CommandController::class, 'configClear']);
    Route::get('config-cache', [CommandController::class, 'configCache']);
    Route::get('route-cache', [CommandController::class, 'routeCache']);
    Route::get('route-clear', [CommandController::class, 'routeClear']);
    Route::get('view-clear', [CommandController::class, 'viewClear']);
    Route::get('view-cache', [CommandController::class, 'viewCache']);
    //Route::get('migrate', [CommandController::class, 'migrate']);
    Route::get('storage-link', [CommandController::class, 'storageLink']);
    Route::get('key-generate', [CommandController::class, 'keyGenerate']);
    Route::get('optimize-clear', [CommandController::class, 'optimizeClear']);
    Route::get('queue-work', [CommandController::class, 'queueWork']);
    Route::get('queue-retry/{id?}', [CommandController::class, 'queueRetry']); // optional id
    Route::get('queue-failed', [CommandController::class, 'queueFailed']);
    Route::get('queue-forget/{id}', [CommandController::class, 'queueForget']);
    Route::get('queue-flush', [CommandController::class, 'queueFlush']);    
});

Route::get('/', [FrontendController::class, 'home'])->name('home');

Route::get('/about-us', [FrontendController::class, 'about'])->name('about');

Route::get('/why-we', [FrontendController::class, 'why_we'])->name('why-we');

Route::get('/roadmap', [FrontendController::class, 'roadmap'])->name('roadmap');

Route::get('/career', [FrontendController::class, 'career'])->name('career');

Route::get('/curriculum', [FrontendController::class, 'curriculum'])->name('curriculum');

Route::get('/alumini', [FrontendController::class, 'alumini'])->name('alumini');

Route::get('/results', [FrontendController::class, 'results'])->name('results');

Route::get('/contact-us', [FrontendController::class, 'contact'])->name('contact');

Route::get('/disclosure', [FrontendController::class, 'disclosure'])->name('disclosure');

Route::get('/terms-and-conditions', [FrontendController::class, 'terms'])->name('terms');

Route::get('/privacy-policy', [FrontendController::class, 'privacy_policy'])->name('privacy_policy');

Route::get('/admission', [FrontendController::class, 'admission'])->name('admission');

Route::get('/campus-facilities', [FrontendController::class, 'campus'])->name('campus');
Route::get('/campus-facilities/{id}', [FrontendController::class, 'campus'])->name('campus.contents');

Route::get('/events', [FrontendController::class, 'events'])->name('events');
Route::get('/events/{year}', [FrontendController::class, 'events'])->name('events.contents');

Route::get('/awards', [FrontendController::class, 'awards'])->name('awards');

// $circularSlugs = DB::table('pages')
//     ->where('layout', 'circulars')
//     ->pluck('slug')
//     ->map(fn($slug) => preg_quote($slug, '/'))  // Escape special characters
//     ->implode('|');  // Combine slugs into a regular expression pattern

// $circularSlugs = $circularSlugs ?: 'nonexistent_slug_that_will_never_match';    

// Route::get('{slug}', [FrontendController::class, 'circulars'])
//     ->where('slug', $circularSlugs ?? 'none');

// $achivementSlugs = DB::table('pages')
//     ->where('layout', 'achivements')
//     ->pluck('slug')
//     ->map(fn($slug) => preg_quote($slug, '/'))  // Escape special characters
//     ->implode('|');  // Combine slugs into a regular expression pattern

// $achivementSlugs = $achivementSlugs ?: 'nonexistent_slug_that_will_never_match';    

// Route::get('{slug1}', [FrontendController::class, 'achivements'])
//     ->where('slug', $achivementSlugs ?? 'none');

// Route::get('/contact', function () {
//     return view('frontend.pages.contact');
// })->name('contact');

Route::post('/submit-form', [FormController::class, 'submit'])->middleware(['protect.forms','recaptcha','throttle:3,1'])->name('form.submit');

// Group routes under the 'backend' prefix
Route::prefix('backend')->group(function () {

    // Public login/logout routes
    Route::get('/login', [AuthController::class, 'showLoginForm'])->middleware(['auth.guest', 'auth.backend.access'])->name('backend.login');
    Route::post('/login', [AuthController::class, 'login'])->middleware(['recaptcha','throttle:10,60'])->name('backend.login.submit');
    Route::get('/logout', [AuthController::class, 'logout'])->name('backend.logout');

    // Authenticated admin routes
    Route::middleware(['auth.backend'])->group(function () {
        Route::get('/dashboard', function () {
            return view('backend.dashboard');
        })->name('backend.dashboard');
    });

    // Uploads routes 
    Route::middleware(['auth.backend'])->resource('/uploaded-files', UploadController::class);
    Route::middleware(['auth.backend'])->controller(UploadController::class)->group(function () {
        Route::any('/uploaded-files/file-info', 'file_info')->name('uploaded-files.info');
        Route::get('/uploaded-files/destroy/{id}', 'destroy')->name('uploaded-files.destroy');
        Route::post('/bulk-uploaded-files-delete', 'bulk_uploaded_files_delete')->name('bulk-uploaded-files-delete');
        Route::get('/all-file', 'all_file');
        Route::post('/aiz-uploader', 'show_uploader');
        Route::post('/aiz-uploader/upload', 'upload');
        Route::get('/aiz-uploader/get-uploaded-files', 'get_uploaded_files');
        Route::post('/aiz-uploader/get_file_by_ids', 'get_preview_files');
        Route::get('/aiz-uploader/download/{id}', 'attachment_download')->name('download_attachment');   
        Route::get('/aiz-uploader/generate-all-thumbnail', 'generate_all_thumbnails');     
    }); 
    
    // Schools routes
    Route::middleware(['auth.backend'])->group(function () {
        Route::get('/schools', function () {
            return view('backend.schools.index');
        })->name('backend.schools');
    });   
    
    Route::middleware('auth.backend')->group(function () {
        Route::resource('companies', CompanyController::class);
    });  
    
    Route::middleware('auth.backend')->group(function () {
        Route::resource('team-categories', TeamCategoryController::class);
    });   

    Route::middleware('auth.backend')->group(function () {
        Route::resource('teams', TeamController::class);
    });   

    Route::middleware('auth.backend')->group(function () {
        Route::resource('campuses', CampusController::class);
    }); 

    Route::middleware('auth.backend')->group(function () {
        Route::resource('galleries', GalleryController::class);
    });   

    Route::middleware('auth.backend')->group(function () {
        Route::resource('pages', PageController::class);
    });  
    
    Route::middleware('auth.backend')->group(function () {
        Route::get('forms-by/{form_name}', [BackendFormController::class, 'index'])->name('forms.by');
    });
});


//Page Routes
Route::get('{slug}', function ($slug) {
    //$page = DB::table('pages')->where('slug', $slug)->first();
    $page = DB::table('pages')->where('slug', $slug)->where('company_id', config('custom.school_id'))->first();

    if (!$page) {
        abort(404);
    }

    switch ($page->layout) {
        case 'circulars':
            return app(FrontendController::class)->circulars($page->slug);
        case 'achivements':
            return app(FrontendController::class)->achivements($page->slug);
        case 'newsletter':
            return app(FrontendController::class)->newsletter($page->slug);  
        case 'default':
            return app(FrontendController::class)->default($page->slug);           
        default:
            abort(404, 'Route needs to be manually define.');
    }
})->where('slug', '.*');