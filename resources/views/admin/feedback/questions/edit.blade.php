@extends('layouts.app')

@section('content')
    <div class="p-6">
        <div class="max-w-xl mx-auto bg-white shadow-md rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-6 text-gray-800">Edit Pertanyaan Feedback</h2>

            <form method="POST" action="{{ route('admin.feedback.questions.update', $question->id) }}">
                @csrf
                @method('PUT')

                {{-- Pertanyaan --}}
                <div class="mb-4">
                    <label for="question_text" class="block text-sm font-medium text-gray-700">Pertanyaan</label>
                    <textarea name="question_text" id="question_text" required rows="3"
                        class="mt-1 w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-200 focus:outline-none">{{ old('question_text', $question->question_text) }}</textarea>
                    @error('question_text')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Tipe Jawaban --}}
                <div class="mb-4">
                    <label for="answer_type" class="block text-sm font-medium text-gray-700">Tipe Jawaban</label>
                    <select name="answer_type" id="answer_type"
                        class="mt-1 w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-200 focus:outline-none"
                        onchange="toggleOptionsSection(this.value)">
                        <option value="text" {{ $question->options->count() === 0 ? 'selected' : '' }}>Text (Jawaban Bebas)</option>
                        <option value="dropdown" {{ $question->options->count() > 0 ? 'selected' : '' }}>Dropdown (Pilihan)</option>
                    </select>
                </div>

                {{-- Opsi Jawaban (untuk dropdown) --}}
                <div id="options_section" class="mb-4 {{ $question->options->count() === 0 ? 'hidden' : '' }}">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Opsi Jawaban</label>
                    <div id="options_container">
                        @if($question->options->count() > 0)
                            @foreach($question->options as $option)
                                <div class="option-row flex gap-2 mb-2">
                                    <input type="text" name="options[]"
                                        class="flex-1 border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-200 focus:outline-none"
                                        placeholder="Masukkan opsi jawaban"
                                        value="{{ $option->option_text }}">
                                    <button type="button" onclick="removeOption(this)"
                                        class="bg-red-500 text-white px-3 py-2 rounded hover:bg-red-600">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                </div>
                            @endforeach
                        @else
                            <div class="option-row flex gap-2 mb-2">
                                <input type="text" name="options[]"
                                    class="flex-1 border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-200 focus:outline-none"
                                    placeholder="Masukkan opsi jawaban">
                                <button type="button" onclick="removeOption(this)"
                                    class="bg-red-500 text-white px-3 py-2 rounded hover:bg-red-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>
                        @endif
                    </div>
                    <button type="button" onclick="addOption()"
                        class="mt-2 bg-gray-100 text-gray-700 px-4 py-2 rounded hover:bg-gray-200 text-sm">
                        + Tambah Opsi
                    </button>
                </div>

                {{-- Urutan --}}
                <div class="mb-4">
                    <label for="order" class="block text-sm font-medium text-gray-700">Urutan Tampil</label>
                    <input type="number" name="order" id="order" required min="0"
                        class="mt-1 w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-200 focus:outline-none"
                        value="{{ old('order', $question->order) }}">
                    @error('order')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Status --}}
                <div class="mb-4">
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="is_active" value="1" class="rounded border-gray-300 text-blue-600"
                            {{ old('is_active', $question->is_active) ? 'checked' : '' }}>
                        <span class="ml-2 text-sm text-gray-700">Aktif</span>
                    </label>
                </div>

                {{-- Tombol --}}
                <div class="flex justify-end gap-2">
                    <a href="{{ route('admin.feedback.questions.index') }}"
                        class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded text-sm">
                        Batal
                    </a>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded text-sm">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
    <script>
        function toggleOptionsSection(value) {
            const optionsSection = document.getElementById('options_section');
            optionsSection.classList.toggle('hidden', value !== 'dropdown');
        }

        function addOption() {
            const container = document.getElementById('options_container');
            const newRow = document.createElement('div');
            newRow.className = 'option-row flex gap-2 mb-2';
            newRow.innerHTML = `
                <input type="text" name="options[]"
                    class="flex-1 border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-200 focus:outline-none"
                    placeholder="Masukkan opsi jawaban">
                <button type="button" onclick="removeOption(this)"
                    class="bg-red-500 text-white px-3 py-2 rounded hover:bg-red-600">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            `;
            container.appendChild(newRow);
        }

        function removeOption(button) {
            const row = button.closest('.option-row');
            if (document.querySelectorAll('.option-row').length > 1) {
                row.remove();
            }
        }
    </script>
    @endpush
@endsection
