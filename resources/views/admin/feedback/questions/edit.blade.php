<x-layouts.admin title="Edit Pertanyaan Feedback" subtitle="Mengubah pertanyaan feedback yang sudah ada">

    {{-- Breadcrumb --}}
    <x-main.layouts.breadcrumb :items="[
        ['title' => 'Feedback Questions', 'url' => route('admin.feedback.questions.index')],
        ['title' => 'Edit Pertanyaan'],
    ]" />

    {{-- Main Content --}}
    <x-main.cards.content-card>
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Edit Pertanyaan Feedback</h3>
                    <p class="text-sm text-gray-600">Ubah informasi pertanyaan feedback yang sudah ada</p>
                </div>
                <div class="flex items-center space-x-2">
                    <x-main.buttons.action-button href="{{ route('admin.feedback.questions.index') }}"
                        variant="secondary">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Kembali ke Daftar
                    </x-main.buttons.action-button>
                </div>
            </div>
        </div>

        <div class="p-6">
            <form action="{{ route('admin.feedback.questions.update', $question->id) }}" method="POST"
                class="space-y-6">
                @csrf
                @method('PUT')

                {{-- Question Information Section --}}
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-6">
                    <h4 class="text-lg font-medium text-blue-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Informasi Pertanyaan
                    </h4>

                    <div class="space-y-6">
                        {{-- Question Text Field --}}
                        <div>
                            <label for="question_text" class="block text-sm font-medium text-gray-700 mb-2">
                                Pertanyaan <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <textarea name="question_text" id="question_text" required rows="3"
                                    class="block w-full px-3 py-3 border rounded-lg leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-2 transition-colors duration-200 @error('question_text') border-red-500 focus:ring-red-500 focus:border-red-500 @else border-gray-300 focus:ring-blue-500 focus:border-blue-500 @enderror"
                                    placeholder="Masukkan pertanyaan feedback">{{ old('question_text', $question->question_text) }}</textarea>
                            </div>
                            @error('question_text')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Answer Type Field --}}
                        <div>
                            <label for="answer_type" class="block text-sm font-medium text-gray-700 mb-2">
                                Tipe Jawaban <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                                    </svg>
                                </div>
                                <select name="answer_type" id="answer_type"
                                    class="block w-full pl-10 pr-3 py-3 border rounded-lg leading-5 bg-white focus:outline-none focus:ring-2 transition-colors duration-200 @error('answer_type') border-red-500 focus:ring-red-500 focus:border-red-500 @else border-gray-300 focus:ring-blue-500 focus:border-blue-500 @enderror"
                                    onchange="toggleOptionsSection(this.value)" required>
                                    <option value="text"
                                        {{ $question->options->count() === 0 || old('answer_type') == 'text' ? 'selected' : '' }}>
                                        Text (Jawaban Bebas)</option>
                                    <option value="dropdown"
                                        {{ $question->options->count() > 0 || old('answer_type') == 'dropdown' ? 'selected' : '' }}>
                                        Dropdown (Pilihan)</option>
                                </select>
                            </div>
                            @error('answer_type')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Options Section (for dropdown) --}}
                        <div id="options_section"
                            class="{{ $question->options->count() === 0 && old('answer_type') != 'dropdown' ? 'hidden' : '' }}">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Opsi Jawaban <span class="text-red-500">*</span>
                            </label>
                            <div id="options_container" class="space-y-2">
                                @if ($question->options->count() > 0 || old('options'))
                                    @if (old('options'))
                                        @foreach (old('options') as $option)
                                            <div class="option-row flex gap-2">
                                                <input type="text" name="options[]"
                                                    class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                    placeholder="Masukkan opsi jawaban" value="{{ $option }}">
                                                <button type="button" onclick="removeOption(this)"
                                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-lg text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        @endforeach
                                    @else
                                        @foreach ($question->options as $option)
                                            <div class="option-row flex gap-2">
                                                <input type="text" name="options[]"
                                                    class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                    placeholder="Masukkan opsi jawaban"
                                                    value="{{ $option->option_text }}">
                                                <button type="button" onclick="removeOption(this)"
                                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-lg text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        @endforeach
                                    @endif
                                @else
                                    <div class="option-row flex gap-2">
                                        <input type="text" name="options[]"
                                            class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="Masukkan opsi jawaban">
                                        <button type="button" onclick="removeOption(this)"
                                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-lg text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                    </div>
                                @endif
                            </div>
                            <button type="button" onclick="addOption()"
                                class="mt-2 inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4v16m8-8H4" />
                                </svg>
                                Tambah Opsi
                            </button>
                            @error('options')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            @error('options.*')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Settings Section --}}
                <div class="bg-amber-50 border border-amber-200 rounded-lg p-6">
                    <h4 class="text-lg font-medium text-amber-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-amber-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Pengaturan
                    </h4>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Order Field --}}
                        <div>
                            <label for="order" class="block text-sm font-medium text-gray-700 mb-2">
                                Urutan Tampil <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4" />
                                    </svg>
                                </div>
                                <input type="number" name="order" id="order" required min="0"
                                    class="block w-full pl-10 pr-3 py-3 border rounded-lg leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-2 transition-colors duration-200 @error('order') border-red-500 focus:ring-red-500 focus:border-red-500 @else border-gray-300 focus:ring-blue-500 focus:border-blue-500 @enderror"
                                    placeholder="0" value="{{ old('order', $question->order) }}">
                            </div>
                            @error('order')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Active Status --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                            <div class="flex items-center mt-3">
                                <input type="checkbox" name="is_active" value="1" id="is_active"
                                    class="h-5 w-5 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                                    {{ old('is_active', $question->is_active) ? 'checked' : '' }}>
                                <label for="is_active" class="ml-2 text-sm text-gray-700">
                                    Aktif (Pertanyaan akan ditampilkan)
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
                    <a href="{{ route('admin.feedback.questions.index') }}"
                        class="inline-flex items-center px-6 py-3 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Batal
                    </a>
                    <button type="submit"
                        class="inline-flex items-center px-6 py-3 border border-transparent shadow-sm text-sm leading-4 font-medium rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </x-main.cards.content-card>

    @push('scripts')
        <script>
            // Show/hide options section based on answer type
            function toggleOptionsSection(value) {
                const optionsSection = document.getElementById('options_section');
                const optionsInputs = document.querySelectorAll('#options_container input[name="options[]"]');

                if (value === 'dropdown') {
                    optionsSection.classList.remove('hidden');
                    // Enable all options inputs
                    optionsInputs.forEach(input => {
                        input.disabled = false;
                    });
                } else {
                    optionsSection.classList.add('hidden');
                    // Disable all options inputs so they won't be submitted
                    optionsInputs.forEach(input => {
                        input.disabled = true;
                        input.value = '';
                    });
                }
            }

            // Add new option input
            function addOption() {
                const container = document.getElementById('options_container');
                const newRow = document.createElement('div');
                newRow.className = 'option-row flex gap-2 mb-2';
                newRow.innerHTML = `
                <input type="text" name="options[]"
                    class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Masukkan opsi jawaban">
                <button type="button" onclick="removeOption(this)"
                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-lg text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            `;
                container.appendChild(newRow);
            }

            // Remove option input
            function removeOption(button) {
                const row = button.closest('.option-row');
                const allRows = document.querySelectorAll('.option-row');
                if (allRows.length > 1) {
                    row.remove();
                }
            }

            // Initialize on page load
            document.addEventListener('DOMContentLoaded', function() {
                const answerType = document.getElementById('answer_type').value;
                toggleOptionsSection(answerType);

                // Add form submit handler to clean up disabled inputs
                document.querySelector('form').addEventListener('submit', function(e) {
                    const answerType = document.getElementById('answer_type').value;
                    if (answerType === 'text') {
                        // Remove all disabled option inputs from the form
                        const disabledInputs = document.querySelectorAll('#options_container input[disabled]');
                        disabledInputs.forEach(input => {
                            input.remove();
                        });
                    }
                });
            });
        </script>
    @endpush

</x-layouts.admin>
