<x-layouts.admin>
    <x-slot name="title">Daftar URL {{ ucfirst($type) }}</x-slot>

    <div class="space-y-6">
        <x-main.cards.content-card>
            <x-slot name="header">
                <div class="flex justify-between items-center">
                    <h2 class="text-xl font-semibold text-gray-800">Daftar URL {{ ucfirst($type) }}</h2>
                    <a href="{{ route('url.create', $type) }}"
                        class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-lg text-sm font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Tambah URL
                    </a>
                </div>
            </x-slot>

            <!-- Search and entries control -->
            <div class="mb-6 flex flex-col md:flex-row md:justify-between md:items-center gap-4">
                <div class="flex items-center">
                    <label for="entries" class="mr-2 text-sm font-medium text-gray-700">Tampilkan</label>
                    <select id="entries"
                        class="rounded-lg border border-gray-300 px-3 py-1 text-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                    </select>
                </div>
                <div class="flex items-center">
                    <label for="search" class="mr-2 text-sm font-medium text-gray-700">Cari:</label>
                    <x-main.table.search :route="route('url.index', $type)" />
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                No</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                URL</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Deskripsi</th>
                            <th scope="col"
                                class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($urls as $index => $url)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $urls->firstItem() + $index }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-900">
                                    <a href="{{ $url->url }}" target="_blank"
                                        class="text-blue-600 hover:text-blue-800 break-all">
                                        {{ $url->url }}
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline ml-1"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                        </svg>
                                    </a>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    {{ $url->deskripsi ?? '-' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex justify-end space-x-2">
                                        <a href="{{ route('url.edit', ['type' => $type, 'id' => $url->id]) }}"
                                            class="inline-flex items-center px-3 py-1 border border-yellow-300 rounded-lg text-sm font-medium text-yellow-700 bg-yellow-50 hover:bg-yellow-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                                            Edit
                                        </a>
                                        <form action="{{ route('url.destroy', ['type' => $type, 'id' => $url->id]) }}"
                                            method="POST" class="inline"
                                            onsubmit="return confirm('Yakin ingin menghapus URL ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="inline-flex items-center px-3 py-1 border border-red-300 rounded-lg text-sm font-medium text-red-700 bg-red-50 hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4"
                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                    <div class="flex flex-col items-center py-8">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400 mb-2"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                                        </svg>
                                        <p class="text-gray-500">Tidak ada URL ditemukan</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if ($urls->hasPages())
                <div class="mt-6 border-t border-gray-200 pt-4">
                    <x-main.datatables.pagination :paginator="$urls" />
                </div>
            @endif
        </x-main.cards.content-card>
    </div>
</x-layouts.admin>
