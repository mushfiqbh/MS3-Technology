<!-- Solutions Section with Enhanced UI -->
<section class="relative py-16 sm:py-20 lg:py-24 bg-gradient-to-b from-gray-50 via-white to-gray-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 overflow-hidden">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-10 left-0 w-64 sm:w-96 h-64 sm:h-96 bg-blue-200 dark:bg-blue-900 rounded-full mix-blend-multiply dark:mix-blend-soft-light filter blur-3xl opacity-20 animate-pulse"></div>
        <div class="absolute bottom-10 right-0 w-72 sm:w-[30rem] h-72 sm:h-[30rem] bg-purple-200 dark:bg-purple-900 rounded-full mix-blend-multiply dark:mix-blend-soft-light filter blur-3xl opacity-20 animate-pulse" style="animation-delay: 2s;"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-80 sm:w-[32rem] h-80 sm:h-[32rem] bg-indigo-200 dark:bg-indigo-900 rounded-full mix-blend-multiply dark:mix-blend-soft-light filter blur-3xl opacity-10"></div>
    </div>

    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-[0.03] dark:opacity-[0.02]">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%239C92AC\' fill-opacity=\'1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    </div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <x-heading title="Solutions">
            Innovative Solutions Tailored to Your Business Needs
        </x-heading>

        <div class="mt-12 sm:mt-16 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 lg:gap-10">
            @foreach ($solutions as $index => $solution)
                <div
                    class="relative bg-white dark:bg-gray-800 rounded-2xl sm:rounded-3xl p-8 sm:p-10 shadow-lg hover:shadow-2xl transform hover:-translate-y-3 transition-all duration-500 border border-gray-100 dark:border-gray-700 hover:border-blue-500 dark:hover:border-blue-400 overflow-hidden"
                    data-aos="fade-up"
                    data-aos-delay="{{ $index * 100 }}">
                    
                    <!-- Gradient Overlay on Hover -->
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 via-purple-500/5 to-indigo-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500 rounded-2xl sm:rounded-3xl"></div>
                    
                    <!-- Decorative Corner Element -->
                    <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-blue-500/10 to-transparent rounded-bl-full transform translate-x-8 -translate-y-8 group-hover:translate-x-6 group-hover:-translate-y-6 transition-transform duration-500"></div>

                    <div class="relative z-10">
                        <!-- Icon Container -->
                        <div class="relative inline-flex mb-6 sm:mb-8">
                            <!-- Glow Effect -->
                            <div class="absolute inset-0 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-2xl blur-xl opacity-30 group-hover:opacity-50 transition-opacity duration-500"></div>
                            
                            <!-- Icon -->
                            <div class="relative w-16 h-16 sm:w-18 sm:h-18 bg-gradient-to-br from-blue-500 via-indigo-500 to-purple-600 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 group-hover:rotate-6 transition-all duration-500">
                                <i class="{{ $solution->icon }} text-white text-2xl sm:text-3xl"></i>
                            </div>
                        </div>

                        <!-- Title -->
                        <h3 class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-white mb-4 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors duration-300 line-clamp-2">
                            {{ $solution->title }}
                        </h3>

                        <!-- Description (if exists) -->
                        @if(isset($solution->description))
                        <p class="text-sm sm:text-base text-gray-600 dark:text-gray-400 mb-6 line-clamp-3 leading-relaxed">
                            {{ Str::limit($solution->description, 120) }}
                        </p>
                        @endif

                        <!-- Divider -->
                        <div class="w-12 h-1 bg-gradient-to-r from-blue-500 to-transparent rounded-full mb-6 group-hover:w-20 transition-all duration-500"></div>

                        <!-- Learn More Link -->
                        <a href="{{ url('solutions/' . $solution->slug) }}"
                            class="inline-flex items-center gap-2 text-blue-600 dark:text-blue-400 font-semibold hover:text-blue-700 dark:hover:text-blue-300 transition-colors duration-300 group/link">
                            <span>Learn More</span>
                            <i class="fas fa-arrow-right transform group-hover/link:translate-x-2 transition-transform duration-300"></i>
                        </a>

                        <!-- Decorative Bottom Element -->
                        <div class="absolute bottom-0 right-0 w-16 sm:w-20 h-16 sm:h-20 bg-gradient-to-tl from-purple-500/5 to-transparent rounded-tl-full transform translate-x-4 translate-y-4 group-hover:translate-x-2 group-hover:translate-y-2 transition-transform duration-500"></div>
                    </div>

                    <!-- Animated Border Gradient -->
                    <div class="absolute inset-0 rounded-2xl sm:rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none">
                        <div class="absolute inset-0 rounded-2xl sm:rounded-3xl bg-gradient-to-r from-blue-500 via-purple-500 to-indigo-500 opacity-20 blur-sm"></div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Bottom Call-to-Action -->
        <div class="mt-12 sm:mt-16 text-center">
            <div class="inline-flex flex-col sm:flex-row items-center gap-4 sm:gap-6">
                <div class="flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 rounded-full border border-blue-200 dark:border-blue-800/50 backdrop-blur-sm">
                    <i class="fas fa-lightbulb text-yellow-500 text-lg animate-pulse"></i>
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">
                        Can't find what you're looking for?
                    </span>
                </div>
                <a href="{{ url('/contact') }}" 
                   class="inline-flex items-center gap-2 px-8 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold rounded-full shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                    <i class="fas fa-comments"></i>
                    <span>Contact Us</span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- AOS Animation Init (if not already included) -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof AOS !== 'undefined') {
            AOS.init({
                duration: 800,
                easing: 'ease-out',
                once: true
            });
        }
    });
</script>
