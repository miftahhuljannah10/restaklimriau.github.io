<!-- Staff Directory Section Dinamis -->
<section class="relative w-full bg-gradient-to-br from-slate-50 to-blue-50 py-16">
    <div class="max-w-6xl mx-auto px-4 lg:px-8">
        <!-- Kepala Stasiun Dinamis -->
        <section class="mb-16">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold font-montserrat gradient-text mb-4">
                    {{ $kepala_title ?? 'Kepala Stasiun' }}
                </h2>
            </div>
            <div class="flex justify-center">
                <div class="bg-white w-64 h-80 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 relative group hover:scale-105">
                    <div class="relative z-10 flex flex-col h-full">
                        <img src="{{ $kepala['foto'] ?? '/assets/images/SDM.png' }}" alt="Foto Kepala Stasiun" class="w-32 h-40 mx-auto rounded-xl shadow-md mb-4 object-cover">
                        <div class="flex-grow flex flex-col justify-between">
                            <div class="text-center mb-4">
                                <h4 class="text-lg font-bold font-montserrat text-gray-800 mb-1">{{ $kepala['nama'] ?? '' }}</h4>
                                <p class="text-sm text-gray-600 font-montserrat">{{ $kepala['jabatan'] ?? '' }}</p>
                            </div>
                            <a href="{{ $kepala['url'] ?? '#' }}" class="block w-full text-center text-sm font-bold text-sky-500 hover:text-sky-700 transition-colors font-montserrat bg-sky-50 hover:bg-sky-100 py-2 px-4 rounded-lg">
                                Lihat Profil →
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Kelompok Jabatan Fungsional Dinamis -->
        <section class="mb-16">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold font-montserrat gradient-text mb-4">
                    {{ $fungsional_title ?? 'Kelompok Jabatan Fungsional' }}
                </h2>
            </div>
            <div class="flex justify-center mb-6">
                <div class="flex gap-2">
                    <button id="fungsional-prev" class="w-10 h-10 bg-white hover:bg-sky-50 border border-gray-200 rounded-full flex items-center justify-center transition-colors shadow-sm">
                        <i class="fas fa-chevron-left text-gray-600"></i>
                    </button>
                    <button id="fungsional-next" class="w-10 h-10 bg-white hover:bg-sky-50 border border-gray-200 rounded-full flex items-center justify-center transition-colors shadow-sm">
                        <i class="fas fa-chevron-right text-gray-600"></i>
                    </button>
                </div>
            </div>
            <div class="flex justify-center"><div class="relative overflow-hidden max-w-6xl">
                <div id="fungsional-track" class="flex gap-6 transition-transform duration-300 ease-in-out">
                    @foreach(($fungsional ?? []) as $staff)
                    <div class="bg-white w-64 h-80 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 flex-shrink-0 hover:scale-105">
                        <div class="flex flex-col h-full">
                            <img src="{{ $staff['foto'] ?? '/assets/images/SDM.png' }}" alt="Foto Staff" class="w-32 h-40 mx-auto rounded-xl object-cover mb-4 shadow-sm">
                            <div class="flex-grow flex flex-col justify-between">
                                <div class="text-center mb-4">
                                    <h4 class="text-lg font-bold font-montserrat text-gray-800 mb-1">{{ $staff['nama'] ?? '' }}</h4>
                                    <p class="text-sm text-gray-600 font-montserrat">{{ $staff['jabatan'] ?? '' }}</p>
                                </div>
                                <a href="{{ $staff['url'] ?? '#' }}" class="block w-full text-center text-sm font-bold text-sky-500 hover:text-sky-700 transition-colors font-montserrat bg-sky-50 hover:bg-sky-100 py-2 px-4 rounded-lg">
                                    Lihat Profil →
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div></div>
        </section>

        <!-- PPNPN Dinamis -->
        <section class="mb-16">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold font-montserrat gradient-text mb-4">
                    {{ $ppnpn_title ?? 'PPNPN' }}
                </h2>
            </div>
            <div class="flex justify-center mb-6">
                <div class="flex gap-2">
                    <button id="ppnpn-prev" class="w-10 h-10 bg-white hover:bg-sky-50 border border-gray-200 rounded-full flex items-center justify-center transition-colors shadow-sm">
                        <i class="fas fa-chevron-left text-gray-600"></i>
                    </button>
                    <button id="ppnpn-next" class="w-10 h-10 bg-white hover:bg-sky-50 border border-gray-200 rounded-full flex items-center justify-center transition-colors shadow-sm">
                        <i class="fas fa-chevron-right text-gray-600"></i>
                    </button>
                </div>
            </div>
            <div class="flex justify-center"><div class="relative overflow-hidden max-w-6xl">
                <div id="ppnpn-track" class="flex gap-6 transition-transform duration-300 ease-in-out">
                    @foreach(($ppnpn ?? []) as $staff)
                    <div class="bg-white w-64 h-80 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 flex-shrink-0 hover:scale-105">
                        <div class="flex flex-col h-full">
                            <img src="{{ $staff['foto'] ?? '/assets/images/SDM.png' }}" alt="Foto PPNPN" class="w-32 h-40 mx-auto rounded-xl object-cover mb-4 shadow-sm">
                            <div class="flex-grow flex flex-col justify-between">
                                <div class="text-center mb-4">
                                    <h4 class="text-lg font-bold font-montserrat text-gray-800 mb-1">{{ $staff['nama'] ?? '' }}</h4>
                                    <p class="text-sm text-gray-600 font-montserrat">{{ $staff['jabatan'] ?? '' }}</p>
                                </div>
                                <a href="{{ $staff['url'] ?? '#' }}" class="block w-full text-center text-sm font-bold text-sky-500 hover:text-sky-700 transition-colors font-montserrat bg-sky-50 hover:bg-sky-100 py-2 px-4 rounded-lg">
                                    Lihat Profil →
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div></div>
        </section>

        <!-- Alumni Pegawai Dinamis -->
        <section class="mb-16">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold font-montserrat gradient-text mb-4">
                    {{ $alumni_title ?? 'Alumni Pegawai' }}
                </h2>
            </div>
            <div class="flex justify-center mb-6">
                <div class="flex gap-2">
                    <button id="alumni-prev" class="w-10 h-10 bg-white hover:bg-sky-50 border border-gray-200 rounded-full flex items-center justify-center transition-colors shadow-sm">
                        <i class="fas fa-chevron-left text-gray-600"></i>
                    </button>
                    <button id="alumni-next" class="w-10 h-10 bg-white hover:bg-sky-50 border border-gray-200 rounded-full flex items-center justify-center transition-colors shadow-sm">
                        <i class="fas fa-chevron-right text-gray-600"></i>
                    </button>
                </div>
            </div>
            <div class="flex justify-center"><div class="relative overflow-hidden max-w-6xl">
                <div id="alumni-track" class="flex gap-6 transition-transform duration-300 ease-in-out">
                    @foreach(($alumni ?? []) as $staff)
                    <div class="bg-white w-64 h-80 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 flex-shrink-0 hover:scale-105">
                        <div class="flex flex-col h-full">
                            <img src="{{ $staff['foto'] ?? '/assets/images/SDM.png' }}" alt="Foto Alumni" class="w-32 h-40 mx-auto rounded-xl object-cover mb-4 shadow-sm">
                            <div class="flex-grow flex flex-col justify-between">
                                <div class="text-center mb-4">
                                    <h4 class="text-lg font-bold font-montserrat text-gray-800 mb-1">{{ $staff['nama'] ?? '' }}</h4>
                                    <p class="text-sm text-gray-600 font-montserrat">{{ $staff['jabatan'] ?? '' }}</p>
                                </div>
                                <a href="{{ $staff['url'] ?? '#' }}" class="block w-full text-center text-sm font-bold text-sky-500 hover:text-sky-700 transition-colors font-montserrat bg-sky-50 hover:bg-sky-100 py-2 px-4 rounded-lg">
                                    Lihat Profil →
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div></div>
        </section>
    </div>
</section>

<!-- JS dipindahkan ke app.js -->
