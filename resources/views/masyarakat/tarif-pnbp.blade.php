@extends('welcome')

@section('title', 'Tarif PNBP - BMKG Stasiun Klimatologi Riau')

@section('meta')
    <meta name="description" content="Tarif Pelayanan dan Jasa MKKuG dan Standar Pelayanan Minimum - Stasiun Klimatologi Riau">
    <meta name="keywords" content="BMKG, Klimatologi, Riau, Tarif, PNBP, Pelayanan">
    <meta name="author" content="BMKG Riau">
    <link rel="icon" type="image/x-icon" href="/assets/images/favicon.ico">
@endsection

@section('content')
    @include('components.before-login.layanan.tarif-table', [
        'title' => 'Tarif Pelayanan dan Jasa MKKuG dan Standar Pelayanan Minimum',
        'desc' => 'Daftar tarif sesuai PP Nomor 47 Tahun 2018',
        'table' => [
            [ 'no' => 1, 'name' => 'Analisis dan Prakiraan Hujan Bulanan', 'unit' => 'per buku', 'tarif' => 'Rp 65.000', 'waktu' => '3 Hari' ],
            [ 'no' => 2, 'name' => 'Prakiraan Musim Kemarau', 'unit' => 'per buku', 'tarif' => 'Rp 230.000', 'waktu' => '3 Hari' ],
            [ 'no' => 3, 'name' => 'Prakiraan Musim Hujan', 'unit' => 'per buku', 'tarif' => 'Rp 230.000', 'waktu' => '3 Hari' ],
            [ 'no' => 4, 'name' => 'Atlas Normal Temperatur Periode 1981 - 2010', 'unit' => 'per buku', 'tarif' => 'Rp 1.500.000', 'waktu' => '5 Hari' ],
            [ 'no' => 5, 'name' => 'Atlas Potensi Rawan Banjir', 'unit' => 'per atlas', 'tarif' => 'Rp 350.000', 'waktu' => '3 Hari' ],
            [ 'no' => 6, 'name' => 'Atlas Windrose Wilayah Indonesia Periode 1981 - 2010', 'unit' => 'per buku', 'tarif' => 'Rp 1.500.000', 'waktu' => '5 Hari' ],
            [ 'no' => 7, 'name' => 'Publikasi Berupa Informasi Perubahan Iklim dan Kualitas Udara', 'unit' => 'per buku', 'tarif' => 'Rp 100.000', 'waktu' => '3 Hari' ],
            [ 'no' => 8, 'name' => 'Atlas Kerentanan Perubahan Iklim', 'unit' => 'per atlas', 'tarif' => 'Rp 450.000', 'waktu' => '3 Hari' ],
            [ 'no' => 9, 'name' => 'Atlas Potensi Energi Matahari di Indonesia', 'unit' => 'per atlas', 'tarif' => 'Rp 300.000', 'waktu' => '3 Hari' ],
            [ 'no' => 10, 'name' => 'Atlas Potensi Energi Angin di Indonesia', 'unit' => 'per atlas', 'tarif' => 'Rp 300.000', 'waktu' => '3 Hari' ],
            [ 'no' => 11, 'name' => 'Informasi Particulate Matter (PM) - 10', 'unit' => 'per Stasiun/Tahun', 'tarif' => 'Rp 185.000', 'waktu' => '3 Hari' ],
            [ 'no' => 12, 'name' => 'Informasi Meteorologi untuk Keperluan Klaim Asuransi', 'unit' => 'per Lokasi/Hari', 'tarif' => 'Rp 200.000', 'waktu' => '3 Hari' ],
            [ 'no' => 13, 'name' => 'Peta Tingkat Kerawanan Petir', 'unit' => 'per Lokasi/Tahun', 'tarif' => 'Rp 280.000', 'waktu' => '3 Hari' ],
            [ 'no' => 14, 'name' => 'Informasi Meteorologi Khusus Untuk Pendukung Kegiatan Proyek, Survei, dan Penelitian Komersil', 'unit' => 'per Lokasi', 'tarif' => 'Rp 3.750.000', 'waktu' => '5 Hari' ],
            [ 'no' => 15, 'name' => 'Analisis Iklim', 'unit' => 'per Lokasi', 'tarif' => 'Rp 1.950.000', 'waktu' => '5 Hari' ],
        ],
        'info' => [
            'title' => 'Informasi Penting',
            'items' => [
                'Tarif berlaku sesuai PP Nomor 47 Tahun 2018',
                'Waktu pelayanan dihitung dalam hari kerja',
                'Untuk informasi lebih lanjut, silakan hubungi kontak yang tersedia',
            ]
        ]
    ])
@endsection
