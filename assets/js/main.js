document.addEventListener('DOMContentLoaded', function () {
    /* Page transition overlay: smooth, crisp navigation */
    (function () {
        try {
            var pageOverlay = document.createElement('div');
            pageOverlay.className = 'page-transition';
            document.body.appendChild(pageOverlay);

            function isExternalLink(a) {
                var href = a.getAttribute('href') || '';
                if (!href) return true;
                if (href.indexOf('mailto:') === 0 || href.indexOf('tel:') === 0) return true;
                if (href.indexOf('http') === 0 && href.indexOf(window.location.origin) !== 0) return true;
                if (a.target === '_blank') return true;
                return false;
            }

            document.addEventListener('click', function (ev) {
                var a = ev.target.closest && ev.target.closest('a');
                if (!a) return;
                if (isExternalLink(a)) return;
                var href = a.getAttribute('href');
                if (!href || href.indexOf('#') === 0) return;
                ev.preventDefault();
                pageOverlay.classList.add('is-active');
                window.setTimeout(function () {
                    window.location.href = href;
                }, 360);
            }, true);
            // Ensure overlay is hidden on initial load or when navigating via history
            window.addEventListener('pageshow', function () {
                pageOverlay.classList.remove('is-active');
                // ensure it's hidden after a tick
                window.setTimeout(function () {
                    pageOverlay.style.display = 'none';
                }, 300);
            });
        } catch (e) {
            /* fail silently */
        }
    })();
    var form = document.querySelector('[data-contact-form]');
    var accordion = document.querySelector('[data-accordion]');

    if (accordion) {
        accordion.addEventListener('click', function (event) {
            var button = event.target.closest('button');

            if (!button) {
                return;
            }

            var item = button.closest('.accordion-item');
            var panel = item ? item.querySelector('.accordion-panel') : null;
            var isOpen = button.getAttribute('aria-expanded') === 'true';

            accordion.querySelectorAll('button').forEach(function (entry) {
                entry.setAttribute('aria-expanded', 'false');
            });
            accordion.querySelectorAll('.accordion-panel').forEach(function (entry) {
                entry.classList.remove('is-open');
            });

            if (!isOpen && panel) {
                button.setAttribute('aria-expanded', 'true');
                panel.classList.add('is-open');
            }
        });
    }

    if (form) {
        form.addEventListener('submit', function (event) {
            event.preventDefault();

            var note = form.querySelector('[data-form-note]');
            var submit = form.querySelector('button[type="submit"]');
            var formData = new FormData(form);
            var name = String(formData.get('name') || '').trim();

            if (submit) {
                submit.disabled = true;
                submit.textContent = 'Đang gửi...';
            }

            window.setTimeout(function () {
                if (note) {
                    note.textContent = name
                        ? 'Cảm ơn ' + name + ', chuyên viên sẽ liên hệ lại trong thời gian sớm nhất.'
                        : 'Cảm ơn bạn, chuyên viên sẽ liên hệ lại trong thời gian sớm nhất.';
                }

                if (submit) {
                    submit.disabled = false;
                    submit.textContent = 'Đăng ký tư vấn';
                }

                form.reset();
            }, 450);
        });
    }
});
