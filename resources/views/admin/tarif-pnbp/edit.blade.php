@extends('layouts.app')
@section('content')
    <div class="max-w-5xl mx-auto py-6 px-4">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-6 text-gray-700">Edit Tarif PNBP</h2>
            <form action="{{ route('tarif-pnbp.update', $tarif->id) }}" method="POST" enctype="multipart/form-data"
                class="space-y-4">
                @csrf
                @method('PUT')

                <!-- Nama Tarif -->
                <div>
                    <label for="nama_tarif" class="block text-sm font-medium text-gray-700">Nama Tarif <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="nama_tarif" id="nama_tarif" required
                        class="w-full border border-gray-300 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500"
                        value="{{ old('nama_tarif', $tarif->nama_tarif) }}">
                    @error('nama_tarif')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Satuan -->
                <div>
                    <label for="satuan" class="block text-sm font-medium text-gray-700">Satuan <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="satuan" id="satuan" required
                        class="w-full border border-gray-300 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500"
                        value="{{ old('satuan', $tarif->satuan) }}">
                    @error('satuan')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Jenis Tarif, tarif, and waktu -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label for="jenis_tarif" class="block text-sm font-medium text-gray-700">Jenis Tarif <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="jenis_tarif" id="jenis_tarif" required
                            class="w-full border border-gray-300 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500"
                            value="{{ old('jenis_tarif', $tarif->jenis_tarif) }}">
                        @error('jenis_tarif')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="tarif" class="block text-sm font-medium text-gray-700">Tarif <span
                                class="text-red-500">*</span></label>
                        <input type="number" name="tarif" id="tarif" required
                            class="w-full border border-gray-300 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500"
                            value="{{ old('tarif', $tarif->tarif) }}">
                        @error('tarif')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="waktu" class="block text-sm font-medium text-gray-700">Waktu <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="waktu" id="waktu" required
                            class="w-full border border-gray-300 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500"
                            value="{{ old('waktu', $tarif->waktu) }}">
                        @error('waktu')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex justify-end mt-6">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md font-semibold">Simpan
                        Perubahan</button>
                    <a href="{{ route('tarif-pnbp.index') }}"
                        class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md font-semibold ml-4">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection
