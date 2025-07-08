<a href="{{ $link }}" target="_blank" rel="noopener" class="bg-white rounded-3xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden flex flex-col cursor-pointer hover:scale-105 h-full block">
    <div class="relative overflow-hidden bg-gray-100">
        <img src="{{ $image }}" alt="Buletin Thumbnail" class="w-full h-auto">
        <div class="absolute inset-0 bg-gradient-to-t from-black/10 to-transparent pointer-events-none"></div>
    </div>
    <div class="p-5 flex flex-col flex-1">
        <span class="text-stone-500 text-sm font-semibold font-montserrat mb-2">{{ $edisi }}</span>
        <h3 class="text-black text-xl font-semibold font-montserrat mb-4 line-clamp-2">{{ $judul }}</h3>
        <div class="flex-grow"></div>
        <div class="text-black text-sm font-semibold font-montserrat mb-1">{{ $penulis }}</div>
        <div class="text-stone-500 text-xs font-semibold font-montserrat">{{ $tanggal }}</div>
    </div>
</a>
