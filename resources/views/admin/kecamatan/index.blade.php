@extends('layouts.app')
@section('content')
    <div class="p-6">
        <div class="max-w-7xl mx-auto bg-white shadow-md rounded-lg p-6">
            <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-4">
                <div class="mb-2 md:mb-0">
                    <label for="entries" class="mr-2 text-sm text-gray-700">Tampilkan</label>
                    <select id="entries" class="border rounded px-2 py-1 text-sm">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                    </select>
                </div>
                <div class="flex items-center gap-2">
                    <label for="search" class="text-sm text-gray-700">Cari:</label>
                    <x-main.table.search :route="route('kecamatan.index')" />
                    <a href="{{ route('kecamatan.create') }}">
                        <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded text-sm">
                            + Tambah Kecamatan
                        </button>
                    </a>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-left text-gray-700 border">
                    <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                        <tr>
                            <th class="px-3 py-2 border">No</th>
                            <th class="px-3 py-2 border">Nama Kabupaten</th>
                            <th class="px-3 py-2 border">Nama Kecamatan</th>
                            <th class="px-3 py-2 border">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($kecamatans as $index => $kecamatan)
                            <tr class="{{ $loop->even ? 'bg-gray-50' : 'bg-white' }}">
                                <td class="px-3 py-2 border">{{ $index + 1 }}</td>
                                <td class="px-3 py-2 border">
                                    {{ $kecamatan->kabupaten->nama_kabupaten }}
                                </td>
                                <td class="px-3 py-2 border">
                                    {{ $kecamatan->nama_kecamatan }}
                                </td>
                                <td class="px-3 py-2 border text-center">
                                    <div class="flex justify-center gap-2">
                                        <a href="{{ route('kecamatan.edit', $kecamatan->id) }}"
                                            class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm">
                                            Edit
                                        </a>
                                        <form action="{{ route('kecamatan.destroy', $kecamatan->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus kecamatan ini?')">
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
                {{ $kecamatans->links() }}
            </div>
        </div>
    </div>
@endsection
