@extends('welcome')
@section('content')
    @include('components.before-login.layanan.hero-cek-ketersediaan', [
        'title' => 'Cek Ketersediaan Data Alat',
        'description' => 'Silakan cek lokasi dan ketersediaan alat pada peta interaktif di bawah ini. Klik marker untuk info jenis alat.',
        'image' => null,
        'showSearch' => true,
        'searchPlaceholder' => 'Cari pos...'
    ])
    <section class="w-full py-8 md:py-12 bg-gradient-to-b from-sky-50 to-white min-h-[80vh]">
           <!-- Back Button -->
    <div class="mb-6 flex justify-start pl-8">
        <button onclick="history.back()" class="inline-flex items-center gap-2 text-sky-500 hover:text-sky-600 transition-colors">
            <i class="fas fa-arrow-left"></i>
            <span class="font-medium font-montserrat">Kembali</span>
        </button>
    </div>
        <div class="max-w-6xl mx-auto px-4 lg:px-8">
            @include('components.before-login.layanan.cek-ketersediaan-map', [
                'jenisAlat' => [
                    ['label' => 'PHK', 'icon' => 'ph_1.png'],
                    ['label' => 'ARG', 'icon' => 'arg_1.png'],
                    ['label' => 'AWS', 'icon' => 'aws_1.png'],
                    ['label' => 'AAWS', 'icon' => 'aaws_1.png'],
                    ['label' => 'ASRS', 'icon' => 'asrs_1.png'],
                    ['label' => 'IKRO', 'icon' => 'ikro_1.png'],
                ],
                'alatMarkers' => [
                    ['lat' => -0.5, 'lng' => 101.5, 'icon' => 'ph_1.png', 'label' => 'PHK'],
                    ['lat' => -0.7, 'lng' => 101.7, 'icon' => 'arg_1.png', 'label' => 'ARG'],
                    ['lat' => -0.9, 'lng' => 101.9, 'icon' => 'aws_1.png', 'label' => 'AWS'],
                    ['lat' => -1.1, 'lng' => 102.1, 'icon' => 'aaws_1.png', 'label' => 'AAWS'],
                    ['lat' => -1.3, 'lng' => 102.3, 'icon' => 'asrs_1.png', 'label' => 'ASRS'],
                    ['lat' => -1.5, 'lng' => 102.5, 'icon' => 'ikro_1.png', 'label' => 'IKRO'],
                ],
                'imgBaseUrl' => 'http://localhost/PA/web-staklim-kampar/assets2/images/NormalDasarian/'
            ])
        </div>
    </section>
@endsection
