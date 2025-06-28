{{-- filepath: resources/views/admin/alat-curah-hujan/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Data Curah Hujan: {{ $alatCurahHujan->nomor_pos }}</h1>
    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <form action="{{ route('admin.alat-curah-hujan.update', $alatCurahHujan->nomor_pos) }}" method="POST" class="p-6">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                @foreach(['januari','februari','maret','april','mei','juni','juli','agustus','september','oktober','november','desember'] as $bulan)
                <div>
                    <label for="{{ $bulan }}" class="block text-sm font-medium text-gray-700 mb-2">{{ ucfirst($bulan) }}</label>
                    <input type="number" id="{{ $bulan }}" name="{{ $bulan }}" value="{{ old($bulan, $alatCurahHujan->$bulan) }}" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>
                @endforeach
            </div>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded">Simpan Perubahan</button>
        </form>
    </div>
</div>
@endsection
