@extends('layout.app')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-indigo-600 via-purple-700 to-pink-800 text-white py-20 overflow-hidden">
        <div class="absolute inset-0 bg-black opacity-10"></div>
        <div class="absolute inset-0">
            <div class="absolute top-10 left-10 w-72 h-72 bg-purple-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse"></div>
            <div class="absolute bottom-10 right-10 w-96 h-96 bg-pink-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse delay-75"></div>
        </div>
        
        <div class="container mx-auto px-6 sm:px-8 lg:px-12 relative z-10">
            <div class="text-center max-w-4xl mx-auto">
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold mb-6 leading-tight">
                    Terms of Service
                </h1>
                <p class="text-lg sm:text-xl text-purple-100 mb-4 leading-relaxed">
                    Please read these terms carefully before using our services. By accessing our website or services, you agree to be bound by these terms.
                </p>
                <div class="flex items-center justify-center gap-2 text-purple-100">
                    <i class="fas fa-calendar-alt"></i>
                    <span class="text-sm">Last Updated: October 1, 2025</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Content Section -->
    <section class="py-16 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-6 sm:px-8 lg:px-12">
            <div class="max-w-4xl mx-auto">
                
                <!-- Introduction -->
                <div class="mb-12">
                    <p class="text-lg text-gray-700 dark:text-gray-300 leading-relaxed">
                        Welcome to MS3 Technology BD. These Terms of Service ("Terms") govern your access to and use of our website, 
                        products, and services (collectively, the "Services"). By using our Services, you agree to comply with and be 
                        bound by these Terms. If you do not agree with these Terms, please do not use our Services.
                    </p>
                </div>

                <!-- Acceptance of Terms -->
                <div class="mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6 flex items-center">
                        <span class="w-10 h-10 bg-indigo-600 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-handshake text-white text-lg"></i>
                        </span>
                        Acceptance of Terms
                    </h2>
                    
                    <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-6">
                        <p class="text-gray-700 dark:text-gray-300 mb-4">
                            By accessing or using our Services, you acknowledge that you have read, understood, and agree to be bound by these Terms, 
                            as well as our Privacy Policy. These Terms apply to all visitors, users, and others who access or use the Services.
                        </p>
                        <ul class="space-y-2 text-gray-700 dark:text-gray-300">
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-indigo-600 mt-1 mr-3"></i>
                                <span>You must be at least 18 years old to use our Services</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-indigo-600 mt-1 mr-3"></i>
                                <span>You represent that you have the authority to enter into these Terms</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-indigo-600 mt-1 mr-3"></i>
                                <span>You agree to use the Services in compliance with all applicable laws</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Use of Services -->
                <div class="mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6 flex items-center">
                        <span class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-laptop-code text-white text-lg"></i>
                        </span>
                        Use of Services
                    </h2>
                    
                    <div class="space-y-6">
                        <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-6">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Permitted Use</h3>
                            <p class="text-gray-700 dark:text-gray-300 mb-3">
                                You may use our Services for lawful purposes only. You agree to use the Services in accordance with these Terms and not to:
                            </p>
                            <ul class="space-y-2 text-gray-700 dark:text-gray-300">
                                <li class="flex items-start">
                                    <i class="fas fa-times-circle text-red-600 mt-1 mr-3"></i>
                                    <span>Violate any applicable laws or regulations</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-times-circle text-red-600 mt-1 mr-3"></i>
                                    <span>Infringe upon the rights of others, including intellectual property rights</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-times-circle text-red-600 mt-1 mr-3"></i>
                                    <span>Transmit any harmful, offensive, or illegal content</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-times-circle text-red-600 mt-1 mr-3"></i>
                                    <span>Attempt to gain unauthorized access to our systems or networks</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-times-circle text-red-600 mt-1 mr-3"></i>
                                    <span>Interfere with or disrupt the Services or servers</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-times-circle text-red-600 mt-1 mr-3"></i>
                                    <span>Use automated systems to access the Services without permission</span>
                                </li>
                            </ul>
                        </div>

                        <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-6">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Account Responsibilities</h3>
                            <p class="text-gray-700 dark:text-gray-300 mb-3">
                                If you create an account with us:
                            </p>
                            <ul class="space-y-2 text-gray-700 dark:text-gray-300">
                                <li class="flex items-start">
                                    <i class="fas fa-shield-alt text-blue-600 mt-1 mr-3"></i>
                                    <span>You are responsible for maintaining the confidentiality of your account credentials</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-shield-alt text-blue-600 mt-1 mr-3"></i>
                                    <span>You are responsible for all activities that occur under your account</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-shield-alt text-blue-600 mt-1 mr-3"></i>
                                    <span>You must notify us immediately of any unauthorized use of your account</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-shield-alt text-blue-600 mt-1 mr-3"></i>
                                    <span>You must provide accurate and complete information when creating your account</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Intellectual Property -->
                <div class="mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6 flex items-center">
                        <span class="w-10 h-10 bg-purple-600 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-copyright text-white text-lg"></i>
                        </span>
                        Intellectual Property Rights
                    </h2>
                    
                    <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-6">
                        <p class="text-gray-700 dark:text-gray-300 mb-4">
                            The Services and all content, features, and functionality are owned by MS3 Technology BD and are protected by 
                            international copyright, trademark, patent, trade secret, and other intellectual property laws.
                        </p>
                        <div class="space-y-3 text-gray-700 dark:text-gray-300 mt-4">
                            <div class="flex items-start">
                                <i class="fas fa-lock text-purple-600 mt-1 mr-3"></i>
                                <span>Our trademarks, logos, and service marks may not be used without prior written consent</span>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-lock text-purple-600 mt-1 mr-3"></i>
                                <span>You may not copy, modify, distribute, or create derivative works of our content</span>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-lock text-purple-600 mt-1 mr-3"></i>
                                <span>Any unauthorized use of our intellectual property may result in legal action</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Services and Deliverables -->
                <div class="mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6 flex items-center">
                        <span class="w-10 h-10 bg-green-600 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-tasks text-white text-lg"></i>
                        </span>
                        Services and Deliverables
                    </h2>
                    
                    <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-6">
                        <p class="text-gray-700 dark:text-gray-300 mb-4">
                            When you engage us for professional services:
                        </p>
                        <ul class="space-y-3 text-gray-700 dark:text-gray-300">
                            <li class="flex items-start">
                                <i class="fas fa-arrow-right text-green-600 mt-1 mr-3"></i>
                                <span>Services will be provided according to the agreed scope of work and timeline</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-arrow-right text-green-600 mt-1 mr-3"></i>
                                <span>We reserve the right to refuse service to anyone for any reason at any time</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-arrow-right text-green-600 mt-1 mr-3"></i>
                                <span>Additional charges may apply for work outside the agreed scope</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-arrow-right text-green-600 mt-1 mr-3"></i>
                                <span>Payment terms will be specified in the service agreement</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-arrow-right text-green-600 mt-1 mr-3"></i>
                                <span>Deliverables remain our property until full payment is received</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Payment Terms -->
                <div class="mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6 flex items-center">
                        <span class="w-10 h-10 bg-yellow-600 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-credit-card text-white text-lg"></i>
                        </span>
                        Payment Terms
                    </h2>
                    
                    <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-6">
                        <ul class="space-y-3 text-gray-700 dark:text-gray-300">
                            <li class="flex items-start">
                                <i class="fas fa-dollar-sign text-yellow-600 mt-1 mr-3"></i>
                                <span>All fees are quoted in the currency specified in the service agreement</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-dollar-sign text-yellow-600 mt-1 mr-3"></i>
                                <span>Payment is due according to the terms specified in your invoice or agreement</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-dollar-sign text-yellow-600 mt-1 mr-3"></i>
                                <span>Late payments may incur additional charges and service suspension</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-dollar-sign text-yellow-600 mt-1 mr-3"></i>
                                <span>We reserve the right to change our pricing with reasonable notice</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-dollar-sign text-yellow-600 mt-1 mr-3"></i>
                                <span>Refunds are subject to our refund policy as specified in the service agreement</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Warranties and Disclaimers -->
                <div class="mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6 flex items-center">
                        <span class="w-10 h-10 bg-red-600 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-exclamation-triangle text-white text-lg"></i>
                        </span>
                        Warranties and Disclaimers
                    </h2>
                    
                    <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-6">
                        <p class="text-gray-700 dark:text-gray-300 mb-4">
                            <strong>THE SERVICES ARE PROVIDED "AS IS" AND "AS AVAILABLE" WITHOUT WARRANTIES OF ANY KIND.</strong>
                        </p>
                        <p class="text-gray-700 dark:text-gray-300 mb-4">
                            We disclaim all warranties, express or implied, including but not limited to:
                        </p>
                        <ul class="space-y-2 text-gray-700 dark:text-gray-300">
                            <li class="flex items-start">
                                <i class="fas fa-minus text-red-600 mt-1 mr-3"></i>
                                <span>Implied warranties of merchantability and fitness for a particular purpose</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-minus text-red-600 mt-1 mr-3"></i>
                                <span>Warranties regarding the accuracy, reliability, or completeness of content</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-minus text-red-600 mt-1 mr-3"></i>
                                <span>Warranties that the Services will be uninterrupted or error-free</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-minus text-red-600 mt-1 mr-3"></i>
                                <span>Warranties that defects will be corrected</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Limitation of Liability -->
                <div class="mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6 flex items-center">
                        <span class="w-10 h-10 bg-orange-600 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-balance-scale text-white text-lg"></i>
                        </span>
                        Limitation of Liability
                    </h2>
                    
                    <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-6">
                        <p class="text-gray-700 dark:text-gray-300 mb-4">
                            TO THE MAXIMUM EXTENT PERMITTED BY LAW, MS3 TECHNOLOGY BD SHALL NOT BE LIABLE FOR:
                        </p>
                        <ul class="space-y-2 text-gray-700 dark:text-gray-300">
                            <li class="flex items-start">
                                <i class="fas fa-ban text-orange-600 mt-1 mr-3"></i>
                                <span>Any indirect, incidental, special, consequential, or punitive damages</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-ban text-orange-600 mt-1 mr-3"></i>
                                <span>Loss of profits, revenue, data, or use</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-ban text-orange-600 mt-1 mr-3"></i>
                                <span>Business interruption or loss of business opportunity</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-ban text-orange-600 mt-1 mr-3"></i>
                                <span>Any damages arising from your use or inability to use the Services</span>
                            </li>
                        </ul>
                        <p class="text-gray-700 dark:text-gray-300 mt-4">
                            Our total liability shall not exceed the amount paid by you for the Services in the 12 months preceding the claim.
                        </p>
                    </div>
                </div>

                <!-- Indemnification -->
                <div class="mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6 flex items-center">
                        <span class="w-10 h-10 bg-teal-600 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-user-shield text-white text-lg"></i>
                        </span>
                        Indemnification
                    </h2>
                    
                    <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-6">
                        <p class="text-gray-700 dark:text-gray-300">
                            You agree to indemnify, defend, and hold harmless MS3 Technology BD and its officers, directors, employees, and agents 
                            from any claims, liabilities, damages, losses, and expenses (including legal fees) arising out of or in any way connected with:
                        </p>
                        <ul class="space-y-2 text-gray-700 dark:text-gray-300 mt-4">
                            <li class="flex items-start">
                                <i class="fas fa-chevron-right text-teal-600 mt-1 mr-3"></i>
                                <span>Your use of or access to the Services</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-chevron-right text-teal-600 mt-1 mr-3"></i>
                                <span>Your violation of these Terms</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-chevron-right text-teal-600 mt-1 mr-3"></i>
                                <span>Your violation of any rights of another party</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Termination -->
                <div class="mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6 flex items-center">
                        <span class="w-10 h-10 bg-pink-600 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-power-off text-white text-lg"></i>
                        </span>
                        Termination
                    </h2>
                    
                    <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-6">
                        <p class="text-gray-700 dark:text-gray-300 mb-4">
                            We may terminate or suspend your access to the Services immediately, without prior notice or liability, for any reason, including:
                        </p>
                        <ul class="space-y-2 text-gray-700 dark:text-gray-300">
                            <li class="flex items-start">
                                <i class="fas fa-times text-pink-600 mt-1 mr-3"></i>
                                <span>Breach of these Terms</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-times text-pink-600 mt-1 mr-3"></i>
                                <span>At your request</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-times text-pink-600 mt-1 mr-3"></i>
                                <span>Discontinuance or material modification of the Services</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-times text-pink-600 mt-1 mr-3"></i>
                                <span>Unexpected technical or security issues</span>
                            </li>
                        </ul>
                        <p class="text-gray-700 dark:text-gray-300 mt-4">
                            Upon termination, your right to use the Services will immediately cease. All provisions that should survive termination shall survive.
                        </p>
                    </div>
                </div>

                <!-- Governing Law -->
                <div class="mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6 flex items-center">
                        <span class="w-10 h-10 bg-gray-600 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-gavel text-white text-lg"></i>
                        </span>
                        Governing Law and Dispute Resolution
                    </h2>
                    
                    <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-6">
                        <p class="text-gray-700 dark:text-gray-300 mb-4">
                            These Terms shall be governed by and construed in accordance with the laws of Bangladesh, without regard to its conflict of law provisions.
                        </p>
                        <p class="text-gray-700 dark:text-gray-300">
                            Any disputes arising out of or relating to these Terms or the Services shall be resolved through good faith negotiations. 
                            If negotiations fail, disputes shall be subject to the exclusive jurisdiction of the courts of Sylhet, Bangladesh.
                        </p>
                    </div>
                </div>

                <!-- Changes to Terms -->
                <div class="mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6 flex items-center">
                        <span class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-sync-alt text-white text-lg"></i>
                        </span>
                        Changes to These Terms
                    </h2>
                    
                    <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-6">
                        <p class="text-gray-700 dark:text-gray-300">
                            We reserve the right to modify or replace these Terms at any time at our sole discretion. We will provide notice of 
                            any material changes by posting the new Terms on this page and updating the "Last Updated" date. Your continued use 
                            of the Services after such changes constitutes acceptance of the new Terms.
                        </p>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6 flex items-center">
                        <span class="w-10 h-10 bg-indigo-600 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-envelope text-white text-lg"></i>
                        </span>
                        Contact Information
                    </h2>
                    
                    <div class="bg-gradient-to-br from-indigo-50 to-purple-50 dark:from-gray-800 dark:to-gray-700 rounded-xl p-6">
                        <p class="text-gray-700 dark:text-gray-300 mb-4">
                            If you have any questions about these Terms, please contact us:
                        </p>
                        <div class="space-y-3 text-gray-700 dark:text-gray-300">
                            <div class="flex items-center">
                                <i class="fas fa-building text-indigo-600 w-6 mr-3"></i>
                                <span><strong>MS3 Technology BD</strong></span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-map-marker-alt text-indigo-600 w-6 mr-3"></i>
                                <span>Sylhet, Bangladesh</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-envelope text-indigo-600 w-6 mr-3"></i>
                                <a href="mailto:info@ms3technology.com" class="text-indigo-600 hover:text-indigo-700 dark:text-indigo-400 dark:hover:text-indigo-300">info@ms3technology.com</a>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-phone text-indigo-600 w-6 mr-3"></i>
                                <span>+880 1234-567890</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-16 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-6 sm:px-8 lg:px-12">
            <div class="bg-gradient-to-r from-indigo-600 to-purple-700 rounded-2xl shadow-2xl p-8 sm:p-12 text-center max-w-3xl mx-auto">
                <h2 class="text-3xl sm:text-4xl font-bold text-white mb-4">
                    Ready to Get Started?
                </h2>
                <p class="text-lg text-purple-100 mb-8">
                    By using our services, you agree to these terms. Let's work together on your next project.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a 
                        href="{{ route('consultation.form') }}" 
                        class="inline-flex items-center justify-center px-8 py-4 bg-white text-indigo-600 rounded-lg font-bold text-lg shadow-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-indigo-600 transition-all duration-200 transform hover:scale-105"
                    >
                        <i class="fas fa-calendar-check mr-3"></i>
                        Book Consultation
                    </a>
                    <a 
                        href="{{ route('contact') }}" 
                        class="inline-flex items-center justify-center px-8 py-4 bg-transparent border-2 border-white text-white rounded-lg font-bold text-lg hover:bg-white hover:text-indigo-600 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-indigo-600 transition-all duration-200 transform hover:scale-105"
                    >
                        <i class="fas fa-envelope mr-3"></i>
                        Contact Us
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
