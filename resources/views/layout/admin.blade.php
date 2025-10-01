<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel - MS3 Technology BD</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous">

    <!-- Alpine.js Cloak -->
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="bg-gray-50 dark:bg-gray-900">
    <div class="w-full flex relative" x-data="{ sidebarOpen: false, expanded: true }"
        @resize.window="if (window.innerWidth >= 1024) { sidebarOpen = false }">
        <!-- Mobile Overlay -->
        <div x-show="sidebarOpen" x-transition:enter="transition-opacity ease-linear duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" class="fixed inset-0 z-20 bg-transparent bg-opacity-50 lg:hidden"
            @click="sidebarOpen = false">
        </div>

        <!-- Sidebar -->
        <div x-show="sidebarOpen || window.innerWidth >= 1024"
            x-transition:enter="transition ease-in-out duration-300 transform"
            x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
            x-transition:leave="transition ease-in-out duration-300 transform" x-transition:leave-start="translate-x-0"
            x-transition:leave-end="-translate-x-full" :class="expanded ? 'w-56' : 'w-16'"
            class="fixed lg:relative inset-y-0 left-0 z-30 bg-gradient-to-b from-gray-50 to-gray-100 dark:from-gray-800 dark:to-gray-900 min-h-screen transition-all duration-300 ease-in-out overflow-y-auto shadow-2xl border-r border-gray-200 dark:border-gray-700">

            <div class="p-3">
                <!-- Header -->
                <div class="mb-4 flex items-center justify-between relative">
                    <div x-show="expanded" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 transform translate-x-2"
                        x-transition:enter-end="opacity-100 transform translate-x-0" class="flex items-center gap-2">
                        <div
                            class="w-8 h-8 bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg flex items-center justify-center shadow-md">
                            <i class="fas fa-cogs text-white text-sm"></i>
                        </div>
                        <div class="flex-1">
                            <h2 class="text-sm font-bold text-gray-800 dark:text-gray-100 whitespace-nowrap">
                                Admin Panel
                            </h2>
                            <p class="text-xs text-gray-500 dark:text-gray-400">MS3 Technology</p>
                        </div>
                    </div>

                    <!-- Toggle Button for Desktop -->
                    <button @click="expanded = !expanded"
                        class="hidden lg:flex w-6 h-6 bg-white dark:bg-gray-700 rounded shadow-sm items-center justify-center text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600 transition-all duration-200 border border-gray-200 dark:border-gray-600">
                        <i class="fas fa-chevron-left text-xs transition-transform duration-200"
                            :class="expanded ? 'rotate-0' : 'rotate-180    '"></i>
                    </button>

                    <!-- Close button for mobile -->
                    <button @click="sidebarOpen = false"
                        class="lg:hidden w-6 h-6 bg-white dark:bg-gray-700 rounded-full shadow-md flex items-center justify-center text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 transition-colors duration-200">
                        <i class="fas fa-times text-xs"></i>
                    </button>
                </div>

                <!-- Navigation -->
                <nav class="flex flex-col gap-1">
                    @php
                        $navItems = [
                            [
                                'url' => '/admin',
                                'icon' => 'fas fa-tachometer-alt',
                                'title' => 'Overview',
                                'route' => 'admin',
                            ],
                            [
                                'url' => '/admin/consultations',
                                'icon' => 'fas fa-comments',
                                'title' => 'Consultations',
                                'route' => 'admin/consultations*',
                            ],
                            [
                                'url' => '/admin/careers',
                                'icon' => 'fas fa-briefcase',
                                'title' => 'Careers',
                                'route' => 'admin/careers*',
                            ],
                            [
                                'url' => '/admin/clients',
                                'icon' => 'fas fa-user-friends',
                                'title' => 'Clients',
                                'route' => 'admin/clients*',
                            ],
                            [
                                'url' => '/admin/activities',
                                'icon' => 'fas fa-tasks',
                                'title' => 'Activities',
                                'route' => 'admin/activities*',
                            ],
                            [
                                'url' => '/admin/solutions',
                                'icon' => 'fas fa-lightbulb',
                                'title' => 'Solutions',
                                'route' => 'admin/solutions*',
                            ],
                            [
                                'url' => '/admin/experts',
                                'icon' => 'fas fa-user-tie',
                                'title' => 'Experts',
                                'route' => 'admin/experts*',
                            ],
                        ];
                    @endphp

                    @foreach ($navItems as $index => $item)
                        <a href="{{ url($item['url']) }}" @click="sidebarOpen = false"
                            class="group relative flex items-center gap-2 px-2 py-2 rounded-lg transition-all duration-200 hover:bg-white hover:shadow-sm dark:hover:bg-gray-700 {{ request()->is($item['route']) ? 'bg-gradient-to-r from-blue-500 to-blue-600 text-white shadow-md' : 'text-gray-600 dark:text-gray-300 hover:text-gray-800 dark:hover:text-white' }}"
                            title="{{ $item['title'] }}">

                            <div
                                class="w-7 h-7 flex items-center justify-center rounded {{ request()->is($item['route']) ? 'bg-white bg-opacity-20' : 'bg-gray-100 dark:bg-gray-600 group-hover:bg-gray-200 dark:group-hover:bg-gray-500' }} transition-colors duration-200 flex-shrink-0">
                                <i
                                    class="{{ $item['icon'] }} text-sm {{ request()->is($item['route']) ? 'text-gray-700' : 'text-gray-500 dark:text-gray-400 group-hover:text-gray-700 dark:group-hover:text-gray-200' }}"></i>
                            </div>

                            <span x-show="expanded"
                                x-transition:enter="transition ease-out duration-200 delay-{{ 50 + $index * 15 }}"
                                x-transition:enter-start="opacity-0 transform translate-x-2"
                                x-transition:enter-end="opacity-100 transform translate-x-0"
                                class="text-sm font-medium whitespace-nowrap">
                                {{ $item['title'] }}
                            </span>

                            <!-- Active indicator -->
                            @if (request()->is($item['route']))
                                <div class="absolute right-1 w-1.5 h-1.5 bg-white rounded-full opacity-75"></div>
                            @endif
                        </a>
                    @endforeach

                    <div class="ml-4 pt-4">
                        <a href="/" target="_blank"
                            class="text-sm font-medium text-gray-600 dark:text-gray-300 hover:text-gray-800 dark:hover:text-white">
                            <i class="fas fa-globe mr-2"></i>
                            <span x-show="expanded">Go To Website</span>
                        </a>
                    </div>

                    <!-- Theme Switcher -->
                    <div class="flex items-center mt-2">
                        <button x-data="{ dark: localStorage.getItem('theme') === 'dark' || (window.matchMedia('(prefers-color-scheme: dark)').matches && !localStorage.getItem('theme')) }"
                            @click="
                                    dark = !dark;
                                    if (dark) {
                                        document.documentElement.classList.add('dark');
                                        localStorage.setItem('theme', 'dark');
                                    } else {
                                        document.documentElement.classList.remove('dark');
                                        localStorage.setItem('theme', 'light');
                                    }
                                "
                            :aria-pressed="dark" :class="dark ? 'text-yellow-400' : 'text-gray-700'"
                            class="w-10 h-10 transition-colors duration-200 focus:outline-none" title="Toggle Theme">
                            <template x-if="dark">
                                <div class="ml-4 flex items-center gap-2">
                                    <i class="fas fa-moon"></i>
                                    <span x-show="expanded"
                                        class="text-gray-500 dark:text-gray-400 hover:text-gray-800 dark:hover:text-white select-none">
                                        <span>Theme</span>
                                    </span>
                                </div>
                            </template>
                            <template x-if="!dark">
                                <div class="ml-4 flex items-center gap-2">
                                    <i class="fas fa-sun"></i>
                                    <span x-show="expanded"
                                        class="text-gray-500 dark:text-gray-400 hover:text-gray-800 dark:hover:text-white select-none">
                                        <span>Theme</span>
                                    </span>
                                </div>
                            </template>
                        </button>
                    </div>

                    {{-- Logout --}}
                    <div class="pt-4 rounded-lg p-2">
                        <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit"
                                class="flex items-center justify-center text-white bg-red-400 dark:bg-red-900 gap-2 px-2 py-1 rounded-lg hover:underline cursor-pointer">
                                <i class="fas fa-sign-out-alt"></i>
                                <span x-show="expanded">Logout</span>
                            </button>
                        </form>
                    </div>
                </nav>

                <!-- Footer -->
                <div class="mt-auto pt-3">
                    <div x-show="expanded" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                        class="text-center">
                        <p class="text-xs text-gray-500 dark:text-gray-400 mb-1">v1.2.0</p>
                        <p class="text-xs text-gray-400 dark:text-gray-500">© 2025 MS3</p>
                    </div>
                    <div x-show="!expanded" class="flex justify-center">
                        <div class="w-6 h-0.5 bg-gray-300 dark:bg-gray-600 rounded-full"></div>
                    </div>

                    <!-- Expand/Collapse Button at Bottom for Mobile -->
                    <div x-show="!expanded" class="mt-2 flex justify-center lg:hidden">
                        <button @click="expanded = true"
                            class="w-8 h-8 bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg flex items-center justify-center text-white shadow-md hover:shadow-lg transition-all duration-200">
                            <i class="fas fa-chevron-right text-xs"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 lg:ml-0 transition-all duration-300 ease-in-out">
            <!-- Mobile Header -->
            <div
                class="lg:hidden bg-white dark:bg-gray-800 shadow-sm border-b border-gray-200 dark:border-gray-700 px-4 py-3 flex items-center justify-between">
                <button @click="sidebarOpen = true"
                    class="w-10 h-10 bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl flex items-center justify-center text-white shadow-lg hover:shadow-xl transition-all duration-200 hover:scale-105">
                    <i class="fas fa-bars text-lg"></i>
                </button>

                <div class="flex items-center gap-3">
                    <div
                        class="w-8 h-8 bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-cogs text-white text-sm"></i>
                    </div>
                    <h1 class="text-lg font-bold text-gray-800 dark:text-gray-100">Admin Panel</h1>
                </div>

                <div class="flex items-center gap-2">
                    <!-- Desktop Sidebar Toggle Button (visible when sidebar is hidden) -->
                    <button @click="expanded = true" x-show="!expanded"
                        class="hidden lg:flex w-10 h-10 bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl items-center justify-center text-white shadow-lg hover:shadow-xl transition-all duration-200 hover:scale-105">
                        <i class="fas fa-chevron-right text-sm"></i>
                    </button>

                    <div class="w-10 h-10 bg-gray-100 dark:bg-gray-700 rounded-xl flex items-center justify-center">
                        <i class="fas fa-user text-gray-500 dark:text-gray-400"></i>
                    </div>
                </div>
            </div>

            <!-- Content Area -->
            <div class="p-4 md:p-6 lg:p-8">
                @yield('admin-content')
            </div>
        </div>
    </div>

    <!-- Enhanced Styles -->
    <style>
        /* Smooth scrollbar for sidebar */
        .sidebar-scroll::-webkit-scrollbar {
            width: 4px;
        }

        .sidebar-scroll::-webkit-scrollbar-track {
            background: transparent;
        }

        .sidebar-scroll::-webkit-scrollbar-thumb {
            background: rgba(156, 163, 175, 0.5);
            border-radius: 2px;
        }

        .sidebar-scroll::-webkit-scrollbar-thumb:hover {
            background: rgba(156, 163, 175, 0.7);
        }

        /* Enhanced hover effects */
        .nav-item {
            position: relative;
            overflow: hidden;
        }

        .nav-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transition: left 0.5s;
        }

        .nav-item:hover::before {
            left: 100%;
        }

        /* Mobile optimizations */
        @media (max-width: 1023px) {
            .sidebar-mobile {
                transform: translateX(-100%);
            }

            .sidebar-mobile.open {
                transform: translateX(0);
            }
        }
    </style>

    <!-- Enhanced JavaScript -->
    <script>
        (function() {
            const userTheme = localStorage.getItem('theme');
            const systemDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            if (userTheme === 'dark' || (!userTheme && systemDark)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        })();

        // Initialize sidebar state
        document.addEventListener('DOMContentLoaded', function() {
            // Auto-close sidebar on mobile after navigation
            const sidebarLinks = document.querySelectorAll('nav a');
            sidebarLinks.forEach(link => {
                link.addEventListener('click', () => {
                    if (window.innerWidth < 1024) {
                        // Close sidebar on mobile after clicking a link
                        setTimeout(() => {
                            const sidebar = document.querySelector('[x-data]').__x.$data;
                            sidebar.sidebarOpen = false;
                        }, 100);
                    }
                });
            });

            // Handle window resize
            window.addEventListener('resize', () => {
                if (window.innerWidth >= 1024) {
                    const sidebar = document.querySelector('[x-data]').__x.$data;
                    sidebar.sidebarOpen = false;
                }
            });
        });

        // Keyboard navigation
        document.addEventListener('keydown', function(e) {
            // ESC key to close sidebar on mobile
            if (e.key === 'Escape' && window.innerWidth < 1024) {
                const sidebar = document.querySelector('[x-data]').__x.$data;
                sidebar.sidebarOpen = false;
            }
        });
    </script>
</body>

</html>
