<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-gray-50 via-white to-gray-50">
        <div class="py-8 sm:py-12">
            <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <!-- Page Header -->
           <div class="mb-8">
                    <h1 class="text-3xl font-bold text-gray-900">Our Products</h1>
                    {{--<p class="mt-2 text-sm text-gray-600">Showing {{ $posts->firstItem() }} to {{ $posts->lastItem() }} of {{ $posts->total() }} products</p> --}}
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
                                        class="flex-1 px-4 py-2 text-sm font-medium text-black bg-blue-600 border-4 border-black rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
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

            <!-- Products Grid Section -->
            <div class="flex-1 mt-4">
                <!-- Grid Header -->
                <div class="flex flex-col gap-2 mb-6 sm:flex-row sm:items-center sm:justify-between">
                    <h2 class="text-2xl font-bold text-gray-900">Available Products</h2>
                    <div class="px-3 py-1 text-sm text-gray-500 bg-white border rounded-full shadow-sm">
                        Showing {{ $posts->firstItem() ?? 0 }} to {{ $posts->lastItem() ?? 0 }} of {{ $posts->total() ?? 0 }} products
                    </div>
                </div>

                <!-- Products Grid -->
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4">
                    @forelse($posts as $post)
                        <div class="group">
                            <div class="relative overflow-hidden transition-all duration-300 bg-white border rounded-2xl hover:shadow-lg hover:-translate-y-1">
                                <!-- Product Image -->
                                <a href="{{ route('posts.show', $post) }}" class="relative block overflow-hidden aspect-w-1 aspect-h-1">
                                    @if($post->image)
                                        <img
                                            src="{{ asset('storage/'. $post->image) }}"
                                            alt="{{ $post->title }}"
                                            class="object-cover w-full h-full transition-transform duration-500 transform group-hover:scale-110"
                                            loading="lazy"
                                        >
                                        <div class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-black/40 group-hover:opacity-100">
                                            <div class="flex items-center justify-center w-full h-full">
                                                <span class="px-4 py-2 text-sm font-medium text-black transition-transform duration-300 transform translate-y-2 border-4 border-black rounded-lg shadow-lg group-hover:translate-y-0 hover:shadow-white">
                                                    View Details
                                                </span>
                                            </div>
                                        </div>
                                    @else
                                        <div class="flex items-center justify-center w-full h-full bg-gray-50">
                                            <svg class="w-16 h-16 text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                    @endif
                                </a>

                                <!-- Product Details -->
                                <div class="p-4">
                                    <h3 class="mb-2 text-lg font-semibold text-gray-900 transition-colors duration-300 group-hover:text-blue-600">
                                        <a href="{{ route('posts.show', $post) }}" class="line-clamp-1">
                                            {{ $post->title }}
                                        </a>
                                    </h3>

                                    <!-- Price Section -->
                                    @if($post->price)
                                        <div class="flex items-center justify-between mb-4">
                                            <p class="text-xl font-bold text-blue-600">
                                                Rp {{ number_format($post->price, 0, ',', '.') }}
                                            </p>
                                            <span class="px-2 py-1 text-xs font-medium text-green-800 bg-green-100 rounded-full">
                                                Available
                                            </span>
                                        </div>
                                    @endif

                                    <!-- Action Buttons -->
                                    <div class="flex items-center gap-2">
                                        <a href="{{ route('posts.show', $post) }}"
                                        class="flex-1 px-4 py-2.5 text-sm font-medium text-center text-black transition-colors duration-300 bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                            View Details
                                        </a>
                                        <!-- Favorite Button -->
                                        <button
                                            onclick="toggleFavorite({{ $post->id }})"
                                            class="p-2.5 text-gray-600 transition-all duration-300 bg-gray-100 rounded-lg hover:text-red-600 hover:bg-gray-200 focus:outline-none {{ $post->isFavoritedBy(auth()->user()) ? 'text-red-600' : '' }}"
                                            data-post-id="{{ $post->id }}"
                                        >
                                            <div class="flex items-center gap-1.5">
                                                <svg class="w-5 h-5" fill="{{ $post->isFavoritedBy(auth()->user()) ? 'currentColor' : 'none' }}" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                                </svg>
                                                <span class="text-sm font-medium" id="favorites-count-{{ $post->id }}">
                                                    {{ $post->favorites_count }}
                                                </span>
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <!-- Enhanced Empty State -->
                        <div class="col-span-full">
                            <div class="flex flex-col items-center justify-center px-6 py-12 bg-white rounded-2xl">
                                <svg class="w-20 h-20 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                </svg>
                                <h3 class="mt-4 text-xl font-semibold text-gray-900">No products found</h3>
                                <p class="mt-2 text-center text-gray-600">
                                    Try adjusting your search or filter to find what you're looking for.
                                </p>
                            </div>
                        </div>
                    @endforelse
                </div>

                <!-- Enhanced Pagination -->
                @if($posts->hasPages())
                    <div class="mt-8">
                        {{ $posts->withQueryString()->links() }}
                    </div>
                @endif
            </div>
            </div>
        </div>
    </div>

    <script>
        function toggleFavorite(postId) {
            fetch(`/posts/${postId}/favorite`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json',
                },
                credentials: 'same-origin'
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const button = document.querySelector(`button[data-post-id="${postId}"]`);
                    const svg = button.querySelector('svg');

                    if (data.isFavorited) {
                        button.classList.add('text-red-600');
                        svg.setAttribute('fill', 'currentColor');
                    } else {
                        button.classList.remove('text-red-600');
                        svg.setAttribute('fill', 'none');
                    }
                    // Update the favorites count
                    countElement.textContent = data.count;
                }
            })
            .catch(error => console.error('Error:', error));
        }
        </script>
</x-app-layout>
