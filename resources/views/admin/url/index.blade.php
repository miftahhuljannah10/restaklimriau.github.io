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
                    <x-main.table.search :route="route('url.index', $type)" />
                    <a href="{{ route('url.create', $type) }}">
                        <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded text-sm">
                            + Tambah URL
                        </button>
                    </a>
                </div>
                <!-- Tombol untuk membuka modal -->
                {{-- <button @click="openModal = true"
                    class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded text-sm">
                    + Tambah URL
                </button> --}}

                <!-- Modal -->
                {{-- <div x-data="{ openModal: false }" x-show="openModal"
                    class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
                    <div @click.outside="openModal = false" class="bg-white w-full max-w-lg p-6 rounded shadow-lg">
                        <h2 class="text-xl font-semibold mb-4">Tambah URL</h2>
                        <form action="{{ route('url.store', $type) }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="url" class="block text-sm font-medium text-gray-700">URL</label>
                                <input type="url" name="url" id="url" required
                                    class="w-full border border-gray-300 rounded p-2">
                            </div>
                            <div class="mb-4">
                                <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" class="w-full border border-gray-300 rounded p-2"></textarea>
                            </div>
                            <div class="flex justify-end gap-2">
                                <button type="button" @click="openModal = false"
                                    class="bg-gray-500 text-white px-4 py-2 rounded">Batal</button>
                                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div> --}}

            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-left text-gray-700 border">
                    <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                        <tr>
                            <th class="px-3 py-2 border">No</th>
                            <th class="px-3 py-2 border">URL</th>
                            <th class="px-3 py-2 border">Deskripsi</th>
                            <th class="px-3 py-2 border text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($urls as $index => $url)
                            <tr class="{{ $loop->even ? 'bg-gray-50' : 'bg-white' }}">
                                <td class="px-3 py-2 border">{{ $urls->firstItem() + $index }}</td>
                                <td class="px-3 py-2 border">{{ $url->url }}</td>
                                <td class="px-3 py-2 border">{{ $url->deskripsi }}</td>

                                <td class="px-3 py-2 border text-center">
                                    <div class="flex justify-center gap-2">
                                        <a href="{{ route('url.edit', ['type' => $type, 'id' => $url->id]) }}"
                                            class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm">
                                            Edit
                                        </a>
                                        <form action="{{ route('url.destroy', ['type' => $type, 'id' => $url->id]) }}"
                                            method="POST" onsubmit="return confirm('Yakin ingin menghapus URL ini?')">
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

                {{ $urls->links() }}
            </div>
        @endsection
