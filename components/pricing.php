<section class="section muted-section">
    <div class="container section-heading">
        <p class="eyebrow">Bảng giá tham khảo</p>
        <h2>Gói dịch vụ linh hoạt theo mức độ số hóa</h2>
        <p>Bắt đầu nhanh với một dịch vụ, sau đó mở rộng thành hệ sinh thái quản trị số khi doanh nghiệp tăng trưởng.</p>
    </div>
    <div class="container pricing-grid">
        <?php foreach (getPricingPlans() as $plan): ?>
            <article class="pricing-card <?php echo !empty($plan['featured']) ? 'is-featured' : ''; ?> reveal">
                <h3><?php echo e($plan['name']); ?></h3>
                <p><?php echo e($plan['description']); ?></p>
                <strong><?php echo e($plan['price']); ?></strong>
                <ul>
                    <?php foreach ($plan['features'] as $feature): ?>
                        <li><?php echo e($feature); ?></li>
                    <?php endforeach; ?>
                </ul>
                <a class="btn btn-full" href="<?php echo e(appUrl('contact')); ?>">Đăng ký tư vấn</a>
            </article>
        <?php endforeach; ?>
    </div>
</section>
