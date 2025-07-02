@extends('welcome')
@section('content')
    @php
        $dataGrafik = [
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
            'datasets' => [[
                'label' => 'Curah Hujan (mm)',
                'data' => [120, 140, 180, 200, 160, 100, 80, 90, 110, 130, 150, 170],
                'borderColor' => 'rgba(37, 99, 235, 1)',
                'backgroundColor' => 'rgba(37, 99, 235, 0.2)',
                'fill' => true,
                'tension' => 0.4
            ]]
        ];
        $opsiGrafik = [
            'responsive' => true,
            'plugins' => [
                'legend' => ['display' => true],
                'title' => ['display' => true, 'text' => 'Grafik Curah Hujan Bulanan']
            ]
        ];
        $keteranganGrafik = '<ul><li>Data dummy curah hujan bulanan.</li><li>Silakan input data asli melalui admin.</li></ul>';
        $metadata = [
            ['label' => 'Nama Pos', 'value' => 'SMPK Bangkinang'],
            ['label' => 'Jenis Alat', 'value' => 'PHK'],
            ['label' => 'Kode Alat', 'value' => '14010101A'],
            ['label' => 'Latitude', 'value' => '0.333277778'],
            ['label' => 'Longitude', 'value' => '101.0332778'],
            ['label' => 'Elevasi (dpl)', 'value' => '43'],
            ['label' => 'Desa/Kelurahan', 'value' => 'Bangkinang'],
            ['label' => 'Kecamatan', 'value' => 'Bangkinang'],
            ['label' => 'Kabupaten/Kota', 'value' => 'Kampar'],
            ['label' => 'Provinsi', 'value' => 'Riau'],
            ['label' => 'Kondisi Alat', 'value' => 'Baik'],
            ['label' => 'Kepemilikan Alat', 'value' => 'BMKG'],
            ['label' => 'Nama Pengamat', 'value' => 'Yon Marlizon'],
            ['label' => 'No HP', 'value' => '0813-6535-3914'],
            ['label' => 'Jabatan', 'value' => 'PNS'],
            ['label' => 'Status Pengiriman Data', 'value' => 'Aktif'],
            ['label' => 'Periode Pengamatan', 'value' => '2023 - Sekarang'],
            ['label' => 'Keterangan Alat', 'value' => 'Keran Rusak (Diatasi Dengan Botol Aqua)'],
        ];
        $tabLabels = ['meta' => 'Metadata Alat', 'grafik' => 'Normal Curah Hujan'];
    @endphp
    @include('components.before-login.layanan.detail-alat', [
        'title' => 'Ketersediaan Alat Observasi',
        'metadata' => $metadata,
        'gambarAlat' => asset('images/no-image.png'),
        'tabLabels' => $tabLabels,
        'dataGrafik' => $dataGrafik,
        'opsiGrafik' => $opsiGrafik,
        'keteranganGrafik' => $keteranganGrafik,
    ])
@endsection
