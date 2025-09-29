<section id="clients" class="py-16 bg-gray-50 dark:bg-gray-800">
    <x-heading title="Our Clients" class="mb-12">
        Trusted by Industry Leaders
    </x-heading>

    <!-- Right-to-left infinite slider -->
    <div class="relative overflow-hidden mb-10">
        <div id="clients-slider-rtl" class="flex items-center space-x-12 animate-clients-slide-rtl w-max">
            @foreach (array_merge($clients, $clients) as $client)
                <div class="flex flex-col items-center w-[120px] h-[60px]">
                    <img src="{{ $client->logo }}" alt="{{ $client->name }}"
                        class="h-16 w-auto mb-2 grayscale hover:grayscale-0 transition duration-300">
                    <span class="text-xs text-gray-600 dark:text-gray-300">{{ $client->name }}</span>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Left-to-right infinite slider -->
    <div class="relative overflow-hidden">
        <div id="clients-slider-ltr" class="flex items-center space-x-12 animate-clients-slide-ltr w-max">
            @foreach (array_merge($clients, $clients) as $client)
                <div class="flex flex-col items-center w-[120px] h-[60px]">
                    <img src="{{ $client->logo }}" alt="{{ $client->name }}"
                        class="h-16 w-auto mb-2 grayscale hover:grayscale-0 transition duration-300">
                    <span class="text-xs text-gray-600 dark:text-gray-300">{{ $client->name }}</span>
                </div>
            @endforeach
        </div>
    </div>
    <style>
        @keyframes clients-slide-rtl {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        .animate-clients-slide-rtl {
            animation: clients-slide-rtl 18s linear infinite;
        }

        @keyframes clients-slide-ltr {
            0% {
                transform: translateX(-50%);
            }

            100% {
                transform: translateX(0);
            }
        }

        .animate-clients-slide-ltr {
            animation: clients-slide-ltr 18s linear infinite;
        }
    </style>

</section>
