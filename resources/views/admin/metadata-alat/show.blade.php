<x-layouts.admin title="Detail Metadata Alat">
    <x-main.layouts.breadcrumb :items="[
        ['title' => 'Data Master', 'url' => '#'],
        ['title' => 'Metadata Alat', 'url' => route('metadata-alat.index')],
        ['title' => 'Detail']
    ]" />

    <x-main.cards.content-card>
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Detail Metadata Alat</h3>
                    <p class="text-sm text-gray-600">Informasi lengkap tentang alat monitoring ini</p>
                </div>
                <div class="flex items-center space-x-2">
                    <x-main.buttons.action-button href="{{ route('metadata-alat.edit', $alat->nomor_pos) }}" variant="warning">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Edit
                    </x-main.buttons.action-button>
                    <x-main.buttons.action-button href="{{ route('metadata-alat.index') }}" variant="light">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Kembali
                    </x-main.buttons.action-button>
                </div>
            </div>
        </div>

        <div class="p-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Informasi Umum -->
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-6">
                    <h4 class="text-lg font-medium text-blue-900 mb-4">Informasi Alat</h4>
                    <div class="space-y-2 text-sm text-gray-800">
                        <p><strong>Nomor POS:</strong> {{ $alat->nomor_pos ?? '-' }}</p>
                        <p><strong>Nama POS:</strong> {{ $alat->nama_pos ?? '-' }}</p>
                        <p><strong>Jenis Alat:</strong> {{ $alat->jenis_alat ?? '-' }}</p>
                        <p><strong>Kode POS:</strong> {{ $alat->kode_pos ?? '-' }}</p>
                        <p><strong>Merk / Tipe:</strong> {{ $alat->merk_tipe ?? '-' }}</p>
                        <p><strong>Kondisi Alat:</strong> {{ $alat->kondisi_alat ?? '-' }}</p>
                        <p><strong>Kepemilikan Alat:</strong> {{ $alat->kepemilikan_alat ?? '-' }}</p>
                        <p><strong>Pengiriman Data:</strong> {{ $alat->pengiriman_data ?? '-' }}</p>
                        <p><strong>Ketersediaan Data:</strong> {{ $alat->ketersediaan_data ?? '-' }}</p>
                        <p><strong>Keterangan Alat:</strong> {{ $alat->keterangan_alat ?? '-' }}</p>
                    </div>
                </div>

                <!-- Lokasi & Penanggung Jawab -->
                <div class="bg-amber-50 border border-amber-200 rounded-lg p-6">
                    <h4 class="text-lg font-medium text-amber-900 mb-4">Lokasi & Penanggung Jawab</h4>
                    <div class="space-y-2 text-sm text-gray-800">
                        <p><strong>Lintang:</strong> {{ $alat->lintang ?? '-' }}</p>
                        <p><strong>Bujur:</strong> {{ $alat->bujur ?? '-' }}</p>
                        <p><strong>Elevasi (dpl):</strong> {{ $alat->elevasi ?? '-' }}</p>
                        <p><strong>Desa:</strong> {{ $alat->desa ?? '-' }}</p>
                        <p><strong>Kecamatan:</strong> {{ $alat->kecamatan->nama_kecamatan ?? '-' }}</p>
                        <p><strong>Kabupaten:</strong> {{ $alat->kabupaten->nama_kabupaten ?? '-' }}</p>
                        <p><strong>Provinsi:</strong> {{ $alat->provinsi->nama_provinsi ?? '-' }}</p>
                        <hr class="my-2">
                        <p><strong>Nama Penanggung Jawab:</strong> {{ $alat->nama_penanggungjawab ?? '-' }}</p>
                        <p><strong>Jabatan:</strong> {{ $alat->jabatan ?? '-' }}</p>
                    </div>
                </div>
            </div>

            @if($alat->foto)
                <div class="mt-6">
                    <h4 class="text-lg font-medium text-gray-900 mb-2">Foto Alat</h4>
                    <img src="{{ asset($alat->foto) }}" alt="Foto Alat" class="max-w-xs border border-gray-300 rounded-lg shadow">
                </div>
            @endif
        </div>
    </x-main.cards.content-card>
</x-layouts.admin>
