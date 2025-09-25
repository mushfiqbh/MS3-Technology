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
        ['label' => 'Clients', 'value' => 150, 'text_color' => 'text-blue-600', 'dark_text_color' => 'text-blue-400'],
        ['label' => 'Projects', 'value' => 320, 'text_color' => 'text-green-600', 'dark_text_color' => 'text-green-400'],
        ['label' => 'Employees', 'value' => 75, 'text_color' => 'text-purple-600', 'dark_text_color' => 'text-purple-400'],
        ['label' => 'Awards', 'value' => 25, 'text_color' => 'text-yellow-600', 'dark_text_color' => 'text-yellow-400'],
        ['label' => 'Partners', 'value' => 40, 'text_color' => 'text-teal-600', 'dark_text_color' => 'text-teal-400'],
    ];

    $blogs = DB::table('blogs')->latest()->take(7)->get();

    return view('pages.home', compact('clients', 'stats', 'blogs'));
});

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
