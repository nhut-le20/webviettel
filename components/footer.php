</main>
<footer class="site-footer">
    <div class="container footer-grid">
        <div>
            <a class="brand footer-brand" href="<?php echo e(APP_URL); ?>/">
                <span class="brand-mark" aria-hidden="true">V</span>
                <span><?php echo e(APP_NAME); ?></span>
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
            <a href="<?php echo e(APP_URL); ?>/#solutions">Giải pháp</a>
            <a href="<?php echo e(APP_URL); ?>/services">Dịch vụ</a>
            <a href="<?php echo e(APP_URL); ?>/pricing">Bảng giá</a>
            <a href="<?php echo e(APP_URL); ?>/contact">Tư vấn</a>
        </div>
        <div>
            <strong>Chính sách</strong>
            <a href="#">Bảo mật dữ liệu</a>
            <a href="#">Điều khoản sử dụng</a>
            <a href="#">Hỗ trợ khách hàng</a>
        </div>
        <div>
            <strong>Mạng xã hội</strong>
            <a href="#">Facebook</a>
            <a href="#">Zalo</a>
            <a href="#">LinkedIn</a>
        </div>
    </div>
    <div class="container footer-bottom">
        <small>&copy; <?php echo date('Y'); ?> <?php echo e(APP_NAME); ?>. All rights reserved.</small>
    </div>
</footer>
<script src="<?php echo e(asset('js/navbar.js')); ?>" defer></script>
<script src="<?php echo e(asset('js/slider.js')); ?>" defer></script>
<script src="<?php echo e(asset('js/animations.js')); ?>" defer></script>
<script src="<?php echo e(asset('js/main.js')); ?>" defer></script>
</body>
</html>
