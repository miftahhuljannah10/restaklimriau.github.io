@extends('layouts.app')

@section('content')
    <div class="max-w-5xl mx-auto py-6 px-4" x-data="alatForm()">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-6 text-gray-700">Tambah Metadata Alat</h2>
            <form action="{{ route('metadata-alat.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf

                {{-- Nomor dan Nama POS --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="nomor_pos" class="block text-sm font-medium text-gray-700">Nomor POS <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="nomor_pos" id="nomor_pos" required
                            class="w-full border border-gray-300 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500"
                            value="{{ old('nomor_pos') }}" placeholder="Masukkan nomor POS">
                        @error('nomor_pos')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="nama_pos" class="block text-sm font-medium text-gray-700">Nama POS <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="nama_pos" id="nama_pos" required
                            class="w-full border border-gray-300 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500"
                            value="{{ old('nama_pos') }}" placeholder="Masukkan nama POS">
                        @error('nama_pos')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Jenis dan Kode POS --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="jenis_alat" class="block text-sm font-medium text-gray-700">Jenis Alat <span
                                class="text-red-500">*</span></label>
                        <select name="jenis_alat" id="jenis_alat" required
                            class="w-full border border-gray-300 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Pilih Jenis Alat</option>
                            <option value="1-PHK" {{ old('jenis_alat') == '1 - PHK' ? 'selected' : '' }}> 1 - PHK ()
                                Station)</option>
                            <option value="2-ARG" {{ old('jenis_alat') == '2 - ARG' ? 'selected' : '' }}>2 - ARG (Automatic
                                Rain
                                Gauge)</option>
                            <option value="3-AWS" {{ old('jenis_alat') == '3 - AWS' ? 'selected' : '' }}>
                                3 - AWS (Automatic Weather Station)</option>
                            <option value="4-AAWS" {{ old('jenis_alat') == '4 - AAWS' ? 'selected' : '' }}>4 - AAWS
                                (Automatic Aeronimic Weather Station)</option>

                            <option value="5-ASRS" {{ old('jenis_alat') == '5 - ASRS' ? 'selected' : '' }}>5 - ASRS (
                                Automatic Surface Weather Station)</option>
                            <option value="6-IKRO" {{ old('jenis_alat') == '6 - IKRO' ? 'selected' : '' }}>6 - IKRO ()
                            </option>
                        </select>
                        @error('jenis_alat')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="kode_pos" class="block text-sm font-medium text-gray-700">Kode POS</label>
                        {{-- <input type="text" name="kode_pos" id="kode_pos"
                            class="w-full border border-gray-300 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500"
                            value="{{ old('kode_pos') }}" placeholder="Masukkan kode POS"> --}}
                        <select name="kode_pos" id="kode_pos" required
                            class="w-full border border-gray-300 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Pilih Kode POS</option>
                            <option value="1" {{ old('kode_pos') == '1' ? 'selected' : '' }}> 1 - PHK ()
                                Station)</option>
                            <option value="2" {{ old('kode_pos') == '2' ? 'selected' : '' }}>2 - ARG
                                (Automatic
                                Rain
                                Gauge)</option>
                            <option value="3" {{ old('kode_pos') == '3' ? 'selected' : '' }}>
                                3 - AWS (Automatic Weather Station)</option>
                            <option value="4" {{ old('kode_pos') == '4' ? 'selected' : '' }}>4 - AAWS
                                (Automatic Aeronimic Weather Station)</option>

                            <option value="5" {{ old('kode_pos') == '5' ? 'selected' : '' }}>5 - ASRS (
                                Automatic Surface Weather Station)</option>
                            <option value="6" {{ old('kode_pos') == '6' ? 'selected' : '' }}>6 - IKRO ()
                            </option>
                        </select>
                        @error('kode_pos')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Dropdown Wilayah: Provinsi, Kabupaten, Kecamatan --}}

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Provinsi <span
                                class="text-red-500">*</span></label>
                        <select name="provinsi_id" x-model="provinsiId" @change="filterKabupaten()"
                            class="w-full border border-gray-300 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500"
                            required>
                            <option value="">Pilih Provinsi</option>
                            @foreach ($provinsis as $provinsi)
                                <option value="{{ $provinsi->id }}"
                                    {{ old('provinsi_id') == $provinsi->id ? 'selected' : '' }}>
                                    {{ $provinsi->nama_provinsi }}
                                </option>
                            @endforeach
                        </select>
                        @error('provinsi_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Kabupaten -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Kabupaten <span
                                class="text-red-500">*</span></label>
                        <select name="kabupaten_id" x-model="kabupatenId" @change="filterKecamatan()"
                            class="w-full border border-gray-300 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500"
                            required>
                            <option value="">Pilih Kabupaten</option>
                            <template x-for="kabupaten in filteredKabupatens" :key="kabupaten.id">
                                <option :value="kabupaten.id" x-text="kabupaten.nama_kabupaten"
                                    :selected="kabupaten.id == '{{ old('kabupaten_id') }}'"></option>
                            </template>
                        </select>
                        @error('kabupaten_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Kecamatan -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Kecamatan <span
                                class="text-red-500">*</span></label>
                        <select name="kecamatan_id" x-model="kecamatanId"
                            class="w-full border border-gray-300 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500"
                            required>
                            <option value="">Pilih Kecamatan</option>
                            <template x-for="kecamatan in filteredKecamatans" :key="kecamatan.id">
                                <option :value="kecamatan.id" x-text="kecamatan.nama_kecamatan"
                                    :selected="kecamatan.id == '{{ old('kecamatan_id') }}'"></option>
                            </template>
                        </select>
                        @error('kecamatan_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
                {{-- Desa & Foto --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="desa" class="block text-sm font-medium text-gray-700">Desa/Kelurahan</label>
                        <input type="text" name="desa" id="desa"
                            class="w-full border border-gray-300 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500"
                            value="{{ old('desa') }}" placeholder="Masukkan nama desa/kelurahan">
                    </div>
                    <div>
                        <label for="foto" class="block text-sm font-medium text-gray-700">Foto Alat</label>
                        <input type="file" name="foto" id="foto" accept="image/*"
                            class="w-full border border-gray-300 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500">
                        <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG (Maks. 2MB)</p>
                        @error('foto')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Lokasi --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label for="lintang" class="block text-sm font-medium text-gray-700">Lintang (Latitude)</label>
                        <input type="text" name="lintang" id="lintang"
                            class="w-full border border-gray-300 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500"
                            value="{{ old('lintang') }}" placeholder="Contoh: -6.123456">
                        @error('lintang')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="bujur" class="block text-sm font-medium text-gray-700">Bujur (Longitude)</label>
                        <input type="text" name="bujur" id="bujur"
                            class="w-full border border-gray-300 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500"
                            value="{{ old('bujur') }}" placeholder="Contoh: 106.123456">
                        @error('bujur')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="elevasi" class="block text-sm font-medium text-gray-700">Elevasi (mdpl)</label>
                        <input type="number" name="elevasi" id="elevasi"
                            class="w-full border border-gray-300 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500"
                            value="{{ old('elevasi') }}" placeholder="Dalam meter di atas permukaan laut">
                        @error('elevasi')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Kondisi dan Kepemilikan --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="kondisi_alat" class="block text-sm font-medium text-gray-700">Kondisi Alat</label>
                        <select name="kondisi_alat" id="kondisi_alat"
                            class="w-full border border-gray-300 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Pilih Kondisi</option>
                            <option value="Baik" {{ old('kondisi_alat') == 'Baik' ? 'selected' : '' }}>Baik</option>
                            <option value="Rusak Ringan" {{ old('kondisi_alat') == 'Rusak Ringan' ? 'selected' : '' }}>
                                Rusak Ringan</option>
                            <option value="Rusak Berat" {{ old('kondisi_alat') == 'Rusak Berat' ? 'selected' : '' }}>Rusak
                                Berat</option>
                            <option value="Dalam Perbaikan"
                                {{ old('kondisi_alat') == 'Dalam Perbaikan' ? 'selected' : '' }}>Dalam Perbaikan</option>
                        </select>
                    </div>
                    <div>
                        <label for="kepemilikan_alat" class="block text-sm font-medium text-gray-700">Kepemilikan
                            Alat</label>
                        <select name="kepemilikan_alat" id="kepemilikan_alat"
                            class="w-full border border-gray-300 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Pilih Kepemilikan</option>
                            <option value="BMKG" {{ old('kepemilikan_alat') == 'BMKG' ? 'selected' : '' }}>BMKG</option>
                            <option value="Pemda" {{ old('kepemilikan_alat') == 'Pemda' ? 'selected' : '' }}>Pemerintah
                                Daerah</option>
                            <option value="Swasta" {{ old('kepemilikan_alat') == 'Swasta' ? 'selected' : '' }}>Swasta
                            </option>
                            <option value="Lainnya" {{ old('kepemilikan_alat') == 'Lainnya' ? 'selected' : '' }}>Lainnya
                            </option>
                        </select>
                    </div>
                </div>

                {{-- Penanggung Jawab --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="nama_penanggungjawab" class="block text-sm font-medium text-gray-700">Nama Penanggung
                            Jawab</label>
                        <input type="text" name="nama_penanggungjawab"
                            class="w-full border border-gray-300 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500"
                            value="{{ old('nama_penanggungjawab') }}" placeholder="Nama penanggung jawab">
                    </div>
                    <div>
                        <label for="jabatan" class="block text-sm font-medium text-gray-700">Jabatan</label>
                        <input type="text" name="jabatan"
                            class="w-full border border-gray-300 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500"
                            value="{{ old('jabatan') }}" placeholder="Jabatan penanggung jawab">
                    </div>
                </div>

                {{-- Pengiriman & Ketersediaan Data --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="pengiriman_data" class="block text-sm font-medium text-gray-700">Pengiriman
                            Data</label>
                        <select name="pengiriman_data" id="pengiriman_data"
                            class="w-full border border-gray-300 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Pilih Metode Pengiriman</option>
                            <option value="Realtime" {{ old('pengiriman_data') == 'Realtime' ? 'selected' : '' }}>Realtime
                            </option>
                            <option value="Harian" {{ old('pengiriman_data') == 'Harian' ? 'selected' : '' }}>Harian
                            </option>
                            <option value="Mingguan" {{ old('pengiriman_data') == 'Mingguan' ? 'selected' : '' }}>Mingguan
                            </option>
                            <option value="Bulanan" {{ old('pengiriman_data') == 'Bulanan' ? 'selected' : '' }}>Bulanan
                            </option>
                        </select>
                    </div>
                    <div>
                        <label for="ketersediaan_data" class="block text-sm font-medium text-gray-700">Ketersediaan
                            Data</label>
                        <select name="ketersediaan_data" id="ketersediaan_data"
                            class="w-full border border-gray-300 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Pilih Ketersediaan Data</option>
                            <option value="Tersedia" {{ old('ketersediaan_data') == 'Tersedia' ? 'selected' : '' }}>
                                Tersedia</option>
                            <option value="Terbatas" {{ old('ketersediaan_data') == 'Terbatas' ? 'selected' : '' }}>
                                Terbatas</option>
                            <option value="Tidak Tersedia"
                                {{ old('ketersediaan_data') == 'Tidak Tersedia' ? 'selected' : '' }}>Tidak Tersedia
                            </option>
                        </select>
                    </div>
                </div>

                {{-- Keterangan Alat --}}
                <div>
                    <label for="keterangan_alat" class="block text-sm font-medium text-gray-700">Keterangan Alat</label>
                    <textarea name="keterangan_alat" rows="3"
                        class="w-full border border-gray-300 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Tambahkan keterangan lain yang diperlukan">{{ old('keterangan_alat') }}</textarea>
                </div>

                {{-- Tombol Aksi --}}
                <div class="pt-4 flex justify-between">
                    <a href="{{ route('metadata-alat.index') }}"
                        class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                        Kembali
                    </a>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                        Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Script Alpine.js untuk filtering dinamis --}}
    <script>
        function alatForm() {
            return {
                provinsiId: '{{ old('provinsi_id') }}',
                kabupatenId: '{{ old('kabupaten_id') }}',
                kecamatanId: '{{ old('kecamatan_id') }}',
                allKabupatens: @json($kabupatens),
                allKecamatans: @json($kecamatans),

                get filteredKabupatens() {
                    if (!this.provinsiId) return [];

                    // 1. Dapatkan semua kecamatan yang ada di provinsi ini
                    const kecamatanInProvinsi = this.allKecamatans.filter(
                        kec => kec.provinsi_id == this.provinsiId
                    );

                    // 2. Kumpulkan ID kabupaten unik dari kecamatan tersebut
                    const kabupatenIds = [...new Set(kecamatanInProvinsi.map(k => k.kabupaten_id))];

                    // 3. Filter kabupaten berdasarkan ID yang terkait
                    return this.allKabupatens.filter(
                        kab => kabupatenIds.includes(kab.id)
                    );
                },

                get filteredKecamatans() {
                    if (!this.kabupatenId) return [];
                    return this.allKecamatans.filter(
                        kec => kec.kabupaten_id == this.kabupatenId
                    );
                },

                init() {
                    // Jika ada old value, filter dropdown
                    if (this.provinsiId) this.filterKabupaten();
                    if (this.kabupatenId) this.filterKecamatan();
                }
            }
        }
    </script>
@endsection
