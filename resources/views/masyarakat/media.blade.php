@extends('welcome')

@section('title', 'Media - BMKG Stasiun Klimatologi Riau')

@section('meta')
    <meta name="description" content="Media dan Publikasi - BMKG Stasiun Klimatologi Riau">
    <meta name="keywords" content="BMKG, Klimatologi, Riau, Media, Publikasi, Artikel, Berita">
    <meta name="author" content="BMKG Riau">
    <link rel="icon" type="image/x-icon" href="/assets/images/favicon.ico">
@endsection

@section('content')
    @include('components.before-login.media.media-section')
@endsection
