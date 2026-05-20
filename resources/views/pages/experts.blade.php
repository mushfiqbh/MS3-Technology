@extends('layout.app')

@section('content')
    <div id="experts" class="bg-gray-50/50 dark:bg-slate-950/50 min-h-screen">
        <x-page-header title="Experts" subtitle="Our Team of IT Experts" />
    
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="w-full max-w-6xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($experts->reverse() as $expert)
                    <div class="group relative bg-slate-200 dark:bg-slate-900 rounded-2xl border border-gray-100 dark:border-slate-800/80 p-8 hover:border-transparent dark:hover:border-transparent hover:shadow-xl hover:shadow-gray-200/50 dark:hover:shadow-none transition-all duration-300 flex flex-col justify-between">
                        
                        <!-- Top Card Details -->
                        <div>
                            <!-- Department Badge -->
                            <div class="absolute top-4 right-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-50 text-blue-700 dark:bg-blue-950/40 dark:text-blue-400 border border-blue-100/50 dark:border-blue-900/30">
                                    {{ $expert->department }}
                                </span>
                            </div>

                            <!-- Photo / Avatar -->
                            <div class="relative w-28 h-28 mx-auto mb-6">
                                <div class="absolute inset-0 bg-gradient-to-tr from-blue-600 to-indigo-500 rounded-full opacity-0 group-hover:opacity-100 blur transition-opacity duration-300"></div>
                                <div class="relative w-full h-full rounded-full p-1 bg-white dark:bg-slate-900 ring-1 ring-gray-100 dark:ring-slate-800 group-hover:ring-transparent transition-all duration-300">
                                    <img src="{{ asset( $expert->photo_url ? 'storage/' . $expert->photo_url : 'images/default-expert.png') }}" 
                                         alt="{{ $expert->name }}"
                                         class="w-full h-full rounded-full object-contain object-center transition-transform duration-300 group-hover:scale-[1.02]">
                                </div>
                            </div>

                            <!-- Bio Information -->
                            <div class="text-center">
                                <h3 class="text-lg font-bold text-gray-900 dark:text-white tracking-tight group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors duration-200">
                                    {{ $expert->name }}
                                </h3>
                                <p class="text-sm font-medium text-gray-500 dark:text-slate-400 mt-1 mb-6">
                                    {{ $expert->role }}
                                </p>
                            </div>
                        </div>

                        <!-- Footer / Social Links -->
                        <div class="flex justify-center items-center gap-5 pt-5 border-t border-gray-100 dark:border-slate-800/60">
                            @if($expert->linkedin)
                                <a href="{{ $expert->linkedin }}" target="_blank" class="text-gray-400 hover:text-blue-600 dark:text-slate-500 dark:hover:text-blue-400 transition-colors duration-200" aria-label="LinkedIn">
                                    <i class="fab fa-linkedin text-lg"></i>
                                </a>
                            @endif
                            @if($expert->whatsapp)
                                <a href="{{ str_starts_with($expert->whatsapp, 'http') ? $expert->whatsapp : 'https://wa.me/' . ltrim($expert->whatsapp, '+') }}" target="_blank" class="text-gray-400 hover:text-green-500 dark:text-slate-500 dark:hover:text-green-400 transition-colors duration-200" aria-label="WhatsApp">
                                    <i class="fab fa-whatsapp text-lg"></i>
                                </a>
                            @endif
                            @if($expert->facebook)
                                <a href="{{ $expert->facebook }}" target="_blank" class="text-gray-400 hover:text-blue-700 dark:text-slate-500 dark:hover:text-blue-600 transition-colors duration-200" aria-label="Facebook">
                                    <i class="fab fa-facebook text-lg"></i>
                                </a>
                            @endif
                            @if($expert->twitter)
                                <a href="{{ $expert->twitter }}" target="_blank" class="text-gray-400 hover:text-sky-500 dark:text-slate-500 dark:hover:text-sky-400 transition-colors duration-200" aria-label="Twitter">
                                    <i class="fab fa-twitter text-lg"></i>
                                </a>
                            @endif
                            @if($expert->instagram)
                                <a href="{{ $expert->instagram }}" target="_blank" class="text-gray-400 hover:text-pink-600 dark:text-slate-500 dark:hover:text-pink-400 transition-colors duration-200" aria-label="Instagram">
                                    <i class="fab fa-instagram text-lg"></i>
                                </a>
                            @endif
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection