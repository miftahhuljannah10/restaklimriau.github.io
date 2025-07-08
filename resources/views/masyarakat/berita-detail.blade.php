@extends('welcome')

@section('title', $berita->judul . ' - BMKG Stasiun Klimatologi Riau')

@section('meta')
    <meta name="description" content="{{ Str::limit(strip_tags($berita->isi), 160) }}">
    <meta name="keywords" content="BMKG, Klimatologi, Riau, Berita, {{ $berita->kategori->nama ?? 'Meteorologi' }}, {{ $berita->judul }}">
    <meta name="author" content="{{ $berita->penulis }}">
    <link rel="icon" type="image/x-icon" href="/assets/images/favicon.ico">
@endsection

@section('content')
    @include('components.before-login.media.berita-detail-header', ['berita' => $berita])
    @include('components.before-login.media.berita-detail-content', ['berita' => $berita])
    @include('components.before-login.media.berita-detail-related', ['berita' => $berita])
@endsection
