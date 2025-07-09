<x-layouts.admin title="Tambah Kategori Produk" subtitle="Manajemen kategori produk">

    <x-main.layouts.breadcrumb :items="[['title' => 'Kategori Produk', 'url' => route('kategori-produk.index')], ['title' => 'Tambah']]" />

    <x-main.cards.content-card class="max-w-xl mx-auto">
        <form action="{{ route('kategori-produk.store') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="nama_kategori" class="block text-sm font-medium text-gray-700 mb-1">Nama Kategori <span
                        class="text-red-500">*</span></label>
                <input type="text" name="nama_kategori" id="nama_kategori" value="{{ old('nama_kategori') }}"
                    class="block w-full px-3 py-2 border @error('nama_kategori') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-500 text-sm placeholder-gray-400"
                    placeholder="Masukkan nama kategori" required autofocus>
                @error('nama_kategori')
                    <span class="text-xs text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex justify-end gap-2">
                <a href="{{ route('kategori-produk.index') }}"
                    class="px-4 py-2 rounded bg-gray-100 text-gray-700 hover:bg-gray-200 text-sm font-medium">Batal</a>
                <button type="submit"
                    class="px-4 py-2 rounded bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold">Simpan</button>
            </div>
        </form>
    </x-main.cards.content-card>

</x-layouts.admin>
