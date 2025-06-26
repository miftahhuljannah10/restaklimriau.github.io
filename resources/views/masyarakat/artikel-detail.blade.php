@extends('welcome')

@section('title', 'Detail Artikel - BMKG Stasiun Klimatologi Riau')

@section('meta')
    <meta name="description" content="Pengaruh Perubahan Iklim Terhadap Pola Curah Hujan di Provinsi Riau - Analisis Komprehensif Data Klimatologi">
    <meta name="keywords" content="BMKG, Klimatologi, Riau, Artikel, Perubahan Iklim, Curah Hujan">
    <meta name="author" content="BMKG Riau">
    <link rel="icon" type="image/x-icon" href="/assets/images/favicon.ico">
@endsection

@section('content')
    @include('components.before-login.media.artikel-detail-header')
    @include('components.before-login.media.artikel-detail-content')
    @include('components.before-login.media.artikel-detail-related')
@endsection

