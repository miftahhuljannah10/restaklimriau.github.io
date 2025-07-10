<x-layouts.admin title="Edit Tarif PNBP" subtitle="Mengubah data tarif Penerimaan Negara Bukan Pajak">
    {{-- Breadcrumb --}}
    <x-main.layouts.breadcrumb :items="[['title' => 'Tarif PNBP', 'url' => route('tarif-pnbp.index')], ['title' => 'Edit Tarif']]" />

    {{-- Main Content --}}
    <x-main.cards.content-card>
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Edit Tarif PNBP</h3>
                    <p class="text-sm text-gray-600">Ubah informasi tarif Penerimaan Negara Bukan Pajak</p>
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
            <form action="{{ route('tarif-pnbp.update', $tarif->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

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
                        {{-- Nama Tarif Field --}}
                        <div>
                            <label for="nama_tarif" class="block text-sm font-medium text-gray-700 mb-2">
                                Nama Tarif <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </div>
                                <input type="text" id="nama_tarif" name="nama_tarif"
                                    value="{{ old('nama_tarif', $tarif->nama_tarif) }}"
                                    class="block w-full pl-10 pr-3 py-3 border rounded-lg leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-2 transition-colors duration-200 @error('nama_tarif') border-red-500 focus:ring-red-500 focus:border-red-500 @else border-gray-300 focus:ring-blue-500 focus:border-blue-500 @enderror"
                                    placeholder="Masukkan nama tarif" required>
                            </div>
                            @error('nama_tarif')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Jenis Tarif Field --}}
                        <div>
                            <label for="jenis_tarif" class="block text-sm font-medium text-gray-700 mb-2">
                                Jenis Tarif <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                </div>
                                <select id="jenis_tarif" name="jenis_tarif"
                                    class="block w-full pl-10 pr-3 py-3 border rounded-lg leading-5 bg-white focus:outline-none focus:ring-2 transition-colors duration-200 @error('jenis_tarif') border-red-500 focus:ring-red-500 focus:border-red-500 @else border-gray-300 focus:ring-blue-500 focus:border-blue-500 @enderror"
                                    required>
                                    <option value="">Pilih Jenis Tarif</option>
                                    <option value="Informasi Meteorologi, Klimatologi dan Geofisika"
                                        {{ old('jenis_tarif', $tarif->jenis_tarif) === 'Informasi Meteorologi, Klimatologi dan Geofisika' ? 'selected' : '' }}>
                                        Informasi Meteorologi, Klimatologi dan Geofisika
                                    </option>
                                    <option
                                        value="Informasi Khusus Meteorologi, Klimatologi dan Geofisika Sesuai Permintaan"
                                        {{ old('jenis_tarif', $tarif->jenis_tarif) === 'Informasi Khusus Meteorologi, Klimatologi dan Geofisika Sesuai Permintaan' ? 'selected' : '' }}>
                                        Informasi Khusus Meteorologi, Klimatologi dan Geofisika Sesuai Permintaan
                                    </option>
                                </select>
                            </div>
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
                        {{-- Tarif Field --}}
                        <div>
                            <label for="tarif" class="block text-sm font-medium text-gray-700 mb-2">
                                Tarif <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <input type="text" id="tarif" name="tarif"
                                    value="{{ old('tarif', $tarif->tarif) }}"
                                    class="block w-full pl-10 pr-3 py-3 border rounded-lg leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-2 transition-colors duration-200 @error('tarif') border-red-500 focus:ring-red-500 focus:border-red-500 @else border-gray-300 focus:ring-blue-500 focus:border-blue-500 @enderror"
                                    placeholder="Masukkan tarif, Mis: Rp. 70.000,-" required>
                            </div>
                            @error('tarif')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Satuan Field --}}
                        <div>
                            <label for="satuan" class="block text-sm font-medium text-gray-700 mb-2">
                                Satuan <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                                </div>
                                <select id="satuan" name="satuan"
                                    class="block w-full pl-10 pr-3 py-3 border rounded-lg leading-5 bg-white focus:outline-none focus:ring-2 transition-colors duration-200 @error('satuan') border-red-500 focus:ring-red-500 focus:border-red-500 @else border-gray-300 focus:ring-blue-500 focus:border-blue-500 @enderror"
                                    required>
                                    <option value="">Pilih Satuan</option>
                                    <option value="Per Buku"
                                        {{ old('satuan', $tarif->satuan) === 'Per Buku' ? 'selected' : '' }}>Per Buku
                                    </option>
                                    <option value="Per Atlas"
                                        {{ old('satuan', $tarif->satuan) === 'Per Atlas' ? 'selected' : '' }}>Per Atlas
                                    </option>
                                    <option value="Per Stasiun/Tahun"
                                        {{ old('satuan', $tarif->satuan) === 'Per Stasiun/Tahun' ? 'selected' : '' }}>
                                        Per Stasiun/Tahun</option>
                                    <option value="Per Lokasi"
                                        {{ old('satuan', $tarif->satuan) === 'Per Lokasi' ? 'selected' : '' }}>Per
                                        Lokasi</option>
                                </select>
                            </div>
                            @error('satuan')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Waktu Field --}}
                        <div>
                            <label for="waktu" class="block text-sm font-medium text-gray-700 mb-2">
                                Waktu <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <input type="text" id="waktu" name="waktu"
                                    value="{{ old('waktu', $tarif->waktu) }}"
                                    class="block w-full pl-10 pr-3 py-3 border rounded-lg leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-2 transition-colors duration-200 @error('waktu') border-red-500 focus:ring-red-500 focus:border-red-500 @else border-gray-300 focus:ring-blue-500 focus:border-blue-500 @enderror"
                                    placeholder="Masukkan waktu" required>
                            </div>
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
                        Simpan Perubahan
                    </x-main.buttons.submit-button>
                </div>
            </form>
        </div>
    </x-main.cards.content-card>
</x-layouts.admin>
