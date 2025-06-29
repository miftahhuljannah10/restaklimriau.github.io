@extends('welcome')

@section('title', 'Form Layanan - BMKG Stasiun Klimatologi Riau')

@section('meta')
    <meta name="description" content="Form Layanan Stasiun Klimatologi Riau - Umum, Instansi Kerja Sama, dan Mahasiswa">
    <meta name="keywords" content="BMKG, Klimatologi, Riau, Form Layanan, Permintaan Data">
    <meta name="author" content="BMKG Riau">
    <link rel="icon" type="image/x-icon" href="/assets/images/favicon.ico">
@endsection

@section('content')
    @include('components.before-login.layanan.service-selection')
    @include('components.before-login.layanan.service-content')
@endsection

@push('scripts')
{{-- Script dipindahkan ke resources/js/app.js agar lebih maintainable dan terpusat --}}
@endpush

