<section class="section">
    <div class="container testimonial-slider" data-slider>
        <div class="section-heading align-left">
            <p class="eyebrow">Khách hàng và đối tác</p>
            <h2>Được tin dùng bởi các đội ngũ đang tăng tốc chuyển đổi số</h2>
        </div>
        <div class="logo-strip" aria-label="Logo đối tác">
            <span>Viettel</span>
            <span>VNPT</span>
            <span>FPT</span>
            <span>MISA</span>
            <span>SME Hub</span>
        </div>
        <div class="slides" aria-live="polite">
            <?php foreach (getTestimonials() as $index => $testimonial): ?>
                <blockquote class="testimonial <?php echo $index === 0 ? 'is-active' : ''; ?>" data-slide>
                    <p>"<?php echo e($testimonial['quote']); ?>"</p>
                    <footer>
                        <strong><?php echo e($testimonial['name']); ?></strong>
                        <span><?php echo e($testimonial['role']); ?></span>
                    </footer>
                </blockquote>
            <?php endforeach; ?>
        </div>
        <div class="slider-controls">
            <button type="button" data-slide-prev aria-label="Nhận xét trước">Trước</button>
            <button type="button" data-slide-next aria-label="Nhận xét tiếp theo">Sau</button>
        </div>
    </div>
</section>
