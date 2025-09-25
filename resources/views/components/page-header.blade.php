@props(['title' => '', 'subtitle' => '', 'banner' => '', 'class' => ''])

<div {{ $attributes->merge(['class' => 'my-10 ' . $class]) }}>
    @if ($banner)
        <div class="w-full h-64 md:h-96 lg:h-[32rem] mb-6 overflow-hidden rounded-3xl shadow-lg">
            <img src="{{ $banner }}" alt="{{ $title }}" class="w-full h-full object-cover object-center">
        </div>
    @endif
    <h1 class="text-7xl font-extrabold text-center tracking-tight text-transparent bg-clip-text bg-gradient-to-b from-gray-900/80 via-gray-700/40 to-gray-200/0 dark:from-gray-100/80 dark:via-gray-400/40 dark:to-gray-700/0 select-none mb-2"
        style="line-height:1.05; letter-spacing:-0.04em;">
        {{ $title }}
    </h1>
    @if ($subtitle)
        <h2 class="text-xl font-semibold text-center mb-4 text-gray-800 dark:text-gray-200">{{ $subtitle }}</h2>
    @endif
    <div class="text-center max-w-2xl mx-auto text-gray-600 dark:text-gray-400">
        {{ $slot }}
    </div>
</div>
