{{--
Contoh pemanggilan dinamis dari view utama:
@include('components.before-login.layanan.hero-layanan', [
    'title' => 'Permintaan Data',
    'subtitle' => 'Alur Pelayanan Mengenai Mekanisme Pelayanan PNBP Stasiun Klimatologi Riau dan Jenis Form Pengajuan.',
    'image' => asset('assets/images/layanan2.png'),
    'buttons' => [
        [
            'label' => 'Cek Ketersediaan Data',
            'link' => '/cek-ketersediaan-data',
            'style' => 'border-2 border-white bg-transparent hover:bg-white hover:text-sky-600',
        ],
        // Tambah tombol lain jika perlu
    ]
])
--}}
<!-- Hero Layanan Section Component Dinamis -->
<section class="w-full h-[400px] sm:h-[450px] md:h-[488px] relative overflow-hidden bg-gradient-to-br from-bmkg-blue via-bmkg-light-blue to-bmkg-cyan">
    <!-- Mobile Layout (Gambar di atas, teks di tengah) - Hanya tampil di layar kecil -->
    <div class="flex flex-col items-center md:hidden h-full">
        <!-- Background Image for Mobile -->
        <div class="w-full flex justify-center mt-2">
            <img src="{{ $image ?? asset('assets/images/layanan2.png') }}" alt="Layanan Background"
                class="w-[280px] h-[180px] object-contain z-10" />
        </div>
        <!-- Content for Mobile (Centered) -->
        <div class="flex flex-col items-center justify-center px-4 text-center mt-0 z-10">
            <!-- Hero Title -->
            <div class="mb-2">
                <h1 class="text-white text-xl sm:text-2xl font-bold font-montserrat leading-tight drop-shadow-lg">
                    {{ $title ?? 'Permintaan Data' }}
                </h1>
            </div>
            <!-- Hero Subtitle -->
            <div class="mb-4">
                <p class="text-white text-sm sm:text-base font-normal font-montserrat leading-relaxed drop-shadow-md">
                    {{ $subtitle ?? 'Alur Pelayanan Mengenai Mekanisme Pelayanan PNBP Stasiun Klimatologi Riau dan Jenis Form Pengajuan.' }}
                </p>
            </div>
            <!-- Action Buttons Dinamis -->
            <div class="flex flex-col gap-3 w-full">
                @foreach(($buttons ?? []) as $btn)
                    <a href="{{ $btn['link'] ?? '#' }}" class="w-full h-12 rounded-[12px] {{ $btn['style'] ?? 'border-2 border-white bg-transparent hover:bg-white hover:text-sky-600' }} transition-all duration-300 group shadow-lg hover:shadow-xl backdrop-blur-sm flex items-center justify-center">
                        <span class="text-white group-hover:text-sky-600 text-xs sm:text-sm font-medium font-montserrat group-hover:scale-105 transition-all duration-300 px-2">
                            {{ $btn['label'] ?? '' }}
                        </span>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Desktop Layout (Original layout) - Hanya tampil di layar medium ke atas -->
    <div class="hidden md:block h-full">
        <!-- Background Image for Desktop -->
        <img src="{{ $image ?? asset('assets/images/layanan2.png') }}" alt="Layanan Background"
            class="absolute right-0 top-[50px] md:w-[450px] lg:w-[550px] xl:w-[621px] md:h-[280px] lg:h-[320px] xl:h-96 object-cover z-0" />
        <!-- Main Hero Content -->
        <div class="relative z-10 flex flex-col justify-center h-full px-8 lg:px-[60px] xl:px-[89px]">
            <!-- Hero Title -->
            <div class="w-full max-w-[400px] lg:max-w-[500px] mb-6">
                <h1 class="text-white text-3xl lg:text-4xl xl:text-4xl font-bold font-montserrat leading-tight drop-shadow-lg">
                    {{ $title ?? 'Permintaan Data' }}
                </h1>
            </div>
            <!-- Hero Subtitle -->
            <div class="w-full max-w-[500px] lg:max-w-[600px] xl:max-w-[716px] mb-10 lg:mb-12">
                <p class="text-white text-lg lg:text-xl xl:text-2xl font-normal font-montserrat leading-relaxed drop-shadow-md">
                    {{ $subtitle ?? 'Alur Pelayanan Mengenai Mekanisme Pelayanan PNBP Stasiun Klimatologi Riau dan Jenis Form Pengajuan.' }}
                </p>
            </div>
            <!-- Action Buttons Dinamis -->
            <div class="flex flex-row gap-4 max-w-[600px]">
                @foreach(($buttons ?? []) as $btn)
                    <a href="{{ $btn['link'] ?? '#' }}" class="min-w-[220px] lg:min-w-[240px] xl:w-64 h-16 lg:h-18 rounded-[16px] {{ $btn['style'] ?? 'border-2 border-white bg-transparent hover:bg-white hover:text-sky-600' }} transition-all duration-300 group shadow-lg hover:shadow-xl backdrop-blur-sm flex items-center justify-center">
                        <span class="text-white group-hover:text-sky-600 text-base lg:text-lg font-medium font-montserrat group-hover:scale-105 transition-all duration-300 px-2">
                            {{ $btn['label'] ?? '' }}
                        </span>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</section>
