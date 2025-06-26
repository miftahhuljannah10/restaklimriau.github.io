<!-- Produk Card Component Dinamis -->
<div class="group cursor-pointer rounded-xl shadow-md hover:shadow-lg transition-all duration-500 overflow-hidden transform hover:-translate-y-2 border border-gray-200 relative bg-white font-montserrat h-full flex flex-col">
    <div class="h-48 flex items-center justify-center relative overflow-hidden">
        <img src="{{ $image }}" alt="Iklim Terapan" class="w-86 h-86 object-contain transform group-hover:scale-105 transition-all duration-500 relative z-10">
    </div>
    <div class="p-4 text-center flex-1 flex flex-col justify-between">
        <h3 class="text-lg font-bold text-gray-900 group-hover:text-sky-600 transition-all duration-300 mb-2 min-h-[56px] flex items-center justify-center">
            {{ $title ?? 'Judul Produk' }}
        </h3>
        <div class="flex flex-col items-start text-sm text-gray-600 gap-1 mt-auto">
            <div class="flex items-center gap-1">
                <i class="fa fa-list"></i> {{ $category ?? 'Kategori' }}
            </div>
            <div class="flex items-center gap-1">
                <i class="fa fa-user"></i> {{ $instansi ?? 'Instansi' }}
            </div>
        </div>
    </div>
</div>
