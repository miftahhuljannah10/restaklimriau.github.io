<x-layouts.admin title="Detail Curah Hujan" subtitle="Lihat detail data curah hujan per pos">
    <x-main.layouts.breadcrumb :items="[
        ['title' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['title' => 'Alat Curah Hujan', 'url' => route('admin.alat-curah-hujan.index')],
        ['title' => 'Detail'],
    ]" />


    <x-main.cards.content-card class="!p-0">
        <!-- Header Section -->
        <div
            class="flex flex-col md:flex-row md:items-center md:justify-between px-6 py-4 border-b bg-gradient-to-r from-blue-500 to-blue-400 rounded-t-lg">
            <div>
                <h2 class="text-xl font-bold text-white flex items-center">
                    <svg class="w-6 h-6 mr-2 text-white opacity-80" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 15a4 4 0 004 4h10a4 4 0 004-4V7a4 4 0 00-4-4H7a4 4 0 00-4 4v8z" />
                    </svg>
                    Detail Curah Hujan: <span class="ml-2">{{ $alatCurahHujan->nomor_pos }}</span>
                </h2>
                <div class="text-sm text-blue-100 mt-1">Nama Pos: <span
                        class="font-semibold text-white">{{ $alatCurahHujan->alat->nama_pos ?? '-' }}</span></div>
            </div>
            <div class="flex space-x-2 mt-4 md:mt-0">
                <x-main.buttons.action-button href="{{ route('admin.alat-curah-hujan.index') }}" variant="secondary"
                    size="sm">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali
                </x-main.buttons.action-button>
                <x-main.buttons.action-button
                    href="{{ route('admin.alat-curah-hujan.edit', $alatCurahHujan->nomor_pos) }}" variant="warning"
                    size="sm">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    Edit
                </x-main.buttons.action-button>
            </div>
        </div>

        <!-- Monthly Data Section -->
        <div class="px-6 py-8 bg-gray-50">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                @foreach (['januari', 'februari', 'maret', 'april', 'mei', 'juni', 'juli', 'agustus', 'september', 'oktober', 'november', 'desember'] as $bulan)
                    <div
                        class="bg-white border border-blue-100 rounded-xl shadow p-5 flex flex-col items-center hover:scale-105 transition-transform duration-200">
                        <div class="text-xs text-blue-500 font-semibold mb-1 tracking-wide uppercase">
                            {{ ucfirst($bulan) }}</div>
                        <div class="text-3xl font-extrabold text-blue-700 drop-shadow">
                            {{ $alatCurahHujan->$bulan ?? '-' }}</div>
                        <div class="text-xs text-gray-400">mm</div>
                    </div>
                @endforeach
            </div>
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div
                    class="flex-1 bg-gradient-to-br from-green-50 to-green-200 border border-green-100 rounded-xl shadow p-8 flex flex-col items-center justify-center mb-4 md:mb-0">
                    <div
                        class="text-xs text-green-900 font-semibold mb-1 tracking-wide uppercase flex items-center gap-1">
                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 20l9-5-9-5-9 5 9 5z" />
                        </svg>
                        Rata-rata Tahunan
                    </div>
                    <div class="text-4xl font-extrabold text-green-700 drop-shadow flex items-end">
                        {{ is_numeric($alatCurahHujan->rata_rata ?? null) ? number_format($alatCurahHujan->rata_rata, 1, ',', '.') : '-' }}
                        <span class="text-base font-bold text-green-500 ml-2 mb-1">mm</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chart Section -->
        <div class="px-6 py-8 bg-white rounded-b-lg shadow-md">
            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                <svg class="w-5 h-5 mr-2 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 15a4 4 0 004 4h10a4 4 0 004-4V7a4 4 0 00-4-4H7a4 4 0 00-4 4v8z" />
                </svg>
                Grafik Curah Hujan Bulanan
            </h3>
            <canvas id="grafikCurahHujan" class="w-full h-64"></canvas>
        </div>
    </x-main.cards.content-card>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('grafikCurahHujan').getContext('2d');
            const dataBulan = [
                @foreach (['januari', 'februari', 'maret', 'april', 'mei', 'juni', 'juli', 'agustus', 'september', 'oktober', 'november', 'desember'] as $bulan)
                    {{ $alatCurahHujan->$bulan ?? 'null' }},
                @endforeach
            ];
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                    datasets: [{
                        label: 'Curah Hujan (mm)',
                        data: dataBulan,
                        backgroundColor: 'rgba(59, 130, 246, 0.7)',
                        borderColor: 'rgba(37, 99, 235, 1)',
                        borderWidth: 2,
                        borderRadius: 6,
                        maxBarThickness: 32,
                    }]
                },
                options: {
                    scales: {
                        y: {
                            min: 0,
                            // max: 600,
                            ticks: {
                                stepSize: 50
                            },
                            title: {
                                display: true,
                                text: 'Curah Hujan (mm)'
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Bulan'
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });
        </script>
    @endpush
</x-layouts.admin>
