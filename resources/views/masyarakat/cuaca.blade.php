@extends('welcome')

@section('title', 'Cuaca - BMKG Stasiun Klimatologi Riau')
@section('content')
    @include('components.hero-produk', ['title' => 'Cuaca'])
    <div class="py-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @include('components.produk-card', [
                'title' => 'Monitoring PH Air Hujan',
                'image' => '/assets/images/cuaca.png',
                'kategori' => 'Kualitas Udara',
                'stasiun' => 'Stasiun Klimatologi Riau',
            ])
        </div>
    </div>
@endsection
