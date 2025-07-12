@extends('layouts.public')

@section('content')
    <div class="max-w-2xl mx-auto p-4">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <!-- Header Section -->
            <div class="bg-blue-600 p-4 text-center">
                <h1 class="text-lg font-semibold text-white">Bantu kami meningkatkan layanan dengan feedback Anda.</h1>
            </div>

            <!-- Success Message -->
            @if (session('success'))
                <div class="bg-green-50 border-l-4 border-green-500 p-4 mx-4 mt-4 rounded">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 text-green-500">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-green-700">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Form Section -->
            <form method="POST" action="{{ route('feedback.store') }}" class="p-5 space-y-4">
                @csrf

                @foreach ($questions as $question)
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            {{ $question->question_text }}
                            @if ($question->is_required)
                                <span class="text-red-500">*</span>
                            @endif
                        </label>

                        @if ($question->options->count() > 0)
                            <select id="question_{{ $question->id }}" name="answers[{{ $question->id }}]"
                                class="w-full px-3 py-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500"
                                @if ($question->is_required) required @endif>
                                <option value="" disabled selected>-- Pilih jawaban --</option>
                                @foreach ($question->options as $option)
                                    <option value="{{ $option->option_text }}">{{ $option->option_text }}</option>
                                @endforeach
                            </select>
                        @else
                            <textarea id="question_{{ $question->id }}" name="answers[{{ $question->id }}]" rows="2"
                                placeholder="Tuliskan jawaban Anda..."
                                class="w-full px-3 py-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500"
                                @if ($question->is_required) required @endif></textarea>
                        @endif

                        @error('answers.' . $question->id)
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                @endforeach

                <!-- Submit Button -->
                <div class="pt-2">
                    <button type="submit"
                        class="w-full py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md text-sm transition duration-150">
                        Kirim
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
