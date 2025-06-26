@extends('welcome')

@section('title', 'Informasi Iklim - BMKG Stasiun Klimatologi Riau')
@section('content')
    @include('components.before-login.produk.hero-produk', ['title' => 'Informasi Iklim'])
    <div class="py-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @include('components.produk-card', [
                'title' => 'Prakiraan Daerah Potensi Banjir (Bulanan)',
                'image' => '/assets/images/iniklim.png',
                'kategori' => 'Hidrometeorologi',
                'stasiun' => 'Stasiun Klimatologi Riau',
            ])
        </div>
    </div>
@endsection
