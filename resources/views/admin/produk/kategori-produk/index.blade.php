@extends('layouts.app')
@section('content')
    <div class="p-6">
        <div class="max-w-7xl mx-auto bg-white shadow-md rounded-lg p-6">
            <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-4">

                <div class="flex items-center gap-2">
                    {{-- <label for="search" class="text-sm text-gray-700">Cari:</label> --}}
                    {{-- <x-main.table.search :route="route('kategori-produk.index')" /> --}}
                    <a href="{{ route('kategori-produk.create') }}">
                        <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded text-sm">
                            + Tambah Kategori Produk
                        </button>
                    </a>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-left text-gray-700 border" id="kategoriProdukTable">
                    <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                        <tr>
                            <th class="px-3 py-2 border">No</th>
                            <th class="px-3 py-2 border">Nama Kategori</th>
                            <th class="px-3 py-2 border text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $index => $item)
                            <tr class="{{ $loop->even ? 'bg-gray-50' : 'bg-white' }}">
                                <td class="px-3 py-2 border">{{ $categories->firstItem() + $index }}</td>
                                <td class="px-3 py-2 border">{{ $item->nama_kategori }}</td>
                                <td class="px-3 py-2 border">
                                    <div class="flex justify-center gap-2">
                                        <a href="{{ route('kategori-produk.edit', $item->id) }}"
                                            class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm">
                                            Edit
                                        </a>
                                        <form action="{{ route('kategori-produk.destroy', $item->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
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
                {{ $categories->withQueryString()->links() }}
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    {{-- for perpage paginate --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const entriesSelect = document.getElementById('entries');
            entriesSelect.addEventListener('change', function() {
                const perPage = this.value;
                const url = new URL(window.location.href);
                url.searchParams.set('per_page', perPage);
                window.location.href = url.toString();
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const entriesSelect = document.getElementById('entries');
            entriesSelect.value = '{{ request('per_page', 10) }}';
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#kategoriProdukTable').DataTable();
        });
    </script>
@endpush
