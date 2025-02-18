<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <!-- Welcome Card -->
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6">
                    <div class="space-y-8">
                        <!-- Welcome Section -->
                        <div class="text-center">
                            <h1 class="text-4xl font-bold text-gray-900 dark:text-white">
                                Welcome to Our Store
                            </h1>
                            <p class="mt-4 text-lg text-gray-600 dark:text-gray-400">
                                Explore our latest products and find what you're looking for.
                            </p>
                        </div>

                        <!-- Quick Stats -->
                        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                            <!-- Total Products -->
                            <div class="p-6 bg-blue-50 rounded-xl dark:bg-blue-900/50">
                                <div class="text-center">
                                    <span class="text-3xl font-bold text-blue-600 dark:text-blue-300">
                                        {{ \App\Models\Post::count() }}
                                    </span>
                                    <span class="block mt-2 text-sm font-medium text-blue-600 dark:text-blue-400">
                                        Total Products
                                    </span>
                                </div>
                            </div>

                            <!-- Latest Products -->
                            <div class="p-6 bg-green-50 rounded-xl dark:bg-green-900/50">
                                <div class="text-center">
                                    <span class="text-3xl font-bold text-green-600 dark:text-green-300">
                                        {{ \App\Models\Post::latest()->take(5)->count() }}
                                    </span>
                                    <span class="block mt-2 text-sm font-medium text-green-600 dark:text-green-400">
                                        New Products
                                    </span>
                                </div>
                            </div>

                            <!-- Total Users -->
                            <div class="p-6 bg-purple-50 rounded-xl dark:bg-purple-900/50">
                                <div class="text-center">
                                    <span class="text-3xl font-bold text-purple-600 dark:text-purple-300">
                                        {{ \App\Models\User::count() }}
                                    </span>
                                    <span class="block mt-2 text-sm font-medium text-purple-600 dark:text-purple-400">
                                        Total Users
                                    </span>
                                </div>
                            </div>

                            <!-- Active Users -->
                            <div class="p-6 bg-amber-50 rounded-xl dark:bg-amber-900/50">
                                <div class="text-center">
                                    <span class="text-3xl font-bold text-amber-600 dark:text-amber-300">
                                        {{ \App\Models\User::where('last_login_at', '>=', now()->subDays(7))->count() }}
                                    </span>
                                    <span class="block mt-2 text-sm font-medium text-amber-600 dark:text-amber-400">
                                        Active Users
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Quick Actions -->
                        <div class="grid gap-6 sm:grid-cols-2">
                            <a href="{{ route('posts.index') }}" 
                               class="p-6 transition duration-300 group bg-gradient-to-br from-blue-50 to-blue-100 hover:from-blue-100 hover:to-blue-200 rounded-xl dark:from-blue-900/50 dark:to-blue-800/50 dark:hover:from-blue-800/50 dark:hover:to-blue-700/50">
                                <div class="text-center">
                                    <span class="block text-2xl font-bold text-blue-700 transition-transform dark:text-blue-300 group-hover:scale-105">
                                        Browse Products
                                    </span>
                                    <span class="mt-2 text-sm text-blue-600 dark:text-blue-400">
                                        View our complete catalog of products
                                    </span>
                                </div>
                            </a>

                            <a href="{{ route('posts.create') }}" 
                               class="p-6 transition duration-300 group bg-gradient-to-br from-green-50 to-green-100 hover:from-green-100 hover:to-green-200 rounded-xl dark:from-green-900/50 dark:to-green-800/50 dark:hover:from-green-800/50 dark:hover:to-green-700/50">
                                <div class="text-center">
                                    <span class="block text-2xl font-bold text-green-700 transition-transform dark:text-green-300 group-hover:scale-105">
                                        Add New Product
                                    </span>
                                    <span class="mt-2 text-sm text-green-600 dark:text-green-400">
                                        List a new product in our catalog
                                    </span>
                                </div>
                            </a>
                        </div>

                        <!-- Latest Products Preview -->
                        <div class="space-y-4">
                            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Latest Products</h2>
                            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                                @foreach(\App\Models\Post::latest()->take(3)->get() as $post)
                                    <a href="{{ route('posts.show', $post) }}" 
                                       class="block p-4 transition-shadow rounded-lg bg-gray-50 hover:shadow-md dark:bg-gray-700/50">
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $post->title }}</h3>
                                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                                            {{ Str::limit($post->content, 100) }}
                                        </p>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>