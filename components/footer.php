</main>
<footer class="site-footer py-5 border-top bg-white">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-4">
                <a class="d-inline-flex align-items-center mb-3 text-decoration-none" href="<?php echo e(appUrl()); ?>">
                    <span class="fs-5 fw-bold text-dark">Viettel</span>
                    <span class="ms-2 text-danger">Digital</span>
                </a>
                <p class="text-muted">Đồng hành cùng doanh nghiệp trong hạ tầng kết nối, bảo mật và chuyển đổi số.</p>
            </div>
            <div class="col-lg-2">
                <h6 class="text-uppercase text-muted mb-3">Đường dẫn</h6>
                <ul class="list-unstyled">
                    <li><a class="link-secondary link-hover" href="<?php echo e(appUrl('#solutions')); ?>">Giải pháp</a></li>
                    <li><a class="link-secondary link-hover" href="<?php echo e(appUrl('services')); ?>">Dịch vụ</a></li>
                    <li><a class="link-secondary link-hover" href="<?php echo e(appUrl('pricing')); ?>">Bảng giá</a></li>
                    <li><a class="link-secondary link-hover" href="<?php echo e(appUrl('contact')); ?>">Tư vấn</a></li>
                </ul>
            </div>
            <div class="col-lg-2">
                <h6 class="text-uppercase text-muted mb-3">Chính sách</h6>
                <ul class="list-unstyled">
                    <li><a class="link-secondary link-hover" href="<?php echo e(appUrl('contact')); ?>">Bảo mật dữ liệu</a></li>
                    <li><a class="link-secondary link-hover" href="<?php echo e(appUrl('contact')); ?>">Điều khoản</a></li>
                    <li><a class="link-secondary link-hover" href="<?php echo e(appUrl('contact')); ?>">Hỗ trợ</a></li>
                </ul>
            </div>
            <div class="col-lg-4">
                <h6 class="text-uppercase text-muted mb-3">Thông tin liên hệ</h6>
                <p class="mb-1"><strong>Hotline:</strong> <?php echo e(CONTACT_PHONE); ?></p>
                <p class="mb-1"><strong>Email:</strong> <a class="link-secondary" href="mailto:<?php echo e(CONTACT_EMAIL); ?>"><?php echo e(CONTACT_EMAIL); ?></a></p>
                <p class="mb-0"><strong>Địa chỉ:</strong> <?php echo e(CONTACT_ADDRESS); ?></p>
            </div>
        </div>
        <div class="pt-4 mt-4 border-top text-muted text-center">
            <small>&copy; <?php echo date('Y'); ?> <?php echo e(APP_NAME); ?>. All rights reserved.</small>
        </div>
    </div>
</footer>

<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- AOS JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        AOS.init({
            duration: 1000,
            easing: 'ease-out-quad',
            once: true,
            mirror: false
        });
    });
</script>

<script src="<?php echo e(asset('js/navbar.js')); ?>" defer></script>
<script src="<?php echo e(asset('js/slider.js')); ?>" defer></script>
<script src="<?php echo e(asset('js/animations.js')); ?>" defer></script>
<script src="<?php echo e(asset('js/main.js')); ?>" defer></script>
</body>
</html>
