<!-- resources/views/components/before-login/layanan/detail-alat.blade.php -->
<div class="py-6 w-full max-w-3xl mx-auto">
    <div class="bg-white rounded-2xl shadow-2xl border border-gray-100 overflow-hidden">
        <div class="px-8 pt-8 pb-4 border-b bg-white">
            <h2 class="text-3xl font-bold mb-1 flex items-center gap-2">
                {{-- <svg class="w-7 h-7 text-sky-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/><circle cx="12" cy="9" r="2.5"/></svg> --}}
                <span>Ketersediaan Alat Observasi</span>
            </h2>
            <div class="text-2xl font-extrabold text-sky-700 mt-2 mb-1 tracking-tight">{{ $namaPos ?? '-' }}</div>
        </div>
        <div x-data="{ tab: 'meta' }">
            <nav class="flex border-b bg-gray-50">
                <button class="flex-1 py-3 text-center font-semibold text-gray-700 border-b-4 transition-all focus:outline-none duration-200"
                    :class="{ 'border-sky-500 text-sky-700 bg-white': tab === 'meta', 'border-transparent': tab !== 'meta' }"
                    @click="tab = 'meta'">Metadata Alat</button>
                <button class="flex-1 py-3 text-center font-semibold text-gray-700 border-b-4 transition-all focus:outline-none duration-200"
                    :class="{ 'border-sky-500 text-sky-700 bg-white': tab === 'grafik', 'border-transparent': tab !== 'grafik' }"
                    @click="tab = 'grafik'">Normal Curah Hujan</button>
            </nav>
            <div x-show="tab === 'meta'" class="p-8 bg-white">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-3">
                    <div class="font-semibold text-gray-600">Nama Pos</div><div>{{ $namaPos ?? '-' }}</div>
                    <div class="font-semibold text-gray-600">Jenis Alat</div><div>{{ $jenisAlat ?? '-' }}</div>
                    <div class="font-semibold text-gray-600">Kode Alat</div><div>{{ $kodeAlat ?? '-' }}</div>
                    <div class="font-semibold text-gray-600">ID Pos</div><div>{{ $idPos ?? '-' }}</div>
                    <div class="font-semibold text-gray-600">Latitude</div><div>{{ $lat ?? '-' }}</div>
                    <div class="font-semibold text-gray-600">Longitude</div><div>{{ $lng ?? '-' }}</div>
                    <div class="font-semibold text-gray-600">Elevasi (dpl)</div><div>{{ $elevasi ?? '-' }}</div>
                    <div class="font-semibold text-gray-600">Desa/Kelurahan</div><div>{{ $desa ?? '-' }}</div>
                    <div class="font-semibold text-gray-600">Kecamatan</div><div>{{ $kecamatan ?? '-' }}</div>
                    <div class="font-semibold text-gray-600">Kabupaten/Kota</div><div>{{ $kabupaten ?? '-' }}</div>
                    <div class="font-semibold text-gray-600">Provinsi</div><div>{{ $provinsi ?? '-' }}</div>
                    <div class="font-semibold text-gray-600">Kondisi Alat</div><div>{{ $kondisi ?? '-' }}</div>
                    <div class="font-semibold text-gray-600">Kepemilikan Alat</div><div>{{ $kepemilikan ?? '-' }}</div>
                    <div class="font-semibold text-gray-600">Nama Pengamat</div><div>{{ $pengamat ?? '-' }}</div>
                    <div class="font-semibold text-gray-600">Jabatan</div><div>{{ $jabatan ?? '-' }}</div>
                    <div class="font-semibold text-gray-600">Status Pengiriman Data</div><div>{{ $statusData ?? '-' }}</div>
                    <div class="font-semibold text-gray-600">Ketersediaan Data</div><div>{{ $ketersediaan ?? '-' }}</div>
                    <div class="font-semibold text-gray-600">Keterangan Alat</div><div>{{ $keterangan ?? '-' }}</div>
                </div>
                <div class="text-center mt-8">
                    <strong class="block mb-2 text-gray-700">Gambar Alat</strong>
                    <img src="{{ $gambarAlat ?? asset('images/no-image.png') }}" class="mx-auto rounded-xl border shadow-lg mt-2 transition-transform duration-200 hover:scale-105 bg-white" width="160" height="160">
                </div>
            </div>
            <div x-show="tab === 'grafik'" class="p-8 bg-white">
                <canvas id="grafikCurahHujan"></canvas>
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script>
                    document.addEventListener('alpine:init', () => {
                        if (window.grafikCurahHujanChart) window.grafikCurahHujanChart.destroy();
                        var ctx = document.getElementById('grafikCurahHujan').getContext('2d');
                        window.grafikCurahHujanChart = new Chart(ctx, {
                            type: 'line',
                            data: {!! json_encode($dataGrafik ?? []) !!},
                            options: {!! json_encode($opsiGrafik ?? (object)[]) !!}
                        });
                    });
                </script>
                <div class="mt-6">
                    <h4 class="font-semibold mb-2 text-gray-700">Keterangan</h4>
                    <div class="text-sm text-gray-600">
                        {!! $keteranganGrafik ?? '' !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="px-8 py-4 border-t bg-white text-left">
            <button onclick="window.location.href='/layanan'" class="inline-flex items-center gap-2 text-sky-500 hover:text-sky-600 transition-colors">
                <i class="fas fa-arrow-left"></i>
                <span class="font-medium font-montserrat">Kembali</span>
            </button>
        </div>
    </div>
</div>
<!-- Alpine.js for tab -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
