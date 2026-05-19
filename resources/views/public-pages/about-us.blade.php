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
                    About MS3 Technology
                </h1>
                <p class="text-lg sm:text-xl text-blue-100 mb-8 leading-relaxed">
                    Innovating the future of technology in Bangladesh. We're a team of passionate experts dedicated to delivering cutting-edge IT solutions.
                </p>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <div class="flex items-center gap-2 text-blue-100">
                        <i class="fas fa-calendar-alt text-2xl"></i>
                        <span class="text-lg font-semibold">Established 2017</span>
                    </div>
                    <div class="hidden sm:block w-px h-8 bg-blue-300"></div>
                    <div class="flex items-center gap-2 text-blue-100">
                        <i class="fas fa-map-marker-alt text-2xl"></i>
                        <span class="text-lg font-semibold">Based in Sylhet</span>
                    </div>
                    <div class="hidden sm:block w-px h-8 bg-blue-300"></div>
                    <div class="flex items-center gap-2 text-blue-100">
                        <i class="fas fa-award text-2xl"></i>
                        <span class="text-lg font-semibold">Award Winning</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Company Overview -->
    <section class="py-16 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-6 sm:px-8 lg:px-12">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                        Who We Are
                    </h2>
                    <div class="w-24 h-1 bg-gradient-to-r from-blue-600 to-indigo-600 mx-auto mb-6"></div>
                    <p class="text-lg text-gray-600 dark:text-gray-400 leading-relaxed">
                        MS3 Technology BD is a leading IT solutions and software company based in Sylhet, Bangladesh. 
                        We specialize in delivering innovative technology solutions that help businesses transform and grow in the digital age.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-12">
                    <div class="bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-gray-800 dark:to-gray-700 rounded-2xl p-8">
                        <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mb-6">
                            <i class="fas fa-lightbulb text-white text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Our Mission</h3>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                            To empower businesses through innovative technology solutions, delivering excellence in software development, 
                            IT consulting, and digital transformation services that drive growth and success.
                        </p>
                    </div>

                    <div class="bg-gradient-to-br from-purple-50 to-pink-50 dark:from-gray-800 dark:to-gray-700 rounded-2xl p-8">
                        <div class="w-16 h-16 bg-purple-600 rounded-full flex items-center justify-center mb-6">
                            <i class="fas fa-eye text-white text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Our Vision</h3>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                            To be the most trusted technology partner in Bangladesh, recognized for our commitment to innovation, 
                            quality, and customer satisfaction, while contributing to the nation's digital transformation.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Core Values -->
    <section class="py-16 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-6 sm:px-8 lg:px-12">
            <div class="text-center mb-12">
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                    Our Core Values
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-blue-600 to-indigo-600 mx-auto mb-6"></div>
                <p class="text-lg text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                    The principles that guide everything we do and define who we are as a company.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white dark:bg-gray-900 rounded-2xl shadow-lg p-6 text-center hover:shadow-2xl transition-shadow duration-300">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-100 dark:bg-blue-900 rounded-full mb-4">
                        <i class="fas fa-medal text-3xl text-blue-600 dark:text-blue-400"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Excellence</h3>
                    <p class="text-gray-600 dark:text-gray-400 text-sm">
                        We strive for excellence in every project, delivering high-quality solutions that exceed expectations.
                    </p>
                </div>

                <div class="bg-white dark:bg-gray-900 rounded-2xl shadow-lg p-6 text-center hover:shadow-2xl transition-shadow duration-300">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-green-100 dark:bg-green-900 rounded-full mb-4">
                        <i class="fas fa-rocket text-3xl text-green-600 dark:text-green-400"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Innovation</h3>
                    <p class="text-gray-600 dark:text-gray-400 text-sm">
                        We embrace cutting-edge technologies and creative solutions to solve complex business challenges.
                    </p>
                </div>

                <div class="bg-white dark:bg-gray-900 rounded-2xl shadow-lg p-6 text-center hover:shadow-2xl transition-shadow duration-300">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-purple-100 dark:bg-purple-900 rounded-full mb-4">
                        <i class="fas fa-shield-alt text-3xl text-purple-600 dark:text-purple-400"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Integrity</h3>
                    <p class="text-gray-600 dark:text-gray-400 text-sm">
                        We maintain the highest standards of honesty, transparency, and ethical practices in all our dealings.
                    </p>
                </div>

                <div class="bg-white dark:bg-gray-900 rounded-2xl shadow-lg p-6 text-center hover:shadow-2xl transition-shadow duration-300">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-orange-100 dark:bg-orange-900 rounded-full mb-4">
                        <i class="fas fa-users text-3xl text-orange-600 dark:text-orange-400"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Collaboration</h3>
                    <p class="text-gray-600 dark:text-gray-400 text-sm">
                        We believe in teamwork and partnership, working closely with clients to achieve shared success.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- What We Do -->
    <section class="py-16 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-6 sm:px-8 lg:px-12">
            <div class="text-center mb-12">
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                    What We Do
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-blue-600 to-indigo-600 mx-auto mb-6"></div>
                <p class="text-lg text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                    We offer comprehensive IT solutions tailored to meet the unique needs of your business.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-gray-50 dark:bg-gray-800 rounded-2xl p-6 hover:shadow-xl transition-shadow duration-300">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-code text-white text-xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white">Software Development</h3>
                    </div>
                    <p class="text-gray-600 dark:text-gray-400">
                        Custom software solutions designed to streamline your business processes and enhance productivity.
                    </p>
                </div>

                <div class="bg-gray-50 dark:bg-gray-800 rounded-2xl p-6 hover:shadow-xl transition-shadow duration-300">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-12 h-12 bg-green-600 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-mobile-alt text-white text-xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white">Mobile App Development</h3>
                    </div>
                    <p class="text-gray-600 dark:text-gray-400">
                        Native and cross-platform mobile applications that deliver exceptional user experiences.
                    </p>
                </div>

                <div class="bg-gray-50 dark:bg-gray-800 rounded-2xl p-6 hover:shadow-xl transition-shadow duration-300">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-12 h-12 bg-purple-600 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-globe text-white text-xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white">Web Development</h3>
                    </div>
                    <p class="text-gray-600 dark:text-gray-400">
                        Modern, responsive websites and web applications built with the latest technologies.
                    </p>
                </div>

                <div class="bg-gray-50 dark:bg-gray-800 rounded-2xl p-6 hover:shadow-xl transition-shadow duration-300">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-12 h-12 bg-yellow-600 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-cloud text-white text-xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white">Cloud Solutions</h3>
                    </div>
                    <p class="text-gray-600 dark:text-gray-400">
                        Scalable cloud infrastructure and services to support your growing business needs.
                    </p>
                </div>

                <div class="bg-gray-50 dark:bg-gray-800 rounded-2xl p-6 hover:shadow-xl transition-shadow duration-300">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-12 h-12 bg-red-600 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-shield-alt text-white text-xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white">Cybersecurity</h3>
                    </div>
                    <p class="text-gray-600 dark:text-gray-400">
                        Comprehensive security solutions to protect your digital assets and data.
                    </p>
                </div>

                <div class="bg-gray-50 dark:bg-gray-800 rounded-2xl p-6 hover:shadow-xl transition-shadow duration-300">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-12 h-12 bg-indigo-600 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-headset text-white text-xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white">IT Consulting</h3>
                    </div>
                    <p class="text-gray-600 dark:text-gray-400">
                        Expert guidance and strategic advice to optimize your IT infrastructure and processes.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-16 bg-gradient-to-br from-blue-600 to-indigo-700 text-white">
        <div class="container mx-auto px-6 sm:px-8 lg:px-12">
            <div class="text-center mb-12">
                <h2 class="text-3xl sm:text-4xl font-bold mb-4">
                    Our Impact in Numbers
                </h2>
                <p class="text-lg text-blue-100 max-w-2xl mx-auto">
                    We're proud of what we've achieved, but we're even more excited about the future.
                </p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="text-4xl sm:text-5xl font-bold mb-2">100+</div>
                    <div class="text-blue-100 text-sm sm:text-base">Projects Completed</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl sm:text-5xl font-bold mb-2">50+</div>
                    <div class="text-blue-100 text-sm sm:text-base">Happy Clients</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl sm:text-5xl font-bold mb-2">20+</div>
                    <div class="text-blue-100 text-sm sm:text-base">Team Members</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl sm:text-5xl font-bold mb-2">5+</div>
                    <div class="text-blue-100 text-sm sm:text-base">Years Experience</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="py-16 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-6 sm:px-8 lg:px-12">
            <div class="text-center mb-12">
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                    Why Choose MS3 Technology?
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-blue-600 to-indigo-600 mx-auto mb-6"></div>
                <p class="text-lg text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                    We combine technical expertise with a deep understanding of business needs to deliver exceptional results.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                <div class="flex gap-4">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center">
                            <i class="fas fa-check text-white text-xl"></i>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Expert Team</h3>
                        <p class="text-gray-600 dark:text-gray-400">
                            Our team consists of highly skilled professionals with years of industry experience.
                        </p>
                    </div>
                </div>

                <div class="flex gap-4">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 bg-green-600 rounded-full flex items-center justify-center">
                            <i class="fas fa-check text-white text-xl"></i>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Proven Track Record</h3>
                        <p class="text-gray-600 dark:text-gray-400">
                            We have successfully delivered numerous projects across various industries.
                        </p>
                    </div>
                </div>

                <div class="flex gap-4">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 bg-purple-600 rounded-full flex items-center justify-center">
                            <i class="fas fa-check text-white text-xl"></i>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Latest Technologies</h3>
                        <p class="text-gray-600 dark:text-gray-400">
                            We stay updated with the latest tech trends to provide modern solutions.
                        </p>
                    </div>
                </div>

                <div class="flex gap-4">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 bg-orange-600 rounded-full flex items-center justify-center">
                            <i class="fas fa-check text-white text-xl"></i>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">24/7 Support</h3>
                        <p class="text-gray-600 dark:text-gray-400">
                            We provide round-the-clock support to ensure your systems run smoothly.
                        </p>
                    </div>
                </div>

                <div class="flex gap-4">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 bg-yellow-600 rounded-full flex items-center justify-center">
                            <i class="fas fa-check text-white text-xl"></i>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Competitive Pricing</h3>
                        <p class="text-gray-600 dark:text-gray-400">
                            We offer quality services at competitive rates without compromising on quality.
                        </p>
                    </div>
                </div>

                <div class="flex gap-4">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 bg-red-600 rounded-full flex items-center justify-center">
                            <i class="fas fa-check text-white text-xl"></i>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">On-Time Delivery</h3>
                        <p class="text-gray-600 dark:text-gray-400">
                            We respect deadlines and ensure timely delivery of all projects.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-16 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-6 sm:px-8 lg:px-12">
            <div class="bg-gradient-to-r from-blue-600 to-indigo-700 rounded-2xl shadow-2xl p-8 sm:p-12 text-center">
                <h2 class="text-3xl sm:text-4xl font-bold text-white mb-4">
                    Ready to Transform Your Business?
                </h2>
                <p class="text-lg text-blue-100 mb-8 max-w-2xl mx-auto">
                    Let's discuss how we can help you achieve your technology goals and drive your business forward.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a 
                        href="{{ route('contact') }}" 
                        class="inline-flex items-center justify-center px-8 py-4 bg-white text-blue-600 rounded-lg font-bold text-lg shadow-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-blue-600 transition-all duration-200 transform hover:scale-105"
                    >
                        <i class="fas fa-envelope mr-3"></i>
                        Contact Us
                    </a>
                    <a 
                        href="{{ route('consultation.form') }}" 
                        class="inline-flex items-center justify-center px-8 py-4 bg-transparent border-2 border-white text-white rounded-lg font-bold text-lg hover:bg-white hover:text-blue-600 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-blue-600 transition-all duration-200 transform hover:scale-105"
                    >
                        <i class="fas fa-calendar-check mr-3"></i>
                        Book Consultation
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
