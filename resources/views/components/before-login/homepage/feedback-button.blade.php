<div class="feedback-fab-vertical shadow-lg" onclick="openFeedbackModal()" title="{{ $buttonTitle ?? 'Kirim Feedback' }}">
    <span class="icon">
        <i class="{{ $buttonIcon ?? 'fas fa-comment-dots' }}"></i>
    </span>
    <span class="feedback-label">{{ $buttonLabel ?? 'Feedback' }}</span>
</div>

<!-- Modal -->
<div id="feedback-modal" class="fixed inset-0 flex items-center justify-center feedback-modal-bg z-50 hidden">
    <div class="bg-gradient-to-br from-white via-cyan-50 to-sky-100 rounded-3xl shadow-2xl max-w-lg w-full mx-4 p-0 relative feedback-modal-anim border-2 border-sky-200 overflow-hidden">
        <!-- Header -->
        <div class="flex items-center justify-between px-8 py-6 bg-gradient-to-r from-sky-500 to-cyan-500">
            <div class="flex items-center gap-3">
                <img src="{{ $logoUrl ?? asset('assets/images/bmkg-logo-2.png') }}" alt="BMKG Logo" class="w-18 h-12 rounded-full">
                <div>
                    <div class="font-bold text-white text-lg leading-tight">{{ $modalTitle ?? 'Feedback BMKG Riau' }}</div>
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
            <form id="feedback-form" class="space-y-5">
                <div>
                    <label class="block font-semibold mb-1 text-sky-700">{{ $question1Label ?? 'Apa tujuan utama Anda mengunjungi laman Stasiun Klimatologi Riau hari ini?' }}<span class="text-red-500">*</span></label>
                    <div class="flex items-center gap-2">
                        <input type="text" required class="flex-1 border border-sky-200 rounded-lg px-4 py-2 mt-1 focus:ring-2 focus:ring-sky-400 focus:outline-none bg-white shadow-sm" placeholder="{{ $question1Placeholder ?? 'Tuliskan tujuan disini' }}" name="tujuan">
                        <i class="{{ $question1Icon ?? 'fas fa-bullseye text-sky-400 text-lg' }}"></i>
                    </div>
                </div>
                <div>
                    <label class="block font-semibold mb-1 text-sky-700">{{ $question2Label ?? 'Apakah Anda berhasil menemukan data atau informasi yang Anda cari?' }}<span class="text-red-500">*</span></label>
                    <div class="flex items-center gap-2">
                        <input type="text" required class="flex-1 border border-sky-200 rounded-lg px-4 py-2 mt-1 focus:ring-2 focus:ring-sky-400 focus:outline-none bg-white shadow-sm" placeholder="{{ $question2Placeholder ?? 'Tuliskan jawaban disini' }}" name="hasil">
                        <i class="{{ $question2Icon ?? 'fas fa-search text-cyan-400 text-lg' }}"></i>
                    </div>
                </div>
                <div>
                    <label class="block font-semibold mb-1 text-sky-700">{{ $question3Label ?? 'Saran & masukan untuk Stasiun Klimatologi Riau agar lebih baik:' }}</label>
                    <div class="flex items-start gap-2">
                        <textarea class="flex-1 border border-sky-200 rounded-lg px-4 py-2 mt-1 focus:ring-2 focus:ring-sky-400 focus:outline-none resize-none bg-white shadow-sm" rows="3" placeholder="{{ $question3Placeholder ?? 'Tuliskan saran atau kendala disini' }}" name="saran"></textarea>
                        <i class="{{ $question3Icon ?? 'fas fa-lightbulb text-yellow-400 text-xl mt-2' }}"></i>
                    </div>
                </div>
                <button type="submit" class="w-full mt-2 bg-gradient-to-r from-sky-500 to-cyan-500 hover:from-sky-600 hover:to-cyan-600 text-white font-bold rounded-full py-3 transition-all duration-200 text-lg shadow flex items-center justify-center gap-2">
                    <i class="{{ $submitIcon ?? 'fas fa-paper-plane' }}"></i> {{ $submitLabel ?? 'Kirim Feedback' }}
                </button>
            </form>
        </div>
    </div>
</div>
<!-- JS sudah dipindahkan ke resources/js/app.js -->
