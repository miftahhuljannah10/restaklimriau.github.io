@extends('welcome')

@section('title', 'Iklim Terapan - BMKG Stasiun Klimatologi Riau')
@section('content')
    @php
        $karhutlaList = [
            ['title' => 'Peta Sebaran Titik Panas', 'image' => '/assets/images/terapan.png', 'kategori' => 'Karhutla', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Grafik Indeks Kekeringan', 'image' => '/assets/images/terapan.png', 'kategori' => 'Karhutla', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Peringatan Dini Karhutla', 'image' => '/assets/images/terapan.png', 'kategori' => 'Karhutla', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Analisis Curah Hujan', 'image' => '/assets/images/terapan.png', 'kategori' => 'Karhutla', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Prediksi Titik Api', 'image' => '/assets/images/terapan.png', 'kategori' => 'Karhutla', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Laporan Harian Karhutla', 'image' => '/assets/images/terapan.png', 'kategori' => 'Karhutla', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Peta Risiko Karhutla', 'image' => '/assets/images/terapan.png', 'kategori' => 'Karhutla', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Rekapitulasi Hotspot', 'image' => '/assets/images/terapan.png', 'kategori' => 'Karhutla', 'stasiun' => 'Stasiun Klimatologi Riau'],
        ];
        $banjirList = [
            ['title' => 'Peta Potensi Banjir', 'image' => '/assets/images/terapan.png', 'kategori' => 'Banjir', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Grafik Tinggi Muka Air', 'image' => '/assets/images/terapan.png', 'kategori' => 'Banjir', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Peringatan Dini Banjir', 'image' => '/assets/images/terapan.png', 'kategori' => 'Banjir', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Analisis Curah Hujan', 'image' => '/assets/images/terapan.png', 'kategori' => 'Banjir', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Prediksi Daerah Rawan', 'image' => '/assets/images/terapan.png', 'kategori' => 'Banjir', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Laporan Harian Banjir', 'image' => '/assets/images/terapan.png', 'kategori' => 'Banjir', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Peta Risiko Banjir', 'image' => '/assets/images/terapan.png', 'kategori' => 'Banjir', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Rekapitulasi Banjir', 'image' => '/assets/images/terapan.png', 'kategori' => 'Banjir', 'stasiun' => 'Stasiun Klimatologi Riau'],
        ];
        $energiList = [
            ['title' => 'Peta Potensi Surya', 'image' => '/assets/images/terapan.png', 'kategori' => 'Energi', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Peta Potensi Angin', 'image' => '/assets/images/terapan.png', 'kategori' => 'Energi', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Peta Potensi Air', 'image' => '/assets/images/terapan.png', 'kategori' => 'Energi', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Grafik Intensitas Surya', 'image' => '/assets/images/terapan.png', 'kategori' => 'Energi', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Grafik Kecepatan Angin', 'image' => '/assets/images/terapan.png', 'kategori' => 'Energi', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Laporan Energi Terbarukan', 'image' => '/assets/images/terapan.png', 'kategori' => 'Energi', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Peta Potensi Biomassa', 'image' => '/assets/images/terapan.png', 'kategori' => 'Energi', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Rekapitulasi Energi', 'image' => '/assets/images/terapan.png', 'kategori' => 'Energi', 'stasiun' => 'Stasiun Klimatologi Riau'],
        ];
        $tabs = [
            [
                'key' => 'karhutla',
                'label' => 'Karhutla',
                'slot' => view('components.before-login.produk.produk-list', ['produkList' => $karhutlaList])->render(),
            ],
            [
                'key' => 'banjir',
                'label' => 'Banjir',
                'slot' => view('components.before-login.produk.produk-list', ['produkList' => $banjirList])->render(),
            ],
            [
                'key' => 'energi',
                'label' => 'Energi',
                'slot' => view('components.before-login.produk.produk-list', ['produkList' => $energiList])->render(),
            ],
        ];
    @endphp
    @include('components.before-login.produk.hero-produk', [
        'title' => 'Iklim Terapan',
        'description' => 'Cari dan lihat data iklim terapan dalam bentuk grafik di Riau dengan cepat, mudah, dan akurat.',
        'showSearch' => true,
        'searchPlaceholder' => 'Cari produk...',
        'searchId' => 'iklim-terapan-search',
    ])
    <section class="w-full py-12 md:py-16 lg:py-10">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Back Button -->
            <div class="mb-6">
                <button onclick="history.back()" class="inline-flex items-center gap-2 text-sky-500 hover:text-sky-600 transition-colors">
                    <i class="fas fa-arrow-left"></i>
                    <span class="font-medium font-montserrat">Kembali</span>
                </button>
            </div>
            <!-- Tabs -->
            @include('components.before-login.produk.tabs', ['tabs' => $tabs])
        </div>
    </section>
@endsection
