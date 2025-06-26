@extends('welcome')

@section('title', 'Buletin - BMKG Stasiun Klimatologi Riau')

@section('meta')
    <meta name="description" content="Buletin Klimatologi dan Meteorologi - BMKG Stasiun Klimatologi Riau">
    <meta name="keywords" content="BMKG, Klimatologi, Riau, Buletin, Meteorologi, Cuaca, Iklim">
    <meta name="author" content="BMKG Riau">
    <link rel="icon" type="image/x-icon" href="/assets/images/favicon.ico">
@endsection

@section('content')
    @include('components.before-login.media.hero-media', [
        'title' => 'Buletin',
        'description' => 'Buletin berkala yang berisi informasi meteorologi, klimatologi, dan geofisika serta analisis cuaca dan iklim wilayah Riau.',
        'showSearch' => true,
        'searchPlaceholder' => 'Ketikkan Buletin',
        'searchRing' => 'focus:ring-sky-300',
        'searchId' => 'buletin-search'
    ])
    @php
        $buletinList = [
            [
                'id' => 'buletin-1',
                'image' => '/assets/images/buletin2.png',
                'kategori' => 'Buletin Bulanan',
                'title' => 'Buletin Klimatologi Riau Januari 2024',
                'author' => 'Tim Staklim Riau',
                'date' => '31 Januari 2024',
                'content' => 'Isi lengkap buletin 1...'
            ],
            [
                'id' => 'buletin-2',
                'image' => '/assets/images/buletin2.png',
                'kategori' => 'Buletin Bulanan',
                'title' => 'Buletin Klimatologi Riau Februari 2024',
                'author' => 'Tim Staklim Riau',
                'date' => '29 Februari 2024',
                'content' => 'Isi lengkap buletin 2...'
            ],
            [
                'id' => 'buletin-3',
                'image' => '/assets/images/buletin2.png',
                'kategori' => 'Buletin Bulanan',
                'title' => 'Buletin Klimatologi Riau Maret 2024',
                'author' => 'Tim Staklim Riau',
                'date' => '31 Maret 2024',
                'content' => 'Isi lengkap buletin 3...'
            ],
            [
                'id' => 'buletin-4',
                'image' => '/assets/images/buletin2.png',
                'kategori' => 'Buletin Bulanan',
                'title' => 'Buletin Klimatologi Riau April 2024',
                'author' => 'Tim Staklim Riau',
                'date' => '30 April 2024',
                'content' => 'Isi lengkap buletin 4...'
            ],
            [
                'id' => 'buletin-5',
                'image' => '/assets/images/buletin2.png',
                'kategori' => 'Buletin Bulanan',
                'title' => 'Buletin Klimatologi Riau Mei 2024',
                'author' => 'Tim Staklim Riau',
                'date' => '31 Mei 2024',
                'content' => 'Isi lengkap buletin 5...'
            ],
            [
                'id' => 'buletin-6',
                'image' => '/assets/images/buletin2.png',
                'kategori' => 'Buletin Bulanan',
                'title' => 'Buletin Klimatologi Riau Juni 2024',
                'author' => 'Tim Staklim Riau',
                'date' => '30 Juni 2024',
                'content' => 'Isi lengkap buletin 6...'
            ],
            [
                'id' => 'buletin-7',
                'image' => '/assets/images/buletin2.png',
                'kategori' => 'Buletin Bulanan',
                'title' => 'Buletin Klimatologi Riau Juli 2024',
                'author' => 'Tim Staklim Riau',
                'date' => '31 Juli 2024',
                'content' => 'Isi lengkap buletin 7...'
            ],
            [
                'id' => 'buletin-8',
                'image' => '/assets/images/buletin2.png',
                'kategori' => 'Buletin Bulanan',
                'title' => 'Buletin Klimatologi Riau Agustus 2024',
                'author' => 'Tim Staklim Riau',
                'date' => '31 Agustus 2024',
                'content' => 'Isi lengkap buletin 8...'
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
            <!-- Buletin Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8" id="buletin-grid">
                @foreach($buletinList as $buletin)
                    @include('components.before-login.media.buletin-card', $buletin)
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

