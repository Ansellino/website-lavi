<div>
    <!-- Enhanced Background with Pattern -->
    <div class="relative w-full min-h-screen bg-transparent rounded-lg backdrop-blur-sm">
        <!-- Main Content -->
        <div class="relative z-10 py-8 sm:py-12">
            <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <!-- Enhanced Page Header with Animation -->
                <div class="mb-8 animate-fade-in">
                    <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl">
                        Our Products
                    </h1>
                </div>

                <div class="flex flex-col gap-6 lg:flex-row">
                    <!-- Filter Sidebar - Responsive -->
                    <div class="w-full lg:w-full">
                        <!-- Filter Button (Visible on all screens) -->
                        <button
                            type="button"
                            wire:click="toggleFilters"
                            class="w-full px-4 py-2 mb-4 text-sm font-medium text-gray-700 bg-white border-2 border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                        >
                            <div class="flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                                </svg>
                                <span>{{ $showFilters ? 'Hide Filters' : 'Show Filters' }}</span>
                            </div>
                        </button>

                        <!-- Filter Form - Now using Livewire binding -->
                        <div x-data x-show="$wire.showFilters" x-transition:enter="transition ease-out duration-300"
                             x-transition:enter-start="opacity-0 transform -translate-y-4"
                             x-transition:enter-end="opacity-100 transform translate-y-0"
                             x-transition:leave="transition ease-in duration-200"
                             x-transition:leave-start="opacity-100 transform translate-y-0"
                             x-transition:leave-end="opacity-0 transform -translate-y-4">
                            <div class="sticky top-6">
                                <div class="p-4 space-y-4 bg-white border-2 border-gray-300 rounded-lg shadow-sm sm:p-6 sm:space-y-6">
                                    <!-- Search -->
                                    <div class="space-y-2">
                                        <label for="search" class="text-sm font-medium text-gray-900">Search Products</label>
                                        <div class="relative">
                                            <input
                                                type="text"
                                                wire:model.live.debounce.300ms="search"
                                                class="w-full py-2 pl-4 pr-4 text-sm border-2 border-gray-300 rounded-lg sm:text-base focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                                placeholder="Search by name..."
                                            >
                                        </div>
                                    </div>

                                    <!-- Price Range -->
                                    <div class="space-y-2">
                                        <label class="text-sm font-medium text-gray-900">Price Range</label>
                                        <div class="grid grid-cols-2 gap-2 sm:gap-4">
                                            <div>
                                                <input
                                                    type="number"
                                                    wire:model.live.debounce.500ms="min_price"
                                                    class="w-full px-2 py-1.5 text-sm border-2 border-gray-300 rounded-lg sm:px-3 sm:py-2 sm:text-base focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                                    placeholder="Min"
                                                >
                                            </div>
                                            <div>
                                                <input
                                                    type="number"
                                                    wire:model.live.debounce.500ms="max_price"
                                                    class="w-full px-2 py-1.5 text-sm border-2 border-gray-300 rounded-lg sm:px-3 sm:py-2 sm:text-base focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                                    placeholder="Max"
                                                >
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Sort -->
                                    <div class="space-y-2">
                                        <label class="text-sm font-medium text-gray-900">Sort By</label>
                                        <select
                                            wire:model.live="sort"
                                            class="w-full px-2 py-1.5 text-sm border-2 border-gray-300 rounded-lg sm:px-3 sm:py-2 sm:text-base focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                        >
                                            <option value="">Select sorting</option>
                                            <option value="price_asc">Price: Low to High</option>
                                            <option value="price_desc">Price: High to Low</option>
                                            <option value="latest">Newest First</option>
                                        </select>
                                    </div>

                                    <!-- Action Buttons -->
                                    <div class="flex flex-col gap-2 sm:flex-row sm:gap-3">
                                        <button
                                            wire:click="resetFilters"
                                            type="button"
                                            class="px-4 py-2 text-sm font-medium text-center text-gray-700 bg-white border-2 border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                                        >
                                            Reset Filters
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Products Grid Section -->
                <div class="flex-1 mt-4">
                    <!-- Grid Header with Livewire Loading State -->
                    <div class="flex flex-col gap-2 mb-6 sm:flex-row sm:items-center sm:justify-between">
                        <h2 class="text-2xl font-bold text-gray-900">Available Products</h2>
                        <div wire:loading.delay class="px-3 py-1 text-sm text-blue-600 border border-blue-200 rounded-full bg-blue-50 animate-pulse">
                            Loading...
                        </div>
                        <div wire:loading.delay.remove class="px-3 py-1 text-sm text-gray-500 bg-white border-2 rounded-full shadow-sm">
                            Showing {{ $posts->firstItem() ?? 0 }} to {{ $posts->lastItem() ?? 0 }} of {{ $posts->total() ?? 0 }} products
                        </div>
                    </div>

                    <!-- Products Grid with Livewire Loading State -->
                    <div
                        wire:loading.class="opacity-50"
                        class="grid grid-cols-1 gap-6 transition-opacity duration-300 sm:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4">
                        @forelse($posts as $post)
                            <!-- Product Card -->
                            <div class="group animate-fade-in" style="animation-delay: {{ $loop->index * 0.1 }}s">
                                <div class="relative overflow-hidden transition-all duration-300 border-2 border-gray-200 bg-white/90 backdrop-blur-sm rounded-2xl hover:shadow-xl hover:-translate-y-1">
                                    <!-- Product Image -->
                                    <a href="{{ route('posts.show', $post) }}"
                                    class="relative block overflow-hidden aspect-w-1 aspect-h-1 group">
                                        @if($post->image)
                                            <img src="{{ asset('storage/'. $post->image) }}"
                                                alt="{{ $post->title }}"
                                                class="object-cover w-full transition-transform duration-500 transform group-hover:scale-110"
                                                loading="lazy">
                                            <!-- Enhanced Overlay -->
                                            <div class="absolute inset-0 transition-all duration-300 opacity-0 bg-gradient-to-t from-black/60 via-black/30 to-transparent group-hover:opacity-100">
                                                <div class="absolute inset-x-0 bottom-0 p-4">
                                                    <span class="inline-flex items-center px-4 py-2 text-sm font-medium text-white transition-transform duration-300 transform translate-y-2 border-2 border-white rounded-lg group-hover:translate-y-0 backdrop-blur-sm bg-black/10">
                                                        View Details
                                                    </span>
                                                </div>
                                            </div>
                                        @else
                                            <!-- Enhanced Placeholder -->
                                            <div class="flex items-center justify-center w-full h-full bg-gradient-to-br from-gray-50 to-gray-100">
                                                <svg class="w-16 h-16 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                        @endif
                                    </a>

                                    <!-- Product Details -->
                                    <div class="p-4 backdrop-blur-sm bg-white/80">
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
                                            class="flex-1 px-4 py-2.5 text-sm font-medium text-center text-white transition-colors duration-300 bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                                View Details
                                            </a>
                                            <!-- Favorite Button -->
                                            <button
                                                wire:click="toggleFavorite({{ $post->id }})"
                                                type="button"
                                                class="p-2.5 text-gray-600 transition-all duration-300 bg-gray-100 rounded-lg hover:text-red-600 hover:bg-gray-200 focus:outline-none {{ $post->isFavoritedBy(auth()->user()) ? 'text-red-600' : '' }}"
                                                data-post-id="{{ $post->id }}"
                                                id="favorite-button-{{ $post->id }}"
                                            >
                                                <div class="flex items-center gap-1.5">
                                                    <svg class="w-5 h-5" fill="{{ $post->isFavoritedBy(auth()->user()) ? 'currentColor' : 'none' }}" stroke="currentColor" viewBox="0 0 24 24" id="favorite-icon-{{ $post->id }}">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                                    </svg>
                                                    <span class="text-sm font-medium" id="favorites-count-{{ $post->id }}">
                                                        {{ $post->favorited_by_count }}
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
                                    <button wire:click="resetFilters" class="inline-flex items-center px-4 py-2 mt-4 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                        Reset Filters
                                    </button>
                                </div>
                            </div>
                        @endforelse
                    </div>

                    <!-- Enhanced Pagination with Livewire Support -->
                    @if($posts->hasPages())
                        <div class="mt-8">
                            {{ $posts->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Add Alpine.js to handle favorite updates -->
    @script
    <script>
        document.addEventListener('livewire:initialized', () => {
            @this.on('favorite-updated', ({ postId, isFavorited, count }) => {
                const button = document.getElementById(`favorite-button-${postId}`);
                const icon = document.getElementById(`favorite-icon-${postId}`);
                const countElement = document.getElementById(`favorites-count-${postId}`);

                if (isFavorited) {
                    button.classList.add('text-red-600');
                    icon.setAttribute('fill', 'currentColor');
                } else {
                    button.classList.remove('text-red-600');
                    icon.setAttribute('fill', 'none');
                }

                // Update the favorites count
                countElement.textContent = count;
            });
        });
    </script>
    @endscript

    <!-- Add these styles to your existing <style> tag or create a new one -->
    <style>
        @layer utilities {
            /* Enhanced Grid Pattern */
            .bg-grid-pattern {
                background-image: radial-gradient(circle at 1px 1px, rgba(0, 0, 0, 0.05) 1px, transparent 0);
                background-size: 40px 40px;
            }

            /* Animation Utilities */
            @keyframes fade-in {
                from {
                    opacity: 0;
                    transform: translateY(10px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .animate-fade-in {
                animation: fade-in 0.6s ease-out forwards;
            }
        }

        /* Glass Effect for Cards */
        .glass-effect {
            @apply backdrop-blur-sm bg-white/80 border-2 border-white/20;
        }
    </style>
</div>
