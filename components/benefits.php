<section class="section benefits-section">
    <div class="container section-heading">
        <p class="eyebrow">Lợi ích</p>
        <h2>Tối ưu vận hành từ trải nghiệm người dùng đến quản trị rủi ro</h2>
    </div>
    <div class="container benefits-grid">
        <?php foreach (getBenefits() as $benefit): ?>
            <article class="benefit-item reveal">
                <span class="icon-badge icon-<?php echo e($benefit['icon']); ?>" aria-hidden="true"></span>
                <h3><?php echo e($benefit['title']); ?></h3>
                <p><?php echo e($benefit['description']); ?></p>
            </article>
        <?php endforeach; ?>
    </div>
</section>
