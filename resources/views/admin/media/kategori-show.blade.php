
@extends('layouts.app')

@section('title', 'Detail Kategori')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="max-w-4xl mx-auto">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-semibold text-gray-800">Detail Kategori: {{ $kategoriBeritaArtikel->nama }}</h1>
            <div class="flex space-x-2">
                <a href="{{ route('admin.kategori-berita-artikel.edit', $kategoriBeritaArtikel) }}" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                    Edit
                </a>
                <a href="{{ route('admin.kategori-berita-artikel.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition">
                    Kembali ke Daftar
                </a>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Nama Kategori</h3>
                        <p class="mt-1 text-lg font-medium">{{ $kategoriBeritaArtikel->nama }}</p>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Slug</h3>
                        <p class="mt-1 text-lg font-medium">{{ $kategoriBeritaArtikel->slug }}</p>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Tanggal Dibuat</h3>
                        <p class="mt-1 text-base">{{ $kategoriBeritaArtikel->created_at->format('d M Y, H:i') }}</p>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Terakhir Diperbarui</h3>
                        <p class="mt-1 text-base">{{ $kategoriBeritaArtikel->updated_at->format('d M Y, H:i') }}</p>
                    </div>
                </div>

                <div class="mt-8">
                    <h3 class="text-lg font-medium text-gray-700 mb-4">Konten Terkait</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h4 class="font-medium text-gray-700">Berita</h4>
                            <p class="text-2xl font-bold mt-2">
                                {{ $kategoriBeritaArtikel->berita()->where('jenis', 'berita')->count() }}
                            </p>
                            <a href="#" class="text-sm text-blue-600 hover:underline mt-2 inline-block">Lihat semua berita</a>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h4 class="font-medium text-gray-700">Artikel</h4>
                            <p class="text-2xl font-bold mt-2">
                                {{ $kategoriBeritaArtikel->berita()->where('jenis', 'artikel')->count() }}
                            </p>
                            <a href="#" class="text-sm text-blue-600 hover:underline mt-2 inline-block">Lihat semua artikel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
