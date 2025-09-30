@extends('layout.app')

@section('content')
    @include('home.hero')
    @include('home.stats')
    @include('home.solutions')
    @include('home.features')
    @include('home.clients')
    @include('home.activities')

    <div class="text-center py-16 bg-gray-100 dark:bg-gray-800">
        <h2 class="text-xl font-bold mb-4 text-gray-900 dark:text-white">Looking for a software solution? Get Started Today!
        </h2>
        <p class="text-gray-700 dark:text-gray-300 mb-6 max-w-2xl mx-auto">We are a software development company that
            provides a wide range of software solutions to our clients. Let us help you bring your ideas to life with our
            expert consultation services.</p>
        <a href="{{ url('/consultation') }}"
            class="inline-block hover:bg-gray-200 dark:hover:bg-white dark:hover:text-black text-black dark:text-white font-semibold py-3 px-6 rounded-lg shadow-lg transition">Request
            a Consultation</a>
    </div>
@endsection
