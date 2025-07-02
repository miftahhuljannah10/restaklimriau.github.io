<!-- Informasi Hari Ini Section Dinamis -->
<div class="w-full py-12 bg-white">
  <div class="max-w-[1441px] mx-auto px-4 sm:px-6 md:px-8 lg:px-[120px]">
    <!-- Section Title -->
    <div class="mb-8 md:mb-8">
      <h2 class="gradient-text text-2xl sm:text-3xl font-bold font-montserrat">
        {{ $title ?? 'Informasi Hari Ini' }}
      </h2>
    </div>

    <!-- Weather Alert Card Container -->
    <div class="w-full">
      <div class="w-full py-px bg-amber-500/30 rounded-2xl outline outline-1 outline-offset-[-1px] outline-amber-500 flex flex-col sm:flex-row items-start sm:items-center">
        <div class="w-full relative p-4 sm:p-5 md:p-6">
          <!-- Warning Icon - Mobile: Top Center, Desktop: Left Side -->
          <div class="flex sm:hidden justify-center w-full mb-3">
            @if(isset($icon) && str_contains($icon, 'fa-'))
              <i class="{{ $icon }} w-8 h-8"></i>
            @else
              <img src="{{ $icon ?? asset('assets/images/ikon-warning.png') }}" alt="Warning Icon" class="w-8 h-8" />
            @endif
          </div>

          <div class="hidden sm:block absolute left-6 top-1/2 transform -translate-y-1/2">
            @if(isset($icon) && str_contains($icon, 'fa-'))
              <i class="{{ $icon }} w-8 h-8"></i>
            @else
              <img src="{{ $icon ?? asset('assets/images/ikon-warning.png') }}" alt="Warning Icon" class="w-8 h-8" />
            @endif
          </div>

          <!-- Content Container with proper padding for icon -->
          <div class="w-full sm:pl-16">
            <!-- Title -->
            <div class="text-center sm:text-left mb-2 sm:mb-3">
              <h3 class="text-black text-lg font-semibold font-montserrat leading-7">
                {{ $alertTitle ?? 'Peringatan Dini Cuaca Pekanbaru' }}
              </h3>
            </div>

            <!-- Description -->
            <div class="text-center sm:text-left">
              <span class="text-slate-600 text-sm font-medium font-montserrat leading-snug">
                {{ $alertDesc ?? 'Beberapa wilayah masih berpotensi terjadi hujan dengan intensitas sedang hingga lebat yang dapat disertai kilat/petir dan angin kencang pada 1 Juni 2025 pukul 17.30 WIB. Diperkirakan masih dapat berlangsung hingga 11 Apr 2025 pukul 19.30 WIB.' }}
              </span>
              @if(!empty($alertLink))
                <a href="{{ $alertLink }}" class="text-sky-500 hover:text-sky-600 transition-colors text-sm font-normal font-montserrat leading-snug" target="_blank" rel="noopener">
                  Selengkapnya →
                </a>
              @else
                <a href="#" class="text-sky-500 hover:text-sky-600 transition-colors text-sm font-normal font-montserrat leading-snug">
                  Selengkapnya →
                </a>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
