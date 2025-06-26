@extends('welcome')

@section('title', 'Perubahan Iklim - BMKG Stasiun Klimatologi Riau')
@section('content')
    @include('components.hero-produk', ['title' => 'Perubahan Iklim'])
    <div class="py-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @include('components.before-login.produk.produk-card')
        </div>
    </div>
@endsection
