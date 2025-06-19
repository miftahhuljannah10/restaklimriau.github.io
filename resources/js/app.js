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

    mobileMenuButton.addEventListener("click", function () {
        sidebar.classList.toggle("hidden");
    });
});




import { createIcons } from 'lucide'
createIcons()
