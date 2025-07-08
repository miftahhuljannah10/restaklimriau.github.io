<!-- Artikel Detail Content Component Dinamis -->
<section class="w-full py-4 bg-white">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Featured Image Dinamis -->
        <div class="mb-12">
            <img
                src="{{ $image ?? '' }}"
                alt="{{ $title ?? 'Gambar Artikel' }}"
                class="w-full object-contain rounded-xl shadow-lg"
            >
            @if(!empty($image_caption))
            <p class="text-sm text-gray-500 italic mt-2 text-center">
                {{ $image_caption }}
            </p>
            @endif
        </div>
        <!-- Article Content Dinamis -->
        <div class="prose prose-lg max-w-none text-justify">
            <!-- Abstract Dinamis -->
            @if(!empty($abstract))
            <div class="bg-blue-50 border-l-4 border-blue-500 p-6 rounded-r-lg mb-8">
                <h2 class="text-blue-800 font-bold font-montserrat mb-3">Abstrak</h2>
                <p class="text-blue-700 text-sm leading-relaxed">
                    {{ $abstract }}
                </p>
            </div>
            @endif
            <div class="space-y-6 text-gray-700 text-base font-normal font-montserrat leading-loose">
                {!! $content ?? '' !!}
            </div>
        </div>
    </div>
</section>
