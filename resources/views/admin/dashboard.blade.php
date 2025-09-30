@extends('layout.admin')

@section('admin-content')
    <!-- Welcome Header -->
    <div class="mb-8">
        <div
            class="bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-700 rounded-2xl shadow-xl p-6 md:p-8 text-white relative overflow-hidden">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white bg-opacity-10 rounded-full -mr-32 -mt-32"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white bg-opacity-5 rounded-full -ml-24 -mb-24"></div>
            <div class="relative z-10">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                    <div>
                        <h1 class="text-3xl md:text-4xl font-bold mb-2">Welcome Back, Admin! 👋</h1>
                        <p class="text-blue-100 text-lg">{{ \Carbon\Carbon::now('Asia/Dhaka')->format('l, F j, Y') }}</p>
                        <p class="text-blue-200 mt-1">Here's what's happening with MS3 Technology today</p>
                    </div>
                    <div class="mt-4 md:mt-0">
                        <div class="bg-teal-500 bg-opacity-20 backdrop-blur-sm rounded-xl p-4 text-center">
                            <div class="text-2xl font-bold">{{ \Carbon\Carbon::now('Asia/Dhaka')->format('h:i A') }}</div>
                            <div class="text-sm text-blue-100">BST (UTC+6)</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 mb-8">
        <!-- Statistics Cards -->
        @php
            $statsCards = [
                [
                    'name' => 'Experts',
                    'icon' => 'fas fa-user-tie',
                    'route' => 'admin.experts.index',
                    'color' => 'blue',
                    'gradient' => 'from-blue-500 to-blue-600',
                ],
                [
                    'name' => 'Clients',
                    'icon' => 'fas fa-user-friends',
                    'route' => 'admin.clients.index',
                    'color' => 'green',
                    'gradient' => 'from-green-500 to-green-600',
                ],
                [
                    'name' => 'Solutions',
                    'icon' => 'fas fa-lightbulb',
                    'route' => 'admin.solutions.index',
                    'color' => 'yellow',
                    'gradient' => 'from-yellow-500 to-orange-500',
                ],
                [
                    'name' => 'Activities',
                    'icon' => 'fas fa-tasks',
                    'route' => 'admin.activities.index',
                    'color' => 'purple',
                    'gradient' => 'from-purple-500 to-purple-600',
                ],
            ];
        @endphp

        @foreach ($statsCards as $card)
            <a href="{{ route($card['route']) }}" class="group">
                <div
                    class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 transform hover:scale-105 transition-all duration-300 hover:shadow-xl border border-gray-100 dark:border-gray-700">
                    <div class="flex items-center justify-between mb-4">
                        <div
                            class="w-12 h-12 bg-gradient-to-r {{ $card['gradient'] }} rounded-lg flex items-center justify-center shadow-lg">
                            <i class="{{ $card['icon'] }} text-white text-xl"></i>
                        </div>
                        <div
                            class="transition-colors duration-200">
                            <i class="fas fa-arrow-right text-lg"></i>
                        </div>
                    </div>
                    <h3 class="text-gray-900 dark:text-white font-medium mb-1">Total {{ $card['name'] }}</h3>
                    <div class="flex items-baseline">
                        <p class="text-3xl font-bold text-gray-600 dark:text-gray-400">
                            {{ $records[Str::lower($card['name'])] ?? 0 }}</p>
                    </div>
                    <div class="mt-3">
                        <div class="bg-gray-200 dark:bg-gray-700 rounded-full h-1.5">
                            <div class="h-1.5 rounded-full"
                                style="width: {{ rand(60, 95) }}%"></div>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>


    <!-- Management Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
        @foreach ([['name' => 'Careers', 'icon' => 'fas fa-briefcase', 'route' => 'admin.careers.index', 'color' => 'emerald', 'description' => 'Manage job postings'], ['name' => 'Consultations', 'icon' => 'fas fa-comments', 'route' => 'admin.consultations.index', 'color' => 'emerald', 'description' => 'Handle client consultations']] as $module)
            <a href="{{ route($module['route']) }}"
                class="group block bg-white dark:bg-gray-800 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 border border-gray-100 dark:border-gray-700 hover:border-{{ $module['color'] }}-200 dark:hover:border-{{ $module['color'] }}-700">
                <div class="flex items-center justify-between mb-4">
                    <div
                        class="w-14 h-14 bg-gradient-to-r from-{{ $module['color'] }}-400 to-{{ $module['color'] }}-600 rounded-xl flex items-center justify-center shadow-lg group-hover:shadow-xl transition-shadow duration-300">
                        <i class="{{ $module['icon'] }} text-gray-900 dark:text-white text-2xl"></i>
                    </div>
                    <div
                        class="transition-colors duration-200">
                        <i class="fas fa-arrow-right text-xl"></i>
                    </div>
                </div>

                <h2
                    class="text-xl font-bold text-gray-900 dark:text-white mb-2 group-hover:text-{{ $module['color'] }}-600 dark:group-hover:text-{{ $module['color'] }}-400 transition-colors duration-200">
                    {{ $module['name'] }}
                </h2>
                <p class="text-gray-600 dark:text-gray-400 text-sm mb-4">{{ $module['description'] }}</p>

                <div class="flex items-center">
                    <span class="text-3xl font-bold text-gray-900 dark:text-white">
                        {{ $records[Str::lower($module['name'])] ?? 0 }}
                    </span>
                    <span
                        class="text-xs text-gray-500 dark:text-gray-400 bg-gray-100 dark:bg-gray-700 px-2 py-1 rounded-full">
                        Total Records
                    </span>
                </div>

                <div class="mt-4 pt-4 border-t border-gray-200 dark:border-gray-600">
                    <div
                        class="flex items-center text-sm text-{{ $module['color'] }}-600 dark:text-{{ $module['color'] }}-400">
                        <i class="fas fa-chart-line mr-2"></i>
                        <span>Manage & Monitor</span>
                    </div>
                </div>
            </a>
        @endforeach

        <div
            class="group block bg-white dark:bg-gray-800 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 border border-gray-100 dark:border-gray-700 hover:border-{{ $module['color'] }}-200 dark:hover:border-{{ $module['color'] }}-700">
            <form action="{{ route('admin.update.settings') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="hero_video" id="hero_video" accept="video/*"
                    class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4
                    file:rounded-full file:border-0
                    file:text-sm file:font-semibold
                    file:bg-blue-50 file:text-blue-700
                    hover:file:bg-blue-100
                    cursor-pointer
                    " />

                <button type="submit"
                    class="mt-4 w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors duration-300">
                    Update Hero Video
                </button>
            </form>

            {{-- Preview --}}
            <div class="mt-6">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Current Hero Media</h3>
                <video controls class="w-full rounded-lg shadow-lg">
                    <source src="{{ asset('storage/' . $heroVideo) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
    </div>

    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translate3d(0, 40px, 0);
            }

            to {
                opacity: 1;
                transform: translate3d(0, 0, 0);
            }
        }

        .animate-fadeInUp {
            animation: fadeInUp 0.6s ease-out;
        }
    </style>

    <script>
        // Add subtle animations on page load
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.group');
            cards.forEach((card, index) => {
                setTimeout(() => {
                    card.classList.add('animate-fadeInUp');
                }, index * 100);
            });
        });

        // Auto-refresh time
        setInterval(() => {
            const timeElement = document.querySelector('.text-2xl.font-bold');
            if (timeElement) {
                timeElement.textContent = new Date().toLocaleTimeString([], {
                    hour: '2-digit',
                    minute: '2-digit'
                });
            }
        }, 60000);
    </script>
@endsection
