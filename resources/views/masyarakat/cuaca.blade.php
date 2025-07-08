@extends('welcome')

@section('title', 'Cuaca - BMKG Stasiun Klimatologi Riau')
@section('content')
    @php
        $produkList = [
            ['title' => 'Prakiraan Cuaca Harian', 'image' => '/assets/images/cuaca.png', 'kategori' => 'Cuaca', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Peta Cuaca', 'image' => '/assets/images/cuaca.png', 'kategori' => 'Cuaca', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Monitoring Curah Hujan', 'image' => '/assets/images/cuaca.png', 'kategori' => 'Cuaca', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Analisis Cuaca Ekstrem', 'image' => '/assets/images/cuaca.png', 'kategori' => 'Cuaca', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Peringatan Dini Cuaca', 'image' => '/assets/images/cuaca.png', 'kategori' => 'Cuaca', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Rekapitulasi Cuaca', 'image' => '/assets/images/cuaca.png', 'kategori' => 'Cuaca', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Grafik Intensitas Hujan', 'image' => '/assets/images/cuaca.png', 'kategori' => 'Cuaca', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Laporan Cuaca Bulanan', 'image' => '/assets/images/cuaca.png', 'kategori' => 'Cuaca', 'stasiun' => 'Stasiun Klimatologi Riau'],
        ];
    @endphp
    @include('components.before-login.produk.hero-produk', [
        'title' => 'Cuaca',
        'description' => 'Lihat prakiraan, monitoring, dan analisis cuaca di Riau secara lengkap dan akurat.',
        'showSearch' => true,
        'searchPlaceholder' => 'Cari produk cuaca...',
        'searchId' => 'cuaca-search',
    ])
    <div class="py-10">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-6">
                <button onclick="history.back()" class="inline-flex items-center gap-2 text-sky-500 hover:text-sky-600 transition-colors">
                    <i class="fas fa-arrow-left"></i>
                    <span class="font-medium font-montserrat">Kembali</span>
                </button>
            </div>
            @include('components.before-login.produk.produk-list', ['produkList' => $produkList])
        </div>
    </div>
@endsection
