<?php
// Trang chi tiết dịch vụ Kế toán Viettel
?>
<video autoplay muted loop playsinline class="video-bg">
    <source src="video/KTVIETTEL.webm" type="video/mp4">
</video>
<style>
.video-bg{
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    object-fit:cover;
    z-index:-2;
}

.video-overlay{
    position:fixed;
    inset:0;
    background:rgba(0,0,0,0.5);
    z-index:-1;
}
</style>
    <section class="section page-hero">
        <div class="container narrow">
            <p class="eyebrow">Kế toán Viettel</p>
            <h1>Quản trị tài chính — báo cáo nhanh, số liệu minh bạch</h1>
            <p>
                Trang chi tiết cho dịch vụ <strong>Kế toán Viettel</strong>. Hỗ trợ tổng hợp số liệu,
                theo dõi báo cáo và quản trị tài chính trực tuyến, giúp doanh nghiệp nắm bắt tình hình kịp thời.
            </p>
        </div>
    </section>

    <section class="section">
        <div class="container section-heading">
            <p class="eyebrow">Tổng quan</p>
            <h2>Số hóa kế toán — giảm thời gian tổng hợp</h2>
            <p>
                Tự động hóa quy trình tổng hợp dữ liệu và tạo báo cáo.
                Hỗ trợ quản trị theo kỳ và theo bộ phận giúp minh bạch vận hành.
            </p>
        </div>

        <div class="container" style="margin-top:24px;">
            <div class="cards-grid" style="gap:16px;">
                <article class="glass-card" style="padding:20px;">
                    <h3 style="margin:0 0 10px;">Tổng hợp số liệu</h3>
                    <p style="margin:0; color:rgba(255,255,255,.8);">
                        Gom dữ liệu tập trung để giảm thao tác thủ công.
                    </p>
                </article>
                <article class="glass-card" style="padding:20px;">
                    <h3 style="margin:0 0 10px;">Báo cáo theo kỳ</h3>
                    <p style="margin:0; color:rgba(255,255,255,.8);">
                        Trực quan hóa số liệu để ra quyết định nhanh.
                    </p>
                </article>
                <article class="glass-card" style="padding:20px;">
                    <h3 style="margin:0 0 10px;">Quản trị tài chính</h3>
                    <p style="margin:0; color:rgba(255,255,255,.8);">
                        Theo dõi tình hình tài chính và phân quyền truy cập.
                    </p>
                </article>
            </div>
        </div>

        <div class="container" style="margin-top:24px;">
            <a class="text-link" href="<?= htmlspecialchars(appUrl('index.php'), ENT_QUOTES, 'UTF-8') ?>?page=services">&larr; Quay lại danh sách dịch vụ</a>
        </div>
    </section>

    <?php
    require __DIR__ . '/../components/process.php';
    require __DIR__ . '/../components/contact-section.php';
    require __DIR__ . '/../components/faq.php';
    ?>

