@extends('welcome')

@section('title', 'Layanan - BMKG Stasiun Klimatologi Riau')
@section('meta')
<meta name="description" content="Layanan BMKG Stasiun Klimatologi Riau">
<meta name="keywords" content="BMKG, Layanan, Klimatologi, Riau, Cuaca, Iklim, Meteorologi">
<meta name="author" content="BMKG Riau">
@endsection

@section('content')
    @include('components.before-login.layanan.hero-layanan', [
        'title' => 'Permintaan Data',
        'subtitle' => 'Alur Pelayanan Mengenai Mekanisme Pelayanan PNBP Stasiun Klimatologi Riau dan Jenis Form Pengajuan.',
        'image' => asset('assets/images/layanan2.png'),
        'buttons' => [
            [
                'label' => 'Cek Ketersediaan Data',
                'link' => '/cek-ketersediaan-data',
                'style' => 'border-2 border-white bg-transparent hover:bg-white hover:text-sky-600',
            ],
        ]
    ])
    @include('components.before-login.layanan.alur-pelayanan', [
        'title' => 'Alur Pelayanan',
        'steps' => [
            [
                'number' => 1,
                'title' => 'Akses Web<br/>Stasiun Klimatologi Riau',
                'desc' => [
                    'Cek Ketersediaan Data <a href="#" class="underline text-sky-500 hover:text-sky-600">di sini</a>',
                    'Isi Form & Unggah Dokumen (Surat Pengantar & Identitas Diri)',
                    'Submit',
                ],
            ],
            [
                'number' => 2,
                'title' => 'Pembayaran PNBP ke<br/>Rekening Negara',
                'desc' => [
                    'Unggah Bukti Bayar (jika instansi kerja sama dan mahasiswa dapat langsung melakukan langkah pada tahapan nomor 3)',
                ],
            ],
            [
                'number' => 3,
                'title' => 'Info Ke Pemohon',
                'desc' => [
                    'Pemohon Wajib Mengisi Survey Kepuasan Masyarakat dan',
                    'Pemohon Menerima Hasil Permohonan',
                ],
            ],
        ]
    ])
    @include('components.before-login.layanan.jenis-pelayanan', [
        'services' => [
            [
                'title' => 'Form Layanan',
                'desc' => 'Merupakan Layanan Jasa MKKuG',
                'icon' => 'fas fa-tasks',
                'bg' => 'bg-gradient-to-br from-sky-400 to-sky-600',
                'type' => 'button',
                'onclick' => "handleServiceClick('Form Layanan')",
                'aria' => 'Klik untuk membuka Form Layanan',
            ],
            [
                'title' => 'Survey Kepuasan Masyarakat',
                'desc' => 'Survey online untuk menilai kepuasan masyarakat terhadap layanan BMKG.',
                'icon' => 'fas fa-edit',
                'bg' => 'bg-gradient-to-br from-sky-400 to-sky-600',
                'type' => 'link',
                'href' => 'https://eskm.bmkg.go.id/survey/418106/0/1/2025-05/2025/0',
                'target' => '_blank',
                'aria' => 'Klik untuk membuka Survey Kepuasan Masyarakat',
            ],
            [
                'title' => 'Tarif PNBP',
                'desc' => 'Daftar Tarif PNBP sesuai PP Nomor 47 Tahun 2018',
                'icon' => 'fas fa-database',
                'bg' => 'bg-gradient-to-br from-sky-400 to-sky-600',
                'type' => 'button',
                'onclick' => "handleServiceClick('Tarif PNBP')",
                'aria' => 'Klik untuk membuka Tarif PNBP',
            ],
            [
                'title' => 'Surat 0 Rupiah',
                'desc' => 'Download contoh surat permohonan layanan tanpa biaya (0 Rupiah).',
                'icon' => 'fas fa-file-pdf',
                'bg' => 'bg-gradient-to-br from-sky-400 to-sky-600',
                'type' => 'link',
                'href' => '/downloads/Surat Nol (0) rupiah.pdf',
                'target' => '_blank',
                'aria' => 'Klik untuk membuka Surat 0 Rupiah',
            ],
        ]
    ])
@endsection
