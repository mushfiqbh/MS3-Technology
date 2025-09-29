<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    $clients = [
        (object)['name' => 'Client 1', 'logo' => '/images/idea-logo.webp'],
        (object)['name' => 'Client 2', 'logo' => '/images/idea-logo.webp'],
        (object)['name' => 'Client 3', 'logo' => '/images/idea-logo.webp'],
        (object)['name' => 'Client 4', 'logo' => '/images/idea-logo.webp'],
        (object)['name' => 'Client 5', 'logo' => '/images/idea-logo.webp'],
        // Add more clients as needed
    ];
    $stats = [
        ['label' => 'Happy Clients', 'value' => 150],
        ['label' => 'Completed Projects', 'value' => 320],
        ['label' => 'Employees', 'value' => 75],
        ['label' => 'Awards', 'value' => 25],
        ['label' => 'Partners', 'value' => 40],
    ];

    return view('pages.home', compact('clients', 'stats'));
});

Route::get('/experts', function () {
    $experts = DB::table('experts')->get();
    return view('pages.experts', compact('experts'));
})->name('experts');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');


// =============================================================================
// PUBLIC ROUTES
// =============================================================================

// Home Page
// Route::get('/', [HomeController::class, '])->name('home');

// Public Pages
// Route::controller(PublicPageController::class)->group(function () {
//     Route::get('/about', 'about')->name('about');
//     Route::get('/contact', 'contact')->name('contact');
//     Route::get('/gallery', 'gallery')->name('gallery');
//     Route::get('/features', 'features')->name('features');
//     Route::get('/customers', 'customers')->name('customers');
//     Route::get('/news', 'news')->name('news');
//     Route::get('/news/{slug}', 'showNews')->name('news.show');
// });



// =============================================================================
// AUTHENTICATION ROUTES
// =============================================================================

Route::controller(AuthController::class)->group(function () {
    // Login Routes
    Route::get('/login', 'redirectToAdminLogin')->name('login'); // Laravel auth system compatibility
    Route::get('/admin/login', 'showLoginForm')->name('admin.login');
    Route::post('/admin/login', 'login')->name('admin.login.submit');

    // Logout Route
    Route::post('/admin/logout', 'logout')->name('admin.logout');
});



// =============================================================================
// ADMIN ROUTES (Protected)
// =============================================================================

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth'])
    ->controller(AdminController::class)
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', 'index')->name('dashboard');

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
            Route::put('/{id}', 'updateActivity')->name('update');
            Route::delete('/{id}', 'deleteActivity')->name('delete');
        });

        // Consultations Management
        Route::get('/consultations', 'consultations')->name('consultations.index');
        Route::prefix('consultations')->name('consultations.')->group(function () {
            Route::post('/', 'createConsultation')->name('create');
            Route::put('/{id}', 'updateConsultation')->name('update');
            Route::delete('/{id}', 'deleteConsultation')->name('delete');
        });
    });
