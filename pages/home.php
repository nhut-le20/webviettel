<?php require __DIR__ . '/../components/hero.php'; ?>

<!-- Featured Pages Overview -->
<section class="section featured-pages">
    <div class="container">
        <div class="section-heading reveal">
            <p class="eyebrow">Khám phá thêm</p>
            <h2>Các mục chính</h2>
        </div>
        <div class="featured-grid reveal">
            <a href="<?php echo e(appUrl('solutions')); ?>" class="featured-card">
                <div class="featured-icon">📋</div>
                <h3>Giải pháp</h3>
                <p>Quy trình triển khai, lợi ích, và quy mô doanh nghiệp phù hợp.</p>
                <span class="featured-link">Xem chi tiết →</span>
            </a>
            <a href="<?php echo e(appUrl('services')); ?>" class="featured-card">
                <div class="featured-icon">🛠️</div>
                <h3>Dịch vụ</h3>
                <p>Danh sách dịch vụ hỗ trợ, tư vấn, và bảo trì toàn diện.</p>
                <span class="featured-link">Xem chi tiết →</span>
            </a>
            <a href="<?php echo e(appUrl('pricing')); ?>" class="featured-card">
                <div class="featured-icon">💰</div>
                <h3>Bảng giá</h3>
                <p>Gói giá linh hoạt, so sánh tính năng và chọn phù hợp.</p>
                <span class="featured-link">Xem chi tiết →</span>
            </a>
            <a href="<?php echo e(appUrl('blog')); ?>" class="featured-card">
                <div class="featured-icon">📰</div>
                <h3>Tin tức</h3>
                <p>Cập nhật công nghệ, bài viết, và kiến thức chuyên sâu.</p>
                <span class="featured-link">Xem chi tiết →</span>
            </a>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section cta-section" style="background: linear-gradient(135deg, #EE0033 0%, #CC0033 100%); padding: 80px 0; position: relative; overflow: hidden;">
    <div class="container" style="position: relative; z-index: 1; text-align: center; color: #fff;">
        <h2 style="margin-bottom: 24px; font-size: 42px; line-height: 1.2;">Sẵn sàng bắt đầu?</h2>
        <p style="margin-bottom: 32px; font-size: 18px; max-width: 600px; margin-left: auto; margin-right: auto; opacity: 0.92;">Liên hệ với đội tư vấn của chúng tôi để tìm giải pháp phù hợp nhất cho doanh nghiệp của bạn.</p>
        <a class="btn btn-secondary" href="<?php echo e(appUrl('contact')); ?>" style="background: #fff; color: #EE0033;">Liên hệ ngay</a>
    </div>
</section>
