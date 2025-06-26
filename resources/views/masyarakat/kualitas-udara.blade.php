@extends('welcome')

@section('title', 'Kualitas Udara - BMKG Stasiun Klimatologi Riau')
@section('content')
    @include('components.before-login.produk.hero-produk', ['title' => 'Kualitas Udara'])
    <div class="py-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @include('components.produk-card', [
                'title' => 'Informasi Gas Rumah Kaca',
                'image' => '/assets/images/udara.png',
                'kategori' => 'Kualitas Udara',
                'stasiun' => 'Stasiun Klimatologi Riau',
            ])
            @include('components.produk-card', [
                'title' => 'Informasi Partikulat PM 2.5 (Dasarian)',
                'image' => '/assets/images/udara.png',
                'kategori' => 'Kualitas Udara',
                'stasiun' => 'Stasiun Klimatologi Riau',
            ])
            @include('components.produk-card', [
                'title' => 'Monitoring Partikulat SPM',
                'image' => '/assets/images/udara.png',
                'kategori' => 'Kualitas Udara',
                'stasiun' => 'Stasiun Klimatologi Riau',
            ])
        </div>
    </div>
@endsection
