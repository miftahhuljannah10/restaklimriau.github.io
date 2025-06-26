@extends('welcome')

@section('title', 'Artikel - BMKG Stasiun Klimatologi Riau')

@section('meta')
    <meta name="description" content="Artikel Klimatologi dan Meteorologi - BMKG Stasiun Klimatologi Riau">
    <meta name="keywords" content="BMKG, Klimatologi, Riau, Artikel, Meteorologi, Cuaca, Iklim">
    <meta name="author" content="BMKG Riau">
    <link rel="icon" type="image/x-icon" href="/assets/images/favicon.ico">
@endsection

@section('content')
    @include('components.before-login.media.hero-media', [
        'title' => 'Artikel',
        'description' => 'Artikel adalah karangan faktual secara lengkap dengan panjang tertentu yang dibuat untuk dipublikasikan di media daring maupun cetak.',
        'showSearch' => true,
        'searchPlaceholder' => 'Ketikkan Artikel',
        'searchRing' => 'focus:ring-sky-300',
        'searchId' => 'artikel-search'
    ])
    @php
        $artikelList = [
            [
                'id' => 'artikel-1',
                'image' => '/assets/images/artikel2.jpg',
                'kategori' => 'MKKuG',
                'title' => 'Artikel Stasiun Klimatologi Riau',
                'author' => 'Nama Pemosting',
                'date' => '1 Maret 2023',
            ],
            [
                'id' => 'artikel-2',
                'image' => '/assets/images/artikel2.jpg',
                'kategori' => 'MKKuG',
                'title' => 'Pengaruh Perubahan Iklim Terhadap Curah Hujan di Riau',
                'author' => 'Ahmad Fauzi',
                'date' => '15 Maret 2023',
            ],
            [
                'id' => 'artikel-3',
                'image' => '/assets/images/artikel2.jpg',
                'kategori' => 'MKKuG',
                'title' => 'Analisis Dampak El Niño Terhadap Musim Kemarau',
                'author' => 'Siti Nurhaliza',
                'date' => '22 April 2023',
            ],
            [
                'id' => 'artikel-4',
                'image' => '/assets/images/artikel2.jpg',
                'kategori' => 'MKKuG',
                'title' => 'Pemanfaatan Data Klimatologi untuk Pertanian',
                'author' => 'Budi Santoso',
                'date' => '5 Mei 2023',
            ],
            [
                'id' => 'artikel-5',
                'image' => '/assets/images/artikel2.jpg',
                'kategori' => 'MKKuG',
                'title' => 'Strategi Adaptasi Petani Terhadap Perubahan Iklim',
                'author' => 'Dewi Lestari',
                'date' => '18 Mei 2023',
            ],
            [
                'id' => 'artikel-6',
                'image' => '/assets/images/artikel2.jpg',
                'kategori' => 'MKKuG',
                'title' => 'Teknologi Pemantauan Cuaca Modern',
                'author' => 'Rizky Pratama',
                'date' => '2 Juni 2023',
            ],
            [
                'id' => 'artikel-7',
                'image' => '/assets/images/artikel2.jpg',
                'kategori' => 'MKKuG',
                'title' => 'Peran BMKG dalam Mitigasi Bencana Alam',
                'author' => 'Sari Melati',
                'date' => '10 Juni 2023',
            ],
            [
                'id' => 'artikel-8',
                'image' => '/assets/images/artikel2.jpg',
                'kategori' => 'MKKuG',
                'title' => 'Pentingnya Edukasi Iklim untuk Masyarakat',
                'author' => 'Andi Wijaya',
                'date' => '20 Juni 2023',
            ],
        ];
    @endphp
    <section class="w-full py-12 md:py-16 lg:py-10">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Back Button -->
            <div class="mb-6">
                <button onclick="history.back()" class="inline-flex items-center gap-2 text-sky-500 hover:text-sky-600 transition-colors">
                    <i class="fas fa-arrow-left"></i>
                    <span class="font-medium font-montserrat">Kembali</span>
                </button>
            </div>
            <!-- Articles Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8" id="articles-grid">
                @foreach($artikelList as $artikel)
                    @include('components.before-login.media.artikel-card', $artikel)
                @endforeach
            </div>
            <!-- Pagination Dummy -->
            <div class="mt-8 flex justify-center">
                <nav class="inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                    <a href="#" class="relative inline-flex items-center px-3 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                        <span>&lt;</span>
                    </a>
                    <a href="#" class="z-10 bg-sky-600 border-sky-600 text-white relative inline-flex items-center px-4 py-2 border text-sm font-medium">1</a>
                    <a href="#" class="bg-white border-gray-300 text-gray-700 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">2</a>
                    <a href="#" class="bg-white border-gray-300 text-gray-700 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">3</a>
                    <a href="#" class="bg-white border-gray-300 text-gray-700 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">4</a>
                    <a href="#" class="relative inline-flex items-center px-3 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                        <span>&gt;</span>
                    </a>
                </nav>
            </div>
        </div>
    </section>
@endsection
