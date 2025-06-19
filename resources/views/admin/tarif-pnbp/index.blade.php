@extends('layouts.app')
@section('content')
    <div class="p-6">
        <div class="max-w-7xl mx-auto bg-white shadow-md rounded-lg p-6">
            <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-4">
                <div class="mb-2 md:mb-0">
                    <label for="entries" class="mr-2 text-sm text-gray-700">Tampilkan</label>
                    <select id="entries" class="border rounded px-2 py-1 text-sm"
                        onchange="window.location.href='{{ route('tarif-pnbp.index') }}?per_page='+this.value">
                        <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                        <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                        <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                        <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100</option>
                    </select>
                </div>
                <div class="flex items-center gap-2">
                    <label for="search" class="text-sm text-gray-700">Cari:</label>
                    <x-main.table.search :route="route('tarif-pnbp.index')" />
                    <a href="{{ route('tarif-pnbp.create') }}">
                        <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded text-sm">
                            + Tambah Tarif PNBP
                        </button>
                    </a>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-left text-gray-700 border">
                    <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                        <tr>
                            <th class="px-3 py-2 border">No</th>
                            <th class="px-3 py-2 border">Nama Tarif</th>
                            <th class="px-3 py-2 border">Satuan</th>
                            <th class="px-3 py-2 border">Jenis</th>
                            <th class="px-3 py-2 border">Tarif</th>
                            <th class="px-3 py-2 border">Waktu</th>
                            <th class="px-3 py-2 border">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tarifs as $index => $item)
                            <tr class="{{ $loop->even ? 'bg-gray-50' : 'bg-white' }}">
                                <td class="px-3 py-2 border">{{ $tarifs->firstItem() + $index }}</td>
                                <td class="px-3 py-2 border">{{ $item->nama_tarif }}</td>
                                <td class="px-3 py-2 border">{{ $item->satuan }}</td>
                                <td class="px-3 py-2 border">{{ $item->jenis_tarif }}</td>
                                <td class="px-3 py-2 border">Rp. {{ $item->tarif }}</td>
                                <td class="px-3 py-2 border">{{ $item->waktu }}</td>

                                <td class="px-3 py-2 border">
                                    <div class="flex justify-center gap-2">
                                        <a href="{{ route('tarif-pnbp.edit', $item->id) }}"
                                            class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm">
                                            Edit
                                        </a>
                                        <form action="{{ route('tarif-pnbp.destroy', $item->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus tarif ini?')">
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
                {{ $tarifs->links() }}
            </div>
        </div>
    </div>
@endsection
