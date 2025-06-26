@extends('welcome')

@section('title', 'Layanan - BMKG Stasiun Klimatologi Riau')
@section('meta')
<meta name="description" content="Layanan BMKG Stasiun Klimatologi Riau">
<meta name="keywords" content="BMKG, Layanan, Klimatologi, Riau, Cuaca, Iklim, Meteorologi">
<meta name="author" content="BMKG Riau">
@endsection

@section('content')
    @include('components.before-login.layanan.hero-layanan')
    @include('components.before-login.layanan.alur-pelayanan')
    @include('components.before-login.layanan.jenis-pelayanan')
@endsection
