<!-- Services Preview Section -->
<section class="py-24 bg-gray-50 dark:bg-gray-900">
    <div class="container mx-auto px-6 sm:px-8 lg:px-12">
        <x-heading title="Solutions">
            Our Unique & Awesome Core Features
        </x-heading>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @foreach ($solutions as $solution)
                <div
                    class="group bg-white dark:bg-gray-800 rounded-2xl p-10 shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300 border border-gray-100 dark:border-gray-700">
                    <div
                        class="w-16 h-16 bg-gradient-to-r from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mb-8 group-hover:scale-110 transition-transform">
                        <i class="{{ $solution->icon }} text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-6">{{ $solution->title }}</h3>
                    <a href="{{ url('solutions/' . $solution->slug) }}"
                        class="inline-flex items-center text-blue-600 dark:text-blue-400 font-semibold hover:text-blue-700 dark:hover:text-blue-300">
                        Learn More <i
                            class="fas fa-arrow-right ml-2 transform group-hover:translate-x-1 transition-transform"></i>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
