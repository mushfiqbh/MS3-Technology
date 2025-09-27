<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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

    $blogs = DB::table('blogs')->latest()->take(7)->get();

    return view('pages.home', compact('clients', 'stats', 'blogs'));
});

Route::get('/experts', function () {
    $experts = DB::table('experts')->get();
    return view('pages.experts', compact('experts'));
})->name('experts');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

Route::get('/blogs', function () {
    $category = request('category');
    $query = DB::table('blogs')->latest();
    if ($category) {
        $query->where('category', $category);
    }
    $blogs = $query->paginate(8);
    $categories = DB::table('blogs')->pluck('category')->unique();

    return view('pages.blogs', compact('blogs', 'categories'));
})->name('blog.index');


Route::get('/blogs/{slug}', function ($slug) {
    $blog = DB::table('blogs')->where('slug', $slug)->first();
    if (!$blog) {
        abort(404);
    }
    $recentBlogs = DB::table('blogs')->latest()->take(5)->get();
    return view('pages.blog-detail', compact('blog', 'recentBlogs'));
})->name('blog.show');



// =============================================================================
// PUBLIC ROUTES
// =============================================================================

// Home Page
// Route::get('/', [HomeController::class, 'index'])->name('home');

// Public Pages
// Route::controller(PublicPageController::class)->group(function () {
//     Route::get('/about', 'about')->name('about');
//     Route::get('/contact', 'contact')->name('contact');
//     Route::get('/gallery', 'gallery')->name('gallery');
//     Route::get('/features', 'features')->name('features');
//     Route::get('/customers', 'customers')->name('customers');
//     Route::get('/news', 'news')->name('news.index');
//     Route::get('/news/{slug}', 'showNews')->name('news.show');
// });



// =============================================================================
// AUTHENTICATION ROUTES
// =============================================================================

// Route::controller(AuthController::class)->group(function () {
//     // Login Routes
//     Route::get('/login', 'redirectToAdminLogin')->name('login'); // Laravel auth system compatibility
//     Route::get('/admin/login', 'showLoginForm')->name('admin.login');
//     Route::post('/admin/login', 'login')->name('admin.login.submit');

//     // Logout Route
//     Route::post('/admin/logout', 'logout')->name('admin.logout');
// });



// =============================================================================
// ADMIN ROUTES (Protected)
// =============================================================================

// Route::prefix('admin')
//     ->name('admin.')
//     ->middleware(['auth'])
//     ->controller(AdminController::class)
//     ->group(function () {

//         // Dashboard
//         Route::get('/', 'index')->name('index');

//         // Gallery Management
//         Route::get('/galleries', 'galleries')->name('galleries'); // Direct route for backward compatibility
//         Route::prefix('galleries')->name('galleries.')->group(function () {
//             Route::post('/', 'storeGallery')->name('store');
//             Route::delete('/{id}', 'deleteGallery')->name('delete');
//         });

       
//     });
