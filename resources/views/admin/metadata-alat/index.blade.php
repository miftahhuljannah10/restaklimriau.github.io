@extends('layouts.app')

@section('content')
    <div class="p-6">
        <div class="max-w-7xl mx-auto bg-white shadow-md rounded-lg p-6">
            <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-4">
                <div class="mb-2 md:mb-0">
                    <label for="entries" class="mr-2 text-sm text-gray-700">Tampilkan</label>
                    <select id="entries" class="border rounded px-2 py-1 text-sm"
                        onchange="window.location.href='{{ route('metadata-alat.index') }}?per_page='+this.value">
                        <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                        <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                        <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                        <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100</option>
                    </select>
                </div>
                <div class="flex items-center gap-2">
                    <label for="search" class="text-sm text-gray-700">Cari:</label>
                    <x-main.table.search :route="route('metadata-alat.index')" />
                    <a href="{{ route('metadata-alat.create') }}">
                        <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded text-sm">
                            + Tambah Metadata Alat
                        </button>
                    </a>

                    <form action="{{ route('metadata-alat.import-csv') }}" method="POST" enctype="multipart/form-data"
                        class="flex items-center gap-2">
                        @csrf
                        <input type="file" name="csv_file" accept=".csv" class="border rounded px-2 py-1 text-sm"
                            required>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-2 rounded text-sm">
                            Import CSV
                        </button>
                    </form>

                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-left text-gray-700 border" id="metadata-alatTable">
                    <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                        <tr>
                            <th class="px-3 py-2 border">No</th>
                            <th class="px-3 py-2 border">Nomor POS</th>
                            <th class="px-3 py-2 border">Nama POS</th>
                            <th class="px-3 py-2 border">Jenis Alat</th>
                            <th class="px-3 py-2 border">Kode POS</th>
                            <th class="px-3 py-2 border">Provinsi</th>
                            <th class="px-3 py-2 border">Kabupaten</th>
                            <th class="px-3 py-2 border">Kecamatan</th>
                            <th class="px-3 py-2 border">Desa</th>
                            <th class="px-3 py-2 border">Lintang</th>
                            <th class="px-3 py-2 border">Bujur</th>
                            <th class="px-3 py-2 border">Elevasi</th>
                            <th class="px-3 py-2 border">Kondisi Alat</th>
                            <th class="px-3 py-2 border">Kepemilikan</th>
                            <th class="px-3 py-2 border">Penanggung Jawab</th>
                            <th class="px-3 py-2 border">Jabatan</th>
                            <th class="px-3 py-2 border">Pengiriman Data</th>
                            <th class="px-3 py-2 border">Ketersediaan Data</th>
                            <th class="px-3 py-2 border">Keterangan</th>
                            <th class="px-3 py-2 border">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alats as $index => $alat)
                            <tr class="{{ $loop->even ? 'bg-gray-50' : 'bg-white' }}">
                                <td class="px-3 py-2 border">{{ $alats->firstItem() + $index }}</td>
                                <td class="px-3 py-2 border">{{ $alat->nomor_pos }}</td>
                                <td class="px-3 py-2 border">{{ $alat->nama_pos }}</td>
                                <td class="px-3 py-2 border">{{ $alat->jenis_alat }}</td>
                                <td class="px-3 py-2 border">{{ $alat->kode_pos }}</td>
                                <td class="px-3 py-2 border">{{ $alat->provinsi->nama_provinsi ?? '-' }}</td>
                                <td class="px-3 py-2 border">{{ $alat->kabupaten->nama_kabupaten ?? '-' }}</td>
                                <td class="px-3 py-2 border">{{ $alat->kecamatan->nama_kecamatan ?? '-' }}</td>
                                <td class="px-3 py-2 border">{{ $alat->desa ?? '-' }}</td>
                                <td class="px-3 py-2 border">{{ $alat->lintang ?? '-' }}</td>
                                <td class="px-3 py-2 border">{{ $alat->bujur ?? '-' }}</td>
                                <td class="px-3 py-2 border">{{ $alat->elevasi ?? '-' }}</td>
                                <td class="px-3 py-2 border">{{ $alat->kondisi_alat ?? '-' }}</td>
                                <td class="px-3 py-2 border">{{ $alat->kepemilikan_alat ?? '-' }}</td>
                                <td class="px-3 py-2 border">{{ $alat->nama_penanggungjawab ?? '-' }}</td>
                                <td class="px-3 py-2 border">{{ $alat->jabatan ?? '-' }}</td>
                                <td class="px-3 py-2 border">{{ $alat->pengiriman_data ?? '-' }}</td>
                                <td class="px-3 py-2 border">{{ $alat->ketersediaan_data ?? '-' }}</td>
                                <td class="px-3 py-2 border">{{ Str::limit($alat->keterangan_alat, 20) ?? '-' }}</td>
                                <td class="px-3 py-2 border text-center">
                                    <div class="flex justify-center gap-2">
                                        <a href="{{ route('metadata-alat.edit', $alat->nomor_pos) }}"
                                            class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm">
                                            Edit
                                        </a>
                                        <form action="{{ route('metadata-alat.destroy', $alat->nomor_pos) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus metadata alat ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $alats->links() }}
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#metadata-alatTable').DataTable();
        });
    </script>
@endsection
