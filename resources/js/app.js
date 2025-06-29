import "./bootstrap";
// import * as Helpers from "./helpers.js";

// import Alpine from "alpinejs";

// window.Alpine = Alpine;
// window.Helpers = Helpers;

// Alpine.start();
{
    /* <script src="//unpkg.com/alpinejs" defer></script>; */
}

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

document.addEventListener("DOMContentLoaded", function () {
    const mobileMenuButton = document.querySelector(".mobile-menu-button");
    const sidebar = document.querySelector(".sidebar");
    if (mobileMenuButton && sidebar) {
        mobileMenuButton.addEventListener("click", function () {
            sidebar.classList.toggle("hidden");
        });
    }
});

import { createIcons, icons } from 'lucide';
createIcons({ icons })

// ========================================
// FEEDBACK BUTTON & MODAL (from feedback-button.blade.php)
// ========================================
function openFeedbackModal() {
    var modal = document.getElementById('feedback-modal');
    if (modal) {
        modal.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }
}
function closeFeedbackModal() {
    var modal = document.getElementById('feedback-modal');
    if (modal) {
        modal.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }
}
document.addEventListener('DOMContentLoaded', function() {
    var fab = document.querySelector('.feedback-fab-vertical');
    if (fab) fab.onclick = openFeedbackModal;
    var modal = document.getElementById('feedback-modal');
    if (modal) {
        modal.onclick = function(e) {
            if (e.target === this) closeFeedbackModal();
        };
    }
    var form = document.getElementById('feedback-form');
    if (form) {
        form.onsubmit = function(e) {
            e.preventDefault();
            closeFeedbackModal();
            alert('Terima kasih atas feedback Anda!');
        };
    }
    // Inisialisasi header secara eksplisit agar tanggal & waktu selalu muncul
    if (typeof initializeHeader === 'function') {
        initializeHeader();
    }
    // Event delegation untuk .service-card
    document.body.addEventListener('click', function(e) {
        const card = e.target.closest('.service-card');
        if (card) {
            const type = card.querySelector('h3')?.textContent?.trim();
            if (type) handleServiceClick(type);
        }
    });
    // Tab section handler for .section-nav-btn (improved with debug)
    document.body.addEventListener('click', function(e) {
        const btn = e.target.closest('.section-nav-btn');
        if (btn) {
            try {
                // Remove active class from all buttons
                document.querySelectorAll('.section-nav-btn').forEach(function(b) {
                    b.classList.remove('active', 'text-white');
                    b.classList.add('text-gray-600');
                });
                // Add active class to clicked button
                btn.classList.add('active', 'text-white');
                btn.classList.remove('text-gray-600');
                // Show/hide sections
                const section = btn.getAttribute('data-section');
                let found = false;
                document.querySelectorAll('section[id^="section-"]').forEach(function(content) {
                    if (content.id === `section-${section}`) {
                        content.classList.remove('hidden');
                        found = true;
                    } else {
                        content.classList.add('hidden');
                    }
                });
                if (!found) {
                    console.warn('Tidak ditemukan konten dengan data-section-content:', section);
                }
            } catch (err) {
                console.error('Tab handler error:', err);
            }
        }
    });
    // Event delegation untuk .service-tab (tab layanan kantor)
    document.body.addEventListener('click', function(e) {
        const tab = e.target.closest('.service-tab');
        if (tab) {
            // Remove active class dari semua tab
            document.querySelectorAll('.service-tab').forEach(function(t) {
                t.classList.remove('active', 'text-white');
                t.classList.add('text-gray-600');
            });
            // Aktifkan tab yang diklik
            tab.classList.add('active', 'text-white');
            tab.classList.remove('text-gray-600');
            // Toggle konten
            const tabId = tab.id;
            document.querySelectorAll('.tab-content').forEach(function(content) {
                if (content.id === tabId.replace('-tab', '-content')) {
                    content.classList.add('active');
                    content.classList.remove('hidden');
                } else {
                    content.classList.remove('active');
                    content.classList.add('hidden');
                }
            });
        }
    });
});

// ========================================
// BMKG Website - All JavaScript Combined
// ========================================

// ========================================
// GLOBAL VARIABLES
// ========================================
let clockInterval = null
let isInitialized = false
let heroInitialized = false
let informasiInitialized = false
let weatherCarouselInitialized = false
let headerAnimated = false

// ========================================
// UTILITY FUNCTIONS
// ========================================

/**
 * Utility function to safely get element by ID
 * @param {string} id - Element ID
 * @returns {HTMLElement|null}
 */
function getElement(id) {
  return document.getElementById(id)
}

/**
 * Utility function to add event listener safely
 * @param {HTMLElement} element - Target element
 * @param {string} event - Event type
 * @param {Function} handler - Event handler
 */
function addEventListenerSafe(element, event, handler) {
  if (element && typeof handler === "function") {
    element.addEventListener(event, handler)
  }
}

/**
 * Format number with leading zero
 * @param {number} num - Number to format
 * @returns {string}
 */
function padZero(num) {
  return String(num).padStart(2, "0")
}

/**
 * Debounce function to limit function calls
 * @param {Function} func - Function to debounce
 * @param {number} wait - Wait time in milliseconds
 * @returns {Function}
 */
function debounce(func, wait) {
  let timeout
  return function executedFunction(...args) {
    const later = () => {
      clearTimeout(timeout)
      func(...args)
    }
    clearTimeout(timeout)
    timeout = setTimeout(later, wait)
  }
}

// ========================================
// NAVIGATION FUNCTIONALITY
// ========================================

/**
 * Set active navigation based on current page
 */
function setActiveNavigation() {
  const currentPage = window.location.pathname
  const navLinks = document.querySelectorAll(".nav-link, .mobile-nav-link")

  // Remove active class from all links
  navLinks.forEach((link) => {
    link.classList.remove("active")
    link.classList.remove("text-sky-500")
    link.classList.add("text-slate-600")
    link.classList.remove("font-medium")
    link.classList.add("font-normal")
  })

  // Determine which page we're on and set active state
  let activePageName = ""

  if (
    currentPage.endsWith("media") ||
    currentPage.endsWith("artikel") ||
    currentPage.endsWith("berita") ||
    currentPage.endsWith("berita-detail") ||
    currentPage.endsWith("buletin")
  ) {
    activePageName = "Media"
  } else if (currentPage.endsWith("layanan")) {
    activePageName = "Layanan"
  } else if (currentPage.endsWith("tarif-pnbp")) {
    activePageName = "Layanan"
  } else if (currentPage.endsWith("profil")) {
    activePageName = "Profile"
  } else if (currentPage.endsWith("produk")) {
    activePageName = "Produk"
  } else if (currentPage === "/" || currentPage === "") {
    activePageName = "Home"
  }

  // Set active state for the current page
  if (activePageName) {
    navLinks.forEach((link) => {
      const linkText = link.textContent.trim()
      if (linkText === activePageName) {
        link.classList.add("active")
        link.classList.remove("text-slate-600")
        link.classList.add("text-sky-500")
        link.classList.remove("font-normal")
        link.classList.add("font-medium")
      }
    })
  }

  console.log(`Active navigation set for: ${activePageName}`)
}

// Add this function after the existing navigation functions

/**
 * Handle back to media navigation
 */
function handleBackToMedia() {
  console.log("🔙 Navigating back to media page...")
  showLoadingMessage("Kembali ke halaman Media...")
  setTimeout(() => {
    try {
      window.location.href = "/media"
    } catch (error) {
      console.error("Navigation failed:", error)
      showErrorMessage("Gagal kembali ke halaman Media. Silakan coba lagi.")
    }
  }, 300)
}

// Make the function globally available
window.handleBackToMedia = handleBackToMedia

// ========================================
// SERVICE CARD FUNCTIONALITY - GLOBAL FUNCTION
// ========================================

/**
 * Handle service card clicks - GLOBAL FUNCTION
 * @param {string} serviceType - The service type clicked
 */
function handleServiceClick(serviceType) {
  console.log(`🎯 Service clicked: ${serviceType}`)
  const clickedElement = event.target.closest(".service-card")
  if (clickedElement) {
    clickedElement.style.transform = "scale(0.98)"
    setTimeout(() => {
      clickedElement.style.transform = ""
    }, 150)
  }
  switch (serviceType) {
    case "Tarif PNBP":
      console.log("🚀 Navigating to tarif-pnbp...");
      setTimeout(() => {
        try {
          window.location.href = "/tarif-pnbp";
        } catch (error) {
          console.error("Navigation method 1 failed:", error);
          try {
            window.location.assign("/tarif-pnbp");
          } catch (error2) {
            console.error("Navigation method 2 failed:", error2);
            try {
              window.location.replace("/tarif-pnbp");
            } catch (error3) {
              console.error("All navigation methods failed:", error3);
              showErrorMessage("Gagal membuka halaman. Silakan coba lagi.");
            }
          }
        }
      }, 300);
      break;
    case "Form Layanan":
      console.log("🚀 Navigating to form-layanan...");
      setTimeout(() => {
        try {
          window.location.href = "/form-layanan";
        } catch (error) {
          console.error("Navigation failed:", error);
          showErrorMessage("Gagal membuka halaman. Silakan coba lagi.");
        }
      }, 300);
      break;
    case "Survey Kepuasan Masyarakat":
      showComingSoonMessage("Halaman Survey Kepuasan Masyarakat")
      break
    case "Surat 0 Rupiah":
      showComingSoonMessage("Halaman Surat 0 Rupiah")
      break
    default:
      console.log("Unknown service type:", serviceType)
      showComingSoonMessage(`Halaman ${serviceType}`)
  }
}

/**
 * Show loading message
 * @param {string} message - Loading message
 */
function showLoadingMessage(message) {
  const toast = document.createElement("div")
  toast.className =
    "fixed top-4 right-4 bg-blue-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 transform translate-x-full transition-transform duration-300"
  toast.id = "loading-toast"
  toast.innerHTML = `
    <div class="flex items-center">
      <i class="fas fa-spinner fa-spin mr-2"></i>
      <span>${message}</span>
    </div>
  `

  document.body.appendChild(toast)

  // Animate in
  setTimeout(() => {
    toast.classList.remove("translate-x-full")
  }, 100)

  // Remove after 2 seconds
  setTimeout(() => {
    const existingToast = document.getElementById("loading-toast")
    if (existingToast) {
      existingToast.classList.add("translate-x-full")
      setTimeout(() => {
        existingToast.remove()
      }, 300)
    }
  }, 2000)
}

// ========================================
// HEADER FUNCTIONALITY
// ========================================

/**
 * Toggle mobile menu visibility
 */
function toggleMobileMenu() {
  const mobileMenu = getElement("mobile-menu")
  const menuBtn = getElement("mobile-menu-btn")

  if (!mobileMenu || !menuBtn) return

  const isHidden = mobileMenu.classList.contains("hidden")

  if (isHidden) {
    // Show menu
    mobileMenu.classList.remove("hidden")
    mobileMenu.classList.add("slide-down")

    // Change icon to close
    const icon = menuBtn.querySelector("i")
    if (icon) {
      icon.className = "fas fa-times text-xl"
    }

    // Add body scroll lock
    document.body.style.overflow = "hidden"
  } else {
    // Hide menu
    mobileMenu.classList.add("hidden")
    mobileMenu.classList.remove("slide-down")

    // Change icon to hamburger
    const icon = menuBtn.querySelector("i")
    if (icon) {
      icon.className = "fas fa-bars text-xl"
    }

    // Remove body scroll lock
    document.body.style.overflow = ""
  }
}

/**
 * Update real-time clock
 */
function updateClock() {
  const now = new Date()

  // Calculate WIB (UTC+7)
  const wibTime = new Date(now.getTime() + 7 * 60 * 60 * 1000)
  const wibHours = padZero(wibTime.getUTCHours())
  const wibMinutes = padZero(wibTime.getUTCMinutes())
  const wibSeconds = padZero(wibTime.getUTCSeconds())

  // Calculate UTC
  const utcHours = padZero(now.getUTCHours())
  const utcMinutes = padZero(now.getUTCMinutes())
  const utcSeconds = padZero(now.getUTCSeconds())

  // Update WIB time display
  const wibElement = getElement("wib-time")
  if (wibElement) {
    wibElement.textContent = `${wibHours} : ${wibMinutes} : ${wibSeconds} WIB`
  }

  // Update UTC time display
  const utcElement = getElement("utc-time")
  if (utcElement) {
    utcElement.textContent = `${utcHours} : ${utcMinutes} : ${utcSeconds} UTC`
  }
}

/**
 * Update current date display
 */
function updateDate() {
  const now = new Date()
  const days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"]
  const months = [
    "Januari",
    "Februari",
    "Maret",
    "April",
    "Mei",
    "Juni",
    "Juli",
    "Agustus",
    "September",
    "Oktober",
    "November",
    "Desember",
  ]

  const dayName = days[now.getDay()]
  const date = now.getDate()
  const month = months[now.getMonth()]
  const year = now.getFullYear()

  const dateElement = getElement("current-date")
  if (dateElement) {
    dateElement.textContent = `${dayName}, ${date} ${month} ${year}`
  }
}

/**
 * Handle navigation link clicks
 * @param {Event} event - Click event
 */
function handleNavClick(event) {
  const link = event.target
  const href = link.getAttribute("href")

  // If it's a real link (not #), let it navigate normally
  if (href && href !== "#" && !href.startsWith("javascript:")) {
    // Close mobile menu if open before navigation
    const mobileMenu = getElement("mobile-menu")
    if (mobileMenu && !mobileMenu.classList.contains("hidden")) {
      toggleMobileMenu()
    }
    // Let the browser handle the navigation
    return
  }

  // Only prevent default for placeholder links
  event.preventDefault()

  // Close mobile menu if open
  const mobileMenu = getElement("mobile-menu")
  if (mobileMenu && !mobileMenu.classList.contains("hidden")) {
    toggleMobileMenu()
  }

  console.log(`Navigation clicked: ${link.textContent}`)

  // Show coming soon for placeholder links
  if (href === "#") {
    showComingSoonMessage(`Halaman ${link.textContent.trim()}`)
  }
}

/**
 * Handle contact button clicks
 */
function handleContactClick() {
  console.log("Contact button clicked")
}

/**
 * Initialize header functionality
 */
function initializeHeader() {
  if (isInitialized) {
    console.log("Header already initialized, skipping...")
    return
  }

  console.log("🚀 Initializing header...")

  // Setup mobile menu toggle
  const mobileMenuBtn = getElement("mobile-menu-btn")
  addEventListenerSafe(mobileMenuBtn, "click", toggleMobileMenu)

  // Setup navigation links
  const navLinks = document.querySelectorAll(".nav-link, .mobile-nav-link")
  navLinks.forEach((link) => {
    addEventListenerSafe(link, "click", handleNavClick)
  })

  // Setup contact buttons
  const contactBtn = getElement("contact-btn")
  const mobileContactBtn = getElement("mobile-contact-btn")
  addEventListenerSafe(contactBtn, "click", handleContactClick)
  addEventListenerSafe(mobileContactBtn, "click", handleContactClick)

  // Initialize date and time
  updateDate()
  updateClock()

  // Start clock interval
  if (clockInterval) {
    clearInterval(clockInterval)
  }
  clockInterval = setInterval(updateClock, 1000)

  // Set active navigation based on current page
  setTimeout(() => {
    setActiveNavigation()
  }, 100)

  // Add fade-in animation to header hanya sekali
  const header = document.querySelector("header")
  if (header && !headerAnimated) {
    header.classList.add("fade-in")
    headerAnimated = true
  }

  isInitialized = true
  console.log("✅ Header initialized successfully!")
}

// ========================================
// HERO SECTION FUNCTIONALITY
// ========================================

/**
 * Handle feedback button click
 */
function handleFeedbackClick() {
  console.log("Feedback button clicked")
  showFeedbackModal()
}

/**
 * Show feedback modal
 */
function showFeedbackModal() {
  // Remove existing modal if any
  closeFeedbackModal()

  // Create modal backdrop
  const modal = document.createElement("div")
  modal.className = "fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4"
  modal.id = "feedback-modal"

  // Create modal content
  modal.innerHTML = `
    <div class="bg-white rounded-lg shadow-xl max-w-md w-full relative flex flex-col" style="max-height: 80vh;">
      <!-- Close Button -->
      <button onclick="closeFeedbackModal()" class="absolute top-3 right-3 w-8 h-8 flex items-center justify-center text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-full transition-colors z-10">
        <i class="fas fa-times text-sm"></i>
      </button>

      <!-- Modal Header -->
      <div class="p-8">
        <!-- Header with Logo and Title -->
        <div class="flex items-center gap-4 justify-center mb-8">
          <!-- BMKG Logo from PNG -->
          <img
            src="assets/images/bmkg-logo.png"
            alt="Logo BMKG"
            class="w-12 h-12 object-contain"
            onerror="this.style.display='none'; document.getElementById('fallback-logo-modal').style.display='block';"
          >

          <!-- Fallback Logo if PNG not found -->
          <div id="fallback-logo-modal" class="w-12 h-12 rounded fallback-logo" style="display: none;"></div>

          <!-- Organization Title -->
          <div class="flex flex-col justify-center items-start">
            <h1 class="text-gray-800 text-lg font-bold font-montserrat uppercase leading-tight tracking-tight">
              STASIUN KLIMATOLOGI RIAU
            </h1>
            <p class="text-gray-600 text-sm font-medium font-montserrat leading-tight tracking-tight">
              Badan Meteorologi Klimatologi dan Geofisika
            </p>
          </div>
        </div>

        <!-- Subtitle -->
        <div class="text-center mb-8">
          <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-sky-500 rounded-full flex items-center justify-center mx-auto mb-4">
            <i class="fas fa-comment-alt text-white text-xl"></i>
          </div>
          <h2 class="text-gray-800 text-xl font-bold mb-2">Feedback Anda Sangat Berharga</h2>
          <p class="text-gray-600 font-medium">Bantu kami meningkatkan layanan dengan feedback Anda.</p>
        </div>

        <!-- Feedback Form -->
        <form id="feedback-form" class="space-y-6">
          <!-- Question 1 -->
          <div class="bg-gray-50 p-6 rounded-xl border border-gray-200">
            <label class="block mb-4">
              <div class="flex items-start gap-2 mb-3">
                <div class="w-6 h-6 bg-blue-500 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                  <span class="text-white text-sm font-bold">1</span>
                </div>
                <div>
                  <span class="text-gray-800 text-base font-semibold font-montserrat leading-relaxed">Apakah tujuan utama Anda mengunjungi laman Stasiun Klimatologi Riau hari ini?</span>
                  <span class="text-red-500 text-base font-semibold ml-1">*</span>
                </div>
              </div>
            </label>
            <div class="relative">
              <input
                type="text"
                name="purpose"
                class="w-full h-12 px-4 bg-white border-2 border-gray-300 rounded-lg text-gray-800 font-montserrat focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition-all duration-200"
                placeholder="Tuliskan tujuan disini..."
                required
              >
              <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                <i class="fas fa-edit text-gray-400"></i>
              </div>
            </div>
          </div>

          <!-- Question 2 -->
          <div class="bg-gray-50 p-6 rounded-xl border border-gray-200">
            <label class="block mb-4">
              <div class="flex items-start gap-2 mb-3">
                <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                  <span class="text-white text-sm font-bold">2</span>
                </div>
                <div>
                  <span class="text-gray-800 text-base font-semibold font-montserrat leading-relaxed">Apakah Anda berhasil menemukan data atau informasi yang Anda cari?</span>
                  <span class="text-red-500 text-base font-semibold ml-1">*</span>
                </div>
              </div>
            </label>
            <div class="relative">
              <input
                type="text"
                name="found_info"
                class="w-full h-12 px-4 bg-white border-2 border-gray-300 rounded-lg text-gray-800 font-montserrat focus:outline-none focus:border-green-500 focus:ring-4 focus:ring-green-100 transition-all duration-200"
                placeholder="Tuliskan jawaban disini..."
                required
              >
              <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                <i class="fas fa-search text-gray-400"></i>
              </div>
            </div>
          </div>

          <!-- Question 3 -->
          <div class="bg-gray-50 p-6 rounded-xl border border-gray-200">
            <label class="block mb-4">
              <div class="flex items-start gap-2 mb-3">
                <div class="w-6 h-6 bg-amber-500 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                  <span class="text-white text-sm font-bold">3</span>
                </div>
                <div>
                  <span class="text-gray-800 text-base font-semibold font-montserrat leading-relaxed">Berikan saran dan masukan Anda untuk Stasiun Klimatologi Riau agar kami dapat memberikan layanan lebih baik lagi!</span>
                  <span class="text-gray-500 text-sm ml-1">(Opsional)</span>
                </div>
              </div>
            </label>
            <div class="relative">
              <textarea
                name="suggestions"
                rows="4"
                class="w-full p-4 bg-white border-2 border-gray-300 rounded-lg text-gray-800 font-montserrat focus:outline-none focus:border-amber-500 focus:ring-4 focus:ring-amber-100 transition-all duration-200 resize-none"
                placeholder="Tuliskan saran atau kendala disini..."
              ></textarea>
              <div class="absolute top-4 right-4 pointer-events-none">
                <i class="fas fa-lightbulb text-gray-400"></i>
              </div>
            </div>
          </div>

          <!-- Submit Button -->
          <div class="flex justify-center pt-6">
            <button
              type="submit"
              class="group relative w-64 h-14 bg-gradient-to-r from-sky-500 to-blue-600 rounded-2xl text-white font-bold text-lg font-montserrat shadow-lg hover:shadow-xl hover:from-sky-600 hover:to-blue-700 focus:outline-none focus:ring-4 focus:ring-sky-300 transition-all duration-300 transform hover:scale-105"
            >
              <span class="flex items-center justify-center gap-2">
                <i class="fas fa-paper-plane group-hover:translate-x-1 transition-transform duration-200"></i>
                Kirim Feedback
              </span>
            </button>
          </div>

          <!-- Footer Note -->
          <div class="text-center pt-4">
            <p class="text-gray-500 text-sm">
              <i class="fas fa-shield-alt mr-1"></i>
              Data Anda aman dan akan digunakan untuk meningkatkan layanan kami
            </p>
          </div>
        </form>
      </div>
    </div>
  `

  // Add modal to body
  document.body.appendChild(modal)

  // Add event listener to form
  const form = document.getElementById("feedback-form")
  if (form) {
    form.addEventListener("submit", handleFeedbackSubmitFn)
  }

  // Close modal when clicking outside
  modal.addEventListener("click", (e) => {
    if (e.target === modal) {
      closeFeedbackModal()
    }
  })

  // Focus on close button
  setTimeout(() => {
    const closeButton = modal.querySelector('button[onclick="closeFeedbackModal()"]')
    if (closeButton) {
      closeButton.focus()
    }
  }, 100)

  // Prevent body scroll
  document.body.style.overflow = "hidden"
}

/**
 * Handle feedback form submission
 * @param {Event} event - Form submit event
 */
function handleFeedbackSubmitFn(event) {
  event.preventDefault()

  const formData = new FormData(event.target)
  const feedback = {
    purpose: formData.get("purpose"),
    found_info: formData.get("found_info"),
    suggestions: formData.get("suggestions") || "",
    timestamp: new Date().toISOString(),
    userAgent: navigator.userAgent,
    url: window.location.href,
  }

  // Validate required fields
  if (!feedback.purpose.trim()) {
    showErrorMessageFn("Tujuan kunjungan harus diisi!")
    return
  }

  if (!feedback.found_info) {
    showErrorMessageFn("Silakan pilih apakah Anda menemukan informasi yang dicari!")
    return
  }

  console.log("Feedback submitted:", feedback)

  // Show loading state
  const submitBtn = event.target.querySelector('button[type="submit"]')
  const originalText = submitBtn.innerHTML
  submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Mengirim...'
  submitBtn.disabled = true

  // Simulate submission
  setTimeout(() => {
    showSuccessMessageFn("Feedback berhasil dikirim! Terima kasih atas masukan Anda.")
    closeFeedbackModal()
  }, 1000)
}

/**
 * Show success message
 */
function showSuccessMessageFn(message) {
  const toast = document.createElement("div")
  toast.className =
    "fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 transform translate-x-full transition-transform duration-300"
  toast.innerHTML = `
    <div class="flex items-center">
      <i class="fas fa-check-circle mr-2"></i>
      <span>${message}</span>
    </div>
  `

  document.body.appendChild(toast)

  // Animate in
  setTimeout(() => {
    toast.classList.remove("translate-x-full")
  }, 100)

  // Remove after 3 seconds
  setTimeout(() => {
    toast.classList.add("translate-x-full")
    setTimeout(() => {
      toast.remove()
    }, 300)
  }, 3000)
}

/**
 * Show error message
 */
function showErrorMessageFn(message) {
  const toast = document.createElement("div")
  toast.className =
    "fixed top-4 right-4 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 transform translate-x-full transition-transform duration-300"
  toast.innerHTML = `
    <div class="flex items-center">
      <i class="fas fa-exclamation-circle mr-2"></i>
      <span>${message}</span>
    </div>
  `

  document.body.appendChild(toast)

  // Animate in
  setTimeout(() => {
    toast.classList.remove("translate-x-full")
  }, 100)

  // Remove after 4 seconds
  setTimeout(() => {
    toast.classList.add("translate-x-full")
    setTimeout(() => {
      toast.remove()
    }, 300)
  }, 4000)
}

/**
 * Add scroll animations to hero elements
 */
function addScrollAnimationsFn() {
  const heroTitle = document.querySelector(".hero-title")
  const heroSubtitle = document.querySelector(".hero-subtitle")

  if (heroTitle) {
    heroTitle.classList.add("hero-title")
  }

  if (heroSubtitle) {
    heroSubtitle.classList.add("hero-subtitle")
  }
}

/**
 * Initialize hero section
 */
function initializeHero() {
  if (heroInitialized) {
    console.log("Hero already initialized, skipping...")
    return
  }

  console.log("🚀 Initializing hero section...")

  // Setup feedback button - Simple implementation
  const feedbackLink = document.getElementById("feedback-link")
  if (feedbackLink) {
    // Add click event
    feedbackLink.addEventListener("click", (e) => {
      e.preventDefault()
      handleFeedbackClick()
    })

    // Add keyboard accessibility
    feedbackLink.addEventListener("keydown", (e) => {
      if (e.key === "Enter" || e.key === " ") {
        e.preventDefault()
        handleFeedbackClick()
      }
    })

    console.log("✅ Feedback button initialized with enhanced design")
  }

  // Add scroll animations
  addScrollAnimationsFn()

  heroInitialized = true
  console.log("✅ Hero section initialized successfully!")
}

// ========================================
// INFORMASI SECTION FUNCTIONALITY
// ========================================

/**
 * Handle weather detail button click
 */
function handleWeatherDetailClick() {
  console.log("Weather detail button clicked")
  showWeatherDetailModal()
}

/**
 * Show weather detail modal - Compact and clean design with better scroll ratio
 */
function showWeatherDetailModal() {
  // Remove existing modal if any
  closeWeatherDetailModal()

  // Create modal backdrop
  const modal = document.createElement("div")
  modal.className = "fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4"
  modal.id = "weather-detail-modal"

  // Create modal content - compact size with better scroll ratio
  modal.innerHTML = `
    <div class="bg-white rounded-lg shadow-xl max-w-md w-full relative flex flex-col" style="max-height: 80vh;">
      <!-- Close Button -->
      <button onclick="closeWeatherDetailModal()" class="absolute top-3 right-3 w-8 h-8 flex items-center justify-center text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-full transition-colors z-10">
        <i class="fas fa-times text-sm"></i>
      </button>

      <!-- Modal Header - Fixed -->
      <div class="p-8">
        <!-- Header with Logo and Title -->
        <div class="flex items-center gap-4 justify-center mb-8">
          <!-- BMKG Logo from PNG -->
          <img
            src="assets/images/bmkg-logo.png"
            alt="Logo BMKG"
            class="w-12 h-12 object-contain"
            onerror="this.style.display='none'; document.getElementById('fallback-logo-modal').style.display='block';"
          >

          <!-- Fallback Logo if PNG not found -->
          <div id="fallback-logo-modal" class="w-12 h-12 rounded fallback-logo" style="display: none;"></div>

          <!-- Organization Title -->
          <div class="flex flex-col justify-center items-start">
            <h1 class="text-gray-800 text-lg font-bold font-montserrat uppercase leading-tight tracking-tight">
              STASIUN KLIMATOLOGI RIAU
            </h1>
            <p class="text-gray-600 text-sm font-medium font-montserrat leading-tight tracking-tight">
              Badan Meteorologi Klimatologi dan Geofisika
            </p>
          </div>
        </div>

        <!-- Subtitle -->
        <div class="text-center mb-8">
          <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-sky-500 rounded-full flex items-center justify-center mx-auto mb-4">
            <i class="fas fa-comment-alt text-white text-xl"></i>
          </div>
          <h2 class="text-gray-800 text-xl font-bold mb-2">Feedback Anda Sangat Berharga</h2>
          <p class="text-gray-600 font-medium">Bantu kami meningkatkan layanan dengan feedback Anda.</p>
        </div>

        <!-- Feedback Form -->
        <form id="feedback-form" class="space-y-6">
          <!-- Question 1 -->
          <div class="bg-gray-50 p-6 rounded-xl border border-gray-200">
            <label class="block mb-4">
              <div class="flex items-start gap-2 mb-3">
                <div class="w-6 h-6 bg-blue-500 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                  <span class="text-white text-sm font-bold">1</span>
                </div>
                <div>
                  <span class="text-gray-800 text-base font-semibold font-montserrat leading-relaxed">Apakah tujuan utama Anda mengunjungi laman Stasiun Klimatologi Riau hari ini?</span>
                  <span class="text-red-500 text-base font-semibold ml-1">*</span>
                </div>
              </div>
            </label>
            <div class="relative">
              <input
                type="text"
                name="purpose"
                class="w-full h-12 px-4 bg-white border-2 border-gray-300 rounded-lg text-gray-800 font-montserrat focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition-all duration-200"
                placeholder="Tuliskan tujuan disini..."
                required
              >
              <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                <i class="fas fa-edit text-gray-400"></i>
              </div>
            </div>
          </div>

          <!-- Question 2 -->
          <div class="bg-gray-50 p-6 rounded-xl border border-gray-200">
            <label class="block mb-4">
              <div class="flex items-start gap-2 mb-3">
                <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                  <span class="text-white text-sm font-bold">2</span>
                </div>
                <div>
                  <span class="text-gray-800 text-base font-semibold font-montserrat leading-relaxed">Apakah Anda berhasil menemukan data atau informasi yang Anda cari?</span>
                  <span class="text-red-500 text-base font-semibold ml-1">*</span>
                </div>
              </div>
            </label>
            <div class="relative">
              <input
                type="text"
                name="found_info"
                class="w-full h-12 px-4 bg-white border-2 border-gray-300 rounded-lg text-gray-800 font-montserrat focus:outline-none focus:border-green-500 focus:ring-4 focus:ring-green-100 transition-all duration-200"
                placeholder="Tuliskan jawaban disini..."
                required
              >
              <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                <i class="fas fa-search text-gray-400"></i>
              </div>
            </div>
          </div>

          <!-- Question 3 -->
          <div class="bg-gray-50 p-6 rounded-xl border border-gray-200">
            <label class="block mb-4">
              <div class="flex items-start gap-2 mb-3">
                <div class="w-6 h-6 bg-amber-500 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                  <span class="text-white text-sm font-bold">3</span>
                </div>
                <div>
                  <span class="text-gray-800 text-base font-semibold font-montserrat leading-relaxed">Berikan saran dan masukan Anda untuk Stasiun Klimatologi Riau agar kami dapat memberikan layanan lebih baik lagi!</span>
                  <span class="text-gray-500 text-sm ml-1">(Opsional)</span>
                </div>
              </div>
            </label>
            <div class="relative">
              <textarea
                name="suggestions"
                rows="4"
                class="w-full p-4 bg-white border-2 border-gray-300 rounded-lg text-gray-800 font-montserrat focus:outline-none focus:border-amber-500 focus:ring-4 focus:ring-amber-100 transition-all duration-200 resize-none"
                placeholder="Tuliskan saran atau kendala disini..."
              ></textarea>
              <div class="absolute top-4 right-4 pointer-events-none">
                <i class="fas fa-lightbulb text-gray-400"></i>
              </div>
            </div>
          </div>

          <!-- Submit Button -->
          <div class="flex justify-center pt-6">
            <button
              type="submit"
              class="group relative w-64 h-14 bg-gradient-to-r from-sky-500 to-blue-600 rounded-2xl text-white font-bold text-lg font-montserrat shadow-lg hover:shadow-xl hover:from-sky-600 hover:to-blue-700 focus:outline-none focus:ring-4 focus:ring-sky-300 transition-all duration-300 transform hover:scale-105"
            >
              <span class="flex items-center justify-center gap-2">
                <i class="fas fa-paper-plane group-hover:translate-x-1 transition-transform duration-200"></i>
                Kirim Feedback
              </span>
            </button>
          </div>

          <!-- Footer Note -->
          <div class="text-center pt-4">
            <p class="text-gray-500 text-sm">
              <i class="fas fa-shield-alt mr-1"></i>
              Data Anda aman dan akan digunakan untuk meningkatkan layanan kami
            </p>
          </div>
        </form>
      </div>
    </div>
  `

  // Add modal to body
  document.body.appendChild(modal)

  // Add event listener to form
  const form = document.getElementById("feedback-form")
  if (form) {
    form.addEventListener("submit", handleFeedbackSubmitFn)
  }

  // Close modal when clicking outside
  modal.addEventListener("click", (e) => {
    if (e.target === modal) {
      closeFeedbackModal()
    }
  })

  // Focus on close button
  setTimeout(() => {
    const closeButton = modal.querySelector('button[onclick="closeFeedbackModal()"]')
    if (closeButton) {
      closeButton.focus()
    }
  }, 100)

  // Prevent body scroll
  document.body.style.overflow = "hidden"
}

/**
 * Close weather detail modal
 */
function closeWeatherDetailModal() {
  const modal = document.getElementById("weather-detail-modal")
  if (modal) {
    modal.remove()
  }

  // Restore body scroll
  document.body.style.overflow = ""
}

// ========================================
// TAB SWITCHING FUNCTIONALITY
// ========================================

/**
 * Switch to a specific tab section
 * @param {string} sectionId - The ID of the section to switch to
 */
function switchToSection(sectionId) {
    try {
        if (!sectionId) {
            console.error('No section ID provided');
            return;
        }
        // Update tab buttons
        document.querySelectorAll('.section-nav-btn').forEach(btn => {
            const isActive = btn.getAttribute('data-section') === sectionId;
            btn.classList.toggle('active', isActive);
            btn.classList.toggle('text-white', isActive);
            btn.classList.toggle('text-gray-600', !isActive);
            btn.setAttribute('aria-selected', isActive);
        });
        // Update content sections
        const sections = document.querySelectorAll('section[id^="section-"]');
        let sectionFound = false;
        let targetSection = null;
        sections.forEach(section => {
            const isMatch = section.id === `section-${sectionId}`;
            section.classList.toggle('hidden', !isMatch);
            if (isMatch) {
                sectionFound = true;
                targetSection = section;
            }
        });
        if (!sectionFound) {
            console.warn(`Section not found: section-${sectionId}`);
        } else if (targetSection && window._scrollToProfilSection) {
            // Scroll ke konten tab jika flag _scrollToProfilSection true
            const nav = document.querySelector('.profil-section-nav, .section-nav-btn')?.parentElement?.parentElement;
            const navHeight = nav ? nav.offsetHeight : 0;
            const y = targetSection.getBoundingClientRect().top + window.scrollY - navHeight - 16;
            window.scrollTo({ top: y, behavior: 'smooth' });
            window._scrollToProfilSection = false;
        }
        // Update URL jika perlu
        const url = new URL(window.location);
        url.searchParams.set('section', sectionId);
        window.history.replaceState({}, '', url);
    } catch (err) {
        console.error('Error switching tabs:', err);
    }
}

// Initialize tabs on page load
document.addEventListener('DOMContentLoaded', function() {
    // Handle tab button clicks
    document.body.addEventListener('click', function(e) {
        const btn = e.target.closest('.section-nav-btn');
        if (btn) {
            window._scrollToProfilSection = true;
            const section = btn.getAttribute('data-section');
            if (section) {
                switchToSection(section);
            }
        }
    });

    // Set initial active tab from URL or default to 'tentang'
    const params = new URLSearchParams(window.location.search);
    const initialSection = params.get('section') || 'tentang';
    switchToSection(initialSection);
});

// ========================================
// FORM LAYANAN (form-layanan.blade.php)
// ========================================

document.addEventListener('DOMContentLoaded', function() {
    // Tampilkan konten Umum secara default
    if (document.getElementById('umum-card')) {
        showServiceContent('umum');
        document.getElementById('umum-card').classList.add('border-sky-500');
    }
    // Event listener untuk kartu layanan
    ['umum','instansi','mahasiswa'].forEach(function(type) {
        var card = document.getElementById(type+'-card');
        if(card) {
            card.addEventListener('click', function() {
                showServiceContent(type);
            });
        }
    });
});

function showServiceContent(type) {
    // Sembunyikan semua konten
    var umum = document.getElementById('umum-content');
    var instansi = document.getElementById('instansi-content');
    var mahasiswa = document.getElementById('mahasiswa-content');
    var formEmbed = document.getElementById('form-embed');
    var umumCard = document.getElementById('umum-card');
    var instansiCard = document.getElementById('instansi-card');
    var mahasiswaCard = document.getElementById('mahasiswa-card');
    if (umum) umum.classList.add('hidden');
    if (instansi) instansi.classList.add('hidden');
    if (mahasiswa) mahasiswa.classList.add('hidden');
    if (formEmbed) formEmbed.classList.add('hidden');
    // Reset semua card ke default
    if (umumCard) umumCard.className = umumCard.className.replace(/border-sky-500/g, '').replace(/  +/g, ' ') + ' border-zinc-300';
    if (instansiCard) instansiCard.className = instansiCard.className.replace(/border-sky-500/g, '').replace(/  +/g, ' ') + ' border-zinc-300';
    if (mahasiswaCard) mahasiswaCard.className = mahasiswaCard.className.replace(/border-sky-500/g, '').replace(/  +/g, ' ') + ' border-zinc-300';
    // Tampilkan konten & highlight card sesuai pilihan
    if(type === 'umum') {
        if (umum) umum.classList.remove('hidden');
        if (formEmbed) formEmbed.classList.remove('hidden');
        if (umumCard) umumCard.className = umumCard.className.replace(/border-zinc-300/g, '').replace(/  +/g, ' ') + ' border-sky-500';
    } else if(type === 'instansi') {
        if (instansi) instansi.classList.remove('hidden');
        if (formEmbed) formEmbed.classList.remove('hidden');
        if (instansiCard) instansiCard.className = instansiCard.className.replace(/border-zinc-300/g, '').replace(/  +/g, ' ') + ' border-sky-500';
    } else if(type === 'mahasiswa') {
        if (mahasiswa) mahasiswa.classList.remove('hidden');
        if (formEmbed) formEmbed.classList.remove('hidden');
        if (mahasiswaCard) mahasiswaCard.className = mahasiswaCard.className.replace(/border-zinc-300/g, '').replace(/  +/g, ' ') + ' border-sky-500';
    }
}

// Make modal functions globally available
window.closeFeedbackModal = closeFeedbackModal

// Make service click handler globally available
window.handleServiceClick = handleServiceClick

console.log("📦 BMKG Scripts loaded successfully!")
