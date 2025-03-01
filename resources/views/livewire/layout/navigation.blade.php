<?php
use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component {
    public function logout(Logout $logout): void {
        $logout();
        $this->redirect('/', navigate: true);
    }
}; ?>

<nav x-data="{ open: false }"
     class="sticky top-0 z-50 py-1 border-b border-gray-200 shadow-sm bg-white/95 backdrop-blur-lg dark:bg-gray-800/95 dark:border-gray-700">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 gap-6 sm:h-20">
            <!-- Logo Section -->
            <div class="flex items-center space-x-12">
                <a href="/" class="flex items-center">
                    <x-application-logo class="text-gray-500 fill-current w-max h-max sm:h-12" />
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden w-full mx-4 lg:flex lg:items-center lg:justify-center">
                <!-- Center Links -->
                <div class="flex items-center gap-4 ml-4 mr-3 space-x-6 lg:absolute lg:left-1/2 lg:-translate-x-1/2">
                    <x-nav-link :href="route('posts.index')" :active="request()->routeIs('posts.index')" wire:navigate>
                        <span class="text-sm font-medium text-black">{{ __('Products') }}</span>
                    </x-nav-link>
                    <x-nav-link :href="route('contact')" :active="request()->routeIs('contact')" wire:navigate>
                        <span class="text-sm font-medium text-black">{{ __('Contact') }}</span>
                    </x-nav-link>
                </div>

                <!-- Auth Links -->
                <div class="flex items-center justify-end mx-4 ml-auto space-x-4">
                    @auth
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700 transition duration-150 ease-in-out rounded-md gap-x-2 hover:text-gray-900 hover:bg-gray-50 dark:text-gray-300 dark:hover:text-white dark:hover:bg-gray-700">
                                    <span x-data="{{ json_encode(['name' => auth()->user()->name]) }}"
                                          x-text="name"
                                          x-on:profile-updated.window="name = $event.detail.name">
                                    </span>
                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile')" wire:navigate>
                                    {{ __('Profile') }}
                                </x-dropdown-link>
                                <button wire:click="logout" class="w-full text-start">
                                    <x-dropdown-link>
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </button>
                            </x-slot>
                        </x-dropdown>
                    @else
                        <a href="{{ route('login') }}" class="text-sm font-medium text-gray-700 transition-colors hover:text-blue-600">
                            Sign in
                        </a>
                        <a href="{{ route('register') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white transition-all duration-200 bg-blue-600 rounded-lg shadow-sm hover:bg-blue-700 hover:scale-105">
                            Register
                        </a>
                    @endauth
                </div>
            </div>

            <!-- Mobile Menu Button -->
            <button type="button"
                    @click="open = !open"
                    class="inline-flex items-center justify-center p-2 text-gray-700 rounded-md lg:hidden hover:text-gray-900 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <span class="sr-only">Open main menu</span>
                <svg class="w-8 h-8" :class="{'hidden': open, 'block': !open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg class="w-8 h-8" :class="{'block': open, 'hidden': !open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Navigation Menu -->
    <div x-show="open"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-1"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-1"
         class="lg:hidden"
         @click.away="open = false">
         <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('posts.index')" :active="request()->routeIs('posts.index')" wire:navigate>
                <span class="text-sm font-medium text-black">{{ __('Product') }}</span>
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('contact')" :active="request()->routeIs('contact')" wire:navigate>
                <span class="text-sm font-medium text-black">{{ __('Contact') }}</span>
            </x-responsive-nav-link>
        </div>

        @auth
            <!-- Mobile user menu -->
            <div class="pt-4 pb-3 border-t border-gray-200 dark:border-gray-700">
                <div class="px-4 space-y-1">
                    <div class="text-base font-medium text-gray-800 dark:text-gray-200"
                         x-data="{{ json_encode(['name' => auth()->user()->name]) }}"
                         x-text="name"
                         x-on:profile-updated.window="name = $event.detail.name">
                    </div>
                    <p class="text-sm text-gray-500">{{ auth()->user()->email }}</p>
                </div>
                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile')" wire:navigate>
                        {{ __('Profile') }}
                    </x-responsive-nav-link>
                    <button wire:click="logout" class="w-full text-start">
                        <x-responsive-nav-link>
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </button>
                </div>
            </div>
        @else
            <!-- Mobile auth links -->
            <div class="pt-4 pb-3 border-t border-gray-200 dark:border-gray-700">
                <div class="space-y-1">
                    <x-responsive-nav-link :href="route('login')">
                        {{ __('Sign in') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('register')" class="font-medium text-blue-600 dark:text-blue-500">
                        {{ __('Register') }}
                    </x-responsive-nav-link>
                </div>
            </div>
        @endauth
    </div>
</nav>
