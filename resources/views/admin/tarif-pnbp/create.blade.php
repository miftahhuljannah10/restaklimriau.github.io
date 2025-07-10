<x-layouts.admin title="Tambah Tarif PNBP" subtitle="Menambahkan data tarif Penerimaan Negara Bukan Pajak">
    {{-- Breadcrumb --}}
    <x-main.layouts.breadcrumb :items="[['title' => 'Tarif PNBP', 'url' => route('tarif-pnbp.index')], ['title' => 'Tambah Tarif']]" />

    {{-- Main Content --}}
    <x-main.cards.content-card>
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Tambah Tarif PNBP</h3>
                    <p class="text-sm text-gray-600">Masukkan informasi tarif Penerimaan Negara Bukan Pajak</p>
                </div>
                <div class="flex items-center space-x-2">
                    <x-main.buttons.action-button href="{{ route('tarif-pnbp.index') }}" variant="secondary">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Kembali ke Daftar
                    </x-main.buttons.action-button>
                </div>
            </div>
        </div>

        <div class="p-6">
            <form action="{{ route('tarif-pnbp.store') }}" method="POST" class="space-y-6">
                @csrf

                {{-- Informasi Tarif Section --}}
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-6">
                    <h4 class="text-lg font-medium text-blue-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Informasi Tarif
                    </h4>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Nama Tarif --}}
                        <div>
                            <label for="nama_tarif" class="block text-sm font-medium text-gray-700 mb-2">
                                Nama Tarif <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="nama_tarif" name="nama_tarif" value="{{ old('nama_tarif') }}"
                                class="block w-full px-3 py-2 border rounded-md bg-white focus:outline-none focus:ring-2 transition duration-200 @error('nama_tarif') border-red-500 focus:ring-red-500 @else border-gray-300 focus:ring-blue-500 @enderror"
                                placeholder="Masukkan nama tarif" required>
                            @error('nama_tarif')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Jenis Tarif --}}
                        <div>
                            <label for="jenis_tarif" class="block text-sm font-medium text-gray-700 mb-2">
                                Jenis Tarif <span class="text-red-500">*</span>
                            </label>
                            <select id="jenis_tarif" name="jenis_tarif"
                                class="block w-full px-3 py-2 border rounded-md bg-white focus:outline-none focus:ring-2 transition duration-200 @error('jenis_tarif') border-red-500 focus:ring-red-500 @else border-gray-300 focus:ring-blue-500 @enderror"
                                required>
                                <option value="">Pilih Jenis Tarif</option>
                                <option value="Informasi Meteorologi, Klimatologi dan Geofisika" {{ old('jenis_tarif') === 'Informasi Meteorologi, Klimatologi dan Geofisika' ? 'selected' : '' }}>
                                    Informasi Meteorologi, Klimatologi dan Geofisika
                                </option>
                                <option value="Informasi Khusus Meteorologi, Klimatologi dan Geofisika Sesuai Permintaan" {{ old('jenis_tarif') === 'Informasi Khusus Meteorologi, Klimatologi dan Geofisika Sesuai Permintaan' ? 'selected' : '' }}>
                                    Informasi Khusus Meteorologi, Klimatologi dan Geofisika Sesuai Permintaan
                                </option>
                            </select>
                            @error('jenis_tarif')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Detail Tarif Section --}}
                <div class="bg-green-50 border border-green-200 rounded-lg p-6">
                    <h4 class="text-lg font-medium text-green-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                        </svg>
                        Detail Tarif
                    </h4>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        {{-- Tarif --}}
                        <div>
                            <label for="tarif" class="block text-sm font-medium text-gray-700 mb-2">
                                Tarif <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="tarif" name="tarif" value="{{ old('tarif') }}"
                                class="block w-full px-3 py-2 border rounded-md bg-white focus:outline-none focus:ring-2 transition duration-200 @error('tarif') border-red-500 focus:ring-red-500 @else border-gray-300 focus:ring-blue-500 @enderror"
                                placeholder="Misal: Rp. 70.000,-" required>
                            @error('tarif')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Satuan --}}
                        <div>
                            <label for="satuan" class="block text-sm font-medium text-gray-700 mb-2">
                                Satuan <span class="text-red-500">*</span>
                            </label>
                            <select id="satuan" name="satuan"
                                class="block w-full px-3 py-2 border rounded-md bg-white focus:outline-none focus:ring-2 transition duration-200 @error('satuan') border-red-500 focus:ring-red-500 @else border-gray-300 focus:ring-blue-500 @enderror"
                                required>
                                <option value="">Pilih Satuan</option>
                                <option value="Per Buku" {{ old('satuan') === 'Per Buku' ? 'selected' : '' }}>Per Buku</option>
                                <option value="Per Atlas" {{ old('satuan') === 'Per Atlas' ? 'selected' : '' }}>Per Atlas</option>
                                <option value="Per Stasiun/Tahun" {{ old('satuan') === 'Per Stasiun/Tahun' ? 'selected' : '' }}>Per Stasiun/Tahun</option>
                                <option value="Per Lokasi" {{ old('satuan') === 'Per Lokasi' ? 'selected' : '' }}>Per Lokasi</option>
                            </select>
                            @error('satuan')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Waktu --}}
                        <div>
                            <label for="waktu" class="block text-sm font-medium text-gray-700 mb-2">
                                Waktu <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="waktu" name="waktu" value="{{ old('waktu') }}"
                                class="block w-full px-3 py-2 border rounded-md bg-white focus:outline-none focus:ring-2 transition duration-200 @error('waktu') border-red-500 focus:ring-red-500 @else border-gray-300 focus:ring-blue-500 @enderror"
                                placeholder="Masukkan waktu" required>
                            @error('waktu')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Form Actions --}}
                <div class="flex justify-end space-x-3">
                    <x-main.buttons.action-button href="{{ route('tarif-pnbp.index') }}" variant="secondary">
                        Batal
                    </x-main.buttons.action-button>
                    <x-main.buttons.submit-button variant="primary">
                        Simpan
                    </x-main.buttons.submit-button>
                </div>
            </form>
        </div>
    </x-main.cards.content-card>
</x-layouts.admin>
