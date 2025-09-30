@extends('layout.app')

@section('content')
    <x-page-header title="Contact Us" subtitle="Get in Touch with IT Lab Solutions" />

    <div class="w-full max-w-5xl mx-auto flex flex-col md:flex-row gap-8 mb-12">
        <!-- Contact Info Card -->
        <div class="flex-1 bg-gradient-to-br from-blue-50 to-blue-100 dark:from-gray-800 dark:to-gray-900 rounded-2xl shadow-lg p-8 flex flex-col justify-center gap-6 min-h-[340px]">
            <h2 class="text-3xl font-extrabold text-blue-700 dark:text-blue-300 mb-2 flex items-center gap-3">
                <svg class="w-8 h-8 text-blue-500 dark:text-blue-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 10.5V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h7.5" /></svg>
                Support &amp; Contact
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="flex items-center gap-3 bg-white dark:bg-gray-800 rounded-lg p-4 shadow">
                    <i class="fas fa-envelope text-blue-600 text-xl"></i>
                    <div>
                        <div class="text-xs text-gray-500">Email</div>
                        <a href="mailto:itlslhelpdesk@gmail.com" class="font-semibold text-gray-800 dark:text-gray-100 hover:text-blue-600">itlslhelpdesk@gmail.com</a>
                    </div>
                </div>
                <div class="flex items-center gap-3 bg-white dark:bg-gray-800 rounded-lg p-4 shadow">
                    <i class="fas fa-phone text-blue-600 text-xl"></i>
                    <div>
                        <div class="text-xs text-gray-500">Phone</div>
                        <a href="tel:+8801842485222" class="font-semibold text-gray-800 dark:text-gray-100 hover:text-blue-600">+880 1842 485 222</a>
                    </div>
                </div>
                <div class="flex items-center gap-3 bg-white dark:bg-gray-800 rounded-lg p-4 shadow col-span-1 sm:col-span-2">
                    <i class="fas fa-map-marker-alt text-blue-600 text-xl"></i>
                    <div>
                        <div class="text-xs text-gray-500">Office</div>
                        <div class="font-semibold text-gray-800 dark:text-gray-100">159 Anabil, Dhopadighirpar Jail Road, Sylhet, Bangladesh</div>
                    </div>
                </div>
                <div class="flex items-center gap-3 bg-white dark:bg-gray-800 rounded-lg p-4 shadow">
                    <i class="fab fa-facebook text-blue-600 text-xl"></i>
                    <a href="#" class="font-semibold text-gray-800 dark:text-gray-100 hover:text-blue-600">Facebook</a>
                </div>
                <div class="flex items-center gap-3 bg-white dark:bg-gray-800 rounded-lg p-4 shadow">
                    <i class="fab fa-whatsapp text-green-500 text-xl"></i>
                    <a href="#" class="font-semibold text-gray-800 dark:text-gray-100 hover:text-green-600">WhatsApp</a>
                </div>
            </div>
        </div>
    </div>

    <div class="w-full max-w-6xl mx-auto flex flex-col lg:flex-row items-stretch justify-between gap-12">
        <!-- Map Section -->
        <div class="flex-1 flex flex-col justify-center items-center bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8 mt-8">
            <h2 class="text-2xl font-bold text-blue-700 dark:text-blue-300 mb-2 flex items-center gap-2"><i class="fas fa-map-marker-alt"></i> Find Us</h2>
            <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-4 text-center">MS3 Technology BD, 2nd Floor, Al Marjan Shopping Center</h3>
            <div class="w-full max-w-2xl mx-auto rounded-lg overflow-hidden shadow">
                <div class="relative w-full" style="aspect-ratio: 1 / 1;">
                    <iframe class="absolute top-0 left-0 w-full h-full"
                        src="https://maps.google.com/maps?q=MS3+Technology+BD&t=&z=13&ie=UTF8&iwloc=&output=embed"
                        frameborder="0" scrolling="no" marginheight="0" marginwidth="0" allowfullscreen loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
        <!-- Contact Form -->
        <div class="flex-1 bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8 flex flex-col justify-center mt-8">
            <h2 class="text-2xl font-bold mb-6 text-blue-700 dark:text-blue-300 flex items-center gap-2"><i class="fas fa-paper-plane"></i> Send Us a Message</h2>
            <form action="#" method="POST" class="space-y-6">
                <div class="flex gap-4 flex-col md:flex-row">
                    <div class="flex-1">
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
                        <input type="text" id="name" name="name" required
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                    </div>
                    <div class="flex-1">
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                        <input type="email" id="email" name="email" required
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                    </div>
                </div>
                <div>
                    <label for="subject" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Subject</label>
                    <input type="text" id="subject" name="subject" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                </div>
                <div>
                    <label for="message" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Message</label>
                    <textarea id="message" name="message" rows="4" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"></textarea>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="inline-flex items-center gap-2 px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 transition">
                        <i class="fas fa-paper-plane"></i> Send Message
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
