<section
    class="lg:px-20 relative min-h-[calc(100vh-5rem)] bg-gradient-to-br from-blue-50 via-white to-indigo-50 dark:from-gray-900 dark:via-gray-800 dark:to-blue-900 overflow-hidden">
    <!-- Background Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div
            class="absolute -top-40 -right-40 w-80 h-80 bg-blue-400 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob">
        </div>
        <div
            class="absolute -bottom-40 -left-40 w-80 h-80 bg-purple-400 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-2000">
        </div>
        <div
            class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-80 h-80 bg-pink-400 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-4000">
        </div>
    </div>

    <div style="padding: 20px" class="relative container mx-auto px-6 sm:px-8 lg:px-12 pb-20">
        <div class="flex flex-col lg:flex-row items-center justify-between min-h-[80vh] gap-12 lg:gap-16">
            <!-- Left Content -->
            <div class="w-full lg:w-1/2 text-center lg:text-left px-4 lg:px-0">
                <!-- Badge -->
                <div
                    class="inline-flex items-center px-6 py-3 mb-3 rounded-full bg-blue-100 dark:bg-blue-900/30 text-blue-800 dark:text-blue-200 text-sm font-medium animate-fade-in-up">
                    <i class="fas fa-star text-yellow-500 mr-3"></i>
                    Trusted since 2017
                </div>

                <!-- Main Heading -->
                <div class="space-y-6">
                    <h1
                        class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white leading-tight animate-fade-in-up animation-delay-200">
                        We <span
                            class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">Empower</span>
                        Your
                        <br class="hidden sm:block">
                        Digital <span
                            class="bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">Journey</span>
                    </h1>

                    <p
                        class="text-xl text-gray-600 dark:text-gray-300 max-w-2xl mx-auto lg:mx-0 leading-relaxed animate-fade-in-up animation-delay-400">
                        MS3 Technology BD is a leading and dynamic IT company in Bangladesh, transforming businesses
                        through innovative technology solutions.
                    </p>
                </div>

                <!-- Stats -->
                <div
                    class="flex flex-col sm:flex-row gap-8 sm:gap-10 justify-center lg:justify-start animate-fade-in-up animation-delay-600 pt-8">
                    <div class="text-center lg:text-left">
                        <div class="text-3xl font-bold">500+</div>
                        <div class="text-sm text-gray-500 dark:text-gray-400">Projects Completed</div>
                    </div>
                    <div class="text-center lg:text-left">
                        <div class="text-3xl font-bold">200+</div>
                        <div class="text-sm text-gray-500 dark:text-gray-400">Happy Clients</div>
                    </div>
                    <div class="text-center lg:text-left">
                        <div class="text-3xl font-bold">12+</div>
                        <div class="text-sm text-gray-500 dark:text-gray-400">Years Experience</div>
                    </div>
                </div>

                <!-- CTA Buttons -->
                <div
                    class="flex flex-col sm:flex-row gap-6 justify-center lg:justify-start animate-fade-in-up animation-delay-800 pt-6">
                    <a href="{{ url('/get-started') }}"
                        class="group inline-flex items-center px-5 py-2.5 bg-blue-600 text-white font-semibold rounded-full hover:shadow-lg hover:shadow-blue-500/25 transform hover:scale-105 transition-all duration-300 text-lg">
                        <i class="fas fa-rocket mr-3 group-hover:animate-bounce"></i>
                        Get Started
                        <i class="fas fa-arrow-right ml-3 group-hover:translate-x-1 transition-transform"></i>
                    </a>

                    <a href="{{ url('/how-it-works') }}"
                        class="group inline-flex items-center px-5 py-2.5 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-200 font-semibold rounded-full border-2 border-gray-200 dark:border-gray-700 hover:border-blue-500 dark:hover:border-blue-400 hover:shadow-lg transform hover:scale-105 transition-all duration-300 text-lg">
                        <i class="fas fa-play-circle mr-3 text-blue-600 group-hover:text-blue-500"></i>
                        How It Works
                    </a>
                </div>
            </div>

            <!-- Right Content - Image -->
            <div class="w-full lg:w-1/2 mt-16 lg:mt-0 animate-fade-in-right px-4 lg:px-0">
                <div class="relative py-8">
                    <!-- Main Image -->
                    <div class="relative z-10 transform hover:scale-105 transition-transform duration-500">
                        <img src="{{ asset('images/hero.png') }}" alt="Digital Journey Illustration"
                            class="w-full h-full max-w-lg mx-auto drop-shadow-2xl">
                    </div>

                    <!-- Floating Elements -->
                    <div class="absolute top-12 -left-6 w-20 h-20 bg-blue-500 rounded-lg shadow-lg animate-float">
                        <div class="flex items-center justify-center w-full h-full">
                            <i class="fas fa-code text-white text-2xl"></i>
                        </div>
                    </div>

                    <div
                        class="absolute bottom-12 -right-6 w-16 h-16 bg-purple-500 rounded-full shadow-lg animate-float animation-delay-1000">
                        <div class="flex items-center justify-center w-full h-full">
                            <i class="fas fa-lightbulb text-white text-xl"></i>
                        </div>
                    </div>

                    <div
                        class="absolute top-1/2 -right-10 w-12 h-12 bg-pink-500 rounded-lg shadow-lg animate-float animation-delay-2000">
                        <div class="flex items-center justify-center w-full h-full">
                            <i class="fas fa-rocket text-white text-sm"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
        <div class="w-6 h-10 border-2 border-gray-400 dark:border-gray-600 rounded-full flex justify-center">
            <div class="w-1 h-3 bg-gray-400 dark:bg-gray-600 rounded-full mt-2 animate-pulse"></div>
        </div>
    </div>
</section>
