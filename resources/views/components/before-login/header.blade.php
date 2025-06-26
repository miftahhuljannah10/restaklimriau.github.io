<!-- Header Component - HANYA HTML -->
<header class="w-full">
    <!-- Top Bar -->
    <div class="bg-blue-950 w-full">
        <div class="max-w-[1440px] mx-auto px-4 lg:px-10 h-10 flex items-center justify-between text-xs">
            <!-- Date -->
            <div class="text-white uppercase tracking-wide" id="current-date"></div>

            <!-- Time Section -->
            <div class="hidden lg:flex items-center space-x-4 text-xs">
                <span class="text-white uppercase tracking-wide">
                    Standar Waktu Indonesia
                </span>
                <span class="text-green-300 uppercase tracking-wide" id="wib-time"></span>
                <span class="text-white">/</span>
                <span class="text-green-300 uppercase tracking-wide" id="utc-time"></span>
            </div>
        </div>
    </div>

    <!-- Main Header -->
    <div class="bg-white border-b border-slate-200 w-full">
        <div class="max-w-[1440px] mx-auto px-4 lg:px-10 h-20 flex items-center justify-between">
            <!-- Logo and Title -->
            <div class="flex items-center gap-2.5">
                <!-- BMKG Logo -->
                <img
                    src="assets/images/bmkg-logo.png"
                    alt="Logo BMKG"
                    class="w-12 h-12 object-contain"
                    onerror="this.style.display='none'; document.getElementById('fallback-logo').style.display='block';"
                >

                <!-- Fallback Logo jika gambar tidak load -->
                <div id="fallback-logo" class="w-12 h-12 rounded fallback-logo" style="display: none;"></div>

                <!-- Title -->
                <div class="flex flex-col gap-0.5">
                    <h1 class="text-black text-xs font-semibold uppercase leading-none tracking-tight">
                        STASIUN KLIMATOLOGI RIAU
                    </h1>
                    <p class="text-black text-xs font-normal leading-none tracking-tight">
                        Badan Meteorologi Klimatologi dan Geofisika
                    </p>
                </div>
            </div>

            <!-- Navigation - Desktop -->
            <nav class="hidden lg:flex items-center space-x-8">
                <a href="/" class="nav-link text-sm font-normal leading-tight transition-colors {{ request()->is('/') ? 'text-sky-500 font-bold' : 'text-slate-600 hover:text-sky-500' }}">
                    Home
                </a>
                <a href="/profil" class="nav-link text-sm font-normal leading-tight transition-colors {{ request()->is('profil*') ? 'text-sky-500 font-bold' : 'text-slate-600 hover:text-sky-500' }}">
                    Profile
                </a>
                <a href="/layanan" class="nav-link text-sm font-normal leading-tight transition-colors {{ request()->is('layanan*') ? 'text-sky-500 font-bold' : 'text-slate-600 hover:text-sky-500' }}">
                    Layanan
                </a>
                <a href="/produk" class="nav-link text-sm font-normal leading-tight transition-colors {{ request()->is('produk*') ? 'text-sky-500 font-bold' : 'text-slate-600 hover:text-sky-500' }}">
                    Produk
                </a>
                <a href="/media" class="nav-link text-sm font-normal leading-tight transition-colors {{ request()->is('media*') ? 'text-sky-500 font-bold' : 'text-slate-600 hover:text-sky-500' }}">
                    Media
                </a>
            </nav>

            <!-- Contact Button & Mobile Menu -->
            <div class="flex items-center gap-4">
                <!-- Contact Button -->
                <a href="/kontak" class="hidden lg:flex px-3.5 py-2 bg-white rounded-lg shadow-[0px_8px_32px_0px_rgba(100,116,139,0.06)] border border-slate-200 items-center gap-2 hover:shadow-lg transition-shadow">
                    <div class="w-4 h-4 bg-slate-600 rounded-sm flex items-center justify-center">
                        <i class="fas fa-phone text-white text-xs"></i>
                    </div>
                    <span class="text-slate-900 text-sm font-normal leading-tight">
                        Kontak Kami
                    </span>
                </a>

                <!-- Mobile Menu Button -->
                <button class="lg:hidden p-2 text-slate-600 hover:text-sky-500" id="mobile-menu-btn">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation -->
        <div class="lg:hidden hidden bg-white border-t border-slate-200" id="mobile-menu">
            <div class="px-4 py-4 space-y-4">
                <a href="/" class="mobile-nav-link block text-sm font-normal py-2 border-b border-slate-100 transition-colors {{ request()->is('/') ? 'text-sky-500 font-bold' : 'text-slate-600 hover:text-sky-500' }}">Home</a>
                <a href="/profil" class="mobile-nav-link block text-sm font-normal py-2 border-b border-slate-100 transition-colors {{ request()->is('profil*') ? 'text-sky-500 font-bold' : 'text-slate-600 hover:text-sky-500' }}">Profile</a>
                <a href="/layanan" class="mobile-nav-link block text-sm font-normal py-2 border-b border-slate-100 transition-colors {{ request()->is('layanan*') ? 'text-sky-500 font-bold' : 'text-slate-600 hover:text-sky-500' }}">Layanan</a>
                <a href="/produk" class="mobile-nav-link block text-sm font-normal py-2 border-b border-slate-100 transition-colors {{ request()->is('produk*') ? 'text-sky-500 font-bold' : 'text-slate-600 hover:text-sky-500' }}">Produk</a>
                <a href="/media" class="mobile-nav-link block text-sm font-normal py-2 border-b border-slate-100 transition-colors {{ request()->is('media*') ? 'text-sky-500 font-bold' : 'text-slate-600 hover:text-sky-500' }}">Media</a>



                <!-- Mobile Contact Button -->
                <a href="/kontak" class="w-full mt-4 px-3.5 py-3 bg-white rounded-lg shadow-[0px_8px_32px_0px_rgba(100,116,139,0.06)] border border-slate-200 flex items-center justify-center gap-2 hover:shadow-lg transition-all duration-200 active:scale-95" id="mobile-contact-btn">
                    <div class="w-4 h-4 bg-slate-600 rounded-sm flex items-center justify-center">
                        <i class="fas fa-phone text-white text-xs"></i>
                    </div>
                    <span class="text-slate-900 text-sm font-normal">Kontak Kami</span>
                </a>
            </div>
        </div>
    </div>
</header>

<!-- JS dipindahkan ke app.js -->
