@extends('layout.app')

@section('content')
    @include('home.hero')
    @include('home.stats')
    @include('home.services')
    @include('home.features')
    @include('home.clients')
    @include('home.activities')

    <div class="text-center py-16 bg-gray-100 dark:bg-gray-800">
        <h2 class="text-xl font-bold mb-4">Looking for a software solution? Get Started Today!</h2>
        <p>We are a software development company that provides a wide range of software solutions to our clients.</p>
        <button class="mt-4">Submit Your Thought</button>
    </div>
@endsection
