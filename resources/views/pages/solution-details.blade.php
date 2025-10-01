@extends('layout.app')

@section('title', $solution->title . ' - MS3 Technology')

@section('content')
    <!-- Hero Section with Gradient Background -->
    <section class="relative pt-32 pb-20 sm:pt-40 sm:pb-28 overflow-hidden bg-gradient-to-br from-blue-600 via-indigo-600 to-purple-700">
        <!-- Animated Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
        </div>

        <!-- Decorative Blobs -->
        <div class="absolute top-20 left-10 w-64 sm:w-96 h-64 sm:h-96 bg-white/10 rounded-full mix-blend-overlay filter blur-3xl animate-pulse"></div>
        <div class="absolute bottom-20 right-10 w-72 sm:w-[28rem] h-72 sm:h-[28rem] bg-purple-400/20 rounded-full mix-blend-overlay filter blur-3xl animate-pulse" style="animation-delay: 2s;"></div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <!-- Icon -->
                <div class="inline-flex mb-6 sm:mb-8">
                    <div class="relative">
                        <div class="absolute inset-0 bg-white rounded-3xl blur-xl opacity-50"></div>
                        <div class="relative bg-white/20 backdrop-blur-sm rounded-3xl p-6 sm:p-8 border border-white/30">
                            <i class="{{ $solution->icon }} text-white text-5xl sm:text-6xl lg:text-7xl"></i>
                        </div>
                    </div>
                </div>

                <!-- Title -->
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white mb-4 sm:mb-6 leading-tight">
                    {{ $solution->title }}
                </h1>

                <!-- Breadcrumb -->
                <nav class="flex items-center justify-center space-x-2 text-white/80 text-sm sm:text-base">
                    <a href="{{ url('/') }}" class="hover:text-white transition-colors">Home</a>
                    <i class="fas fa-chevron-right text-xs"></i>
                    <span class="text-white font-medium">{{ $solution->title }}</span>
                </nav>
            </div>
        </div>

        <!-- Bottom Wave -->
        <div class="absolute bottom-0 left-0 right-0">
            <svg class="w-full h-16 sm:h-24 fill-current text-white dark:text-gray-900" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"></path>
            </svg>
        </div>
    </section>

    <!-- Solution Description Section -->
    <section class="py-16 sm:py-20 lg:py-24 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-5xl mx-auto">
                <!-- Description Card -->
                <div class="bg-gradient-to-br from-gray-50 to-blue-50 dark:from-gray-800 dark:to-blue-900/20 rounded-2xl sm:rounded-3xl p-8 sm:p-12 lg:p-16 shadow-xl border border-gray-200 dark:border-gray-700">
                    <div class="flex items-start gap-4 sm:gap-6 mb-6 sm:mb-8">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 sm:w-16 sm:h-16 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl sm:rounded-2xl flex items-center justify-center shadow-lg">
                                <i class="fas fa-info-circle text-white text-xl sm:text-2xl"></i>
                            </div>
                        </div>
                        <div class="flex-1">
                            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-gray-900 dark:text-white mb-2">
                                About This Solution
                            </h2>
                            <div class="w-20 h-1 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-full"></div>
                        </div>
                    </div>

                    <div class="prose prose-lg prose-blue dark:prose-invert max-w-none">
                        <p class="text-base sm:text-lg lg:text-xl text-gray-700 dark:text-gray-300 leading-relaxed">
                            {{ $solution->description }}
                        </p>
                    </div>

                    <!-- Key Features -->
                    <div class="mt-10 sm:mt-12 grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
                        <div class="flex items-center gap-3 sm:gap-4 p-4 sm:p-5 bg-white dark:bg-gray-800/50 rounded-xl border border-gray-200 dark:border-gray-700">
                            <div class="flex-shrink-0 w-10 h-10 sm:w-12 sm:h-12 bg-green-100 dark:bg-green-900/30 rounded-lg flex items-center justify-center">
                                <i class="fas fa-check-circle text-green-600 dark:text-green-400 text-lg sm:text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-sm sm:text-base font-semibold text-gray-900 dark:text-white">Proven Track Record</h3>
                                <p class="text-xs sm:text-sm text-gray-600 dark:text-gray-400">Trusted by leading companies</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-3 sm:gap-4 p-4 sm:p-5 bg-white dark:bg-gray-800/50 rounded-xl border border-gray-200 dark:border-gray-700">
                            <div class="flex-shrink-0 w-10 h-10 sm:w-12 sm:h-12 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center">
                                <i class="fas fa-rocket text-blue-600 dark:text-blue-400 text-lg sm:text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-sm sm:text-base font-semibold text-gray-900 dark:text-white">Scalable Solution</h3>
                                <p class="text-xs sm:text-sm text-gray-600 dark:text-gray-400">Grows with your business</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-3 sm:gap-4 p-4 sm:p-5 bg-white dark:bg-gray-800/50 rounded-xl border border-gray-200 dark:border-gray-700">
                            <div class="flex-shrink-0 w-10 h-10 sm:w-12 sm:h-12 bg-purple-100 dark:bg-purple-900/30 rounded-lg flex items-center justify-center">
                                <i class="fas fa-shield-alt text-purple-600 dark:text-purple-400 text-lg sm:text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-sm sm:text-base font-semibold text-gray-900 dark:text-white">Enterprise Security</h3>
                                <p class="text-xs sm:text-sm text-gray-600 dark:text-gray-400">Bank-level protection</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-3 sm:gap-4 p-4 sm:p-5 bg-white dark:bg-gray-800/50 rounded-xl border border-gray-200 dark:border-gray-700">
                            <div class="flex-shrink-0 w-10 h-10 sm:w-12 sm:h-12 bg-orange-100 dark:bg-orange-900/30 rounded-lg flex items-center justify-center">
                                <i class="fas fa-headset text-orange-600 dark:text-orange-400 text-lg sm:text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-sm sm:text-base font-semibold text-gray-900 dark:text-white">24/7 Support</h3>
                                <p class="text-xs sm:text-sm text-gray-600 dark:text-gray-400">Always here to help</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Clients Using This Solution Section -->
    @if($clients->count() > 0)
    <section class="py-16 sm:py-20 lg:py-24 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-6xl mx-auto">
                <!-- Section Header -->
                <div class="text-center mb-12 sm:mb-16">
                    <div class="inline-flex items-center justify-center gap-2 mb-4">
                        <div class="w-8 h-0.5 bg-gradient-to-r from-transparent to-blue-600 rounded-full"></div>
                        <i class="fas fa-handshake text-blue-600 dark:text-blue-400 text-2xl sm:text-3xl"></i>
                        <div class="w-8 h-0.5 bg-gradient-to-l from-transparent to-blue-600 rounded-full"></div>
                    </div>
                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 dark:text-white mb-4">
                        Trusted By Industry Leaders
                    </h2>
                    <p class="text-base sm:text-lg text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                        These leading companies trust our {{ $solution->title }} solution to power their business
                    </p>
                </div>

                <!-- Clients Grid -->
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 sm:gap-6 lg:gap-8">
                    @foreach($clients as $client)
                    <div class="group bg-white dark:bg-gray-900 rounded-xl sm:rounded-2xl p-6 sm:p-8 shadow-md hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 border border-gray-200 dark:border-gray-700">
                        <div class="aspect-square flex items-center justify-center">
                            @if($client->logo)
                                <img src="{{ asset('storage/' . $client->logo) }}" 
                                     alt="{{ $client->name }}" 
                                     class="max-w-full max-h-full object-contain filter grayscale group-hover:grayscale-0 transition-all duration-500">
                            @else
                                <div class="text-center">
                                    <i class="fas fa-building text-4xl sm:text-5xl text-gray-400 dark:text-gray-600 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors duration-500"></i>
                                    <p class="mt-3 text-sm sm:text-base font-semibold text-gray-700 dark:text-gray-300 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors duration-500">
                                        {{ $client->name }}
                                    </p>
                                </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Client Count Badge -->
                <div class="mt-10 sm:mt-12 text-center">
                    <div class="inline-flex items-center gap-3 px-6 sm:px-8 py-3 sm:py-4 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-full shadow-xl">
                        <i class="fas fa-users text-white text-lg sm:text-xl"></i>
                        <span class="text-white font-bold text-base sm:text-lg">
                            {{ $clients->count() }} {{ Str::plural('Company', $clients->count()) }} Trust This Solution
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- Call to Action Section -->
    <section class="relative py-16 sm:py-20 lg:py-24 bg-gradient-to-br from-blue-600 via-indigo-600 to-purple-700 overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=\'80\' height=\'80\' viewBox=\'0 0 80 80\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'1\'%3E%3Cpath d=\'M0 0h40v40H0V0zm40 40h40v40H40V40zm0-40h2l-2 2V0zm0 4l4-4h2l-6 6V4zm0 4l8-8h2L40 10V8zm0 4L52 0h2L40 14v-2zm0 4L56 0h2L40 18v-2zm0 4L60 0h2L40 22v-2zm0 4L64 0h2L40 26v-2zm0 4L68 0h2L40 30v-2zm0 4L72 0h2L40 34v-2zm0 4L76 0h2L40 38v-2zm0 4L80 0v2L42 40h-2zm4 0L80 4v2L46 40h-2zm4 0L80 8v2L50 40h-2zm4 0l28-28v2L54 40h-2zm4 0l24-24v2L58 40h-2zm4 0l20-20v2L62 40h-2zm4 0l16-16v2L66 40h-2zm4 0l12-12v2L70 40h-2zm4 0l8-8v2l-6 6h-2zm4 0l4-4v2l-2 2h-2z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
        </div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <div class="mb-6 sm:mb-8">
                    <div class="inline-flex items-center justify-center w-16 h-16 sm:w-20 sm:h-20 bg-white/20 backdrop-blur-sm rounded-full border-4 border-white/30">
                        <i class="fas fa-rocket text-white text-2xl sm:text-3xl"></i>
                    </div>
                </div>

                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-4 sm:mb-6">
                    Ready to Transform Your Business?
                </h2>
                <p class="text-base sm:text-lg lg:text-xl text-white/90 mb-8 sm:mb-10 max-w-2xl mx-auto">
                    Join the companies that trust {{ $solution->title }} to drive their success. Let's discuss how we can help you achieve your goals.
                </p>

                <div class="flex flex-col sm:flex-row items-center justify-center gap-4 sm:gap-6">
                    <a href="{{ url('/contact') }}" 
                       class="w-full sm:w-auto inline-flex items-center justify-center gap-3 px-8 py-4 bg-white text-blue-600 rounded-xl font-semibold text-base sm:text-lg shadow-2xl hover:shadow-3xl transform hover:-translate-y-1 transition-all duration-300 group">
                        <span>Get Started Today</span>
                        <i class="fas fa-arrow-right transform group-hover:translate-x-1 transition-transform"></i>
                    </a>
                    <a href="{{ url('/consultation') }}" 
                       class="w-full sm:w-auto inline-flex items-center justify-center gap-3 px-8 py-4 bg-white/10 backdrop-blur-sm text-white rounded-xl font-semibold text-base sm:text-lg border-2 border-white/30 hover:bg-white/20 transition-all duration-300 group">
                        <i class="fas fa-calendar-alt"></i>
                        <span>Book Consultation</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Decorative Elements -->
        <div class="absolute top-0 left-0 w-64 h-64 bg-white/5 rounded-full -translate-x-1/2 -translate-y-1/2 blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-purple-500/10 rounded-full translate-x-1/2 translate-y-1/2 blur-3xl"></div>
    </section>
@endsection
