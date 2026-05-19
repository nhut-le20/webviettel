<section class="section contact-section" id="contact">
    <div class="container contact-grid">
        <div class="contact-copy reveal">
            <p class="eyebrow">Liên hệ tư vấn</p>
            <h2>Sẵn sàng số hóa quy trình của bạn?</h2>
            <p>Để lại thông tin, chuyên viên sẽ liên hệ để tư vấn giải pháp, chi phí và lộ trình triển khai phù hợp.</p>
            <div class="contact-methods">
                <a href="tel:18008098">Hotline: <?php echo e(CONTACT_PHONE); ?></a>
                <a href="mailto:<?php echo e(CONTACT_EMAIL); ?>">Email: <?php echo e(CONTACT_EMAIL); ?></a>
                <a href="https://zalo.me/18008098" target="_blank" rel="noopener" aria-label="Mở Zalo chat">Chat Zalo</a>
                <a href="mailto:<?php echo e(CONTACT_EMAIL); ?>" aria-label="Gửi email tư vấn">Email tư vấn</a>
            </div>
            <div class="map-placeholder" role="img" aria-label="Vị trí công ty trên bản đồ">
                <span><?php echo e(CONTACT_ADDRESS); ?></span>
            </div>
        </div>
        <form class="contact-form glass-card reveal" action="#" method="post" data-contact-form>
            <label>Họ và tên
                <input type="text" name="name" autocomplete="name" required>
            </label>
            <label>Số điện thoại
                <input type="tel" name="phone" autocomplete="tel" required>
            </label>
            <label>Dịch vụ quan tâm
                <select name="service" required>
                    <option value="">Chọn dịch vụ</option>
                    <?php foreach (getServices() as $service): ?>
                        <option><?php echo e($service['title']); ?></option>
                    <?php endforeach; ?>
                </select>
            </label>
            <label>Nội dung
                <textarea name="message" rows="5" required></textarea>
            </label>
            <button class="btn" type="submit">Đăng ký tư vấn</button>
            <p class="form-note" data-form-note role="status"></p>
        </form>
    </div>
    <a class="mobile-call" href="tel:18008098">Gọi nhanh</a>
</section>
