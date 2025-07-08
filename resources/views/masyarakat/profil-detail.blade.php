@extends('welcome')

@section('title', 'Info Profil - BMKG Stasiun Klimatologi Riau')

@section('meta')
    <meta name="description" content="Info Profil Pegawai BMKG Stasiun Klimatologi Riau">
    <meta name="keywords" content="BMKG, Klimatologi, Riau, Profil, Pegawai">
    <meta name="author" content="BMKG Riau">
    <link rel="icon" type="image/x-icon" href="/assets/images/favicon.ico">
@endsection

@section('content')
    <main class="min-h-screen bg-white py-10">
        <div class="max-w-6xl mx-auto px-4 lg:px-8">
            <!-- Back Button -->
            <div class="mb-6 flex justify-start">
                <button onclick="history.back()" class="inline-flex items-center gap-2 text-sky-500 hover:text-sky-600 transition-colors">
                    <i class="fas fa-arrow-left"></i>
                    <span class="font-medium font-montserrat">Kembali</span>
                </button>
            </div>
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                @include('components.before-login.profil.profil-detail-content', [
                    'profile' => [
                        'foto' => '/assets/images/sdm.png',
                        'nama' => 'Edi Rahmanto, S.Tr',
                        'jabatan' => 'PMG Pertama',
                        'detail' => [
                            [
                                'label' => 'Nama Lengkap',
                                'value' => 'Edi Rahmanto, S.Tr',
                                'icon' => 'fa-user',
                                'icon_bg' => 'bg-blue-500',
                            ],
                            [
                                'label' => 'Nomor Induk Pegawai',
                                'value' => '199702252020011002',
                                'icon' => 'fa-id-card',
                                'icon_bg' => 'bg-green-500',
                            ],
                            [
                                'label' => 'Tempat, Tanggal Lahir',
                                'value' => 'Edi Rahmanto, S.Tr',
                                'icon' => 'fa-calendar',
                                'icon_bg' => 'bg-purple-500',
                            ],
                            [
                                'label' => 'Jabatan',
                                'value' => 'PMG Pertama',
                                'icon' => 'fa-briefcase',
                                'icon_bg' => 'bg-blue-400',
                            ],
                            [
                                'label' => 'Golongan',
                                'value' => 'III/A',
                                'icon' => 'fa-layer-group',
                                'icon_bg' => 'bg-red-400',
                            ],
                            [
                                'label' => 'Pendidikan Terakhir',
                                'value' => 'D-IV',
                                'icon' => 'fa-graduation-cap',
                                'icon_bg' => 'bg-orange-400',
                            ],
                            [
                                'label' => 'Kompetensi',
                                'value' => 'Prakirawan, Analis Iklim',
                                'icon' => 'fa-certificate',
                                'icon_bg' => 'bg-green-400',
                            ],
                            [
                                'label' => 'Email',
                                'value' => 'edirahmanto125@gmail.com',
                                'icon' => 'fa-envelope',
                                'icon_bg' => 'bg-pink-400',
                                'is_link' => true,
                            ],
                            [
                                'label' => 'Publikasi',
                                'value' => 'https://www.researchgate.net/profile/Edi_Rahmanto',
                                'icon' => 'fa-link',
                                'icon_bg' => 'bg-yellow-400',
                                'is_link' => true,
                            ],
                        ],
                    ]
                ])
            </div>
        </div>
    </main>
@endsection
