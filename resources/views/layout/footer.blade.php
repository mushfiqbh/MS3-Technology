<!-- Footer -->
<footer class="bg-gray-900 dark:bg-black text-white">
    <!-- Main Footer Content -->
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Company Info -->
            <div class="lg:col-span-1">
                <div class="flex items-center mb-6">
                    <i class="fas fa-code text-blue-500 text-2xl mr-3"></i>
                    <span class="text-xl font-bold">MS3 Technology BD</span>
                </div>
                <p class="text-gray-400 mb-6 leading-relaxed">
                    Leading IT company in Bangladesh, transforming businesses through innovative technology solutions since 2017.
                </p>
                <div class="flex space-x-4">
                    <a href="https://facebook.com/" class="w-10 h-10 bg-blue-600 hover:bg-blue-700 rounded-full flex items-center justify-center transition-colors">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-blue-400 hover:bg-blue-500 rounded-full flex items-center justify-center transition-colors">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-blue-800 hover:bg-blue-900 rounded-full flex items-center justify-center transition-colors">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-pink-600 hover:bg-pink-700 rounded-full flex items-center justify-center transition-colors">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>

            <!-- Services -->
            <div>
                <h3 class="text-lg font-semibold mb-6">Services</h3>
                <ul class="space-y-3">
                    <li><a href="{{ url('/services/web-development') }}" class="text-gray-400 hover:text-white transition-colors">Web Development</a></li>
                    <li><a href="{{ url('/services/mobile-apps') }}" class="text-gray-400 hover:text-white transition-colors">Mobile Apps</a></li>
                    <li><a href="{{ url('/services/cloud-solutions') }}" class="text-gray-400 hover:text-white transition-colors">Cloud Solutions</a></li>
                    <li><a href="{{ url('/services/ui-ux-design') }}" class="text-gray-400 hover:text-white transition-colors">UI/UX Design</a></li>
                    <li><a href="{{ url('/services/digital-marketing') }}" class="text-gray-400 hover:text-white transition-colors">Digital Marketing</a></li>
                </ul>
            </div>

            <!-- Company -->
            <div>
                <h3 class="text-lg font-semibold mb-6">Company</h3>
                <ul class="space-y-3">
                    <li><a href="{{ url('/about-us') }}" class="text-gray-400 hover:text-white transition-colors">About Us</a></li>
                    <li><a href="{{ url('/activities') }}" class="text-gray-400 hover:text-white transition-colors">Activities</a></li>
                    <li><a href="{{ url('/careers') }}" class="text-gray-400 hover:text-white transition-colors">Careers</a></li>
                    <li><a href="{{ url('/activities ') }}" class="text-gray-400 hover:text-white transition-colors">Blog</a></li>
                    <li><a href="{{ url('/contact') }}" class="text-gray-400 hover:text-white transition-colors">Contact</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h3 class="text-lg font-semibold mb-6">Get in Touch</h3>
                <div class="space-y-4">
                    <div class="flex items-start space-x-3">
                        <i class="fas fa-map-marker-alt text-blue-500 mt-1"></i>
                        <div>
                            <p class="text-gray-400">Sylhet, Bangladesh</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-phone text-blue-500"></i>
                        <p class="text-gray-400">+880 1744-221385</p>
                    </div>
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-envelope text-blue-500"></i>
                        <p class="text-gray-400">ms3technology@gmail.com</p>
                    </div>
                </div>

                <!-- Newsletter -->
                <div class="mt-8">
                    <h4 class="text-sm font-semibold mb-3">Subscribe to Newsletter</h4>
                    <div class="flex">
                        <input type="email" placeholder="Your email" 
                               class="flex-1 px-4 py-2 bg-gray-800 border border-gray-700 rounded-l-md focus:outline-none focus:border-blue-500 text-white">
                        <button class="px-4 py-2 bg-blue-600 hover:bg-blue-700 rounded-r-md transition-colors">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Footer -->
    <div class="border-t border-gray-800">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400 text-sm">
                    © {{ date('Y') }} MS3 Technology BD. All rights reserved.
                </p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="{{ url('/privacy-policy') }}" class="text-gray-400 hover:text-white text-sm transition-colors">Privacy Policy</a>
                    <a href="{{ url('/terms-of-service') }}" class="text-gray-400 hover:text-white text-sm transition-colors">Terms of Service</a>
                    <a href="{{ url('/about-us') }}" class="text-gray-400 hover:text-white text-sm transition-colors">About Us</a>
                </div>
            </div>
        </div>
    </div>
</footer>
