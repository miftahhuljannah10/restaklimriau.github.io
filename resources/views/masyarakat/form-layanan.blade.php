@extends('welcome')

@section('title', 'Form Layanan - BMKG Stasiun Klimatologi Riau')

@section('meta')
    <meta name="description" content="Form Layanan Stasiun Klimatologi Riau - Umum, Instansi Kerja Sama, dan Mahasiswa">
    <meta name="keywords" content="BMKG, Klimatologi, Riau, Form Layanan, Permintaan Data">
    <meta name="author" content="BMKG Riau">
    <link rel="icon" type="image/x-icon" href="/assets/images/favicon.ico">
@endsection

@section('content')
    @include('components.before-login.layanan.service-selection', [
        'title' => 'Form Layanan',
        'desc' => 'Pilih jenis layanan sesuai kebutuhan Anda',
        'services' => [
            [
                'id' => 'umum',
                'icon' => 'fas fa-users',
                'title' => 'Umum',
                'desc' => 'Masyarakat Umum',
            ],
            [
                'id' => 'instansi',
                'icon' => 'fas fa-building',
                'title' => 'Instansi Kerja Sama',
                'desc' => 'Instansi Pemerintah',
            ],
            [
                'id' => 'mahasiswa',
                'icon' => 'fas fa-graduation-cap',
                'title' => 'Mahasiswa',
                'desc' => 'Pendidikan & Penelitian',
            ],
        ]
    ])
    @include('components.before-login.layanan.service-content', [
        'services' => [
            [
                'id' => 'umum',
                'title' => 'Layanan Umum',
                'alert_bg' => 'bg-amber-50',
                'alert_border' => 'border-amber-200',
                'alert_icon' => 'fas fa-exclamation-triangle',
                'alert_icon_color' => 'text-amber-500',
                'alert_title' => 'Layanan Berbayar',
                'alert_title_color' => 'text-amber-800',
                'alert_desc' => 'Layanan ini adalah layanan berbayar sesuai dengan Peraturan Pemerintah No. 47 Tahun 2018; dan Peraturan Badan Meteorologi, Klimatologi, dan Geofisika No. 4 Tahun 2022.',
                'alert_desc_color' => 'text-amber-700',
                'desc' => 'Ketentuan tarif dapat dilihat di <a href="/tarif-pnbp" class="text-sky-600 underline hover:text-sky-500 font-medium">Menu Tarif PNBP</a>. Lakukan pembayaran setelah mengisi form di Menu Pembayaran.',
                'jenis_bg' => 'bg-blue-50',
                'jenis_border' => 'border-blue-200',
                'jenis_title' => 'Jenis layanan yang dapat dilayani:',
                'jenis_title_color' => 'text-blue-800',
                'jenis_list_color' => 'text-blue-700',
                'jenis_items' => [
                    'Informasi Meteorologi dan Klimatologi',
                    'Jasa Konsultasi Meteorologi dan Klimatologi',
                ],
                'syarat_bg' => 'bg-gray-50',
                'syarat_border' => 'border-gray-200',
                'syarat_title' => 'Persyaratan:',
                'syarat_title_color' => 'text-gray-800',
                'syarat_list_color' => 'text-gray-700',
                'syarat_items' => [
                    'Melampirkan identitas diri pemohon',
                    'Melampirkan surat permohonan yang ditandatangani oleh Pimpinan Perusahaan',
                    'Membayar tarif Penerimaan Negara Bukan Pajak (PNBP)',
                ],
                'survey_bg' => 'bg-green-50',
                'survey_border' => 'border-green-200',
                'survey_icon' => 'fas fa-clipboard-check',
                'survey_icon_color' => 'text-green-500',
                'survey_title' => 'Survey Kepuasan',
                'survey_title_color' => 'text-green-800',
                'survey_desc' => 'Isi <a href="https://eskm.bmkg.go.id/survey/418106/0/1/2025-05/2025/0" class="text-green-600 underline hover:text-green-500">survey kepuasan masyarakat</a> sebelum mengisi Form, lalu unggah bukti screenshot jika sudah selesai mengisi survey.',
                'survey_desc_color' => 'text-green-700',
                'form_url' => 'https://docs.google.com/forms/d/e/1FAIpQLSda8GyQeog0iaISmeIipH4Z7jzydAAWKtC42CcvF9zZdyUg9g/viewform?embedded=true',
                'note' => 'Pastikan semua data yang diisi sudah benar sebelum mengirim form',
            ],
            [
                'id' => 'instansi',
                'title' => 'Instansi Kerja Sama',
                'alert_bg' => 'bg-green-50',
                'alert_border' => 'border-green-200',
                'alert_icon' => 'fas fa-check-circle',
                'alert_icon_color' => 'text-green-500',
                'alert_title' => 'Tarif Rp. 0,00 (Gratis)',
                'alert_title_color' => 'text-green-800',
                'alert_desc' => 'Berdasarkan Peraturan Badan Meteorologi, Klimatologi, dan Geofisika No. 20 Tahun 2014; Peraturan Badan Meteorologi, Klimatologi, dan Geofisika No. 12 Tahun 2019; dan Peraturan Badan Meteorologi, Klimatologi, dan Geofisika No. 4 Tahun 2022.',
                'alert_desc_color' => 'text-green-700',
                'desc' => '',
                'jenis_bg' => '', // Tidak ada section jenis layanan di screenshot instansi
                'jenis_border' => '',
                'jenis_title' => '',
                'jenis_title_color' => '',
                'jenis_list_color' => '',
                'jenis_items' => [],
                'syarat_bg' => 'bg-gray-50',
                'syarat_border' => 'border-gray-200',
                'syarat_title' => 'Persyaratan:',
                'syarat_title_color' => 'text-gray-800',
                'syarat_list_color' => 'text-gray-700',
                'syarat_items' => [
                    'Melampirkan identitas diri pemohon',
                    'Melampirkan surat pengantar dari Instansi ditujukan kepada Stasiun Klimatologi Riau',
                    'Melampirkan proposal kegiatan',
                    'Cakupan lokasi dan waktu informasi maksimal 2 titik lokasi selama 2 tahun',
                ],
                'survey_bg' => 'bg-blue-50',
                'survey_border' => 'border-blue-200',
                'survey_icon' => 'fas fa-clipboard',
                'survey_icon_color' => 'text-blue-500',
                'survey_title' => 'Survey Kepuasan',
                'survey_title_color' => 'text-blue-800',
                'survey_desc' => 'Isi <a href="https://eskm.bmkg.go.id/survey/418106/0/1/2025-05/2025/0" class="text-blue-600 underline hover:text-blue-500">survey kepuasan masyarakat</a> sebelum mengisi Form, lalu unggah bukti screenshot jika sudah selesai mengisi survey.',
                'survey_desc_color' => 'text-blue-700',
                'form_url' => 'https://docs.google.com/forms/d/e/1FAIpQLSda8GyQeog0iaISmeIipH4Z7jzydAAWKtC42CcvF9zZdyUg9g/viewform?embedded=true',
                'note' => 'Pastikan semua data yang diisi sudah benar sebelum mengirim form',
            ],
            [
                'id' => 'mahasiswa',
                'title' => 'Layanan Mahasiswa',
                'alert_bg' => 'bg-green-50',
                'alert_border' => 'border-green-200',
                'alert_icon' => 'fas fa-check-circle',
                'alert_icon_color' => 'text-green-500',
                'alert_title' => 'Tarif Rp. 0,00 (Gratis)',
                'alert_title_color' => 'text-green-800',
                'alert_desc' => 'Berdasarkan Peraturan Badan Meteorologi, Klimatologi, dan Geofisika No. 20 Tahun 2014; Peraturan Badan Meteorologi, Klimatologi, dan Geofisika No. 12 Tahun 2019; dan Peraturan Badan Meteorologi, Klimatologi, dan Geofisika No. 4 Tahun 2022.',
                'alert_desc_color' => 'text-green-700',
                'desc' => '',
                'jenis_bg' => '', // Tidak ada section jenis layanan di screenshot mahasiswa
                'jenis_border' => '',
                'jenis_title' => '',
                'jenis_title_color' => '',
                'jenis_list_color' => '',
                'jenis_items' => [],
                'syarat_bg' => 'bg-gray-50',
                'syarat_border' => 'border-gray-200',
                'syarat_title' => 'Persyaratan:',
                'syarat_title_color' => 'text-gray-800',
                'syarat_list_color' => 'text-gray-700',
                'syarat_items' => [
                    'Surat Pengantar tertulis dari Lembaga Pendidikan (Rektor/Direktur/Dekan)',
                    'Melampirkan identitas diri pemohon',
                    'Proposal Penelitian atau Tugas Akhir yang disetujui Pembimbing/Promotor',
                    'Pernyataan bahwa data BMKG tidak akan digunakan untuk kegiatan lain',
                    'Pernyataan bersedia untuk menyerahkan salinan hasil Penelitian atau hasil Tugas Akhir dengan batas waktu tertentu',
                    'Cakupan lokasi dan waktu informasi maksimal 2 titik lokasi selama 2 tahun',
                ],
                'survey_bg' => 'bg-blue-50',
                'survey_border' => 'border-blue-200',
                'survey_icon' => 'fas fa-clipboard',
                'survey_icon_color' => 'text-blue-500',
                'survey_title' => 'Survey Kepuasan',
                'survey_title_color' => 'text-blue-800',
                'survey_desc' => 'Isi <a href="https://eskm.bmkg.go.id/survey/418106/0/1/2025-05/2025/0" class="text-blue-600 underline hover:text-blue-500">survey kepuasan masyarakat</a> sebelum mengisi Form, lalu unggah bukti screenshot jika sudah selesai mengisi survey.',
                'survey_desc_color' => 'text-blue-700',
                'form_url' => 'https://docs.google.com/forms/d/e/1FAIpQLSda8GyQeog0iaISmeIipH4Z7jzydAAWKtC42CcvF9zZdyUg9g/viewform?embedded=true',
                'note' => 'Pastikan semua data yang diisi sudah benar sebelum mengirim form',
            ],
        ]
    ])
@endsection

@push('scripts')
{{-- Script dipindahkan ke resources/js/app.js agar lebih maintainable dan terpusat --}}
@endpush

