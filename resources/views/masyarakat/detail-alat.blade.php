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
    @endphp
    @include('components.before-login.layanan.detail-alat', [
        'namaPos' => 'Pos Curah Hujan Kampar',
        'jenisAlat' => 'Ombrometer',
        'kodeAlat' => 'OM-001',
        'idPos' => 'POS123',
        'lat' => '-0.7893',
        'lng' => '101.1234',
        'elevasi' => '50',
        'desa' => 'Contoh Desa',
        'kecamatan' => 'Contoh Kecamatan',
        'kabupaten' => 'Contoh Kabupaten',
        'provinsi' => 'Riau',
        'kondisi' => 'Baik',
        'kepemilikan' => 'BMKG',
        'pengamat' => 'Budi',
        'jabatan' => 'Petugas',
        'statusData' => 'Aktif',
        'ketersediaan' => 'Lengkap',
        'gambarAlat' => asset('images/no-image.png'),
        'keterangan' => 'Alat dalam kondisi baik',
        'backUrl' => '/',
        'dataGrafik' => $dataGrafik,
        'opsiGrafik' => $opsiGrafik,
        'keteranganGrafik' => $keteranganGrafik,
    ])
@endsection
