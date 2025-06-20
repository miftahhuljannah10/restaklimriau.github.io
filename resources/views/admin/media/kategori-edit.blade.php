
@extends('layouts.app')

@section('title', 'Edit Kategori')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="max-w-lg mx-auto">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-semibold text-gray-800">Edit Kategori</h1>
            <a href="{{ route('admin.kategori-berita-artikel.index') }}" class="text-blue-600 hover:underline">
                Kembali ke Daftar
            </a>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <form action="{{ route('admin.kategori-berita-artikel.update', $kategoriBeritaArtikel) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Kategori</label>
                    <input type="text" name="nama" id="nama" value="{{ old('nama', $kategoriBeritaArtikel->nama) }}"
                           class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 @error('nama') border-red-500 @enderror"
                           required>

                    @error('nama')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="slug" class="block text-sm font-medium text-gray-700 mb-1">Slug (Otomatis)</label>
                    <input type="text" id="slug" value="{{ $kategoriBeritaArtikel->slug }}"
                           class="w-full rounded-md border-gray-300 bg-gray-100 shadow-sm"
                           disabled>
                </div>

                <div class="mt-6 flex space-x-2">
                    <button type="submit" class="flex-1 px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition">
                        Update Kategori
                    </button>
                    <a href="{{ route('admin.kategori-berita-artikel.index') }}" class="flex-1 px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 text-center transition">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
