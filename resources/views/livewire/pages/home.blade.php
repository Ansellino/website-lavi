<div>
    <!-- Responsive Hero Section -->
    <div class="relative overflow-hidden bg-center bg-no-repeat bg-cover">
        <div class="absolute inset-0">
            <img src="{{ asset('images1/banner.webp') }}"
                 alt="Hero Background"
                 class="object-cover w-full h-full">
            <div class="absolute inset-0 bg-black/40"></div>
        </div>
        <div class="relative px-4 py-24 sm:px-6 sm:py-32 lg:py-40 lg:px-8">
            <p class="max-w-2xl mx-auto mt-8 text-xl text-center text-white sm:text-2xl lg:text-3xl">
                Discover our premium skincare products
            </p>
        </div>
    </div>

    <!-- Products Section -->
    <section class="py-20 bg-white">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <!-- Our Products Section -->
            <div class="mb-12 text-center">
                <h2 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl">Our Products</h2>
                <p class="mt-4 text-lg text-gray-600">Discover our curated collection of premium skincare solutions</p>
            </div>

            <!-- Video Section -->
            <div class="max-w-4xl mx-auto mt-12 mb-16 overflow-hidden shadow-2xl rounded-xl max-h-[500px]">
                <video
                    class="w-full h-[500px] object-cover"
                    controls
                    loading="lazy"
                    preload="none"
                    muted
                    loop
                    playsinline
                    poster="{{ asset('images1/banner.webp') }}"
                >
                    <source src="{{ asset('images1/product.mp4') }}" type="video/mp4" />
                    Your browser does not support the video tag.
                </video>
            </div>

            <!-- Product Slideshow -->
            <div class="relative mt-12">
                <div class="max-w-5xl mx-auto overflow-hidden rounded-2xl">
                    <div
                        x-data="{
                            positions: @entangle('positions'),
                            totalImages: {{ $totalImages }},
                            autoRotate: @entangle('autoRotate'),
                            slideInterval: null,

                            init() {
                                if (this.autoRotate) {
                                    this.startAutoRotation();
                                }

                                // Add transition styles
                                const style = document.createElement('style');
                                style.textContent = `
                                    .product-image {
                                        transition: opacity 0.3s ease-in-out;
                                    }
                                `;
                                document.head.appendChild(style);
                            },

                            startAutoRotation() {
                                this.slideInterval = setInterval(() => {
                                    $wire.rotateRight();
                                }, 12000);
                            },

                            stopAutoRotation() {
                                if (this.slideInterval) {
                                    clearInterval(this.slideInterval);
                                }
                            },

                            getImagePath(position) {
                                return `/images1/${position + 1}.webp`;
                            }
                        }"
                        @mouseenter="stopAutoRotation()"
                        @mouseleave="if (autoRotate) startAutoRotation()"
                        class="grid grid-cols-4 gap-4">

                        <template x-for="(position, index) in positions" :key="index">
                            <div class="overflow-hidden transition-all duration-500 bg-gray-100 rounded-xl group">
                                <div class="relative aspect-w-1 aspect-h-1">
                                    <img :src="getImagePath(position)"
                                         :alt="'Product ' + (position + 1)"
                                         loading="lazy"
                                         class="object-cover w-full h-48 transition-transform duration-300 product-image sm:h-56 group-hover:scale-110"
                                         x-transition:enter="transition ease-out duration-300"
                                         x-transition:enter-start="opacity-0"
                                         x-transition:enter-end="opacity-100">
                                </div>
                            </div>
                        </template>
                    </div>

                    <!-- Navigation Buttons -->
                    <button
                        wire:click="rotateLeft"
                        class="absolute flex items-center justify-center w-10 h-10 transition-all duration-200 -translate-y-1/2 rounded-full shadow-lg left-2 top-1/2 bg-white/90 hover:bg-white focus:outline-none">
                        <svg class="w-5 h-5 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </button>
                    <button
                        wire:click="rotateRight"
                        class="absolute flex items-center justify-center w-10 h-10 transition-all duration-200 -translate-y-1/2 rounded-full shadow-lg right-2 top-1/2 bg-white/90 hover:bg-white focus:outline-none">
                        <svg class="w-5 h-5 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Featured Products Section -->
            <div class="mt-24">
                <h3 class="text-2xl font-bold text-center text-gray-900 sm:text-3xl">Featured Products</h3>
                <div class="grid grid-cols-1 gap-8 mt-8 sm:grid-cols-2 lg:grid-cols-4">
                    @for ($i = 1; $i <= 4; $i++)
                        <div class="overflow-hidden transition-all duration-300 transform bg-white border border-gray-200 rounded-lg shadow-sm hover:shadow-lg hover:-translate-y-1">
                            <div class="relative aspect-w-1 aspect-h-1">
                                <img src="{{ asset('images1/' . $i . '.webp') }}" alt="Featured Product {{ $i }}" class="object-cover w-full h-48 sm:h-56">
                                @if($i === 1)
                                    <div class="absolute top-2 right-2">
                                        <span class="inline-flex items-center px-2 py-1 text-xs font-medium text-white bg-red-600 rounded-full">New</span>
                                    </div>
                                @endif
                            </div>
                            <div class="p-4">
                                <h4 class="text-lg font-medium text-gray-900">Premium Skincare Product {{ $i }}</h4>
                                <p class="mt-1 text-sm text-gray-500">High-quality skincare solution for all skin types</p>
                                <div class="flex items-center justify-between mt-3">
                                    <span class="text-lg font-semibold text-gray-900">Rp {{ number_format(rand(100000, 500000)) }}</span>
                                    <button class="flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-600 rounded-full hover:bg-blue-700">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                        Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
                <div class="mt-12 text-center">
                    <a href="{{ route('posts.index') }}" class="inline-flex items-center px-6 py-3 text-base font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        View All Products
                        <svg class="w-5 h-5 ml-2 -mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-16 bg-gray-50">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center text-gray-900 sm:text-4xl">What Our Customers Say</h2>
            <div class="grid grid-cols-1 gap-8 mt-12 sm:grid-cols-2 lg:grid-cols-3">
                <div class="p-6 bg-white rounded-lg shadow-sm">
                    <div class="flex items-center mb-4">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 bg-blue-600 rounded-full"></div>
                        </div>
                        <div class="ml-3">
                            <h4 class="text-lg font-medium text-gray-900">Sarah Johnson</h4>
                            <div class="flex items-center">
                                @for ($i = 0; $i < 5; $i++)
                                    <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                @endfor
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600">"My skin has never felt better! These products have completely transformed my skincare routine."</p>
                </div>

                <div class="p-6 bg-white rounded-lg shadow-sm">
                    <div class="flex items-center mb-4">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 bg-green-600 rounded-full"></div>
                        </div>
                        <div class="ml-3">
                            <h4 class="text-lg font-medium text-gray-900">Michael Chen</h4>
                            <div class="flex items-center">
                                @for ($i = 0; $i < 5; $i++)
                                    <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                @endfor
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600">"I've tried many skincare brands, but this one really stands out. Great quality and amazing results!"</p>
                </div>

                <div class="p-6 bg-white rounded-lg shadow-sm">
                    <div class="flex items-center mb-4">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 bg-purple-600 rounded-full"></div>
                        </div>
                        <div class="ml-3">
                            <h4 class="text-lg font-medium text-gray-900">Amanda Rodriguez</h4>
                            <div class="flex items-center">
                                @for ($i = 0; $i < 5; $i++)
                                    <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                @endfor
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600">"The customer service is exceptional, and the products really deliver on their promises. Highly recommended!"</p>
                </div>
            </div>
        </div>
    </section>
</div>
