<?php

return [

    /*
    |--------------------------------------------------------------------------
    | App Update Configuration
    |--------------------------------------------------------------------------
    |
    | This config file stores the latest version details for the private
    | Android app's self-update mechanism. The Flutter app pings the
    | /api/app-version endpoint to check if a newer APK is available.
    |
    | version_code: Incremental integer used to compare versions.
    |               Must be higher than the current app's build number.
    | version_name: User-facing version string (e.g., "2.0.0").
    | changelog:   Release notes shown to the user before downloading.
    | apk_path:    Relative path from storage_path() to the APK file.
    |
    */

    'version_code' => env('APP_UPDATE_VERSION_CODE', 2),
    'version_name' => env('APP_UPDATE_VERSION_NAME', '1.0.1'),
    'changelog' => env('APP_UPDATE_CHANGELOG', 'Bug fixes and performance improvements.'),

    /*
    |--------------------------------------------------------------------------
    | APK Storage Path
    |--------------------------------------------------------------------------
    |
    | The APK file is stored in the private storage directory to prevent
    | unauthorized access. The download endpoint serves it securely.
    |
    */
    'apk_path' => env('APP_UPDATE_APK_PATH', 'updates/app-release.apk'),
];
