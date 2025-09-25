<section class="py-16 w-full bg-white dark:bg-gray-900">
    <div class="container mx-auto px-6 sm:px-8 lg:px-12">
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-8 text-center">
            @foreach ($stats as $stat)
                <div>
                    <div
                        class="text-4xl md:text-5xl font-extrabold {{ $stat['text_color'] }} dark:{{ $stat['dark_text_color'] }} mb-2">
                        <span class="stat-animate" data-target="{{ $stat['value'] }}">0</span>+
                    </div>
                    <div class="uppercase text-xs font-semibold tracking-widest text-gray-500 dark:text-gray-400">
                        {{ $stat['label'] }}
                    </div>
                </div>
            @endforeach
        </div>


        <div class="relative w-full mt-20 overflow-x-hidden"
            x-data="{
                logos: [
                    '{{ asset('/images/idea-logo.webp') }}',
                    '{{ asset('/images/logo.png') }}',
                    '{{ asset('/images/hero.png') }}',
                    '{{ asset('/images/activity.webp') }}',
                    '{{ asset('/images/idea-logo.webp') }}',
                    '{{ asset('/images/logo.png') }}',
                    '{{ asset('/images/hero.png') }}',
                    '{{ asset('/images/activity.webp') }}',
                    '{{ asset('/images/idea-logo.webp') }}',
                    '{{ asset('/images/logo.png') }}'
                ],
                get sliderWidth() { return this.logos.length * 96; },
                offset: 0,
                animationId: null,
                start() { this.animate(); },
                animate() {
                    this.offset -= 1.2;
                    if (Math.abs(this.offset) >= this.sliderWidth) {
                        this.offset += this.sliderWidth;
                    }
                    this.animationId = requestAnimationFrame(() => this.animate());
                },
                stop() { cancelAnimationFrame(this.animationId); }
            }"
            x-init="start()"
            @mouseenter="stop()" @mouseleave="start()" style="height: 96px;">
            <div class="flex items-center gap-4 absolute left-0 top-0"
                :style="`transform: translateX(${offset}px); width: ${sliderWidth * 2}px;`">
                <template x-for="(logo, idx) in [...logos, ...logos]" :key="idx">
                    <div class="w-24 h-24 flex items-center justify-center">
                        <img :src="logo" alt="Logo"
                            class="w-20 h-20 object-contain select-none pointer-events-none" draggable="false">
                    </div>
                </template>
            </div>
            <!-- Gradient fade left -->
            <div class="pointer-events-none absolute left-0 top-0 h-full w-24 bg-gradient-to-r from-white dark:from-gray-900 to-transparent"></div>
            <!-- Gradient fade right -->
            <div class="pointer-events-none absolute right-0 top-0 h-full w-24 bg-gradient-to-l from-white dark:from-gray-900 to-transparent"></div>
        </div>
    </div>

    <script>
        // Simple digit animation for stats
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.stat-animate').forEach(function(el) {
                const target = +el.getAttribute('data-target');
                let current = 0;
                const duration = 1200;
                const step = Math.max(1, Math.floor(target / (duration / 16)));

                function update() {
                    if (current < target) {
                        current += step;
                        if (current > target) current = target;
                        el.textContent = current;
                        requestAnimationFrame(update);
                    } else {
                        el.textContent = target;
                    }
                }
                update();
            });
        });
    </script>
</section>
