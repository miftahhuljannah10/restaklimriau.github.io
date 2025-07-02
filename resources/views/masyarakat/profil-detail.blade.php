@extends('welcome')

@section('title', 'Info Profil - BMKG Stasiun Klimatologi Riau')

@section('meta')
    <meta name="description" content="Info Profil Pegawai BMKG Stasiun Klimatologi Riau">
    <meta name="keywords" content="BMKG, Klimatologi, Riau, Profil, Pegawai">
    <meta name="author" content="BMKG Riau">
    <link rel="icon" type="image/x-icon" href="/assets/images/favicon.ico">
@endsection

@section('content')
    <main class="min-h-screen bg-white py-10">
        <div class="max-w-6xl mx-auto px-4 lg:px-8">
            <!-- Back Button -->
            <div class="mb-6 flex justify-start">
                <button onclick="history.back()" class="inline-flex items-center gap-2 text-sky-500 hover:text-sky-600 transition-colors">
                    <i class="fas fa-arrow-left"></i>
                    <span class="font-medium font-montserrat">Kembali</span>
                </button>
            </div>
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                @include('components.before-login.profil.profil-detail-content')
            </div>
        </div>
    </main>
@endsection
