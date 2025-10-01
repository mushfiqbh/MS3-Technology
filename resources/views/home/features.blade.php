<div id="features"
    class="relative py-12 sm:py-16 lg:py-20 bg-gradient-to-b from-white via-gray-50 to-white dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 overflow-hidden">
    <!-- Decorative Background Elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div
            class="absolute top-10 sm:top-20 left-5 sm:left-10 w-48 sm:w-72 h-48 sm:h-72 bg-blue-200 dark:bg-blue-900 rounded-full mix-blend-multiply dark:mix-blend-soft-light filter blur-3xl opacity-20 animate-pulse">
        </div>
        <div
            class="absolute bottom-10 sm:bottom-20 right-5 sm:right-10 w-64 sm:w-96 h-64 sm:h-96 bg-purple-200 dark:bg-purple-900 rounded-full mix-blend-multiply dark:mix-blend-soft-light filter blur-3xl opacity-20 animate-pulse delay-700">
        </div>
    </div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <x-heading title="Features & Technologies">Our Unique & Awesome Core Features</x-heading>

        <div class="mt-8 sm:mt-12 max-w-7xl mx-auto">
            <!-- Two Column Layout: Features List (Left) & Tech Stack Slider (Right) -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12">
                
                <!-- LEFT SIDE: Features List -->
                <div class="space-y-4 sm:space-y-5">
                    @foreach ($features as $index => $feature)
                        <div
                            class="group relative bg-white dark:bg-gray-800 rounded-xl p-5 sm:p-6 shadow-md hover:shadow-xl transition-all duration-300 border border-gray-200 dark:border-gray-700 hover:border-blue-500 dark:hover:border-blue-500"
                            data-aos="fade-right"
                            data-aos-delay="{{ $index * 100 }}">
                            <!-- Hover Gradient Overlay -->
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-blue-500/5 to-purple-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-xl">
                            </div>

                            <div class="relative z-10 flex items-start gap-4">
                                <!-- Icon -->
                                <div class="flex-shrink-0">
                                    <div
                                        class="w-12 h-12 sm:w-14 sm:h-14 bg-gradient-to-br from-blue-100 to-blue-50 dark:from-blue-900 dark:to-blue-800 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                        <i class="{{ $feature['icon'] }} text-blue-600 dark:text-blue-300 text-xl sm:text-2xl"></i>
                                    </div>
                                </div>

                                <!-- Content -->
                                <div class="flex-1 min-w-0">
                                    <h3
                                        class="text-base sm:text-lg font-bold text-gray-900 dark:text-white mb-1.5 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors duration-300">
                                        {{ $feature['title'] }}
                                    </h3>
                                    <p class="text-sm sm:text-base text-gray-600 dark:text-gray-400 leading-relaxed">
                                        {{ $feature['description'] }}
                                    </p>
                                </div>

                                <!-- Arrow Icon -->
                                <div class="flex-shrink-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <i class="fas fa-arrow-right text-blue-600 dark:text-blue-400 text-lg"></i>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- RIGHT SIDE: Tech Stack Slider with Sleek Background -->
                <div class="relative">
                    <!-- Sleek Background Card -->
                    <div
                        class="sticky top-24 bg-gradient-to-br from-blue-600 via-indigo-600 to-purple-700 rounded-2xl sm:rounded-3xl p-8 sm:p-10 shadow-2xl overflow-hidden">
                        <!-- Decorative Elements -->
                        <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -translate-y-1/2 translate-x-1/2 blur-3xl"></div>
                        <div class="absolute bottom-0 left-0 w-64 h-64 bg-purple-500/20 rounded-full translate-y-1/2 -translate-x-1/2 blur-3xl"></div>

                        <!-- Pattern Overlay -->
                        <div class="absolute inset-0 opacity-5">
                            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
                        </div>

                        <div class="relative z-10">
                            <!-- Header -->
                            <div class="text-center mb-8">
                                <div class="inline-flex items-center justify-center w-16 h-16 bg-white/20 backdrop-blur-sm rounded-2xl mb-4">
                                    <i class="fas fa-layer-group text-white text-3xl"></i>
                                </div>
                                <h3 class="text-2xl sm:text-3xl font-bold text-white mb-2">Tech Stack</h3>
                                <p class="text-white/80 text-sm sm:text-base">Technologies we excel in</p>
                            </div>

                            <!-- Floating Tech Stack Items -->
                            <div class="relative min-h-[450px] sm:min-h-[550px]">
                                @foreach($techStacks as $index => $tech)
                                    @php
                                        // Define positions with more spacing for floating effect
                                        $positions = [
                                            ['top' => '5%', 'left' => '5%'],
                                            ['top' => '8%', 'right' => '8%'],
                                            ['top' => '40%', 'left' => '2%'],
                                            ['top' => '55%', 'right' => '5%'],
                                            ['top' => '22%', 'left' => '55%'],
                                            ['top' => '68%', 'left' => '52%'],
                                            ['top' => '48%', 'left' => '30%'],
                                            ['top' => '78%', 'right' => '42%'],
                                        ];
                                        $position = $positions[$index] ?? ['top' => '50%', 'left' => '50%'];
                                        $delay = $index * 0.2;
                                    @endphp
                                    
                                    <div class="absolute animate-float-{{ $index % 3 }}"
                                         style="
                                            {{ isset($position['top']) ? 'top: ' . $position['top'] . ';' : '' }}
                                            {{ isset($position['bottom']) ? 'bottom: ' . $position['bottom'] . ';' : '' }}
                                            {{ isset($position['left']) ? 'left: ' . $position['left'] . ';' : '' }}
                                            {{ isset($position['right']) ? 'right: ' . $position['right'] . ';' : '' }}
                                            animation-delay: {{ $delay }}s;
                                         ">
                                        <div class="group/tech relative">
                                            <!-- Glow Effect -->
                                            <div class="absolute -inset-4 bg-gradient-to-br {{ $tech['color'] }} opacity-20 group-hover/tech:opacity-40 rounded-full blur-xl transition-opacity duration-500"></div>
                                            
                                            <!-- Tech Icon Card -->
                                            <div class="relative bg-white/10 backdrop-blur-md hover:bg-white/20 rounded-2xl p-4 sm:p-5 transition-all duration-500 border border-white/30 hover:border-white/50 shadow-2xl hover:shadow-3xl transform hover:scale-110 hover:-translate-y-2 cursor-pointer">
                                                <div class="text-center">
                                                    <div class="inline-flex items-center justify-center w-14 h-14 sm:w-16 sm:h-16 bg-gradient-to-br {{ $tech['color'] }} rounded-xl sm:rounded-2xl mb-2 shadow-lg group-hover/tech:shadow-2xl transition-all duration-300 group-hover/tech:rotate-12">
                                                        <i class="{{ $tech['icon'] }} text-white text-2xl sm:text-3xl"></i>
                                                    </div>
                                                    <h4 class="text-white font-bold text-xs sm:text-sm whitespace-nowrap">{{ $tech['name'] }}</h4>
                                                </div>
                                            </div>

                                            <!-- Connecting Lines (optional) -->
                                            <div class="absolute top-1/2 left-1/2 w-1 h-8 bg-white/10 -translate-x-1/2 opacity-30 group-hover/tech:opacity-0 transition-opacity duration-300"></div>
                                        </div>
                                    </div>
                                @endforeach

                                <!-- Center Orbit Circle (decorative) -->
                                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-32 h-32 sm:w-40 sm:h-40 border-2 border-white/10 rounded-full animate-spin-slow"></div>
                                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-48 h-48 sm:w-64 sm:h-64 border-2 border-white/5 rounded-full animate-spin-slower"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Floating Animation Styles -->
    <style>
        @keyframes float-0 {
            0%, 100% {
                transform: translateY(0px) translateX(0px) rotate(0deg);
            }
            25% {
                transform: translateY(-20px) translateX(10px) rotate(5deg);
            }
            50% {
                transform: translateY(-10px) translateX(-15px) rotate(-3deg);
            }
            75% {
                transform: translateY(-25px) translateX(5px) rotate(3deg);
            }
        }

        @keyframes float-1 {
            0%, 100% {
                transform: translateY(0px) translateX(0px) rotate(0deg);
            }
            25% {
                transform: translateY(-15px) translateX(-12px) rotate(-4deg);
            }
            50% {
                transform: translateY(-25px) translateX(8px) rotate(4deg);
            }
            75% {
                transform: translateY(-10px) translateX(-8px) rotate(-2deg);
            }
        }

        @keyframes float-2 {
            0%, 100% {
                transform: translateY(0px) translateX(0px) rotate(0deg);
            }
            25% {
                transform: translateY(-18px) translateX(15px) rotate(6deg);
            }
            50% {
                transform: translateY(-8px) translateX(-10px) rotate(-5deg);
            }
            75% {
                transform: translateY(-22px) translateX(12px) rotate(2deg);
            }
        }

        .animate-float-0 {
            animation: float-0 6s ease-in-out infinite;
        }

        .animate-float-1 {
            animation: float-1 7s ease-in-out infinite;
        }

        .animate-float-2 {
            animation: float-2 8s ease-in-out infinite;
        }

        @keyframes spin-slow {
            from {
                transform: translate(-50%, -50%) rotate(0deg);
            }
            to {
                transform: translate(-50%, -50%) rotate(360deg);
            }
        }

        @keyframes spin-slower {
            from {
                transform: translate(-50%, -50%) rotate(0deg);
            }
            to {
                transform: translate(-50%, -50%) rotate(-360deg);
            }
        }

        .animate-spin-slow {
            animation: spin-slow 20s linear infinite;
        }

        .animate-spin-slower {
            animation: spin-slower 30s linear infinite;
        }

        /* Smooth shadow enhancement */
        .shadow-3xl {
            box-shadow: 0 35px 60px -15px rgba(0, 0, 0, 0.5);
        }
    </style>
</div>
