<x-layouts.admin title="Daftar Feedback" subtitle="Daftar seluruh respon feedback pengguna">

    {{-- Breadcrumb --}}
    <x-main.layouts.breadcrumb :items="[
        ['title' => 'Feedback', 'url' => route('admin.feedback.responses.index')],
        ['title' => 'Daftar Feedback'],
    ]" />

    {{-- Main Content --}}
    <x-main.cards.content-card>
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50 flex items-center justify-between">
            <div>
                <h3 class="text-lg font-semibold text-gray-900">Daftar Feedback</h3>
                <p class="text-sm text-gray-600">Lihat seluruh respon feedback yang masuk ke sistem</p>
            </div>
            <form id="bulkDeleteForm" action="{{ route('admin.feedback.responses.bulkDelete') }}" method="POST"
                onsubmit="return confirm('Yakin hapus data terpilih?')">
                @csrf
                @method('DELETE')
                <input type="hidden" name="ids" id="bulkDeleteIds">
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 border border-red-500 rounded-md text-sm font-medium text-red-600 bg-white hover:bg-red-50 transition-colors duration-150">
                    <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                        </path>
                    </svg>
                    Hapus Terpilih
                </button>
            </form>
        </div>

        <div class="p-6">
            @if (session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded">
                    <div class="flex items-center">
                        <svg class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                        <span>{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200" id="responsesTabel">
                    <thead class="bg-gray-50">
                        <tr>
                            <th><input type="checkbox" id="selectAll"></th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                ID</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                IP Address</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Tanggal</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($responses as $response)
                            <tr class="hover:bg-gray-50 transition-colors duration-150">
                                <td><input type="checkbox" class="rowCheckbox" value="{{ $response->id }}"></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ $response->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $response->ip_address }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $response->created_at->format('d/m/Y H:i') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('admin.feedback.responses.show', $response) }}"
                                            class="inline-flex items-center px-3 py-1 border border-blue-500 rounded-md text-sm font-medium text-blue-600 hover:bg-blue-50 transition-colors duration-150">
                                            <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                                </path>
                                            </svg>
                                            Detail
                                        </a>
                                        <form action="{{ route('admin.feedback.responses.destroy', $response) }}"
                                            method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="inline-flex items-center px-3 py-1 border border-red-500 rounded-md text-sm font-medium text-red-600 hover:bg-red-50 transition-colors duration-150"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus feedback ini?')">
                                                <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                    </path>
                                                </svg>
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
        </div>
    </x-main.cards.content-card>

    @push('scripts')
        <script>
            $(document).ready(function() {
                var table = $('#responsesTabel').DataTable({
                    order: [
                        [1, 'desc']
                    ], // sort by ID column
                    pageLength: 25,
                    lengthMenu: [10, 25, 50, 100],
                    language: {
                        search: 'Cari:',
                        lengthMenu: 'Tampilkan _MENU_ entri',
                        info: 'Menampilkan _START_ sampai _END_ dari _TOTAL_ entri',
                        infoEmpty: 'Tidak ada data',
                        paginate: {
                            first: 'Pertama',
                            last: 'Terakhir',
                            next: 'Berikutnya',
                            previous: 'Sebelumnya'
                        },
                        zeroRecords: 'Tidak ditemukan data yang cocok',
                    },
                    columnDefs: [{
                            orderable: false,
                            targets: 0
                        } // disable sort on checkbox column
                    ]
                });

                // Select all checkboxes
                $('#selectAll').on('click', function() {
                    var checked = this.checked;
                    $('.rowCheckbox').each(function() {
                        this.checked = checked;
                    });
                });

                // Bulk delete
                $('#bulkDeleteForm').on('submit', function(e) {
                    var ids = [];
                    $('.rowCheckbox:checked').each(function() {
                        ids.push($(this).val());
                    });
                    if (ids.length === 0) {
                        alert('Pilih minimal satu data untuk dihapus.');
                        e.preventDefault();
                        return false;
                    }
                    $('#bulkDeleteIds').val(JSON.stringify(ids));
                });
            });
        </script>
    @endpush

</x-layouts.admin>
