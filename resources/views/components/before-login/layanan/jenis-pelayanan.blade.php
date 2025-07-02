<!-- Jenis Pelayanan Section Component (Modern & Selaras) -->
<section class="w-full py-4 md:py-12 bg-gradient-to-br from-slate-50 via-blue-50/30">
    <div class="max-w-[1440px] mx-auto px-4 lg:px-8">
        <!-- Section Title -->
        <div class="text-center mb-8 md:mb-10 lg:mb-12">
            <h2 class="gradient-text text-3xl md:text-3xl font-bold font-montserrat">
                Jenis Pelayanan
            </h2>
        </div>

        <!-- Services Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 lg:gap-8 max-w-[1290px] mx-auto">

            <!-- Form Layanan -->
            <div onclick="handleServiceClick('Form Layanan')" class="service-card w-full h-80 md:h-84 lg:h-96 px-4 md:px-6 py-8 md:py-10 lg:py-12 bg-white rounded-2xl border border-sky-100 shadow-md flex flex-col items-center hover:shadow-xl hover:-translate-y-1 transition-all duration-300 cursor-pointer group" tabindex="0" role="button" aria-label="Klik untuk membuka Form Layanan">
                <!-- Icon -->
                <div class="w-20 h-20 mb-5 flex items-center justify-center">
                    <div class="w-20 h-20 bg-gradient-to-br from-sky-400 to-sky-600 rounded-full flex items-center justify-center shadow-lg group-hover:scale-105 transition-transform duration-200">
                        <i class="fas fa-tasks text-white text-3xl"></i>
                    </div>
                </div>
                <!-- Content -->
                <div class="flex-1 flex flex-col justify-center text-center">
                    <!-- Title -->
                    <div class="mb-3">
                        <h3 class="text-sky-700 text-2xl md:text-2xl lg:text-2xl font-semibold font-montserrat">
                            Form Layanan
                        </h3>
                    </div>
                    <!-- Description -->
                    <div>
                        <p class="text-gray-600 text-base md:text-base lg:text-xl font-normal font-montserrat leading-relaxed">
                            Merupakan Layanan Jasa MKKuG
                        </p>
                    </div>
                </div>
            </div>

            <!-- Survey Kepuasan Masyarakat -->
            <a href="https://eskm.bmkg.go.id/survey/418106/0/1/2025-05/2025/0" target="_blank" rel="noopener" class="service-card w-full h-80 md:h-84 lg:h-96 px-4 md:px-6 py-8 md:py-10 lg:py-12 bg-white rounded-2xl border border-sky-100 shadow-md flex flex-col items-center hover:shadow-xl hover:-translate-y-1 transition-all duration-300 cursor-pointer group text-inherit no-underline" tabindex="0" role="button" aria-label="Klik untuk membuka Survey Kepuasan Masyarakat">
                <!-- Icon -->
                <div class="w-20 h-20 mb-5 flex items-center justify-center">
                    <div class="w-20 h-20 bg-gradient-to-br from-sky-400 to-sky-600 rounded-full flex items-center justify-center shadow-lg group-hover:scale-105 transition-transform duration-200">
                        <i class="fas fa-edit text-white text-3xl"></i>
                    </div>
                </div>
                <!-- Content -->
                <div class="flex-1 flex flex-col justify-center text-center">
                    <!-- Title -->
                    <div class="mb-3">
                        <h3 class="text-sky-700 text-2xl md:text-2xl lg:text-2xl font-semibold font-montserrat">
                            Survey Kepuasan Masyarakat
                        </h3>
                    </div>
                    <!-- Description -->
                    <div>
                        <p class="text-gray-600 text-base md:text-base lg:text-xl font-normal font-montserrat leading-relaxed">
                            Survey online untuk menilai kepuasan masyarakat terhadap layanan BMKG.
                        </p>
                    </div>
                </div>
            </a>

            <!-- Tarif PNBP -->
            <div onclick="handleServiceClick('Tarif PNBP')" class="service-card w-full h-80 md:h-84 lg:h-96 px-4 md:px-6 py-8 md:py-10 lg:py-12 bg-white rounded-2xl border border-sky-100 shadow-md flex flex-col items-center hover:shadow-xl hover:-translate-y-1 transition-all duration-300 cursor-pointer group" tabindex="0" role="button" aria-label="Klik untuk membuka Tarif PNBP">
                <!-- Icon -->
                <div class="w-20 h-20 mb-5 flex items-center justify-center">
                    <div class="w-20 h-20 bg-gradient-to-br from-sky-400 to-sky-600 rounded-full flex items-center justify-center shadow-lg group-hover:scale-105 transition-transform duration-200">
                        <i class="fas fa-database text-white text-3xl"></i>
                    </div>
                </div>
                <!-- Content -->
                <div class="flex-1 flex flex-col justify-center text-center">
                    <!-- Title -->
                    <div class="mb-3">
                        <h3 class="text-sky-700 text-2xl md:text-2xl lg:text-2xl font-semibold font-montserrat">
                            Tarif PNBP
                        </h3>
                    </div>
                    <!-- Description -->
                    <div>
                        <p class="text-gray-600 text-base md:text-base lg:text-xl font-normal font-montserrat leading-relaxed">
                            Daftar Tarif PNBP sesuai PP Nomor 47 Tahun 2018
                        </p>
                    </div>
                </div>
            </div>

            <!-- Surat 0 Rupiah -->
            <a href="/downloads/Surat Nol (0) rupiah.pdf" target="_blank" rel="noopener" class="service-card w-full h-80 md:h-84 lg:h-96 px-4 md:px-6 py-8 md:py-10 lg:py-12 bg-white rounded-2xl border border-sky-100 shadow-md flex flex-col items-center hover:shadow-xl hover:-translate-y-1 transition-all duration-300 cursor-pointer group text-inherit no-underline" tabindex="0" role="button" aria-label="Klik untuk membuka Surat 0 Rupiah">
                <!-- Icon -->
                <div class="w-20 h-20 mb-5 flex items-center justify-center">
                    <div class="w-20 h-20 bg-gradient-to-br from-sky-400 to-sky-600 rounded-full flex items-center justify-center shadow-lg group-hover:scale-105 transition-transform duration-200">
                        <i class="fas fa-file-pdf text-white text-3xl"></i>
                    </div>
                </div>
                <!-- Content -->
                <div class="flex-1 flex flex-col justify-center text-center">
                    <!-- Title -->
                    <div class="mb-3">
                        <h3 class="text-sky-700 text-2xl md:text-2xl lg:text-2xl font-semibold font-montserrat">
                            Surat 0 Rupiah
                        </h3>
                    </div>
                    <!-- Description -->
                    <div>
                        <p class="text-gray-600 text-base md:text-base lg:text-xl font-normal font-montserrat leading-relaxed">
                            Download contoh surat permohonan layanan tanpa biaya (0 Rupiah).
                        </p>
                    </div>
                </div>
            </a>

        </div>
    </div>
</section>
