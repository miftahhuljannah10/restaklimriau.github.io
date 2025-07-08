<x-layouts.admin title="Dashboard" subtitle="Selamat datang di panel admin">

    {{-- Stats Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        {{-- Total Users --}}
        <x-main.cards.stat-card title="Total Users" :value="$stats['total_users']" icon="users" color="blue"
            description="Pengguna terdaftar" />

        {{-- Total Pegawai --}}
        <x-main.cards.stat-card title="Total Pegawai" :value="$stats['total_pegawai']" icon="badge-check" color="green"
            description="Pegawai aktif" />

        {{-- Total Berita --}}
        <x-main.cards.stat-card title="Total Berita" :value="$stats['total_berita']" icon="newspaper" color="purple"
            description="Berita dipublikasi" />

        {{-- Total Artikel --}}
        <x-main.cards.stat-card title="Total Artikel" :value="$stats['total_artikel']" icon="document-text" color="yellow"
            description="Artikel dipublikasi" />
    </div>

    {{-- Second Row Stats --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        {{-- Total Surat Masuk --}}
        <x-main.cards.stat-card title="Surat Masuk" :value="$stats['total_surat_masuk']" icon="inbox-in" color="indigo"
            description="Total surat masuk" />

        {{-- Total Surat Keluar --}}
        <x-main.cards.stat-card title="Surat Keluar" :value="$stats['total_surat_keluar']" icon="paper-airplane" color="red"
            description="Total surat keluar" />

        {{-- Total Buku Tamu --}}
        <x-main.cards.stat-card title="Buku Tamu" :value="$stats['total_buku_tamu']" icon="book-open" color="emerald"
            description="Total kunjungan" />
    </div>

    {{-- Content Cards --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6">
        {{-- Berita Terbaru --}}
        <x-main.cards.content-card title="Berita Terbaru" class="lg:col-span-1">
            <div class="space-y-4">
                @forelse($recent_berita as $berita)
                    <div class="flex items-start space-x-3 pb-3 border-b border-gray-100 last:border-b-0">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate">{{ $berita->judul ?? 'Tanpa Judul' }}
                            </p>
                            <p class="text-xs text-gray-500">
                                {{ $berita->created_at ? $berita->created_at->diffForHumans() : 'Tanggal tidak diketahui' }}
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-6">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                            </path>
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada berita</h3>
                        <p class="mt-1 text-sm text-gray-500">Mulai dengan membuat berita pertama Anda.</p>
                    </div>
                @endforelse
            </div>
        </x-main.cards.content-card>

        {{-- Surat Masuk Terbaru --}}
        <x-main.cards.content-card title="Surat Masuk Terbaru" class="lg:col-span-1">
            <div class="space-y-4">
                @forelse($recent_surat_masuk as $surat)
                    <div class="flex items-start space-x-3 pb-3 border-b border-gray-100 last:border-b-0">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-indigo-100 rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-indigo-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate">
                                {{ $surat->perihal ?? 'Tidak ada perihal' }}</p>
                            <p class="text-xs text-gray-500">{{ $surat->pengirim ?? 'Pengirim tidak diketahui' }}</p>
                            <p class="text-xs text-gray-500">
                                {{ $surat->tanggal_diterima ? $surat->tanggal_diterima->format('d/m/Y') : $surat->created_at->format('d/m/Y') }}
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-6">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                            </path>
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada surat masuk</h3>
                        <p class="mt-1 text-sm text-gray-500">Surat masuk akan muncul di sini.</p>
                    </div>
                @endforelse
            </div>
        </x-main.cards.content-card>

        {{-- Buku Tamu Terbaru --}}
        <x-main.cards.content-card title="Buku Tamu Terbaru" class="lg:col-span-2 xl:col-span-1">
            <div class="space-y-4">
                @forelse($recent_buku_tamu as $tamu)
                    <div class="flex items-start space-x-3 pb-3 border-b border-gray-100 last:border-b-0">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-emerald-100 rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate">
                                {{ $tamu->nama ?? 'Nama tidak diketahui' }}</p>
                            <p class="text-xs text-gray-500">{{ $tamu->instansi ?? 'Perorangan' }}</p>
                            <p class="text-xs text-gray-500">
                                {{ $tamu->created_at ? $tamu->created_at->format('d/m/Y H:i') : 'Tanggal tidak diketahui' }}
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-6">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                            </path>
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada tamu</h3>
                        <p class="mt-1 text-sm text-gray-500">Data kunjungan akan muncul di sini.</p>
                    </div>
                @endforelse
            </div>
        </x-main.cards.content-card>
    </div>

    {{-- Quick Actions --}}
    <div class="mt-8">
        <x-main.cards.content-card title="Aksi Cepat">
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
                {{-- Tambah User --}}
                <a href="{{ route('users.create') }}"
                    class="flex flex-col items-center p-4 bg-blue-50 rounded-lg hover:bg-blue-100 transition-colors group">
                    <div
                        class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z">
                            </path>
                        </svg>
                    </div>
                    <span class="mt-2 text-sm font-medium text-gray-900">Tambah User</span>
                </a>

                {{-- Tambah Pegawai --}}
                <a href="{{ route('pegawai.create') }}"
                    class="flex flex-col items-center p-4 bg-green-50 rounded-lg hover:bg-green-100 transition-colors group">
                    <div
                        class="w-10 h-10 bg-green-500 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                    <span class="mt-2 text-sm font-medium text-gray-900">Tambah Pegawai</span>
                </a>

                {{-- Tambah Berita --}}
                <a href="{{ route('admin.media.berita.create', 'berita') }}"
                    class="flex flex-col items-center p-4 bg-purple-50 rounded-lg hover:bg-purple-100 transition-colors group">
                    <div
                        class="w-10 h-10 bg-purple-500 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                            </path>
                        </svg>
                    </div>
                    <span class="mt-2 text-sm font-medium text-gray-900">Tambah Berita</span>
                </a>

                {{-- Tambah Surat Masuk --}}
                <a href="{{ route('admin.tata-usaha.surat-masuk.create') }}"
                    class="flex flex-col items-center p-4 bg-indigo-50 rounded-lg hover:bg-indigo-100 transition-colors group">
                    <div
                        class="w-10 h-10 bg-indigo-500 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                            </path>
                        </svg>
                    </div>
                    <span class="mt-2 text-sm font-medium text-gray-900">Surat Masuk</span>
                </a>

                {{-- Tambah Surat Keluar --}}
                <a href="{{ route('admin.tata-usaha.surat-keluar.create') }}"
                    class="flex flex-col items-center p-4 bg-red-50 rounded-lg hover:bg-red-100 transition-colors group">
                    <div
                        class="w-10 h-10 bg-red-500 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                        </svg>
                    </div>
                    <span class="mt-2 text-sm font-medium text-gray-900">Surat Keluar</span>
                </a>

                {{-- Tambah Buku Tamu --}}
                <a href="{{ route('admin.tata-usaha.buku-tamu.create') }}"
                    class="flex flex-col items-center p-4 bg-emerald-50 rounded-lg hover:bg-emerald-100 transition-colors group">
                    <div
                        class="w-10 h-10 bg-emerald-500 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                            </path>
                        </svg>
                    </div>
                    <span class="mt-2 text-sm font-medium text-gray-900">Buku Tamu</span>
                </a>
            </div>
        </x-main.cards.content-card>
    </div>

</x-layouts.admin>
