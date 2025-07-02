{{--
Contoh pemanggilan dinamis dari view utama:
@include('components.before-login.layanan.detail-alat', [
    'title' => 'Ketersediaan Alat Observasi',
    'metadata' => [
        ['label' => 'Nama Pos', 'value' => 'Stasiun Klimatologi Kampar'],
        ['label' => 'Jenis Alat', 'value' => 'Ombrometer'],
        // ...field lain
    ],
    'gambarAlat' => asset('images/no-image.png'),
    'tabLabels' => ['meta' => 'Metadata Alat', 'grafik' => 'Normal Curah Hujan'],
    'dataGrafik' => [],
    'opsiGrafik' => [],
    'keteranganGrafik' => '',
])
--}}
<!-- resources/views/components/before-login/layanan/detail-alat.blade.php dinamis -->
<div class="py-6 w-full max-w-3xl mx-auto font-montserrat">
    <div class="bg-white rounded-2xl shadow-2xl border border-gray-100 overflow-hidden">
        <div class="px-8 pt-8 pb-4 border-b bg-white">
            <h2 class="text-3xl font-bold mb-1 flex items-center gap-2 font-montserrat">
                <span>{{ $title ?? 'Ketersediaan Alat Observasi' }}</span>
            </h2>
            @php
                $namaPos = collect($metadata ?? [])->firstWhere('label', 'Nama Pos')['value'] ?? null;
            @endphp
            @if($namaPos)
            <div class="mt-1 text-2xl font-semibold text-sky-700 font-montserrat">{{ $namaPos }}</div>
            @endif
        </div>
        <div x-data="{ tab: 'meta' }">
            <nav class="flex border-b bg-gray-50 font-montserrat">
                <button class="flex-1 py-3 text-center font-semibold text-gray-700 border-b-4 transition-all focus:outline-none duration-200 font-montserrat"
                    :class="{ 'border-sky-500 text-sky-700 bg-white': tab === 'meta', 'border-transparent': tab !== 'meta' }"
                    @click="tab = 'meta'">{{ $tabLabels['meta'] ?? 'Metadata Alat' }}</button>
                <button class="flex-1 py-3 text-center font-semibold text-gray-700 border-b-4 transition-all focus:outline-none duration-200 font-montserrat"
                    :class="{ 'border-sky-500 text-sky-700 bg-white': tab === 'grafik', 'border-transparent': tab !== 'grafik' }"
                    @click="tab = 'grafik'">{{ $tabLabels['grafik'] ?? 'Normal Curah Hujan' }}</button>
            </nav>
            <div x-show="tab === 'meta'" class="p-8 bg-white font-montserrat">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-3">
                    @foreach(($metadata ?? []) as $meta)
                        @if($meta['label'] !== 'Nama Pos')
                        <div class="font-semibold text-gray-600 font-montserrat">{{ $meta['label'] }}</div><div class="font-montserrat">{{ $meta['value'] }}</div>
                        @endif
                    @endforeach
                </div>
                <div class="text-center mt-8">
                    <strong class="block mb-2 text-gray-700 font-montserrat">Gambar Alat</strong>
                    <img src="{{ $gambarAlat ?? asset('images/no-image.png') }}" class="mx-auto rounded-xl border shadow-lg mt-2 transition-transform duration-200 hover:scale-105 bg-white" width="220" height="220">
                </div>
            </div>
            <div x-show="tab === 'grafik'" class="p-8 bg-white font-montserrat">
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
                    <h4 class="font-semibold mb-2 text-gray-700 font-montserrat">Keterangan</h4>
                    <div class="text-sm text-gray-600 font-montserrat">
                        {!! $keteranganGrafik ?? '' !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="px-8 py-4 border-t bg-white text-left">
            <button onclick="window.location.href='/layanan'" class="inline-flex items-center gap-2 text-sky-500 hover:text-sky-600 transition-colors font-montserrat">
                <i class="fas fa-arrow-left"></i>
                <span class="font-medium font-montserrat">Kembali</span>
            </button>
        </div>
    </div>
</div>
<!-- Alpine.js for tab -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
