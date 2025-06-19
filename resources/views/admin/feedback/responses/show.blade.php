    @extends('layouts.app')

    @section('content')
        <div class="p-6">
            <div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg p-6">
                <h2 class="text-xl font-semibold mb-6 text-gray-800">Detail Respon Feedback</h2>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">ID Respon</label>
                    <p class="text-sm text-gray-900">{{ $response->id }}</p>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">IP Address</label>
                    <p class="text-sm text-gray-900">{{ $response->ip_address }}</p>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Respon</label>
                    <p class="text-sm text-gray-900">{{ $response->created_at->format('d/m/Y H:i') }}</p>
                </div>
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Jawaban</label>
                    <div class="space-y-4">
                        @foreach ($response->answers as $answer)
                            <div class="p-4 bg-gray-50 rounded-md">
                                <h3 class="text-sm font-medium text-gray-800 mb-2">{{ $answer->question->question_text }}
                                </h3>
                                <p class="text-sm text-gray-700">{{ $answer->answer_text }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="flex justify-end">
                    <a href="{{ route('admin.feedback.responses.index') }}"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors duration-150">
                        Kembali ke Daftar Respon
                    </a>
                </div>
            </div>
        </div>
    @endsection
