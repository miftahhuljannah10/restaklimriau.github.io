<!-- Service Selection Component -->
<section class="w-full py-8 md:py-12 bg-gradient-to-b from-sky-50 to-white">
    <div class="max-w-5xl mx-auto px-4 lg:px-8">

        <!-- Back Button and Title -->
        <div class="mb-8 flex flex-col gap-4 items-center">
            <button onclick="history.back()" class="inline-flex items-center gap-2 text-sky-600 hover:text-sky-700 font-semibold transition-colors bg-white border border-sky-100 rounded-full px-4 py-2 shadow-sm hover:shadow-md">
                <i class="fas fa-arrow-left"></i>
                <span>Kembali</span>
            </button>
            <div class="text-center">
                <h1 class="text-sky-800 text-3xl md:text-4xl font-bold font-montserrat tracking-tight">
                    Form Layanan
                </h1>
                <p class="text-gray-600 text-lg mt-2">
                    Pilih jenis layanan sesuai kebutuhan Anda
                </p>
            </div>
        </div>

        <!-- Service Type Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div id="umum-card"
                onclick="scrollToServiceContent(); showServiceContent('umum')"
                class="group service-type-card w-full h-64 bg-white rounded-2xl border-2 border-zinc-200 hover:border-sky-500 transition-all duration-200 cursor-pointer flex flex-col items-center justify-center p-6 shadow-sm hover:shadow-lg hover:scale-105 active:scale-95 relative overflow-hidden">
                <div class="absolute right-4 top-4 opacity-10 text-7xl text-sky-200 pointer-events-none select-none">
                    <i class="fas fa-users"></i>
                </div>
                <div class="z-10 flex flex-col items-center">
                    <div class="w-16 h-16 flex items-center justify-center rounded-full bg-sky-50 mb-3 border border-sky-100">
                        <i class="fas fa-users text-3xl text-sky-500"></i>
                    </div>
                    <h3 class="text-sky-700 text-xl font-semibold font-montserrat mb-1">Umum</h3>
                    <p class="text-gray-500 text-sm">Masyarakat Umum</p>
                </div>
            </div>
            <div id="instansi-card"
                onclick="scrollToServiceContent(); showServiceContent('instansi')"
                class="group service-type-card w-full h-64 bg-white rounded-2xl border-2 border-zinc-200 hover:border-green-500 transition-all duration-200 cursor-pointer flex flex-col items-center justify-center p-6 shadow-sm hover:shadow-lg hover:scale-105 active:scale-95 relative overflow-hidden">
                <div class="absolute right-4 top-4 opacity-10 text-7xl text-green-200 pointer-events-none select-none">
                    <i class="fas fa-building"></i>
                </div>
                <div class="z-10 flex flex-col items-center">
                    <div class="w-16 h-16 flex items-center justify-center rounded-full bg-green-50 mb-3 border border-green-100">
                        <i class="fas fa-building text-3xl text-green-500"></i>
                    </div>
                    <h3 class="text-green-700 text-xl font-semibold font-montserrat mb-1">Instansi Kerja Sama</h3>
                    <p class="text-gray-500 text-sm">Instansi Pemerintah</p>
                </div>
            </div>
            <div id="mahasiswa-card"
                onclick="scrollToServiceContent(); showServiceContent('mahasiswa')"
                class="group service-type-card w-full h-64 bg-white rounded-2xl border-2 border-zinc-200 hover:border-purple-500 transition-all duration-200 cursor-pointer flex flex-col items-center justify-center p-6 shadow-sm hover:shadow-lg hover:scale-105 active:scale-95 relative overflow-hidden">
                <div class="absolute right-4 top-4 opacity-10 text-7xl text-purple-200 pointer-events-none select-none">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div class="z-10 flex flex-col items-center">
                    <div class="w-16 h-16 flex items-center justify-center rounded-full bg-purple-50 mb-3 border border-purple-100">
                        <i class="fas fa-graduation-cap text-3xl text-purple-500"></i>
                    </div>
                    <h3 class="text-purple-700 text-xl font-semibold font-montserrat mb-1">Mahasiswa</h3>
                    <p class="text-gray-500 text-sm">Pendidikan & Penelitian</p>
                </div>
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
