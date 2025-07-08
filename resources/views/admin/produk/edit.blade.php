<x-layouts.admin title="Edit Produk {{ ucfirst(str_replace('_', ' ', $type)) }}">
    <x-main.layouts.breadcrumb :items="[
        ['title' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['title' => 'Produk'],
        ['title' => ucfirst(str_replace('_', ' ', $type)), 'url' => route('produk.index', $type)],
        ['title' => 'Edit'],
    ]" />

    <x-main.cards.content-card title="Edit Produk {{ ucfirst(str_replace('_', ' ', $type)) }}">
        <x-slot:header>
            <x-main.buttons.action-button variant="secondary" icon="arrow-left" href="{{ route('produk.index', $type) }}">
                Kembali
            </x-main.buttons.action-button>
        </x-slot:header>

        <form action="{{ route('produk.update', [$type, $produk->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="judul" class="block font-medium text-sm mb-1">Judul Produk</label>
                    <input type="text" name="judul" id="judul" value="{{ old('judul', $produk->judul) }}"
                        required
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
                    <select name="kategori_id[]" id="kategori_id"
                        class="w-full border border-gray-300 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500">
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
                        @if (!empty($oldGambar))
                            @foreach ($oldGambar as $url)
                                <div class="flex gap-2">
                                    <input type="url" name="gambar[]" value="{{ $url }}"
                                        placeholder="URL Gambar"
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
                    <button type="button" onclick="addGambarField()"
                        class="mt-2 text-sm text-blue-600 hover:underline">+ Tambah Gambar</button>
                </div>

                <div>
                    <label for="status" class="block font-medium text-sm mb-1">Status</label>
                    <select name="status" id="status" required
                        class="w-full border border-gray-300 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="draft" {{ old('status', $produk->status) == 'draft' ? 'selected' : '' }}>Draft
                        </option>
                        <option value="published"
                            {{ old('status', $produk->status) == 'published' ? 'selected' : '' }}>Published</option>
                        <option value="archived" {{ old('status', $produk->status) == 'archived' ? 'selected' : '' }}>
                            Archived</option>
                    </select>
                </div>

                <div class="md:col-span-2 flex justify-end gap-4">
                    <x-main.buttons.submit-button>
                        Perbarui Produk
                    </x-main.buttons.submit-button>
                </div>
            </div>
        </form>
    </x-main.cards.content-card>
</x-layouts.admin>

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
