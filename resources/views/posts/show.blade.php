<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="mb-4">
                <a href="{{ url()->previous() }}" class="inline-flex items-center px-4 py-2 text-white bg-gray-800 rounded-md hover:bg-gray-700">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Back
                </a>
            </div>

            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h1 class="mb-4 text-3xl font-bold">{{ $post->title }}</h1>

                    <div class="mb-6 text-gray-600">
                        <span>By {{ $post->author?->name?? 'Unknown Author' }}</span>
                        <span class="mx-2">•</span>
                        <span>{{ $post->created_at->format('F j, Y') }}</span>
                        @if ($post->price)
                            <span class="mx-2">•</span>
                            <span class="font-semibold text-blue-600">
                                Rp. {{ number_format($post->price, 0, ',', '.') }}
                            </span>
                        @endif
                    </div>

                    @if ($post->image)
                        <div class="mb-8">
                            <img src="{{ asset('storage/'. $post->image) }}" alt="{{ $post->title }}" class="w-full h-auto rounded-lg shadow-lg">
                        </div>
                    @endif

                    <div class="prose max-w-none">
                        {!! $post->content!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>