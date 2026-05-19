document.addEventListener('DOMContentLoaded', function () {
    var items = document.querySelectorAll('.reveal');
    var counters = document.querySelectorAll('[data-counter]');

    function animateCounter(counter) {
        var target = Number(counter.getAttribute('data-counter') || 0);
        var current = 0;
        var duration = 1200;
        var start = null;

        function tick(timestamp) {
            if (!start) {
                start = timestamp;
            }

            var progress = Math.min((timestamp - start) / duration, 1);
            current = Math.floor(progress * target);
            counter.textContent = current.toLocaleString('vi-VN');

            if (progress < 1) {
                window.requestAnimationFrame(tick);
            }
        }

        window.requestAnimationFrame(tick);
    }

    if (!('IntersectionObserver' in window)) {
        items.forEach(function (item) {
            item.classList.add('is-visible');
        });
        counters.forEach(animateCounter);
        return;
    }

    var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.15 });

    items.forEach(function (item) {
        observer.observe(item);
    });

    var counterObserver = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                animateCounter(entry.target);
                counterObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.4 });

    counters.forEach(function (counter) {
        counterObserver.observe(counter);
    });
});
