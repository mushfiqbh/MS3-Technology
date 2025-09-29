<!-- Services Preview Section -->
<section class="py-24 bg-gray-50 dark:bg-gray-900">
    <div class="container mx-auto px-6 sm:px-8 lg:px-12">
        <x-heading title="Services">
            Our Unique & Awesome Core Features
        </x-heading>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            <!-- Service Card 1 -->
            <div
                class="group bg-white dark:bg-gray-800 rounded-2xl p-10 shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300 border border-gray-100 dark:border-gray-700">
                <div
                    class="w-16 h-16 bg-gradient-to-r from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mb-8 group-hover:scale-110 transition-transform">
                    <i class="fas fa-globe text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-6">Web Development</h3>
                <p class="text-gray-600 dark:text-gray-300 mb-8 leading-relaxed">Create stunning, responsive websites
                    that engage your audience and drive business growth.</p>
                <a href="{{ url('/services/web-development') }}"
                    class="inline-flex items-center text-blue-600 dark:text-blue-400 font-semibold hover:text-blue-700 dark:hover:text-blue-300">
                    Learn More <i
                        class="fas fa-arrow-right ml-2 transform group-hover:translate-x-1 transition-transform"></i>
                </a>
            </div>

            <!-- Service Card 2 -->
            <div
                class="group bg-white dark:bg-gray-800 rounded-2xl p-10 shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300 border border-gray-100 dark:border-gray-700">
                <div
                    class="w-16 h-16 bg-gradient-to-r from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mb-8 group-hover:scale-110 transition-transform">
                    <i class="fas fa-mobile-alt text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-6">Mobile Apps</h3>
                <p class="text-gray-600 dark:text-gray-300 mb-8 leading-relaxed">Build powerful mobile applications for
                    iOS and Android platforms with cutting-edge technology.</p>
                <a href="{{ url('/services/mobile-apps') }}"
                    class="inline-flex items-center text-purple-600 dark:text-purple-400 font-semibold hover:text-purple-700 dark:hover:text-purple-300">
                    Learn More <i
                        class="fas fa-arrow-right ml-2 transform group-hover:translate-x-1 transition-transform"></i>
                </a>
            </div>

            <!-- Service Card 3 -->
            <div
                class="group bg-white dark:bg-gray-800 rounded-2xl p-10 shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300 border border-gray-100 dark:border-gray-700">
                <div
                    class="w-16 h-16 bg-gradient-to-r from-pink-500 to-pink-600 rounded-2xl flex items-center justify-center mb-8 group-hover:scale-110 transition-transform">
                    <i class="fas fa-cloud text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-6">Cloud Solutions</h3>
                <p class="text-gray-600 dark:text-gray-300 mb-8 leading-relaxed">Leverage the power of cloud computing
                    for scalable, secure, and cost-effective solutions.</p>
                <a href="{{ url('/services/cloud-solutions') }}"
                    class="inline-flex items-center text-pink-600 dark:text-pink-400 font-semibold hover:text-pink-700 dark:hover:text-pink-300">
                    Learn More <i
                        class="fas fa-arrow-right ml-2 transform group-hover:translate-x-1 transition-transform"></i>
                </a>
            </div>
        </div>

        <div class="text-center mt-16">
            <a href="{{ url('/services') }}"
                class="inline-flex items-center px-10 py-5 bg-gradient-to-r from-gray-800 to-gray-900 dark:from-gray-700 dark:to-gray-800 text-white font-semibold rounded-full hover:shadow-lg transform hover:scale-105 transition-all duration-300 text-lg">
                View All Services
                <i class="fas fa-arrow-right ml-3"></i>
            </a>
        </div>
    </div>
</section>
