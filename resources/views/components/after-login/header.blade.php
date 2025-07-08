<div x-data="{ sidebarOpen: false }" class="flex items-center justify-between px-6 py-4 bg-white shadow relative">
    <!-- Hamburger for mobile -->
    <button @click="sidebarOpen = !sidebarOpen" class="lg:hidden mr-4 focus:outline-none">
        <svg class="w-7 h-7 text-gray-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>
    <div>
        <h1 class="text-lg font-semibold text-gray-700">Selamat Datang,
            {{ auth()->check() ? auth()->user()->name : 'Tamu' }}</h1>
        <p class="text-sm text-gray-500">Panel kendali informasi dan layanan BMKG</p>
    </div>
    <div class="flex items-center gap-4">
        <i data-lucide="bell" class="w-5 h-5 text-gray-500"></i>
        <i data-lucide="moon" class="w-5 h-5 text-gray-500"></i>
        <div class="flex items-center gap-2">
            <span class="text-sm">{{ auth()->check() ? auth()->user()->name : 'Tamu' }}</span>
        </div>
    </div>
    <!-- Overlay for mobile sidebar -->
    <div x-show="sidebarOpen" class="fixed inset-0 bg-black bg-opacity-40 z-30 lg:hidden" @click="sidebarOpen = false"
        x-transition.opacity>
    </div>
    <!-- Sidebar mobile -->
    <div x-show="sidebarOpen"
        class="fixed inset-y-0 left-0 w-64 bg-white shadow-lg z-40 transform transition-transform duration-200 lg:hidden"
        x-transition:enter="transition ease-out duration-200" x-transition:enter-start="-translate-x-full"
        x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full">
        @include('components.after-login.sidebar-mobile')
    </div>
</div>
