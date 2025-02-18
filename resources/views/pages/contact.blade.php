<x-app-layout>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="w-full px-4 py-12 max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-2xl rounded-3xl"> <div class="px-6 py-10 sm:px-12 sm:py-16 bg-gradient-to-r from-blue-600 to-indigo-700">
                    <p class="max-w-3xl mx-auto mb-10 text-3xl font-bold text-center text-blue-100 sm:text-4xl animate-fade-in-up">
                    Contact Us
                    </p>
                </div>

                <div class="px-4 py-10 sm:px-6 lg:px-8 sm:py-16">
                    <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5">
                        <a href="https://shopee.co.id/lavioxelshop" target="_blank"
                           class="flex flex-col items-center justify-between px-4 py-5 transition duration-300 transform bg-white shadow-md group rounded-2xl hover:shadow-lg hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                            <div class="relative w-20 h-20 mb-4 overflow-hidden rounded-full">
                                <img src="{{ asset('storage/images/shopee.png') }}" alt="Shopee Logo"
                                     class="object-contain w-full h-full">
                            </div>
                            <div class="text-center">
                                <h2 class="text-lg font-semibold text-gray-700 transition duration-300 group-hover:text-blue-600">Shopee</h2>
                                <p class="text-sm text-gray-500">Lavioxel Shop</p>
                            </div>
                        </a>
                        <a href="https://www.tokopedia.com/lavioxelshop" target="_blank"
                           class="flex flex-col items-center justify-between px-4 py-5 transition duration-300 transform bg-white shadow-md group rounded-2xl hover:shadow-lg hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">
                            <div class="relative w-20 h-20 mb-4 overflow-hidden rounded-full">
                                <img src="{{ asset('storage/images/tokopedia.png') }}" alt="Tokopedia Logo"
                                     class="object-contain w-full h-full">
                            </div>
                             <div class="text-center">
                                <h2 class="text-lg font-semibold text-gray-700 transition duration-300 group-hover:text-green-600">Tokopedia</h2>
                                <p class="text-sm text-gray-500">Lavioxel Shop</p>
                            </div>
                        </a>
                        <a href="https://www.tiktok.com/@lavioxel92" target="_blank"
                           class="flex flex-col items-center justify-between px-4 py-5 transition duration-300 transform bg-white shadow-md group rounded-2xl hover:shadow-lg hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-opacity-50">
                            <div class="relative w-20 h-20 mb-4 overflow-hidden rounded-full">
                                <img src="{{ asset('storage/images/tiktok.png') }}" alt="TikTok Logo"
                                     class="object-contain w-full h-full">
                            </div>
                            <div class="text-center">
                                <h2 class="text-lg font-semibold text-gray-700 transition duration-300 group-hover:text-pink-600">TikTok</h2>
                                <p class="text-sm text-gray-500">Lavioxel Shop</p>
                            </div>
                        </a>
                       <a href="https://www.youtube.com/@LAVIOXEL" target="_blank"
                           class="flex flex-col items-center justify-between px-4 py-5 transition duration-300 transform bg-white shadow-md group rounded-2xl hover:shadow-lg hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
                           <div class="relative w-20 h-20 mb-4 overflow-hidden rounded-full">
                               <img src="{{ asset('storage/images/youtube.webp') }}" alt="YouTube Logo"
                                     class="object-contain w-full h-full">
                            </div>
                            <div class="text-center">
                                <h2 class="text-lg font-semibold text-gray-700 transition duration-300 group-hover:text-red-600">YouTube</h2>
                                <p class="text-sm text-gray-500">Lavioxel</p>
                            </div>
                        </a>
                        <a href="https://www.instagram.com/lavioxel" target="_blank"
                           class="flex flex-col items-center justify-between px-4 py-5 transition duration-300 transform bg-white shadow-md group rounded-2xl hover:shadow-lg hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50">
                            <div class="relative w-20 h-20 mb-4 overflow-hidden rounded-full">
                                 <img src="{{ asset('storage/images/instagram.webp') }}" alt="Instagram Logo" class="object-contain w-full h-full">
                            </div>
                            <div class="text-center">
                                <h2 class="text-lg font-semibold text-gray-700 transition duration-300 group-hover:text-purple-600">Instagram</h2>
                                <p class="text-sm text-gray-500">Lavioxel</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes fade-in {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes fade-in-up {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fade-in 0.6s ease-out;
        }

        .animate-fade-in-up {
            animation: fade-in-up 0.8s ease-out;
        }
    </style>
</x-app-layout>