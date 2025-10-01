@extends('layout.app')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-blue-600 via-blue-700 to-indigo-800 text-white py-20 overflow-hidden">
        <div class="absolute inset-0 bg-black opacity-10"></div>
        <div class="absolute inset-0">
            <div class="absolute top-10 left-10 w-72 h-72 bg-blue-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse"></div>
            <div class="absolute bottom-10 right-10 w-96 h-96 bg-indigo-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse delay-75"></div>
        </div>
        
        <div class="container mx-auto px-6 sm:px-8 lg:px-12 relative z-10">
            <div class="text-center max-w-4xl mx-auto">
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold mb-6 leading-tight">
                    Join Our Team
                </h1>
                <p class="text-lg sm:text-xl text-blue-100 mb-8 leading-relaxed">
                    Build your career with MS3 Technology. We're looking for talented individuals who are passionate about technology and innovation.
                </p>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <div class="flex items-center gap-2 text-blue-100">
                        <i class="fas fa-briefcase text-2xl"></i>
                        <span class="text-lg font-semibold">{{ count($careers->where('status', 'Open')) }} Open Positions</span>
                    </div>
                    <div class="hidden sm:block w-px h-8 bg-blue-300"></div>
                    <div class="flex items-center gap-2 text-blue-100">
                        <i class="fas fa-users text-2xl"></i>
                        <span class="text-lg font-semibold">Growing Team</span>
                    </div>
                    <div class="hidden sm:block w-px h-8 bg-blue-300"></div>
                    <div class="flex items-center gap-2 text-blue-100">
                        <i class="fas fa-rocket text-2xl"></i>
                        <span class="text-lg font-semibold">Fast-Paced Environment</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-16 bg-gray-50 dark:bg-gray-900">
        <div class="container mx-auto px-6 sm:px-8 lg:px-12">
            <!-- Filter and Search Section -->
            <div class="mb-12" x-data="{ 
                searchQuery: '', 
                selectedType: 'all', 
                selectedLocation: 'all',
                filteredCareers: {{ Js::from($careers) }}
            }">
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 mb-8">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <!-- Search Input -->
                        <div class="relative">
                            <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            <input 
                                type="text" 
                                x-model="searchQuery"
                                placeholder="Search positions..." 
                                class="w-full pl-12 pr-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                            />
                        </div>

                        <!-- Employment Type Filter -->
                        <div class="relative">
                            <i class="fas fa-briefcase absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            <select 
                                x-model="selectedType"
                                class="w-full pl-12 pr-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 appearance-none"
                            >
                                <option value="all">All Types</option>
                                <option value="full-time">Full-Time</option>
                                <option value="part-time">Part-Time</option>
                                <option value="contract">Contract</option>
                                <option value="internship">Internship</option>
                            </select>
                        </div>

                        <!-- Location Filter -->
                        <div class="relative">
                            <i class="fas fa-map-marker-alt absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            <select 
                                x-model="selectedLocation"
                                class="w-full pl-12 pr-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 appearance-none"
                            >
                                <option value="all">All Locations</option>
                                @foreach($careers->pluck('location')->unique()->sort() as $location)
                                    <option value="{{ $location }}">{{ $location }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Active Filters Display -->
                    <div class="mt-4 flex flex-wrap gap-2" x-show="searchQuery || selectedType !== 'all' || selectedLocation !== 'all'">
                        <template x-if="searchQuery">
                            <span class="inline-flex items-center gap-2 px-3 py-1 bg-blue-100 dark:bg-blue-900 text-blue-700 dark:text-blue-300 rounded-full text-sm">
                                Search: <strong x-text="searchQuery"></strong>
                                <button @click="searchQuery = ''" class="hover:text-blue-900 dark:hover:text-blue-100">
                                    <i class="fas fa-times"></i>
                                </button>
                            </span>
                        </template>
                        <template x-if="selectedType !== 'all'">
                            <span class="inline-flex items-center gap-2 px-3 py-1 bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-300 rounded-full text-sm">
                                Type: <strong x-text="selectedType"></strong>
                                <button @click="selectedType = 'all'" class="hover:text-green-900 dark:hover:text-green-100">
                                    <i class="fas fa-times"></i>
                                </button>
                            </span>
                        </template>
                        <template x-if="selectedLocation !== 'all'">
                            <span class="inline-flex items-center gap-2 px-3 py-1 bg-purple-100 dark:bg-purple-900 text-purple-700 dark:text-purple-300 rounded-full text-sm">
                                Location: <strong x-text="selectedLocation"></strong>
                                <button @click="selectedLocation = 'all'" class="hover:text-purple-900 dark:hover:text-purple-100">
                                    <i class="fas fa-times"></i>
                                </button>
                            </span>
                        </template>
                    </div>
                </div>

                <!-- Career Listings -->
                <div class="space-y-6">
                    @foreach($careers as $career)
                        <div 
                            x-show="
                                (searchQuery === '' || 
                                 '{{ strtolower($career->title) }}'.includes(searchQuery.toLowerCase()) || 
                                 '{{ strtolower($career->description) }}'.includes(searchQuery.toLowerCase())) &&
                                (selectedType === 'all' || selectedType === '{{ $career->employment_type }}') &&
                                (selectedLocation === 'all' || selectedLocation === '{{ $career->location }}')
                            "
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 transform translate-y-4"
                            x-transition:enter-end="opacity-100 transform translate-y-0"
                            class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100 dark:border-gray-700"
                        >
                            <div class="p-6 sm:p-8">
                                <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-4">
                                    <!-- Left Content -->
                                    <div class="flex-1">
                                        <div class="flex flex-wrap items-center gap-3 mb-4">
                                            <h3 class="text-2xl font-bold text-gray-900 dark:text-white">
                                                {{ $career->title }}
                                            </h3>
                                            @if($career->status === 'Open')
                                                <span class="inline-flex items-center px-3 py-1 bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-300 text-xs font-semibold rounded-full">
                                                    <i class="fas fa-circle text-xs mr-2 animate-pulse"></i>
                                                    Open
                                                </span>
                                            @else
                                                <span class="inline-flex items-center px-3 py-1 bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-400 text-xs font-semibold rounded-full">
                                                    Closed
                                                </span>
                                            @endif
                                        </div>

                                        <p class="text-gray-600 dark:text-gray-400 mb-6 leading-relaxed">
                                            {{ Str::limit($career->description, 200) }}
                                        </p>

                                        <div class="flex flex-wrap items-center gap-4 text-sm">
                                            <div class="flex items-center gap-2 text-gray-600 dark:text-gray-400">
                                                <i class="fas fa-briefcase text-blue-600 dark:text-blue-400"></i>
                                                <span class="font-medium">{{ ucfirst(str_replace('-', ' ', $career->employment_type)) }}</span>
                                            </div>
                                            <div class="flex items-center gap-2 text-gray-600 dark:text-gray-400">
                                                <i class="fas fa-map-marker-alt text-red-600 dark:text-red-400"></i>
                                                <span class="font-medium">{{ $career->location }}</span>
                                            </div>
                                            <div class="flex items-center gap-2 text-gray-600 dark:text-gray-400">
                                                <i class="fas fa-calendar text-purple-600 dark:text-purple-400"></i>
                                                <span class="font-medium">Posted {{ $career->created_at }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Right Content - Action Button -->
                                    <div class="flex-shrink-0">
                                        <a 
                                            href="{{ route('careers.details', $career->id) }}" 
                                            class="inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-lg font-semibold shadow-lg hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200 transform hover:scale-105 w-full lg:w-auto"
                                        >
                                            View Details
                                            <i class="fas fa-arrow-right ml-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <!-- No Results Message -->
                    <div 
                        x-show="!{{ Js::from($careers) }}.some(career => 
                            (searchQuery === '' || 
                             career.title.toLowerCase().includes(searchQuery.toLowerCase()) || 
                             career.description.toLowerCase().includes(searchQuery.toLowerCase())) &&
                            (selectedType === 'all' || selectedType === career.employment_type) &&
                            (selectedLocation === 'all' || selectedLocation === career.location)
                        )"
                        class="text-center py-16"
                    >
                        <div class="inline-flex items-center justify-center w-20 h-20 bg-gray-100 dark:bg-gray-800 rounded-full mb-6">
                            <i class="fas fa-search text-4xl text-gray-400"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">No Positions Found</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-6">Try adjusting your filters or search criteria</p>
                        <button 
                            @click="searchQuery = ''; selectedType = 'all'; selectedLocation = 'all'"
                            class="inline-flex items-center px-6 py-3 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition-colors duration-200"
                        >
                            <i class="fas fa-redo mr-2"></i>
                            Clear All Filters
                        </button>
                    </div>
                </div>
            </div>

            <!-- Why Join Us Section -->
            <div class="mt-20">
                <div class="text-center mb-12">
                    <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                        Why Join MS3 Technology?
                    </h2>
                    <p class="text-lg text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                        We offer more than just a job. Join a team that values innovation, growth, and work-life balance.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 text-center hover:shadow-2xl transition-shadow duration-300">
                        <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-100 dark:bg-blue-900 rounded-full mb-4">
                            <i class="fas fa-chart-line text-3xl text-blue-600 dark:text-blue-400"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Career Growth</h3>
                        <p class="text-gray-600 dark:text-gray-400">Continuous learning and advancement opportunities</p>
                    </div>

                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 text-center hover:shadow-2xl transition-shadow duration-300">
                        <div class="inline-flex items-center justify-center w-16 h-16 bg-green-100 dark:bg-green-900 rounded-full mb-4">
                            <i class="fas fa-users text-3xl text-green-600 dark:text-green-400"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Great Team</h3>
                        <p class="text-gray-600 dark:text-gray-400">Work with talented and passionate professionals</p>
                    </div>

                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 text-center hover:shadow-2xl transition-shadow duration-300">
                        <div class="inline-flex items-center justify-center w-16 h-16 bg-purple-100 dark:bg-purple-900 rounded-full mb-4">
                            <i class="fas fa-laptop-code text-3xl text-purple-600 dark:text-purple-400"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Latest Tech</h3>
                        <p class="text-gray-600 dark:text-gray-400">Work with cutting-edge technologies and tools</p>
                    </div>

                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 text-center hover:shadow-2xl transition-shadow duration-300">
                        <div class="inline-flex items-center justify-center w-16 h-16 bg-yellow-100 dark:bg-yellow-900 rounded-full mb-4">
                            <i class="fas fa-balance-scale text-3xl text-yellow-600 dark:text-yellow-400"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Work-Life Balance</h3>
                        <p class="text-gray-600 dark:text-gray-400">Flexible hours and remote work options</p>
                    </div>
                </div>
            </div>

            <!-- Call to Action -->
            <div class="mt-20 bg-gradient-to-r from-blue-600 to-indigo-700 rounded-2xl shadow-2xl p-8 sm:p-12 text-center">
                <h2 class="text-3xl sm:text-4xl font-bold text-white mb-4">
                    Don't See the Right Position?
                </h2>
                <p class="text-lg text-blue-100 mb-8 max-w-2xl mx-auto">
                    We're always looking for talented individuals. Send us your resume and we'll keep you in mind for future opportunities.
                </p>
                <a 
                    href="{{ route('contact') }}" 
                    class="inline-flex items-center px-8 py-4 bg-white text-blue-600 rounded-lg font-bold text-lg shadow-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-blue-600 transition-all duration-200 transform hover:scale-105"
                >
                    Get in Touch
                    <i class="fas fa-paper-plane ml-3"></i>
                </a>
            </div>
        </div>
    </section>
@endsection