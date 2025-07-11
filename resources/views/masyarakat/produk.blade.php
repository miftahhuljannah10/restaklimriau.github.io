@extends('welcome')

@section('title', 'Produk - BMKG Stasiun Klimatologi Riau')
@section('meta')
<meta name="description" content="Produk Stasiun Klimatologi Riau - Data dan informasi meteorologi, klimatologi, dan geofisika">
<meta name="keywords" content="BMKG, Klimatologi, Riau, Produk, Data, Informasi">
<meta name="author" content="BMKG Riau">
@endsection

@section('content')
    @include('components.before-login.produk.produk-grid', [
        'produkList' => [
            [
                'title' => 'Iklim Terapan',
                'image' => '/assets/images/terapan.png',
                'url' => '/iklim-terapan',
            ],
            [
                'title' => 'Perubahan Iklim',
                'image' => '/assets/images/periklim.png',
                'url' => '/perubahan-iklim',
            ],
            [
                'title' => 'Informasi Iklim',
                'image' => '/assets/images/iniklim.png',
                'url' => '/informasi-iklim',
            ],
            [
                'title' => 'Kualitas Udara',
                'image' => '/assets/images/udara.png',
                'url' => '/kualitas-udara',
            ],
            [
                'title' => 'Cuaca',
                'image' => '/assets/images/cuaca.png',
                'url' => '/cuaca',
            ],
        ]
    ])
@endsection
