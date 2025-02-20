<x-app-layout>
    <div class="relative min-h-screen bg-gradient-to-br from-gray-50 via-white to-gray-100">
        <!-- Background Pattern -->
        <div class="absolute inset-0 z-0 hidden max-w-full max-h-screen opacity-40 bg-grid-pattern sm:block"></div>
        <div class="absolute inset-0 z-0 max-w-full max-h-screen opacity-20 bg-grid-pattern sm:hidden"></div>

        <div class="relative z-10 flex items-center justify-center min-h-screen px-4 py-12">
            <div class="w-full max-w-7xl">
                <!-- Main Card -->
                <div class="overflow-hidden transition-all duration-300 transform bg-white shadow-2xl rounded-3xl hover:shadow-3xl">
                    <!-- Header Section -->
                    <div class="relative px-6 py-10 overflow-hidden sm:px-12 sm:py-16 bg-gradient-to-r black to-gray">
                        <div class="absolute inset-0 opacity-20">
                            <div class="absolute inset-0 bg-[url('/img/grid.svg')] bg-center"></div>
                        </div>
                        <h1 class="relative max-w-3xl mx-auto text-3xl font-bold text-center text-black sm:text-4xl">
                            CONTACT US
                        </h1>
                    </div>

                    <!-- Social Links Grid -->
                    <div class="px-4 py-10 sm:px-6 lg:px-8 sm:py-16">
                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5">
                            <!-- Shopee -->
                            <a href="https://shopee.co.id/lavioxelshop"
                               target="_blank"
                               class="p-6 transition-all duration-300 transform bg-white shadow-md group rounded-2xl hover:shadow-xl hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2">
                                <div class="flex flex-col items-center space-y-4">
                                    <div class="relative w-20 h-20 overflow-hidden transition-transform duration-300 transform rounded-full group-hover:scale-110">
                                        <img src="{{ asset('storage/images/shopee.png') }}"
                                             alt="Shopee"
                                             class="object-cover w-full h-full transition-all duration-300 transform group-hover:scale-105"
                                             loading="lazy">
                                    </div>
                                    <div class="space-y-1 text-center">
                                        <h2 class="text-lg font-semibold text-gray-800 transition-colors duration-300 group-hover:text-orange-600">
                                            Shopee
                                        </h2>
                                        <p class="text-sm text-gray-500">@lavioxelshop</p>
                                    </div>
                                </div>
                            </a>

                            <!-- Similar structure for other social links -->
                            <a href="https://www.tokopedia.com/lavioxelshop" target="_blank"
                               class="p-6 transition-all duration-300 transform bg-white shadow-md group rounded-2xl hover:shadow-xl hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                                <div class="flex flex-col items-center space-y-4">
                                    <div class="relative w-20 h-20 overflow-hidden transition-transform duration-300 transform rounded-full group-hover:scale-110">
                                        <img src="{{ asset('storage/images/tokopedia.png') }}" alt="Tokopedia" class="object-cover w-full h-full transition-all duration-300 transform group-hover:scale-105" loading="lazy">
                                    </div>
                                    <div class="space-y-1 text-center">
                                        <h2 class="text-lg font-semibold text-gray-800 transition-colors duration-300 group-hover:text-green-600">Tokopedia</h2>
                                        <p class="text-sm text-gray-500">@lavioxelshop</p>
                                    </div>
                                </div>
                            </a>
                            <a href="https://www.tiktok.com/@lavioxel92" target="_blank"
                               class="p-6 transition-all duration-300 transform bg-white shadow-md group rounded-2xl hover:shadow-xl hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2">
                                <div class="flex flex-col items-center space-y-4">
                                    <div class="relative w-20 h-20 overflow-hidden transition-transform duration-300 transform rounded-full group-hover:scale-110">
                                        <img src="{{ asset('storage/images/tiktok.png') }}" alt="TikTok" class="object-cover w-full h-full transition-all duration-300 transform group-hover:scale-105" loading="lazy">
                                    </div>
                                    <div class="space-y-1 text-center">
                                        <h2 class="text-lg font-semibold text-gray-800 transition-colors duration-300 group-hover:text-pink-600">TikTok</h2>
                                        <p class="text-sm text-gray-500">@lavioxel92</p>
                                    </div>
                                </div>
                            </a>
                            <a href="https://www.youtube.com/@LAVIOXEL" target="_blank"
                               class="p-6 transition-all duration-300 transform bg-white shadow-md group rounded-2xl hover:shadow-xl hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                                <div class="flex flex-col items-center space-y-4">
                                    <div class="relative w-20 h-20 overflow-hidden transition-transform duration-300 transform rounded-full group-hover:scale-110">
                                        <img src="{{ asset('storage/images/youtube.webp') }}" alt="YouTube" class="object-cover w-full h-full transition-all duration-300 transform group-hover:scale-105" loading="lazy">
                                    </div>
                                    <div class="space-y-1 text-center">
                                        <h2 class="text-lg font-semibold text-gray-800 transition-colors duration-300 group-hover:text-red-600">YouTube</h2>
                                        <p class="text-sm text-gray-500">@LAVIOXEL</p>
                                    </div>
                                </div>
                            </a>
                            <a href="https://www.instagram.com/lavioxel" target="_blank"
                               class="p-6 transition-all duration-300 transform bg-white shadow-md group rounded-2xl hover:shadow-xl hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                                <div class="flex flex-col items-center space-y-4">
                                    <div class="relative w-20 h-20 overflow-hidden transition-transform duration-300 transform rounded-full group-hover:scale-110">
                                        <img src="{{ asset('storage/images/instagram.webp') }}" alt="Instagram" class="object-cover w-full h-full transition-all duration-300 transform group-hover:scale-105" loading="lazy">
                                    </div>
                                    <div class="space-y-1 text-center">
                                        <h2 class="text-lg font-semibold text-gray-800 transition-colors duration-300 group-hover:text-purple-600">Instagram</h2>
                                        <p class="text-sm text-gray-500">@lavioxel</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tailwind CSS Custom Utilities -->
    <style>
        @layer utilities {
            .bg-grid-pattern {
                background-image:
                    linear-gradient(to right, rgba(0,0,0,0.1) 1px, transparent 1px),
                    linear-gradient(to bottom, rgba(0,0,0,0.1) 1px, transparent 1px);
                background-size: 20px 20px;
            }

            .shadow-3xl {
                --tw-shadow: 0 35px 60px -15px rgba(0, 0, 0, 0.3);
                box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000),
                           var(--tw-ring-shadow, 0 0 #0000),
                           var(--tw-shadow);
            }
        }

        /* Custom Animations */
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .animate-float {
            animation: float 3s ease-in-out infinite;
        }
    </style>
</x-app-layout>
