<x-layouts.admin title="Kelola Visi/Misi/Tugas" subtitle="Manajemen data Visi, Misi, dan Tugas">
    @push('styles')
        <style>
            .table-container {
                overflow-x: auto;
            }

            @media (max-width: 768px) {
                .table-container {
                    overflow-x: scroll;
                }
            }
        </style>
    @endpush

    <x-main.layouts.breadcrumb :items="[['title' => 'Visi Misi', 'url' => route('admin.visimisi.index')]]" />

    <x-main.cards.content-card>
        <div class="overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">Daftar Visi/Misi/Tugas</h3>
                        <p class="text-sm text-gray-600">Kelola section dan item visi, misi, serta tugas</p>
                    </div>
                    <div class="flex items-center space-x-2 text-sm text-gray-500">
                        <span>Menampilkan <span id="visibleCount">{{ $sections->count() }}</span> data</span>
                    </div>
                </div>
                <div
                    class="flex flex-col sm:flex-row sm:items-center sm:justify-between space-y-3 sm:space-y-0 sm:space-x-4">
                    <div class="flex-1 max-w-md">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <input type="text" id="quickSearch"
                                class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Cari section...">
                        </div>
                    </div>
                    <div class="flex items-center space-x-3">
                        <x-main.buttons.action-button href="{{ route('admin.visimisi.create') }}" variant="primary">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4" />
                            </svg>
                            Tambah Section
                        </x-main.buttons.action-button>
                        <button type="button" id="refreshBtn"
                            class="inline-flex items-center px-3 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                                </path>
                            </svg>
                            Refresh
                        </button>
                    </div>
                </div>
            </div>
            <div class="table-container">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                No</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Tipe</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nama</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Deskripsi</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Jumlah Item</th>
                            <th
                                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200" id="sectionTableBody">
                        @forelse($sections as $i => $section)
                            <tr class="hover:bg-gray-50 transition-colors duration-150">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $i + 1 }}</td>
                                <td class="px-6 py-4 text-sm capitalize">{{ $section->section_type }}</td>
                                <td class="px-6 py-4 font-semibold text-sm">{{ $section->nama }}</td>
                                <td class="px-6 py-4 text-sm text-gray-700 max-w-xs truncate"
                                    title="{{ $section->deskripsi }}">{{ $section->deskripsi }}</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="inline-flex items-center px-2 py-1 rounded text-xs {{ $section->is_active ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                        {{ $section->is_active ? 'Aktif' : 'Nonaktif' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-center">
                                    <span class="font-bold text-gray-800">{{ $section->items->count() }}</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <x-main.datatables.action-buttons
                                    :viewUrl="route('admin.visimisi.show', $section->id)" :editUrl="route('admin.visimisi.edit', $section->id)"
                                        :deleteAction="route('admin.visimisi.destroy', $section->id)" :itemId="$section->id" :itemName="$section->nama"
                                        deleteConfirm="Yakin ingin menghapus section ini? Semua item juga akan dihapus." />
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-12 text-center text-gray-400">Belum ada data section.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </x-main.cards.content-card>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const quickSearch = document.getElementById('quickSearch');
                const tableBody = document.getElementById('sectionTableBody');
                const visibleCount = document.getElementById('visibleCount');
                const refreshBtn = document.getElementById('refreshBtn');

                if (quickSearch && tableBody) {
                    quickSearch.addEventListener('input', function() {
                        const searchTerm = this.value.toLowerCase();
                        const rows = tableBody.getElementsByTagName('tr');
                        let visibleRows = 0;
                        Array.from(rows).forEach(row => {
                            if (row.querySelector('td')) {
                                const nama = row.querySelector('td:nth-child(3)').textContent
                                    .toLowerCase();
                                const deskripsi = row.querySelector('td:nth-child(4)').textContent
                                    .toLowerCase();
                                if (nama.includes(searchTerm) || deskripsi.includes(searchTerm)) {
                                    row.style.display = '';
                                    visibleRows++;
                                } else {
                                    row.style.display = 'none';
                                }
                            }
                        });
                        if (visibleCount) {
                            visibleCount.textContent = visibleRows;
                        }
                    });
                }
                if (refreshBtn) {
                    refreshBtn.addEventListener('click', function() {
                        window.location.reload();
                    });
                }
            });
        </script>
    @endpush
</x-layouts.admin>
