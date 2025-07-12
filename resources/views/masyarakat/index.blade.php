@extends('welcome')

@section('title', 'BMKG Stasiun Klimatologi Riau')

@section('meta')
    <meta name="description" content="Stasiun Klimatologi Riau - Badan Meteorologi, Klimatologi, dan Geofisika">
    <meta name="keywords" content="BMKG, Klimatologi, Riau, Cuaca, Iklim, Meteorologi">
    <meta name="author" content="BMKG Riau">
    <link rel="icon" type="image/x-icon" href="/assets/images/favicon.ico">
@endsection

@section('content')
    @include('components.before-login.homepage.hero', [
        'title' => 'Selamat Datang <br>di Portal Iklim Riau</br>',
        'subtitle' =>
            'Update data iklim, cuaca, dan kualitas udara <span class="text-yellow-300">setiap hari</span> dari Stasiun Klimatologi Riau. Temukan info, layanan, dan publikasi terpercaya di satu tempat!',
        'bgImage' => asset('assets/images/hero-bg.jpg'),
    ])
    @include('components.before-login.homepage.dynamic-feedback-button', [
        'questions' => $feedbackQuestions,
        'buttonTitle' => 'Kirim Feedback',
        'buttonIcon' => 'fas fa-comment-dots',
        'buttonLabel' => 'Feedback',
        'modalTitle' => 'Feedback BMKG Riau',
        'modalSubtitle' => 'Bantu kami jadi lebih baik!',
        'introText' => 'Kami ingin mendengar pengalaman dan saran Anda!',
        'submitIcon' => 'fas fa-paper-plane',
        'submitLabel' => 'Kirim Feedback',
        'logoUrl' => asset('assets/images/bmkg-logo-2.png'),
    ])
    @include('components.before-login.homepage.informasi', [
        'title' => 'Informasi Hari Ini',
        'icon' => asset('assets/images/ikon-warning.png'),
        'alertTitle' => 'Peringatan Dini Cuaca Pekanbaru',
        'alertDesc' =>
            'Beberapa wilayah masih berpotensi terjadi hujan dengan intensitas sedang hingga lebat yang dapat disertai kilat/petir dan angin kencang pada 1 Juni 2025 pukul 17.30 WIB. Diperkirakan masih dapat berlangsung hingga 11 Apr 2025 pukul 19.30 WIB.',
        'alertLink' => '',
    ])
    @include('components.before-login.homepage.prakiraan-cuaca-section', [
        'prakiraanCuacaRiau' => $prakiraanCuacaRiau,
    ])
    @include('components.before-login.homepage.gempa-bumi-section', [
        // Data akan diisi dari controller
        'gempa' => $gempa ?? null,
    ])
    @include('components.before-login.homepage.kualitas-udara-section')
@endsection
