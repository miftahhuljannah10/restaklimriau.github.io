<x-layouts.admin title="Beranda Pegawai" subtitle="Selamat datang di panel admin, {{ auth()->user()->name }}">
    {{-- Flash Messages --}}
    <x-main.alerts.flash-message />
    <x-main.alerts.validation-errors />

    {{-- Stats Overview --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl shadow-lg overflow-hidden">
            <div class="p-4">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-white text-sm font-medium opacity-80">Surat Masuk</p>
                        <h3 class="text-white text-2xl font-bold mt-1">{{ \App\Models\SuratMasuk::count() }}</h3>
                    </div>
                    <div class="bg-white/20 p-3 rounded-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-xl shadow-lg overflow-hidden">
            <div class="p-4">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-white text-sm font-medium opacity-80">Surat Keluar</p>
                        <h3 class="text-white text-2xl font-bold mt-1">{{ \App\Models\SuratKeluar::count() }}</h3>
                    </div>
                    <div class="bg-white/20 p-3 rounded-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-violet-500 to-violet-600 rounded-xl shadow-lg overflow-hidden">
            <div class="p-4">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-white text-sm font-medium opacity-80">Berita</p>
                        <h3 class="text-white text-2xl font-bold mt-1">{{ \App\Models\BeritaArtikel::count() }}</h3>
                    </div>
                    <div class="bg-white/20 p-3 rounded-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H15" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-amber-500 to-amber-600 rounded-xl shadow-lg overflow-hidden">
            <div class="p-4">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-white text-sm font-medium opacity-80">Alat</p>
                        <h3 class="text-white text-2xl font-bold mt-1">{{ \App\Models\Alat::count() }}</h3>
                    </div>
                    <div class="bg-white/20 p-3 rounded-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- User Profile Card --}}
        <div class="lg:col-span-1">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-6">
                <div class="relative h-32 bg-gradient-to-r from-blue-600 to-blue-800">
                    <div class="absolute -bottom-12 left-6">
                        <div class="w-24 h-24 bg-white rounded-xl shadow-lg p-1">
                            <div class="w-full h-full bg-gray-200 rounded-lg flex items-center justify-center">
                                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pt-16 p-6">
                    <h2 class="text-2xl font-bold text-gray-800">{{ $user->name }}</h2>
                    <p class="text-gray-500 mb-4">{{ $user->email }}</p>

                    <div class="border-t border-gray-100 pt-4">
                        <div class="flex items-center mb-3">
                            <svg class="w-5 h-5 text-gray-500 mr-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                            <span class="font-medium text-gray-600">Role:</span>
                            <span
                                class="ml-2 px-2 py-1 text-sm bg-blue-100 text-blue-800 rounded-full">{{ $user->role->name ?? 'Tidak terdefinisi' }}</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-gray-500 mr-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="font-medium text-gray-600">Login Terakhir:</span>
                            <span
                                class="ml-2 text-sm text-gray-500">{{ \Carbon\Carbon::parse($lastActivity)->locale('id')->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="lg:col-span-2">
            {{-- Quick Access Cards --}}
            <div class="bg-white rounded-xl shadow-lg p-6 mb-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Akses Cepat</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <a href="{{ route('admin.tata-usaha.surat-masuk.index') }}"
                        class="flex items-center p-4 bg-blue-50 rounded-lg hover:bg-blue-100 transition-colors">
                        <div class="bg-blue-100 p-3 rounded-lg">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-medium text-gray-800">Surat Masuk</h3>
                            <p class="text-sm text-gray-600">Kelola surat masuk</p>
                        </div>
                        <svg class="w-5 h-5 text-gray-400 ml-auto" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>

                    <a href="{{ route('admin.tata-usaha.surat-keluar.index') }}"
                        class="flex items-center p-4 bg-emerald-50 rounded-lg hover:bg-emerald-100 transition-colors">
                        <div class="bg-emerald-100 p-3 rounded-lg">
                            <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-medium text-gray-800">Surat Keluar</h3>
                            <p class="text-sm text-gray-600">Kelola surat keluar</p>
                        </div>
                        <svg class="w-5 h-5 text-gray-400 ml-auto" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>

                    <a href="{{ route('admin.media.berita.index', 'berita') }}"
                        class="flex items-center p-4 bg-violet-50 rounded-lg hover:bg-violet-100 transition-colors">
                        <div class="bg-violet-100 p-3 rounded-lg">
                            <svg class="w-6 h-6 text-violet-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H15" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-medium text-gray-800">Berita & Artikel</h3>
                            <p class="text-sm text-gray-600">Kelola konten</p>
                        </div>
                        <svg class="w-5 h-5 text-gray-400 ml-auto" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>

                    <a href="#"
                        class="flex items-center p-4 bg-amber-50 rounded-lg hover:bg-amber-100 transition-colors">
                        <div class="bg-amber-100 p-3 rounded-lg">
                            <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-medium text-gray-800">Alat</h3>
                            <p class="text-sm text-gray-600">Kelola peralatan</p>
                        </div>
                        <svg class="w-5 h-5 text-gray-400 ml-auto" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>

            {{-- Recent Activity --}}
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-bold text-gray-800">Aktivitas Terbaru</h2>
                    <span
                        class="text-sm text-gray-500">{{ now()->locale('id')->isoFormat('dddd, D MMMM YYYY') }}</span>
                </div>

                <div class="space-y-4">
                    <div class="flex items-center gap-4 p-4 bg-blue-50 rounded-lg border border-blue-100">
                        <div class="flex-shrink-0 w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-900">Login Terakhir</p>
                            <p class="text-sm text-gray-600">
                                {{ \Carbon\Carbon::parse($lastActivity)->locale('id')->isoFormat('dddd, D MMMM YYYY - HH:mm') }}
                            </p>
                            <p class="text-xs text-gray-500 mt-1">
                                {{ \Carbon\Carbon::parse($lastActivity)->locale('id')->diffForHumans() }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin>
