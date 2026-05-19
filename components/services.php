<section class="section" id="solutions">
    <div class="container section-heading">
        <p class="eyebrow">Dịch vụ nổi bật</p>
        <h2>Bộ giải pháp số hóa cho mọi nghiệp vụ cốt lõi</h2>
        <p>Lựa chọn từng dịch vụ riêng lẻ hoặc kết hợp thành gói tổng thể cho tài chính, nhân sự, bán hàng và vận hành.</p>
    </div>
    <div class="container cards-grid">
        <?php foreach (getServices() as $service): ?>
            <article class="service-card reveal">
                <span class="icon-badge icon-<?php echo e($service['icon']); ?>" aria-hidden="true"></span>
                <h3><?php echo e($service['title']); ?></h3>
                <p><?php echo e($service['description']); ?></p>
                <a class="text-link" href="<?php echo e(APP_URL); ?>/contact">Xem chi tiết</a>
            </article>
        <?php endforeach; ?>
    </div>
</section>
