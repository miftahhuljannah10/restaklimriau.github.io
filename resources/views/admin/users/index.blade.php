@extends('layouts.app')

@section('content')
    <div class="p-6">
        <div class="max-w-7xl mx-auto bg-white shadow-md rounded-lg p-6">
            <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-4">

                <div class="flex items-center gap-2">

                    <a href="{{ route('users.create') }}">
                        <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded text-sm">
                            + Tambah Pegawai
                        </button>
                    </a>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-left text-gray-700 border" id="usersTable">
                    <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                        <tr>
                            <th class="px-3 py-2 border">No</th>
                            <th class="px-3 py-2 border">Nama</th>
                            <th class="px-3 py-2 border">Email</th>
                            <th class="px-3 py-2 border">Role</th>
                            <th class="px-3 py-2 border text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $index => $user)
                            <tr class="{{ $loop->even ? 'bg-gray-50' : 'bg-white' }}">
                                <td class="px-3 py-2 border">{{ $users->firstItem() + $index }}</td>
                                <td class="px-3 py-2 border">{{ $user->name }}</td>
                                <td class="px-3 py-2 border">{{ $user->email }}</td>
                                <td class="px-3 py-2 border">{{ $user->role->name }}</td>
                                <td class="px-3 py-2 border text-center">
                                    <div class="flex justify-center gap-2">
                                        <a href="{{ route('users.edit', $user->id) }}"
                                            class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm">
                                            Edit
                                        </a>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus user ini?')">
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

            <div class="flex justify-between items-center mt-4 text-sm text-gray-600">
                <div>
                    Menampilkan {{ $users->firstItem() ?? 1 }} - {{ $users->lastItem() ?? count($users) }}
                    dari {{ $users->total() }} data
                </div>
                <div>
                    {{ $users->links('vendor.pagination.tailwind') }}
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="mt-4">
        <a href="{{ route('dashboard') }}"
            class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">
            Kembali ke Dashboard
        </a>
    </div> --}}
    {{-- dataTable --}}
    <script>
        $(document).ready(function() {
            $('#usersTable').DataTable();
        });
    </script>
@endsection
