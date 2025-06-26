@extends('welcome')

@section('title', 'Profil - BMKG Stasiun Klimatologi Riau')
@section('meta')
<meta name="description" content="Profil Stasiun Klimatologi Riau - Sejarah, Visi, Misi, dan Layanan BMKG">
<meta name="keywords" content="BMKG, Klimatologi, Riau, Profil, Sejarah, Visi, Misi">
<meta name="author" content="BMKG Riau">
<link rel="icon" type="image/x-icon" href="/assets/images/favicon.ico">
@endsection

@section('content')
    @include('components.before-login.profil.hero-profil')
    @include('components.before-login.profil.profil-section-nav')
    <div class="bg-gray" role="tabpanel">
        <!-- Tentang Section -->
        <section id="section-tentang" class="content-section py-16" role="tabpanel" aria-labelledby="tab-tentang">
            <div class="max-w-[1440px] mx-auto px-4 lg:px-10">
                @include('components.before-login.profil.profil-tentang')
            </div>
        </section>

        <!-- Sejarah Section -->
        <section id="section-sejarah" class="content-section py-16 hidden" role="tabpanel" aria-labelledby="tab-sejarah">
            <div class="max-w-[1440px] mx-auto px-4 lg:px-10">
                @include('components.before-login.profil.profil-sejarah')
            </div>
        </section>

        <!-- Visi & Misi Section -->
        <section id="section-visi-misi" class="content-section py-16 hidden" role="tabpanel" aria-labelledby="tab-visi-misi">
            <div class="max-w-[1440px] mx-auto px-4 lg:px-10">
                @include('components.before-login.profil.profil-visi-misi')
            </div>
        </section>

        <!-- Tim Section -->
        <section id="section-tim" class="content-section py-2 hidden" role="tabpanel" aria-labelledby="tab-tim">
            <div class="max-w-[1440px] mx-auto px-4 lg:px-10">
                @include('components.before-login.profil.profil-hr-section')
            </div>
        </section>

        <!-- Layanan Section -->
        <section id="section-layanan" class="content-section py-16 hidden" role="tabpanel" aria-labelledby="tab-layanan">
            <div class="max-w-[1440px] mx-auto px-4 lg:px-10">
                @include('components.before-login.profil.profil-service-offices')
            </div>
        </section>
    </div>
@endsection


