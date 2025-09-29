@extends('layout.app')

@section('content')
    <div class="w-full flex">
        <div x-data="{ expanded: false }"
             @mouseenter="expanded = true" 
             @mouseleave="expanded = false"
             :class="expanded ? 'w-56' : 'w-18'"
             class="bg-gray-100 dark:bg-gray-800 min-h-screen transition-all duration-300 ease-in-out overflow-hidden shadow-lg">
            
            <div class="p-4">
                <!-- Header -->
                <div class="mb-8 flex items-center gap-3">
                    <i class="fas fa-cogs text-blue-500 dark:text-blue-300 text-xl"></i>
                    <h2 x-show="expanded" 
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 transform translate-x-2"
                        x-transition:enter-end="opacity-100 transform translate-x-0"
                        class="text-lg font-bold text-blue-700 dark:text-blue-300 whitespace-nowrap">
                        Admin Dashboard
                    </h2>
                </div>

                <!-- Navigation -->
                <nav class="flex flex-col gap-2">
                    <a href="{{ url('/admin/dashboard') }}"
                        class="group flex items-center gap-3 px-3 py-2 rounded-lg transition-all duration-200 hover:bg-blue-100 dark:hover:bg-blue-900 {{ request()->is('admin/dashboard') ? 'bg-blue-600 text-white shadow' : 'text-gray-700 dark:text-gray-200' }}"
                        title="Overview">
                        <i class="fas fa-tachometer-alt text-lg"></i>
                        <span x-show="expanded" 
                              x-transition:enter="transition ease-out duration-200 delay-75"
                              x-transition:enter-start="opacity-0 transform translate-x-2"
                              x-transition:enter-end="opacity-100 transform translate-x-0"
                              class="whitespace-nowrap">
                            Overview
                        </span>
                    </a>
                    
                    <a href="{{ url('/admin/consultations') }}"
                        class="group flex items-center gap-3 px-3 py-2 rounded-lg transition-all duration-200 hover:bg-blue-100 dark:hover:bg-blue-900 {{ request()->is('admin/consultations*') ? 'bg-blue-600 text-white shadow' : 'text-gray-700 dark:text-gray-200' }}"
                        title="Consultations">
                        <i class="fas fa-comments text-lg"></i>
                        <span x-show="expanded" 
                              x-transition:enter="transition ease-out duration-200 delay-100"
                              x-transition:enter-start="opacity-0 transform translate-x-2"
                              x-transition:enter-end="opacity-100 transform translate-x-0"
                              class="whitespace-nowrap">
                            Consultations
                        </span>
                    </a>
                    
                    <a href="{{ url('/admin/careers') }}"
                        class="group flex items-center gap-3 px-3 py-2 rounded-lg transition-all duration-200 hover:bg-blue-100 dark:hover:bg-blue-900 {{ request()->is('admin/careers*') ? 'bg-blue-600 text-white shadow' : 'text-gray-700 dark:text-gray-200' }}"
                        title="Careers">
                        <i class="fas fa-briefcase text-lg"></i>
                        <span x-show="expanded" 
                              x-transition:enter="transition ease-out duration-200 delay-125"
                              x-transition:enter-start="opacity-0 transform translate-x-2"
                              x-transition:enter-end="opacity-100 transform translate-x-0"
                              class="whitespace-nowrap">
                            Careers
                        </span>
                    </a>
                    
                    <a href="{{ url('/admin/clients') }}"
                        class="group flex items-center gap-3 px-3 py-2 rounded-lg transition-all duration-200 hover:bg-blue-100 dark:hover:bg-blue-900 {{ request()->is('admin/clients*') ? 'bg-blue-600 text-white shadow' : 'text-gray-700 dark:text-gray-200' }}"
                        title="Clients">
                        <i class="fas fa-user-friends text-lg"></i>
                        <span x-show="expanded" 
                              x-transition:enter="transition ease-out duration-200 delay-150"
                              x-transition:enter-start="opacity-0 transform translate-x-2"
                              x-transition:enter-end="opacity-100 transform translate-x-0"
                              class="whitespace-nowrap">
                            Clients
                        </span>
                    </a>
                    
                    <a href="{{ url('/admin/activities') }}"
                        class="group flex items-center gap-3 px-3 py-2 rounded-lg transition-all duration-200 hover:bg-blue-100 dark:hover:bg-blue-900 {{ request()->is('admin/activities*') ? 'bg-blue-600 text-white shadow' : 'text-gray-700 dark:text-gray-200' }}"
                        title="Activities">
                        <i class="fas fa-tasks text-lg"></i>
                        <span x-show="expanded" 
                              x-transition:enter="transition ease-out duration-200 delay-175"
                              x-transition:enter-start="opacity-0 transform translate-x-2"
                              x-transition:enter-end="opacity-100 transform translate-x-0"
                              class="whitespace-nowrap">
                            Activities
                        </span>
                    </a>
                    
                    <a href="{{ url('/admin/solutions') }}"
                        class="group flex items-center gap-3 px-3 py-2 rounded-lg transition-all duration-200 hover:bg-blue-100 dark:hover:bg-blue-900 {{ request()->is('admin/solutions*') ? 'bg-blue-600 text-white shadow' : 'text-gray-700 dark:text-gray-200' }}"
                        title="Solutions">
                        <i class="fas fa-lightbulb text-lg"></i>
                        <span x-show="expanded" 
                              x-transition:enter="transition ease-out duration-200 delay-200"
                              x-transition:enter-start="opacity-0 transform translate-x-2"
                              x-transition:enter-end="opacity-100 transform translate-x-0"
                              class="whitespace-nowrap">
                            Solutions
                        </span>
                    </a>
                    
                    <a href="{{ url('/admin/experts') }}"
                        class="group flex items-center gap-3 px-3 py-2 rounded-lg transition-all duration-200 hover:bg-blue-100 dark:hover:bg-blue-900 {{ request()->is('admin/experts*') ? 'bg-blue-600 text-white shadow' : 'text-gray-700 dark:text-gray-200' }}"
                        title="Experts">
                        <i class="fas fa-user-tie text-lg"></i>
                        <span x-show="expanded" 
                              x-transition:enter="transition ease-out duration-200 delay-225"
                              x-transition:enter-start="opacity-0 transform translate-x-2"
                              x-transition:enter-end="opacity-100 transform translate-x-0"
                              class="whitespace-nowrap">
                            Experts
                        </span>
                    </a>
                </nav>
            </div>
        </div>

        <div class="min-w-3/4 flex-1 p-6 transition-all duration-300 ease-in-out">
            @yield('admin-content')
        </div>
    </div>
@endsection
