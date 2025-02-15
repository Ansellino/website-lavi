<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            {{-- Back Button --}}
            <div class="mb-4">
                <a href="{{ url()->previous() }}"
                   class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md dark:bg-gray-200 dark:text-gray-800 hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Back
                </a>
            </div>

            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6">
                    {{-- Post Title --}}
                    <h1 class="mb-4 text-3xl font-bold text-gray-900 dark:text-white">
                        {{ $post->title }}
                    </h1>

                    {{-- Author & Date --}}
                    <div class="mb-6 text-gray-600 dark:text-gray-400">
                        <span>By {{ $post->user->name }}</span>
                        <span class="mx-2">•</span>
                        <span>{{ $post->created_at->format('F j, Y') }}</span>
                    </div>

                    {{-- Post Images Carousel --}}
                    @if($post->hasMedia('post_images'))
                    <div class="mb-8">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                @foreach($post->getMedia('post_images') as $media)
                                <div class="swiper-slide">
                                    <img
                                        src="{{ $media->getUrl() }}"
                                        alt="Post image"
                                        class="w-full h-auto rounded-lg shadow-lg"
                                        loading="lazy"
                                    >
                                </div>
                                @endforeach

                            </div>
                            <div class="swiper-pagination"></div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                    @endif

                    {{-- Post Content --}}
                    <div class="prose max-w-none dark:prose-invert">
                        {!! $post->content !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new Swiper('.swiper-container', {
                loop: true,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                autoplay: {
                    delay: 5000,
                },
            });
        });
    </script>
    @endpush

    @push('styles')
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <style>
        .swiper-container {
            width: 100%;
            height: 100%;
            margin-left: auto;
            margin-right: auto;
        }
        .swiper-slide {
            text-align: center;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .swiper-slide img {
            max-height: 600px;
            width: auto;
            object-fit: contain;
        }
    </style>
    @endpush
</x-app-layout>
