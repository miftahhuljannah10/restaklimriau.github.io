<!-- Artikel Detail Header Component Dinamis -->
<section class="w-full py-8 bg-white">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Back Button -->
        <div class="mb-6">
            <button onclick="history.back()" class="inline-flex items-center gap-2 text-sky-500 hover:text-sky-600 transition-colors">
                <i class="fas fa-arrow-left"></i>
                <span class="font-medium font-montserrat">Kembali</span>
            </button>
        </div>

        <!-- Article Title Dinamis -->
        <div class="mb-6">
            <h1 class="text-gray-800 text-3xl md:text-4xl text-justify font-bold font-montserrat leading-tight">
                {{ $title ?? '' }}
            </h1>
        </div>

        <!-- Article Meta Dinamis -->
        <div class="flex flex-wrap items-center gap-6 text-sm">
            <div class="flex items-center gap-2">
                <i class="fas fa-calendar-alt text-gray-600"></i>
                <span class="text-gray-600 font-semibold font-montserrat">{{ $date ?? '' }}</span>
            </div>
            <div class="flex items-center gap-2">
                <i class="fas fa-user text-gray-600"></i>
                <span class="text-gray-600 font-bold font-montserrat">{{ $author ?? '' }}</span>
            </div>
            <div class="flex items-center gap-2">
                <i class="fas fa-tag text-gray-600"></i>
                <span class="text-gray-600 font-bold font-montserrat">{{ $category ?? '' }}</span>
            </div>
        </div>
    </div>
</section>
