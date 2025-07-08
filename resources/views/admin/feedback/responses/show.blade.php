<x-layouts.admin title="Detail Respon Feedback" subtitle="Lihat detail jawaban feedback pengguna">

    {{-- Breadcrumb --}}
    <x-main.layouts.breadcrumb :items="[
        ['title' => 'Feedback', 'url' => route('admin.feedback.responses.index')],
        ['title' => 'Detail Respon'],
    ]" />

    {{-- Main Content --}}
    <x-main.cards.content-card>
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50 flex items-center justify-between">
            <div>
                <h3 class="text-lg font-semibold text-gray-900">Detail Respon Feedback</h3>
                <p class="text-sm text-gray-600">Lihat detail jawaban dari respon feedback pengguna</p>
            </div>
        </div>

        <div class="p-6 max-w-2xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">ID Respon</label>
                    <p class="text-sm text-gray-900">{{ $response->id }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">IP Address</label>
                    <p class="text-sm text-gray-900">{{ $response->ip_address }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Respon</label>
                    <p class="text-sm text-gray-900">{{ $response->created_at->format('d/m/Y H:i') }}</p>
                </div>
            </div>

            <div class="mb-8">
                <label class="block text-sm font-medium text-gray-700 mb-2">Jawaban</label>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200" id="answersTabel">
                        <thead class="bg-gray-50">
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Pertanyaan</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Jawaban</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($response->answers as $answer)
                                <tr>
                                    <td class="px-6 py-4 text-sm text-gray-800">{{ $answer->question->question_text }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-700">{{ $answer->answer_text }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="flex justify-end">
                <a href="{{ route('admin.feedback.responses.index') }}"
                    class="inline-flex items-center px-6 py-3 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors duration-200">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    Kembali ke Daftar Respon
                </a>
            </div>
        </div>
    </x-main.cards.content-card>

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#answersTabel').DataTable({
                    paging: false,
                    searching: false,
                    info: false,
                    ordering: false
                });
            });
        </script>
    @endpush

</x-layouts.admin>
