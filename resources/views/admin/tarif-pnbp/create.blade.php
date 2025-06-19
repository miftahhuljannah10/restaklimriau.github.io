@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto py-8 px-4">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <!-- Section Header -->
            <div class="mb-6">
                <h1 class="text-xl font-bold text-gray-800 mb-2">1. Untuk membuat tarif PNBP baru</h1>
                <p class="text-gray-600">Silakan lengkapi form berikut dengan data tarif yang valid. Kami akan menjaga
                    kerahasiaan data ini.</p>
            </div>

            <form action="{{ route('tarif-pnbp.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Informasi Dasar Tarif -->
                <div class="border-b pb-6">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">2. Informasi Dasar Tarif</h2>

                    <div class="grid grid-cols-1 gap-4">
                        <!-- Nama Tarif -->
                        <div>
                            <label class="block text-gray-700 text-sm font-medium mb-1">
                                Nama Tarif <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="nama_tarif" required
                                class="w-full border border-gray-300 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Masukkan nama tarif" value="{{ old('nama_tarif') }}">
                            @error('nama_tarif')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Satuan -->
                        <div>
                            <label class="block text-gray-700 text-sm font-medium mb-1">
                                Satuan <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="satuan" required
                                class="w-full border border-gray-300 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Contoh: per dokumen, per jam, dll" value="{{ old('satuan') }}">
                            @error('satuan')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Detail Tarif -->
                <div class="border-b pb-6">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">3. Detail Tarif</h2>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <!-- Jenis Tarif -->
                        <div>
                            <label class="block text-gray-700 text-sm font-medium mb-1">
                                Jenis Tarif <span class="text-red-500">*</span>
                            </label>
                            <select name="jenis_tarif" required
                                class="w-full border border-gray-300 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="">Pilih Jenis Tarif</option>
                                <option value="Tetap" {{ old('jenis_tarif') == 'Informasi Meteorologi Klimatologi dan Geofisika' ? 'selected' : '' }}>Informasi Meteorologi Klimatologi dan Geofisika</option>
                                <option value="Variabel" {{ old('jenis_tarif') == 'Informasi Khusus Meteorologi Klimatologi dan Geofisika Sesuai Permintaan' ? 'selected' : '' }}>Informasi Khusus Meteorologi Klimatologi dan Geofisika Sesuai Permintaan
                                </option>
                                {{-- <option value="Progresif" {{ old('jenis_tarif') == 'Progresif' ? 'selected' : '' }}>
                                    Progresif</option> --}}
                            </select>
                            @error('jenis_tarif')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Nilai Tarif -->
                        <div>
                            <label class="block text-gray-700 text-sm font-medium mb-1">
                                Tarif (Rp) <span class="text-red-500">*</span>
                            </label>
                            <input type="number" name="tarif" required
                                class="w-full border border-gray-300 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Masukkan nominal tarif" value="{{ old('tarif') }}">
                            @error('tarif')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Waktu Berlaku -->
                        <div>
                            <label class="block text-gray-700 text-sm font-medium mb-1">
                                Waktu Berlaku <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="waktu" required
                                class="w-full border border-gray-300 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Contoh: 1 tahun, per hari, dll" value="{{ old('waktu') }}">
                            @error('waktu')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Catatan -->
                <div class="mb-6 text-sm text-gray-600 italic">
                    Pastikan <strong>data tarif</strong> yang dimasukkan sudah sesuai dengan ketentuan yang berlaku, karena
                    akan mempengaruhi perhitungan PNBP.
                </div>

                <!-- Tombol Aksi -->
                <div class="flex justify-between">
                    <a href="{{ route('tarif-pnbp.index') }}"
                        class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400 transition duration-200">
                        Kembali
                    </a>
                    <button type="submit"
                        class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition duration-200">
                        Simpan Tarif
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
