<div>
    {{-- Hero Background with White Base --}}
    <div class="relative bg-white">
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-[url('/img/grid.svg')] bg-center opacity-10"></div>
        </div>

        <div class="relative min-h-screen py-12">
            <div class="max-w-6xl px-4 mx-auto sm:px-6 lg:px-8">
                {{-- Breadcrumb with White Background --}}
                <nav class="flex items-center p-3 mb-6 bg-white rounded-lg shadow-sm" aria-label="Breadcrumb">
                    <a href="{{ route('dashboard') }}" class="text-gray-900 hover:text-gray-700">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                        </svg>
                    </a>
                    <span class="mx-2 text-gray-500">/</span>
                    <a href="{{ route('posts.index') }}" class="text-gray-900 hover:text-gray-700">Products</a>
                    <span class="mx-2 text-gray-500">/</span>
                    <span class="font-medium text-gray-900">{{ $post->title }}</span>
                </nav>

                {{-- Main Content with White Background --}}
                <div class="overflow-hidden bg-white border border-gray-200 shadow-lg rounded-2xl">
                    <div class="grid grid-cols-1 gap-0 lg:grid-cols-2">
                        {{-- Image Section --}}
                        <div class="relative flex items-center justify-center p-6 bg-gray-50">
                            @if ($post->image)
                                <div class="relative max-w-md mx-auto group">
                                    <div class="overflow-hidden bg-white aspect-w-4 aspect-h-3 rounded-xl">
                                        <img
                                            src="{{ asset('storage/'. $post->image) }}"
                                            alt="{{ $post->title }}"
                                            class="object-contain w-full h-full transition-all duration-500 transform group-hover:scale-105"
                                            loading="lazy"
                                        >
                                    </div>
                                </div>
                            @else
                                <div class="relative max-w-md mx-auto group">
                                    <div class="flex items-center justify-center overflow-hidden bg-white aspect-w-4 aspect-h-3 rounded-xl">
                                        <svg class="w-24 h-24 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                </div>
                            @endif
                        </div>

                        {{-- Product Details with White Background --}}
                        <div class="p-6 bg-white border-gray-200 lg:p-8 lg:border-l">
                            <div class="max-w-lg mx-auto">
                                {{-- Title and Badge --}}
                                <div class="mb-6">
                                    <div class="flex flex-wrap items-center justify-between gap-4">
                                        <h1 class="text-2xl font-bold text-gray-900 md:text-3xl"><strong>{{ $post->title }}</strong></h1>
                                        <div class="flex items-center space-x-2">
                                            <span class="px-4 py-1.5 text-sm font-black text-white bg-green-500 rounded-full shadow-sm uppercase whitespace-nowrap">
                                                <strong>New Arrival</strong>
                                            </span>

                                            <button
                                                wire:click="toggleFavorite"
                                                class="p-2 transition-colors duration-200 rounded-full {{ $isFavorited ? 'bg-red-100 text-red-600' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}"
                                                aria-label="Favorite"
                                            >
                                                <svg class="w-6 h-6" fill="{{ $isFavorited ? 'currentColor' : 'none' }}" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                {{-- Price Section --}}
                                @if ($post->price)
                                    <div class="mb-6">
                                        <div class="flex items-baseline space-x-2">
                                            <span class="text-3xl font-bold text-gray-900">
                                                Rp {{ number_format($post->price, 0, ',', '.') }}
                                            </span>
                                        </div>
                                    </div>
                                @endif

                                {{-- Description with Black Text --}}
                                <div class="mb-8 prose prose-lg text-justify max-w-none prose-headings:text-gray-900 prose-p:text-gray-700">
                                    {!! $post->content !!}
                                </div>

                                {{-- Author and Date Info --}}
                                <div class="flex flex-wrap items-center gap-4 mb-8 sm:justify-between">
                                    <div class="flex items-center px-4 py-3 rounded-lg bg-gray-50">
                                        <svg class="w-5 h-5 mr-3 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                        <span class="text-gray-900">By {{ $post->author?->name ?? 'Unknown Author' }}</span>
                                    </div>
                                    <div class="flex items-center px-4 py-3 rounded-lg bg-gray-50">
                                        <svg class="w-5 h-5 mr-3 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <span class="text-gray-900">{{ $post->created_at->format('F j, Y') }}</span>
                                    </div>
                                </div>

                                {{-- Action Button --}}
                                <div class="flex flex-col mb-5 space-y-4">
                                    <a href="https://shopee.co.id/lavioxelshop"
                                       target="_blank"
                                       class="inline-flex items-center justify-center flex-1 px-8 py-4 text-base font-medium text-white transition-colors duration-200 bg-gray-900 rounded-xl hover:bg-gray-800"
                                       wire:navigate.hover
                                    >
                                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                        </svg>
                                        Buy on Shopee
                                    </a>
                                </div>

                                <div class="flex flex-col mb-8 space-y-4">
                                    <a href="https://www.tokopedia.com/lavioxelshop"
                                       target="_blank"
                                       class="inline-flex items-center justify-center flex-1 px-8 py-4 text-base font-medium text-white transition-colors duration-200 bg-gray-900 rounded-xl hover:bg-gray-800"
                                       wire:navigate.hover
                                    >
                                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                        </svg>
                                        Buy on Tokopedia
                                    </a>
                                </div>

                                {{-- Additional Info --}}
                                <div class="grid grid-cols-2 gap-6 p-6 bg-gray-50 rounded-xl">
                                    <div>
                                        <span class="block mb-1 text-sm text-gray-600">Availability</span>
                                        <span class="flex items-center font-medium text-gray-900">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                            </svg>
                                            In Stock
                                        </span>
                                    </div>
                                    <div>
                                        <span class="block mb-1 text-sm text-gray-600">Shipping</span>
                                        <span class="flex items-center font-medium text-gray-900">
                                            <svg class="w-4 h-4 mr-1 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/>
                                            </svg>
                                            2-3 Business Days
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Related Products Section --}}
                <div class="mt-12">
                    <h2 class="mb-6 text-2xl font-bold text-gray-900">Related Products</h2>
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                        @php
                            $relatedPosts = \App\Models\Post::where('id', '!=', $post->id)
                                ->inRandomOrder()
                                ->limit(4)
                                ->get();
                        @endphp

                        @foreach($relatedPosts as $relatedPost)
                            <div class="overflow-hidden transition-all duration-300 transform bg-white border border-gray-200 rounded-xl hover:shadow-lg hover:-translate-y-1">
                                <a href="{{ route('posts.show', $relatedPost) }}" class="block overflow-hidden aspect-w-1 aspect-h-1" wire:navigate>
                                    @if($relatedPost->image)
                                        <img src="{{ asset('storage/'. $relatedPost->image) }}"
                                             alt="{{ $relatedPost->title }}"
                                             class="object-cover w-full h-48 transition-transform duration-300 hover:scale-110"
                                             loading="lazy">
                                    @else
                                        <div class="flex items-center justify-center w-full h-48 bg-gray-100">
                                            <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                    @endif
                                </a>
                                <div class="p-4">
                                    <h3 class="mb-2 text-lg font-medium text-gray-900">
                                        <a href="{{ route('posts.show', $relatedPost) }}" class="hover:text-blue-600" wire:navigate>
                                            {{ Str::limit($relatedPost->title, 40) }}
                                        </a>
                                    </h3>
                                    @if($relatedPost->price)
                                        <p class="text-lg font-semibold text-gray-900">
                                            Rp {{ number_format($relatedPost->price, 0, ',', '.') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .prose img {
            @apply rounded-lg shadow-md max-h-96 object-contain mx-auto;
        }
        .product-image-container {
            max-height: 400px;
            overflow: hidden;
        }
    </style>
</div>
