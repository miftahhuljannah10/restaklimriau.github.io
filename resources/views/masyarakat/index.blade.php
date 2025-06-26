@extends('welcome')

@section('title', 'BMKG Stasiun Klimatologi Riau')

@section('meta')
    <meta name="description" content="Stasiun Klimatologi Riau - Badan Meteorologi, Klimatologi, dan Geofisika">
    <meta name="keywords" content="BMKG, Klimatologi, Riau, Cuaca, Iklim, Meteorologi">
    <meta name="author" content="BMKG Riau">
    <link rel="icon" type="image/x-icon" href="/assets/images/favicon.ico">
@endsection

@section('content')
    @include('components.before-login.homepage.hero')
    @include('components.before-login.homepage.feedback-button')
    @include('components.before-login.homepage.informasi')
@endsection
