@extends('welcome')

@section('title', 'Kualitas Udara - BMKG Stasiun Klimatologi Riau')
@section('content')
    @php
        $produkList = [
            ['title' => 'Informasi Gas Rumah Kaca', 'image' => '/assets/images/udara.png', 'kategori' => 'Kualitas Udara', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Informasi Partikulat PM 2.5 (Dasarian)', 'image' => '/assets/images/udara.png', 'kategori' => 'Kualitas Udara', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Monitoring Partikulat SPM', 'image' => '/assets/images/udara.png', 'kategori' => 'Kualitas Udara', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Monitoring Partikulat PM 10', 'image' => '/assets/images/udara.png', 'kategori' => 'Kualitas Udara', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Monitoring PH Air Hujan', 'image' => '/assets/images/udara.png', 'kategori' => 'Kualitas Udara', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Analisis Kualitas Udara Bulanan', 'image' => '/assets/images/udara.png', 'kategori' => 'Kualitas Udara', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Rekapitulasi Kualitas Udara', 'image' => '/assets/images/udara.png', 'kategori' => 'Kualitas Udara', 'stasiun' => 'Stasiun Klimatologi Riau'],
            ['title' => 'Grafik Kualitas Udara', 'image' => '/assets/images/udara.png', 'kategori' => 'Kualitas Udara', 'stasiun' => 'Stasiun Klimatologi Riau'],
        ];
    @endphp
    @include('components.before-login.produk.hero-produk', [
        'title' => 'Kualitas Udara',
        'description' => 'Lihat data dan monitoring kualitas udara di Riau, termasuk gas rumah kaca, partikulat, dan analisis PH air hujan.',
        'showSearch' => true,
        'searchPlaceholder' => 'Cari produk...',
        'searchId' => 'kualitas-udara-search',
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
