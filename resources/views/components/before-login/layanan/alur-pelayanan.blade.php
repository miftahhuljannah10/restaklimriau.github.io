<!-- Alur Pelayanan Section Component (Stepper Modern, Angka Transparan di Belakang Ikon) -->
<section class="w-full py-8 md:py-12 bg-gradient-to-br from-slate-50 via-blue-50/30">
    <div class="max-w-[1200px] mx-auto px-4 lg:px-8">
        <!-- Section Title -->
        <div class="text-center mb-10">
            <h2 class="gradient-text text-3xl md:text-3xl font-bold font-montserrat">
                Alur Pelayanan
            </h2>
        </div>

        <!-- Stepper Horizontal -->
        <div class="relative flex flex-col lg:flex-row items-stretch justify-between gap-8 md:gap-10 lg:gap-6 xl:gap-8">
            <!-- Progress Line -->
            <div class="hidden lg:block absolute top-1/2 left-0 right-0 h-1 bg-gradient-to-r from-sky-200 via-sky-400 to-sky-200 z-0" style="transform: translateY(-50%);"></div>

            <!-- Step 1 -->
            <div class="relative z-10 flex flex-col items-center w-full max-w-md mx-auto flex-1 group">
                <!-- Step Number Only -->
                <div class="bg-gradient-to-br from-sky-400 to-sky-600 w-16 h-16 md:w-20 md:h-20 rounded-full flex items-center justify-center shadow-lg mb-4 border-4 border-white group-hover:scale-105 transition-transform duration-200">
                    <span class="text-white text-3xl md:text-4xl font-extrabold font-montserrat">1</span>
                </div>
                <!-- Step Card -->
                <div class="w-full bg-white rounded-2xl border border-sky-200 shadow-md p-5 md:p-7 flex flex-col items-center text-center group-hover:shadow-xl transition-shadow duration-200">
                    <h3 class="text-sky-700 text-lg md:text-xl font-semibold font-montserrat mb-2">
                        Akses Web<br/>Stasiun Klimatologi Riau
                    </h3>
                    <div class="text-gray-600 text-sm md:text-base font-normal font-montserrat leading-relaxed">
                        <p>Cek Ketersediaan Data <a href="#" class="underline text-sky-500 hover:text-sky-600">di sini</a></p>
                        <p>Isi Form & Unggah Dokumen (Surat Pengantar & Identitas Diri)</p>
                        <p>Submit</p>
                    </div>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="relative z-10 flex flex-col items-center w-full max-w-md mx-auto flex-1 group">
                <div class="bg-gradient-to-br from-sky-400 to-sky-600 w-16 h-16 md:w-20 md:h-20 rounded-full flex items-center justify-center shadow-lg mb-4 border-4 border-white group-hover:scale-105 transition-transform duration-200">
                    <span class="text-white text-3xl md:text-4xl font-extrabold font-montserrat">2</span>
                </div>
                <div class="w-full bg-white rounded-2xl border border-sky-200 shadow-md p-5 md:p-7 flex flex-col items-center text-center group-hover:shadow-xl transition-shadow duration-200">
                    <h3 class="text-sky-700 text-lg md:text-xl font-semibold font-montserrat mb-2">
                        Pembayaran PNBP ke<br/>Rekening Negara
                    </h3>
                    <div class="text-gray-600 text-sm md:text-base font-normal font-montserrat leading-relaxed">
                        <p>Unggah Bukti Bayar (jika instansi kerja sama dan mahasiswa dapat langsung melakukan langkah pada tahapan nomor 3)</p>
                    </div>
                </div>
            </div>

            <!-- Step 3 -->
            <div class="relative z-10 flex flex-col items-center w-full max-w-md mx-auto flex-1 group">
                <div class="bg-gradient-to-br from-sky-400 to-sky-600 w-16 h-16 md:w-20 md:h-20 rounded-full flex items-center justify-center shadow-lg mb-4 border-4 border-white group-hover:scale-105 transition-transform duration-200">
                    <span class="text-white text-3xl md:text-4xl font-extrabold font-montserrat">3</span>
                </div>
                <div class="w-full bg-white rounded-2xl border border-sky-200 shadow-md p-5 md:p-7 flex flex-col items-center text-center group-hover:shadow-xl transition-shadow duration-200">
                    <h3 class="text-sky-700 text-lg md:text-xl font-semibold font-montserrat mb-2">
                        Info Ke Pemohon
                    </h3>
                    <div class="text-gray-600 text-sm md:text-base font-normal font-montserrat leading-relaxed">
                        <p>Pemohon Wajib Mengisi Survey Kepuasan Masyarakat</p>
                        <p>Pemohon Menerima Hasil Permohonan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
