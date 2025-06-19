<!-- Jenis Pelayanan Section Component -->
<section class="w-full py-8 md:py-12 lg:py-2 mb-16 bg-white">
    <div class="max-w-[1440px] mx-auto px-4 lg:px-8">
        <!-- Section Title -->
        <div class="text-center mb-8 md:mb-10 lg:mb-12">
            <h2 class="text-black text-3xl md:text-3xl font-bold font-montserrat">
                Jenis Pelayanan
            </h2>
        </div>

        <!-- Services Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 lg:gap-8 max-w-[1290px] mx-auto">

            <!-- Form Layanan -->
            <div onclick="handleServiceClick('Form Layanan')"
                class="service-card w-full h-80 md:h-84 lg:h-96 px-4 md:px-6 py-8 md:py-10 lg:py-12 bg-white rounded-[20px] shadow-[4px_7px_14px_2px_rgba(0,0,0,0.25)] border flex flex-col items-center hover:transform hover:scale-105 transition-all duration-300 cursor-pointer"
                tabindex="0" role="button" aria-label="Klik untuk membuka Form Layanan">
                <!-- Icon -->
                <div class="w-20 h-20 mb-4 md:mb-5 lg:mb-6 flex items-center justify-center">
                    <div class="w-20 h-20 bg-sky-500 rounded-lg flex items-center justify-center">
                        <i class="fas fa-tasks text-white text-2xl"></i>
                    </div>
                </div>

                <!-- Content -->
                <div class="flex-1 flex flex-col justify-center text-center">
                    <!-- Title -->
                    <div class="mb-3 md:mb-4">
                        <h3 class="text-black text-lg md:text-xl lg:text-2xl font-semibold font-montserrat">
                            Form Layanan
                        </h3>
                    </div>

                    <!-- Description -->
                    <div>
                        <p
                            class="text-black text-sm md:text-base lg:text-xl font-normal font-montserrat leading-relaxed">
                            Merupakan Layanan Jasa MKKuG
                        </p>
                    </div>
                </div>
            </div>

            <!-- Survey Kepuasan Masyarakat -->
            <div onclick="handleServiceClick('Survey Kepuasan Masyarakat')"
                class="service-card w-full h-80 md:h-84 lg:h-96 px-4 md:px-6 py-8 md:py-10 lg:py-12 bg-white rounded-[20px] shadow-[4px_7px_14px_2px_rgba(0,0,0,0.25)] border flex flex-col items-center hover:transform hover:scale-105 transition-all duration-300 cursor-pointer"
                tabindex="0" role="button" aria-label="Klik untuk membuka Survey Kepuasan Masyarakat">
                <!-- Icon -->
                <div class="w-20 h-20 mb-4 md:mb-5 lg:mb-6 flex items-center justify-center">
                    <div class="w-20 h-20 bg-sky-500 rounded-lg flex items-center justify-center">
                        <i class="fas fa-edit text-white text-2xl"></i>
                    </div>
                </div>

                <!-- Content -->
                <div class="flex-1 flex flex-col justify-center text-center">
                    <!-- Title -->
                    <div class="mb-3 md:mb-4">
                        <h3 class="text-black text-lg md:text-xl lg:text-2xl font-semibold font-montserrat">
                            Survey Kepuasan Masyarakat
                        </h3>
                    </div>

                    <!-- Description -->
                    <div>
                        <p
                            class="text-black text-sm md:text-base lg:text-xl font-normal font-montserrat leading-relaxed">
                            Pengisian Survey berdasarkan kualitas pelayanan Stasiun Klimatologi Riau
                        </p>
                    </div>
                </div>
            </div>

            <!-- Tarif PNBP -->
            <div onclick="handleServiceClick('Tarif PNBP')"
                class="service-card w-full h-80 md:h-84 lg:h-96 px-4 md:px-6 py-8 md:py-10 lg:py-12 bg-white rounded-[20px] shadow-[4px_7px_14px_2px_rgba(0,0,0,0.25)] border flex flex-col items-center hover:transform hover:scale-105 transition-all duration-300 cursor-pointer"
                tabindex="0" role="button" aria-label="Klik untuk membuka Tarif PNBP">
                <!-- Icon -->
                <div class="w-20 h-20 mb-4 md:mb-5 lg:mb-6 flex items-center justify-center">
                    <div class="w-20 h-20 bg-sky-500 rounded-lg flex items-center justify-center">
                        <i class="fas fa-database text-white text-2xl"></i>
                    </div>
                </div>

                <!-- Content -->
                <div class="flex-1 flex flex-col justify-center text-center">
                    <!-- Title -->
                    <div class="mb-3 md:mb-4">
                        <h3 class="text-black text-lg md:text-xl lg:text-2xl font-semibold font-montserrat">
                            Tarif PNBP
                        </h3>
                    </div>

                    <!-- Description -->
                    <div>
                        <p
                            class="text-black text-sm md:text-base lg:text-xl font-normal font-montserrat leading-relaxed">
                            Daftar Tarif PNBP sesuai PP Nomor 47 Tahun 2018
                        </p>
                    </div>
                </div>
            </div>

            <!-- Surat 0 Rupiah -->
            <div onclick="handleServiceClick('Surat 0 Rupiah')"
                class="service-card w-full h-80 md:h-84 lg:h-96 px-4 md:px-6 py-8 md:py-10 lg:py-12 bg-white rounded-[20px] shadow-[4px_7px_14px_2px_rgba(0,0,0,0.25)] border  flex flex-col items-center hover:transform hover:scale-105 transition-all duration-300 cursor-pointer"
                tabindex="0" role="button" aria-label="Klik untuk membuka Surat 0 Rupiah">
                <!-- Icon -->
                <div class="w-20 h-20 mb-4 md:mb-5 lg:mb-6 flex items-center justify-center">
                    <div class="w-20 h-20 bg-sky-500 rounded-lg flex items-center justify-center">
                        <i class="fas fa-envelope text-white text-2xl"></i>
                    </div>
                </div>

                <!-- Content -->
                <div class="flex-1 flex flex-col justify-center text-center">
                    <!-- Title -->
                    <div class="mb-3 md:mb-4">
                        <h3 class="text-black text-lg md:text-xl lg:text-2xl font-semibold font-montserrat">
                            Surat 0 Rupiah
                        </h3>
                    </div>

                    <!-- Description -->
                    <div>
                        <p
                            class="text-black text-sm md:text-base lg:text-xl font-normal font-montserrat leading-relaxed">
                            Pengisian Surat 0 Rupiah hanya berlaku untuk pengajuan Mahasiswa
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

