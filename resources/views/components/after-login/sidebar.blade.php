<div x-data="{ collapsed: false }" :class="collapsed ? 'w-16' : 'w-64'"
    class="bg-white shadow-lg h-full hidden lg:block fixed lg:static z-40 rounded-r-2xl border-r border-gray-200 transition-all duration-300 overflow-y-auto">

    <!-- Header Logo dengan tombol collapse -->
    <div class="p-6 bg-gradient-to-r from-blue-600 to-blue-500 rounded-tr-2xl flex flex-col items-center mb-4 relative">
        <!-- Tombol Collapse/Expand -->
        <button @click="collapsed = !collapsed"
            class="absolute top-3 right-3 bg-white/20 hover:bg-white/30 text-white rounded-lg p-2 focus:outline-none transition-all duration-200">
            <svg x-show="!collapsed" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-6-7 6-7" />
            </svg>
            <svg x-show="collapsed" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l6 7-6 7" />
            </svg>
        </button>

        <img src="/images/logo-staklim.png" alt="Logo" class="h-12 mb-2 rounded-lg shadow" />
        {{-- <span x-show="!collapsed" class="font-bold text-base tracking-wide text-white transition-all duration-200">STAKLIM RIAU</span> --}}
    </div>

    <!-- Navigation Menu -->
    <nav class="px-3 pb-4 text-sm">
        <ul class="space-y-1">
            <!-- Dashboard -->
            <li>
                <a href="#" class="flex items-center gap-3 px-4 py-2 rounded-lg transition-colors duration-150 cursor-pointer text-gray-700 hover:bg-blue-50 hover:text-blue-700">
                    <i data-lucide="layout-dashboard" class="w-5 h-5 flex-shrink-0"></i>
                    <span x-show="!collapsed" class="transition-all duration-200">Dashboard</span>
                </a>
            </li>

            <!-- Section: Pimpinan -->
            <li x-show="!collapsed" class="text-xs text-gray-500 uppercase px-3 mt-6 mb-2 font-semibold tracking-wider">Pimpinan</li>
            <li>
                <a href="{{ route('users.index') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg transition-colors duration-150 cursor-pointer {{ request()->routeIs('users.*') ? 'bg-blue-600 text-white' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700' }}">
                    <i data-lucide="users" class="w-5 h-5 flex-shrink-0"></i>
                    <span x-show="!collapsed" class="transition-all duration-200">Manajemen Hak Akses</span>
                </a>
            </li>

            <!-- Section: Produk -->
            <li x-show="!collapsed" class="text-xs text-gray-500 uppercase px-3 mt-6 mb-2 font-semibold tracking-wider">Produk</li>
            <li>
                <a href="{{ route('kategori-produk.index') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg transition-colors duration-150 cursor-pointer {{ request()->routeIs('kategori-produk.*') ? 'bg-blue-600 text-white' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700' }}">
                    <i data-lucide="folder" class="w-5 h-5 flex-shrink-0"></i>
                    <span x-show="!collapsed" class="transition-all duration-200">Kategori Produk</span>
                </a>
            </li>
            <li>
                <a href="{{ route('produk.index', ['type' => 'iklim_terapan']) }}" class="flex items-center gap-3 px-4 py-2 rounded-lg transition-colors duration-150 cursor-pointer {{ request()->routeIs('produk.*') && request()->get('type') == 'iklim_terapan' ? 'bg-blue-600 text-white' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700' }}">
                    <i data-lucide="cloud" class="w-5 h-5 flex-shrink-0"></i>
                    <span x-show="!collapsed" class="transition-all duration-200">Iklim Terapan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('produk.index', ['type' => 'perubahan_iklim']) }}" class="flex items-center gap-3 px-4 py-2 rounded-lg transition-colors duration-150 cursor-pointer {{ request()->routeIs('produk.*') && request()->get('type') == 'perubahan_iklim' ? 'bg-blue-600 text-white' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700' }}">
                    <i data-lucide="sun" class="w-5 h-5 flex-shrink-0"></i>
                    <span x-show="!collapsed" class="transition-all duration-200">Perubahan Iklim</span>
                </a>
            </li>
            <li>
                <a href="{{ route('produk.index', ['type' => 'informasi_iklim']) }}" class="flex items-center gap-3 px-4 py-2 rounded-lg transition-colors duration-150 cursor-pointer {{ request()->routeIs('produk.*') && request()->get('type') == 'informasi_iklim' ? 'bg-blue-600 text-white' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700' }}">
                    <i data-lucide="info" class="w-5 h-5 flex-shrink-0"></i>
                    <span x-show="!collapsed" class="transition-all duration-200">Informasi Iklim</span>
                </a>
            </li>
            <li>
                <a href="{{ route('produk.index', ['type' => 'kualitas_udara']) }}" class="flex items-center gap-3 px-4 py-2 rounded-lg transition-colors duration-150 cursor-pointer {{ request()->routeIs('produk.*') && request()->get('type') == 'kualitas_udara' ? 'bg-blue-600 text-white' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700' }}">
                    <i data-lucide="wind" class="w-5 h-5 flex-shrink-0"></i>
                    <span x-show="!collapsed" class="transition-all duration-200">Kualitas Udara</span>
                </a>
            </li>
            <li>
                <a href="{{ route('produk.index', ['type' => 'cuaca']) }}" class="flex items-center gap-3 px-4 py-2 rounded-lg transition-colors duration-150 cursor-pointer {{ request()->routeIs('produk.*') && request()->get('type') == 'cuaca' ? 'bg-blue-600 text-white' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700' }}">
                    <i data-lucide="cloud-rain" class="w-5 h-5 flex-shrink-0"></i>
                    <span x-show="!collapsed" class="transition-all duration-200">Cuaca</span>
                </a>
            </li>

            <!-- Section: Instrumentasi -->
            <li x-show="!collapsed" class="text-xs text-gray-500 uppercase px-3 mt-6 mb-2 font-semibold tracking-wider">Instrumentasi</li>
            <li>
                <a href="{{ route('metadata-alat.index') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg transition-colors duration-150 cursor-pointer {{ request()->routeIs('metadata-alat.*') ? 'bg-blue-600 text-white' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700' }}">
                    <i data-lucide="thermometer" class="w-5 h-5 flex-shrink-0"></i>
                    <span x-show="!collapsed" class="transition-all duration-200">Metadata Alat</span>
                </a>
            </li>
            <li>
                <a href="{{ route('kecamatan.index') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg transition-colors duration-150 cursor-pointer {{ request()->routeIs('kecamatan.*') ? 'bg-blue-600 text-white' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700' }}">
                    <i data-lucide="map" class="w-5 h-5 flex-shrink-0"></i>
                    <span x-show="!collapsed" class="transition-all duration-200">Wilayah Administrasi</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.alat-curah-hujan.index') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg transition-colors duration-150 cursor-pointer {{ request()->routeIs('admin.alat-curah-hujan.*') ? 'bg-blue-600 text-white' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700' }}">
                    <i data-lucide="cloud-rain" class="w-5 h-5 flex-shrink-0"></i>
                    <span x-show="!collapsed" class="transition-all duration-200">Alat Curah Hujan</span>
                </a>
            </li>

            <!-- Section: Layanan Publik -->
            <li x-show="!collapsed" class="text-xs text-gray-500 uppercase px-3 mt-6 mb-2 font-semibold tracking-wider">Layanan Publik</li>
            <li>
                <a href="{{ route('url.index', 'survey') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg transition-colors duration-150 cursor-pointer {{ request()->routeIs('url.*') && request()->segment(3) == 'survey' ? 'bg-blue-600 text-white' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700' }}">
                    <i data-lucide="link" class="w-5 h-5 flex-shrink-0"></i>
                    <span x-show="!collapsed" class="transition-all duration-200">Link Survey</span>
                </a>
            </li>
            <li>
                <a href="{{ route('url.index', 'nol_rupiah') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg transition-colors duration-150 cursor-pointer {{ request()->routeIs('url.*') && request()->segment(3) == 'nol_rupiah' ? 'bg-blue-600 text-white' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700' }}">
                    <i data-lucide="dollar-sign" class="w-5 h-5 flex-shrink-0"></i>
                    <span x-show="!collapsed" class="transition-all duration-200">Nol Rupiah</span>
                </a>
            </li>
            <li>
                <a href="{{ route('tarif-pnbp.index') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg transition-colors duration-150 cursor-pointer {{ request()->routeIs('tarif-pnbp.*') ? 'bg-blue-600 text-white' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700' }}">
                    <i data-lucide="receipt-text" class="w-5 h-5 flex-shrink-0"></i>
                    <span x-show="!collapsed" class="transition-all duration-200">Tarif PNBP</span>
                </a>
            </li>

            <!-- Section: Feedback -->
            <li x-show="!collapsed" class="text-xs text-gray-500 uppercase px-3 mt-6 mb-2 font-semibold tracking-wider">Feedback</li>
            <li>
                <a href="{{ route('admin.feedback.questions.index') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg transition-colors duration-150 cursor-pointer {{ request()->routeIs('admin.feedback.questions.*') ? 'bg-blue-600 text-white' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700' }}">
                    <i data-lucide="message-square" class="w-5 h-5 flex-shrink-0"></i>
                    <span x-show="!collapsed" class="transition-all duration-200">Pertanyaan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.feedback.responses.index') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg transition-colors duration-150 cursor-pointer {{ request()->routeIs('admin.feedback.responses.*') ? 'bg-blue-600 text-white' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700' }}">
                    <i data-lucide="message-circle" class="w-5 h-5 flex-shrink-0"></i>
                    <span x-show="!collapsed" class="transition-all duration-200">Respon</span>
                </a>
            </li>

            <!-- Section: Tata Usaha -->
            <li x-show="!collapsed" class="text-xs text-gray-500 uppercase px-3 mt-6 mb-2 font-semibold tracking-wider">Tata Usaha</li>
            <li>
                <a href="{{ route('pegawai.index') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg transition-colors duration-150 cursor-pointer {{ request()->routeIs('pegawai.*') ? 'bg-blue-600 text-white' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700' }}">
                    <i data-lucide="user" class="w-5 h-5 flex-shrink-0"></i>
                    <span x-show="!collapsed" class="transition-all duration-200">Data Kepegawaian</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center gap-3 px-4 py-2 rounded-lg transition-colors duration-150 cursor-pointer text-gray-700 hover:bg-blue-50 hover:text-blue-700">
                    <i data-lucide="calendar" class="w-5 h-5 flex-shrink-0"></i>
                    <span x-show="!collapsed" class="transition-all duration-200">Rapat</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.tata-usaha.buku-tamu.index') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg transition-colors duration-150 cursor-pointer {{ request()->routeIs('admin.tata-usaha.buku-tamu.*') ? 'bg-blue-600 text-white' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700' }}">
                    <i data-lucide="book-open" class="w-5 h-5 flex-shrink-0"></i>
                    <span x-show="!collapsed" class="transition-all duration-200">Buku Tamu</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.tata-usaha.surat-masuk.index') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg transition-colors duration-150 cursor-pointer {{ request()->routeIs('admin.tata-usaha.surat-masuk.*') ? 'bg-blue-600 text-white' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700' }}">
                    <i data-lucide="inbox" class="w-5 h-5 flex-shrink-0"></i>
                    <span x-show="!collapsed" class="transition-all duration-200">Surat Masuk</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.tata-usaha.surat-keluar.index') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg transition-colors duration-150 cursor-pointer {{ request()->routeIs('admin.tata-usaha.surat-keluar.*') ? 'bg-blue-600 text-white' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700' }}">
                    <i data-lucide="send" class="w-5 h-5 flex-shrink-0"></i>
                    <span x-show="!collapsed" class="transition-all duration-200">Surat Keluar</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.tata-usaha.klasifikasi-surat.index') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg transition-colors duration-150 cursor-pointer {{ request()->routeIs('admin.tata-usaha.klasifikasi-surat.*') ? 'bg-blue-600 text-white' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700' }}">
                    <i data-lucide="file-text" class="w-5 h-5 flex-shrink-0"></i>
                    <span x-show="!collapsed" class="transition-all duration-200">Klasifikasi Surat</span>
                </a>
            </li>

            <!-- Section: Media -->
            <li x-show="!collapsed" class="text-xs text-gray-500 uppercase px-3 mt-6 mb-2 font-semibold tracking-wider">Media</li>
            <li>
                <a href="{{ route('admin.kategori-berita-artikel.index') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg transition-colors duration-150 cursor-pointer {{ request()->routeIs('admin.kategori-berita-artikel.*') ? 'bg-blue-600 text-white' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700' }}">
                    <i data-lucide="folder" class="w-5 h-5 flex-shrink-0"></i>
                    <span x-show="!collapsed" class="transition-all duration-200">Kategori Berita & Artikel</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.media.berita.index', 'berita') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg transition-colors duration-150 cursor-pointer {{ request()->routeIs('admin.media.berita.*') && request()->segment(3) == 'berita' ? 'bg-blue-600 text-white' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700' }}">
                    <i data-lucide="newspaper" class="w-5 h-5 flex-shrink-0"></i>
                    <span x-show="!collapsed" class="transition-all duration-200">Berita</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.media.berita.index', 'artikel') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg transition-colors duration-150 cursor-pointer {{ request()->routeIs('admin.media.berita.*') && request()->segment(3) == 'artikel' ? 'bg-blue-600 text-white' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700' }}">
                    <i data-lucide="file-text" class="w-5 h-5 flex-shrink-0"></i>
                    <span x-show="!collapsed" class="transition-all duration-200">Artikel</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.media.buletin.index') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg transition-colors duration-150 cursor-pointer {{ request()->routeIs('admin.media.buletin.*') ? 'bg-blue-600 text-white' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700' }}">
                    <i data-lucide="book" class="w-5 h-5 flex-shrink-0"></i>
                    <span x-show="!collapsed" class="transition-all duration-200">Buletin</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center gap-3 px-4 py-2 rounded-lg transition-colors duration-150 cursor-pointer text-gray-700 hover:bg-blue-50 hover:text-blue-700">
                    <i data-lucide="file-text" class="w-5 h-5 flex-shrink-0"></i>
                    <span x-show="!collapsed" class="transition-all duration-200">Profile Perusahaan</span>
                </a>
            </li>

            <!-- Section: Profile -->
            <li x-show="!collapsed" class="text-xs text-gray-500 uppercase px-3 mt-6 mb-2 font-semibold tracking-wider">Profile</li>
            <li>
                <a href="#" class="flex items-center gap-3 px-4 py-2 rounded-lg transition-colors duration-150 cursor-pointer text-gray-700 hover:bg-blue-50 hover:text-blue-700">
                    <i data-lucide="user" class="w-5 h-5 flex-shrink-0"></i>
                    <span x-show="!collapsed" class="transition-all duration-200">Profile</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center gap-3 px-4 py-2 rounded-lg transition-colors duration-150 cursor-pointer text-gray-700 hover:bg-blue-50 hover:text-blue-700">
                    <i data-lucide="log-out" class="w-5 h-5 flex-shrink-0"></i>
                    <span x-show="!collapsed" class="transition-all duration-200">Logout</span>
                </a>
            </li>
        </ul>
    </nav>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        lucide.createIcons();
    });
</script>
