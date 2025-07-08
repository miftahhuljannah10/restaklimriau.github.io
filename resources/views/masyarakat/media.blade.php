@extends('welcome')

@section('title', 'Media - BMKG Stasiun Klimatologi Riau')

@section('meta')
    <meta name="description" content="Media dan Publikasi - BMKG Stasiun Klimatologi Riau">
    <meta name="keywords" content="BMKG, Klimatologi, Riau, Media, Publikasi, Artikel, Berita">
    <meta name="author" content="BMKG Riau">
    <link rel="icon" type="image/x-icon" href="/assets/images/favicon.ico">
@endsection

@section('content')
    @include('components.before-login.media.media-section', [
        'media' => [
            [
                'title' => 'Artikel',
                'desc' => 'Kumpulan artikel seputar iklim, cuaca, dan info BMKG Riau.',
                'img' => 'assets/images/artikel.png',
                'href' => '/artikel',
                'label' => 'Klik untuk membaca artikel'
            ],
            [
                'title' => 'Berita',
                'desc' => 'Berita terbaru dan update kegiatan BMKG Riau.',
                'img' => 'assets/images/berita.png',
                'href' => '/berita',
                'label' => 'Klik untuk membaca berita'
            ],
            [
                'title' => 'Buletin',
                'desc' => 'Buletin dan publikasi resmi BMKG Riau.',
                'img' => 'assets/images/buletin.png',
                'href' => '/buletin',
                'label' => 'Klik untuk unduh buletin'
            ],
        ],
        'featured' => [
            'title' => 'Media Stasiun Klimatologi Riau',
            'desc' => 'Tempat kamu untuk mencari informasi seputar Stasiun Klimatologi Riau',
            'img' => 'assets/images/mediaa.png'
        ]
    ])
@endsection
