@extends('welcome')

@section('title', 'Berita - BMKG Stasiun Klimatologi Riau')

@section('meta')
    <meta name="description" content="Berita Terkini Klimatologi dan Meteorologi - BMKG Stasiun Klimatologi Riau">
    <meta name="keywords" content="BMKG, Klimatologi, Riau, Berita, Meteorologi, Cuaca, Iklim">
    <meta name="author" content="BMKG Riau">
    <link rel="icon" type="image/x-icon" href="/assets/images/favicon.ico">
@endsection

@section('content')
    @include('components.before-login.media.hero-media', [
        'title' => 'Berita',
        'description' => 'Buletin adalah publikasi yang mengangkat perkembangan suatu topik atau aspek tertentu dan diterbitkan atau dipublikasikan secara teratur',
        'showSearch' => true,
        'searchPlaceholder' => 'Ketikkan Berita',
        'searchRing' => 'focus:ring-sky-300',
        'searchId' => 'berita-search'
    ])
    @php
        $beritaList = [
            [
                'id' => 'berita-1',
                'image' => '/assets/images/berita2.png',
                'kategori' => 'Berita Terkini',
                'title' => 'Stasiun Klimatologi Riau Luncurkan Sistem Peringatan Dini Terbaru',
                'author' => 'Tim Redaksi BMKG Riau',
                'date' => '15 Januari 2024',
            ],
            [
                'id' => 'berita-2',
                'image' => '/assets/images/berita2.png',
                'kategori' => 'Kegiatan',
                'title' => 'Workshop Pelatihan Interpretasi Data Cuaca untuk Petani Riau',
                'author' => 'Humas BMKG Riau',
                'date' => '22 Januari 2024',
            ],
            [
                'id' => 'berita-3',
                'image' => '/assets/images/berita2.png',
                'kategori' => 'Berita Terkini',
                'title' => 'BMKG Riau Gelar Sosialisasi Adaptasi Perubahan Iklim',
                'author' => 'Tim Redaksi BMKG Riau',
                'date' => '5 Februari 2024',
            ],
            [
                'id' => 'berita-4',
                'image' => '/assets/images/berita2.png',
                'kategori' => 'Kegiatan',
                'title' => 'Pelatihan Prakiraan Musim untuk Penyuluh Pertanian',
                'author' => 'Humas BMKG Riau',
                'date' => '12 Februari 2024',
            ],
            [
                'id' => 'berita-5',
                'image' => '/assets/images/berita2.png',
                'kategori' => 'Berita Terkini',
                'title' => 'BMKG Riau Perkuat Kolaborasi dengan Pemda',
                'author' => 'Tim Redaksi BMKG Riau',
                'date' => '20 Februari 2024',
            ],
            [
                'id' => 'berita-6',
                'image' => '/assets/images/berita2.png',
                'kategori' => 'Kegiatan',
                'title' => 'Seminar Nasional Adaptasi Iklim di Pekanbaru',
                'author' => 'Humas BMKG Riau',
                'date' => '28 Februari 2024',
            ],
            [
                'id' => 'berita-7',
                'image' => '/assets/images/berita2.png',
                'kategori' => 'Berita Terkini',
                'title' => 'BMKG Riau Rilis Prakiraan Musim Kemarau 2024',
                'author' => 'Tim Redaksi BMKG Riau',
                'date' => '5 Maret 2024',
            ],
            [
                'id' => 'berita-8',
                'image' => '/assets/images/berita2.png',
                'kategori' => 'Kegiatan',
                'title' => 'Pelatihan Mitigasi Bencana Berbasis Iklim',
                'author' => 'Humas BMKG Riau',
                'date' => '12 Maret 2024',
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
            <!-- Berita Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8" id="berita-grid">
                @foreach($beritaList as $berita)
                    @include('components.before-login.media.berita-card', $berita)
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

