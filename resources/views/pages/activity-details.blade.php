@extends('layout.app')

@section('content')
    <div class="min-h-screen bg-gray-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-2">
                    <!-- Activity Header -->
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg overflow-hidden mb-8">
                        <!-- Featured Image or Gallery -->
                        @if ($activity->images->count() > 0)
                            <div class="relative">
                                @if ($activity->images->count() === 1)
                                    <!-- Single Image -->
                                    <img src="{{ asset('storage/' . $activity->images->first()->image_path) }}"
                                        alt="{{ $activity->title }}" class="w-full h-64 md:h-80 object-cover">
                                @else
                                    <!-- Image Gallery -->
                                    <div class="relative">
                                        <div id="activity-gallery" class="w-full h-64 md:h-80 overflow-hidden">
                                            @foreach ($activity->images as $index => $image)
                                                <img src="{{ asset('storage/' . $image->image_path) }}"
                                                    alt="{{ $activity->title }}"
                                                    class="w-full h-full object-cover absolute inset-0 transition-opacity duration-500 {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}"
                                                    data-slide="{{ $index }}">
                                            @endforeach
                                        </div>

                                        <!-- Gallery Controls -->
                                        @if ($activity->images->count() > 1)
                                            <div class="absolute inset-0 flex items-center justify-between px-4">
                                                <button onclick="previousSlide()"
                                                    class="bg-black bg-opacity-50 text-white p-2 rounded-full hover:bg-opacity-75 transition-all duration-200">
                                                    <i class="fas fa-chevron-left"></i>
                                                </button>
                                                <button onclick="nextSlide()"
                                                    class="bg-black bg-opacity-50 text-white p-2 rounded-full hover:bg-opacity-75 transition-all duration-200">
                                                    <i class="fas fa-chevron-right"></i>
                                                </button>
                                            </div>

                                            <!-- Gallery Indicators -->
                                            <div
                                                class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
                                                @foreach ($activity->images as $index => $image)
                                                    <button onclick="goToSlide({{ $index }})"
                                                        class="w-3 h-3 rounded-full transition-all duration-200 {{ $index === 0 ? 'bg-white' : 'bg-white bg-opacity-50' }}"
                                                        data-indicator="{{ $index }}">
                                                    </button>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        @elseif($activity->image_url)
                            <img src="{{ $activity->image_url }}" alt="{{ $activity->title }}"
                                class="w-full h-64 md:h-80 object-cover">
                        @else
                            <div
                                class="w-full h-64 md:h-80 bg-gradient-to-br from-blue-400 via-purple-500 to-indigo-600 flex items-center justify-center">
                                <div class="text-center text-white">
                                    <i class="fas fa-calendar-alt text-6xl mb-4 opacity-80"></i>
                                    <h3 class="text-xl font-semibold">{{ $activity->title }}</h3>
                                </div>
                            </div>
                        @endif

                        <!-- Activity Info -->
                        <div class="p-6 md:p-8">
                            <!-- Category and Status -->
                            <div class="flex flex-wrap items-center gap-3 mb-4">
                                @if ($activity->category)
                                    <span
                                        class="inline-block bg-blue-100 text-blue-700 dark:bg-blue-900 dark:text-blue-200 text-sm font-semibold px-3 py-1 rounded-full">
                                        <i class="fas fa-tag mr-1"></i>{{ $activity->category }}
                                    </span>
                                @endif

                                @if ($activity->status)
                                    <span
                                        class="inline-flex items-center px-3 py-1 text-sm font-medium rounded-full
                                        {{ $activity->status === 'completed'
                                            ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200'
                                            : ($activity->status === 'ongoing'
                                                ? 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200'
                                                : 'bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200') }}">
                                        <i
                                            class="fas fa-{{ $activity->status === 'completed' ? 'check-circle' : ($activity->status === 'ongoing' ? 'clock' : 'pause-circle') }} mr-1"></i>
                                        {{ ucfirst($activity->status) }}
                                    </span>
                                @endif

                                <span class="text-gray-500 dark:text-gray-400 text-sm">
                                    <i class="fas fa-calendar mr-1"></i>
                                    {{ \Carbon\Carbon::parse($activity->activity_date ?? $activity->created_at)->format('F j, Y') }}
                                </span>
                            </div>

                            <!-- Title -->
                            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                                {{ $activity->title }}
                            </h1>

                            <!-- Meta Information -->
                            <div
                                class="flex flex-wrap items-center gap-4 text-sm text-gray-600 dark:text-gray-400 mb-6 pb-6 border-b border-gray-200 dark:border-gray-700">
                                <div class="flex items-center">
                                    <i class="fas fa-clock mr-2"></i>
                                    <span>Published
                                        {{ \Carbon\Carbon::parse($activity->created_at)->diffForHumans() }}</span>
                                </div>
                                @if ($activity->images->count() > 0)
                                    <div class="flex items-center">
                                        <i class="fas fa-images mr-2"></i>
                                        <span>{{ $activity->images->count() }}
                                            {{ $activity->images->count() === 1 ? 'image' : 'images' }}</span>
                                    </div>
                                @endif
                                <div class="flex items-center">
                                    <i class="fas fa-eye mr-2"></i>
                                    <span>Activity Details</span>
                                </div>
                            </div>

                            <!-- Description -->
                            @if ($activity->description)
                                <div class="prose prose-lg dark:prose-invert max-w-none">
                                    <div class="text-gray-700 dark:text-gray-300 leading-relaxed whitespace-pre-line">
                                        {{ $activity->description }}
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <!-- Quick Actions -->
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 mb-6">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4 flex items-center">
                            <i class="fas fa-share-alt mr-2 text-blue-600"></i>
                            Share Activity
                        </h3>
                        <div class="flex flex-wrap gap-3">
                            <button onclick="shareOnFacebook()"
                                class="flex-1 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200 text-sm font-medium">
                                <i class="fab fa-facebook-f mr-2"></i>Facebook
                            </button>
                            <button onclick="shareOnTwitter()"
                                class="flex-1 bg-sky-500 text-white px-4 py-2 rounded-lg hover:bg-sky-600 transition-colors duration-200 text-sm font-medium">
                                <i class="fab fa-twitter mr-2"></i>Twitter
                            </button>
                        </div>
                        <button onclick="copyLink()"
                            class="w-full mt-3 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 px-4 py-2 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors duration-200 text-sm font-medium">
                            <i class="fas fa-link mr-2"></i>Copy Link
                        </button>
                    </div>

                    <!-- Activity Details -->
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 mb-6">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4 flex items-center">
                            <i class="fas fa-info-circle mr-2 text-blue-600"></i>
                            Details
                        </h3>
                        <div class="space-y-4">
                            @if ($activity->activity_date)
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-600 dark:text-gray-400">Activity Date</span>
                                    <span class="font-medium text-gray-900 dark:text-white">
                                        {{ \Carbon\Carbon::parse($activity->activity_date)->format('M j, Y') }}
                                    </span>
                                </div>
                            @endif

                            @if ($activity->category)
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-600 dark:text-gray-400">Category</span>
                                    <span
                                        class="font-medium text-gray-900 dark:text-white">{{ $activity->category }}</span>
                                </div>
                            @endif

                            @if ($activity->status)
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-600 dark:text-gray-400">Status</span>
                                    <span
                                        class="font-medium text-gray-900 dark:text-white">{{ ucfirst($activity->status) }}</span>
                                </div>
                            @endif

                            <div class="flex items-center justify-between">
                                <span class="text-gray-600 dark:text-gray-400">Created</span>
                                <span class="font-medium text-gray-900 dark:text-white">
                                    {{ \Carbon\Carbon::parse($activity->created_at)->format('M j, Y') }}
                                </span>
                            </div>

                            @if ($activity->images->count() > 0)
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-600 dark:text-gray-400">Images</span>
                                    <span
                                        class="font-medium text-gray-900 dark:text-white">{{ $activity->images->count() }}</span>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Related Activities -->
                    @if ($relatedActivities->count() > 0)
                        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6">
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4 flex items-center">
                                <i class="fas fa-layer-group mr-2 text-blue-600"></i>
                                Related Activities
                            </h3>
                            <div class="space-y-4">
                                @foreach ($relatedActivities as $related)
                                    <a href="{{ route('activities.details', $related->id) }}"
                                        class="block group hover:bg-gray-50 dark:hover:bg-gray-700 rounded-lg p-3 transition-colors duration-200">
                                        <div class="flex gap-3">
                                            @if ($related->images->count() > 0)
                                                <img src="{{ asset('storage/' . $related->images->first()->image) }}"
                                                    alt="{{ $related->title }}"
                                                    class="w-16 h-16 object-cover rounded-lg flex-shrink-0">
                                            @else
                                                <div
                                                    class="w-16 h-16 bg-gradient-to-br from-blue-400 to-purple-500 rounded-lg flex items-center justify-center flex-shrink-0">
                                                    <i class="fas fa-calendar-alt text-white text-lg"></i>
                                                </div>
                                            @endif
                                            <div class="flex-1 min-w-0">
                                                <h4
                                                    class="font-medium text-gray-900 dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400 line-clamp-2 transition-colors duration-200">
                                                    {{ $related->title }}
                                                </h4>
                                                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                                                    {{ \Carbon\Carbon::parse($related->activity_date ?? $related->created_at)->format('M j, Y') }}
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Consultation Call-to-Action -->
                    <div
                        class="bg-gradient-to-br from-blue-50 to-purple-50 dark:from-blue-900/20 dark:to-purple-900/20 rounded-2xl border border-blue-200 dark:border-blue-800 p-6">
                        <div class="text-center">
                            <div
                                class="w-12 h-12 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Need Similar Solution?</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
                                Inspired by this activity? Let's discuss how we can help you achieve similar results for
                                your business.
                            </p>
                            <a href="{{ url('/consultation') }}"
                                class="inline-block bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200 font-medium">
                                <i class="fas fa-rocket mr-2"></i>Request a Consultation
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Gallery Scripts -->
    <script>
        let currentSlide = 0;
        const totalSlides = {{ $activity->images->count() }};

        function showSlide(index) {
            const slides = document.querySelectorAll('[data-slide]');
            const indicators = document.querySelectorAll('[data-indicator]');

            slides.forEach((slide, i) => {
                slide.classList.toggle('opacity-100', i === index);
                slide.classList.toggle('opacity-0', i !== index);
            });

            indicators.forEach((indicator, i) => {
                indicator.classList.toggle('bg-white', i === index);
                indicator.classList.toggle('bg-white', i !== index);
                indicator.classList.toggle('bg-opacity-50', i !== index);
            });
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % totalSlides;
            showSlide(currentSlide);
        }

        function previousSlide() {
            currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
            showSlide(currentSlide);
        }

        function goToSlide(index) {
            currentSlide = index;
            showSlide(currentSlide);

            // Scroll to gallery if clicked from thumbnails
            const gallery = document.getElementById('activity-gallery');
            if (gallery) {
                gallery.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            }
        }

        // Auto-advance gallery (optional)
        @if ($activity->images->count() > 1)
            setInterval(() => {
                nextSlide();
            }, 5000);
        @endif

        // Share functions
        function shareOnFacebook() {
            const url = encodeURIComponent(window.location.href);
            window.open(`https://www.facebook.com/sharer/sharer.php?u=${url}`, '_blank', 'width=600,height=400');
        }

        function shareOnTwitter() {
            const url = encodeURIComponent(window.location.href);
            const text = encodeURIComponent('{{ $activity->title }} - MS3 Technology');
            window.open(`https://twitter.com/intent/tweet?url=${url}&text=${text}`, '_blank', 'width=600,height=400');
        }

        function copyLink() {
            navigator.clipboard.writeText(window.location.href).then(() => {
                // Show success message
                const button = event.target.closest('button');
                const originalText = button.innerHTML;
                button.innerHTML = '<i class="fas fa-check mr-2"></i>Copied!';
                button.classList.add('bg-green-100', 'text-green-700', 'dark:bg-green-900', 'dark:text-green-200');

                setTimeout(() => {
                    button.innerHTML = originalText;
                    button.classList.remove('bg-green-100', 'text-green-700', 'dark:bg-green-900',
                        'dark:text-green-200');
                }, 2000);
            });
        }
    </script>
@endsection
