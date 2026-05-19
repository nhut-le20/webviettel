<section class="section faq-section">
    <div class="container faq-layout">
        <div class="section-heading align-left">
            <p class="eyebrow">FAQ</p>
            <h2>Câu hỏi thường gặp trước khi triển khai</h2>
            <p>Các thông tin cơ bản giúp đội ngũ ra quyết định nhanh hơn và chuẩn bị đầy đủ hơn.</p>
        </div>
        <div class="accordion" data-accordion>
            <?php foreach (getFaqs() as $index => $faq): ?>
                <article class="accordion-item">
                    <button type="button" aria-expanded="<?php echo $index === 0 ? 'true' : 'false'; ?>">
                        <?php echo e($faq['question']); ?>
                    </button>
                    <div class="accordion-panel <?php echo $index === 0 ? 'is-open' : ''; ?>">
                        <p><?php echo e($faq['answer']); ?></p>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
