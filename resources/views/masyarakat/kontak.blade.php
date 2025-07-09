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
                'value' => $kontak['alamat'] ?? '-',
                'link' => $kontak['alamat_link'] ?? '#',
            ],
            [
                'type' => 'Email',
                'icon' => 'fas fa-envelope',
                'bg' => 'bg-blue-500',
                'label' => 'Email',
                'value' => $kontak['email'] ?? '-',
                'link' => $kontak['email_link'] ?? '#',
            ],
            [
                'type' => 'WhatsApp',
                'icon' => 'fab fa-whatsapp',
                'bg' => 'bg-gradient-to-l from-green-600 to-green-400',
                'label' => 'WhatsApp',
                'value' => $kontak['whatsapp'] ?? '-',
                'link' => $kontak['whatsapp_link'] ?? '#',
            ],
            [
                'type' => 'Telepon',
                'icon' => 'fas fa-phone',
                'bg' => 'bg-yellow-500',
                'label' => 'Telepon',
                'value' => $kontak['telepon'] ?? '-',
                'link' => $kontak['telepon_link'] ?? '#',
            ],
            [
                'type' => 'Telegram',
                'icon' => 'fab fa-telegram-plane',
                'bg' => 'bg-gradient-to-b from-sky-400 to-sky-500',
                'label' => 'Telegram',
                'value' => $kontak['telegram'] ?? '-',
                'link' => $kontak['telegram_link'] ?? '#',
            ],
            [
                'type' => 'Instagram',
                'icon' => 'fab fa-instagram',
                'bg' =>
                    'bg-[radial-gradient(ellipse_99.11%_92.18%_at_26.56%_107.70%,_#FFDD55_0%,_#FFDD55_10%,_#FF543E_50%,_#C837AB_100%)]',
                'label' => 'Instagram',
                'value' => $kontak['instagram'] ?? '-',
                'link' => $kontak['instagram_link'] ?? '#',
            ],
        ],
        'operational' => [
            ['day' => 'Senin - Kamis', 'time' => $kontak['operasional_senin_kamis'] ?? '-'],
            ['day' => 'Jumat', 'time' => $kontak['operasional_jumat'] ?? '-'],
        ],
    ])
@endsection
