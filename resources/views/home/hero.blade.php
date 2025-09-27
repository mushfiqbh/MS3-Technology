<section class="relative h-[70vh] max-h-[70vh] w-full overflow-hidden">
    <!-- Full Width Background Image -->
    {{-- <img src="{{ asset('images/hero.png') }}" alt="Digital Journey Illustration"
        class="absolute inset-0 w-full object-cover object-center z-0" style="height:70vh;max-height:70vh;" /> --}}

    <!-- Full Width Background Video -->
    <video autoplay muted loop class="absolute inset-0 w-full h-full object-cover object-center z-0"
        style="height:70vh;max-height:70vh;">
        <source src="{{ asset('videos/hero-video.m4v') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <!-- Overlay -->
    <div
        class="absolute inset-0 bg-gradient-to-br from-blue-900/70 via-blue-800/60 to-indigo-900/80 dark:from-gray-900/80 dark:via-gray-900/70 dark:to-blue-900/80 z-10">
    </div>

    <!-- Overlay Content -->
    <div class="relative z-20 flex flex-col items-start justify-center p-10 sm:px-8 lg:px-24 text-left max-w-3xl">
        <!-- Badge -->
        <div
            class="flex items-center gap-2 py-2 rounded-lg shadow text-white text-xs font-semibold tracking-wide animate-fade-in-up">
            Trusted since 2017
        </div>
        <!-- Main Heading with image -->
        <div class="flex items-center gap-5">
            <h1
                class="text-3xl md:text-5xl font-extrabold text-white leading-tight animate-fade-in-up animation-delay-200 drop-shadow-xl">
                We Empower Your Digital Journey
            </h1>
        </div>
        <p
            class="text-white text-lg md:text-xl max-w-2xl md:mx-0 leading-relaxed animate-fade-in-up animation-delay-400 mt-2 mb-8 drop-shadow">
            MS3 Technology BD is a leading and dynamic IT company in Bangladesh.
        </p>
        <!-- CTA Buttons -->

        <div class="flex gap-4 animate-fade-in-up animation-delay-600">
            <a href="{{ url('/case-study') }}"
                class="group inline-flex items-center px-6 py-2.5 text-sm text-white bg-transparent border border-white font-semibold transform hover:scale-105 transition-all duration-300">
                Case Study
            </a>

            <a href="{{ url('/lets-talk') }}"
                class="group inline-flex items-center px-6 py-2.5 text-sm text-black bg-white font-semibold transform hover:scale-105 transition-all duration-300">
                Lets's Talk
            </a>
        </div>

    </div>
</section>
