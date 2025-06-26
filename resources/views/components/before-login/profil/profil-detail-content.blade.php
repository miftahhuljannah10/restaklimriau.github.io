<!-- Header Section with Background -->
<div class="relative bg-sky-600 to  px-6 py-10">
    <div class="absolute inset-0 bg-black opacity-10"></div>
    <div class="relative z-10">

        <!-- Profile Photo and Info - Centered Layout -->
        <div class="flex flex-col items-center text-center space-y-5">
            <!-- Profile Photo -->
            <div class="relative">
                <div class="w-40 h-52 rounded-xl overflow-hidden shadow-lg border-2 border-white/50 backdrop-blur-sm mx-auto">
                    <img id="profile-image"
                         src="/assets/images/sdm.png"
                         alt="Foto Edi Rahmanto, S.Tr"
                         class="w-full h-full object-cover transition-transform duration-300 hover:scale-105">
                </div>
            </div>

            <!-- Basic Info - Centered -->
            <div class="text-white space-y-3 max-w-lg">
                <h2 id="profile-nama" class="text-2xl font-bold mb-1">Edi Rahmanto, S.Tr</h2>
                <p id="profile-jabatan" class="text-xl font-semibold mb-3">PMG Pertama</p>
            </div>
        </div>
    </div>
</div>

<!-- Detailed Information -->
<div class="p-8">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Nama Lengkap -->
        <div class="bg-gray-50 rounded-xl p-4 hover:bg-gray-100 transition-colors duration-200">
            <div class="flex items-start">
                <div class="w-8 h-8 bg-blue-500 rounded-lg flex items-center justify-center mr-3 mt-1">
                    <i class="fas fa-signature text-white text-sm"></i>
                </div>
                <div class="flex-1">
                    <h4 class="font-semibold text-gray-700 mb-1">Nama Lengkap</h4>
                    <p id="profile-nama-detail" class="text-gray-900 font-regular">Edi Rahmanto, S.Tr</p>
                </div>
            </div>
        </div>

        <!-- NIP -->
        <div class="bg-gray-50 rounded-xl p-4 hover:bg-gray-100 transition-colors duration-200">
            <div class="flex items-start">
                <div class="w-8 h-8 bg-green-500 rounded-lg flex items-center justify-center mr-3 mt-1">
                    <i class="fas fa-id-card text-white text-sm"></i>
                </div>
                <div class="flex-1">
                    <h4 class="font-semibold text-gray-700 mb-1">Nomor Induk Pegawai</h4>
                    <p id="profile-nip-detail" class="text-gray-900 font-regular">199702252020011002</p>
                </div>
            </div>
        </div>

        <!-- Tempat Lahir -->
        <div class="bg-gray-50 rounded-xl p-4 hover:bg-gray-100 transition-colors duration-200">
            <div class="flex items-start">
                <div class="w-8 h-8 bg-purple-500 rounded-lg flex items-center justify-center mr-3 mt-1">
                    <i class="fas fa-map-marker-alt text-white text-sm"></i>
                </div>
                <div class="flex-1">
                    <h4 class="font-semibold text-gray-700 mb-1">Tempat, Tanggal Lahir</h4>
                    <p id="profile-tempat-lahir-detail" class="text-gray-900 font-regular">Edi Rahmanto, S.Tr</p>
                </div>
            </div>
        </div>

        <!-- Jabatan -->
        <div class="bg-gray-50 rounded-xl p-4 hover:bg-gray-100 transition-colors duration-200">
            <div class="flex items-start">
                <div class="w-8 h-8 bg-indigo-500 rounded-lg flex items-center justify-center mr-3 mt-1">
                    <i class="fas fa-user-tie text-white text-sm"></i>
                </div>
                <div class="flex-1">
                    <h4 class="font-semibold text-gray-700 mb-1">Jabatan</h4>
                    <p id="profile-jabatan-detail" class="text-gray-900 font-regular">PMG Pertama</p>
                </div>
            </div>
        </div>

        <!-- Golongan -->
        <div class="bg-gray-50 rounded-xl p-4 hover:bg-gray-100 transition-colors duration-200">
            <div class="flex items-start">
                <div class="w-8 h-8 bg-red-500 rounded-lg flex items-center justify-center mr-3 mt-1">
                    <i class="fas fa-medal text-white text-sm"></i>
                </div>
                <div class="flex-1">
                    <h4 class="font-semibold text-gray-700 mb-1">Golongan</h4>
                    <p id="profile-golongan-detail" class="text-gray-900 font-regular">III/A</p>
                </div>
            </div>
        </div>

        <!-- Pendidikan -->
        <div class="bg-gray-50 rounded-xl p-4 hover:bg-gray-100 transition-colors duration-200">
            <div class="flex items-start">
                <div class="w-8 h-8 bg-orange-500 rounded-lg flex items-center justify-center mr-3 mt-1">
                    <i class="fas fa-graduation-cap text-white text-sm"></i>
                </div>
                <div class="flex-1">
                    <h4 class="font-semibold text-gray-700 mb-1">Pendidikan Terakhir</h4>
                    <p id="profile-pendidikan-detail" class="text-gray-900 font-regular">D-IV</p>
                </div>
            </div>
        </div>

        <!-- Kompetensi -->
        <div class="bg-gray-50 rounded-xl p-4 hover:bg-gray-100 transition-colors duration-200">
            <div class="flex items-start">
                <div class="w-8 h-8 bg-teal-500 rounded-lg flex items-center justify-center mr-3 mt-1">
                    <i class="fas fa-cogs text-white text-sm"></i>
                </div>
                <div class="flex-1">
                    <h4 class="font-semibold text-gray-700 mb-1">Kompetensi</h4>
                    <p id="profile-kompetensi-detail" class="text-gray-900 font-regular">Prakirawan, Analis Iklim</p>
                </div>
            </div>
        </div>

        <!-- Email -->
        <div class="bg-gray-50 rounded-xl p-4 hover:bg-gray-100 transition-colors duration-200">
            <div class="flex items-start">
                <div class="w-8 h-8 bg-pink-500 rounded-lg flex items-center justify-center mr-3 mt-1">
                    <i class="fas fa-envelope text-white text-sm"></i>
                </div>
                <div class="flex-1">
                    <h4 class="font-semibold text-gray-700 mb-1">Email</h4>
                    <a id="profile-email-detail" href="mailto:edirahmanto125@gmail.com" class="text-blue-600 font-regular hover:text-blue-800 transition-colors duration-200">edirahmanto125@gmail.com</a>
                </div>
            </div>
        </div>

        <!-- Publikasi -->
        <div class="bg-gray-50 rounded-xl p-4 hover:bg-gray-100 transition-colors duration-200">
            <div class="flex items-start">
                <div class="w-8 h-8 bg-yellow-500 rounded-lg flex items-center justify-center mr-3 mt-1">
                    <i class="fas fa-book text-white text-sm"></i>
                </div>
                <div class="flex-1">
                    <h4 class="font-semibold text-gray-700 mb-1">Publikasi</h4>
                    <a id="profile-publikasi" href="https://www.researchgate.net/profile/Edi_Rahmanto" target="_blank" class="text-blue-600 font-regular hover:text-blue-800 transition-colors duration-200 break-all">https://www.researchgate.net/profile/Edi_Rahmanto</a>
                </div>
            </div>
        </div>
    </div>
</div>
