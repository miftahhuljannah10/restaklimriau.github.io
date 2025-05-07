@props(['showMobileToggle' => true])

<header class="bg-white shadow-sm z-10">
    <div class="flex justify-between items-center p-4">
        @if ($showMobileToggle)
            <!-- Mobile menu button -->
            <button @click="Alpine.store('sidebar').toggleMobile()"
                class="md:hidden p-2 rounded-md text-gray-600 hover:bg-gray-100">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        @endif

        {{-- <div class="flex items-center space-x-4">
            <!-- User dropdown -->
            <x-main.dropdown align="right">
                <x-slot name="trigger">
                    <button class="flex items-center space-x-2 text-gray-600 hover:text-gray-900">
                        <span>{{ Auth::user()->name ?? 'Admin' }}</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                </x-slot>

                <x-main.dropdown href="#">Profile</x-main.dropdown>
                <x-main.dropdown-link href="#">Settings</x-main.dropdown-link>
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf
                    <x-main.dropdown-link href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                        Log Out
                    </x-main.dropdown-link>
                </form>
            </x-main.dropdown>
        </div> --}}
    </div>
</header>
