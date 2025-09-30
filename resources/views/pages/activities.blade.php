@extends('layout.app')

@section('content')
    <div>
        <x-page-header title="Our Activities" subtitle="Discover our latest projects, events, and company milestones" />

        <div class="w-full md:w-5/6 mx-auto my-20 flex flex-col lg:flex-row gap-8">
            <!-- Activities List -->
            <div class="flex-1">
                @if ($activities->count() > 0)
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        @foreach ($activities as $activity)
                            <div
                                class="bg-white dark:bg-gray-800 rounded-2xl shadow-md hover:shadow-xl transition flex flex-col overflow-hidden h-full">
                                <!-- Activity Image -->
                                @if ($activity->images->count() > 0)
                                    <img src="{{ asset('storage/' . $activity->images->first()->image_path) }}"
                                        alt="{{ $activity->title }}" class="w-full h-40 object-cover object-center">
                                @elseif($activity->image_url)
                                    <img src="{{ $activity->image_url }}" alt="{{ $activity->title }}"
                                        class="w-full h-40 object-cover object-center">
                                @else
                                    <div
                                        class="w-full h-40 bg-gradient-to-br from-blue-400 to-purple-500 flex items-center justify-center">
                                        <i class="fas fa-calendar-alt text-white text-3xl"></i>
                                    </div>
                                @endif

                                <div class="flex-1 flex flex-col p-4 gap-2">
                                    <!-- Category and Date -->
                                    <div class="flex items-center justify-between gap-2 mb-1">
                                        <span
                                            class="inline-block bg-blue-100 text-blue-700 dark:bg-blue-900 dark:text-blue-200 text-xs font-semibold px-2 py-0.5 rounded">
                                            {{ $activity->category ?? 'General' }}
                                        </span>
                                        <span class="text-xs text-gray-400">
                                            {{ \Carbon\Carbon::parse($activity->activity_date ?? $activity->created_at)->format('M d, Y') }}
                                        </span>
                                    </div>

                                    <!-- Status Badge -->
                                    @if ($activity->status)
                                        <div class="mb-2">
                                            <span
                                                class="inline-block px-2 py-1 text-xs font-medium rounded-full
                                                {{ $activity->status === 'completed'
                                                    ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200'
                                                    : ($activity->status === 'ongoing'
                                                        ? 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200'
                                                        : 'bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200') }}">
                                                {{ ucfirst($activity->status) }}
                                            </span>
                                        </div>
                                    @endif

                                    <!-- Title -->
                                    <h2 class="text-lg font-bold text-blue-700 dark:text-blue-300 line-clamp-2">
                                        {{ $activity->title }}
                                    </h2>

                                    <!-- Description -->
                                    <p class="text-gray-600 dark:text-gray-300 text-sm line-clamp-3 mb-2">
                                        {{ \Illuminate\Support\Str::limit(strip_tags($activity->description ?? ''), 120) }}
                                    </p>

                                    <!-- Footer -->
                                    <div class="flex items-center justify-between mt-auto">
                                        @if ($activity->images->count() > 1)
                                            <span class="text-xs text-gray-500">
                                                <i class="fas fa-images mr-1"></i>{{ $activity->images->count() }} images
                                            </span>
                                        @else
                                            <span class="text-xs text-gray-500">
                                                <i
                                                    class="fas fa-clock mr-1"></i>{{ \Carbon\Carbon::parse($activity->created_at)->diffForHumans() }}
                                            </span>
                                        @endif
                                        <a href="{{ route('activities.details', $activity->id) }}"
                                            class="text-blue-600 dark:text-blue-400 text-sm font-semibold hover:underline">
                                            View Details
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Pagination -->
                    <div class="mt-8">
                        {{ $activities->appends(request()->query())->links() }}
                    </div>
                @else
                    <div class="text-center py-12">
                        <div
                            class="w-24 h-24 mx-auto mb-4 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center">
                            <i class="fas fa-calendar-alt text-gray-400 text-3xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-600 dark:text-gray-400 mb-2">No Activities Found</h3>
                        <p class="text-gray-500 dark:text-gray-500">Check back later for updates on our latest activities
                            and events.</p>
                        @if (request()->has('category') || request()->has('search'))
                            <a href="{{ url('/activities') }}"
                                class="inline-block mt-4 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200">
                                Clear Filters
                            </a>
                        @endif
                    </div>
                @endif
            </div>
            <!-- Sidebar -->
            <aside class="w-full lg:w-72 flex-shrink-0 flex flex-col gap-8">
                <!-- Search -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow p-6">
                    <h2 class="text-base font-bold text-blue-700 dark:text-blue-300 mb-4 flex items-center gap-2">
                        <i class="fas fa-search"></i> Search Activities
                    </h2>
                    <form method="GET" action="{{ url('/activities') }}" class="space-y-3">
                        <div>
                            <input type="text" name="search" value="{{ request()->search }}"
                                placeholder="Search activities..."
                                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white">
                        </div>
                        <div class="flex gap-2">
                            <button type="submit"
                                class="flex-1 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200 text-sm font-medium">
                                <i class="fas fa-search mr-1"></i> Search
                            </button>
                            @if (request()->hasAny(['search', 'category', 'status']))
                                <a href="{{ url('/activities') }}"
                                    class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition-colors duration-200 text-sm font-medium">
                                    Clear
                                </a>
                            @endif
                        </div>
                    </form>
                </div>

                <!-- Categories -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-base font-bold text-blue-700 dark:text-blue-300 flex items-center gap-2">
                            <i class="fas fa-layer-group"></i> Categories
                        </h2>
                        <a class="text-sm text-gray-500 hover:underline" href="{{ url('/activities') }}">Clear</a>
                    </div>
                    <ul class="space-y-3">
                        @php
                            $categories = $activities->pluck('category')->filter()->unique()->sort();
                        @endphp
                        @forelse ($categories as $category)
                            <li onclick="window.location.href='{{ url('/activities?category=' . urlencode($category)) }}'"
                                class="flex items-center gap-2 text-gray-700 dark:text-gray-200 hover:text-blue-600 cursor-pointer transition-colors duration-200">
                                <i class="fas fa-angle-right"></i>
                                <span>{{ $category }}</span>
                                <span class="ml-auto text-xs text-gray-400">
                                    {{ $activities->where('category', $category)->count() }}
                                </span>
                            </li>
                        @empty
                            <li class="text-gray-500 dark:text-gray-400 text-sm italic">No categories available</li>
                        @endforelse
                    </ul>
                </div>

                <!-- Activity Stats -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow p-6">
                    <h2 class="text-base font-bold text-blue-700 dark:text-blue-300 mb-4 flex items-center gap-2">
                        <i class="fas fa-chart-bar"></i> Activity Stats
                    </h2>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <span class="text-gray-700 dark:text-gray-300">Total Activities</span>
                            <span class="font-semibold text-blue-600 dark:text-blue-400">{{ $activities->count() }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-700 dark:text-gray-300">Completed</span>
                            <span class="font-semibold text-green-600 dark:text-green-400">
                                {{ $activities->where('status', 'completed')->count() }}
                            </span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-700 dark:text-gray-300">Ongoing</span>
                            <span class="font-semibold text-yellow-600 dark:text-yellow-400">
                                {{ $activities->where('status', 'ongoing')->count() }}
                            </span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-700 dark:text-gray-300">This Month</span>
                            <span class="font-semibold text-purple-600 dark:text-purple-400">
                                {{ $activities->filter(function ($activity) {
                                        return \Carbon\Carbon::parse($activity->activity_date ?? $activity->created_at)->isCurrentMonth();
                                    })->count() }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow p-6">
                    <h2 class="text-base font-bold text-blue-700 dark:text-blue-300 mb-4 flex items-center gap-2">
                        <i class="fas fa-compass"></i> Explore More
                    </h2>
                    <ul class="space-y-3">
                        <li>
                            <a href="{{ url('/solutions') }}"
                                class="flex items-center gap-2 text-gray-700 dark:text-gray-200 hover:text-blue-600 transition-colors duration-200 group">
                                <i class="fas fa-lightbulb"></i>
                                <span>Our Solutions</span>
                                <i
                                    class="fas fa-angle-right ml-auto group-hover:translate-x-1 transition-transform duration-200"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/experts') }}"
                                class="flex items-center gap-2 text-gray-700 dark:text-gray-200 hover:text-blue-600 transition-colors duration-200 group">
                                <i class="fas fa-users"></i>
                                <span>Our Team</span>
                                <i
                                    class="fas fa-angle-right ml-auto group-hover:translate-x-1 transition-transform duration-200"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/clients') }}"
                                class="flex items-center gap-2 text-gray-700 dark:text-gray-200 hover:text-blue-600 transition-colors duration-200 group">
                                <i class="fas fa-handshake"></i>
                                <span>Our Clients</span>
                                <i
                                    class="fas fa-angle-right ml-auto group-hover:translate-x-1 transition-transform duration-200"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/contact') }}"
                                class="flex items-center gap-2 text-gray-700 dark:text-gray-200 hover:text-blue-600 transition-colors duration-200 group">
                                <i class="fas fa-envelope"></i>
                                <span>Contact Us</span>
                                <i
                                    class="fas fa-angle-right ml-auto group-hover:translate-x-1 transition-transform duration-200"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </aside>
        </div>
    </div>
@endsection
