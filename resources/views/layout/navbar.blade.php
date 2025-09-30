<nav
    class="sticky top-0 z-50 lg:px-20 w-full min-h-[5rem] dark:bg-gray-900/80 backdrop-blur-md shadow-lg transition-colors duration-300">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <a class="flex items-center font-bold text-gray-800 text-lg flex-shrink-0" href="{{ url('/') }}">
                MS3 Technology BD
            </a>

            <div class="hidden lg:flex lg:items-center lg:gap-5">
                <ul class="flex items-center flex-wrap">
                    <li>
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>

                    <li class="relative group">
                        <a class="nav-link flex items-center cursor-pointer">
                            About
                            <svg class="h-4 w-4 ml-1 transform transition-transform duration-200 group-hover:rotate-180"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('/experts') }}">Team</a></li>
                            <li><a class="dropdown-item" href="{{ url('/activities') }}">Activity</a></li>
                            <li><a class="dropdown-item" href="{{ url('/technology') }}">Technology</a></li>
                            <li><a class="dropdown-item" href="{{ url('/partners') }}">Partners</a></li>
                        </ul>
                    </li>

                    <li class="relative group">
                        <a class="nav-link flex items-center cursor-pointer">
                            Solutions
                            <svg class="h-4 w-4 ml-1 transform transition-transform duration-200 group-hover:rotate-180"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('/solutions/industry') }}">Industry Solutions</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ url('/solutions/enterprise') }}">Enterprise
                                    Solutions</a></li>
                            <li><a class="dropdown-item" href="{{ url('/solutions/startup') }}">Startup Solutions</a>
                            </li>
                        </ul>
                    </li>
                    <li class="relative group">
                        <a class="nav-link flex items-center cursor-pointer">
                            Clients
                            <svg class="h-4 w-4 ml-1 transform transition-transform duration-200 group-hover:rotate-180"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('/clients/corporate') }}">Corporate Clients</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ url('/clients/government') }}">Government Clients</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ url('/clients/startups') }}">Startup Clients</a></li>
                        </ul>
                    </li>
                    <li><a class="nav-link" href="{{ url('/activities') }}">Blog</a></li>
                    <li><a class="nav-link" href="{{ url('/contact') }}">Contact</a></li>
                </ul>

                <div class="flex items-center gap-5 ml-4">
                    <a style="padding: 0.5rem 1rem;"
                        class="inline-flex items-center text-sm font-semibold text-blue-600 bg-white hover:bg-blue-600 hover:text-white transition-all duration-200"
                        href="{{ url('/consultation') }}">
                        <i class="fas fa-rocket mr-2"></i>
                        Get Free Consultation
                    </a>
                    <button id="theme-switcher-desktop"
                        class="text-2xl text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 p-2">
                        <i id="theme-icon-desktop" class="fas fa-moon h-5 w-5"></i>
                    </button>
                </div>
            </div>

            <div class="flex items-center space-x-4 lg:hidden">
                <button id="theme-switcher-mobile"
                    class="text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 p-2">
                    <i id="theme-icon-mobile" class="fas fa-moon h-5 w-5 scale-110"></i>
                </button>
                <button id="mobile-menu-button"
                    class="text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 p-2">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
            </div>
        </div>

        <div id="mobile-menu-overlay" class="fixed inset-0 z-40 bg-black bg-opacity-50 hidden"></div>
        <div id="mobile-menu"
            class="fixed min-h-screen pt-10 inset-y-0 left-0 bg-white dark:bg-gray-800 shadow-lg z-50 transform -translate-x-full transition-transform duration-300 ease-in-out w-80">
            <ul class="bg-white text-gray-800 dark:bg-gray-800 dark:text-gray-200 flex flex-col p-4 space-y-2 w-full">
                <li>
                    <a class="mobile-nav-link block py-3 px-4 hover:bg-gray-50 dark:hover:bg-gray-700 rounded-lg transition-all duration-200"
                        href="{{ url('/') }}">
                        <i class="fas fa-home mr-3"></i>Home
                    </a>
                </li>
                <li class="relative">
                    <button
                        class="mobile-dropdown-button w-full text-left py-3 px-4 hover:bg-gray-50 dark:hover:bg-gray-700 rounded-lg transition-all duration-200 flex items-center justify-between">
                        <span><i class="fas fa-info-circle mr-3"></i>About</span>
                        <svg class="h-4 w-4 transition-transform duration-200" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>  
                    </button>
                    <ul class="mobile-dropdown-menu hidden mt-2 ml-4 space-y-1">
                        <li><a class="mobile-dropdown-item block py-2 px-3 text-sm text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-gray-50 dark:hover:bg-gray-700 rounded-md transition-all duration-200"
                                href="{{ url('/experts') }}">Team</a></li>
                        <li><a class="mobile-dropdown-item block py-2 px-3 text-sm text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-gray-50 dark:hover:bg-gray-700 rounded-md transition-all duration-200"
                                href="{{ url('/activities') }}">Activity</a></li>
                        <li><a class="mobile-dropdown-item block py-2 px-3 text-sm text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-gray-50 dark:hover:bg-gray-700 rounded-md transition-all duration-200"
                                href="{{ url('/technology') }}">Technology</a></li>
                        <li><a class="mobile-dropdown-item block py-2 px-3 text-sm text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-gray-50 dark:hover:bg-gray-700 rounded-md transition-all duration-200"
                                href="{{ url('/partners') }}">Partners</a></li>
                    </ul>
                </li>
                <li class="relative">
                    <button
                        class="mobile-dropdown-button w-full text-left py-3 px-4 hover:bg-gray-50 dark:hover:bg-gray-700 rounded-lg transition-all duration-200 flex items-center justify-between">
                        <span><i class="fas fa-cogs mr-3"></i>Services</span>
                        <svg class="h-4 w-4 transition-transform duration-200" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                    <ul class="mobile-dropdown-menu hidden mt-2 ml-4 space-y-1">
                        <li><a class="mobile-dropdown-item block py-2 px-3 text-sm text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-gray-50 dark:hover:bg-gray-700 rounded-md transition-all duration-200"
                                href="{{ url('/services/web-development') }}">Web Development</a></li>
                        <li><a class="mobile-dropdown-item block py-2 px-3 text-sm text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-gray-50 dark:hover:bg-gray-700 rounded-md transition-all duration-200"
                                href="{{ url('/services/mobile-apps') }}">Mobile Apps</a></li>
                        <li><a class="mobile-dropdown-item block py-2 px-3 text-sm text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-gray-50 dark:hover:bg-gray-700 rounded-md transition-all duration-200"
                                href="{{ url('/services/cloud-solutions') }}">Cloud Solutions</a></li>
                        <li><a class="mobile-dropdown-item block py-2 px-3 text-sm text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-gray-50 dark:hover:bg-gray-700 rounded-md transition-all duration-200"
                                href="{{ url('/services/consulting') }}">IT Consulting</a></li>
                    </ul>
                </li>
                <li class="relative">
                    <button
                        class="mobile-dropdown-button w-full text-left py-3 px-4 hover:bg-gray-50 dark:hover:bg-gray-700 rounded-lg transition-all duration-200 flex items-center justify-between">
                        <span><i class="fas fa-lightbulb mr-3"></i>Solutions</span>
                        <svg class="h-4 w-4 transition-transform duration-200" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <ul class="mobile-dropdown-menu hidden mt-2 ml-4 space-y-1">
                        <li><a class="mobile-dropdown-item block py-2 px-3 text-sm text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-gray-50 dark:hover:bg-gray-700 rounded-md transition-all duration-200" href="{{ url('/solutions/industry') }}">Industry Solutions</a></li>
                        <li><a class="mobile-dropdown-item block py-2 px-3 text-sm text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-gray-50 dark:hover:bg-gray-700 rounded-md transition-all duration-200" href="{{ url('/solutions/enterprise') }}">Enterprise Solutions</a></li>
                        <li><a class="mobile-dropdown-item block py-2 px-3 text-sm text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-gray-50 dark:hover:bg-gray-700 rounded-md transition-all duration-200" href="{{ url('/solutions/startup') }}">Startup Solutions</a></li>
                    </ul>
                </li>
                <li class="relative">
                    <button
                        class="mobile-dropdown-button w-full text-left py-3 px-4 hover:bg-gray-50 dark:hover:bg-gray-700 rounded-lg transition-all duration-200 flex items-center justify-between">
                        <span><i class="fas fa-users mr-3"></i>Clients</span>
                        <svg class="h-4 w-4 transition-transform duration-200" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <ul class="mobile-dropdown-menu hidden mt-2 ml-4 space-y-1">
                        <li><a class="mobile-dropdown-item block py-2 px-3 text-sm text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-gray-50 dark:hover:bg-gray-700 rounded-md transition-all duration-200" href="{{ url('/clients/corporate') }}">Corporate Clients</a></li>
                        <li><a class="mobile-dropdown-item block py-2 px-3 text-sm text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-gray-50 dark:hover:bg-gray-700 rounded-md transition-all duration-200" href="{{ url('/clients/government') }}">Government Clients</a></li>
                        <li><a class="mobile-dropdown-item block py-2 px-3 text-sm text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-gray-50 dark:hover:bg-gray-700 rounded-md transition-all duration-200" href="{{ url('/clients/startups') }}">Startup Clients</a></li>
                    </ul>
                </li>
                <li><a class="mobile-nav-link block py-3 px-4 hover:bg-gray-50 dark:hover:bg-gray-700 rounded-lg transition-all duration-200"
                        href="{{ url('/activities') }}">Blog</a></li>
                <li><a class="mobile-nav-link block py-3 px-4 hover:bg-gray-50 dark:hover:bg-gray-700 rounded-lg transition-all duration-200"
                        href="{{ url('/contact') }}">Contact</a></li>
                <li class="mt-4">
                    <a class="block w-full text-center py-3 px-4 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold rounded-lg hover:from-blue-700 hover:to-purple-700 transition-all duration-200 shadow-lg"
                        href="{{ url('/consultation') }}">
                        <i class="fas fa-rocket mr-2"></i>Get Free Consultation
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
    // Set initial theme based on local storage
    if (localStorage.theme === 'dark' || (!('theme' in localStorage))) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }

    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    const mobileMenuOverlay = document.getElementById('mobile-menu-overlay');
    const themeSwitcherDesktop = document.getElementById('theme-switcher-desktop');
    const themeSwitcherMobile = document.getElementById('theme-switcher-mobile');
    const themeIconDesktop = document.getElementById('theme-icon-desktop');
    const themeIconMobile = document.getElementById('theme-icon-mobile');

    function updateThemeIcon(isDark) {
        themeIconDesktop.classList.toggle('fa-sun', !isDark);
        themeIconDesktop.classList.toggle('fa-moon', isDark);
        themeIconMobile.classList.toggle('fa-sun', !isDark);
        themeIconMobile.classList.toggle('fa-moon', isDark);
    }

    updateThemeIcon(document.documentElement.classList.contains('dark'));

    function toggleMobileMenu() {
        mobileMenu.classList.toggle('-translate-x-full');
        mobileMenu.classList.toggle('translate-x-0');
        mobileMenuOverlay.classList.toggle('hidden');
    }

    function toggleMobileDropdown(event) {
        // Find the parent li and then the dropdown menu
        const parentLi = event.currentTarget.closest('li');
        const dropdownMenu = parentLi.querySelector('.mobile-dropdown-menu');

        // Close other open mobile dropdowns
        document.querySelectorAll('.mobile-dropdown-menu').forEach(menu => {
            if (menu !== dropdownMenu) {
                menu.classList.add('hidden');
            }
        });

        // Toggle the clicked dropdown
        dropdownMenu.classList.toggle('hidden');
        event.currentTarget.querySelector('svg').classList.toggle('rotate-180');
    }

    function toggleTheme() {

        const isDark = document.documentElement.classList.toggle('dark');
        localStorage.setItem('theme', isDark ? 'dark' : 'light');
        updateThemeIcon(isDark);
    }

    mobileMenuButton.addEventListener('click', toggleMobileMenu);
    mobileMenuOverlay.addEventListener('click', toggleMobileMenu);
    themeSwitcherDesktop.addEventListener('click', toggleTheme);
    themeSwitcherMobile.addEventListener('click', toggleTheme);

    // Add event listeners for mobile dropdown buttons
    document.querySelectorAll('.mobile-dropdown-button').forEach(button => {
        button.addEventListener('click', toggleMobileDropdown);
    });

    // Close mobile menu when clicking outside
    document.addEventListener('click', (event) => {
        const isMenuOpen = !mobileMenu.classList.contains('-translate-x-full');
        
        // If menu is open and click is outside the menu and not on the menu button
        if (isMenuOpen && 
            !event.target.closest('#mobile-menu') && 
            !event.target.closest('#mobile-menu-button')) {
            toggleMobileMenu();
        }
        
        // Close mobile dropdowns when clicking outside
        if (!event.target.closest('#mobile-menu')) {
            document.querySelectorAll('.mobile-dropdown-menu').forEach(menu => {
                menu.classList.add('hidden');
            });
            // Reset dropdown arrows
            document.querySelectorAll('.mobile-dropdown-button svg').forEach(arrow => {
                arrow.classList.remove('rotate-180');
            });
        }
    });

    // Close mobile menu when pressing Escape key
    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            const isMenuOpen = !mobileMenu.classList.contains('-translate-x-full');
            if (isMenuOpen) {
                toggleMobileMenu();
            }
        }
    });

    // Close mobile menu when clicking on navigation links
    document.querySelectorAll('.mobile-nav-link, .mobile-dropdown-item').forEach(link => {
        link.addEventListener('click', () => {
            // Small delay to allow navigation to start
            setTimeout(toggleMobileMenu, 150);
        });
    });
</script>
