{{--
    Admin Sidebar Component
    Komponen sidebar untuk admin panel dengan menu navigasi

    Props:
    - isCollapsed: Boolean untuk sidebar collapsed/expanded
    - currentRoute: Route name saat ini untuk active state
--}}

@props([
    'isCollapsed' => false,
    'currentRoute' => request()->route()->getName(),
])

{{-- Sidebar Background Fix CSS --}}
<style>
    .admin-sidebar {
        background-color: #111827 !important;
    }

    .admin-sidebar * {
        background-color: inherit !important;
    }

    .admin-sidebar li:hover,
    .admin-sidebar a:hover,
    .admin-sidebar button:hover {
        background-color: #1f2937 !important;
    }

    .admin-sidebar .bg-blue-600 {
        background-color: #2563eb !important;
    }

    .admin-sidebar .bg-blue-600:hover {
        background-color: #1d4ed8 !important;
    }

    .admin-sidebar .bg-gray-900 {
        background-color: #111827 !important;
    }

    .admin-sidebar .bg-gray-800 {
        background-color: #1f2937 !important;
    }

    .admin-sidebar [x-show],
    .admin-sidebar [x-transition] {
        background-color: transparent !important;
    }

    .admin-sidebar ul {
        background-color: inherit !important;
    }
</style>

<aside class="admin-sidebar bg-gray-900 text-white h-full transition-all duration-300 ease-in-out flex flex-col"
    :class="sidebarCollapsed ? 'w-16' : 'w-64'" x-data="{ sidebarCollapsed: {{ $isCollapsed ? 'true' : 'false' }} }">

    {{-- Sidebar Header --}}
    <div class="sidebar-header p-4 border-b border-gray-700 bg-gray-900">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 bg-blue-500 rounded-lg flex items-center justify-center flex-shrink-0">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
            </div>
            <div x-show="!sidebarCollapsed" x-transition class="overflow-hidden">
                <h2 class="text-lg font-bold text-white truncate">STAKLIM RIAU</h2>
                <p class="text-xs text-gray-400 truncate">Admin Panel</p>
            </div>
        </div>
    </div>

    {{-- Navigation Menu --}}
    <nav class="sidebar-nav flex-1 flex flex-col mt-4 bg-gray-900">
        <ul class="space-y-1 px-2 bg-gray-900">
            {{-- Dashboard - Hanya untuk role pemimpin --}}
            @if (auth()->check() && auth()->user()->role->name === 'pemimpin')
                <li class="bg-gray-900">
                    <a href="{{ route('admin.dashboard') }}"
                        class="w-full block flex items-center gap-3 px-3 py-2.5 rounded-lg transition-colors duration-200 group {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        <span x-show="!sidebarCollapsed" x-transition class="truncate bg-transparent">Dashboard</span>
                    </a>
                </li>

                {{-- Pimpinan - Hanya untuk role pemimpin --}}
                <li x-data="{ open: {{ str_contains($currentRoute, 'users') ? 'true' : 'false' }} }">
                    <button @click="open = !open"
                        class="group flex items-center w-full gap-3 px-3 py-2.5 rounded-lg transition-colors duration-200 text-gray-300 hover:bg-gray-800 hover:text-blue-500">
                        <svg class="w-5 h-5 transition-colors duration-200 group-hover:text-blue-500" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z" />
                        </svg>
                        <span x-show="!sidebarCollapsed" x-transition
                            class="flex-1 text-left group-hover:text-blue-500">Pimpinan</span>
                        <svg x-show="!sidebarCollapsed" :class="open ? 'rotate-180' : ''"
                            class="w-4 h-4 transition-transform duration-200 group-hover:text-blue-500" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <ul x-show="open && !sidebarCollapsed" x-transition class="mt-1 ml-8 space-y-1 bg-gray-900">
                        <li>
                            <a href="{{ route('users.index') }}"
                                class="block px-3 py-2 text-sm rounded-lg transition-colors duration-200 {{ request()->routeIs('users.*') ? 'bg-blue-600 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-blue-500' }}">
                                Manajemen Hak Akses
                            </a>
                        </li>
                    </ul>
                </li>
            @endif

            {{-- Produk --}}
            <li x-data="{ open: {{ str_contains($currentRoute, 'kategori-produk') || str_contains($currentRoute, 'produk') ? 'true' : 'false' }} }">
                <button @click="open = !open"
                    class="group flex items-center w-full gap-3 px-3 py-2.5 rounded-lg transition-colors duration-200 text-gray-300 hover:bg-gray-800 hover:text-blue-500">
                    <svg class="w-5 h-5 transition-colors duration-200 group-hover:text-blue-500" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                    <span x-show="!sidebarCollapsed" x-transition
                        class="flex-1 text-left group-hover:text-blue-500">Produk</span>
                    <svg x-show="!sidebarCollapsed" :class="open ? 'rotate-180' : ''"
                        class="w-4 h-4 transition-transform duration-200 group-hover:text-blue-500" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <ul x-show="open && !sidebarCollapsed" x-transition class="mt-1 ml-8 space-y-1 bg-gray-900">
                    <li>
                        <a href="{{ route('kategori-produk.index') }}"
                            class="block px-3 py-2 text-sm rounded-lg transition-colors duration-200 {{ request()->routeIs('kategori-produk.*') ? 'bg-blue-600 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-blue-500' }}">
                            Kategori Produk
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('produk.index', ['type' => 'iklim_terapan']) }}"
                            class="block px-3 py-2 text-sm rounded-lg transition-colors duration-200 {{ request()->routeIs('produk.*') && request()->get('type') == 'iklim_terapan' ? 'bg-blue-600 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-blue-500' }}">
                            Iklim Terapan
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('produk.index', ['type' => 'perubahan_iklim']) }}"
                            class="block px-3 py-2 text-sm rounded-lg transition-colors duration-200 {{ request()->routeIs('produk.*') && request()->get('type') == 'perubahan_iklim' ? 'bg-blue-600 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-blue-500' }}">
                            Perubahan Iklim
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('produk.index', ['type' => 'informasi_iklim']) }}"
                            class="block px-3 py-2 text-sm rounded-lg transition-colors duration-200 {{ request()->routeIs('produk.*') && request()->get('type') == 'informasi_iklim' ? 'bg-blue-600 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-blue-500' }}">
                            Informasi Iklim
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('produk.index', ['type' => 'kualitas_udara']) }}"
                            class="block px-3 py-2 text-sm rounded-lg transition-colors duration-200 {{ request()->routeIs('produk.*') && request()->get('type') == 'kualitas_udara' ? 'bg-blue-600 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-blue-500' }}">
                            Kualitas Udara
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('produk.index', ['type' => 'cuaca']) }}"
                            class="block px-3 py-2 text-sm rounded-lg transition-colors duration-200 {{ request()->routeIs('produk.*') && request()->get('type') == 'cuaca' ? 'bg-blue-600 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-blue-500' }}">
                            Cuaca
                        </a>
                    </li>
                </ul>
            </li>

            {{-- Instrumentasi --}}
            <li x-data="{ open: {{ str_contains($currentRoute, 'metadata-alat') || str_contains($currentRoute, 'kecamatan') || str_contains($currentRoute, 'alat-curah-hujan') ? 'true' : 'false' }} }">
                <button @click="open = !open"
                    class="group flex items-center w-full gap-3 px-3 py-2.5 rounded-lg transition-colors duration-200 text-gray-300 hover:bg-gray-800 hover:text-blue-500">
                    <svg class="w-5 h-5 transition-colors duration-200 group-hover:text-blue-500" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <span x-show="!sidebarCollapsed" x-transition
                        class="flex-1 text-left group-hover:text-blue-500">Instrumentasi</span>
                    <svg x-show="!sidebarCollapsed" :class="open ? 'rotate-180' : ''"
                        class="w-4 h-4 transition-transform duration-200 group-hover:text-blue-500" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <ul x-show="open && !sidebarCollapsed" x-transition class="mt-1 ml-8 space-y-1 bg-gray-900">
                    <li>
                        <a href="{{ route('metadata-alat.index') }}"
                            class="block px-3 py-2 text-sm rounded-lg transition-colors duration-200 {{ request()->routeIs('metadata-alat.*') ? 'bg-blue-600 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-blue-500' }}">
                            Metadata Alat
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('kecamatan.index') }}"
                            class="block px-3 py-2 text-sm rounded-lg transition-colors duration-200 {{ request()->routeIs('kecamatan.*') ? 'bg-blue-600 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-blue-500' }}">
                            Wilayah Administrasi
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.alat-curah-hujan.index') }}"
                            class="block px-3 py-2 text-sm rounded-lg transition-colors duration-200 {{ request()->routeIs('admin.alat-curah-hujan.*') ? 'bg-blue-600 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-blue-500' }}">
                            Alat Curah Hujan
                        </a>
                    </li>
                </ul>
            </li>

            {{-- Layanan Publik --}}
            <li x-data="{ open: {{ str_contains($currentRoute, 'url') || str_contains($currentRoute, 'tarif-pnbp') ? 'true' : 'false' }} }">
                <button @click="open = !open"
                    class="group flex items-center w-full gap-3 px-3 py-2.5 rounded-lg transition-colors duration-200 text-gray-300 hover:bg-gray-800 hover:text-blue-500">
                    <svg class="w-5 h-5 transition-colors duration-200 group-hover:text-blue-500" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <span x-show="!sidebarCollapsed" x-transition class="truncate flex-1 text-left">Layanan
                        Publik</span>
                    <svg x-show="!sidebarCollapsed" :class="open ? 'rotate-180' : ''"
                        class="w-4 h-4 transition-transform duration-200" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <ul x-show="open && !sidebarCollapsed" x-transition class="mt-1 ml-8 space-y-1 bg-gray-900">
                    <li>
                        <a href="{{ route('url.index', 'survey') }}"
                            class="block px-3 py-2 text-sm rounded-lg transition-colors duration-200 {{ request()->routeIs('url.*') && request()->segment(3) == 'survey' ? 'bg-blue-600 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-blue-500' }}">
                            Link Survey
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('url.index', 'nol_rupiah') }}"
                            class="block px-3 py-2 text-sm rounded-lg transition-colors duration-200 {{ request()->routeIs('url.*') && request()->segment(3) == 'nol_rupiah' ? 'bg-blue-600 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-blue-500' }}">
                            Nol Rupiah
                        </a>
                    </li>
                    {{-- google form --}}
                    <li>
                        <a href="{{ route('url.index', 'google_form') }}"
                            class="block px-3 py-2 text-sm rounded-lg transition-colors duration-200 {{ request()->routeIs('url.*') && request()->segment(3) == 'google_form' ? 'bg-blue-600 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-blue-500' }}">
                            Google Form
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('tarif-pnbp.index') }}"
                            class="block px-3 py-2 text-sm rounded-lg transition-colors duration-200 {{ request()->routeIs('tarif-pnbp.*') ? 'bg-blue-600 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-blue-500' }}">
                            Tarif PNBP
                        </a>
                    </li>
                </ul>
            </li>

            {{-- Feedback --}}
            <li x-data="{ open: {{ str_contains($currentRoute, 'feedback') ? 'true' : 'false' }} }">
                <button @click="open = !open"
                    class="group flex items-center w-full gap-3 px-3 py-2.5 rounded-lg transition-colors duration-200 text-gray-300 hover:bg-gray-800 hover:text-blue-500">
                    <svg class="w-5 h-5 transition-colors duration-200 group-hover:text-blue-500" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                    <span x-show="!sidebarCollapsed" x-transition class="truncate flex-1 text-left">Feedback</span>
                    <svg x-show="!sidebarCollapsed" :class="open ? 'rotate-180' : ''"
                        class="w-4 h-4 transition-transform duration-200" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <ul x-show="open && !sidebarCollapsed" x-transition class="mt-1 ml-8 space-y-1 bg-gray-900">
                    <li>
                        <a href="{{ route('admin.feedback.questions.index') }}"
                            class="block px-3 py-2 text-sm rounded-lg transition-colors duration-200 {{ request()->routeIs('admin.feedback.questions.*') ? 'bg-blue-600 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-blue-500' }}">
                            Pertanyaan
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.feedback.responses.index') }}"
                            class="block px-3 py-2 text-sm rounded-lg transition-colors duration-200 {{ request()->routeIs('admin.feedback.responses.*') ? 'bg-blue-600 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-blue-500' }}">
                            Respon
                        </a>
                    </li>
                </ul>
            </li>

            {{-- Tata Usaha --}}
            <li x-data="{ open: {{ str_contains($currentRoute, 'pegawai') || str_contains($currentRoute, 'buku-tamu') || str_contains($currentRoute, 'surat-masuk') || str_contains($currentRoute, 'surat-keluar') || str_contains($currentRoute, 'klasifikasi-surat') ? 'true' : 'false' }} }">
                <button @click="open = !open"
                    class="group flex items-center w-full gap-3 px-3 py-2.5 rounded-lg transition-colors duration-200 text-gray-300 hover:bg-gray-800 hover:text-blue-500">
                    <svg class="w-5 h-5 transition-colors duration-200 group-hover:text-blue-500" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                    <span x-show="!sidebarCollapsed" x-transition class="truncate flex-1 text-left">Tata Usaha</span>
                    <svg x-show="!sidebarCollapsed" :class="open ? 'rotate-180' : ''"
                        class="w-4 h-4 transition-transform duration-200" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <ul x-show="open && !sidebarCollapsed" x-transition class="mt-1 ml-8 space-y-1 bg-gray-900">
                    <li>
                        <a href="{{ route('pegawai.index') }}"
                            class="block px-3 py-2 text-sm rounded-lg transition-colors duration-200 {{ request()->routeIs('pegawai.*') ? 'bg-blue-600 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-blue-500' }}">
                            Data Kepegawaian
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="block px-3 py-2 text-sm rounded-lg transition-colors duration-200 text-gray-400 hover:bg-gray-800 hover:text-blue-500">
                            Rapat
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.tata-usaha.buku-tamu.index') }}"
                            class="block px-3 py-2 text-sm rounded-lg transition-colors duration-200 {{ request()->routeIs('admin.tata-usaha.buku-tamu.*') ? 'bg-blue-600 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-blue-500' }}">
                            Buku Tamu
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.tata-usaha.surat-masuk.index') }}"
                            class="block px-3 py-2 text-sm rounded-lg transition-colors duration-200 {{ request()->routeIs('admin.tata-usaha.surat-masuk.*') ? 'bg-blue-600 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-blue-500' }}">
                            Surat Masuk
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.tata-usaha.surat-keluar.index') }}"
                            class="block px-3 py-2 text-sm rounded-lg transition-colors duration-200 {{ request()->routeIs('admin.tata-usaha.surat-keluar.*') ? 'bg-blue-600 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-blue-500' }}">
                            Surat Keluar
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.tata-usaha.klasifikasi-surat.index') }}"
                            class="block px-3 py-2 text-sm rounded-lg transition-colors duration-200 {{ request()->routeIs('admin.tata-usaha.klasifikasi-surat.*') ? 'bg-blue-600 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-blue-500' }}">
                            Klasifikasi Surat
                        </a>
                    </li>
                </ul>
            </li>

            {{-- Media --}}
            <li x-data="{ open: {{ str_contains($currentRoute, 'kategori-berita') || str_contains($currentRoute, 'media.berita') || str_contains($currentRoute, 'media.buletin') ? 'true' : 'false' }} }">
                <button @click="open = !open"
                    class="group flex items-center w-full gap-3 px-3 py-2.5 rounded-lg transition-colors duration-200 text-gray-300 hover:bg-gray-800 hover:text-blue-500">
                    <svg class="w-5 h-5 transition-colors duration-200 group-hover:text-blue-500" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H15" />
                    </svg>
                    <span x-show="!sidebarCollapsed" x-transition class="truncate flex-1 text-left">Media</span>
                    <svg x-show="!sidebarCollapsed" :class="open ? 'rotate-180' : ''"
                        class="w-4 h-4 transition-transform duration-200" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <ul x-show="open && !sidebarCollapsed" x-transition class="mt-1 ml-8 space-y-1 bg-gray-900">
                    <li>
                        <a href="{{ route('admin.kategori-berita-artikel.index') }}"
                            class="block px-3 py-2 text-sm rounded-lg transition-colors duration-200 {{ request()->routeIs('admin.kategori-berita-artikel.*') ? 'bg-blue-600 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-blue-500' }}">
                            Kategori Berita & Artikel
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.media.berita.index', 'berita') }}"
                            class="block px-3 py-2 text-sm rounded-lg transition-colors duration-200 {{ request()->routeIs('admin.media.berita.*') && request()->segment(3) == 'berita' ? 'bg-blue-600 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-blue-500' }}">
                            Berita
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.media.berita.index', 'artikel') }}"
                            class="block px-3 py-2 text-sm rounded-lg transition-colors duration-200 {{ request()->routeIs('admin.media.berita.*') && request()->segment(3) == 'artikel' ? 'bg-blue-600 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-blue-500' }}">
                            Artikel
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.media.buletin.index') }}"
                            class="block px-3 py-2 text-sm rounded-lg transition-colors duration-200 {{ request()->routeIs('admin.media.buletin.*') ? 'bg-blue-600 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-blue-500' }}">
                            Buletin
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="block px-3 py-2 text-sm rounded-lg transition-colors duration-200 text-gray-400 hover:bg-gray-800 hover:text-blue-500">
                            Profile Perusahaan
                        </a>
                    </li>
                </ul>
            </li>
            <li x-data="{ open: {{ str_contains($currentRoute, 'kontak') ? 'true' : 'false' }} }">
                <button @click="open = !open"
                    class="group flex items-center w-full gap-3 px-3 py-2.5 rounded-lg transition-colors duration-200 text-gray-300 hover:bg-gray-800 hover:text-blue-500">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 5a2 2 0 012-2h4a2 2 0 012 2v2H8V5z" />
                    </svg>
                    <span x-show="!sidebarCollapsed" x-transition class="truncate flex-1 text-left">Profil
                        Perusahaan</span>
                    <svg x-show="!sidebarCollapsed" :class="open ? 'rotate-180' : ''"
                        class="w-4 h-4 transition-transform duration-200" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <ul x-show="open && !sidebarCollapsed" x-transition class="mt-1 ml-8 space-y-1 bg-gray-900">
                    <li>
                        <a href="{{ route('admin.kontak.index') }}"
                            class="block px-3 py-2 text-sm rounded-lg transition-colors duration-200 {{ request()->routeIs('admin.kontak.*') ? 'bg-blue-600 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-blue-500' }}">
                            Kontak Perusahaan
                        </a>
                    </li>
                </ul>
                {{-- visi misi --}}
                <ul x-show="open && !sidebarCollapsed" x-transition class="mt-1 ml-8 space-y-1 bg-gray-900">
                    <li>
                        <a href="{{ route('admin.visimisi.index') }}"
                            class="block px-3 py-2 text-sm rounded-lg transition-colors duration-200 {{ request()->routeIs('admin.visimisi.*') ? 'bg-blue-600 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-blue-500' }}">
                            Visi Misi
                        </a>
                    </li>
                </ul>

            </li>

            {{-- Divider --}}
            <li class="my-4">
                <hr class="border-gray-700">
            </li>
        </ul>
    </nav>

    {{-- Bottom Section (Profile, Logout) --}}
    <div class="mt-auto bg-gray-900">
        <ul class="space-y-1 px-2 pb-2 bg-gray-900">
            {{-- User Profile --}}
            <li class="bg-gray-900">
                <a href="#"
                    class="group flex items-center gap-3 px-3 py-2.5 rounded-lg transition-colors duration-200 text-gray-300 hover:bg-gray-800 hover:text-blue-500">
                    <svg class="w-5 h-5 transition-colors duration-200 group-hover:text-blue-500" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <span x-show="!sidebarCollapsed" x-transition class="truncate">Profile</span>
                </a>
            </li>

            {{-- Logout --}}
            <li class="bg-gray-900">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full group flex items-center gap-3 px-3 py-2.5 rounded-lg transition-colors duration-200 text-gray-300 hover:bg-gray-800 hover:text-red-500">
                        <svg class="w-5 h-5 transition-colors duration-200 group-hover:text-red-500" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        <span x-show="!sidebarCollapsed" x-transition class="truncate">Logout</span>
                    </button>
                </form>
            </li>
        </ul>
    </div>

    {{-- Sidebar Toggle Button --}}
    <div class="p-4 border-t border-gray-700 bg-gray-900">
        <button @click="sidebarCollapsed = !sidebarCollapsed"
            class="w-full group flex items-center justify-center p-2 rounded-lg transition-colors duration-200 text-gray-300 hover:bg-gray-800 hover:text-blue-500">
            <svg :class="sidebarCollapsed ? 'rotate-180' : ''" class="w-5 h-5 transition-transform duration-200"
                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
            </svg>
        </button>
    </div>
</aside>
