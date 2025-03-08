<div>
    <div class="relative min-h-screen">
        <div class="relative z-10 flex items-center justify-center min-h-screen px-4 py-12">
            <div class="w-full max-w-7xl">
                <div class="overflow-hidden transition-all duration-300 transform bg-yellow rounded-3xl hover:shadow-3xl shadow-3xl">
                    <!-- Header Section -->
                    <div class="relative px-6 py-10 overflow-hidden sm:px-12 sm:py-16 animate-float">
                        <div class="absolute inset-0" style="background-image: url('{{ asset('images1/banner1.webp') }}'); background-size: cover; background-position: center; filter: transform: scale(1.1);"></div>
                        <div class="absolute inset-0 bg-black/30"></div>
                        <h1 class="relative max-w-3xl mx-auto text-3xl font-bold text-center text-white sm:text-4xl">
                            CONTACT US
                        </h1>
                    </div>

                    <!-- Social Links Grid -->
                    <div class="relative px-4 py-10 sm:px-6 lg:px-8 sm:py-16">
                        <div class="absolute inset-0 object-cover w-full h-full" style="background-image: url('{{ asset('images1/banner1.webp') }}'); background-size: cover; background-repeat: no-repeat; background-position: center;"></div>
                        <div class="relative grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 backdrop-blur-md bg-white/30">
                            @include('livewire.pages.partials.social-links')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
