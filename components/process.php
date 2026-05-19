<section class="section process-section">
    <div class="container section-heading">
        <p class="eyebrow">Quy trình hoạt động</p>
        <h2>Từ đăng ký đến vận hành chỉ trong một luồng rõ ràng</h2>
    </div>
    <div class="container timeline">
        <?php foreach (getProcessSteps() as $step): ?>
            <article class="timeline-step reveal">
                <span><?php echo e($step['step']); ?></span>
                <h3><?php echo e($step['title']); ?></h3>
                <p><?php echo e($step['description']); ?></p>
            </article>
        <?php endforeach; ?>
    </div>
</section>
