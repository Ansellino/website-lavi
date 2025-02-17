<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-gray-50 via-white to-gray-50">
        <div class="py-8 sm:py-12">
            <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                {{-- Responsive Header Section --}}
                <div class="mb-8 text-center sm:mb-12">
                    <h1 class="mb-3 text-3xl font-bold text-gray-900 sm:mb-4 sm:text-4xl lg:text-5xl">
                        Latest Collection
                    </h1>
                    <p class="max-w-2xl px-4 mx-auto text-base text-gray-600 sm:text-lg">
                        Discover our newest collection of premium footwear
                    </p>
                </div>

                {{-- Responsive Products Grid --}}
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 sm:gap-6 lg:gap-8">
                    @foreach($posts as $post)
                        <div class="flex flex-col h-full transition-all duration-300 bg-white border border-gray-100 shadow-sm group rounded-xl sm:rounded-2xl hover:shadow-xl">
                            {{-- Responsive Image Container --}}
                            <a href="{{ route('posts.show', $post) }}" class="relative block h-[200px] sm:h-[250px] overflow-hidden rounded-t-xl sm:rounded-t-2xl">
                                @if($post->image)
                                    <div class="w-full h-full bg-gray-100">
                                        <img
                                            src="{{ asset('storage/'. $post->image) }}"
                                            alt="{{ $post->title }}"
                                            class="object-contain w-full h-full transition-transform duration-500 transform group-hover:scale-105"
                                            loading="lazy"
                                        >
                                    </div>
                                    {{-- Responsive Tag --}}
                                    <div class="absolute top-3 sm:top-4 right-3 sm:right-4">
                                        <span class="px-2.5 sm:px-3 py-1 sm:py-1.5 text-xs sm:text-sm font-medium text-white bg-gradient-to-r from-blue-600 to-blue-700 rounded-full shadow-lg">
                                            New Arrival
                                        </span>
                                    </div>
                                @endif
                            </a>

                            {{-- Responsive Content Container --}}
                            <div class="flex flex-col flex-grow p-4 sm:p-6">
                                {{-- Title --}}
                                <a href="{{ route('posts.show', $post) }}" class="block group">
                                    <h2 class="mb-2 text-lg font-bold text-gray-900 transition-colors sm:mb-3 sm:text-xl group-hover:text-blue-600 line-clamp-2">
                                        {{ $post->title }}
                                    </h2>
                                </a>

                                {{-- Price --}}
                                @if($post->price)
                                    <div class="flex items-baseline mb-3 sm:mb-4">
                                        <span class="text-xl font-bold text-blue-600 sm:text-2xl">
                                            Rp {{ number_format($post->price, 0, ',', '.') }}
                                        </span>
                                        <span class="ml-2 text-xs text-gray-500 sm:text-sm">/pair</span>
                                    </div>
                                @endif

                                {{-- Description --}}
                                <p class="mb-4 text-xs text-gray-600 sm:text-sm line-clamp-2">
                                    {{ Str::limit(strip_tags($post->content), 120) }}
                                </p>

                                {{-- Meta Info --}}
                                <div class="flex flex-wrap items-center justify-between gap-2 mb-4 text-xs text-gray-500">
                                    <div class="flex items-center">
                                        <svg class="w-3.5 sm:w-4 h-3.5 sm:h-4 mr-1.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                        <span>{{ $post->author?->name?? 'Unknown Author' }}</span>
                                    </div>
                                    <div class="flex items-center">
                                        <svg class="w-3.5 sm:w-4 h-3.5 sm:h-4 mr-1.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <span>{{ $post->created_at->format('M j, Y') }}</span>
                                    </div>
                                </div>

                                {{-- Action Button --}}
                                <div class="pt-3 mt-auto border-t border-gray-100 sm:pt-4">
                                    <a href="{{ route('posts.show', $post) }}"
                                        class="inline-flex items-center justify-center w-full px-3 sm:px-4 py-2 sm:py-2.5 text-xs sm:text-sm font-medium text-white transition-all duration-200 bg-gradient-to-r from-blue-600 to-blue-700 rounded-lg hover:from-blue-700 hover:to-blue-800 hover:shadow-lg hover:-translate-y-0.5">
                                        View Details
                                        <svg class="w-3.5 sm:w-4 h-3.5 sm:h-4 ml-2 -mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Responsive Pagination --}}
                @if($posts->hasPages())
                    <div class="mt-8 sm:mt-12">
                        {{ $posts->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>