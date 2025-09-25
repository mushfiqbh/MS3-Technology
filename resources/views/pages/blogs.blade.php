@extends('layout.app')

@section('content')
    <div>
        <x-page-header title="Blogs" subtitle="Latest Insights and Updates from IT Lab Solutions" />

        <div class="w-full md:w-5/6 mx-auto my-20 flex flex-col lg:flex-row gap-8">
            <!-- Blog List -->
            <div class="flex-1">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    @foreach ($blogs as $blog)
                        <div
                            class="bg-white dark:bg-gray-800 rounded-2xl shadow-md hover:shadow-xl transition flex flex-col overflow-hidden h-full">
                            <img src="{{ asset('/images/activity.webp') }}" alt="{{ $blog->title }}"
                                class="w-full h-40 object-cover object-center">
                            <div class="flex-1 flex flex-col p-4 gap-2">
                                <div class="flex items-center gap-2 mb-1">
                                    <span
                                        class="inline-block bg-blue-100 text-blue-700 dark:bg-blue-900 dark:text-blue-200 text-xs font-semibold px-2 py-0.5 rounded">{{ $blog->category ?? 'General' }}</span>
                                    <span
                                        class="text-xs text-gray-400">{{ \Carbon\Carbon::parse($blog->created_at)->format('M d, Y') }}</span>
                                </div>
                                <h2 class="text-lg font-bold text-blue-700 dark:text-blue-300 line-clamp-2">
                                    {{ $blog->title }}
                                </h2>
                                <p class="text-gray-600 dark:text-gray-300 text-sm line-clamp-3 mb-2">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($blog->content ?? ''), 90) }}</p>
                                <div class="flex items-center gap-2 mt-auto">
                                    <span class="text-xs text-gray-500">By {{ $blog->author }}</span>
                                    <a href="#"
                                        class="ml-auto text-blue-600 dark:text-blue-400 text-sm font-semibold hover:underline">Read
                                        More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-8">
                    {{ $blogs->links() }}
                </div>
            </div>
            <!-- Sidebar -->
            <aside class="w-full lg:w-72 flex-shrink-0 flex flex-col gap-8">
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-base font-bold text-blue-700 dark:text-blue-300 flex items-center gap-2"><i
                                class="fas fa-layer-group"></i> Categories</h2>
                        <a class="text-sm text-gray-500 hover:underline" href="{{ url('/blogs') }}">Clear</a>
                    </div>
                    <ul class="space-y-3">
                        @foreach ($categories as $category)
                            <li onclick="window.location.href='{{ url('/blogs?category=' . urlencode($category)) }}'"
                                class="flex items-center gap-2 text-gray-700 dark:text-gray-200 hover:text-blue-600 cursor-pointer">
                                <i class="fas fa-angle-right"></i> {{ $category }}
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow p-6">
                    <h2 class="text-base font-bold text-blue-700 dark:text-blue-300 mb-4 flex items-center gap-2"><i
                            class="fas fa-compass"></i> Explore</h2>
                    <ul class="space-y-3">
                        <li
                            class="flex items-center gap-2 text-gray-700 dark:text-gray-200 hover:text-blue-600 cursor-pointer">
                            <i class="fas fa-box"></i> Our Products <i class="fas fa-angle-right ml-auto"></i>
                        </li>
                        <li
                            class="flex items-center gap-2 text-gray-700 dark:text-gray-200 hover:text-blue-600 cursor-pointer">
                            <i class="fas fa-cogs"></i> Our Solutions <i class="fas fa-angle-right ml-auto"></i>
                        </li>
                        <li
                            class="flex items-center gap-2 text-gray-700 dark:text-gray-200 hover:text-blue-600 cursor-pointer">
                            <i class="fas fa-users"></i> Our Team <i class="fas fa-angle-right ml-auto"></i>
                        </li>
                    </ul>
                </div>
            </aside>
        </div>
    </div>
@endsection
