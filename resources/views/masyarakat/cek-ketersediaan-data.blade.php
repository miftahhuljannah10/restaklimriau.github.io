@extends('welcome')

@section('title', 'Cek Ketersediaan Data - BMKG Stasiun Klimatologi Riau')
@section('meta')
<meta name="description" content="Cek Ketersediaan Data Alat Pengamatan BMKG Stasiun Klimatologi Riau">
<meta name="keywords" content="BMKG, Klimatologi, Riau, Data, Ketersediaan, Peta, Alat">
<meta name="author" content="BMKG Riau">
<link rel="icon" type="image/x-icon" href="/assets/images/favicon.ico">
@endsection

@section('content')
    @include('components.weather)
@endsection

