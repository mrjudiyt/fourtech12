// Custom JavaScript for Gaming Website

// Simple Image Slider
let currentSlide = 0;

function showSlide(index) {
    const slides = document.querySelectorAll('.slider-item');
    
    // Hide all slides
    slides.forEach(slide => {
        slide.style.display = 'none';
    });

    // Show the selected slide
    slides[index].style.display = 'block';
}

function nextSlide() {
    currentSlide = (currentSlide + 1) % document.querySelectorAll('.slider-item').length;
    showSlide(currentSlide);
}

function prevSlide() {
    currentSlide = (currentSlide - 1 + document.querySelectorAll('.slider-item').length) % document.querySelectorAll('.slider-item').length;
    showSlide(currentSlide);
}

// Initial setup
document.addEventListener('DOMContentLoaded', function() {
    showSlide(currentSlide);
    setInterval(nextSlide, 5000); // Auto-advance every 5 seconds
});