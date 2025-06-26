@extends('welcome')

@section('title', 'Tarif PNBP - BMKG Stasiun Klimatologi Riau')

@section('meta')
    <meta name="description" content="Tarif Pelayanan dan Jasa MKKuG dan Standar Pelayanan Minimum - Stasiun Klimatologi Riau">
    <meta name="keywords" content="BMKG, Klimatologi, Riau, Tarif, PNBP, Pelayanan">
    <meta name="author" content="BMKG Riau">
    <link rel="icon" type="image/x-icon" href="/assets/images/favicon.ico">
@endsection

@section('content')
    @include('components.before-login.layanan.tarif-table')
@endsection
