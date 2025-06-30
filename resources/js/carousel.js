export default function initCarousel(carouselSelector = "[data-carousel]") {
    document.querySelectorAll(carouselSelector).forEach((carousel) => {
        const slides = carousel.querySelectorAll(".media-slide");
        const dots = carousel.querySelectorAll(".dot");
        const prevBtn = carousel.querySelector(".carousel-prev");
        const nextBtn = carousel.querySelector(".carousel-next");

        let currentIndex = 0;

        function showSlide(index) {
            slides.forEach((slide, i) => {
                if (i === index) {
                    slide.classList.add("opacity-100", "z-10");
                    slide.classList.remove("opacity-0", "z-0");
                } else {
                    slide.classList.remove("opacity-100", "z-10");
                    slide.classList.add("opacity-0", "z-0");
                }
            });

            dots.forEach((dot, i) => {
                dot.classList.toggle("bg-cyan-600", i === index);
                dot.classList.toggle("bg-gray-300", i !== index);
            });

            currentIndex = index;
        }

        prevBtn?.addEventListener("click", () => {
            let newIndex = (currentIndex - 1 + slides.length) % slides.length;
            showSlide(newIndex);
        });

        nextBtn?.addEventListener("click", () => {
            let newIndex = (currentIndex + 1) % slides.length;
            showSlide(newIndex);
        });

        dots.forEach((dot) => {
            dot.addEventListener("click", () => {
                const index = parseInt(dot.getAttribute("data-index"));
                showSlide(index);
            });
        });

        showSlide(currentIndex);
    });
}
