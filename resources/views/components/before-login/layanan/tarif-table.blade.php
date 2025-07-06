{{--
Contoh pemanggilan dinamis dari view utama:
@include('components.before-login.layanan.tarif-table', [
    'title' => 'Tarif Pelayanan dan Jasa MKKuG dan Standar Pelayanan Minimum',
    'desc' => 'Daftar tarif sesuai PP Nomor 47 Tahun 2018',
    'table' => [
        [ 'no' => 1, 'name' => 'Analisis dan Prakiraan Hujan Bulanan', 'unit' => 'per buku', 'tarif' => 'Rp 65.000', 'waktu' => '3 Hari' ],
        // ...data lain
    ],
    'info' => [
        'title' => 'Informasi Penting',
        'items' => [
            'Tarif berlaku sesuai PP Nomor 47 Tahun 2018',
            'Waktu pelayanan dihitung dalam hari kerja',
            'Untuk informasi lebih lanjut, silakan hubungi kontak yang tersedia',
        ]
    ]
])
--}}
<!-- Main Content Dinamis Modern Glassmorphism Tanpa Efek Baris Pertama -->
<main class="w-full py-8 md:py-12 lg:py-8 bg-white/70 backdrop-blur-md">
    <div class="max-w-[1440px] mx-auto px-4 lg:px-8">
        <!-- Back Button -->
        <div class="mb-6">
            <button onclick="history.back()" class="inline-flex items-center gap-2 text-sky-500 hover:text-sky-600 transition-colors">
                <i class="fas fa-arrow-left"></i>
                <span class="font-medium">Kembali</span>
            </button>
        </div>
        <!-- Page Title -->
        <div class="text-center mb-8 md:mb-12">
            <h1 class="gradient-text text-2xl md:text-3xl font-bold font-montserrat mb-4">
                {{ $title ?? 'Tarif Pelayanan dan Jasa MKKuG dan Standar Pelayanan Minimum' }}
            </h1>
            <p class="text-gray-600 text-base md:text-lg">
                {{ $desc ?? 'Daftar tarif sesuai PP Nomor 47 Tahun 2018' }}
            </p>
        </div>
        <!-- Table Container Dinamis Modern Glass -->
        <div class="w-full overflow-x-auto rounded-2xl shadow-xl border border-gray-100 bg-white/60 backdrop-blur-md">
            <table class="w-full min-w-[800px] text-sm md:text-base">
                <!-- Table Header -->
                <thead class="sticky top-0 z-10">
                    <tr class="bg-sky-500 text-white">
                        <th class="px-4 py-3 text-left font-semibold font-montserrat rounded-tl-2xl">No</th>
                        <th class="px-4 py-3 text-left font-semibold font-montserrat">Nama Tarif</th>
                        <th class="px-4 py-3 text-left font-semibold font-montserrat"><i class="fas fa-box mr-1"></i>Satuan</th>
                        <th class="px-4 py-3 text-left font-semibold font-montserrat"><i class="fas fa-money-bill-wave mr-1"></i>Tarif</th>
                        <th class="px-4 py-3 text-left font-semibold font-montserrat rounded-tr-2xl"><i class="fas fa-clock mr-1"></i>Waktu</th>
                    </tr>
                </thead>
                <!-- Table Body Dinamis Modern -->
                <tbody>
                    @foreach(($table ?? []) as $i => $row)
                    <tr class="{{ $i % 2 == 1 ? 'bg-gray-50/70' : 'bg-white/70' }}">
                        <td class="px-4 py-3 text-gray-800 font-montserrat">{{ $row['no'] ?? '' }}</td>
                        <td class="px-4 py-3 text-gray-800 font-montserrat">{{ $row['name'] ?? '' }}</td>
                        <td class="px-4 py-3 text-gray-800 font-montserrat">{{ $row['unit'] ?? '' }}</td>
                        <td class="px-4 py-3 text-gray-800 font-montserrat">{{ $row['tarif'] ?? '' }}</td>
                        <td class="px-4 py-3 text-gray-800 font-montserrat">{{ $row['waktu'] ?? '' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- Responsive Card List (Mobile) -->
        <div class="block md:hidden mt-6 space-y-4">
            @foreach(($table ?? []) as $row)
            <div class="rounded-2xl shadow-lg border border-gray-100 bg-white/80 backdrop-blur-md p-4">
                <div class="flex items-center gap-2 mb-2">
                    <span class="text-sky-500 font-bold text-lg">{{ $row['no'] ?? '' }}</span>
                    <span class="font-semibold text-gray-800">{{ $row['name'] ?? '' }}</span>
                </div>
                <div class="text-gray-600 text-sm mb-1">Satuan: {{ $row['unit'] ?? '' }}</div>
                <div class="text-gray-600 text-sm mb-1">Tarif: {{ $row['tarif'] ?? '' }}</div>
                <div class="text-gray-600 text-sm">Waktu: {{ $row['waktu'] ?? '' }}</div>
            </div>
            @endforeach
        </div>
        <!-- Additional Information Dinamis -->
        @if(!empty($info))
        <div class="mt-8 bg-blue-50/80 border border-blue-200 rounded-lg p-6 shadow">
            <div class="flex items-start gap-3">
                <div class="w-6 h-6 bg-blue-500 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                    <i class="fas fa-info text-white text-sm"></i>
                </div>
                <div>
                    <h3 class="text-blue-800 font-semibold font-montserrat mb-2">{{ $info['title'] ?? '' }}</h3>
                    <ul class="text-blue-700 text-sm space-y-1">
                        @foreach(($info['items'] ?? []) as $item)
                        <li>• {{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endif
    </div>
</main>
