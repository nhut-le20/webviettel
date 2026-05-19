<section class="section stats-section">
    <div class="container stats-grid">
        <?php foreach (getStats() as $stat): ?>
            <div class="stat-card reveal">
                <strong><span data-counter="<?php echo e((string) $stat['value']); ?>">0</span><?php echo e($stat['suffix']); ?></strong>
                <span><?php echo e($stat['label']); ?></span>
            </div>
        <?php endforeach; ?>
    </div>
</section>

