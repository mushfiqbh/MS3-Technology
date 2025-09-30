@extends('layout.app')

@section('content')
    <div class="min-h-screen bg-gray-50 dark:bg-gray-900">
        <!-- Header Section -->
        <div
            class="bg-gradient-to-br from-blue-50 via-white to-purple-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 py-16 lg:py-24">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 dark:text-white mb-6">
                        Our <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">Valued
                            Clients</span>
                    </h1>
                    <p class="text-xl text-gray-600 dark:text-gray-400 max-w-3xl mx-auto mb-8">
                        Trusted by leading companies worldwide. We're proud to work with innovative organizations that drive
                        success through technology.
                    </p>
                    <div class="flex items-center justify-center space-x-8 text-sm text-gray-500 dark:text-gray-400">
                        <div class="flex items-center">
                            <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                            {{ count($clients) }}+ Happy Clients
                        </div>
                        <div class="flex items-center">
                            <span class="w-2 h-2 bg-blue-500 rounded-full mr-2"></span>
                            Global Reach
                        </div>
                        <div class="flex items-center">
                            <span class="w-2 h-2 bg-purple-500 rounded-full mr-2"></span>
                            Long-term Partnerships
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Clients Grid Section -->
        <div class="py-16 lg:py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                @if ($clients && count($clients) > 0)
                    <!-- Filter/Search Bar -->
                    <div class="mb-12" x-data="{ searchTerm: '' }">
                        <div class="max-w-md mx-auto">
                            <div class="relative">
                                <input type="text" x-model="searchTerm" placeholder="Search clients..."
                                    class="w-full px-4 py-3 pl-12 pr-4 text-gray-900 dark:text-white bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                                <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                        </div>

                        <!-- Clients Grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mt-8">
                            @foreach ($clients as $client)
                                <div class="client-card bg-white dark:bg-gray-800 rounded-2xl shadow-lg hover:shadow-xl border border-gray-200 dark:border-gray-700 transition-all duration-300 hover:scale-105 group"
                                    x-show="searchTerm === '' || '{{ strtolower($client->name) }}'.includes(searchTerm.toLowerCase())"
                                    x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="opacity-0 transform scale-95"
                                    x-transition:enter-end="opacity-100 transform scale-100">
                                    <!-- Client Logo -->
                                    <div class="p-6 pb-4">
                                        <div
                                            class="w-16 h-16 mx-auto mb-4 bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-700 dark:to-gray-600 rounded-xl flex items-center justify-center overflow-hidden group-hover:scale-110 transition-transform duration-300">
                                            @if ($client->logo && file_exists(public_path('images/' . $client->logo)))
                                                <img src="{{ asset('images/' . $client->logo) }}" alt="{{ $client->name }}"
                                                    class="w-full h-full object-contain rounded-lg"
                                                    onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                                                <div
                                                    class="w-full h-full bg-gradient-to-br from-blue-500 to-purple-600 rounded-lg items-center justify-center text-white font-bold text-lg hidden">
                                                    {{ substr($client->name, 0, 2) }}
                                                </div>
                                            @else
                                                <div
                                                    class="w-full h-full bg-gradient-to-br from-blue-500 to-purple-600 rounded-lg flex items-center justify-center text-white font-bold text-lg">
                                                    {{ substr($client->name, 0, 2) }}
                                                </div>
                                            @endif
                                        </div>

                                        <!-- Client Name -->
                                        <h3
                                            class="text-lg font-bold text-gray-900 dark:text-white text-center mb-2 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors duration-300">
                                            {{ $client->name }}
                                        </h3>

                                        <!-- Client Note/Description -->
                                        @if ($client->note)
                                            <p
                                                class="text-sm text-gray-600 dark:text-gray-400 text-center mb-3 line-clamp-2">
                                                {{ $client->note }}
                                            </p>
                                        @endif

                                        <!-- Client URL -->
                                        @if ($client->url)
                                            <div class="text-center">
                                                <a href="{{ $client->url }}" target="_blank" rel="noopener noreferrer"
                                                    class="inline-flex items-center text-sm text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 transition-colors duration-200 group-hover:underline">
                                                    <span class="truncate max-w-[140px]">
                                                        {{ parse_url($client->url, PHP_URL_HOST) ?: 'Visit Website' }}
                                                    </span>
                                                    <svg class="w-3 h-3 ml-1 opacity-0 group-hover:opacity-100 transition-opacity duration-300"
                                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                                        </path>
                                                    </svg>
                                                </a>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Solutions Badge -->
                                    @if ($client->solutions && $client->solutions->count() > 0)
                                        <div class="px-6 pb-4">
                                            <div class="flex flex-wrap gap-1 justify-center">
                                                @foreach ($client->solutions->take(3) as $solution)
                                                    <span
                                                        class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-400">
                                                        {{ $solution->name }}
                                                    </span>
                                                @endforeach
                                                @if ($client->solutions->count() > 3)
                                                    <span
                                                        class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-600 dark:bg-gray-700 dark:text-gray-400">
                                                        +{{ $client->solutions->count() - 3 }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>

                        <!-- No Results Message -->
                        <div x-show="searchTerm !== '' && document.querySelectorAll('.client-card[style*=\"display: none\"]').length === {{ count($clients) }}"
                            class="text-center py-16" style="display: none;">
                            <div
                                class="w-20 h-20 mx-auto mb-4 bg-gray-100 dark:bg-gray-800 rounded-full flex items-center justify-center">
                                <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">No clients found</h3>
                            <p class="text-gray-600 dark:text-gray-400">Try adjusting your search terms.</p>
                        </div>
                    </div>
                @else
                    <!-- Empty State -->
                    <div class="text-center py-20">
                        <div
                            class="w-24 h-24 mx-auto mb-6 bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-800 dark:to-gray-700 rounded-full flex items-center justify-center">
                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                            No Clients Yet
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-8 max-w-md mx-auto">
                            We're just getting started! Check back soon to see our growing list of satisfied clients.
                        </p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .client-card {
            backdrop-filter: blur(10px);
        }

        .client-card:hover {
            transform: translateY(-2px);
        }

        @media (max-width: 640px) {
            .client-card {
                margin-bottom: 1rem;
            }
        }
    </style>
@endsection
