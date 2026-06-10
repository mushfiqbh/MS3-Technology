<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AppUpdateController extends Controller
{
    /**
     * Check if a newer version of the app is available.
     *
     * Reads version info from the `settings` table so the admin can
     * update it via the admin panel without touching .env or config files.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function version()
    {
        $versionCode = DB::table('settings')
            ->where('key', 'app_version_code')
            ->value('value') ?? config('app-update.version_code');

        $versionName = DB::table('settings')
            ->where('key', 'app_version_name')
            ->value('value') ?? config('app-update.version_name');

        $changelog = DB::table('settings')
            ->where('key', 'app_changelog')
            ->value('value') ?? config('app-update.changelog');

        return response()->json([
            'version_name' => $versionName,
            'version_code' => (int) $versionCode,
            'changelog' => $changelog,
            'download_url' => url('/api/app/download'),
        ]);
    }

    /**
     * Securely download the latest APK file.
     *
     * The APK is stored in the private storage directory
     * (storage/app/private/updates/) to prevent direct public access.
     *
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse|\Illuminate\Http\JsonResponse
     */
    public function download()
    {
        $apkPath = DB::table('settings')
            ->where('key', 'app_apk_path')
            ->value('value') ?? config('app-update.apk_path');

        $path = storage_path('app/private/' . $apkPath);

        if (!file_exists($path)) {
            return response()->json(['error' => 'Update file not found.'], 404);
        }

        return response()->download($path, 'app-latest.apk', [
            'Content-Type' => 'application/vnd.android.package-archive',
        ]);
    }
}
