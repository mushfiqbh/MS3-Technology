<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AppUpdateController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| These routes are loaded by the RouteServiceProvider and are assigned
| the "api" middleware group. They are stateless (no session) by default.
|
*/

// =============================================================================
// App Update (Self-Updating APK) Routes
// =============================================================================

Route::prefix('app')->controller(AppUpdateController::class)->group(function () {

    // 1. Endpoint to check if an update is available
    //    Flutter app calls this to compare version_code with its build number
    Route::get('/version', 'version')->name('api.app.version');

    // 2. Endpoint to securely download the APK file
    //    Returns the APK from private storage as a download response
    Route::get('/download', 'download')->name('api.app.download');
});
