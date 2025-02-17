<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-gray-50 via-white to-gray-50">
        <div class="py-8 sm:py-12">
            <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <!-- Page Header -->
                <div class="mb-8">
                    <h1 class="text-3xl font-bold text-gray-900">Our Products</h1>
                    <p class="mt-2 text-sm text-gray-600">Showing {{ $posts->firstItem() }} to {{ $posts->lastItem() }} of {{ $posts->total() }} products</p>
                </div>

                <div class="flex flex-col gap-6 lg:flex-row">
                    <!-- Filter Sidebar -->
                    <div class="w-full lg:w-1/4">
                        <div class="sticky top-6">
                            <form action="{{ route('posts.index') }}" method="GET" class="p-6 space-y-6 bg-white rounded-lg shadow-sm">
                                <!-- Search -->
                                <div class="space-y-2">
                                    <label for="search" class="text-sm font-medium text-gray-900">Search Products</label>
                                    <div class="relative">
                                        <input
                                            type="text"
                                            name="search"
                                            value="{{ request('search') }}"
                                            class="w-full py-2 pl-10 pr-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                            placeholder="Search by name..."
                                        >
                                        <span class="absolute left-3 top-2.5 text-gray-400">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                            </svg>
                                        </span>
                                    </div>
                                </div>

                                <!-- Price Range -->
                                <div class="space-y-2">
                                    <label class="text-sm font-medium text-gray-900">Price Range</label>
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <input
                                                type="number"
                                                name="min_price"
                                                value="{{ request('min_price') }}"
                                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                                placeholder="Min"
                                            >
                                        </div>
                                        <div>
                                            <input
                                                type="number"
                                                name="max_price"
                                                value="{{ request('max_price') }}"
                                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                                placeholder="Max"
                                            >
                                        </div>
                                    </div>
                                </div>

                                <!-- Sort -->
                                <div class="space-y-2">
                                    <label class="text-sm font-medium text-gray-900">Sort By</label>
                                    <select
                                        name="sort"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                    >
                                        <option value="">Select sorting</option>
                                        <option value="price_asc" {{ request('sort') === 'price_asc' ? 'selected' : '' }}>Price: Low to High</option>
                                        <option value="price_desc" {{ request('sort') === 'price_desc' ? 'selected' : '' }}>Price: High to Low</option>
                                        <option value="latest" {{ request('sort') === 'latest' ? 'selected' : '' }}>Newest First</option>
                                    </select>
                                </div>

                                <!-- Action Buttons -->
                                <div class="flex gap-3">
                                    <button
                                        type="submit"
                                        class="flex-1 px-4 py-2 text-sm font-medium text-black bg-blue-600 border-2 border-black rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                                    >
                                        Apply Filters
                                    </button>
                                    <a
                                        href="{{ route('posts.index') }}"
                                        class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                                    >
                                        Reset
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
              <!-- Products Grid -->
            <div class="flex-1">
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @forelse($posts as $post)
                        <article class="relative flex flex-col overflow-hidden transition bg-white border border-gray-200 rounded-lg shadow-sm group hover:shadow-md">
                            <a href="{{ route('posts.show', $post) }}" class="relative block h-[200px] sm:h-[250px] overflow-hidden">
                                @if($post->image)
                                    <img
                                        src="{{ asset('storage/'. $post->image) }}"
                                        alt="{{ $post->title }}"
                                        class="object-cover object-center w-full h-full transition duration-300 group-hover:scale-105"
                                        loading="lazy"
                                    >
                                @endif
                            </a>

                            <div class="flex flex-col flex-1 p-4">
                                <h3 class="mb-2 text-lg font-semibold text-gray-900">
                                    <a href="{{ route('posts.show', $post) }}" class="hover:text-blue-600">
                                        {{ $post->title }}
                                    </a>
                                </h3>

                                @if($post->price)
                                    <p class="mb-4 text-xl font-bold text-blue-600">
                                        Rp {{ number_format($post->price, 0, ',', '.') }}
                                    </p>
                                @endif
                            </div>
                        </article>
                    @empty
                        <div class="py-12 text-center col-span-full">
                            <h3 class="text-lg font-medium text-gray-900">No products found</h3>
                            <p class="mt-2 text-sm text-gray-600">Try adjusting your search or filter to find what you're looking for.</p>
                        </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                @if($posts->hasPages())
                    <div class="mt-8">
                        {{ $posts->withQueryString()->links() }}
                    </div>
                @endif
            </div>
        </div>
        </div>
    </div>
</x-app-layout>
