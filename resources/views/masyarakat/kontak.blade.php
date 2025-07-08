@extends('welcome')

@section('title', 'Kontak Kami - BMKG Stasiun Klimatologi Riau')
@section('meta')
<meta name="description" content="Kontak Stasiun Klimatologi Riau - Hubungi kami untuk informasi dan layanan">
<meta name="keywords" content="BMKG, Klimatologi, Riau, Kontak, Alamat, Telepon">
<meta name="author" content="BMKG Riau">
@endsection

@section('content')
    @include('components.before-login.kontak.kontak-content', [
        'title' => 'Hubungi Kami',
        'contacts' => [
            [
                'type' => 'Lokasi',
                'icon' => 'fas fa-map-marker-alt',
                'bg' => 'bg-sky-500',
                'label' => 'Lokasi',
                'value' => 'Jl. Unggas, Kelurahan Simpang Tiga',
                'link' => 'https://maps.app.goo.gl/VuHTCyppfqrvZgv59',
            ],
            [
                'type' => 'Email',
                'icon' => 'fas fa-envelope',
                'bg' => 'bg-blue-500',
                'label' => 'Email',
                'value' => 'staklim.riau@bmkg.go.id',
                'link' => 'mailto:staklim.riau@bmkg.go.id',
            ],
            [
                'type' => 'WhatsApp',
                'icon' => 'fab fa-whatsapp',
                'bg' => 'bg-gradient-to-l from-green-600 to-green-400',
                'label' => 'WhatsApp',
                'value' => '+628117532480',
                'link' => 'https://wa.me/628117532480',
            ],
            [
                'type' => 'Telepon',
                'icon' => 'fas fa-phone',
                'bg' => 'bg-yellow-500',
                'label' => 'Telepon',
                'value' => '+627618411831',
                'link' => 'tel:+627618411831',
            ],
            [
                'type' => 'Telegram',
                'icon' => 'fab fa-telegram-plane',
                'bg' => 'bg-gradient-to-b from-sky-400 to-sky-500',
                'label' => 'Telegram',
                'value' => '@StaklimRiau',
                'link' => 'https://t.me/StaklimRiau',
            ],
            [
                'type' => 'Instagram',
                'icon' => 'fab fa-instagram',
                'bg' => 'bg-[radial-gradient(ellipse_99.11%_92.18%_at_26.56%_107.70%,_#FFDD55_0%,_#FFDD55_10%,_#FF543E_50%,_#C837AB_100%)]',
                'label' => 'Instagram',
                'value' => '@iklimriau',
                'link' => 'https://www.instagram.com/iklimriau',
            ],
        ],
        'operational' => [
            [ 'day' => 'Senin - Kamis', 'time' => '08:00 - 16:00 WIB' ],
            [ 'day' => 'Jumat', 'time' => '08:00 - 16:30 WIB' ],
        ]
    ])
@endsection

