<section class="py-16 w-full bg-gray-50 dark:bg-gray-800">
    <x-heading title="Activities">
        What Happening Now At IT Lab
    </x-heading>

    <div class="container mx-auto px-6 sm:px-8 lg:px-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-1">
            @foreach ($activities as $activity)
                <div class="w-full overflow-hidden group">
                    <a href="{{ route('activities.details', $activity->id) }}">
                        <div class="bg-gray-200 dark:bg-gray-950 p-6">
                            <h3 class="text-lg font-bold mb-2 text-blue-700 dark:text-blue-300">{{ $activity->title }}
                            </h3>
                            <span
                                class="text-sm text-gray-500 dark:text-gray-400 mt-2">{{ $activity->created_at->format('M d, Y') }}</span>
                        </div>

                        <div
                            class="w-full bg-gray-50 dark:bg-gray-800 flex flex-col sm:flex-row overflow-hidden min-w-full relative">
                            <span
                                class="absolute top-4 left-4 bg-blue-100 text-blue-700 dark:bg-blue-900 dark:text-blue-200 text-xs font-semibold px-3 py-1 rounded-full">{{ $activity->category }}</span>
                            <img src="{{ $activity->images->first() ? asset('storage/' . $activity->images->first()->image_path) : asset('images/default.png') }}"
                                alt="{{ $activity->title }}"
                                class="min-w-full max-h-52 object-cover object-center hover:scale-105 transition-transform duration-300">
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
