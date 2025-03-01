<x-app-layout>
    <x-slot name="header">
        <!-- Header Section with improved margins -->
        <div class="flex flex-col gap-4 mx-4 sm:mx-6 lg:mx-8 md:flex-row md:items-center md:justify-between">
            <div class="flex flex-col items-start gap-3 sm:flex-row sm:items-center">
                <div class="flex flex-col">
                    <h2 class="text-xl font-bold tracking-tight text-gray-900 sm:text-2xl dark:text-white">
                        {{ __('Profile Settings') }}
                    </h2>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Manage your account settings and preferences
                    </p>
                </div>
                <span class="px-3 py-1 text-xs font-medium text-indigo-600 rounded-full bg-indigo-50 dark:bg-indigo-500/20 dark:text-indigo-300 whitespace-nowrap">
                    Settings
                </span>
            </div>

            <!-- Last Updated Info -->
            <div class="flex items-center">
                <span class="inline-flex items-center w-full gap-2 px-3 py-2 text-xs border border-gray-200 rounded-lg shadow-sm sm:text-sm bg-white/50 backdrop-blur-lg dark:bg-gray-800/50 dark:border-gray-700 sm:w-auto">
                    <svg class="flex-shrink-0 w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="font-medium text-gray-700 dark:text-gray-300 whitespace-nowrap">
                        Last updated:
                    </span>
                    <span class="text-gray-500 truncate dark:text-gray-400">
                        {{ auth()->user()->updated_at->diffForHumans() }}
                    </span>
                </span>
            </div>
        </div>
    </x-slot>

    <div class="py-6 sm:py-12">
        <!-- Main Content with consistent margins -->
        <div class="mx-4 sm:mx-6 lg:mx-8 max-w-7xl">
            <!-- Profile Navigation -->
            <div class="mb-6 overflow-x-auto border border-gray-100 shadow-sm sm:mb-8 bg-white/80 backdrop-blur-lg dark:bg-gray-800/80 rounded-xl sm:rounded-2xl dark:border-gray-700">
                <nav class="flex gap-2 p-3 flex-nowrap sm:flex-wrap sm:p-4 min-w-max">
                    @foreach([
                        ['id' => 'profile-info', 'name' => 'Personal Information', 'icon' => 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z'],
                        ['id' => 'security', 'name' => 'Security', 'icon' => 'M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z'],
                        ['id' => 'danger-zone', 'name' => 'Account Management', 'icon' => 'M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z', 'danger' => true]
                    ] as $nav)
                        <button 
                            onclick="scrollToSection('{{ $nav['id'] }}')"
                            class="{{ $nav['danger'] ?? false ? 'text-red-600 border-red-200 hover:bg-red-50 dark:border-red-800/50 dark:hover:bg-red-900/20' : 'text-gray-700 dark:text-gray-300 border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-700/50' }} 
                                   inline-flex items-center px-3 sm:px-4 py-2 text-xs sm:text-sm font-medium transition-all duration-200 bg-white/80 dark:bg-gray-800/80 border rounded-lg sm:rounded-xl backdrop-blur-lg
                                   focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-indigo-400 flex-shrink-0">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-1.5 sm:mr-2 {{ $nav['danger'] ?? false ? 'text-red-500' : 'text-indigo-500' }}" 
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $nav['icon'] }}" />
                            </svg>
                            <span class="whitespace-nowrap">{{ $nav['name'] }}</span>
                        </button>
                    @endforeach
                </nav>
            </div>

            <!-- Content Sections with consistent spacing -->
            <div class="space-y-6">
                @foreach(['profile-info', 'security', 'danger-zone'] as $section)
                    <div id="{{ $section }}" 
                         class="transition-all duration-300 border {{ $section === 'danger-zone' ? 'border-2 border-red-200 dark:border-red-800/50' : 'border-gray-100 dark:border-gray-700' }} 
                                shadow-sm bg-white/80 backdrop-blur-lg dark:bg-gray-800/80 rounded-xl sm:rounded-2xl hover:shadow-lg overflow-hidden">
                        <div class="p-4 sm:p-8">
                            <h3 class="flex items-center mb-4 sm:mb-6 text-base sm:text-lg font-semibold {{ $section === 'danger-zone' ? 'text-red-600 dark:text-red-400' : 'text-gray-900 dark:text-white' }}">
                                <svg class="w-5 h-5 sm:w-6 sm:h-6 mr-2 sm:mr-3 {{ $section === 'danger-zone' ? 'text-red-500' : 'text-indigo-500' }}" 
                                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="@switch($section)
                                             @case('profile-info')M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z@break
                                             @case('security')M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z@break
                                             @default M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z
                                             @endswitch" />
                                </svg>
                                {{ $section === 'profile-info' ? 'Personal Information' : ($section === 'security' ? 'Security Settings' : 'Danger Zone') }}
                            </h3>
                            <div class="max-w-xl">
                                @if($section === 'profile-info')
                                    <livewire:profile.update-profile-information-form />
                                @elseif($section === 'security')
                                    <livewire:profile.update-password-form />
                                @else
                                    <livewire:profile.delete-user-form />
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function scrollToSection(sectionId) {
            const element = document.getElementById(sectionId);
            const headerOffset = window.innerWidth < 640 ? 70 : 100;
            const elementPosition = element.getBoundingClientRect().top + window.pageYOffset;
            const offsetPosition = elementPosition - headerOffset;

            window.scrollTo({
                top: offsetPosition,
                behavior: 'smooth'
            });
        }
    </script>
    @endpush
</x-app-layout>
