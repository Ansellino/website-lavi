<x-app-layout>
    <!-- Main Container -->
    <div class="relative min-h-screen bg-gradient-to-br from-gray-50 via-white to-gray-50">
        <!-- Responsive Hero Section -->
        <div class="relative overflow-hidden bg-center bg-no-repeat bg-cover">
            <div class="absolute inset-0">
            <img src="{{ asset('images1/banner.webp') }}" alt="Hero Background" class="object-cover w-full h-full">
            <div class="absolute inset-0 bg-black/40"></div>
            </div>
            <div class="relative px-4 py-24 sm:px-6 sm:py-32 lg:py-40 lg:px-8">

            <p class="max-w-2xl mx-auto mt-8 text-xl text-center text-white sm:text-2xl lg:text-3xl">
                Discover our premium skincare products
            </p>
            </div>
        </div>

        <!-- Replace the product slideshow section -->
        <section class="py-24 bg-gray-50">
            <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div x-data="slideshow"
                     x-init="init()"
                     @resize.window="handleResize">
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
                            autoplay
                            muted
                            loop
                            playsinline
                            preload="auto"
                            poster="{{ asset('images1/banner.webp') }}"
                        >
                            <source src="{{ asset('images1/product.mp4') }}" type="video/mp4" />
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    <!-- Product Slideshow -->
                    <div class="relative mt-12">
                        <div class="max-w-5xl mx-auto overflow-hidden rounded-2xl">
                            <div class="grid grid-cols-4 gap-4"
                                 @mouseenter="handleMouseEnter"
                                 @mouseleave="handleMouseLeave">
                                <template x-for="(position, index) in positions" :key="index">
                                    <div class="overflow-hidden transition-all duration-500 bg-gray-100 rounded-xl group">
                                        <div class="relative aspect-w-1 aspect-h-1">
                                            <img :src="'/images1/' + (position + 1) + '.webp'"
                                                 :alt="'Product ' + (position + 1)"
                                                 class="object-cover w-full h-48 transition-all duration-300 sm:h-56 group-hover:scale-110"
                                                 x-transition:enter="transition ease-out duration-300"
                                                 x-transition:enter-start="opacity-0"
                                                 x-transition:enter-end="opacity-100">
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>

                        <!-- Navigation Buttons -->
                        <button @click="rotateLeft"
                                class="absolute flex items-center justify-center w-10 h-10 transition-all duration-200 transform -translate-y-1/2 rounded-full shadow-lg left-2 top-1/2 bg-white/90 hover:bg-white">
                            <svg class="w-5 h-5 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                            </svg>
                        </button>

                        <button @click="rotateRight"
                                class="absolute flex items-center justify-center w-10 h-10 transition-all duration-200 transform -translate-y-1/2 rounded-full shadow-lg right-2 top-1/2 bg-white/90 hover:bg-white">
                            <svg class="w-5 h-5 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </button>
                    </div>

                    <!-- Mobile Menu -->
                    <div class="lg:hidden">
                        <button @click="toggleMobileMenu"
                                class="flex items-center">
                            <svg x-show="!mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                            </svg>
                            <svg x-show="mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>

                        <div x-show="mobileMenuOpen"
                             @click.away="mobileMenuOpen = false"
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 -translate-y-1"
                             x-transition:enter-end="opacity-100 translate-y-0"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 translate-y-0"
                             x-transition:leave-end="opacity-0 -translate-y-1"
                             class="absolute left-0 w-full mt-2">
                            <!-- Mobile menu content -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-app-layout>
