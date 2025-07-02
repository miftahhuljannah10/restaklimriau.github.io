<!-- Tentang Kami Section Dinamis -->
<div class="text-center mb-10">
    <h2 class="text-3xl font-bold font-montserrat gradient-text mb-4 animate-fade-in">
        {{ $title ?? 'Tentang Stasiun Klimatologi Riau' }}
    </h2>
    <p class="text-slate-600 text-l font-montserrat max-w-4xl mx-auto leading-relaxed animate-slide-up">
        {{ $description ?? 'Stasiun Klimatologi Riau hadir untuk memberikan informasi terkait iklim secara up-to-date dengan teknologi terdepan dan pelayanan terbaik.' }}
    </p>
</div>

<!-- Video Section Dinamis -->
<div class="flex justify-center mb-2 animate-slide-up">
    <div class="w-full max-w-[800px] relative">
        <div class="absolute -inset-6 rounded-3xl blur-lg opacity-30 animate-pulse-slow"></div>
        <iframe
            class="relative w-full h-[450px] rounded-3xl"
            src="{{ $video_url ?? 'https://www.youtube.com/embed/PKJpW0Od0Ks?rel=0' }}"
            title="{{ $video_title ?? 'Stasiun Klimatologi Riau' }}"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen
        ></iframe>
    </div>
</div>
