document.addEventListener('DOMContentLoaded', function () {
    var slider = document.querySelector('[data-slider]');

    if (!slider) {
        return;
    }

    var slides = Array.prototype.slice.call(slider.querySelectorAll('[data-slide]'));
    var prev = slider.querySelector('[data-slide-prev]');
    var next = slider.querySelector('[data-slide-next]');
    var activeIndex = 0;

    if (slides.length === 0) {
        return;
    }

    function showSlide(index) {
        activeIndex = (index + slides.length) % slides.length;
        slides.forEach(function (slide, slideIndex) {
            slide.classList.toggle('is-active', slideIndex === activeIndex);
        });
    }

    if (prev) {
        prev.addEventListener('click', function () {
            showSlide(activeIndex - 1);
        });
    }

    if (next) {
        next.addEventListener('click', function () {
            showSlide(activeIndex + 1);
        });
    }
});
