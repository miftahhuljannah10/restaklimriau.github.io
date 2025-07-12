<x-layouts.admin>
    <x-slot name="title">Detail Respon Feedback</x-slot>

    <!-- Breadcrumb -->
    <x-main.layouts.breadcrumb :items="[
        ['title' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['title' => 'Feedback Responses', 'url' => route('admin.feedback.responses.index')],
        ['title' => 'Detail'],
    ]" />

    <!-- Main Content -->
    <x-main.cards.content-card title="Detail Respon Feedback">
        <x-slot name="header-actions">
            <x-main.buttons.action-button href="{{ route('admin.feedback.responses.index') }}" variant="secondary"
                size="sm">
                Kembali
            </x-main.buttons.action-button>
        </x-slot>

        <!-- Response Profile Section -->
        <div class="bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg p-6 mb-6 text-white">
            <div class="flex items-start space-x-6">
                <div class="flex-shrink-0">
                    <div class="w-16 h-16 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                </div>
                <div class="flex-1">
                    <h2 class="text-2xl font-bold mb-2">Respon Feedback #{{ $response->id }}</h2>
                    <p class="text-blue-100 mb-4">Detail lengkap dari respon feedback pengguna</p>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <p class="text-blue-200 text-sm">IP Address</p>
                            <p class="text-white font-semibold">{{ $response->ip_address }}</p>
                        </div>
                        <div>
                            <p class="text-blue-200 text-sm">Tanggal Respon</p>
                            <p class="text-white font-semibold">{{ $response->created_at->format('d/m/Y H:i') }}</p>
                        </div>
                        <div>
                            <p class="text-blue-200 text-sm">Total Jawaban</p>
                            <p class="text-white font-semibold">{{ $response->answers->count() }} jawaban</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Answers Section -->
        <div class="bg-green-50 rounded-lg p-6">
            <h3 class="text-lg font-semibold text-green-800 mb-4 flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Jawaban Feedback
            </h3>

            <div class="space-y-4">
                @forelse ($response->answers as $answer)
                    <div class="bg-white rounded-lg border border-green-200 p-4">
                        <div class="mb-2">
                            <label class="block text-sm font-medium text-green-700">Pertanyaan:</label>
                            <p class="text-gray-900 mt-1">{{ $answer->question->question_text }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-green-700">Jawaban:</label>
                            <p class="text-gray-700 mt-1 bg-gray-50 rounded p-3">{{ $answer->answer_text }}</p>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-8 text-gray-500">
                        <svg class="w-12 h-12 mx-auto mb-4 text-gray-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                        </svg>
                        <p>Tidak ada jawaban ditemukan</p>
                    </div>
                @endforelse
            </div>
        </div>
    </x-main.cards.content-card>

    @push('scripts')
        <script>
            $(document).ready(function() {
                // Optional: Add any specific functionality for the show page
                console.log('Feedback response detail page loaded');
            });
        </script>
    @endpush

</x-layouts.admin>
