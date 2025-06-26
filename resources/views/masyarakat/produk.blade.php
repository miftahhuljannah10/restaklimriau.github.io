@extends('welcome')

@section('title', 'Produk - BMKG Stasiun Klimatologi Riau')
@section('meta')
<meta name="description" content="Produk Stasiun Klimatologi Riau - Data dan informasi meteorologi, klimatologi, dan geofisika">
<meta name="keywords" content="BMKG, Klimatologi, Riau, Produk, Data, Informasi">
<meta name="author" content="BMKG Riau">
@endsection

@section('content')
    @include('components.before-login.produk.produk-grid')
@endsection
