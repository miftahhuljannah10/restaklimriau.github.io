<!-- Service Selection Component -->
<section class="w-full py-8 md:py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 lg:px-8">

        <!-- Back Button and Title -->
        <div class="mb-8">
            <div class="flex justify-start w-full mb-4">
                <button onclick="history.back()" class="inline-flex items-center gap-2 text-sky-500 hover:text-sky-600 transition-colors">
                    <i class="fas fa-arrow-left"></i>
                    <span class="font-medium font-montserrat">Kembali</span>
                </button>
            </div>
            <div class="text-center w-full">
                <h1 class="gradient-text text-3xl md:text-4xl font-bold font-montserrat tracking-tight">
                    Form Layanan
                </h1>
                <p class="text-gray-600 text-lg mt-2">
                    Pilih jenis layanan sesuai kebutuhan Anda
                </p>
            </div>
        </div>

        <!-- Service Type Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 w-full" x-data="{ selected: 'umum' }">
            <div id="umum-card"
                @click="selected = 'umum'; scrollToServiceContent()"
                :class="['group service-type-card w-full h-64 bg-white rounded-2xl border-2 transition-all duration-200 cursor-pointer flex flex-col items-center justify-center p-6 shadow-sm hover:shadow-lg hover:scale-105 active:scale-95 relative overflow-hidden', 'border-sky-500']"
            >
                <div class="absolute right-4 top-4 opacity-10 text-7xl text-sky-200 pointer-events-none select-none">
                    <i class="fas fa-users"></i>
                </div>
                <div class="z-10 flex flex-col items-center">
                    <div class="w-16 h-16 flex items-center justify-center rounded-full bg-sky-50 mb-3 border border-sky-100">
                        <i class="fas fa-users text-3xl text-sky-500"></i>
                    </div>
                    <h3 class="text-sky-700 text-2xl font-semibold font-montserrat mb-1">Umum</h3>
                    <p class="text-gray-500 text-m">Masyarakat Umum</p>
                </div>
            </div>
            <div id="instansi-card"
                @click="selected = 'instansi'; scrollToServiceContent()"
                :class="['group service-type-card w-full h-64 bg-white rounded-2xl border-2 transition-all duration-200 cursor-pointer flex flex-col items-center justify-center p-6 shadow-sm hover:shadow-lg hover:scale-105 active:scale-95 relative overflow-hidden', 'border-sky-500']"
            >
                <div class="absolute right-4 top-4 opacity-10 text-7xl text-sky-200 pointer-events-none select-none">
                    <i class="fas fa-building"></i>
                </div>
                <div class="z-10 flex flex-col items-center">
                    <div class="w-16 h-16 flex items-center justify-center rounded-full bg-sky-50 mb-3 border border-sky-100">
                        <i class="fas fa-building text-3xl text-sky-500"></i>
                    </div>
                    <h3 class="text-sky-700 text-2xl font-semibold font-montserrat mb-1">Instansi Kerja Sama</h3>
                    <p class="text-gray-500 text-m">Instansi Pemerintah</p>
                </div>
            </div>
            <div id="mahasiswa-card"
                @click="selected = 'mahasiswa'; scrollToServiceContent()"
                :class="['group service-type-card w-full h-64 bg-white rounded-2xl border-2 transition-all duration-200 cursor-pointer flex flex-col items-center justify-center p-6 shadow-sm hover:shadow-lg hover:scale-105 active:scale-95 relative overflow-hidden', 'border-sky-500']"
            >
                <div class="absolute right-4 top-4 opacity-10 text-7xl text-sky-200 pointer-events-none select-none">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div class="z-10 flex flex-col items-center">
                    <div class="w-16 h-16 flex items-center justify-center rounded-full bg-sky-50 mb-3 border border-sky-100">
                        <i class="fas fa-graduation-cap text-3xl text-sky-500"></i>
                    </div>
                    <h3 class="text-sky-700 text-2xl font-semibold font-montserrat mb-1">Mahasiswa</h3>
                    <p class="text-gray-500 text-m">Pendidikan & Penelitian</p>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script>
function scrollToServiceContent() {
    var target = document.getElementById('service-content');
    if (target) {
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
}
</script>
