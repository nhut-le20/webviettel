document.addEventListener('DOMContentLoaded', function () {
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
