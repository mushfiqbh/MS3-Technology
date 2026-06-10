<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PublicPageController;
use Illuminate\Support\Facades\Artisan;

Route::get('/up', function () {
    Artisan::call('migrate', [
        '--force' => true,
    ]);

    Artisan::call('optimize:clear');

    return redirect('/');
});

// =============================================================================
// AUTHENTICATION ROUTES
// =============================================================================

Route::controller(AuthController::class)->group(function () {
    // Redirect /login
    Route::get('/login', [AuthController::class, 'login'])->name('login');

    // Logout Route
    Route::post('/admin/logout', 'logout')->name('admin.logout');
});


// =============================================================================
// PUBLIC ROUTES
// =============================================================================

// Home Page
Route::get('/', [PublicPageController::class, 'index'])->name('home');

// Public Pages
Route::get('/experts', [PublicPageController::class, 'experts'])->name('experts');
Route::get('/clients', [PublicPageController::class, 'clients'])->name('clients');
Route::get('/activities', [PublicPageController::class, 'activities'])->name('activities');
Route::get('/activities/{id}', [PublicPageController::class, 'activityDetails'])->name('activities.details');
Route::get('/careers', [PublicPageController::class, 'careers'])->name('careers');
Route::get('/careers/{id}', [PublicPageController::class, 'careerDetails'])->name('careers.details');
Route::get('/solutions/{slug}', [PublicPageController::class, 'solutionDetails'])->name('solutions.details');


// Additional Public Pages
Route::get('/contact', [PublicPageController::class, 'contact'])->name('contact');
Route::get('/about-us', [PublicPageController::class, 'aboutUs'])->name('about');
Route::get('/privacy-policy', [PublicPageController::class, 'privacyPolicy'])->name('privacy');
Route::get('/terms-of-service', [PublicPageController::class, 'termsOfService'])->name('terms');

// Consultation
Route::get('/consultation', [PublicPageController::class, 'showConsultationForm'])->name('consultation.form');
Route::post('/consultation/submit', [PublicPageController::class, 'submitConsultation'])->name('consultation.submit');

// =============================================================================
// ADMIN ROUTES (Protected)
// =============================================================================

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth'])
    ->controller(AdminController::class)
    ->group(function () {

        // Dashboard
        Route::get('/', 'index')->name('dashboard');
        Route::get('/dashboard', 'index')->name('dashboard');
        Route::post('/update-settings', 'updateSettings')->name('update.settings');

        // Experts Management
        Route::get('/experts', 'experts')->name('experts.index');
        Route::prefix('experts')->name('experts.')->group(function () {
            Route::post('/', 'createExpert')->name('create');
            Route::put('/{id}', 'updateExpert')->name('update');
            Route::delete('/{id}', 'deleteExpert')->name('delete');
        });

        // Careers Management
        Route::get('/careers', 'careers')->name('careers.index');
        Route::prefix('careers')->name('careers.')->group(function () {
            Route::post('/', 'createCareer')->name('create');
            Route::put('/{id}', 'updateCareer')->name('update');
            Route::delete('/{id}', 'deleteCareer')->name('delete');
        });

        // Clients Management
        Route::get('/clients', 'clients')->name('clients.index');
        Route::prefix('clients')->name('clients.')->group(function () {
            Route::post('/', 'createClient')->name('create');
            Route::put('/{id}', 'updateClient')->name('update');
            Route::delete('/{id}', 'deleteClient')->name('delete');
        });

        // Solutions Management
        Route::get('/solutions', 'solutions')->name('solutions.index');
        Route::prefix('solutions')->name('solutions.')->group(function () {
            Route::post('/', 'createSolution')->name('create');
            Route::put('/{id}', 'updateSolution')->name('update');
            Route::delete('/{id}', 'deleteSolution')->name('delete');
        });

        // Activities Management
        Route::get('/activities', 'activities')->name('activities.index');
        Route::prefix('activities')->name('activities.')->group(function () {
            Route::post('/', 'createActivity')->name('create');
            Route::post('/{id}/upload-image', 'uploadActivityImage')->name('uploadImage');
            Route::put('/{id}', 'updateActivity')->name('update');
            Route::delete('/{activityId}', 'deleteActivity')->name('delete');
            Route::delete('/delete-image/{activityImageId}', 'deleteActivityImage')->name('deleteImage');
        });

        // Consultations Management
        Route::get('/consultations', 'consultations')->name('consultations.index');
        Route::prefix('consultations')->name('consultations.')->group(function () {
            Route::post('/', 'createConsultation')->name('create');
            Route::put('/{id}', 'updateConsultation')->name('update');
            Route::delete('/{id}', 'deleteConsultation')->name('delete');
        });

        // App Update Management
        Route::get('/app-update', 'appUpdate')->name('app-update.index');
        Route::post('/app-update', 'updateAppUpdate')->name('app-update.update');
    });
