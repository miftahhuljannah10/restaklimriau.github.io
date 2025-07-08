@extends('welcome')

@section('title', 'Perubahan Iklim - BMKG Stasiun Klimatologi Riau')
@section('content')
    @php
        $img = '/assets/images/periklim.png';
        $historisList = [
            ['title' => 'Tren Suhu Riau', 'image' => $img, 'kategori' => 'Historis', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Tren Curah Hujan', 'image' => $img, 'kategori' => 'Historis', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Perubahan Pola Musim', 'image' => $img, 'kategori' => 'Historis', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Tren Suhu Ekstrem', 'image' => $img, 'kategori' => 'Historis', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Tren Hari Hujan', 'image' => $img, 'kategori' => 'Historis', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Tren Kelembapan Udara', 'image' => $img, 'kategori' => 'Historis', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Tren Lama Musim', 'image' => $img, 'kategori' => 'Historis', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Tren Hari Tanpa Hujan', 'image' => $img, 'kategori' => 'Historis', 'stasiun' => 'Stasiun Klimatologi Riau'],
        ];
        $proyeksiList = [
            ['title' => 'Proyeksi Suhu 2030', 'image' => $img, 'kategori' => 'Proyeksi', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Proyeksi Curah Hujan 2030', 'image' => $img, 'kategori' => 'Proyeksi', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Proyeksi Musim Kemarau', 'image' => $img, 'kategori' => 'Proyeksi', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Proyeksi Musim Hujan', 'image' => $img, 'kategori' => 'Proyeksi', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Proyeksi Hari Hujan', 'image' => $img, 'kategori' => 'Proyeksi', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Proyeksi Suhu Ekstrem', 'image' => $img, 'kategori' => 'Proyeksi', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Proyeksi Kelembapan', 'image' => $img, 'kategori' => 'Proyeksi', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Proyeksi Hari Tanpa Hujan', 'image' => $img, 'kategori' => 'Proyeksi', 'stasiun' => 'Stasiun Klimatologi Riau'],
        ];
        $perkembanganList = [
            ['title' => 'Awal Musim Hujan', 'image' => $img, 'kategori' => 'Perkembangan Musim', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Puncak Musim Kemarau', 'image' => $img, 'kategori' => 'Perkembangan Musim', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Akhir Musim Hujan', 'image' => $img, 'kategori' => 'Perkembangan Musim', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Awal Musim Kemarau', 'image' => $img, 'kategori' => 'Perkembangan Musim', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Puncak Musim Hujan', 'image' => $img, 'kategori' => 'Perkembangan Musim', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Akhir Musim Kemarau', 'image' => $img, 'kategori' => 'Perkembangan Musim', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Perkembangan Hari Hujan', 'image' => $img, 'kategori' => 'Perkembangan Musim', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Perkembangan Hari Tanpa Hujan', 'image' => $img, 'kategori' => 'Perkembangan Musim', 'stasiun' => 'Stasiun Klimatologi Riau'],
        ];
        $tabs = [
            [
                'key' => 'historis',
                'label' => 'Historis Perubahan Iklim',
                'slot' => view('components.before-login.produk.produk-list', ['produkList' => $historisList])->render(),
            ],
            [
                'key' => 'proyeksi',
                'label' => 'Proyeksi Perubahan Iklim',
                'slot' => view('components.before-login.produk.produk-list', ['produkList' => $proyeksiList])->render(),
            ],
            [
                'key' => 'perkembangan',
                'label' => 'Perkembangan Musim',
                'slot' => view('components.before-login.produk.produk-list', ['produkList' => $perkembanganList])->render(),
            ],
        ];
    @endphp
    @include('components.before-login.produk.hero-produk', [
        'title' => 'Perubahan Iklim',
        'description' => 'Jelajahi data historis, proyeksi, dan perkembangan musim terkait perubahan iklim di Riau.',
        'showSearch' => true,
        'searchPlaceholder' => 'Cari produk...',
        'searchId' => 'perubahan-iklim-search',
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
