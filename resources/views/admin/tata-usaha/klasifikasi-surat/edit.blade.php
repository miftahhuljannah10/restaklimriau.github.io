@extends('layouts.app')

@section('title', 'Edit Klasifikasi Surat')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        Edit Klasifikasi Surat
                    </h2>
                    <a href="{{ route('admin.tata-usaha.klasifikasi-surat.show', $klasifikasiSurat) }}"
                       class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Kembali
                    </a>
                </div>

                <!-- Alert Info -->
                @if($klasifikasiSurat->suratKeluar->count() > 0)
                <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4 mb-6" role="alert">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="font-bold">Informasi Penting</p>
                            <p class="text-sm">Klasifikasi ini sedang digunakan oleh {{ $klasifikasiSurat->suratKeluar->count() }} surat keluar. Perubahan akan mempengaruhi semua surat yang menggunakan klasifikasi ini.</p>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Errors -->
                @if ($errors->any())
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
                        <p class="font-bold">Terjadi kesalahan:</p>
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Form -->
                <form action="{{ route('admin.tata-usaha.klasifikasi-surat.update', $klasifikasiSurat) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Kode -->
                        <div>
                            <label for="kode" class="block text-sm font-medium text-gray-700">Kode Klasifikasi <span class="text-red-500">*</span></label>
                            <input type="text" name="kode" id="kode" value="{{ old('kode', $klasifikasiSurat->kode) }}"
                                class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                placeholder="Contoh: ME, KP">
                            <p class="mt-1 text-xs text-gray-500">Kode singkat untuk klasifikasi surat (Maks. 10 karakter)</p>
                            @if($klasifikasiSurat->suratKeluar->count() > 0)
                            <p class="mt-1 text-xs text-yellow-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z" />
                                </svg>
                                Perubahan kode akan mempengaruhi {{ $klasifikasiSurat->suratKeluar->count() }} surat
                            </p>
                            @endif
                        </div>

                        <!-- Nama -->
                        <div>
                            <label for="nama" class="block text-sm font-medium text-gray-700">Nama Klasifikasi <span class="text-red-500">*</span></label>
                            <input type="text" name="nama" id="nama" value="{{ old('nama', $klasifikasiSurat->nama) }}"
                                class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                placeholder="Contoh: Meteorologi, Kepegawaian">
                        </div>
                    </div>

                    <!-- Preview Perubahan -->
                    <div class="border border-gray-200 rounded-lg p-4 bg-gray-50">
                        <h3 class="text-sm font-medium text-gray-700 mb-3">Preview Perubahan</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <p class="text-xs text-gray-500 mb-1">Sebelum:</p>
                                <div class="flex items-center space-x-2">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                        {{ $klasifikasiSurat->kode }}
                                    </span>
                                    <span class="text-sm text-gray-700">{{ $klasifikasiSurat->nama }}</span>
                                </div>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500 mb-1">Sesudah:</p>
                                <div class="flex items-center space-x-2">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800" id="preview-kode">
                                        {{ old('kode', $klasifikasiSurat->kode) }}
                                    </span>
                                    <span class="text-sm text-gray-700" id="preview-nama">{{ old('nama', $klasifikasiSurat->nama) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Informasi Penggunaan -->
                    <div class="bg-blue-50 rounded-lg p-4">
                        <h3 class="text-sm font-medium text-blue-900 mb-2">Informasi Penggunaan</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">
                            <div>
                                <p class="text-blue-700 font-medium">Total Surat Keluar</p>
                                <p class="text-2xl font-bold text-blue-900">{{ $klasifikasiSurat->suratKeluar->count() }}</p>
                            </div>
                            <div>
                                <p class="text-blue-700 font-medium">Dibuat</p>
                                <p class="text-blue-900">{{ $klasifikasiSurat->created_at->format('d M Y') }}</p>
                            </div>
                            <div>
                                <p class="text-blue-700 font-medium">Terakhir Update</p>
                                <p class="text-blue-900">{{ $klasifikasiSurat->updated_at->format('d M Y') }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                        <div class="text-sm text-gray-500">
                            <span class="inline-flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                ID: {{ $klasifikasiSurat->id }}
                            </span>
                        </div>

                        <div class="flex space-x-3">
                            <a href="{{ route('admin.tata-usaha.klasifikasi-surat.show', $klasifikasiSurat) }}"
                               class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400 active:bg-gray-500 focus:outline-none focus:border-gray-500 focus:ring focus:ring-gray-200 disabled:opacity-25 transition">
                                Batal
                            </a>
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                                </svg>
                                Update Klasifikasi
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const kodeInput = document.getElementById('kode');
    const namaInput = document.getElementById('nama');
    const previewKode = document.getElementById('preview-kode');
    const previewNama = document.getElementById('preview-nama');

    // Update preview saat input berubah
    kodeInput.addEventListener('input', function() {
        previewKode.textContent = this.value || '{{ $klasifikasiSurat->kode }}';
    });

    namaInput.addEventListener('input', function() {
        previewNama.textContent = this.value || '{{ $klasifikasiSurat->nama }}';
    });

    // Form validation
    const form = document.querySelector('form');
    form.addEventListener('submit', function(e) {
        const kode = kodeInput.value.trim();
        const nama = namaInput.value.trim();

        if (!kode || !nama) {
            e.preventDefault();
            alert('Kode dan Nama klasifikasi harus diisi!');
            return;
        }

        if (kode.length > 10) {
            e.preventDefault();
            alert('Kode klasifikasi maksimal 10 karakter!');
            kodeInput.focus();
            return;
        }

        @if($klasifikasiSurat->suratKeluar->count() > 0)
        if (!confirm('Perubahan ini akan mempengaruhi {{ $klasifikasiSurat->suratKeluar->count() }} surat keluar. Apakah Anda yakin ingin melanjutkan?')) {
            e.preventDefault();
            return;
        }
        @endif
    });

    // Auto uppercase untuk kode
    kodeInput.addEventListener('input', function() {
        this.value = this.value.toUpperCase();
    });
});
</script>
@endsection
