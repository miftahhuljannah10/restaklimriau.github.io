@extends('welcome')

@section('title', 'Informasi Iklim - BMKG Stasiun Klimatologi Riau')
@section('content')
    @php
        $img = '/assets/images/iniklim.png';
        $dasarianList = [
            ['title' => 'Analisis Dasarian I', 'image' => $img, 'kategori' => 'Dasarian', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Analisis Dasarian II', 'image' => $img, 'kategori' => 'Dasarian', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Analisis Dasarian III', 'image' => $img, 'kategori' => 'Dasarian', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Prakiraan Dasarian I', 'image' => $img, 'kategori' => 'Dasarian', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Prakiraan Dasarian II', 'image' => $img, 'kategori' => 'Dasarian', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Prakiraan Dasarian III', 'image' => $img, 'kategori' => 'Dasarian', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Monitoring Dasarian', 'image' => $img, 'kategori' => 'Dasarian', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Rekapitulasi Dasarian', 'image' => $img, 'kategori' => 'Dasarian', 'stasiun' => 'Stasiun Klimatologi Riau'],
        ];
        $bulananList = [
            ['title' => 'Analisis Bulanan', 'image' => $img, 'kategori' => 'Bulanan', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Prakiraan Bulanan', 'image' => $img, 'kategori' => 'Bulanan', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Monitoring Bulanan', 'image' => $img, 'kategori' => 'Bulanan', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Rekapitulasi Bulanan', 'image' => $img, 'kategori' => 'Bulanan', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Grafik Curah Hujan Bulanan', 'image' => $img, 'kategori' => 'Bulanan', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Grafik Suhu Bulanan', 'image' => $img, 'kategori' => 'Bulanan', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Grafik Kelembapan Bulanan', 'image' => $img, 'kategori' => 'Bulanan', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Grafik Hari Hujan Bulanan', 'image' => $img, 'kategori' => 'Bulanan', 'stasiun' => 'Stasiun Klimatologi Riau'],
        ];
        $musimanList = [
            ['title' => 'Analisis Musiman', 'image' => $img, 'kategori' => 'Musiman', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Prakiraan Musiman', 'image' => $img, 'kategori' => 'Musiman', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Monitoring Musiman', 'image' => $img, 'kategori' => 'Musiman', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Rekapitulasi Musiman', 'image' => $img, 'kategori' => 'Musiman', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Peta Awal Musim', 'image' => $img, 'kategori' => 'Musiman', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Peta Puncak Musim', 'image' => $img, 'kategori' => 'Musiman', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Peta Akhir Musim', 'image' => $img, 'kategori' => 'Musiman', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Peta Hari Tanpa Hujan Musiman', 'image' => $img, 'kategori' => 'Musiman', 'stasiun' => 'Stasiun Klimatologi Riau'],
        ];
        $dinamikaList = [
            ['title' => 'Analisis Dinamika Atmosfer', 'image' => $img, 'kategori' => 'Dinamika', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Prakiraan Dinamika Atmosfer', 'image' => $img, 'kategori' => 'Dinamika', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Monitoring Dinamika Atmosfer', 'image' => $img, 'kategori' => 'Dinamika', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Rekapitulasi Dinamika', 'image' => $img, 'kategori' => 'Dinamika', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Grafik Suhu Permukaan Laut', 'image' => $img, 'kategori' => 'Dinamika', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Grafik Angin Musiman', 'image' => $img, 'kategori' => 'Dinamika', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Grafik Tekanan Udara', 'image' => $img, 'kategori' => 'Dinamika', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Grafik Kelembapan Dinamika', 'image' => $img, 'kategori' => 'Dinamika', 'stasiun' => 'Stasiun Klimatologi Riau'],
        ];
        $tabs = [
            [
                'key' => 'dasarian',
                'label' => 'Dasarian',
                'slot' => view('components.before-login.produk.produk-list', ['produkList' => $dasarianList])->render(),
            ],
            [
                'key' => 'bulanan',
                'label' => 'Bulanan',
                'slot' => view('components.before-login.produk.produk-list', ['produkList' => $bulananList])->render(),
            ],
            [
                'key' => 'musiman',
                'label' => 'Musiman',
                'slot' => view('components.before-login.produk.produk-list', ['produkList' => $musimanList])->render(),
            ],
            [
                'key' => 'dinamika',
                'label' => 'Dinamika',
                'slot' => view('components.before-login.produk.produk-list', ['produkList' => $dinamikaList])->render(),
            ],
        ];
    @endphp
    @include('components.before-login.produk.hero-produk', [
        'title' => 'Informasi Iklim',
        'description' => 'Jelajahi dan lihat data dasarian, bulanan, musiman, dan dinamika terkait informasi iklim di Riau.',
        'showSearch' => true,
        'searchPlaceholder' => 'Cari produk...',
        'searchId' => 'informasi-iklim-search',
    ])
    <section class="w-full py-12 md:py-16 lg:py-10">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-6">
                <button onclick="history.back()" class="inline-flex items-center gap-2 text-sky-500 hover:text-sky-600 transition-colors">
                    <i class="fas fa-arrow-left"></i>
                    <span class="font-medium font-montserrat">Kembali</span>
                </button>
            </div>
            @include('components.before-login.produk.tabs', ['tabs' => $tabs])
        </div>
    </section>
@endsection



