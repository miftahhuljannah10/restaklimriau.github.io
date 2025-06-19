@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-semibold mb-4">Tambah Kategori Produk</h2>

    <form action="{{ route('kategori-produk.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="nama_kategori" class="block text-gray-700">Nama Kategori</label>
            <input type="text" name="nama_kategori" id="nama_kategori"
                class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-500"
                required>
            @error('nama_kategori')
                <span class="text-sm text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
            Simpan
        </button>
    </form>
</div>
@endsection
