@extends('layouts.app')

@section('content')
    <div class="p-6">
        <div class="max-w-7xl mx-auto bg-white shadow-md rounded-lg p-6">

            {{-- Header --}}
            <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-4">
                <div class="text-lg font-semibold text-gray-800">Daftar Pertanyaan Feedback</div>
                <div class="flex items-center gap-2 mt-2 md:mt-0">
                    {{-- Pencarian jika diperlukan --}}

                    {{-- <label for="search" class="text-sm text-gray-700">Cari:</label>
                    <x-main.table.search :route="route('admin.feedback.questions.index')" /> --}}

                    <a href="{{ route('admin.feedback.questions.create') }}">
                        <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded text-sm">
                            + Tambah Pertanyaan
                        </button>
                    </a>
                </div>
            </div>

            {{-- Flash message --}}
            @if (session('success'))
                <div class="mb-4 px-4 py-2 bg-green-100 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Tabel pertanyaan --}}
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-left text-gray-700 border" id="pegawaiTable">
                    <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                        <tr>
                            <th class="px-3 py-2 border">Urutan</th>
                            <th class="px-3 py-2 border">Pertanyaan</th>
                            <th class="px-3 py-2 border">Status</th>
                            <th class="px-3 py-2 border text-center">Aktifkan/Nonaktifkan</th>
                            <th class="px-3 py-2 border text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($questions as $question)
                            <tr class="{{ $loop->even ? 'bg-gray-50' : 'bg-white' }}">
                                <td class="px-3 py-2 border">{{ $question->order }}</td>
                                <td class="px-3 py-2 border">{{ $question->question_text }}</td>
                                <td class="px-3 py-2 border">
                                    @if ($question->is_active)
                                        <span
                                            class="inline-block bg-green-200 text-green-800 text-xs font-medium px-2 py-1 rounded">
                                            Aktif
                                        </span>
                                    @else
                                        <span
                                            class="inline-block bg-gray-300 text-gray-700 text-xs font-medium px-2 py-1 rounded">
                                            Tidak Aktif
                                        </span>
                                    @endif
                                </td>
                                {{-- toogle --}}
                                <td class="px-3 py-2 border text-center">
                                    <form action="{{ route('admin.feedback.questions.toggle', $question) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit"
                                            class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded text-sm">
                                            {{ $question->is_active ? 'Nonaktifkan' : 'Aktifkan' }}
                                        </button>
                                    </form>
                                </td>

                                <td class="px-3 py-2 border text-center">
                                    <div class="flex justify-center gap-2">
                                        <a href="{{ route('admin.feedback.questions.edit', $question) }}"
                                            class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm">
                                            Edit
                                        </a>
                                        <form action="{{ route('admin.feedback.questions.destroy', $question) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus pertanyaan ini?')">
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
                        @empty
                            <tr>
                                <td colspan="4" class="px-3 py-4 text-center text-gray-500">
                                    Belum ada pertanyaan feedback.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#pegawaiTable').DataTable();
        });
    </script>
@endsection
