@props([
    'title' => '',
    'class' => '',
])

<div {{ $attributes->merge(['class' => 'mb-12 ' . $class]) }}>
    <div class="text-center max-w-4xl mx-auto">
        <!-- Decorative Line -->
        <div class="flex items-center justify-center mb-6">
            <div class="h-px w-16 bg-gradient-to-r from-transparent to-blue-600 dark:to-blue-400"></div>
            <div class="px-4">
                <div class="w-2 h-2 bg-blue-600 dark:bg-blue-400 rounded-full"></div>
            </div>
            <div class="h-px w-16 bg-gradient-to-l from-transparent to-blue-600 dark:to-blue-400"></div>
        </div>

        <!-- Main Title -->
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-center tracking-tight mb-6 relative">
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 dark:from-blue-400 dark:via-indigo-400 dark:to-purple-400">
                {{ $title }}
            </span>
        </h1>

        <!-- Subtitle/Description -->
        @if($slot->isNotEmpty())
            <div class="relative">
                <p class="text-lg sm:text-xl text-gray-600 dark:text-gray-400 leading-relaxed max-w-2xl mx-auto">
                    {{ $slot }}
                </p>
            </div>
        @endif

        <!-- Bottom Accent Line -->
        <div class="w-24 h-1 bg-gradient-to-r from-blue-600 to-indigo-600 dark:from-blue-400 dark:to-indigo-400 mx-auto mt-6 rounded-full"></div>
    </div>
</div>
