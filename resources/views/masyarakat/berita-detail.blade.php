@php
// Contoh data dummy untuk preview jika variabel tidak dikirim dari controller
$berita = $berita ?? [
    'title' => 'Staklim Riau Gelar Rapat PMK 2025, Sinergi BMKG-Pemprov Riau Antisipasi Dampak Musim Kemarau 2025',
    'date' => '25 April 2025',
    'author' => 'Ibrahim',
    'category' => 'Berita Utama',
    'meta_description' => 'Staklim Riau Gelar Rapat PMK 2025, Sinergi BMKG-Pemprov Riau Antisipasi Dampak Musim Kemarau 2025',
    'image' => 'assets/images/berita2.png',
    'content' => '
        <p><strong>Pekanbaru, 23 April 2025</strong> — Stasiun Klimatologi (Staklim) Riau menggelar kegiatan pemaparan Prakiraan Musim Kemarau Tahun 2025 yang bertempat di Gedung Gubernur Riau. Kegiatan ini dihadiri oleh Gubernur Riau Abdul Wahid beserta jajaran perangkat daerah, serta Deputi Bidang Klimatologi BMKG Ardhasena Sopaheluwakan sebagai narasumber utama yang didampingi oleh seluruh Kepala UPT BMKG di Provinsi Riau.</p>
        <p>Dalam pemaparannya, Ardhasena menyampaikan analisis terkini kondisi iklim di Provinsi Riau serta prediksi musim kemarau tahun 2025 yang mengacu pada data zona musim terbaru periode 1991–2020. Musim kemarau di Provinsi Riau diprediksi akan berlangsung lebih awal, yaitu dimulai pada akhir Mei hingga awal Juli 2025, dengan sifat musim secara umum <strong>Normal hingga Bawah Normal</strong>, yang menunjukkan potensi curah hujan lebih rendah dibandingkan rata-rata.</p>
        <blockquote class="border-l-4 border-sky-500 pl-6 py-4 bg-sky-50 rounded-r-lg my-8">
            <p class="text-gray-700 italic">"Informasi prakiraan musim ini sangat penting untuk dijadikan dasar dalam menyusun rencana aksi dini, khususnya dalam menghadapi potensi bencana kekeringan serta kebakaran hutan dan lahan. Pemerintah daerah dan seluruh elemen masyarakat perlu meningkatkan kewaspadaan dan kapasitas respons dini terhadap ancaman yang mungkin timbul," ujar Ardhasena.</p>
        </blockquote>
        <p>Beliau juga menekankan bahwa sektor strategis seperti pertanian, kehutanan, dan kebencanaan perlu mengantisipasi dampak lanjutan dari kondisi iklim tersebut, terutama di wilayah-wilayah yang diprediksi mengalami kemarau lebih kering dan panjang.</p>
        <p>Gubernur Riau dalam sambutannya menyampaikan apresiasi terhadap BMKG yang telah menyediakan informasi iklim secara komprehensif. Beliau menyatakan bahwa pemerintah provinsi akan menindaklanjuti informasi ini dengan menyusun langkah-langkah antisipatif lintas sektor guna menjaga ketahanan lingkungan dan keselamatan masyarakat.</p>
        <blockquote class="border-l-4 border-green-500 pl-6 py-4 bg-green-50 rounded-r-lg my-8">
            <p class="text-gray-700 italic">"Kami akan menjadikan hasil pemaparan ini sebagai dasar dalam pengambilan kebijakan, khususnya dalam upaya pencegahan karhutla dan perlindungan terhadap sektor-sektor yang rentan terdampak musim kemarau," ujar Gubernur Abdul Wahid.</p>
        </blockquote>
        <p>Kegiatan ini menjadi bagian dari komitmen bersama antara BMKG dan Pemerintah Provinsi Riau dalam mendorong adaptasi perubahan iklim melalui penguatan informasi iklim yang berbasis data dan ilmiah serta meningkatkan sinergi lintas sektor dalam menghadapi tantangan iklim ke depan.</p>
        <p class="text-sm text-gray-500 italic mt-8">(Dokumentasi oleh Stasiun Klimatologi Riau)</p>
    ',
    'gallery' => [
        'assets/images/berita2.png',
        'assets/images/berita2.png',
        'assets/images/berita2.png',
        'assets/images/berita2.png',
    ],
];
$relatedBerita = $relatedBerita ?? [
    [
        'title' => 'BMKG dan Pemerintah Provinsi Riau Tingkatkan Kesiapsiagaan Hadapi Musim Kemarau 2025',
        'category' => 'Berita Terkini',
        'author' => 'Tim Redaksi BMKG Riau',
        'date' => '25 April 2025',
        'image' => 'assets/images/berita2.png',
        'url' => '/berita/1',
    ],
    [
        'title' => 'Staklim Riau Gelar Rapat PMK 2025, Sinergi BMKG-Pemprov Riau Antisipasi Dampak Musim Kemarau 2025',
        'category' => 'Kegiatan',
        'author' => 'Humas BMKG Riau',
        'date' => '25 April 2025',
        'image' => 'assets/images/berita2.png',
        'url' => '/berita/2',
    ],
        [
        'title' => 'BMKG Riau Luncurkan Sistem Peringatan Dini Karhutla Berbasis AI',
        'category' => 'Inovasi',
        'author' => 'Redaksi BMKG Riau',
        'date' => '20 April 2025',
        'image' => 'assets/images/berita2.png',
        'url' => '/berita/3',
    ],
];
@endphp

@extends('welcome')

@section('title', $berita['title'] ?? 'Detail Berita - BMKG Stasiun Klimatologi Riau')

@section('meta')
    <meta name="description" content="{{ $berita['meta_description'] ?? ($berita['title'] ?? '') }}">
    <meta name="keywords" content="BMKG, Klimatologi, Riau, Berita, {{ $berita['category'] ?? '' }}">
    <meta name="author" content="{{ $berita['author'] ?? 'BMKG Riau' }}">
    <link rel="icon" type="image/x-icon" href="/assets/images/favicon.ico">
@endsection

@section('content')
    @include('components.before-login.media.berita-detail-header', [
        'title' => $berita['title'] ?? '',
        'date' => $berita['date'] ?? '',
        'author' => $berita['author'] ?? '',
        'category' => $berita['category'] ?? ''
    ])
    @include('components.before-login.media.berita-detail-content', [
        'title' => $berita['title'] ?? '',
        'image' => $berita['image'] ?? '',
        'content' => $berita['content'] ?? '',
        'gallery' => $berita['gallery'] ?? []
    ])
    @include('components.before-login.media.berita-detail-related', [
        'related' => $relatedBerita ?? []
    ])
@endsection
