<x-layouts.admin title="Edit Visi/Misi/Tugas" subtitle="Mengubah data section dan item">
    <x-main.layouts.breadcrumb :items="[['title' => 'Visi Misi', 'url' => route('admin.visimisi.index')], ['title' => 'Edit']]" />

    <x-main.cards.content-card>
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Edit Section</h3>
                    <p class="text-sm text-gray-600">Ubah informasi section dan item di bawah ini</p>
                </div>
                <div class="flex items-center space-x-2">
                    <x-main.buttons.action-button href="{{ route('admin.visimisi.index') }}" variant="secondary">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Kembali ke Daftar
                    </x-main.buttons.action-button>
                </div>
            </div>
        </div>

        <div class="p-6"
            x-data='{
            items: @json(old('items', $items)),
            addItem() {
                this.items.push({
                    content: "",
                    order_number: this.items.length + 1,
                    is_active: 1
                });
            },
            removeItem(idx) {
                if (this.items.length > 1) this.items.splice(idx, 1);
            }
        }'>
            <form action="{{ route('admin.visimisi.update', $section->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                {{-- Section Info --}}
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-6 mb-6">
                    <h4 class="text-lg font-medium text-blue-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Informasi Section
                    </h4>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label for="section_type" class="block text-sm font-medium text-gray-700 mb-2">Tipe Section
                                <span class="text-red-500">*</span></label>
                            <select id="section_type" name="section_type"
                                class="block w-full px-3 py-2 border rounded-md bg-white focus:outline-none focus:ring-2 border-gray-300 focus:ring-blue-500"
                                required>
                                <option value="">Pilih Tipe</option>
                                <option value="visi"
                                    {{ old('section_type', $section->section_type) == 'visi' ? 'selected' : '' }}>Visi
                                </option>
                                <option value="misi"
                                    {{ old('section_type', $section->section_type) == 'misi' ? 'selected' : '' }}>Misi
                                </option>
                                <option value="tugas"
                                    {{ old('section_type', $section->section_type) == 'tugas' ? 'selected' : '' }}>Tugas
                                </option>
                            </select>
                            @error('section_type')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">Nama <span
                                    class="text-red-500">*</span></label>
                            <input type="text" id="nama" name="nama"
                                value="{{ old('nama', $section->nama) }}"
                                class="block w-full px-3 py-2 border rounded-md bg-white focus:outline-none focus:ring-2 border-gray-300 focus:ring-blue-500"
                                required>
                            @error('nama')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="is_active" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                            <select id="is_active" name="is_active"
                                class="block w-full px-3 py-2 border rounded-md bg-white focus:outline-none focus:ring-2 border-gray-300 focus:ring-blue-500">
                                <option value="1" {{ old('is_active', $section->is_active) ? 'selected' : '' }}>
                                    Aktif</option>
                                <option value="0" {{ !old('is_active', $section->is_active) ? 'selected' : '' }}>
                                    Nonaktif</option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-4">
                        <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                        <textarea id="deskripsi" name="deskripsi" rows="2"
                            class="block w-full px-3 py-2 border rounded-md bg-white focus:outline-none focus:ring-2 border-gray-300 focus:ring-blue-500">{{ old('deskripsi', $section->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Items --}}
                <div class="bg-green-50 border border-green-200 rounded-lg p-6 mb-6">
                    <h4 class="text-lg font-medium text-green-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                        </svg>
                        Daftar Item
                    </h4>
                    <template x-for="(item, idx) in items" :key="item.id ?? idx">
                        <div
                            class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4 bg-white border border-gray-200 rounded-lg p-4 relative">
                            <input type="hidden" :name="'items[' + idx + '][id]'" x-model="item.id">
                            <div>
                                <label :for="'items[' + idx + '][content]'"
                                    class="block text-sm font-medium text-gray-700 mb-2">Isi Item <span
                                        class="text-red-500">*</span></label>
                                <input type="text" :id="'items[' + idx + '][content]'" :name="'items[' + idx + '][content]'"
                                    x-model="item.content"
                                    class="block w-full px-3 py-2 border rounded-md bg-white focus:outline-none focus:ring-2 border-gray-300 focus:ring-green-500"
                                    required>
                            </div>
                            <div>
                                <label :for="'items[' + idx + '][order_number]'"
                                    class="block text-sm font-medium text-gray-700 mb-2">Urutan <span
                                        class="text-red-500">*</span></label>
                                <input type="number" min="1" :id="'items[' + idx + '][order_number]'"
                                    :name="'items[' + idx + '][order_number]'" x-model.number="item.order_number"
                                    class="block w-full px-3 py-2 border rounded-md bg-white focus:outline-none focus:ring-2 border-gray-300 focus:ring-green-500"
                                    required>
                            </div>
                            <div>
                                <label :for="'items[' + idx + '][is_active]'"
                                    class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                                <select :id="'items[' + idx + '][is_active]'" :name="'items[' + idx + '][is_active]'"
                                    x-model.number="item.is_active"
                                    class="block w-full px-3 py-2 border rounded-md bg-white focus:outline-none focus:ring-2 border-gray-300 focus:ring-green-500">
                                    <option :value="1">Aktif</option>
                                    <option :value="0">Nonaktif</option>
                                </select>
                            </div>
                            <button type="button" @click="removeItem(idx)"
                                class="absolute top-2 right-2 text-red-500 hover:text-red-700"
                                x-show="items.length > 1">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </template>
                    <div class="flex justify-end">
                        <button type="button" @click="addItem"
                            class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4" />
                            </svg>
                            Tambah Item
                        </button>
                    </div>
                </div>

                <div class="flex justify-end space-x-3">
                    <x-main.buttons.action-button href="{{ route('admin.visimisi.index') }}" variant="secondary">
                        Batal
                    </x-main.buttons.action-button>
                    <x-main.buttons.submit-button variant="primary">
                        Simpan
                    </x-main.buttons.submit-button>
                </div>
            </form>
        </div>
    </x-main.cards.content-card>
</x-layouts.admin>
