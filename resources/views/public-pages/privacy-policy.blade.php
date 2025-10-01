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
                    Privacy Policy
                </h1>
                <p class="text-lg sm:text-xl text-blue-100 mb-4 leading-relaxed">
                    Your privacy is important to us. This policy outlines how we collect, use, and protect your personal information.
                </p>
                <div class="flex items-center justify-center gap-2 text-blue-100">
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
                        At MS3 Technology BD, we are committed to protecting your privacy and ensuring the security of your personal information. 
                        This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our website 
                        or use our services.
                    </p>
                </div>

                <!-- Information We Collect -->
                <div class="mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6 flex items-center">
                        <span class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-database text-white text-lg"></i>
                        </span>
                        Information We Collect
                    </h2>
                    
                    <div class="space-y-6">
                        <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-6">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Personal Information</h3>
                            <p class="text-gray-700 dark:text-gray-300 mb-3">
                                We may collect personal information that you voluntarily provide to us when you:
                            </p>
                            <ul class="space-y-2 text-gray-700 dark:text-gray-300">
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-blue-600 mt-1 mr-3"></i>
                                    <span>Register for an account or use our services</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-blue-600 mt-1 mr-3"></i>
                                    <span>Fill out a contact form or request a consultation</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-blue-600 mt-1 mr-3"></i>
                                    <span>Apply for a job or submit a career application</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-blue-600 mt-1 mr-3"></i>
                                    <span>Subscribe to our newsletter or communications</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-blue-600 mt-1 mr-3"></i>
                                    <span>Participate in surveys or provide feedback</span>
                                </li>
                            </ul>
                            <p class="text-gray-700 dark:text-gray-300 mt-4">
                                This information may include your name, email address, phone number, company name, job title, and any other information you choose to provide.
                            </p>
                        </div>

                        <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-6">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Automatically Collected Information</h3>
                            <p class="text-gray-700 dark:text-gray-300 mb-3">
                                When you visit our website, we automatically collect certain information about your device, including:
                            </p>
                            <ul class="space-y-2 text-gray-700 dark:text-gray-300">
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-blue-600 mt-1 mr-3"></i>
                                    <span>IP address and browser type</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-blue-600 mt-1 mr-3"></i>
                                    <span>Operating system and device information</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-blue-600 mt-1 mr-3"></i>
                                    <span>Pages viewed and time spent on pages</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-blue-600 mt-1 mr-3"></i>
                                    <span>Referring website addresses</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-blue-600 mt-1 mr-3"></i>
                                    <span>Clickstream data and navigation patterns</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- How We Use Your Information -->
                <div class="mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6 flex items-center">
                        <span class="w-10 h-10 bg-green-600 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-cogs text-white text-lg"></i>
                        </span>
                        How We Use Your Information
                    </h2>
                    
                    <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-6">
                        <p class="text-gray-700 dark:text-gray-300 mb-4">
                            We use the information we collect for various purposes, including:
                        </p>
                        <ul class="space-y-3 text-gray-700 dark:text-gray-300">
                            <li class="flex items-start">
                                <i class="fas fa-arrow-right text-green-600 mt-1 mr-3"></i>
                                <span>To provide, maintain, and improve our services</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-arrow-right text-green-600 mt-1 mr-3"></i>
                                <span>To respond to your inquiries and provide customer support</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-arrow-right text-green-600 mt-1 mr-3"></i>
                                <span>To process your applications and manage recruitment</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-arrow-right text-green-600 mt-1 mr-3"></i>
                                <span>To send you updates, newsletters, and marketing communications (with your consent)</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-arrow-right text-green-600 mt-1 mr-3"></i>
                                <span>To analyze usage patterns and improve user experience</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-arrow-right text-green-600 mt-1 mr-3"></i>
                                <span>To detect, prevent, and address technical issues or security concerns</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-arrow-right text-green-600 mt-1 mr-3"></i>
                                <span>To comply with legal obligations and enforce our terms</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Information Sharing -->
                <div class="mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6 flex items-center">
                        <span class="w-10 h-10 bg-purple-600 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-share-alt text-white text-lg"></i>
                        </span>
                        Information Sharing and Disclosure
                    </h2>
                    
                    <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-6">
                        <p class="text-gray-700 dark:text-gray-300 mb-4">
                            We do not sell, trade, or rent your personal information to third parties. We may share your information in the following circumstances:
                        </p>
                        <ul class="space-y-3 text-gray-700 dark:text-gray-300">
                            <li class="flex items-start">
                                <i class="fas fa-shield-alt text-purple-600 mt-1 mr-3"></i>
                                <span><strong>Service Providers:</strong> With trusted third-party service providers who assist us in operating our website and conducting our business</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-shield-alt text-purple-600 mt-1 mr-3"></i>
                                <span><strong>Legal Requirements:</strong> When required by law or to protect our rights, property, or safety</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-shield-alt text-purple-600 mt-1 mr-3"></i>
                                <span><strong>Business Transfers:</strong> In connection with a merger, acquisition, or sale of assets</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-shield-alt text-purple-600 mt-1 mr-3"></i>
                                <span><strong>With Your Consent:</strong> With your explicit consent for specific purposes</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Data Security -->
                <div class="mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6 flex items-center">
                        <span class="w-10 h-10 bg-red-600 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-lock text-white text-lg"></i>
                        </span>
                        Data Security
                    </h2>
                    
                    <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-6">
                        <p class="text-gray-700 dark:text-gray-300">
                            We implement appropriate technical and organizational security measures to protect your personal information against 
                            unauthorized access, alteration, disclosure, or destruction. These measures include:
                        </p>
                        <ul class="space-y-2 text-gray-700 dark:text-gray-300 mt-4">
                            <li class="flex items-start">
                                <i class="fas fa-check text-red-600 mt-1 mr-3"></i>
                                <span>Encryption of data in transit and at rest</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-red-600 mt-1 mr-3"></i>
                                <span>Regular security assessments and updates</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-red-600 mt-1 mr-3"></i>
                                <span>Access controls and authentication measures</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-red-600 mt-1 mr-3"></i>
                                <span>Employee training on data protection practices</span>
                            </li>
                        </ul>
                        <p class="text-gray-700 dark:text-gray-300 mt-4">
                            However, no method of transmission over the Internet or electronic storage is 100% secure. While we strive to protect 
                            your personal information, we cannot guarantee its absolute security.
                        </p>
                    </div>
                </div>

                <!-- Your Rights -->
                <div class="mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6 flex items-center">
                        <span class="w-10 h-10 bg-yellow-600 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-user-shield text-white text-lg"></i>
                        </span>
                        Your Rights and Choices
                    </h2>
                    
                    <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-6">
                        <p class="text-gray-700 dark:text-gray-300 mb-4">
                            You have certain rights regarding your personal information:
                        </p>
                        <ul class="space-y-3 text-gray-700 dark:text-gray-300">
                            <li class="flex items-start">
                                <i class="fas fa-hand-point-right text-yellow-600 mt-1 mr-3"></i>
                                <span><strong>Access:</strong> Request access to the personal information we hold about you</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-hand-point-right text-yellow-600 mt-1 mr-3"></i>
                                <span><strong>Correction:</strong> Request correction of inaccurate or incomplete information</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-hand-point-right text-yellow-600 mt-1 mr-3"></i>
                                <span><strong>Deletion:</strong> Request deletion of your personal information</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-hand-point-right text-yellow-600 mt-1 mr-3"></i>
                                <span><strong>Opt-Out:</strong> Unsubscribe from marketing communications at any time</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-hand-point-right text-yellow-600 mt-1 mr-3"></i>
                                <span><strong>Data Portability:</strong> Request a copy of your data in a structured format</span>
                            </li>
                        </ul>
                        <p class="text-gray-700 dark:text-gray-300 mt-4">
                            To exercise these rights, please contact us using the information provided at the end of this policy.
                        </p>
                    </div>
                </div>

                <!-- Cookies -->
                <div class="mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6 flex items-center">
                        <span class="w-10 h-10 bg-indigo-600 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-cookie-bite text-white text-lg"></i>
                        </span>
                        Cookies and Tracking Technologies
                    </h2>
                    
                    <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-6">
                        <p class="text-gray-700 dark:text-gray-300 mb-4">
                            We use cookies and similar tracking technologies to enhance your browsing experience and analyze website traffic. 
                            Cookies are small data files stored on your device. You can control cookie preferences through your browser settings.
                        </p>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                            <div class="border-l-4 border-indigo-600 pl-4">
                                <h4 class="font-bold text-gray-900 dark:text-white mb-2">Essential Cookies</h4>
                                <p class="text-sm text-gray-700 dark:text-gray-300">Required for the website to function properly</p>
                            </div>
                            <div class="border-l-4 border-indigo-600 pl-4">
                                <h4 class="font-bold text-gray-900 dark:text-white mb-2">Analytics Cookies</h4>
                                <p class="text-sm text-gray-700 dark:text-gray-300">Help us understand how visitors interact with our website</p>
                            </div>
                            <div class="border-l-4 border-indigo-600 pl-4">
                                <h4 class="font-bold text-gray-900 dark:text-white mb-2">Preference Cookies</h4>
                                <p class="text-sm text-gray-700 dark:text-gray-300">Remember your settings and preferences</p>
                            </div>
                            <div class="border-l-4 border-indigo-600 pl-4">
                                <h4 class="font-bold text-gray-900 dark:text-white mb-2">Marketing Cookies</h4>
                                <p class="text-sm text-gray-700 dark:text-gray-300">Used to deliver relevant advertisements</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Third-Party Links -->
                <div class="mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6 flex items-center">
                        <span class="w-10 h-10 bg-orange-600 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-link text-white text-lg"></i>
                        </span>
                        Third-Party Links
                    </h2>
                    
                    <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-6">
                        <p class="text-gray-700 dark:text-gray-300">
                            Our website may contain links to third-party websites. We are not responsible for the privacy practices or content 
                            of these external sites. We encourage you to review the privacy policies of any third-party sites you visit.
                        </p>
                    </div>
                </div>

                <!-- Children's Privacy -->
                <div class="mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6 flex items-center">
                        <span class="w-10 h-10 bg-pink-600 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-child text-white text-lg"></i>
                        </span>
                        Children's Privacy
                    </h2>
                    
                    <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-6">
                        <p class="text-gray-700 dark:text-gray-300">
                            Our services are not intended for individuals under the age of 18. We do not knowingly collect personal information 
                            from children. If you believe we have collected information from a child, please contact us immediately so we can 
                            take appropriate action.
                        </p>
                    </div>
                </div>

                <!-- Changes to Policy -->
                <div class="mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6 flex items-center">
                        <span class="w-10 h-10 bg-teal-600 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-edit text-white text-lg"></i>
                        </span>
                        Changes to This Privacy Policy
                    </h2>
                    
                    <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-6">
                        <p class="text-gray-700 dark:text-gray-300">
                            We may update this Privacy Policy from time to time to reflect changes in our practices or legal requirements. 
                            We will notify you of any significant changes by posting the new policy on this page and updating the "Last Updated" date. 
                            We encourage you to review this policy periodically.
                        </p>
                    </div>
                </div>

                <!-- Contact Us -->
                <div class="mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6 flex items-center">
                        <span class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-envelope text-white text-lg"></i>
                        </span>
                        Contact Us
                    </h2>
                    
                    <div class="bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-gray-800 dark:to-gray-700 rounded-xl p-6">
                        <p class="text-gray-700 dark:text-gray-300 mb-4">
                            If you have any questions, concerns, or requests regarding this Privacy Policy or our data practices, please contact us:
                        </p>
                        <div class="space-y-3 text-gray-700 dark:text-gray-300">
                            <div class="flex items-center">
                                <i class="fas fa-building text-blue-600 w-6 mr-3"></i>
                                <span><strong>MS3 Technology BD</strong></span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-map-marker-alt text-blue-600 w-6 mr-3"></i>
                                <span>Sylhet, Bangladesh</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-envelope text-blue-600 w-6 mr-3"></i>
                                <a href="mailto:info@ms3technology.com" class="text-blue-600 hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-300">info@ms3technology.com</a>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-phone text-blue-600 w-6 mr-3"></i>
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
            <div class="bg-gradient-to-r from-blue-600 to-indigo-700 rounded-2xl shadow-2xl p-8 sm:p-12 text-center max-w-3xl mx-auto">
                <h2 class="text-3xl sm:text-4xl font-bold text-white mb-4">
                    Questions About Our Privacy Policy?
                </h2>
                <p class="text-lg text-blue-100 mb-8">
                    We're here to help. Contact us for any privacy-related inquiries.
                </p>
                <a 
                    href="{{ route('contact') }}" 
                    class="inline-flex items-center justify-center px-8 py-4 bg-white text-blue-600 rounded-lg font-bold text-lg shadow-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-blue-600 transition-all duration-200 transform hover:scale-105"
                >
                    <i class="fas fa-envelope mr-3"></i>
                    Contact Us
                </a>
            </div>
        </div>
    </section>
@endsection
