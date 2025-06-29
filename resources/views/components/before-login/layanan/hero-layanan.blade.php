<!-- Hero Layanan Section Component -->
<!-- Hero Layanan Section mirip Hero Profil -->
<section class="w-full h-[400px] sm:h-[450px] md:h-[488px] relative overflow-hidden bg-gradient-to-br from-bmkg-blue via-bmkg-light-blue to-bmkg-cyan">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0">
        <div class="absolute top-20 left-10 w-32 h-32 bg-white/10 rounded-full animate-float"></div>
        <div class="absolute top-40 right-20 w-24 h-24 bg-white/10 rounded-full animate-float" style="animation-delay: 1s;"></div>
        <div class="absolute bottom-20 left-1/4 w-16 h-16 bg-white/10 rounded-full animate-float" style="animation-delay: 2s;"></div>
        <div class="absolute bottom-40 right-1/3 w-20 h-20 bg-white/10 rounded-full animate-float" style="animation-delay: 0.5s;"></div>
    </div>
    <!-- Mobile Layout (Gambar di atas, teks di tengah) - Hanya tampil di layar kecil -->
    <div class="flex flex-col items-center md:hidden h-full">
        <!-- Background Image for Mobile -->
        <div class="w-full flex justify-center mt-2">
            <img src="assets/images/layanan2.png" alt="Layanan Background"
                class="w-[280px] h-[180px] object-contain z-10" />
        </div>

        <!-- Content for Mobile (Centered) -->
        <div class="flex flex-col items-center justify-center px-4 text-center mt-0 z-10">
            <!-- Hero Title -->
            <div class="mb-2">
                <h1 class="text-white text-xl sm:text-2xl font-bold font-montserrat leading-tight drop-shadow-lg">
                    Permintaan Data
                </h1>
            </div>

            <!-- Hero Subtitle -->
            <div class="mb-4">
                <p class="text-white text-sm sm:text-base font-normal font-montserrat leading-relaxed drop-shadow-md">
                    Alur Pelayanan Mengenai Mekanisme Pelayanan PNBP Stasiun Klimatologi Riau dan Jenis Form Pengajuan.
                </p>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col gap-3 w-full">
                <!-- Cek Ketersediaan Data Button -->
                <button class="w-full h-12 rounded-[12px] border-2 border-white bg-transparent hover:bg-white hover:text-sky-600 transition-all duration-300 group shadow-lg hover:shadow-xl backdrop-blur-sm">
                    <span class="text-white group-hover:text-sky-600 text-xs sm:text-sm font-medium font-montserrat group-hover:scale-105 transition-all duration-300 px-2">
                        Cek Ketersediaan Data
                    </span>
                </button>
            </div>
        </div>
    </div>

    <!-- Desktop Layout (Original layout) - Hanya tampil di layar medium ke atas -->
    <div class="hidden md:block h-full">
        <!-- Background Image for Desktop -->
        <img src="assets/images/layanan2.png" alt="Layanan Background"
            class="absolute right-0 top-[50px] md:w-[450px] lg:w-[550px] xl:w-[621px] md:h-[280px] lg:h-[320px] xl:h-96 object-cover z-0" />

        <!-- Main Hero Content -->
        <div class="relative z-10 flex flex-col justify-center h-full px-8 lg:px-[60px] xl:px-[89px]">
            <!-- Hero Title -->
            <div class="w-full max-w-[400px] lg:max-w-[500px] mb-6">
                <h1 class="text-white text-3xl lg:text-4xl xl:text-4xl font-bold font-montserrat leading-tight drop-shadow-lg">
                    Permintaan Data
                </h1>
            </div>

            <!-- Hero Subtitle -->
            <div class="w-full max-w-[500px] lg:max-w-[600px] xl:max-w-[716px] mb-10 lg:mb-12">
                <p class="text-white text-lg lg:text-xl xl:text-2xl font-normal font-montserrat leading-relaxed drop-shadow-md">
                    Alur Pelayanan Mengenai Mekanisme Pelayanan PNBP Stasiun Klimatologi Riau dan Jenis Form Pengajuan.
                </p>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-row gap-4 max-w-[600px]">
                <!-- Cek Ketersediaan Data Button -->
                <button class="min-w-[220px] lg:min-w-[240px] xl:w-64 h-16 lg:h-18 rounded-[16px] border-2 border-white bg-transparent hover:bg-white hover:text-sky-600 transition-all duration-300 group shadow-lg hover:shadow-xl backdrop-blur-sm" onclick ="window.location.href='/cek-ketersediaan-data'" >
                    <span class="text-white group-hover:text-sky-600 text-base lg:text-lg font-medium font-montserrat group-hover:scale-105 transition-all duration-300 px-2">
                        Cek Ketersediaan Data
                    </span>
                </button>
            </div>
        </div>
    </div>
</section>
