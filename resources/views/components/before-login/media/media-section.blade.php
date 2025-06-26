<!-- Media Section Component -->
<section class="w-full py-8 md:py-12 lg:py-14 mb-6 bg-gray-50 media-section">
  <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-16">

    <!-- Mobile Layout (Vertical Stack) -->
    <div class="block md:hidden">

      <!-- Featured Media Card (Square-ish) -->
      <div class="relative h-48 rounded-xl overflow-hidden shadow-lg mb-4">
        <img
          src="assets/images/mediaa.png"
          alt="Featured Media Background"
          class="w-full h-full object-cover"
        >
        <div class="absolute inset-0 bg-gradient-to-br from-black/60 to-black/40"></div>
        <div class="absolute inset-0 flex flex-col justify-center items-start p-4">
          <h1 class="text-white text-lg font-bold font-montserrat leading-tight mb-2">
            Media Stasiun Klimatologi Riau
          </h1>
          <p class="text-white text-xs font-normal font-montserrat leading-relaxed">
            Informasi seputar Stasiun Klimatologi Riau
          </p>
        </div>
      </div>

      <!-- Vertical Stack of 3 Cards -->
      <div class="space-y-3">

        <!-- Artikel Card -->
        <a href="/artikel"
           class="relative h-16 rounded-lg overflow-hidden cursor-pointer media-card group transition-all duration-300 hover:transform hover:scale-105 shadow-md block"
           data-media-type="Artikel">
          <img
            src="assets/images/artikel.png"
            alt="Artikel Background"
            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
          >
          <div class="absolute inset-0 bg-gradient-to-br from-black/60 to-black/40 group-hover:from-black/70 group-hover:to-black/50 transition-all duration-300"></div>
          <div class="absolute inset-0 flex items-center justify-center">
            <h3 class="text-white text-sm font-bold font-montserrat text-center">
              Artikel
            </h3>
          </div>
        </a>

        <!-- Berita Card -->
        <a href="/berita"
           class="relative h-16 rounded-lg overflow-hidden cursor-pointer media-card group transition-all duration-300 hover:transform hover:scale-105 shadow-md block"
           data-media-type="Berita">
          <img
            src="assets/images/berita.png"
            alt="Berita Background"
            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
          >
          <div class="absolute inset-0 bg-gradient-to-br from-black/60 to-black/40 group-hover:from-black/70 group-hover:to-black/50 transition-all duration-300"></div>
          <div class="absolute inset-0 flex items-center justify-center">
            <h3 class="text-white text-sm font-bold font-montserrat text-center">
              Berita
            </h3>
          </div>
        </a>

        <!-- Buletin Card -->
        <a href="/buletin"
           class="relative h-16 rounded-lg overflow-hidden cursor-pointer media-card group transition-all duration-300 hover:transform hover:scale-105 shadow-md block"
           data-media-type="Buletin">
          <img
            src="assets/images/buletin.png"
            alt="Buletin Background"
            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
          >
          <div class="absolute inset-0 bg-gradient-to-br from-black/60 to-black/40 group-hover:from-black/70 group-hover:to-black/50 transition-all duration-300"></div>
          <div class="absolute inset-0 flex items-center justify-center">
            <h3 class="text-white text-sm font-bold font-montserrat text-center">
              Buletin
            </h3>
          </div>
        </a>

      </div>

    </div>

    <!-- Tablet Layout -->
    <div class="hidden md:block lg:hidden">
      <div class="space-y-6">

        <!-- Featured Media Card -->
        <div class="relative h-64 rounded-2xl overflow-hidden shadow-lg">
          <img
            src="assets/images/mediaa.png"
            alt="Featured Media Background"
            class="w-full h-full object-cover"
          >
          <div class="absolute inset-0 bg-gradient-to-br from-black/60 to-black/40"></div>
          <div class="absolute inset-0 flex flex-col justify-center items-start p-8">
            <h1 class="text-white text-2xl font-bold font-montserrat leading-tight mb-3">
              Media Stasiun Klimatologi Riau
            </h1>
            <p class="text-white text-base font-normal font-montserrat leading-relaxed">
              Tempat kamu untuk mencari informasi seputar Stasiun Klimatologi Riau
            </p>
          </div>
        </div>

        <!-- Media Cards Grid -->
        <div class="grid grid-cols-3 gap-4">

          <!-- Artikel Card -->
          <a href="/artikel"
             class="relative h-48 rounded-xl overflow-hidden cursor-pointer media-card group transition-all duration-300 hover:transform hover:scale-105 hover:shadow-xl shadow-md block"
             data-media-type="Artikel">
            <img
              src="assets/images/artikel.png"
              alt="Artikel Background"
              class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
            >
            <div class="absolute inset-0 bg-gradient-to-br from-black/60 to-black/40 group-hover:from-black/70 group-hover:to-black/50 transition-all duration-300"></div>
            <div class="absolute inset-0 flex items-center justify-center">
              <div class="text-center">
                <h3 class="text-white text-xl font-bold font-montserrat group-hover:scale-105 transition-transform duration-300">
                  Artikel
                </h3>
              </div>
            </div>
          </a>

          <!-- Berita Card -->
          <a href="/berita"
             class="relative h-48 rounded-xl overflow-hidden cursor-pointer media-card group transition-all duration-300 hover:transform hover:scale-105 hover:shadow-xl shadow-md block"
             data-media-type="Berita">
            <img
              src="assets/images/berita.png"
              alt="Berita Background"
              class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
            >
            <div class="absolute inset-0 bg-gradient-to-br from-black/60 to-black/40 group-hover:from-black/70 group-hover:to-black/50 transition-all duration-300"></div>
            <div class="absolute inset-0 flex items-center justify-center">
              <div class="text-center">
                <h3 class="text-white text-xl font-bold font-montserrat group-hover:scale-105 transition-transform duration-300">
                  Berita
                </h3>
              </div>
            </div>
          </a>

          <!-- Buletin Card -->
          <a href="/buletin"
             class="relative h-48 rounded-xl overflow-hidden cursor-pointer media-card group transition-all duration-300 hover:transform hover:scale-105 hover:shadow-xl shadow-md block"
             data-media-type="Buletin">
            <img
              src="assets/images/buletin.png"
              alt="Buletin Background"
              class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
            >
            <div class="absolute inset-0 bg-gradient-to-br from-black/60 to-black/40 group-hover:from-black/70 group-hover:to-black/50 transition-all duration-300"></div>
            <div class="absolute inset-0 flex items-center justify-center">
              <div class="text-center">
                <h3 class="text-white text-xl font-bold font-montserrat group-hover:scale-105 transition-transform duration-300">
                  Buletin
                </h3>
              </div>
            </div>
          </a>

        </div>

      </div>
    </div>

    <!-- Desktop Layout (Original design for large screens) -->
    <div class="hidden lg:block">
      <div class="grid grid-cols-12 gap-6 h-[575px]">

        <!-- Featured Media Card (Left Side - Spans 8 columns) -->
        <div class="col-span-8 relative rounded-2xl overflow-hidden shadow-lg">
          <img
            src="assets/images/mediaa.png"
            alt="Featured Media Background"
            class="w-full h-full object-cover"
          >
          <div class="absolute inset-0 bg-gradient-to-br from-black/60 to-black/40"></div>
          <div class="absolute inset-0 flex flex-col justify-center items-start p-12">
            <h1 class="text-white text-4xl font-bold font-montserrat leading-tight mb-4">
              Media Stasiun Klimatologi Riau
            </h1>
            <p class="text-white text-2xl font-normal font-montserrat leading-relaxed max-w-[592px]"
               style="text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.10);">
              Tempat kamu untuk mencari informasi seputar Stasiun Klimatologi Riau
            </p>
          </div>
        </div>

        <!-- Right Side Cards (Spans 4 columns) -->
        <div class="col-span-4 flex flex-col gap-6">

          <!-- Artikel Card -->
          <a href="/artikel"
             class="relative flex-1 rounded-2xl overflow-hidden cursor-pointer media-card group transition-all duration-300 hover:transform hover:scale-105 hover:shadow-xl shadow-md block"
             data-media-type="Artikel">
            <img
              src="assets/images/artikel.png"
              alt="Artikel Background"
              class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
            >
            <div class="absolute inset-0 bg-gradient-to-br from-black/60 to-black/40 group-hover:from-black/70 group-hover:to-black/50 transition-all duration-300"></div>
            <div class="absolute inset-0 flex items-center justify-center">
              <div class="text-center">
                <h3 class="text-white text-4xl font-bold font-montserrat group-hover:scale-105 transition-transform duration-300">
                  Artikel
                </h3>
                <div class="mt-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                  <span class="text-white/90 text-sm">Klik untuk membaca artikel</span>
                </div>
              </div>
            </div>
          </a>

          <!-- Berita Card -->
          <a href="/berita"
             class="relative flex-1 rounded-2xl overflow-hidden cursor-pointer media-card group transition-all duration-300 hover:transform hover:scale-105 hover:shadow-xl shadow-md block"
             data-media-type="Berita">
            <img
              src="assets/images/berita.png"
              alt="Berita Background"
              class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
            >
            <div class="absolute inset-0 bg-gradient-to-br from-black/60 to-black/40 group-hover:from-black/70 group-hover:to-black/50 transition-all duration-300"></div>
            <div class="absolute inset-0 flex items-center justify-center">
              <div class="text-center">
                <h3 class="text-white text-4xl font-bold font-montserrat group-hover:scale-105 transition-transform duration-300">
                  Berita
                </h3>
                <div class="mt-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                  <span class="text-white/90 text-sm">Klik untuk membaca berita</span>
                </div>
              </div>
            </div>
          </a>

          <!-- Buletin Card -->
          <a href="/buletin"
             class="relative flex-1 rounded-2xl overflow-hidden cursor-pointer media-card group transition-all duration-300 hover:transform hover:scale-105 hover:shadow-xl shadow-md block"
             data-media-type="Buletin">
            <img
              src="assets/images/buletin.png"
              alt="Buletin Background"
              class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
            >
            <div class="absolute inset-0 bg-gradient-to-br from-black/60 to-black/40 group-hover:from-black/70 group-hover:to-black/50 transition-all duration-300"></div>
            <div class="absolute inset-0 flex items-center justify-center">
              <div class="text-center">
                <h3 class="text-white text-4xl font-bold font-montserrat group-hover:scale-105 transition-transform duration-300">
                  Buletin
                </h3>
                <div class="mt-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                  <span class="text-white/90 text-sm">Klik untuk unduh buletin</span>
                </div>
              </div>
            </div>
          </a>

        </div>

      </div>
    </div>

  </div>
</section>
