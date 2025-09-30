@extends('layout.app')

@section('content')
    <div class="min-h-screen bg-gray-50 dark:bg-gray-900">
        <!-- Main Content -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                <!-- Consultation Form -->
                <div class="lg:col-span-2">
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden">
                        <!-- Form Header -->
                        <div class="bg-gradient-to-r from-blue-50 to-purple-50 dark:from-blue-900/20 dark:to-purple-900/20 px-8 py-6 border-b border-gray-200 dark:border-gray-700">
                            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">
                                Tell Us About Your Project
                            </h2>
                            <p class="text-gray-600 dark:text-gray-400">
                                Fill out the form below and we'll get back to you within 24 hours
                            </p>
                        </div>

                        <!-- Form Body -->
                        <div class="p-8">
                            <form id="consultationForm" action="{{ route('consultation.submit') }}" method="POST" 
                                  x-data="{ 
                                      loading: false, 
                                      showSuccess: false,
                                      formData: {},
                                      submitForm() {
                                          this.loading = true;
                                          const form = document.getElementById('consultationForm');
                                          const formData = new FormData(form);
                                          
                                          fetch(form.action, {
                                              method: 'POST',
                                              body: formData,
                                              headers: {
                                                  'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').getAttribute('content')
                                              }
                                          })
                                          .then(response => response.json())
                                          .then(data => {
                                              this.loading = false;
                                              if (data.success) {
                                                  this.showSuccess = true;
                                                  form.reset();
                                                  setTimeout(() => this.showSuccess = false, 5000);
                                              } else {
                                                  alert(data.message || 'An error occurred. Please try again.');
                                              }
                                          })
                                          .catch(error => {
                                              this.loading = false;
                                              console.error('Error:', error);
                                              alert('An error occurred. Please try again.');
                                          });
                                      }
                                  }" 
                                  @submit.prevent="submitForm()">
                                @csrf

                                <!-- Success Message -->
                                <div x-show="showSuccess" 
                                     x-transition:enter="transition ease-out duration-300"
                                     x-transition:enter-start="opacity-0 transform translate-y-4"
                                     x-transition:enter-end="opacity-100 transform translate-y-0"
                                     class="mb-6 p-4 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-lg">
                                    <div class="flex items-center">
                                        <svg class="w-6 h-6 text-green-600 dark:text-green-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        <div>
                                            <h3 class="text-green-800 dark:text-green-200 font-medium">Request Submitted Successfully!</h3>
                                            <p class="text-green-700 dark:text-green-300 text-sm mt-1">Our team will contact you within 24 hours.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="space-y-8">
                                    <!-- Personal Information -->
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 flex items-center">
                                            <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                            </svg>
                                            Personal Information
                                        </h3>
                                        
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                            <div>
                                                <label for="first_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                                    First Name <span class="text-red-500">*</span>
                                                </label>
                                                <input type="text" id="first_name" name="first_name" required
                                                       class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition-all duration-200"
                                                       placeholder="Enter your first name">
                                            </div>
                                            <div>
                                                <label for="last_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                                    Last Name <span class="text-red-500">*</span>
                                                </label>
                                                <input type="text" id="last_name" name="last_name" required
                                                       class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition-all duration-200"
                                                       placeholder="Enter your last name">
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                                            <div>
                                                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                                    Email Address <span class="text-red-500">*</span>
                                                </label>
                                                <input type="email" id="email" name="email" required
                                                       class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition-all duration-200"
                                                       placeholder="your.email@example.com">
                                            </div>
                                            <div>
                                                <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                                    Phone Number
                                                </label>
                                                <input type="tel" id="phone" name="phone"
                                                       class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition-all duration-200"
                                                       placeholder="+1 (555) 123-4567">
                                            </div>
                                        </div>

                                        <div class="mt-6">
                                            <label for="company" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                                Company/Organization
                                            </label>
                                            <input type="text" id="company" name="company"
                                                   class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition-all duration-200"
                                                   placeholder="Your company name">
                                        </div>
                                    </div>

                                    <!-- Project Details -->
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 flex items-center">
                                            <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                            </svg>
                                            Project Requirements
                                        </h3>

                                        <!-- Service Type -->
                                        <div class="mb-6">
                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">
                                                Service Type <span class="text-red-500">*</span>
                                            </label>
                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                <label class="flex items-center p-4 border border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-700 transition-all duration-200 group">
                                                    <input type="radio" name="service_type" value="web_development" required class="sr-only">
                                                    <div class="flex items-center">
                                                        <div class="w-5 h-5 rounded-full border-2 border-gray-300 dark:border-gray-600 mr-3 flex items-center justify-center group-has-[:checked]:border-blue-600 group-has-[:checked]:bg-blue-600">
                                                            <div class="w-2 h-2 rounded-full bg-white opacity-0 group-has-[:checked]:opacity-100"></div>
                                                        </div>
                                                        <div>
                                                            <span class="text-sm font-medium text-gray-900 dark:text-white">Web Development</span>
                                                            <p class="text-xs text-gray-500 dark:text-gray-400">Websites, web apps, e-commerce</p>
                                                        </div>
                                                    </div>
                                                </label>
                                                
                                                <label class="flex items-center p-4 border border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-700 transition-all duration-200 group">
                                                    <input type="radio" name="service_type" value="mobile_development" required class="sr-only">
                                                    <div class="flex items-center">
                                                        <div class="w-5 h-5 rounded-full border-2 border-gray-300 dark:border-gray-600 mr-3 flex items-center justify-center group-has-[:checked]:border-blue-600 group-has-[:checked]:bg-blue-600">
                                                            <div class="w-2 h-2 rounded-full bg-white opacity-0 group-has-[:checked]:opacity-100"></div>
                                                        </div>
                                                        <div>
                                                            <span class="text-sm font-medium text-gray-900 dark:text-white">Mobile Development</span>
                                                            <p class="text-xs text-gray-500 dark:text-gray-400">iOS, Android, cross-platform</p>
                                                        </div>
                                                    </div>
                                                </label>
                                                
                                                <label class="flex items-center p-4 border border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-700 transition-all duration-200 group">
                                                    <input type="radio" name="service_type" value="consulting" required class="sr-only">
                                                    <div class="flex items-center">
                                                        <div class="w-5 h-5 rounded-full border-2 border-gray-300 dark:border-gray-600 mr-3 flex items-center justify-center group-has-[:checked]:border-blue-600 group-has-[:checked]:bg-blue-600">
                                                            <div class="w-2 h-2 rounded-full bg-white opacity-0 group-has-[:checked]:opacity-100"></div>
                                                        </div>
                                                        <div>
                                                            <span class="text-sm font-medium text-gray-900 dark:text-white">Technical Consulting</span>
                                                            <p class="text-xs text-gray-500 dark:text-gray-400">Architecture, strategy, optimization</p>
                                                        </div>
                                                    </div>
                                                </label>
                                                
                                                <label class="flex items-center p-4 border border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-700 transition-all duration-200 group">
                                                    <input type="radio" name="service_type" value="other" required class="sr-only">
                                                    <div class="flex items-center">
                                                        <div class="w-5 h-5 rounded-full border-2 border-gray-300 dark:border-gray-600 mr-3 flex items-center justify-center group-has-[:checked]:border-blue-600 group-has-[:checked]:bg-blue-600">
                                                            <div class="w-2 h-2 rounded-full bg-white opacity-0 group-has-[:checked]:opacity-100"></div>
                                                        </div>
                                                        <div>
                                                            <span class="text-sm font-medium text-gray-900 dark:text-white">Other Services</span>
                                                            <p class="text-xs text-gray-500 dark:text-gray-400">Custom solutions, integrations</p>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>

                                        <!-- Budget and Timeline -->
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                            <div>
                                                <label for="budget_range" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                                    Budget Range
                                                </label>
                                                <select id="budget_range" name="budget_range"
                                                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition-all duration-200">
                                                    <option value="">Select your budget range</option>
                                                    <option value="under_5k">Under $5,000</option>
                                                    <option value="5k_15k">$5,000 - $15,000</option>
                                                    <option value="15k_50k">$15,000 - $50,000</option>
                                                    <option value="50k_plus">$50,000+</option>
                                                    <option value="discuss">Prefer to discuss</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label for="timeline" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                                    Project Timeline
                                                </label>
                                                <select id="timeline" name="timeline"
                                                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition-all duration-200">
                                                    <option value="">Select your timeline</option>
                                                    <option value="asap">ASAP (Rush)</option>
                                                    <option value="1_month">Within 1 month</option>
                                                    <option value="3_months">Within 3 months</option>
                                                    <option value="6_months">Within 6 months</option>
                                                    <option value="flexible">Flexible timeline</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Project Description -->
                                        <div>
                                            <label for="project_description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                                Project Description <span class="text-red-500">*</span>
                                            </label>
                                            <textarea id="project_description" name="project_description" rows="5" required
                                                      class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition-all duration-200 resize-none"
                                                      placeholder="Please describe your project requirements, goals, features you need, and any specific challenges you're facing..."></textarea>
                                        </div>
                                    </div>

                                    <!-- Agreement -->
                                    <div class="flex items-start space-x-3">
                                        <input type="checkbox" id="agreement" name="agreement" required
                                               class="mt-1 w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="agreement" class="text-sm text-gray-700 dark:text-gray-300">
                                            I agree to the <a href="{{ route('terms') }}" class="text-blue-600 hover:underline">Terms of Service</a> and <a href="{{ route('privacy') }}" class="text-blue-600 hover:underline">Privacy Policy</a>. I understand that MS3 Technology will contact me regarding my consultation request. <span class="text-red-500">*</span>
                                        </label>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="flex justify-end pt-6">
                                        <button type="submit" 
                                                :disabled="loading"
                                                :class="loading ? 'opacity-50 cursor-not-allowed' : ''"
                                                class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold rounded-lg shadow-lg hover:from-blue-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transform hover:scale-105 transition-all duration-200">
                                            <span x-show="!loading" class="flex items-center">
                                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                                </svg>
                                                Submit Request
                                            </span>
                                            <span x-show="loading" class="flex items-center">
                                                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                                </svg>
                                                Submitting...
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <!-- Contact Information -->
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 mb-6">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4 flex items-center">
                            <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            Get in Touch
                        </h3>
                        <div class="space-y-4">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                <span class="text-gray-600 dark:text-gray-400">info@ms3technology.com</span>
                            </div>
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                                <span class="text-gray-600 dark:text-gray-400">+880 1700-000000</span>
                            </div>
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <span class="text-gray-600 dark:text-gray-400">Sylhet, Bangladesh</span>
                            </div>
                        </div>
                    </div>

                    <!-- Response Time -->
                    <div class="bg-gradient-to-br from-blue-50 to-purple-50 dark:from-blue-900/20 dark:to-purple-900/20 rounded-2xl border border-blue-200 dark:border-blue-800 p-6 mb-6">
                        <div class="text-center">
                            <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Quick Response</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                We typically respond to consultation requests within 2-4 hours during business hours.
                            </p>
                        </div>
                    </div>

                    <!-- Services List -->
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4 flex items-center">
                            <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                            </svg>
                            Our Services
                        </h3>
                        <div class="space-y-3">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-gray-600 dark:text-gray-400 text-sm">Web Application Development</span>
                            </div>
                            <div class="flex items-center">
                                <svg class="w-4 h-4 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-gray-600 dark:text-gray-400 text-sm">Mobile App Development</span>
                            </div>
                            <div class="flex items-center">
                                <svg class="w-4 h-4 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-gray-600 dark:text-gray-400 text-sm">E-commerce Solutions</span>
                            </div>
                            <div class="flex items-center">
                                <svg class="w-4 h-4 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-weight="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-gray-600 dark:text-gray-400 text-sm">Technical Consulting</span>
                            </div>
                            <div class="flex items-center">
                                <svg class="w-4 h-4 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-gray-600 dark:text-gray-400 text-sm">System Integration</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection