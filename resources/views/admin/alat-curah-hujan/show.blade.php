
@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Detail Curah Hujan: {{ $alatCurahHujan->nomor_pos }}</h1>
    <div class="bg-white rounded-lg shadow overflow-hidden p-6">
        <div class="mb-4">
            <strong>Nama Pos:</strong> {{ $alatCurahHujan->alat->nama_pos ?? '-' }}
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach(['januari','februari','maret','april','mei','juni','juli','agustus','september','oktober','november','desember'] as $bulan)
            <div>
                <span class="font-semibold">{{ ucfirst($bulan) }}:</span>
                <span>{{ $alatCurahHujan->$bulan ?? '-' }}</span>
            </div>
            @endforeach
        </div>
        <div class="mt-4">
            <strong>Rata-rata:</strong> {{ $alatCurahHujan->rata_rata ?? '-' }}
        </div>
        <div class="mt-8">
            <h2 class="text-lg font-semibold mb-2">Grafik Curah Hujan</h2>
            <canvas id="grafikCurahHujan" height="120"></canvas>
        </div>
        <div class="mt-6">
            <a href="{{ route('admin.alat-curah-hujan.edit', $alatCurahHujan->nomor_pos) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded">Edit</a>
            <a href="{{ route('admin.alat-curah-hujan.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded ml-2">Kembali</a>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('grafikCurahHujan').getContext('2d');
    const dataBulan = [
        @foreach(['januari','februari','maret','april','mei','juni','juli','agustus','september','oktober','november','desember'] as $bulan)
            {{ $alatCurahHujan->$bulan ?? 'null' }},
        @endforeach
    ];
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'],
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
                    min: 100,
                    max: 600,
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
                legend: { display: false }
            }
        }
    });
</script>
@endpush
