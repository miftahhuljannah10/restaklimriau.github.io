@extends('welcome')

@section('title', 'Detail Berita - BMKG Stasiun Klimatologi Riau')

@section('meta')
    <meta name="description" content="Staklim Riau Gelar Rapat PMK 2025, Sinergi BMKG-Pemprov Riau Antisipasi Dampak Musim Kemarau 2025">
    <meta name="keywords" content="BMKG, Klimatologi, Riau, Berita, PMK, Musim Kemarau">
    <meta name="author" content="BMKG Riau">
    <link rel="icon" type="image/x-icon" href="/assets/images/favicon.ico">
@endsection

@section('content')
    @include('components.before-login.media.berita-detail-header')
    @include('components.before-login.media.berita-detail-content')
    @include('components.before-login.media.berita-related')
@endsection
