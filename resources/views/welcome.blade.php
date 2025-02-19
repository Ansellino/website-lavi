<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lavioxel Shop - Skin Care</title>
    <meta name="description" content="Skin Care">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <!-- Main Container -->
    <div class="relative min-h-screen bg-gradient-to-br from-gray-50 via-white to-gray-50">
        <!-- Enhanced Navigation -->
        <nav class="sticky top-0 z-50 border-b border-gray-200 shadow-sm bg-white/95 backdrop-blur-lg">
            <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-20">
                    <!-- Logo Section -->
                    <div class="flex items-center space-x-3">
                        <a href="/" wire:navigate>
                            <x-application-logo class="text-gray-500 fill-current h-max w-max" />
                        </a>
                    </div>

                    <!-- Navigation Links -->
                    <div class="items-center hidden space-x-8 md:flex">
                        <a href="#products" class="text-sm font-medium text-gray-700 transition-colors hover:text-blue-600">Products</a>
                        <a href="#about" class="text-sm font-medium text-gray-700 transition-colors hover:text-blue-600">About</a>
                        <a href="#contact" class="text-sm font-medium text-gray-700 transition-colors hover:text-blue-600">Contact</a>
                    </div>

                    <!-- Auth Links -->
                    @if (Route::has('login'))
                        <div class="flex items-center space-x-4">
                            @auth
                                <a href="{{ url('/dashboard') }}"
                                   class="inline-flex items-center px-4 py-2 text-sm font-medium text-black transition-all duration-200 bg-black rounded-lg shadow-sm hover:bg-gray-900 hover:scale-105">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                    </svg>
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}"
                                   class="text-sm font-medium text-gray-700 transition-colors hover:text-blue-600">
                                    Sign in
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                       class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 transition-all duration-200 bg-blue-600 rounded-lg shadow-sm hover:bg-blue-700 hover:scale-105">
                                    Register
                                    </a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <div class="relative py-24 overflow-hidden bg-center bg-no-repeat bg-cover"
             style="background-image: url('{{ asset('images1/banner.png') }}')">
        </div>

        <!-- Replace the product slideshow section -->
        <section class="py-20 bg-white">
            <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="text-center">
                    <h2 class="mt-6 mb-4 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Featured Products</h2>
                    <p class="mt-4 mb-6 text-lg text-gray-600">Check out our latest collection</p>
                </div>

                <div class="relative mt-12">
                    <div class="max-w-5xl mx-auto overflow-hidden rounded-2xl">
                        <div class="grid grid-cols-4 gap-4" id="product-slideshow">
                            @for ($i = 1; $i <= 2; $i++)
                                <div class="overflow-hidden transition-all duration-500 bg-gray-100 rounded-xl group">
                                    <div class="relative aspect-w-1 aspect-h-1">
                                        <img src="{{ asset('images1/' . $i . '.png') }}"
                                             alt="Product {{ $i }}"
                                             class="object-cover w-full h-48 transition-transform duration-300 sm:h-56 group-hover:scale-110"
                                             data-position="{{ $i - 1 }}">
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>

                    <!-- Navigation Buttons (adjusted position for smaller container) -->
                    <button class="absolute flex items-center justify-center w-10 h-10 transition-all duration-200 -translate-y-1/2 rounded-full shadow-lg left-2 top-1/2 bg-white/90 hover:bg-white focus:outline-none" id="prev-slide">
                        <svg class="w-5 h-5 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </button>
                    <button class="absolute flex items-center justify-center w-10 h-10 transition-all duration-200 -translate-y-1/2 rounded-full shadow-lg right-2 top-1/2 bg-white/90 hover:bg-white focus:outline-none" id="next-slide">
                        <svg class="w-5 h-5 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>
                </div>
            </div>
        </section>

        <!-- Enhanced Footer -->
        <footer class="bg-gray-900">
            <div class="px-4 py-12 mx-auto mt-3 max-w-7xl sm:px-6 lg:py-16 lg:px-8">
                <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
                    <div>
                        <h3 class="text-sm font-semibold tracking-wider text-gray-700 uppercase">About Us</h3>
                        <p class="mt-4 text-base text-gray-700">
                            Lavioxel Shop is your premier destination for skincare.
                        </p>
                    </div>
                    <div>
                        <h3 class="text-sm font-semibold tracking-wider text-gray-700 uppercase">Quick Links</h3>
                        <ul class="mt-4 space-y-4">
                            <li>
                                <a href="/" class="text-base text-gray-700 transition-colors hover:text-black">
                                    Products
                                </a>
                            </li>
                            <li>
                                <a href="/" class="text-base text-gray-700 transition-colors hover:text-black">
                                    About
                                </a>
                            </li>
                            <li>
                                <a href="/" class="text-base text-gray-700 transition-colors hover:text-black">
                                    Contact
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-sm font-semibold tracking-wider text-gray-700 uppercase">Connect With Us</h3>
                        <div class="flex mt-4 space-x-6">
                            <a href="https://www.instagram.com/lavioxel" class="text-gray-700 transition-colors hover:text-black">
                                <span class="sr-only">Instagram</span>
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="pt-8 border-t mt-9 border-gray">
                    <p class="text-base text-center text-gray-400">
                        &copy; {{ date('Y') }} Lavioxel Shop. All rights reserved.
                    </p>
                </div>
            </div>
        </footer>
    </div>

    <!-- Replace the JavaScript section -->
    <script>
        const slideshow = document.getElementById('product-slideshow');
        const prevButton = document.getElementById('prev-slide');
        const nextButton = document.getElementById('next-slide');
        const totalImages = 8;
        const visibleImages = 2;
        let positions = [0, 1]; // Current image positions (0-based index)

        function updateImages() {
            const images = slideshow.querySelectorAll('img');
            images.forEach((img, index) => {
                const imagePosition = positions[index];
                img.src = `{{ asset('images1/') }}/${imagePosition + 1}.png`;
                img.alt = `Product ${imagePosition + 1}`;

                // Add fade transition
                img.style.opacity = '0';
                setTimeout(() => {
                    img.style.opacity = '1';
                }, 25);
            });
        }

        function rotateRight() {
            positions = positions.map(pos => (pos + 1) % totalImages);
            updateImages();
        }

        function rotateLeft() {
            positions = positions.map(pos => (pos - 1 + totalImages) % totalImages);
            updateImages();
        }

        nextButton.addEventListener('click', () => {
            rotateRight();
        });

        prevButton.addEventListener('click', () => {
            rotateLeft();
        });

        // Auto-advance one image at a time
        let slideInterval = setInterval(rotateRight, 3000);

        // Pause on hover
        slideshow.addEventListener('mouseenter', () => {
            clearInterval(slideInterval);
        });

        // Resume on mouse leave
        slideshow.addEventListener('mouseleave', () => {
            slideInterval = setInterval(rotateRight, 3000);
        });

        // Add fade transition styles
        const style = document.createElement('style');
        style.textContent = `
            #product-slideshow img {
                transition: opacity 0.3s ease-in-out;
            }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>
