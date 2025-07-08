@props([
    'tableId' => 'dataTable',
    'columns' => [],
    'headers' => [],
    'actions' => true,
    'sortable' => false,
    'exportable' => false,
    'striped' => true,
    'hoverable' => true,
])

@php
    // Use headers if provided, otherwise use columns
    $tableHeaders = !empty($headers) ? $headers : $columns;
@endphp

<div class="overflow-hidden">
    @if ($exportable)
        <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white">
            <div class="flex justify-end">
                <div class="flex space-x-2">
                    <button type="button"
                        class="inline-flex items-center px-3 py-2 border border-gray-200 shadow-sm text-sm leading-4 font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                        <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                        Excel
                    </button>
                    <button type="button"
                        class="inline-flex items-center px-3 py-2 border border-gray-200 shadow-sm text-sm leading-4 font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                        <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z">
                            </path>
                        </svg>
                        PDF
                    </button>
                </div>
            </div>
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full" id="{{ $tableId }}">
            <thead>
                <tr>
                    <th scope="col"
                        class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider w-20">
                        <div class="flex items-center">
                            <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-md text-xs font-medium">#</span>
                        </div>
                    </th>
                    @foreach ($tableHeaders as $key => $column)
                        <th scope="col"
                            class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider cursor-pointer hover:bg-gray-200 transition-all duration-200 {{ $sortable ? 'sortable' : '' }}"
                            @if ($sortable) data-column="{{ is_string($key) ? $key : $column }}"
                                onclick="sortTable('{{ $tableId }}', {{ is_string($key) ? $loop->index + 1 : $loop->index + 1 }})" @endif>
                            <div class="flex items-center space-x-2">
                                <span>{{ is_array($column) ? $column['label'] : $column }}</span>
                                @if ($sortable)
                                    <svg class="w-4 h-4 text-gray-400 sort-icon transition-colors duration-200"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path>
                                    </svg>
                                @endif
                            </div>
                        </th>
                    @endforeach
                    @if ($actions)
                        <th scope="col"
                            class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider w-32">
                            <span
                                class="bg-amber-100 text-amber-800 px-3 py-1 rounded-md text-xs font-medium">Aksi</span>
                        </th>
                    @endif
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                {{ $slot }}
            </tbody>
        </table>
    </div>

    <div id="{{ $tableId }}_loading" class="hidden">
        <div class="flex justify-center items-center py-12">
            <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-blue-600"></div>
            <span class="ml-2 text-gray-600">Memuat data...</span>
        </div>
    </div>

    <div id="{{ $tableId }}_empty" class="hidden">
        <div class="text-center py-12">
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                </path>
            </svg>
            <h3 class="mt-2 text-sm font-medium text-gray-900">Tidak ada data</h3>
            <p class="mt-1 text-sm text-gray-500">Data yang Anda cari tidak ditemukan.</p>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        // Hapus fitur search dan sort dari basic table
        // Sekarang hanya menggunakan search dari search-input component
        document.addEventListener('DOMContentLoaded', function() {
            // Table hover effects only
            const tableRows = document.querySelectorAll('#{{ $tableId }} tbody tr');
            tableRows.forEach(row => {
                row.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-1px)';
                });

                row.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });
        });
    </script>
@endpush
