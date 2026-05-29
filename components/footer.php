</main>
<footer class="site-footer">
    <div class="container footer-grid">
        <div>
            <a class="brand footer-brand" href="<?php echo e(appUrl()); ?>">
                <span class="brand-mark" aria-hidden="true">viettel</span>
                <span class="brand-label">Dịch vụ giải pháp</span>
            </a>
            <p>Đồng hành cùng doanh nghiệp trong hạ tầng kết nối, bảo mật và chuyển đổi số.</p>
        </div>
        <address>
            <strong>Thông tin liên hệ</strong>
            <span><?php echo e(CONTACT_PHONE); ?></span>
            <span><?php echo e(CONTACT_EMAIL); ?></span>
            <span><?php echo e(CONTACT_ADDRESS); ?></span>
        </address>
        <div>
            <strong>Đường dẫn</strong>
            <a href="<?php echo e(appUrl('solutions')); ?>">Giải pháp</a>
            <a href="<?php echo e(appUrl('services')); ?>">Dịch vụ</a>
            <a href="<?php echo e(appUrl('pricing')); ?>">Bảng giá</a>
            <a href="<?php echo e(appUrl('contact')); ?>">Tư vấn</a>
        </div>
        <div>
            <strong>Chính sách</strong>
            <a href="<?php echo e(appUrl('contact')); ?>">Bảo mật dữ liệu</a>
            <a href="<?php echo e(appUrl('contact')); ?>">Điều khoản sử dụng</a>
            <a href="<?php echo e(appUrl('contact')); ?>">Hỗ trợ khách hàng</a>
        </div>
        <div>
            <strong>Mạng xã hội</strong>
            <a href="mailto:<?php echo e(CONTACT_EMAIL); ?>">Email</a>
            <a href="https://zalo.me/18008098" target="_blank" rel="noopener">Zalo</a>
            <a href="tel:18008098">Hotline</a>
        </div>
    </div>
    <div class="container footer-bottom">
        <small>&copy; <?php echo date('Y'); ?> <?php echo e(APP_NAME); ?>. All rights reserved.</small>
    </div>
</footer>
<a class="fixed-contact-btn" href="<?php echo e(appUrl('contact')); ?>" aria-label="Liên hệ tư vấn">Liên hệ</a>
<script src="<?php echo e(asset('js/navbar.js')); ?>" defer></script>
<script src="<?php echo e(asset('js/slider.js')); ?>" defer></script>
<script src="<?php echo e(asset('js/animations.js')); ?>" defer></script>
<script src="<?php echo e(asset('js/main.js')); ?>" defer></script>
</body>
</html>
