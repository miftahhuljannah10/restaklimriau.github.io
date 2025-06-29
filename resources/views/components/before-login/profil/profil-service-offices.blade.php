<!-- Service Offices Section -->
<section>
    <div class="max-w-[1440px] mx-auto px-4 lg:px-10">
        <!-- Tab Navigation -->
        <div class="flex justify-center mb-12">
            <div class="tab-container flex gap-3">
                <!-- Administrative Office Tab -->
                <button
                    id="admin-tab"
                    class="service-tab active px-8 py-3 text-sm font-semibold font-montserrat rounded-lg transition-all duration-300 bg-sky-500 text-white shadow"
                    type="button"
                >
                    Kantor Pelayanan Administrasi
                </button>

                <!-- Operational Office Tab -->
                <button
                    id="operational-tab"
                    class="service-tab px-8 py-3 text-sm font-semibold font-montserrat rounded-lg transition-all duration-300 bg-sky-50 text-sky-600"
                    type="button"
                >
                    Kantor Pelayanan Operasional
                </button>
            </div>
        </div>

        <!-- Tab Content -->
        <div class="relative">
            <!-- Administrative Office Content -->
            <div id="admin-content" class="tab-content active">
                <!-- Office Image -->
                <div class="flex justify-center mb-8">
                    <div class="w-full max-w-2xl">
                        <img
                            src="/assets/images/kantor.png"
                            alt="Kantor Pelayanan Administrasi"
                            class="w-full h-64 object-cover rounded-xl shadow-lg"
                        />
                    </div>
                </div>

                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-slate-800 font-montserrat mb-4">Kantor Pelayanan Administrasi</h2>
                    <p class="text-slate-600 text-lg font-normal font-montserrat max-w-3xl mx-auto leading-relaxed">
                        Kantor Pelayanan Administrasi memberikan layanan berupa informasi bidang Klimatologi dengan berbagai jenis analisis dan prakiraan cuaca yang komprehensif.
                    </p>
                    <div class="mt-8">
                        <h3 class="text-xl font-semibold text-slate-700 font-montserrat mb-2">Jenis-Jenis Layanan</h3>
                        <div class="w-24 h-1 bg-sky-500 mx-auto rounded-full"></div>
                    </div>
                </div>

                <!-- Services Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <!-- Analisis -->
                    <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 text-center border border-gray-100 hover:border-sky-200">
                        <div class="w-full h-40 bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl mb-6 flex items-center justify-center relative overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-br from-blue-400/10 to-blue-600/10"></div>
                            <div class="text-blue-600 text-5xl relative z-10">📊</div>
                        </div>
                        <h4 class="text-xl font-bold text-slate-800 font-montserrat mb-4">Analisis</h4>
                        <ul class="text-left text-sm text-slate-600 font-montserrat space-y-2">
                            <li class="flex items-start">
                                <span class="text-sky-500 mr-2 mt-1">✓</span>
                                <span>Analisis Curah Hujan (Dasarian dan Bulanan)</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-sky-500 mr-2 mt-1">✓</span>
                                <span>Analisis Sifat Hujan (Dasarian dan Bulanan)</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-sky-500 mr-2 mt-1">✓</span>
                                <span>Analisis Dinamika Atmosfer</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-sky-500 mr-2 mt-1">✓</span>
                                <span>Monitoring Hari Tanpa Hujan</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-sky-500 mr-2 mt-1">✓</span>
                                <span>Standardized Precipitation Index</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Prakiraan -->
                    <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 text-center border border-gray-100 hover:border-purple-200">
                        <div class="w-full h-40 bg-gradient-to-br from-purple-50 to-purple-100 rounded-xl mb-6 flex items-center justify-center relative overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-br from-purple-400/10 to-purple-600/10"></div>
                            <div class="text-purple-600 text-5xl relative z-10">🌤️</div>
                        </div>
                        <h4 class="text-xl font-bold text-slate-800 font-montserrat mb-4">Prakiraan</h4>
                        <ul class="text-left text-sm text-slate-600 font-montserrat space-y-2">
                            <li class="flex items-start">
                                <span class="text-sky-500 mr-2 mt-1">✓</span>
                                <span>Prakiraan Curah Hujan (Dasarian dan Bulanan)</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-sky-500 mr-2 mt-1">✓</span>
                                <span>Prakiraan Sifat Hujan (Dasarian dan Bulanan)</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-sky-500 mr-2 mt-1">✓</span>
                                <span>Prakiraan Dinamika Atmosfer</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-sky-500 mr-2 mt-1">✓</span>
                                <span>Prakiraan Daerah Potensi Banjir</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-sky-500 mr-2 mt-1">✓</span>
                                <span>Prakiraan Musim</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Informasi Kualitas Udara -->
                    <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 text-center border border-gray-100 hover:border-green-200">
                        <div class="w-full h-40 bg-gradient-to-br from-green-50 to-green-100 rounded-xl mb-6 flex items-center justify-center relative overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-br from-green-400/10 to-green-600/10"></div>
                            <div class="text-green-600 text-5xl relative z-10">🌬️</div>
                        </div>
                        <h4 class="text-xl font-bold text-slate-800 font-montserrat mb-4">Informasi Kualitas Udara</h4>
                        <ul class="text-left text-sm text-slate-600 font-montserrat space-y-2">
                            <li class="flex items-start">
                                <span class="text-sky-500 mr-2 mt-1">✓</span>
                                <span>PM10</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-sky-500 mr-2 mt-1">✓</span>
                                <span>PM2.5</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-sky-500 mr-2 mt-1">✓</span>
                                <span>TSP</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-sky-500 mr-2 mt-1">✓</span>
                                <span>Kimia Air Hujan</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-sky-500 mr-2 mt-1">✓</span>
                                <span>Daya Hantar Listrik</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Pelayanan Data Lainnya -->
                    <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 text-center border border-gray-100 hover:border-orange-200">
                        <div class="w-full h-40 bg-gradient-to-br from-orange-50 to-orange-100 rounded-xl mb-6 flex items-center justify-center relative overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-br from-orange-400/10 to-orange-600/10"></div>
                            <div class="text-orange-600 text-5xl relative z-10">👥</div>
                        </div>
                        <h4 class="text-xl font-bold text-slate-800 font-montserrat mb-4">Pelayanan Data Lainnya</h4>
                        <ul class="text-left text-sm text-slate-600 font-montserrat space-y-2">
                            <li class="flex items-start">
                                <span class="text-sky-500 mr-2 mt-1">✓</span>
                                <span>Mahasiswa</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-sky-500 mr-2 mt-1">✓</span>
                                <span>Instansi Kerja Sama</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-sky-500 mr-2 mt-1">✓</span>
                                <span>Umum</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Operational Office Content -->
            <div id="operational-content" class="tab-content hidden">
                <!-- Office Image -->
                <div class="flex justify-center mb-8">
                    <div class="w-full max-w-2xl">
                        <img
                            src="/assets/images/kantor.png"
                            alt="Kantor Pelayanan Operasional"
                            class="w-full h-64 object-cover rounded-xl shadow-lg"
                        >
                    </div>
                </div>

                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-slate-800 font-montserrat mb-4">Kantor Pelayanan Operasional</h2>
                    <p class="text-slate-600 text-lg font-normal font-montserrat max-w-3xl mx-auto leading-relaxed">
                        Kantor Pelayanan Operasional memberikan layanan teknis dan operasional terkait pengamatan, pengolahan, dan penyebaran data klimatologi.
                    </p>
                    <div class="mt-8">
                        <h3 class="text-xl font-semibold text-slate-700 font-montserrat mb-2">Jenis-Jenis Layanan</h3>
                        <div class="w-24 h-1 bg-sky-500 mx-auto rounded-full"></div>
                    </div>
                </div>

                <!-- Services Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <!-- Suhu -->
                    <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 text-center border border-gray-100 hover:border-blue-200">
                        <div class="w-20 h-20 bg-gradient-to-br from-blue-100 to-blue-200 rounded-full flex items-center justify-center mx-auto mb-6 shadow-md">
                            <div class="text-blue-600 text-3xl">🌡️</div>
                        </div>
                        <h4 class="text-xl font-bold text-slate-800 font-montserrat mb-4">Suhu</h4>
                        <ul class="text-left text-sm text-slate-600 font-montserrat space-y-2">
                            <li class="flex items-start">
                                <span class="text-sky-500 mr-2 mt-1">✓</span>
                                <span>Suhu Maksimum</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-sky-500 mr-2 mt-1">✓</span>
                                <span>Suhu Minimum</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-sky-500 mr-2 mt-1">✓</span>
                                <span>Suhu Rata-Rata</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Tekanan -->
                    <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 text-center border border-gray-100 hover:border-purple-200">
                        <div class="w-20 h-20 bg-gradient-to-br from-purple-100 to-purple-200 rounded-full flex items-center justify-center mx-auto mb-6 shadow-md">
                            <div class="text-purple-600 text-3xl">⚡</div>
                        </div>
                        <h4 class="text-xl font-bold text-slate-800 font-montserrat mb-4">Tekanan</h4>
                        <ul class="text-left text-sm text-slate-600 font-montserrat space-y-2">
                            <li class="flex items-start">
                                <span class="text-sky-500 mr-2 mt-1">✓</span>
                                <span>Barometer Digital</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Angin -->
                    <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 text-center border border-gray-100 hover:border-green-200">
                        <div class="w-20 h-20 bg-gradient-to-br from-green-100 to-green-200 rounded-full flex items-center justify-center mx-auto mb-6 shadow-md">
                            <div class="text-green-600 text-3xl">💨</div>
                        </div>
                        <h4 class="text-xl font-bold text-slate-800 font-montserrat mb-4">Angin</h4>
                        <ul class="text-left text-sm text-slate-600 font-montserrat space-y-2">
                            <li class="flex items-start">
                                <span class="text-sky-500 mr-2 mt-1">✓</span>
                                <span>Arah Angin Ketinggian (4m, 7m, 10m)</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-sky-500 mr-2 mt-1">✓</span>
                                <span>Kecepatan Angin (0,5m, 2m, 4m, 7m, 10m)</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Kelembaban -->
                    <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 text-center border border-gray-100 hover:border-cyan-200">
                        <div class="w-20 h-20 bg-gradient-to-br from-cyan-100 to-cyan-200 rounded-full flex items-center justify-center mx-auto mb-6 shadow-md">
                            <div class="text-cyan-600 text-3xl">💧</div>
                        </div>
                        <h4 class="text-xl font-bold text-slate-800 font-montserrat mb-4">Kelembaban</h4>
                        <ul class="text-left text-sm text-slate-600 font-montserrat space-y-2">
                            <li class="flex items-start">
                                <span class="text-sky-500 mr-2 mt-1">✓</span>
                                <span>Relative Humidity</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Matahari -->
                    <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 text-center border border-gray-100 hover:border-yellow-200">
                        <div class="w-20 h-20 bg-gradient-to-br from-yellow-100 to-yellow-200 rounded-full flex items-center justify-center mx-auto mb-6 shadow-md">
                            <div class="text-yellow-600 text-3xl">☀️</div>
                        </div>
                        <h4 class="text-xl font-bold text-slate-800 font-montserrat mb-4">Matahari</h4>
                        <ul class="text-left text-sm text-slate-600 font-montserrat space-y-2">
                            <li class="flex items-start">
                                <span class="text-sky-500 mr-2 mt-1">✓</span>
                                <span>Sunshine Duration</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-sky-500 mr-2 mt-1">✓</span>
                                <span>Albedo</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-sky-500 mr-2 mt-1">✓</span>
                                <span>Diffuse Radiation</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-sky-500 mr-2 mt-1">✓</span>
                                <span>Normal Irradiation (DNI)</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-sky-500 mr-2 mt-1">✓</span>
                                <span>Global Radiation</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-sky-500 mr-2 mt-1">✓</span>
                                <span>Nett Radiation</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Penguapan -->
                    <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 text-center border border-gray-100 hover:border-teal-200">
                        <div class="w-20 h-20 bg-gradient-to-br from-teal-100 to-teal-200 rounded-full flex items-center justify-center mx-auto mb-6 shadow-md">
                            <div class="text-teal-600 text-3xl">🌊</div>
                        </div>
                        <h4 class="text-xl font-bold text-slate-800 font-montserrat mb-4">Penguapan</h4>
                        <ul class="text-left text-sm text-slate-600 font-montserrat space-y-2">
                            <li class="flex items-start">
                                <span class="text-sky-500 mr-2 mt-1">✓</span>
                                <span>Evaporasi</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-sky-500 mr-2 mt-1">✓</span>
                                <span>Evapotranspirasi</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-sky-500 mr-2 mt-1">✓</span>
                                <span>Evapotranspirasi Aktual</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Curah Hujan -->
                    <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 text-center border border-gray-100 hover:border-indigo-200">
                        <div class="w-20 h-20 bg-gradient-to-br from-indigo-100 to-indigo-200 rounded-full flex items-center justify-center mx-auto mb-6 shadow-md">
                            <div class="text-indigo-600 text-3xl">🌧️</div>
                        </div>
                        <h4 class="text-xl font-bold text-slate-800 font-montserrat mb-4">Curah Hujan</h4>
                        <ul class="text-left text-sm text-slate-600 font-montserrat space-y-2">
                            <li class="flex items-start">
                                <span class="text-sky-500 mr-2 mt-1">✓</span>
                                <span>Standar BMKG (dalam satuan millimeter)</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Kualitas Udara -->
                    <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 text-center border border-gray-100 hover:border-gray-300">
                        <div class="w-20 h-20 bg-gradient-to-br from-gray-100 to-gray-200 rounded-full flex items-center justify-center mx-auto mb-6 shadow-md">
                            <div class="text-gray-600 text-3xl">🏭</div>
                        </div>
                        <h4 class="text-xl font-bold text-slate-800 font-montserrat mb-4">Kualitas Udara</h4>
                        <ul class="text-left text-sm text-slate-600 font-montserrat space-y-2">
                            <li class="flex items-start">
                                <span class="text-sky-500 mr-2 mt-1">✓</span>
                                <span>pH Air Hujan</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-sky-500 mr-2 mt-1">✓</span>
                                <span>PM2.5</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-sky-500 mr-2 mt-1">✓</span>
                                <span>TSP</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-sky-500 mr-2 mt-1">✓</span>
                                <span>Kimia Air Hujan</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-sky-500 mr-2 mt-1">✓</span>
                                <span>Daya Hantar Listrik</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Style dipindahkan ke app.css -->
