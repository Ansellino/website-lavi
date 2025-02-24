<nav class="sticky top-0 z-50 border-b border-gray-200 shadow-sm bg-white/95 backdrop-blur-lg">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 gap-6 sm:h-20">
            <!-- Logo Section with increased spacing -->
            <div class="flex items-center space-x-12">
                <a href="/" class="flex items-center">
                    <x-application-logo class="text-gray-500 fill-current w-max h-max sm:h-10" />
                </a>
            </div>

            <!-- Mobile Menu Button -->
            <button type="button" class="inline-flex items-center justify-center p-2 text-gray-700 rounded-md md:hidden hover:text-gray-900 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500" id="mobile-menu-button">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            <!-- Desktop Navigation -->
            <div class="hidden w-full md:flex md:items-center md:justify-between lg:justify-center">
                <!-- Center Links -->
                <div class="flex items-center ml-8 mr-8 space-x-8 lg:absolute lg:left-1/2 lg:-translate-x-1/2">
                    <a href="{{ route('posts.index') }}" class="text-sm font-medium text-gray-700 transition-colors hover:text-blue-600">Products</a>
                    <a href="{{ route('contact') }}" class="text-sm font-medium text-gray-700 transition-colors hover:text-blue-600">Contact</a>
                </div>


                <!-- Auth Links -->
                @if (Route::has('login'))
                    <div class="flex items-center space-x-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white transition-all duration-200 bg-blue-600 rounded-lg shadow-sm hover:bg-blue-700 hover:scale-105">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm font-medium text-gray-700 transition-colors hover:text-blue-600">Sign in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white transition-all duration-200 bg-blue-600 rounded-lg shadow-sm hover:bg-blue-700 hover:scale-105">
                                    Register
                                </a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Mobile Navigation Menu -->
    <div class="hidden md:hidden" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1 bg-white border-t border-gray-200">
            <a href="{{ route('posts.index') }}" class="block px-3 py-2 text-base font-medium text-gray-700 rounded-md hover:text-gray-900 hover:bg-gray-50">Products</a>
            <a href="{{ route('contact') }}" class="block px-3 py-2 text-base font-medium text-gray-700 rounded-md hover:text-gray-900 hover:bg-gray-50">Contact</a>

            @if (Route::has('login'))
                <div class="pt-4 pb-3 border-t border-gray-200">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="block w-full px-4 py-2 text-base font-medium text-center text-white bg-blue-600 rounded-md hover:bg-blue-700">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="block px-3 py-2 text-base font-medium text-gray-700 rounded-md hover:text-gray-900 hover:bg-gray-50">Sign in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="block w-full px-4 py-2 mt-2 text-base font-medium text-center text-white bg-blue-600 rounded-md hover:bg-blue-700">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </div>
</nav>