<x-layouts.admin title="Detail Kategori" subtitle="Informasi lengkap kategori berita dan artikel">

    {{-- Breadcrumb --}}
    <x-main.layouts.breadcrumb :items="[
        ['title' => 'Kategori Management', 'url' => route('admin.kategori-berita-artikel.index')],
        ['title' => 'Detail Kategori'],
    ]" />

    {{-- Main Content --}}
    <x-main.cards.content-card>
        <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-blue-50 to-indigo-50">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Detail Kategori: {{ $kategoriBeritaArtikel->nama }}
                    </h3>
                    <p class="text-sm text-gray-600">Informasi lengkap tentang kategori ini</p>
                </div>
                <div class="flex items-center space-x-2">
                    <x-main.buttons.action-button
                        href="{{ route('admin.kategori-berita-artikel.edit', $kategoriBeritaArtikel) }}"
                        variant="primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path
                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                        </svg>
                        Edit
                    </x-main.buttons.action-button>
                    <x-main.buttons.action-button href="{{ route('admin.kategori-berita-artikel.index') }}"
                        variant="secondary">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Kembali ke Daftar
                    </x-main.buttons.action-button>
                </div>
            </div>
        </div>

        <div class="p-6">
            {{-- Category Information --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <div class="bg-white border border-gray-200 rounded-lg p-6">
                    <div class="flex items-center mb-4">
                        <div class="flex-shrink-0">
                            <div class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-semibold text-gray-900">Nama Kategori</h4>
                            <p class="text-sm text-gray-600">Nama kategori yang digunakan</p>
                        </div>
                    </div>
                    <p class="text-xl font-medium text-gray-900">{{ $kategoriBeritaArtikel->nama }}</p>
                </div>

                <div class="bg-white border border-gray-200 rounded-lg p-6">
                    <div class="flex items-center mb-4">
                        <div class="flex-shrink-0">
                            <div class="h-10 w-10 rounded-full bg-gray-100 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M12.586 4.586a2 2 0 112.828 2.828l-3 3a2 2 0 01-2.828 0 1 1 0 00-1.414 1.414 4 4 0 005.656 0l3-3a4 4 0 00-5.656-5.656l-1.5 1.5a1 1 0 101.414 1.414l1.5-1.5zm-5 5a2 2 0 012.828 0 1 1 0 101.414-1.414 4 4 0 00-5.656 0l-3 3a4 4 0 105.656 5.656l1.5-1.5a1 1 0 10-1.414-1.414l-1.5 1.5a2 2 0 11-2.828-2.828l3-3z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-semibold text-gray-900">Slug URL</h4>
                            <p class="text-sm text-gray-600">URL yang digunakan dalam alamat</p>
                        </div>
                    </div>
                    <p class="text-xl font-mono bg-gray-50 px-3 py-2 rounded border">{{ $kategoriBeritaArtikel->slug }}
                    </p>
                </div>
            </div>

            {{-- Timestamps --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <div class="bg-white border border-gray-200 rounded-lg p-6">
                    <div class="flex items-center mb-4">
                        <div class="flex-shrink-0">
                            <div class="h-10 w-10 rounded-full bg-green-100 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-semibold text-gray-900">Tanggal Dibuat</h4>
                            <p class="text-sm text-gray-600">Kapan kategori ini pertama kali dibuat</p>
                        </div>
                    </div>
                    <div class="space-y-1">
                        <p class="text-lg font-medium text-gray-900">
                            {{ $kategoriBeritaArtikel->created_at->format('d M Y') }}</p>
                        <p class="text-sm text-gray-500">{{ $kategoriBeritaArtikel->created_at->format('H:i:s') }} WIB
                        </p>
                    </div>
                </div>

                <div class="bg-white border border-gray-200 rounded-lg p-6">
                    <div class="flex items-center mb-4">
                        <div class="flex-shrink-0">
                            <div class="h-10 w-10 rounded-full bg-yellow-100 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-600"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-semibold text-gray-900">Terakhir Diperbarui</h4>
                            <p class="text-sm text-gray-600">Terakhir kali kategori ini diubah</p>
                        </div>
                    </div>
                    <div class="space-y-1">
                        <p class="text-lg font-medium text-gray-900">
                            {{ $kategoriBeritaArtikel->updated_at->format('d M Y') }}</p>
                        <p class="text-sm text-gray-500">{{ $kategoriBeritaArtikel->updated_at->format('H:i:s') }} WIB
                        </p>
                    </div>
                </div>
            </div>

            {{-- Content Statistics --}}
            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-lg p-6">
                <div class="flex items-center mb-6">
                    <div class="flex-shrink-0">
                        <div class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h4 class="text-lg font-semibold text-gray-900">Konten Terkait</h4>
                        <p class="text-sm text-gray-600">Statistik berita dan artikel yang menggunakan kategori ini</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-white rounded-lg p-6 border border-blue-200">
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600 mr-2"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <h5 class="text-lg font-semibold text-gray-900">Berita</h5>
                                </div>
                                <p class="text-sm text-gray-600 mt-1">Total berita dalam kategori ini</p>
                            </div>
                            <div class="text-right">
                                <p class="text-3xl font-bold text-blue-600">
                                    {{ $kategoriBeritaArtikel->berita()->where('jenis', 'berita')->count() }}
                                </p>
                                <p class="text-sm text-gray-500">Artikel berita</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('admin.kategori-berita-artikel.berita', $kategoriBeritaArtikel) }}"
                                class="inline-flex items-center text-sm font-medium text-blue-600 hover:text-blue-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                    <path fill-rule="evenodd"
                                        d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                Lihat semua berita
                            </a>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg p-6 border border-green-200">
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600 mr-2"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <h5 class="text-lg font-semibold text-gray-900">Artikel</h5>
                                </div>
                                <p class="text-sm text-gray-600 mt-1">Total artikel dalam kategori ini</p>
                            </div>
                            <div class="text-right">
                                <p class="text-3xl font-bold text-green-600">
                                    {{ $kategoriBeritaArtikel->berita()->where('jenis', 'artikel')->count() }}
                                </p>
                                <p class="text-sm text-gray-500">Artikel konten</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('admin.kategori-berita-artikel.artikel', $kategoriBeritaArtikel) }}"
                                class="inline-flex items-center text-sm font-medium text-green-600 hover:text-green-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                    <path fill-rule="evenodd"
                                        d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                Lihat semua artikel
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-main.cards.content-card>

</x-layouts.admin>
