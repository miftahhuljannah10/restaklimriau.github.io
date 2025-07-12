@extends('welcome')

@section('title', 'Profil - BMKG Stasiun Klimatologi Riau')
@section('meta')
    <meta name="description" content="Profil Stasiun Klimatologi Riau - Sejarah, Visi, Misi, dan Layanan BMKG">
    <meta name="keywords" content="BMKG, Klimatologi, Riau, Profil, Sejarah, Visi, Misi">
    <meta name="author" content="BMKG Riau">
    <link rel="icon" type="image/x-icon" href="/assets/images/favicon.ico">
@endsection

@section('content')
    @php
        $parseYoutubeUrl = function ($url) {
            if (!$url) {
                return 'https://www.youtube.com/embed/PKJpW0Od0Ks?rel=0';
            }
            if (str_contains($url, 'embed')) {
                return $url;
            }
            preg_match(
                '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/',
                $url,
                $matches,
            );
            return isset($matches[1]) ? 'https://www.youtube.com/embed/' . $matches[1] . '?rel=0' : $url;
        };

        // Structure tentang data from database
        $tentang = [
            'title' => 'Tentang Stasiun Klimatologi Riau',
            'description' => $urls['youtube_video']['deskripsi'] ?? '-',
            'video_url' => $parseYoutubeUrl($urls['youtube_video']['url'] ?? '-'),
            'video_title' => 'Stasiun Klimatologi Riau',
        ];

        // Structure visi misi data from database
        $visiSection = $visiMisiSections->firstWhere('section_type', 'visi');
        $misiSection = $visiMisiSections->firstWhere('section_type', 'misi');
        $tugasSection = $visiMisiSections->firstWhere('section_type', 'tugas');

        $visiMisi = [
            'header_title' => 'Visi, Misi & Tugas',
            'header_desc' => 'Komitmen kami dalam melayani masyarakat dengan dedikasi dan kualitas terbaik',
            'visi' => [
                'deskripsi' => $visiSection
                    ? $visiSection->deskripsi
                    : 'Mewujudkan BMKG yang handal, tanggap, dan mampu dalam mendukung keselamatan masyarakat serta keberhasilan pembangunan nasional, dan berperan aktif di tingkat internasional.',
                'detail' => $visiSection ? $visiSection->items->pluck('content')->toArray() : ['-', '-'],
            ],
            'misi' => [
                'detail' => $misiSection
                    ? $misiSection->items->pluck('content')->toArray()
                    : [
                        'Mengamati dan memahami fenomena meteorologi, klimatologi, kualitas udara, dan geofisika.',
                        'Menyediakan data, informasi, dan jasa meteorologi, klimatologi, kualitas udara, dan geofisika yang handal dan terpercaya.',
                        'Mengkoordinasikan dan memfasilitasi kegiatan di bidang meteorologi, klimatologi, kualitas udara, dan geofisika.',
                        'Berpartisipasi aktif dalam kegiatan internasional di bidang meteorologi, klimatologi, kualitas udara, dan geofisika.',
                    ],
            ],
            'tugas' => [
                'deskripsi' => $tugasSection
                    ? $tugasSection->deskripsi
                    : 'Berdasarkan tugas yang tertulis di Instansi Badan Meteorologi, Klimatologi, dan Geofisika (BMKG), Stasiun Klimatologi Riau bertugas melakukan pengamatan cuaca dan iklim, serta menjadi koordinator pengumpulan data curah hujan di Provinsi Riau, serta mempublikasikan informasi cuaca, iklim, dan kualitas udara di seluruh Provinsi Riau.',
                'detail' => $tugasSection
                    ? $tugasSection->items
                        ->map(function ($item) {
                            return [
                                'icon' => 'fa-cloud-sun',
                                'icon_bg' => 'bg-blue-500',
                                'teks' => $item->content,
                            ];
                        })
                        ->toArray()
                    : [
                        [
                            'icon' => 'fa-cloud-sun',
                            'icon_bg' => 'bg-green-500',
                            'teks' =>
                                'Melaksanakan pengamatan, pengumpulan, penyebaran data, pengolahan, analisa, dan prakiraan di wilayah Provinsi Riau, serta pelayanan jasa klimatologi dan kualitas udara, dan juga pengamatan meteorologi pertanian dan hidrometeorologi.',
                        ],
                        [
                            'icon' => 'fa-network-wired',
                            'icon_bg' => 'bg-blue-500',
                            'teks' =>
                                'Sebagai koordinator pos kerjasama yang meliputi Pos Hujan Kerjasama (PHK), pos hujan otomatis (Automatic Rain Gauge), stasiun pemantau cuaca otomatis (Automatic Weather Station), stasiun meteorologi pertanian otomatis (Agroclimate Automatic Weather Station), dan Stasiun Meteorologi Pertanian Khusus (SMPK) di wilayah Provinsi Riau.',
                        ],
                        [
                            'icon' => 'fa-clipboard-list',
                            'icon_bg' => 'bg-orange-500',
                            'teks' =>
                                'Membuat catatan tentang kejadian penting dari gejala dan atau unsur cuaca/iklim serta dampak dan kerugiannya.',
                        ],
                        [
                            'icon' => 'fa-cogs',
                            'icon_bg' => 'bg-purple-500',
                            'teks' =>
                                'Melaksanakan tugas administrasi yang meliputi ketatausahaan, kepegawaian, keuangan, rumah tangga, dan laporan operasional stasiun.',
                        ],
                    ],
            ],
        ];

        // Structure service offices data from database
        $serviceOffices = [
            'tabs' => [
                ['id' => 'admin-tab', 'label' => 'Kantor Pelayanan Administrasi'],
                ['id' => 'operational-tab', 'label' => 'Kantor Pelayanan Operasional'],
            ],
            'activeTab' => 'admin-tab',
            'offices' => [
                [
                    'id' => 'admin-tab',
                    'image' => $urls['kantor_administrasi']['url']??'-',
                    'image_alt' => 'Kantor Pelayanan Administrasi',
                    'title' => 'Kantor Pelayanan Administrasi',
                    'description' =>
                        $urls['kantor_administrasi']['deskripsi'] ??
                        'Kantor Pelayanan Administrasi memberikan layanan berupa informasi bidang Klimatologi dengan berbagai jenis analisis dan prakiraan cuaca yang komprehensif.',
                    'services' => [
                        [
                            'title' => 'Analisis',
                            'icon' => '📊',
                            'bg' => 'bg-gradient-to-br from-blue-50 to-blue-100',
                            'bg_overlay' => 'bg-gradient-to-br from-blue-400/10 to-blue-600/10',
                            'icon_color' => '',
                            'hover' => 'sky',
                            'items' => [
                                'Analisis Curah Hujan (Dasarian dan Bulanan)',
                                'Analisis Sifat Hujan (Dasarian dan Bulanan)',
                                'Analisis Dinamika Atmosfer',
                                'Monitoring Hari Tanpa Hujan',
                                'Standardized Precipitation Index',
                            ],
                        ],
                        [
                            'title' => 'Prakiraan',
                            'icon' => '🌤️',
                            'bg' => 'bg-gradient-to-br from-purple-50 to-purple-100',
                            'bg_overlay' => 'bg-gradient-to-br from-purple-400/10 to-purple-600/10',
                            'icon_color' => '',
                            'hover' => 'purple',
                            'items' => [
                                'Prakiraan Curah Hujan (Dasarian dan Bulanan)',
                                'Prakiraan Sifat Hujan (Dasarian dan Bulanan)',
                                'Prakiraan Dinamika Atmosfer',
                                'Prakiraan Daerah Potensi Banjir',
                                'Prakiraan Musim',
                            ],
                        ],
                        [
                            'title' => 'Informasi Kualitas Udara',
                            'icon' => '🌬️',
                            'bg' => 'bg-gradient-to-br from-green-50 to-green-100',
                            'bg_overlay' => 'bg-gradient-to-br from-green-400/10 to-green-600/10',
                            'icon_color' => '',
                            'hover' => 'green',
                            'items' => ['PM10', 'PM2.5', 'TSP', 'Kimia Air Hujan', 'Daya Hantar Listrik'],
                        ],
                        [
                            'title' => 'Pelayanan Data Lainnya',
                            'icon' => '👥',
                            'bg' => 'bg-gradient-to-br from-orange-50 to-orange-100',
                            'bg_overlay' => 'bg-gradient-to-br from-orange-400/10 to-orange-600/10',
                            'icon_color' => '',
                            'hover' => 'orange',
                            'items' => ['Mahasiswa', 'Instansi Kerja Sama', 'Umum'],
                        ],
                    ],
                ],
                [
                    'id' => 'operational-tab',
                    'image' => $urls['kantor_operasional']['url']??'-',
                    'image_alt' => 'Kantor Pelayanan Operasional',
                    'title' => 'Kantor Pelayanan Operasional',
                    'description' =>
                        $urls['kantor_operasional']['deskripsi'] ??
                        'Kantor Pelayanan Operasional memberikan layanan teknis dan operasional terkait pengamatan, pengolahan, dan penyebaran data klimatologi.',
                    'services' => [
                        [
                            'title' => 'Suhu',
                            'icon' => '🌡️',
                            'bg' => 'bg-gradient-to-br from-blue-100 to-blue-200',
                            'bg_overlay' => '',
                            'icon_color' => '',
                            'hover' => 'blue',
                            'items' => ['Suhu Maksimum', 'Suhu Minimum', 'Suhu Rata-Rata'],
                        ],
                        [
                            'title' => 'Tekanan',
                            'icon' => '⚡',
                            'bg' => 'bg-gradient-to-br from-purple-100 to-purple-200',
                            'bg_overlay' => '',
                            'icon_color' => '',
                            'hover' => 'purple',
                            'items' => ['Barometer Digital'],
                        ],
                        [
                            'title' => 'Angin',
                            'icon' => '💨',
                            'bg' => 'bg-gradient-to-br from-green-100 to-green-200',
                            'bg_overlay' => '',
                            'icon_color' => '',
                            'hover' => 'green',
                            'items' => [
                                'Arah Angin Ketinggian (4m, 7m, 10m)',
                                'Kecepatan Angin (0,5m, 2m, 4m, 7m, 10m)',
                            ],
                        ],
                        [
                            'title' => 'Kelembaban',
                            'icon' => '💧',
                            'bg' => 'bg-gradient-to-br from-cyan-100 to-cyan-200',
                            'bg_overlay' => '',
                            'icon_color' => '',
                            'hover' => 'cyan',
                            'items' => ['Relative Humidity'],
                        ],
                        [
                            'title' => 'Matahari',
                            'icon' => '☀️',
                            'bg' => 'bg-gradient-to-br from-yellow-100 to-yellow-200',
                            'bg_overlay' => '',
                            'icon_color' => '',
                            'hover' => 'yellow',
                            'items' => [
                                'Sunshine Duration',
                                'Albedo',
                                'Diffuse Radiation',
                                'Normal Irradiation (DNI)',
                                'Global Radiation',
                                'Nett Radiation',
                            ],
                        ],
                        [
                            'title' => 'Penguapan',
                            'icon' => '🌊',
                            'bg' => 'bg-gradient-to-br from-teal-100 to-teal-200',
                            'bg_overlay' => '',
                            'icon_color' => '',
                            'hover' => 'teal',
                            'items' => ['Evaporasi', 'Evapotranspirasi', 'Evapotranspirasi Aktual'],
                        ],
                        [
                            'title' => 'Curah Hujan',
                            'icon' => '🌧️',
                            'bg' => 'bg-gradient-to-br from-indigo-100 to-indigo-200',
                            'bg_overlay' => '',
                            'icon_color' => '',
                            'hover' => 'indigo',
                            'items' => ['Standar BMKG (dalam satuan millimeter)'],
                        ],
                        [
                            'title' => 'Kualitas Udara',
                            'icon' => '🏭',
                            'bg' => 'bg-gradient-to-br from-gray-100 to-gray-200',
                            'bg_overlay' => '',
                            'icon_color' => '',
                            'hover' => 'gray',
                            'items' => ['pH Air Hujan', 'PM2.5', 'TSP', 'Kimia Air Hujan', 'Daya Hantar Listrik'],
                        ],
                    ],
                ],
            ],
        ];

        // Static data that doesn't come from database yet
$heroProfil = [
    'logo' => asset('assets/images/bmkg-logo-2.png'),
    'logo_alt' => 'BMKG Logo',
    'title' => 'Stasiun Klimatologi Riau',
    'subtitle' =>
        'Melayani dengan dedikasi untuk memberikan informasi meteorologi, klimatologi, dan kualitas udara terpercaya',
];
$sejarah = [
    'title' => 'Sejarah Stasiun Klimatologi Riau',
    'description' => 'Perjalanan panjang pembentukan Stasiun Klimatologi Riau dari tahun ke tahun',
    'timeline' => [
        [
            'tahun' => '2012',
            'teks' => 'Penjajakan dan pembuatan unit organisasi Klimatologi di Provinsi Riau',
            'icon' => 'fa-lightbulb',
            'bg' => 'bg-blue-500',
            'border' => 'border-blue-500',
        ],
        [
            'tahun' => '2013',
            'teks' =>
                'Pembuatan fisik Stasiun Meteorologi Pertanian Khusus Plus (SMPK Plus) Sungai Pinang beralamat di Desa Kuapan, Kec. Tambang, Kab. Kampar',
            'icon' => 'fa-building',
            'bg' => 'bg-gray-500',
            'border' => 'border-gray-500',
        ],
        [
            'tahun' => '2014',
            'teks' => 'Awal mula operasional oleh Stasiun Meteorologi Sultan Syarif Kasim II',
            'icon' => 'fa-play',
            'bg' => 'bg-yellow-500',
            'border' => 'border-yellow-500',
        ],
        [
            'tahun' => '2017',
            'teks' =>
                'Susunan Organisasi Tata Kerja (SOTK) Khusus Klimatologi di Provinsi Riau resmi berdiri pada bulan April 2017 dengan nama Stasiun Klimatologi Tambang',
            'icon' => 'fa-flag',
            'bg' => 'bg-green-500',
            'border' => 'border-green-500',
        ],
        [
            'tahun' => '2019',
            'teks' =>
                'Stasiun Klimatologi Tambang berubah nama menjadi Stasiun Klimatologi Kampar. Penjajakan dan awal mulanya pembuatan kantor pelayanan administrasi di Kota Pekanbaru.',
            'icon' => 'fa-exchange-alt',
            'bg' => 'bg-purple-500',
            'border' => 'border-purple-500',
        ],
        [
            'tahun' => 'Sekarang',
            'teks' =>
                'Stasiun Klimatologi Riau terus berkembang memberikan pelayanan terbaik dengan teknologi modern dan SDM yang kompeten untuk melayani masyarakat Riau.',
            'icon' => 'fa-star',
            'bg' => 'bg-pink-500',
            'border' => 'border-pink-500',
        ],
    ],
];
// Data passed from controller - remove dummy data overrides
$hrSection = [
    'kepala_title' => 'Kepala Stasiun',
    'kepala' => [
        'foto' => '/assets/images/SDM.png',
        'nama' => 'Edi Rahmanto, S.Tr',
        'jabatan' => 'Kepala Stasiun Klimatologi',
        'url' => '/profil-detail?id=kepala-stasiun&type=kepala',
    ],
    'fungsional_title' => 'Kelompok Jabatan Fungsional',
    'fungsional' => [
        [
            'foto' => '/assets/images/SDM.png',
            'nama' => 'Nama Staff 1',
            'jabatan' => 'Analis Iklim',
            'url' => '/profil-detail?id=fungsional-1&type=fungsional',
        ],
        [
            'foto' => '/assets/images/SDM.png',
            'nama' => 'Nama Staff 2',
            'jabatan' => 'Analis Iklim',
            'url' => '/profil-detail?id=fungsional-2&type=fungsional',
        ],
        [
            'foto' => '/assets/images/SDM.png',
            'nama' => 'Nama Staff 3',
            'jabatan' => 'Analis Iklim',
            'url' => '/profil-detail?id=fungsional-3&type=fungsional',
        ],
        [
            'foto' => '/assets/images/SDM.png',
            'nama' => 'Nama Staff 4',
            'jabatan' => 'Analis Iklim',
            'url' => '/profil-detail?id=fungsional-4&type=fungsional',
        ],
        [
            'foto' => '/assets/images/SDM.png',
            'nama' => 'Nama Staff 5',
            'jabatan' => 'Analis Iklim',
            'url' => '/profil-detail?id=fungsional-5&type=fungsional',
        ],
        [
            'foto' => '/assets/images/SDM.png',
            'nama' => 'Nama Staff 6',
            'jabatan' => 'Analis Iklim',
            'url' => '/profil-detail?id=fungsional-6&type=fungsional',
        ],
    ],
    'ppnpn_title' => 'PPNPN',
    'ppnpn' => [
        [
            'foto' => '/assets/images/SDM.png',
            'nama' => 'PPNPN 1',
            'jabatan' => 'PPNPN',
            'url' => '/profil-detail?id=ppnpn-1&type=ppnpn',
        ],
        [
            'foto' => '/assets/images/SDM.png',
            'nama' => 'PPNPN 2',
            'jabatan' => 'PPNPN',
            'url' => '/profil-detail?id=ppnpn-2&type=ppnpn',
        ],
        [
            'foto' => '/assets/images/SDM.png',
            'nama' => 'PPNPN 3',
            'jabatan' => 'PPNPN',
            'url' => '/profil-detail?id=ppnpn-3&type=ppnpn',
        ],
        [
            'foto' => '/assets/images/SDM.png',
            'nama' => 'PPNPN 4',
            'jabatan' => 'PPNPN',
            'url' => '/profil-detail?id=ppnpn-4&type=ppnpn',
        ],
        [
            'foto' => '/assets/images/SDM.png',
            'nama' => 'PPNPN 5',
            'jabatan' => 'PPNPN',
            'url' => '/profil-detail?id=ppnpn-5&type=ppnpn',
        ],
    ],
    'alumni_title' => 'Alumni Pegawai',
    'alumni' => [
        [
            'foto' => '/assets/images/SDM.png',
            'nama' => 'Alumni 1',
            'jabatan' => 'Alumni Pegawai',
            'url' => '/profil-detail?id=alumni-1&type=alumni',
        ],
        [
            'foto' => '/assets/images/SDM.png',
            'nama' => 'Alumni 2',
            'jabatan' => 'Alumni Pegawai',
            'url' => '/profil-detail?id=alumni-2&type=alumni',
        ],
        [
            'foto' => '/assets/images/SDM.png',
            'nama' => 'Alumni 3',
            'jabatan' => 'Alumni Pegawai',
            'url' => '/profil-detail?id=alumni-3&type=alumni',
        ],
        [
            'foto' => '/assets/images/SDM.png',
            'nama' => 'Alumni 4',
            'jabatan' => 'Alumni Pegawai',
            'url' => '/profil-detail?id=alumni-4&type=alumni',
        ],
        [
            'foto' => '/assets/images/SDM.png',
            'nama' => 'Alumni 5',
            'jabatan' => 'Alumni Pegawai',
            'url' => '/profil-detail?id=alumni-5&type=alumni',
                ],
            ],
        ];

    @endphp

    @include('components.before-login.profil.hero-profil', $heroProfil)
    @include('components.before-login.profil.profil-section-nav')
    <div class="bg-gray" role="tabpanel">
        <!-- Tentang Section -->
        <section id="section-tentang" class="content-section py-16" role="tabpanel" aria-labelledby="tab-tentang">
            <div class="max-w-[1440px] mx-auto px-4 lg:px-10">
                @include('components.before-login.profil.profil-tentang', $tentang)
            </div>
        </section>
        <!-- Sejarah Section -->
        <section id="section-sejarah" class="content-section py-16 hidden" role="tabpanel" aria-labelledby="tab-sejarah">
            <div class="max-w-[1440px] mx-auto px-4 lg:px-10">
                @include('components.before-login.profil.profil-sejarah', $sejarah)
            </div>
        </section>
        <!-- Visi & Misi Section -->
        <section id="section-visi-misi" class="content-section py-16 hidden" role="tabpanel"
            aria-labelledby="tab-visi-misi">
            <div class="max-w-[1440px] mx-auto px-4 lg:px-10">
                @include('components.before-login.profil.profil-visi-misi', $visiMisi)
            </div>
        </section>
        <!-- Tim Section -->
        <section id="section-tim" class="content-section py-2 hidden" role="tabpanel" aria-labelledby="tab-tim">
            <div class="max-w-[1440px] mx-auto px-4 lg:px-10">
                @include('components.before-login.profil.profil-hr-section', $hrSection)
            </div>
        </section>
        <!-- Layanan Section -->
        <section id="section-layanan" class="content-section py-16 hidden" role="tabpanel" aria-labelledby="tab-layanan">
            <div class="max-w-[1440px] mx-auto px-4 lg:px-10">
                @include('components.before-login.profil.profil-service-offices', $serviceOffices)
            </div>
        </section>
    </div>
@endsection
