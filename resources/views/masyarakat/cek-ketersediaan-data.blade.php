@extends('welcome')
@section('content')
    @include('components.before-login.layanan.hero-cek-ketersediaan', [
        'title' => 'Cek Ketersediaan Data Alat',
        'description' =>
            'Silakan cek lokasi dan ketersediaan alat pada peta interaktif di bawah ini. Klik marker untuk info jenis alat.',
        'image' => null,
        'showSearch' => true,
        'searchPlaceholder' => 'Cari pos...',
    ])
    <section class="w-full py-8 md:py-12 bg-gradient-to-b from-sky-50 to-white min-h-[80vh]">
        <!-- Back Button -->
        <div class="mb-6 flex justify-start pl-8">
            <button onclick="history.back()"
                class="inline-flex items-center gap-2 text-sky-500 hover:text-sky-600 transition-colors">
                <i class="fas fa-arrow-left"></i>
                <span class="font-medium font-montserrat">Kembali</span>
            </button>
        </div>

        <!-- Error Messages -->
        @if (session('error'))
            <div class="max-w-6xl mx-auto px-4 lg:px-8 mb-6">
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            </div>
        @endif

        @if (session('success'))
            <div class="max-w-6xl mx-auto px-4 lg:px-8 mb-6">
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            </div>
        @endif

        <div class="max-w-6xl mx-auto px-4 lg:px-8">
            @include('components.before-login.layanan.cek-ketersediaan-map', [
                'jenisAlat' => $jenisAlat,
                'titikAlat' => $titikAlat,
                'imgBaseUrl' => asset('assets/images/'),
            ])
        </div>
    </section>
@endsection
