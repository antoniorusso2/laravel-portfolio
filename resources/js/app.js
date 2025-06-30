import "./bootstrap";
import Alpine from "alpinejs";
import initCarousel from "./carousel.js";

document.addEventListener("DOMContentLoaded", () => {
    initCarousel();
});

window.Alpine = Alpine;

Alpine.start();
