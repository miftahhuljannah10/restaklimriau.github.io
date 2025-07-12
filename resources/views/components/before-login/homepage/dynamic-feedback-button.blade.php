<div class="feedback-fab-vertical shadow-lg" onclick="openFeedbackModal()" title="{{ $buttonTitle ?? 'Kirim Feedback' }}">
    <span class="icon">
        <i class="{{ $buttonIcon ?? 'fas fa-comment-dots' }}"></i>
    </span>
    <span class="feedback-label">{{ $buttonLabel ?? 'Feedback' }}</span>
</div>

<!-- Modal -->
<div id="feedback-modal" class="fixed inset-0 flex items-center justify-center feedback-modal-bg z-50 hidden">
    <div
        class="bg-gradient-to-br from-white via-cyan-50 to-sky-100 rounded-3xl shadow-2xl max-w-lg w-full mx-4 p-0 relative feedback-modal-anim border-2 border-sky-200 overflow-hidden">
        <!-- Header -->
        <div class="flex items-center justify-between px-8 py-6 bg-gradient-to-r from-sky-500 to-cyan-500">
            <div class="flex items-center gap-3">
                <img src="{{ $logoUrl ?? asset('assets/images/bmkg-logo-2.png') }}" alt="BMKG Logo"
                    class="w-18 h-12 rounded-full">
                <div>
                    <div class="font-bold text-white text-lg leading-tight">{{ $modalTitle ?? 'Feedback BMKG Riau' }}
                    </div>
                    <div class="text-xs text-cyan-100">{{ $modalSubtitle ?? 'Bantu kami jadi lebih baik!' }}</div>
                </div>
            </div>
            <button onclick="closeFeedbackModal()" class="text-2xl text-white hover:text-red-200 focus:outline-none">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <!-- Content -->
        <div class="px-8 py-7">
            <div class="mb-6 text-center text-sky-800 font-semibold text-xl">
                {{ $introText ?? 'Kami ingin mendengar pengalaman dan saran Anda!' }}
            </div>

            @if ($questions && $questions->count() > 0)
                <form id="feedback-form" action="{{ route('feedback.store') }}" method="POST" class="space-y-5">
                    @csrf
                    @foreach ($questions as $question)
                        <div>
                            <label class="block font-semibold mb-1 text-sky-700">
                                {{ $question->question_text }}
                                @if ($loop->index < 2)
                                    <span class="text-red-500">*</span>
                                @endif
                            </label>

                            @if ($question->hasOptions())
                                <!-- Dropdown question -->
                                <div class="flex items-center gap-2">
                                    <select name="answers[{{ $question->id }}]"
                                        class="flex-1 border border-sky-200 rounded-lg px-4 py-2 mt-1 focus:ring-2 focus:ring-sky-400 focus:outline-none bg-white shadow-sm"
                                        @if ($loop->index < 2) required @endif>
                                        <option value="">Pilih jawaban...</option>
                                        @foreach ($question->options as $option)
                                            <option value="{{ $option->option_text }}">{{ $option->option_text }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <i class="fas fa-list text-sky-400 text-lg"></i>
                                </div>
                            @else
                                <!-- Text question -->
                                <div class="flex items-start gap-2">
                                    @if ($loop->last)
                                        <textarea name="answers[{{ $question->id }}]"
                                            class="flex-1 border border-sky-200 rounded-lg px-4 py-2 mt-1 focus:ring-2 focus:ring-sky-400 focus:outline-none resize-none bg-white shadow-sm"
                                            rows="3" placeholder="Tuliskan jawaban Anda disini..." @if ($loop->index < 2) required @endif></textarea>
                                        <i class="fas fa-lightbulb text-yellow-400 text-xl mt-2"></i>
                                    @else
                                        <input type="text" name="answers[{{ $question->id }}]"
                                            class="flex-1 border border-sky-200 rounded-lg px-4 py-2 mt-1 focus:ring-2 focus:ring-sky-400 focus:outline-none bg-white shadow-sm"
                                            placeholder="Tuliskan jawaban Anda disini..."
                                            @if ($loop->index < 2) required @endif>
                                        <i
                                            class="fas fa-{{ $loop->first ? 'bullseye' : 'search' }} text-{{ $loop->first ? 'sky' : 'cyan' }}-400 text-lg"></i>
                                    @endif
                                </div>
                            @endif
                        </div>
                    @endforeach

                    <button type="submit"
                        class="w-full mt-2 bg-gradient-to-r from-sky-500 to-cyan-500 hover:from-sky-600 hover:to-cyan-600 text-white font-bold rounded-full py-3 transition-all duration-200 text-lg shadow flex items-center justify-center gap-2">
                        <i class="{{ $submitIcon ?? 'fas fa-paper-plane' }}"></i>
                        {{ $submitLabel ?? 'Kirim Feedback' }}
                    </button>
                </form>
            @else
                <!-- Fallback when no questions are available -->
                <div class="text-center text-gray-600">
                    <i class="fas fa-exclamation-circle text-4xl mb-4"></i>
                    <p>Saat ini tidak ada pertanyaan feedback yang tersedia.</p>
                </div>
            @endif
        </div>
    </div>
</div>

<script>
    function openFeedbackModal() {
        document.getElementById('feedback-modal').classList.remove('hidden');
    }

    function closeFeedbackModal() {
        document.getElementById('feedback-modal').classList.add('hidden');
    }

    // Handle form submission
    document.addEventListener('DOMContentLoaded', function() {
        const feedbackForm = document.getElementById('feedback-form');
        if (feedbackForm) {
            feedbackForm.addEventListener('submit', function(e) {
                e.preventDefault();

                const formData = new FormData(this);

                fetch(this.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('Terima kasih atas feedback Anda!');
                            closeFeedbackModal();
                            feedbackForm.reset();
                        } else {
                            alert('Terjadi kesalahan. Silakan coba lagi.');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Terjadi kesalahan. Silakan coba lagi.');
                    });
            });
        }
    });
</script>
