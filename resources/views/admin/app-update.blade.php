@extends('layout.admin')

@section('admin-content')
    <div class="mb-8">
        <div class="bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-700 rounded-2xl shadow-xl p-6 md:p-8 text-white relative overflow-hidden">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white bg-opacity-10 rounded-full -mr-32 -mt-32"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white bg-opacity-5 rounded-full -ml-24 -mb-24"></div>
            <div class="relative z-10">
                <div class="flex items-center gap-4">
                    <div class="w-14 h-14 bg-white bg-opacity-20 rounded-xl flex items-center justify-center">
                        <i class="fas fa-mobile-alt text-2xl"></i>
                    </div>
                    <div>
                        <h1 class="text-3xl md:text-4xl font-bold mb-1">App Update Manager</h1>
                        <p class="text-blue-100 text-lg">Publish new APK versions for the Android app</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Success Message --}}
    @if (session('success'))
        <div class="mb-6 bg-green-100 dark:bg-green-900 border-l-4 border-green-500 text-green-800 dark:text-green-200 p-4 rounded-lg shadow-md flex items-center gap-3">
            <i class="fas fa-check-circle text-green-500 text-xl"></i>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- Current Version Info --}}
        <div class="lg:col-span-1">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-100 dark:border-gray-700">
                <h2 class="text-lg font-bold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
                    <i class="fas fa-info-circle text-blue-500"></i>
                    Current Release
                </h2>

                <div class="space-y-4">
                    <div class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                        <span class="text-sm text-gray-600 dark:text-gray-400">Version Code</span>
                        <span class="text-sm font-bold text-gray-900 dark:text-white">{{ $versionCode }}</span>
                    </div>

                    <div class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                        <span class="text-sm text-gray-600 dark:text-gray-400">Version Name</span>
                        <span class="text-sm font-bold text-gray-900 dark:text-white">{{ $versionName }}</span>
                    </div>

                    <div class="p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                        <span class="text-sm text-gray-600 dark:text-gray-400 block mb-1">Changelog</span>
                        <p class="text-sm text-gray-900 dark:text-white">{{ $changelog ?: 'No changelog set.' }}</p>
                    </div>

                    <div class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                        <span class="text-sm text-gray-600 dark:text-gray-400">APK File</span>
                        @if ($apkExists)
                            <span class="inline-flex items-center gap-1 text-sm text-green-600 dark:text-green-400">
                                <i class="fas fa-check-circle"></i> Present
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1 text-sm text-red-500 dark:text-red-400">
                                <i class="fas fa-times-circle"></i> Missing
                            </span>
                        @endif
                    </div>

                    <div class="pt-2">
                        <p class="text-xs text-gray-500 dark:text-gray-400">
                            <i class="fas fa-info-circle mr-1"></i>
                            The Flutter app checks
                            <code class="bg-gray-200 dark:bg-gray-600 px-1 rounded text-xs">/api/app/version</code>
                            for updates on launch.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Upload Form --}}
        <div class="lg:col-span-2">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-100 dark:border-gray-700">
                <h2 class="text-lg font-bold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
                    <i class="fas fa-upload text-blue-500"></i>
                    Publish New Update
                </h2>

                <form action="{{ route('admin.app-update.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        {{-- Version Code --}}
                        <div>
                            <label for="version_code" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                Version Code <span class="text-red-500">*</span>
                            </label>
                            <input type="number" id="version_code" name="version_code"
                                value="{{ old('version_code', $versionCode) }}"
                                class="w-full px-4 py-2.5 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                placeholder="e.g. 21" min="1" required>
                            @error('version_code')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                Incremental integer. Must be higher than the current app's build number.
                            </p>
                        </div>

                        {{-- Version Name --}}
                        <div>
                            <label for="version_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                Version Name <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="version_name" name="version_name"
                                value="{{ old('version_name', $versionName) }}"
                                class="w-full px-4 py-2.5 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                placeholder="e.g. 2.0.0" required>
                            @error('version_name')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                User-facing version string (e.g., "2.0.0").
                            </p>
                        </div>
                    </div>

                    {{-- Changelog --}}
                    <div class="mb-6">
                        <label for="changelog" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Changelog
                        </label>
                        <textarea id="changelog" name="changelog" rows="4"
                            class="w-full px-4 py-2.5 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                            placeholder="What's new in this release?">{{ old('changelog', $changelog) }}</textarea>
                        @error('changelog')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- APK File Upload --}}
                    <div class="mb-6">
                        <label for="apk" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            APK File
                        </label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg hover:border-blue-400 dark:hover:border-blue-500 transition-colors cursor-pointer"
                            onclick="document.getElementById('apk').click()">
                            <div class="space-y-2 text-center">
                                <i class="fas fa-file-archive text-4xl text-gray-400"></i>
                                <div class="text-sm text-gray-600 dark:text-gray-400">
                                    <label for="apk" class="relative cursor-pointer rounded-md font-medium text-blue-600 dark:text-blue-400 hover:text-blue-500">
                                        <span>Click to upload an APK</span>
                                    </label>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">APK files only — up to 200MB</p>
                                </div>
                                <p id="file-name" class="text-xs text-gray-500 dark:text-gray-400 hidden"></p>
                            </div>
                        </div>
                        <input type="file" id="apk" name="apk" accept=".apk" class="hidden"
                            onchange="document.getElementById('file-name').textContent = this.files[0]?.name || ''; document.getElementById('file-name').classList.remove('hidden')">
                        @error('apk')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                            Leave empty to keep the existing APK. Only upload when you have a new build.
                        </p>
                    </div>

                    {{-- Submit --}}
                    <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-200 dark:border-gray-700">
                        <a href="{{ route('admin.dashboard') }}"
                            class="px-6 py-2.5 text-sm font-medium text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-gray-700 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors">
                            Cancel
                        </a>
                        <button type="submit"
                            class="px-8 py-2.5 bg-gradient-to-r from-blue-600 to-purple-600 text-white text-sm font-semibold rounded-lg hover:from-blue-700 hover:to-purple-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200 shadow-lg hover:shadow-xl">
                            <i class="fas fa-cloud-upload-alt mr-2"></i>
                            Publish Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
