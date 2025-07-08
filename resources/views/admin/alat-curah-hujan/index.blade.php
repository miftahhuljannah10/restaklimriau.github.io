<x-layouts.admin title="Data Curah Hujan Normal" subtitle="Rekap data curah hujan per alat/pos">

    {{-- Breadcrumb --}}
    <x-main.layouts.breadcrumb :items="[['title' => 'Alat Curah Hujan', 'url' => '#'], ['title' => 'Data Normal']]" />

    <x-main.cards.content-card>
        <div class="overflow-hidden">
            {{-- Table Header with Info and Quick Filters --}}
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">Data Curah Hujan Normal</h3>
                        <p class="text-sm text-gray-600">Rekap data curah hujan per alat/pos</p>
                    </div>
                    <div class="flex items-center space-x-2 text-sm text-gray-500">
                        <span>Menampilkan <span id="visibleCount">{{ $curahHujanData->count() }}</span> pos</span>
                    </div>
                </div>

                {{-- Quick Search and Actions --}}
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between space-y-3 sm:space-y-0 sm:space-x-4">
                    <div class="flex-1 max-w-md">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <input type="text" id="quickSearch" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-blue-500 focus:border-blue-500" placeholder="Cari nomor pos atau nama pos...">
                        </div>
                    </div>

                    <div class="flex items-center space-x-3">
                        <x-main.buttons.action-button href="{{ route('admin.alat-curah-hujan.create') }}" variant="primary">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Import Data
                        </x-main.buttons.action-button>

                        <x-main.buttons.action-button href="{{ route('admin.alat-curah-hujan.full') }}" variant="success">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            Data Lengkap
                        </x-main.buttons.action-button>

                        <button type="button" id="refreshBtn" class="inline-flex items-center px-3 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                            </svg>
                            Refresh
                        </button>
                    </div>
                </div>
            </div>

            {{-- Flash Messages --}}
            @if (session('success'))
                <div class="mx-6 mt-4 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-md flex items-center" role="alert">
                    <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            {{-- Table --}}
            <div class="table-container">
                <table class="min-w-full divide-y divide-gray-200" id="curahHujanTable">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider sortable cursor-pointer hover:bg-gray-100 transition-colors duration-200" data-sort="nomor_pos">
                                <div class="flex items-center space-x-1">
                                    <span>Nomor Pos</span>
                                    <svg class="w-4 h-4 text-gray-400 sort-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path>
                                    </svg>
                                </div>
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider sortable cursor-pointer hover:bg-gray-100 transition-colors duration-200" data-sort="nama_pos">
                                <div class="flex items-center space-x-1">
                                    <span>Nama Pos</span>
                                    <svg class="w-4 h-4 text-gray-400 sort-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path>
                                    </svg>
                                </div>
                            </th>
                            <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Jan</th>
                            <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Feb</th>
                            <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Mar</th>
                            <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Apr</th>
                            <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Rata-rata</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200" id="curahHujanTableBody">
                        @forelse ($curahHujanData as $data)
                            <tr class="hover:bg-gray-50 transition-colors duration-150">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $data->nomor_pos }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $data->alat->nama_pos ?? '-' }}</td>
                                <td class="px-4 py-4 text-center text-sm text-gray-500">{{ $data->januari ?? '-' }}</td>
                                <td class="px-4 py-4 text-center text-sm text-gray-500">{{ $data->februari ?? '-' }}</td>
                                <td class="px-4 py-4 text-center text-sm text-gray-500">{{ $data->maret ?? '-' }}</td>
                                <td class="px-4 py-4 text-center text-sm text-gray-500">{{ $data->april ?? '-' }}</td>
                                <td class="px-4 py-4 text-center text-sm font-semibold text-blue-600">{{ $data->rata_rata ?? '-' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                    <div class="flex items-center justify-center space-x-2">
                                        <x-main.datatables.action-buttons :viewUrl="route('admin.alat-curah-hujan.show', $data->nomor_pos)" :editUrl="route('admin.alat-curah-hujan.edit', $data->nomor_pos)" :deleteAction="route('admin.alat-curah-hujan.destroy', $data->nomor_pos)" :itemId="$data->nomor_pos" :itemName="$data->alat->nama_pos ?? $data->nomor_pos" size="sm" />
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-6 py-16 text-center">
                                    <div class="flex flex-col items-center space-y-4">
                                        <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center">
                                            <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z" />
                                            </svg>
                                        </div>
                                        <div class="text-center max-w-md">
                                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Belum ada data curah hujan</h3>
                                            <p class="text-sm text-gray-500 mb-6">Belum ada data curah hujan yang tersedia. Silakan import data terlebih dahulu.</p>
                                            <a href="{{ route('admin.alat-curah-hujan.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200 shadow-sm">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                                </svg>
                                                Import Data
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{-- Pagination menggunakan komponen yang sudah ada --}}
            <x-main.datatables.pagination :paginator="$curahHujanData" :showInfo="true" />
            {{-- Per Page Selector --}}
            <div class="flex items-center justify-between mt-4 pt-4 border-t border-gray-200">
                <div class="flex items-center space-x-2">
                    <label for="perPage" class="text-sm text-gray-700">Tampilkan:</label>
                    <select id="perPage" onchange="changePerPage(this.value)" class="block w-20 pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-lg shadow-sm">
                        <option value="10" {{ request('per_page') == 10 || !request('per_page') ? 'selected' : '' }}>10</option>
                        <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                        <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                        <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100</option>
                    </select>
                    <span class="text-sm text-gray-700">per halaman</span>
                </div>
                @if ($curahHujanData->hasPages())
                    <div class="flex items-center space-x-2">
                        <span class="text-sm text-gray-600">Lompat ke halaman:</span>
                        <input type="number" id="jumpToPage" min="1" max="{{ $curahHujanData->lastPage() }}" placeholder="{{ $curahHujanData->currentPage() }}" class="w-16 px-2 py-1 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <button onclick="jumpToPage()" class="px-3 py-1 text-sm bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-colors duration-200">Go</button>
                    </div>
                @endif
            </div>
    </x-main.cards.content-card>


    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script>
            window.curahHujanTableMaxPage = {{ $curahHujanData->lastPage() ?? 1 }};
            $(document).ready(function() {
                // Quick search functionality
                $('#quickSearch').on('input', function() {
                    const searchTerm = $(this).val().toLowerCase();
                    $('#curahHujanTableBody tr').each(function() {
                        const text = $(this).text().toLowerCase();
                        $(this).toggle(text.indexOf(searchTerm) > -1);
                    });
                    updateVisibleCount();
                });

                // Refresh button
                $('#refreshBtn').on('click', function() {
                    const btn = $(this);
                    const originalHtml = btn.html();
                    btn.html('<svg class="animate-spin h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>Memuat...');
                    btn.prop('disabled', true);
                    setTimeout(() => window.location.reload(), 500);
                });

                // Sort table (simple client-side sort)
                $('.sortable').on('click', function() {
                    var table = $(this).parents('table');
                    var tbody = table.find('tbody');
                    var rows = tbody.find('tr').toArray();
                    var idx = $(this).index();
                    var asc = !$(this).hasClass('sorted-asc');
                    $('.sortable').removeClass('sorted-asc sorted-desc');
                    $(this).addClass(asc ? 'sorted-asc' : 'sorted-desc');
                    rows.sort(function(a, b) {
                        var aText = $(a).find('td').eq(idx).text().trim().toLowerCase();
                        var bText = $(b).find('td').eq(idx).text().trim().toLowerCase();
                        if ($.isNumeric(aText) && $.isNumeric(bText)) {
                            aText = parseFloat(aText); bText = parseFloat(bText);
                        }
                        if (aText < bText) return asc ? -1 : 1;
                        if (aText > bText) return asc ? 1 : -1;
                        return 0;
                    });
                    $.each(rows, function(i, row) { tbody.append(row); });
                });

                // Pagination controls
                window.changePerPage = function(perPage) {
                    const url = new URL(window.location);
                    url.searchParams.set('per_page', perPage);
                    url.searchParams.set('page', 1);
                    window.location.href = url.toString();
                };
                window.goToPage = function(page) {
                    const url = new URL(window.location);
                    url.searchParams.set('page', page);
                    window.location.href = url.toString();
                };
                window.jumpToPage = function() {
                    const pageInput = $('#jumpToPage');
                    const page = parseInt(pageInput.val());
                    const maxPage = window.curahHujanTableMaxPage || 1;
                    if (page && page >= 1 && page <= maxPage) {
                        window.goToPage(page);
                    } else {
                        alert('Masukkan nomor halaman yang valid (1-' + maxPage + ')');
                        pageInput.focus();
                    }
                };

                // Update visible count
                function updateVisibleCount() {
                    const visibleRows = $('#curahHujanTableBody tr:visible').length;
                    $('#visibleCount').text(visibleRows);
                }
            });
        </script>
    @endpush

</x-layouts.admin>
