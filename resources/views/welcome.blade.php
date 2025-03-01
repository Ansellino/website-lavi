<x-app-layout>
    <!-- Main Container -->
    <div class="relative min-h-screen bg-gradient-to-br from-gray-50 via-white to-gray-50">
        <!-- Responsive Hero Section -->
        <div class="relative overflow-hidden bg-center bg-no-repeat bg-cover">
            <div class="absolute inset-0">
            <img src="{{ asset('images1/banner.svg') }}" alt="Hero Background" class="object-cover w-full h-full">
            <div class="absolute inset-0 bg-black/40"></div>
            </div>
            <div class="relative px-4 py-24 sm:px-6 sm:py-32 lg:py-40 lg:px-8">

            <p class="max-w-2xl mx-auto mt-8 text-xl text-center text-white sm:text-2xl lg:text-3xl">
                Discover our premium skincare products
            </p>
            </div>
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
                            @for ($i = 1; $i <= 4; $i++)
                                <div class="overflow-hidden transition-all duration-500 bg-gray-100 rounded-xl group">
                                    <div class="relative aspect-w-1 aspect-h-1">
                                        <img src="{{ asset('images1/' . $i . '.svg') }}"
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
    </div>

    <!-- Replace the JavaScript section -->
    <script>
        const slideshow = document.getElementById('product-slideshow');
        const prevButton = document.getElementById('prev-slide');
        const nextButton = document.getElementById('next-slide');
        const totalImages = 8;
        const visibleImages = 4;
        let positions = [0, 1, 2, 3]; // Current image positions (0-based index)

        function updateImages() {
            const images = slideshow.querySelectorAll('img');
            images.forEach((img, index) => {
                const imagePosition = positions[index];
                img.src = `{{ asset('images1/') }}/${imagePosition + 1}.svg`;
                img.alt = `Product ${imagePosition + 1}`;

                // Add fade transition
                img.style.opacity = '0';
                setTimeout(() => {
                    img.style.opacity = '1';
                }, 100);
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

        // Auto-advance one image at a time (increased to 12000ms - 12 seconds)
        let slideInterval = setInterval(rotateRight, 12000);

        // Pause on hover
        slideshow.addEventListener('mouseenter', () => {
            clearInterval(slideInterval);
        });

        // Resume on mouse leave (also updated to 12000ms)
        slideshow.addEventListener('mouseleave', () => {
            slideInterval = setInterval(rotateRight, 12000);
        });

        // Add fade transition styles
        const style = document.createElement('style');
        style.textContent = `
            #product-slideshow img {
                transition: opacity 0.3s ease-in-out;
            }
        `;
        document.head.appendChild(style);

        // Mobile Menu JavaScript
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', (event) => {
            if (!mobileMenuButton.contains(event.target) && !mobileMenu.contains(event.target)) {
                mobileMenu.classList.add('hidden');
            }
        });

        // Handle window resize
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 768) { // md breakpoint
                mobileMenu.classList.add('hidden');
            }
        });
    </script>
</x-app-layout>
