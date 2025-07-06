<!-- Products Grid Section Dinamis -->
<section class="w-full bg-gradient-to-br from-slate-50 via-blue-50/30 py-10 mb-8 relative overflow-hidden">
  <div class="max-w-[1440px] mx-auto px-4 lg:px-10 relative z-10">
    <!-- Enhanced Title Section -->
    <div class="text-center mb-10">
      <div class="relative inline-block">
        <h1 class="text-3xl lg:text-3xl font-bold gradient-text mb-4 relative">
          Jenis Produk
        </h1>
      </div>
    </div>

    <!-- Enhanced Products Grid Dinamis -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-8">
      @foreach($produkList as $produk)
        <div class="group cursor-pointer rounded-xl shadow-md hover:shadow-lg transition-all duration-500 overflow-hidden transform hover:-translate-y-2 border border-gray-200 relative bg-white"
             onclick="window.location.href='{{ $produk['url'] }}'">
          <div class="h-48 flex items-center justify-center relative overflow-hidden">
            <img src="{{ $produk['image'] }}" alt="{{ $produk['title'] }}" class="w-86 h-86 object-contain transform group-hover:scale-105 transition-all duration-500 relative z-10">
          </div>
          <div class="p-4 text-center relative">
            <h3 class="text-xl font-bold text-gray-900 group-hover:text-sky-600 transition-all duration-300">
              {{ $produk['title'] }}
            </h3>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
