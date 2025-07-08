<!-- Berita Detail Content Component Dinamis -->
<section class="w-full py-4 bg-white">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Featured Image Dinamis -->
        <div class="mb-12">
            <img
                src="{{ $image ?? '' }}"
                alt="{{ $title ?? 'Gambar Berita' }}"
                class="w-full object-contain rounded-xl shadow-lg"
            >
        </div>

        <!-- Article Content Dinamis -->
        <div class="prose prose-lg max-w-none text-justify">
            <div class="space-y-6 text-gray-700 text-base font-normal font-montserrat leading-loose">
                {!! $content ?? '' !!}
            </div>
        </div>

        <!-- Photo Gallery Dinamis -->
        @if(!empty($gallery) && is_array($gallery))
        <div class="mt-12">
            <h2 class="text-gray-800 text-2xl font-bold font-montserrat mb-6">Galeri Foto</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                @foreach($gallery as $img)
                <div class="aspect-video bg-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition-shadow cursor-pointer">
                    <img src="{{ $img }}" alt="Galeri Foto" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</section>
