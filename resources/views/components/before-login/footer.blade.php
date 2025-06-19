<!-- Footer Component -->
<footer class="w-full bg-blue-950 py-10">
  <div class="max-w-[1440px] mx-auto px-4 lg:px-8">
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8 items-start">

            <!-- Logo Section -->
      <div class="flex flex-col items-center lg:items-start">
        <!-- Logo -->
        <div class="mb-6 footer-logo">
          <img
            src="assets/images/bmkg-logo (2).png"
            alt="Logo BMKG"
            class="w-52 h-32 object-contain"
            onerror="this.style.display='none'; document.getElementById('fallback-logo-footer').style.display='block';"
          >
          <!-- Fallback Logo if PNG not found -->
          <div id="fallback-logo-footer" class="w-52 h-32 rounded fallback-logo" style="display: none;"></div>
        </div>

        <!-- Organization Name -->
        <div class="text-center lg:text-left">
          <h3 class="text-white text-base font-bold font-montserrat">
            Stasiun Klimatologi Riau
          </h3>
        </div>
      </div>

      <!-- Contact Section -->
      <div>
        <div class="mb-6">
          <h3 class="text-white text-2xl font-bold font-montserrat">
            Kontak
          </h3>
        </div>

        <div class="space-y-4">
          <!-- Address -->
          <div class="flex items-start gap-3">
            <div class="contact-icon mt-1 flex-shrink-0">
              <i class="fas fa-map-marker-alt text-white text-lg"></i>
            </div>
            <div>
              <p class="text-white text-sm font-medium font-montserrat leading-relaxed">
                Jl. Unggas, Kelurahan Simpang Tiga, Kecamatan Bukit Raya, Pekanbaru, Provinsi Riau (28284)
              </p>
            </div>
          </div>

          <!-- Phone -->
          <div class="flex items-center gap-3">
            <div class="contact-icon flex-shrink-0">
              <i class="fas fa-phone text-white text-lg"></i>
            </div>
            <div>
              <a href="tel:+6276184118311" class="text-white text-sm font-medium font-montserrat footer-link">
                +62 (761) 8411831
              </a>
            </div>
          </div>

          <!-- Email -->
          <div class="flex items-center gap-3">
            <div class="contact-icon flex-shrink-0">
              <i class="fas fa-envelope text-white text-lg"></i>
            </div>
            <div>
              <a href="mailto:staklim.riau@bmkg.go.id" class="text-white text-sm font-medium font-montserrat footer-link">
                staklim.riau@bmkg.go.id
              </a>
            </div>
          </div>
        </div>
      </div>

      <!-- Social Media Section -->
      <div>
        <div class="mb-6">
          <h3 class="text-white text-2xl font-bold font-montserrat">
            Media Sosial
          </h3>
        </div>

        <div class="flex gap-4">
          <!-- Instagram -->
          <a href="https://www.instagram.com/iklimriau" target="_blank" class="w-12 h-12 rounded-full social-icon flex items-center justify-center group bg-white/10 border border-white/20 hover:bg-white/20 transition-all duration-300" aria-label="Instagram">
            <i class="fab fa-instagram text-white text-xl group-hover:scale-110 transition-transform"></i>
          </a>

          <!-- Telegram -->
          <a href="https://t.me/StaklimRiau" target="_blank" class="w-12 h-12 rounded-full social-icon flex items-center justify-center group bg-white/10 border border-white/20 hover:bg-white/20 transition-all duration-300" aria-label="Telegram">
            <i class="fab fa-telegram-plane text-white text-xl group-hover:scale-110 transition-transform"></i>
          </a>

          <!-- YouTube -->
          <a href="http://www.youtube.com/@stasiunklimatologiriau7035" target="_blank" class="w-12 h-12 rounded-full social-icon flex items-center justify-center group bg-white/10 border border-white/20 hover:bg-white/20 transition-all duration-300" aria-label="YouTube">
            <i class="fab fa-youtube text-white text-xl group-hover:scale-110 transition-transform"></i>
          </a>
        </div>
      </div>

    <!-- Map Section -->
    <div class="flex justify-center lg:justify-end">
      <div class="text-center">
        <div class="map-container rounded-[12px] overflow-hidden border-2 border-white/20">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.123456789012!2d101.445678!3d0.512345!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e2c123456789012%3A0x1234567890123456!2sFF95%2BW5%20Simpang%20Tiga%2C%20Kota%20Pekanbaru%2C%20Riau!5e0!3m2!1sen!2sid!4v1681234567890!5m2!1sen!2sid"
            width="240"
            height="160"
            style="border:0;"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            class="w-60 h-40 object-cover hover:scale-105 transition-transform duration-300"
          ></iframe>
        </div>
      </div>
    </div>

    </div>

    <!-- Copyright -->
    <div class="mt-8 pt-6 border-t border-white/20">
      <div class="text-center">
        <p class="text-white text-sm font-medium font-montserrat">
          2025 © Stasiun Klimatologi Riau Kerjasama dengan Politeknik Caltex Riau.
        </p>
      </div>
    </div>
  </div>
</footer>
