@extends('layouts.app')

@section('content')
    <div class="max-w-5xl mx-auto py-6 px-4">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Edit Produk {{ ucfirst(str_replace('_', ' ', $type)) }}</h1>
            {{-- <a href="{{ route('produk.index', $type) }}" class="text-blue-600 hover:underline text-sm">← Kembali</a> --}}
        </div>

        <form action="{{ route('produk.update', [$type, $produk->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 bg-white p-6 rounded-xl shadow-md">
                <div>
                    <label for="judul" class="block font-medium text-sm mb-1">Judul Produk</label>
                    <input type="text" name="judul" id="judul" value="{{ old('judul', $produk->judul) }}" required
                        class="w-full border border-gray-300 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Masukkan judul produk" />
                </div>

                <div>
                    <label for="penulis" class="block font-medium text-sm mb-1">Penulis</label>
                    <input type="text" name="penulis" id="penulis"
                        value="{{ old('penulis', $produk->penulis ?? 'Stasiun Klimatologi Riau') }}"
                        class="w-full border border-gray-300 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="md:col-span-2">
                    <label for="kategori_id" class="block font-medium text-sm mb-1">Kategori</label>
                    <select name="kategori_id[]" id="kategori_id"  class="w-full border border-gray-300 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500">
                        @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori->id }}"
                                {{ in_array($kategori->id, old('kategori_id', $produk->kategori->pluck('id')->toArray())) ? 'selected' : '' }}>
                                {{ $kategori->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                    <small class="text-gray-500 text-xs">Tekan Ctrl (Cmd) untuk memilih beberapa kategori</small>
                </div>

                <div class="md:col-span-2">
                    <label for="isi" class="block font-medium text-sm mb-1">Isi Produk</label>
                    <textarea name="isi" id="isi">{{ old('isi', $produk->isi) }}</textarea>
                </div>

                <div class="md:col-span-2">
                    <label for="script" class="block font-medium text-sm mb-1">Embed Script (Tableau)</label>
                    <textarea name="script" id="script" rows="4"
                        class="w-full border border-gray-300 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Masukkan Script Tableau">{{ old('script', $produk->script) }}</textarea>
                </div>

                <div class="md:col-span-2">
                    <label class="block font-medium text-sm mb-1">Gambar (URL)</label>
                    <div id="gambar-container" class="space-y-2">
                        @php
                            $oldGambar = old('gambar', $produk->gambar->pluck('path')->toArray());
                        @endphp

                        @if(!empty($oldGambar))
                            @foreach($oldGambar as $url)
                                <div class="flex gap-2">
                                    <input type="url" name="gambar[]" value="{{ $url }}" placeholder="URL Gambar"
                                        class="w-full border border-gray-300 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500" />
                                    <button type="button" onclick="this.parentElement.remove()"
                                        class="text-sm text-red-500 hover:underline">Hapus</button>
                                </div>
                            @endforeach
                        @else
                            <div class="flex gap-2">
                                <input type="url" name="gambar[]" placeholder="URL Gambar"
                                    class="w-full border border-gray-300 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500" />
                                <button type="button" onclick="addGambarField()"
                                    class="text-sm text-blue-600 hover:underline">+ Tambah</button>
                            </div>
                        @endif
                    </div>
                    <button type="button" onclick="addGambarField()" class="mt-2 text-sm text-blue-600 hover:underline">+ Tambah Gambar</button>
                </div>

                <div>
                    <label for="status" class="block font-medium text-sm mb-1">Status</label>
                    <select name="status" id="status" required
                        class="w-full border border-gray-300 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="draft" {{ old('status', $produk->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="published" {{ old('status', $produk->status) == 'published' ? 'selected' : '' }}>Published</option>
                        <option value="archived" {{ old('status', $produk->status) == 'archived' ? 'selected' : '' }}>Archived</option>
                    </select>
                </div>

                <div class="md:col-span-2 flex justify-end gap-4">
                    <a href="{{ route('produk.index', $type) }}"
                        class="inline-flex items-center px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition-colors duration-150">
                        Kembali
                    </a>
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors duration-150">
                        Perbarui Produk
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css" rel="stylesheet" />
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js"></script>
    <script>
        new FroalaEditor('#isi', {
            heightMin: 300,
            imageUpload: false
        });

        function addGambarField() {
            const container = document.getElementById('gambar-container');
            const div = document.createElement('div');
            div.className = 'flex gap-2';
            div.innerHTML = `
                <input type="url" name="gambar[]" placeholder="URL Gambar"
                    class="flex-1 rounded-md border border-gray-300 focus:border-blue-500 focus:ring-blue-500 text-sm p-2">
                <button type="button" onclick="this.parentElement.remove()" class="text-sm text-red-500 hover:underline">Hapus</button>
            `;
            container.appendChild(div);
        }
    </script>
@endpush
