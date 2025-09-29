@props([
    'title' => '',
    'class' => '',
])

<div {{ $attributes->merge(['class' => 'mb-10 ' . $class]) }}>
    <h1 class="text-7xl font-extrabold text-center tracking-tight text-transparent bg-clip-text bg-gradient-to-b from-gray-900/80 via-gray-700/40 to-gray-200/0 dark:from-gray-100/80 dark:via-gray-400/40 dark:to-gray-700/0 select-none"
        style="line-height:1.05; letter-spacing:-0.04em;">
        {{ $title }}
    </h1>
    <h2 class="text-xl font-semibold text-center mb-4 text-gray-800 dark:text-gray-200">{{ $slot }}</h2>
</div>
