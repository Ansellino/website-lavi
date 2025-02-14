<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Not Found</title>
    @vite('resources/css/app.css')
</head>
<body class="flex items-center justify-center min-h-screen p-4 bg-gradient-to-tr from-slate-900 via-purple-900 to-slate-900">
    <div class="w-full max-w-lg p-12 border shadow-2xl bg-white/10 backdrop-blur-lg rounded-2xl border-white/20">
        <div class="relative flex flex-col items-center">
            <!-- Decorative elements -->
            <div class="absolute left-0 w-24 h-24 rounded-full -top-12 bg-purple-500/20 blur-xl"></div>
            <div class="absolute right-0 w-32 h-32 rounded-full -bottom-12 bg-blue-500/20 blur-xl"></div>

            <!-- Error Icon -->
            <div class="relative p-6 mb-8 border rounded-full bg-red-500/10 border-red-500/20 backdrop-blur-sm">
                <svg class="w-20 h-20 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </div>

            <!-- Error Content -->
            <h1 class="mb-4 font-extrabold text-transparent text-8xl bg-clip-text bg-gradient-to-r from-purple-400 to-pink-600">404</h1>
            <h2 class="mb-2 text-3xl font-bold text-white/90">Page Not Found</h2>
            <p class="max-w-sm mb-8 text-lg text-center text-white/60">Sorry, the page you're looking for doesn't exist or has been moved.</p>

            <!-- Action Buttons -->
            <div class="flex flex-col w-full max-w-xs gap-4 sm:flex-row">
                <a href="/" class="flex items-center justify-center w-full px-6 py-3 font-semibold text-white transition-all duration-300 bg-gradient-to-r from-purple-500 to-pink-500 rounded-xl hover:from-purple-600 hover:to-pink-600 hover:scale-105 focus:ring-2 focus:ring-purple-400 focus:ring-offset-2 focus:ring-offset-purple-900">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    Return Home
                </a>
                <button onclick="history.back()" class="flex items-center justify-center w-full px-6 py-3 font-semibold transition-all duration-300 border border-white/20 rounded-xl hover:bg-white/10 hover:scale-105 text-white/80 backdrop-blur-sm focus:ring-2 focus:ring-white/20">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Go Back
                </button>
            </div>
        </div>
    </div>
</body>
</html>
