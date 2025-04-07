// Simple Slider
let currentSlide = 0;
const slides = document.querySelectorAll('.slide');

function showSlide() {
    slides.forEach(slide => slide.classList.remove('active'));
    currentSlide = (currentSlide + 1) % slides.length;
    slides[currentSlide].classList.add('active');
}

setInterval(showSlide, 3000);
