@extends('layout.app')

@section('content')
    <div id="experts">
        <x-page-header title="Experts" subtitle="Latest Insights and Updates from IT Lab Solutions" />

        <div class="container mx-auto px-6 sm:px-8 lg:px-12">
            <div class="w-full md:w-5/6 mx-auto my-20 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
                @foreach ($experts->reverse() as $expert)
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg hover:shadow-2xl transition flex flex-col items-center p-8 text-center group relative overflow-hidden h-full">
                        <div class="relative mb-4">
                            <img src="{{ asset('/images/activity.webp') }}" alt="{{ $expert->name }}"
                                class="w-32 h-32 rounded-full object-cover object-center border-4 border-blue-100 dark:border-blue-900 shadow-lg mx-auto transition-transform group-hover:scale-105">
                            <span class="absolute bottom-2 right-2 w-4 h-4 bg-green-400 border-2 border-white dark:border-gray-800 rounded-full"></span>
                        </div>
                        <h2 class="text-xl font-bold text-blue-700 dark:text-blue-300 mb-1">{{ $expert->name }}</h2>
                        <div class="text-sm text-gray-500 dark:text-gray-400 mb-2">{{ $expert->role }}</div>
                        <div class="text-xs text-gray-400 mb-4">Department: {{ $expert->department }}</div>
                        <div class="flex justify-center gap-3 mb-4">
                            <a href="#" class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-200 transition"><i class="fab fa-linkedin text-lg"></i></a>
                            <a href="#" class="text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-white transition"><i class="fab fa-twitter text-lg"></i></a>
                            <a href="#" class="text-pink-500 hover:text-pink-700 transition"><i class="fab fa-instagram text-lg"></i></a>
                        </div>
                        <div class="flex-1"></div>
                        <div class="absolute inset-x-0 bottom-0 h-2 bg-gradient-to-r from-blue-200 via-blue-400 to-blue-200 dark:from-blue-900 dark:via-blue-700 dark:to-blue-900 opacity-60"></div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
