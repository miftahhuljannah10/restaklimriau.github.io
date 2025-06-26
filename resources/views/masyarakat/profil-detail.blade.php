@extends('welcome')

@section('title', 'Info Profil - BMKG Stasiun Klimatologi Riau')

@section('meta')
    <meta name="description" content="Info Profil Pegawai BMKG Stasiun Klimatologi Riau">
    <meta name="keywords" content="BMKG, Klimatologi, Riau, Profil, Pegawai">
    <meta name="author" content="BMKG Riau">
    <link rel="icon" type="image/x-icon" href="/assets/images/favicon.ico">
@endsection

@section('content')
    <main class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-cyan-50 py-12">
        <div class="max-w-6xl mx-auto px-4 lg:px-8">
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                @include('components.before-login.profil.profil-detail-content')
            </div>
        </div>
    </main>
@endsection
