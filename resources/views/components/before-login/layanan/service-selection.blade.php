<!-- Service Selection Component -->
<section class="w-full py-8 md:py-8">
    <div class="max-w-[1440px] mx-auto px-4 lg:px-8">

        <!-- Back Button and Title -->
        <div class="mb-6">
                <button onclick="history.back()" class="inline-flex items-center gap-2 text-sky-500 hover:text-sky-600 transition-colors">
                    <i class="fas fa-arrow-left"></i>
                    <span class="font-medium">Kembali</span>
                </button>

            <div class="text-center">
                <h1 class="text-black text-2xl md:text-3xl font-semibold font-montserrat">
                    Form Layanan
                </h1>
                <p class="text-black/90 text-base md:text-lg mt-2">
                    Pilih jenis layanan sesuai kebutuhan Anda
                </p>
            </div>
        </div>

        <!-- Service Type Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div id="umum-card"
                onclick="scrollToServiceContent(); showServiceContent('umum')"
                class="service-type-card w-full h-80 bg-white rounded-[20px] border-[3px] border-zinc-300 hover:border-sky-500 transition-all duration-300 cursor-pointer flex flex-col items-center justify-center p-6 hover:shadow-xl hover:scale-105 active:scale-95"
                data-type="umum">
                <!-- Icon Container -->
                <div class="w-40 h-32 sm:w-48 sm:h-36 md:w-52 md:h-40 lg:w-60 lg:h-48 mb-4 bg-gradient-to-br from-blue-50 to-sky-50 rounded-lg flex items-center justify-center border border-gray-200">
                    <div class="text-center">
                        <i class="fas fa-users text-4xl text-sky-500 mb-2"></i>
                        <p class="text-gray-600 text-sm font-medium">Masyarakat Umum</p>
                    </div>
                </div>
                <!-- Title -->
                <h3 class="text-center text-black/50 text-xl md:text-2xl font-semibold font-montserrat transition-colors">
                    Umum
                </h3>
            </div>
            <div id="instansi-card"
                onclick="scrollToServiceContent(); showServiceContent('instansi')"
                class="service-type-card w-full h-80 bg-white rounded-[20px] border-[3px] border-zinc-300 hover:border-sky-500 transition-all duration-300 cursor-pointer flex flex-col items-center justify-center p-6 hover:shadow-xl hover:scale-105 active:scale-95"
                data-type="instansi">
                <!-- Icon Container -->
                <div class="w-40 h-32 sm:w-48 sm:h-36 md:w-52 md:h-40 lg:w-60 lg:h-48 mb-4 bg-gradient-to-br from-green-50 to-emerald-50 rounded-lg flex items-center justify-center border border-gray-200">
                    <div class="text-center">
                        <i class="fas fa-building text-4xl text-green-500 mb-2"></i>
                        <p class="text-gray-600 text-sm font-medium">Instansi Pemerintah</p>
                    </div>
                </div>
                <!-- Title -->
                <h3 class="text-center text-black/50 text-xl md:text-2xl font-semibold font-montserrat transition-colors">
                    Instansi Kerja Sama
                </h3>
            </div>
            <div id="mahasiswa-card"
                onclick="scrollToServiceContent(); showServiceContent('mahasiswa')"
                class="service-type-card w-full h-80 bg-white rounded-[20px] border-[3px] border-zinc-300 hover:border-sky-500 transition-all duration-300 cursor-pointer flex flex-col items-center justify-center p-6 hover:shadow-xl hover:scale-105 active:scale-95"
                data-type="mahasiswa">
                <!-- Icon Container -->
                <div class="w-40 h-32 sm:w-48 sm:h-36 md:w-52 md:h-40 lg:w-60 lg:h-48 mb-4 bg-gradient-to-br from-purple-50 to-indigo-50 rounded-lg flex items-center justify-center border border-gray-200">
                    <div class="text-center">
                        <i class="fas fa-graduation-cap text-4xl text-purple-500 mb-2"></i>
                        <p class="text-gray-600 text-sm font-medium">Pendidikan & Penelitian</p>
                    </div>
                </div>
                <!-- Title -->
                <h3 class="text-center text-black/50 text-xl md:text-2xl font-semibold font-montserrat transition-colors">
                    Mahasiswa
                </h3>
            </div>
        </div>

    </div>
</section>

<script>
function scrollToServiceContent() {
    var target = document.getElementById('service-content');
    if (target) {
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
}
</script>
