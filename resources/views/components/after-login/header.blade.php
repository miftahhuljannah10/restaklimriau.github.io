<div class="flex items-center justify-between px-6 py-4 bg-white shadow">
    <div>
        <h1 class="text-lg font-semibold text-gray-700">Selamat Datang,
           {{ auth()->user()->name }}</h1>
        <p class="text-sm text-gray-500">Panel kendali informasi dan layanan BMKG</p>
    </div>

    <div class="flex items-center gap-4">
        <i data-lucide="bell" class="w-5 h-5 text-gray-500"></i>
        <i data-lucide="moon" class="w-5 h-5 text-gray-500"></i>
        <div class="flex items-center gap-2">
            {{-- <img src="/path-to-profile.jpg" alt="Profile" class="w-8 h-8 rounded-full" /> --}}
            <span class="text-sm">{{ auth()->user()->name }}</span>
        </div>
    </div>
</div>
