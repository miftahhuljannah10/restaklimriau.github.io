<!-- Related News Component Dinamis -->
<section class="w-full py-10 bg-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="flex justify-between items-center mb-8">
            <h2 class="gradient-text text-3xl font-bold font-montserrat">Berita Utama Lainnya</h2>
            <a href="/berita" class="inline-flex items-center gap-2 text-sky-500 hover:text-sky-600 transition-colors">
                <span class="text-sm font-medium font-montserrat">Lihat Semuanya</span>
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
        <!-- Related News Grid Dinamis -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
            @foreach(($related ?? []) as $item)
            <article class="bg-white rounded-3xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden h-full flex flex-col cursor-pointer hover:transform hover:scale-105" onclick="window.location.href='{{ $item['url'] ?? '#' }}'">
                <!-- Related News Image -->
                <div class="relative h-62 overflow-hidden bg-gray-100">
                    <img src="{{ $item['image'] ?? '' }}" alt="Related News Thumbnail" class="w-full h-full object-cover object-center">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/10 to-transparent"></div>
                </div>
                <!-- Related News Content -->
                <div class="p-5 flex flex-col flex-grow">
                    <!-- Category -->
                    <span class="text-stone-500 text-sm font-semibold font-montserrat mb-2">{{ $item['category'] ?? '' }}</span>
                    <!-- Title -->
                    <h3 class="text-black text-xl font-semibold font-montserrat mb-4 line-clamp-2">
                        {{ $item['title'] ?? '' }}
                    </h3>
                    <div class="flex-grow"></div>
                    <!-- Author -->
                    <div class="text-black text-sm font-semibold font-montserrat mb-1">
                        {{ $item['author'] ?? '' }}
                    </div>
                    <!-- Date -->
                    <div class="text-stone-500 text-xs font-semibold font-montserrat">
                        {{ $item['date'] ?? '' }}
                    </div>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>
