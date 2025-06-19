<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stasiun Klimatologi Riau</title>

    <!-- Tailwind CSS -->
    {{-- vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

{{-- body then call header component before-login --}}

<body>
    <div id="loading-screen" class="fixed inset-0 bg-white flex items-center justify-center z-50">
        <div class="text-center">
            <div class="loading-spinner rounded-full h-16 w-16 border-b-4 border-blue-600 mx-auto mb-6"></div>
            <h2 class="text-xl font-semibold text-gray-800 mb-2">BMKG Riau</h2>
            <p class="text-gray-600">Memuat halaman...</p>
            <div class="mt-4">
                <div class="w-48 bg-gray-200 rounded-full h-2 mx-auto">
                    <div class="bg-blue-600 h-2 rounded-full loading-progress" style="width: 0%"></div>
                </div>
            </div>
        </div>
    </div>
    <x-before-login.header />

    <main class="flex-grow">
        @yield('content')
    </main>

    <x-before-login.footer />

    <script>
        let loadingProgress = 0;

        function updateLoadingProgress(progress) {
            loadingProgress = progress;
            const progressBar = document.querySelector('.loading-progress');
            if (progressBar) {
                progressBar.style.width = `${progress}%`;
            }
        }

        async function loadComponent(url, targetId) {
            try {
                const response = await fetch(url);
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                const html = await response.text();
                document.getElementById(targetId).innerHTML = html;
                console.log(`✅ Component loaded: ${url}`);
                return true;
            } catch (error) {
                console.error(`❌ Error loading component from ${url}:`, error);
                document.getElementById(targetId).innerHTML = `
                    <div class="p-4 bg-red-100 text-red-700 rounded">
                        <strong>Error loading component:</strong> ${error.message}
                        <button onclick="loadComponent('${url}', '${targetId}')" class="ml-2 px-3 py-1 bg-red-600 text-white rounded text-sm hover:bg-red-700">
                            Coba Lagi
                        </button>
                    </div>
                `;
                return false;
            }
        }

        function hideLoadingScreen() {
            const loadingScreen = document.getElementById('loading-screen');
            if (loadingScreen) {
                loadingScreen.style.opacity = '0';
                loadingScreen.style.transition = 'opacity 0.5s ease-out';

                setTimeout(() => {
                    loadingScreen.style.display = 'none';
                }, 500);
            }
        }

        // Update navigation active state
        function updateNavigation() {
            setTimeout(() => {
                const navLinks = document.querySelectorAll('.nav-link, .mobile-nav-link');
                navLinks.forEach(link => {
                    link.classList.remove('active');
                    link.classList.remove('text-sky-500');
                    link.classList.add('text-slate-600');
                    if (link.textContent.trim() === 'Beranda' || link.getAttribute('href') ===
                        'index.html') {
                        link.classList.add('active');
                        link.classList.remove('text-slate-600');
                        link.classList.add('text-sky-500');
                        link.classList.add('font-medium');
                    }
                });
            }, 100);
        }

        document.addEventListener('DOMContentLoaded', async function() {
            console.log('🚀 Starting BMKG homepage initialization...');

            try {
                // Load header component
                updateLoadingProgress(25);
                const headerLoaded = await loadComponent('components/header.html', 'header-container');

                // Load hero component
                updateLoadingProgress(50);
                const heroLoaded = await loadComponent('components/hero.html', 'hero-container');

                // Load informasi component
                updateLoadingProgress(75);
                const informasiLoaded = await loadComponent('components/informasi.html', 'informasi-container');

                // Load footer component
                updateLoadingProgress(90);
                const footerLoaded = await loadComponent('components/footer.html', 'footer-container');

                updateLoadingProgress(95);
                await new Promise(resolve => setTimeout(resolve, 200));

                if (headerLoaded && heroLoaded && informasiLoaded && footerLoaded) {
                    // Trigger components loaded event
                    window.dispatchEvent(new Event('componentsLoaded'));

                    // Update navigation after components are loaded
                    updateNavigation();

                    console.log('✅ All homepage components loaded successfully!');
                } else {
                    console.warn('⚠️ Some components failed to load');
                }

                updateLoadingProgress(100);
                await new Promise(resolve => setTimeout(resolve, 300));

                // Hide loading screen
                hideLoadingScreen();

            } catch (error) {
                console.error('❌ Critical error during homepage initialization:', error);
                hideLoadingScreen();
            }
        });
    </script>

</body>

</html>
