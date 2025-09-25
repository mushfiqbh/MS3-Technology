<section id="blogs" class="py-16 bg-gray-50 dark:bg-gray-900">
    <x-heading title="Blogs" subtitle="Latest Insights and Updates from IT Lab Solutions">
        Explore our latest blog posts to stay informed about industry trends, technological advancements, and expert
        insights. Our blogs cover a wide range of topics, providing valuable information to help you navigate the
        ever-evolving tech landscape.
    </x-heading>

    <div class="container mx-auto px-6 sm:px-8 lg:px-12">
        <div x-data="carousel({{ count($blogs) }})" x-init="start();
        updateVisible();
        window.addEventListener('resize', updateVisible)" class="relative overflow-hidden">
            <!-- Left Button -->
            <button @click="prev"
                class="absolute left-0 top-1/2 -translate-y-1/2 z-10 bg-white/80 dark:bg-gray-900/80 rounded-full shadow p-2 hover:bg-blue-100 dark:hover:bg-blue-800 transition hidden sm:block">
                <svg class="w-6 h-6 text-blue-600 dark:text-blue-300" fill="none" stroke="currentColor"
                    stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
            </button>

            <!-- Right Button -->
            <button @click="next"
                class="absolute right-0 top-1/2 -translate-y-1/2 z-10 bg-white/80 dark:bg-gray-900/80 rounded-full shadow p-2 hover:bg-blue-100 dark:hover:bg-blue-800 transition hidden sm:block">
                <svg class="w-6 h-6 text-blue-600 dark:text-blue-300" fill="none" stroke="currentColor"
                    stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                </svg>
            </button>


            <!-- Carousel Wrapper -->
            <div class="flex transition-transform duration-500 ease-in-out"
                :style="`transform: translateX(-${active * (100 / visible)}%); width: ${100 * (total / visible)}%`">
                @foreach ($blogs as $blog)
                    <div class="px-2 flex-shrink-0 max-w-[80rem]">
                        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg flex flex-col overflow-hidden h-full">
                            <img src="{{ asset('/images/activity.webp') }}" alt="{{ $blog->title }}"
                                class="w-full h-44 object-cover object-center">
                            <a href="" class="flex-1 flex flex-col justify-between p-4 gap-2">
                                <h3 class="text-base font-bold text-blue-700 dark:text-blue-300 mb-1">
                                    {{ $blog->title }}</h3>
                                <div class="text-xs text-gray-500 mb-2">
                                    {{ \Carbon\Carbon::parse($blog->created_at)->format('F jS, Y') }}
                                </div>
                                <p class="text-gray-700 dark:text-gray-300 mb-2">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($blog->content ?? ''), 60) }}
                                </p>
                                <span class="inline-block mt-auto pt-2 text-sm text-blue-600 dark:text-blue-400 font-semibold hover:underline">Read More</span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Dots -->
            <div class="flex justify-center gap-2 mt-6">
                <template x-for="i in Array.from({length: max+1}, (_,i) => i)" :key="i">
                    <button @click="active = i"
                        :class="{ 'bg-blue-600 dark:bg-blue-400': active === i, 'bg-gray-300 dark:bg-gray-700': active !== i }"
                        class="w-3 h-3 rounded-full transition-colors">
                    </button>
                </template>
            </div>
        </div>
    </div>
</section>

<!-- Alpine.js Carousel Component -->
<script>
    function carousel(total) {
        return {
            active: 0,
            total,
            visible: 3, // default for desktop
            interval: null,

            get max() {
                return Math.max(0, this.total - this.visible);
            },
            next() {
                this.active = (this.active + 1) > this.max ? 0 : this.active + 1;
            },
            prev() {
                this.active = (this.active - 1) < 0 ? this.max : this.active - 1;
            },
            start() {
                this.interval = setInterval(() => this.next(), 5000);
            },
            stop() {
                clearInterval(this.interval);
                this.interval = null;
            },
            updateVisible() {
                if (window.innerWidth < 640) {
                    this.visible = 1; // mobile
                } else if (window.innerWidth < 1024) {
                    this.visible = 2; // tablet
                } else {
                    this.visible = 3; // desktop
                }
                if (this.active > this.max) this.active = this.max;
            }
        }
    }
</script>
