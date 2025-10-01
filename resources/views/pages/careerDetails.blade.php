@extends('layout.app')

@section('content')
    <!-- Breadcrumb -->
    <section class="bg-gray-50 dark:bg-gray-800 py-6 border-b border-gray-200 dark:border-gray-700">
        <div class="container mx-auto px-6 sm:px-8 lg:px-12">
            <nav class="flex items-center space-x-2 text-sm">
                <a href="{{ route('home') }}" class="text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                    <i class="fas fa-home"></i> Home
                </a>
                <i class="fas fa-chevron-right text-gray-400 text-xs"></i>
                <a href="{{ route('careers') }}" class="text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                    Careers
                </a>
                <i class="fas fa-chevron-right text-gray-400 text-xs"></i>
                <span class="text-blue-600 dark:text-blue-400 font-medium">{{ $career->title }}</span>
            </nav>
        </div>
    </section>

    <div class="min-h-screen bg-gray-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Header Card -->
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg overflow-hidden">
                        <div class="bg-gradient-to-r from-blue-600 to-indigo-700 p-8 text-white">
                            <div class="flex flex-wrap items-center gap-3 mb-4">
                                @if($career->status === 'Open')
                                    <span class="inline-flex items-center px-4 py-2 bg-green-500 text-white text-sm font-semibold rounded-full">
                                        <i class="fas fa-circle text-xs mr-2 animate-pulse"></i>
                                        Open Position
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-4 py-2 bg-gray-500 text-white text-sm font-semibold rounded-full">
                                        Position Closed
                                    </span>
                                @endif
                                <span class="inline-flex items-center px-4 py-2 bg-white/20 text-white text-sm font-semibold rounded-full backdrop-blur-sm">
                                    {{ ucfirst(str_replace('-', ' ', $career->employment_type)) }}
                                </span>
                            </div>
                            <h1 class="text-3xl sm:text-4xl font-bold mb-4">{{ $career->title }}</h1>
                            <div class="flex flex-wrap items-center gap-6 text-blue-100">
                                <div class="flex items-center gap-2">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>{{ $career->location }}</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <i class="fas fa-calendar"></i>
                                    <span>Posted {{ $career->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Job Description -->
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 sm:p-8">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4 flex items-center">
                            <i class="fas fa-file-alt text-blue-600 dark:text-blue-400 mr-3"></i>
                            Job Description
                        </h2>
                        <div class="prose dark:prose-invert max-w-none text-gray-700 dark:text-gray-300 leading-relaxed">
                            {!! nl2br(e($career->description)) !!}
                        </div>
                    </div>

                    <!-- Requirements -->
                    @if($career->requirements)
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 sm:p-8">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6 flex items-center">
                            <i class="fas fa-check-circle text-green-600 dark:text-green-400 mr-3"></i>
                            Requirements
                        </h2>
                        <div class="space-y-3">
                            @foreach(explode("\n", $career->requirements) as $requirement)
                                @if(trim($requirement))
                                    <div class="flex items-start gap-3 p-3 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                        <i class="fas fa-chevron-right text-blue-600 dark:text-blue-400 mt-1 flex-shrink-0"></i>
                                        <span class="text-gray-700 dark:text-gray-300">{{ trim($requirement) }}</span>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <!-- Application Form -->
                    <div id="applicationForm" class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 sm:p-8">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6 flex items-center">
                            <i class="fas fa-paper-plane text-blue-600 dark:text-blue-400 mr-3"></i>
                            Apply for this Position
                        </h2>

                        <form action="#" method="POST" enctype="multipart/form-data" class="space-y-6">
                            @csrf
                            <input type="hidden" name="career_id" value="{{ $career->id }}">

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Full Name -->
                                <div class="space-y-2">
                                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                        Full Name *
                                    </label>
                                    <input 
                                        type="text" 
                                        name="full_name" 
                                        required 
                                        class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                                        placeholder="John Doe"
                                    />
                                </div>

                                <!-- Email -->
                                <div class="space-y-2">
                                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                        Email Address *
                                    </label>
                                    <input 
                                        type="email" 
                                        name="email" 
                                        required 
                                        class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                                        placeholder="john@example.com"
                                    />
                                </div>

                                <!-- Phone -->
                                <div class="space-y-2">
                                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                        Phone Number *
                                    </label>
                                    <input 
                                        type="tel" 
                                        name="phone" 
                                        required 
                                        class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                                        placeholder="+880 1234-567890"
                                    />
                                </div>

                                <!-- LinkedIn -->
                                <div class="space-y-2">
                                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                        LinkedIn Profile (Optional)
                                    </label>
                                    <input 
                                        type="url" 
                                        name="linkedin" 
                                        class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                                        placeholder="https://linkedin.com/in/yourprofile"
                                    />
                                </div>
                            </div>

                            <!-- Resume Upload -->
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                    Upload Resume/CV *
                                </label>
                                <div class="flex items-center justify-center w-full">
                                    <label class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:border-gray-600 transition-colors">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-2"></i>
                                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                                                <span class="font-semibold">Click to upload</span> or drag and drop
                                            </p>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">PDF, DOC, DOCX (MAX. 5MB)</p>
                                        </div>
                                        <input type="file" name="resume" accept=".pdf,.doc,.docx" required class="hidden" />
                                    </label>
                                </div>
                            </div>

                            <!-- Cover Letter -->
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                    Cover Letter *
                                </label>
                                <textarea 
                                    name="cover_letter" 
                                    rows="6" 
                                    required
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                                    placeholder="Tell us why you're a great fit for this position..."
                                ></textarea>
                            </div>

                            <!-- Additional Information -->
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                    Additional Information (Optional)
                                </label>
                                <textarea 
                                    name="additional_info" 
                                    rows="4"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                                    placeholder="Portfolio links, references, or any other relevant information..."
                                ></textarea>
                            </div>

                            <!-- Terms and Conditions -->
                            <div class="flex items-start gap-3">
                                <input 
                                    type="checkbox" 
                                    name="agree_terms" 
                                    required 
                                    class="mt-1 w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                />
                                <label class="text-sm text-gray-600 dark:text-gray-400">
                                    I agree to the <a href="{{ route('terms') }}" class="text-blue-600 dark:text-blue-400 hover:underline">terms and conditions</a> and <a href="{{ route('privacy') }}" class="text-blue-600 dark:text-blue-400 hover:underline">privacy policy</a>
                                </label>
                            </div>

                            <!-- Submit Button -->
                            <div class="pt-4">
                                <button 
                                    type="submit"
                                    class="w-full inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-lg font-bold text-lg shadow-lg hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200 transform hover:scale-105"
                                >
                                    <i class="fas fa-paper-plane mr-3"></i>
                                    Submit Application
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1 space-y-6">
                    <!-- Quick Info Card -->
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6">
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-6">Job Overview</h3>
                        
                        <div class="space-y-4">
                            <div class="flex items-start gap-4 p-4 bg-blue-50 dark:bg-blue-900/20 rounded-lg">
                                <div class="flex-shrink-0 w-10 h-10 bg-blue-600 dark:bg-blue-500 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-briefcase text-white"></i>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-600 dark:text-gray-400 mb-1">Employment Type</p>
                                    <p class="font-semibold text-gray-900 dark:text-white">
                                        {{ ucfirst(str_replace('-', ' ', $career->employment_type)) }}
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4 p-4 bg-green-50 dark:bg-green-900/20 rounded-lg">
                                <div class="flex-shrink-0 w-10 h-10 bg-green-600 dark:bg-green-500 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-map-marker-alt text-white"></i>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-600 dark:text-gray-400 mb-1">Location</p>
                                    <p class="font-semibold text-gray-900 dark:text-white">{{ $career->location }}</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4 p-4 bg-purple-50 dark:bg-purple-900/20 rounded-lg">
                                <div class="flex-shrink-0 w-10 h-10 bg-purple-600 dark:bg-purple-500 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-calendar text-white"></i>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-600 dark:text-gray-400 mb-1">Posted Date</p>
                                    <p class="font-semibold text-gray-900 dark:text-white">
                                        {{ $career->created_at->format('M d, Y') }}
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4 p-4 bg-orange-50 dark:bg-orange-900/20 rounded-lg">
                                <div class="flex-shrink-0 w-10 h-10 bg-orange-600 dark:bg-orange-500 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-info-circle text-white"></i>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-600 dark:text-gray-400 mb-1">Status</p>
                                    <p class="font-semibold {{ $career->status === 'Open' ? 'text-green-600 dark:text-green-400' : 'text-gray-600 dark:text-gray-400' }}">
                                        {{ ucfirst($career->status) }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
                            <button 
                                onclick="document.getElementById('applicationForm').scrollIntoView({ behavior: 'smooth' })"
                                class="w-full inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-lg font-semibold shadow-lg hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200 transform hover:scale-105"
                            >
                                <i class="fas fa-paper-plane mr-2"></i>
                                Apply Now
                            </button>
                        </div>
                    </div>

                    <!-- Share Card -->
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6">
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Share this Job</h3>
                        <div class="flex flex-wrap gap-3">
                            <button 
                                onclick="shareOnLinkedIn()"
                                class="flex-1 inline-flex items-center justify-center px-4 py-3 bg-blue-700 text-white rounded-lg font-semibold hover:bg-blue-800 transition-colors"
                            >
                                <i class="fab fa-linkedin-in mr-2"></i>
                                LinkedIn
                            </button>
                            <button 
                                onclick="shareOnFacebook()"
                                class="flex-1 inline-flex items-center justify-center px-4 py-3 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition-colors"
                            >
                                <i class="fab fa-facebook-f mr-2"></i>
                                Facebook
                            </button>
                            <button 
                                onclick="shareOnTwitter()"
                                class="flex-1 inline-flex items-center justify-center px-4 py-3 bg-sky-500 text-white rounded-lg font-semibold hover:bg-sky-600 transition-colors"
                            >
                                <i class="fab fa-twitter mr-2"></i>
                                Twitter
                            </button>
                            <button 
                                onclick="copyJobLink()"
                                class="w-full inline-flex items-center justify-center px-4 py-3 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-lg font-semibold hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors"
                            >
                                <i class="fas fa-link mr-2"></i>
                                Copy Link
                            </button>
                        </div>
                    </div>

                    <!-- Contact Card -->
                    <div class="bg-gradient-to-br from-blue-600 to-indigo-700 rounded-2xl shadow-lg p-6 text-white">
                        <h3 class="text-xl font-bold mb-4">Have Questions?</h3>
                        <p class="text-blue-100 mb-6">
                            Feel free to reach out if you have any questions about this position or the application process.
                        </p>
                        <a 
                            href="{{ route('contact') }}" 
                            class="inline-flex items-center justify-center w-full px-6 py-3 bg-white text-blue-600 rounded-lg font-semibold hover:bg-gray-100 transition-colors"
                        >
                            <i class="fas fa-envelope mr-2"></i>
                            Contact Us
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Share & Social Scripts -->
    <script>
        function shareJob() {
            if (navigator.share) {
                navigator.share({
                    title: '{{ $career->title }} - MS3 Technology',
                    text: 'Check out this job opportunity at MS3 Technology',
                    url: window.location.href
                }).catch(err => console.log('Error sharing:', err));
            } else {
                copyJobLink();
            }
        }

        function shareOnLinkedIn() {
            const url = encodeURIComponent(window.location.href);
            window.open(`https://www.linkedin.com/sharing/share-offsite/?url=${url}`, '_blank', 'width=600,height=400');
        }

        function shareOnFacebook() {
            const url = encodeURIComponent(window.location.href);
            window.open(`https://www.facebook.com/sharer/sharer.php?u=${url}`, '_blank', 'width=600,height=400');
        }

        function shareOnTwitter() {
            const url = encodeURIComponent(window.location.href);
            const text = encodeURIComponent('{{ $career->title }} - MS3 Technology');
            window.open(`https://twitter.com/intent/tweet?url=${url}&text=${text}`, '_blank', 'width=600,height=400');
        }

        function copyJobLink() {
            navigator.clipboard.writeText(window.location.href).then(() => {
                alert('Job link copied to clipboard!');
            }).catch(err => {
                console.error('Failed to copy:', err);
            });
        }

        // File upload preview
        document.querySelector('input[type="file"]')?.addEventListener('change', function(e) {
            const fileName = e.target.files[0]?.name;
            if (fileName) {
                const label = e.target.closest('label');
                const textElement = label.querySelector('p.mb-2');
                textElement.innerHTML = `<span class="font-semibold text-blue-600">Selected:</span> ${fileName}`;
            }
        });
    </script>
@endsection
