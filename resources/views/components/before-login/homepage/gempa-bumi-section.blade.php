{{-- Komponen Gempa Bumi Terkini (Dinamis dari controller) --}}
{{-- Pastikan variabel $gempa dikirim dari controller --}}
<section class="relative mx-auto max-w-[1920px] overflow-hidden bg-[#F8FAFC]">
  <div class="absolute w-full h-full bg-[rgb(237,246,251)]/75"></div>
  <div class="mx-auto max-w-6xl relative py-10 lg:py-20 px-6 lg:px-10 xl:px-0">
    <div class="bg-white rounded-3xl shadow-[0px_8px_32px_0px_rgba(100,_116,_139,_0.06)]">
      <div class="px-6 lg:px-12 xl:px-14 py-6 md:py-10 xl:py-12 flex md:items-center items-start flex-col md:flex-row gap-6 lg:gap-10 xl:gap-16">
        <div class="relative w-full md:w-[360px] h-[320px] md:h-full bg-gray-100 rounded-2xl overflow-hidden shadow-[0px_8px_32px_0px_rgba(100,_116,_139,_0.12)] flex items-center justify-center">
          <a class="w-9 h-9 bg-[rgba(15,_23,_42,_0.16)] rounded-lg backdrop-blur-[8px] absolute top-4 right-4 p-2 cursor-pointer z-10" href="{{ $gempa['Shakemap'] }}" data-caption="Gempa Bumi Terkini" data-fancybox="gempa" aria-label="Perbesar Gambar">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" class="w-full object-cover text-white" alt=""><g fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"><path d="M6.466 1.668h.2a.833.833 0 0 1 0 1.667H6.5c-.714 0-1.2 0-1.574.03-.365.03-.552.085-.683.151-.313.16-.568.415-.728.729-.066.13-.12.317-.15.682-.031.375-.032.86-.032 1.574v.167a.833.833 0 1 1-1.666 0v-.201c0-.67 0-1.225.036-1.676.039-.468.12-.899.327-1.303.32-.627.83-1.137 1.457-1.457.404-.206.835-.288 1.303-.326.451-.037 1.005-.037 1.676-.037M2.5 12.501c.46 0 .833.373.833.834v.166c0 .714.001 1.2.032 1.574.03.366.084.553.15.683.16.314.415.569.728.728.13.067.318.12.683.15.375.031.86.032 1.574.032h.167a.833.833 0 0 1 0 1.667h-.201c-.671 0-1.225 0-1.676-.037-.468-.038-.899-.12-1.303-.327a3.33 3.33 0 0 1-1.457-1.456c-.206-.405-.288-.835-.327-1.304-.036-.45-.036-1.005-.036-1.675v-.201c0-.46.373-.834.833-.834M15.074 3.366c-.375-.03-.86-.031-1.574-.031h-.167a.833.833 0 0 1 0-1.667h.201c.671 0 1.225 0 1.676.037.468.038.899.12 1.303.326.627.32 1.137.83 1.457 1.457.206.404.288.835.327 1.303.036.451.036 1.005.036 1.676v.201a.833.833 0 1 1-1.666 0v-.167c0-.714-.001-1.199-.032-1.574-.03-.365-.084-.552-.15-.682a1.67 1.67 0 0 0-.728-.729c-.13-.066-.317-.12-.683-.15M17.5 12.501c.46 0 .833.373.833.834v.2c0 .672 0 1.225-.036 1.676-.039.469-.12.9-.327 1.304a3.33 3.33 0 0 1-1.457 1.456c-.404.206-.835.288-1.303.327-.451.037-1.005.037-1.676.037h-.2a.833.833 0 0 1 0-1.667h.166c.714 0 1.199 0 1.574-.031.366-.03.552-.084.683-.15.313-.16.568-.415.728-.729.066-.13.12-.317.15-.683.031-.375.032-.86.032-1.574v-.166c0-.46.373-.834.833-.834"></path></g></svg>
          </a>
          <img onerror="this.setAttribute('data-error', 1)" width="360" height="320" alt="Gempa Bumi Terkini" loading="lazy" class="w-full h-full object-cover rounded-2xl" src="{{ $gempa['Shakemap'] }}">
        </div>
        <div class="flex-1 min-w-0">
          <div class="flex items-center gap-2.5">
            <h1 class="text-2xl leading-[33px] md:text-[32px] md:leading-[48px] xl:text-[40px] xl:leading-[54px] font-bold gradient-text">Gempa Bumi Terkini</h1>
          </div>
          <p class="mt-2 text-sm leading-[22px] font-medium text-gray-600 primary">
            {{ $gempa['TanggalJamFormat'] }}
          </p>
          <div class="mt-6">
            <span class="bg-[#CFF6D8] text-[#009900] px-4 py-[5px] text-sm rounded-lg font-medium capitalize">
              {{ $gempa['Dirasakan'] }}
            </span>
            <p class="mt-4 text-xl lg:text-xl font-bold text-black-primary">
              {{ $gempa['Wilayah'] }}
            </p>
          </div>
          <div class="mt-5 flex flex-wrap lg:flex-nowrap gap-3">
            <!-- Magnitudo Card -->
            <div class="px-4 py-3 border border-[#CBD5E1] rounded-xl">
                <p class="text-sm lg:text-base text-gray-primary">Magnitudo:</p>
                <div class="mt-0.5 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" class="nuxt-icon" width="20" height="20"><path fill="#F45248" fill-rule="evenodd" d="M7.5 1.667c.358 0 .677.23.79.57l4.21 12.628 1.71-5.129a.83.83 0 0 1 .79-.57h3.333a.833.833 0 0 1 0 1.667H15.6l-2.31 6.93a.833.833 0 0 1-1.58 0L7.5 5.136l-1.71 5.129a.83.83 0 0 1-.79.57H1.666a.833.833 0 1 1 0-1.667H4.4l2.31-6.93a.83.83 0 0 1 .79-.57" clip-rule="evenodd"></path></svg>
                    <span class="text-base lg:text-lg font-bold text-black-primary">{{ $gempa['Magnitude'] ?? '-' }}</span>
                </div>
            </div>
            <!-- Kedalaman Card -->
            <div class="px-4 py-3 border border-[#CBD5E1] rounded-xl">
                <p class="text-sm lg:text-base text-gray-primary">Kedalaman:</p>
                <div class="mt-0.5 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" class="nuxt-icon" width="20" height="20"><path fill="#090" fill-rule="evenodd" d="M10 2.5a7.5 7.5 0 1 0 0 15 7.5 7.5 0 0 0 0-15M.833 10a9.167 9.167 0 1 1 18.333 0A9.167 9.167 0 0 1 .833 10" clip-rule="evenodd"></path><path fill="#090" fill-rule="evenodd" d="M10 5.833a4.167 4.167 0 1 0 0 8.334 4.167 4.167 0 0 0 0-8.334M4.166 10a5.833 5.833 0 1 1 11.667 0 5.833 5.833 0 0 1-11.667 0" clip-rule="evenodd"></path><path fill="#090" fill-rule="evenodd" d="M7.5 10a2.5 2.5 0 1 1 5 0 2.5 2.5 0 0 1-5 0" clip-rule="evenodd"></path></svg>
                    <span class="text-base lg:text-lg font-bold text-black-primary">{{ $gempa['Kedalaman'] ?? '-' }}</span>
                </div>
            </div>
            <!-- Koordinat Lokasi Card -->
            <div class="px-4 py-3 border border-[#CBD5E1] rounded-xl">
                <p class="text-sm lg:text-base text-gray-primary"> Koordinat Lokasi: </p>
                <div class="mt-0.5 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" class="nuxt-icon" width="20" height="20"><path fill="#0057FF" fill-rule="evenodd" d="M2.5 8.333a7.5 7.5 0 0 1 15 0c0 2.105-.956 3.95-2.256 5.64-1.087 1.41-2.479 2.79-3.868 4.168h-.001l-.786.782a.833.833 0 0 1-1.178 0q-.391-.391-.787-.782c-1.39-1.378-2.78-2.757-3.868-4.168-1.3-1.69-2.256-3.535-2.256-5.64m10 0a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" clip-rule="evenodd"></path></svg>
                    <span class="text-base lg:text-lg font-bold text-black-primary">{{ $gempa['KoordinatFormat'] ?? '-' }}</span>
                </div>
            </div>
          </div>
          <div class="mt-5">
            <p class="text-sm font-medium text-black-primary"><span class="text-sky-500 hover:text-sky-600 font-semibold">Saran BMKG:</span> Hati-hati terhadap gempabumi susulan yang mungkin terjadi</p>
          </div>
          <div class="mt-5 flex justify-start">
            <a href="/gempabumi" class="text-sky-500 hover:text-sky-600 inline-flex items-center justify-center rounded-lg text-sm lg:text-base leading-[25px] font-bold hover:underline underline-offset-8">
              <span class="inline-flex">Lihat Semuanya</span>
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon" class="w-4 h-4 lg:w-5 lg:h-5 stroke-2 ml-2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"></path></svg>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
