<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('Lavioxel Shop - Skin Care', 'Lavioxel Shop - Skin Care') }}</title>

    <!-- Icon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <!-- Main Container -->
    <div class="min-h-screen bg-gradient-to-br from-gray-50 via-white to-gray-50">
        <livewire:layout.navigation />

        <!-- Main Content -->
        <main>
            <div class="w-auto max-screen">
                <!-- Page Header -->
                @if (isset($header))
                    <header class="mb-8">
                        {{ $header }}
                    </header>
                @endif

                <!-- Content -->
                {{ $slot }}
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-gray-900">
            <div class="px-4 py-12 mx-auto mt-3 max-w-7xl sm:px-6 lg:py-16 lg:px-8">
                <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
                    <div>
                        <h3 class="text-sm font-semibold tracking-wider text-gray-400 uppercase">About Us</h3>
                        <p class="mt-4 text-base text-gray-400">
                            Lavioxel Shop is your premier destination for skincare.
                        </p>
                    </div>
                    <div>
                        <h3 class="text-sm font-semibold tracking-wider text-gray-400 uppercase">Quick Links</h3>
                        <ul class="mt-4 space-y-4">
                            <li>
                                <a href="{{ route('login') }}" class="text-base text-gray-400 transition-colors hover:text-blue">
                                    Products
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('login') }}" class="text-base text-gray-400 transition-colors hover:text-blue">
                                    About
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('login') }}" class="text-base text-gray-400 transition-colors hover:text-blue">
                                    Contact
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-sm font-semibold tracking-wider text-gray-400 uppercase">Connect With Us</h3>
                        <div class="flex mt-4 space-x-6">
                            <a href="https://www.instagram.com/lavioxel" class="text-gray-400 transition-colors hover:text-blue">
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
</body>
</html>
