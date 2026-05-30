<?php
// Trang chi tiết dịch vụ Quản lý nhà thuốc
?>
<video autoplay muted loop playsinline class="video-bg">
    <source src="video/QLNT.webm" type="video/mp4">
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
            <p class="eyebrow">Quản lý nhà thuốc</p>
            <h1>Quản lý tồn kho • bán hàng • đơn thuốc • kết nối dữ liệu</h1>
            <p>
                Trang chi tiết cho dịch vụ <strong>Quản lý nhà thuốc</strong>. Tối ưu việc quản lý vận hành,
                giảm thất thoát và nâng cao chất lượng phục vụ thông qua dữ liệu tập trung.
            </p>
        </div>
    </section>

    <section class="section">
        <div class="container section-heading">
            <p class="eyebrow">Tổng quan</p>
            <h2>Chuẩn hóa quy trình — rõ ràng từng bước</h2>
            <p>
                Quản lý theo dõi tồn kho, đơn thuốc và luồng bán hàng.
                Hỗ trợ kết nối dữ liệu theo chuẩn ngành để giảm thao tác thủ công.
            </p>
        </div>

        <div class="container" style="margin-top:24px;">
            <div class="cards-grid" style="gap:16px;">
                <article class="glass-card" style="padding:20px;">
                    <h3 style="margin:0 0 10px;">Tồn kho thông minh</h3>
                    <p style="margin:0; color:rgba(255,255,255,.8);">
                        Theo dõi biến động và cảnh báo sớm theo ngưỡng.
                    </p>
                </article>
                <article class="glass-card" style="padding:20px;">
                    <h3 style="margin:0 0 10px;">Bán hàng & đơn thuốc</h3>
                    <p style="margin:0; color:rgba(255,255,255,.8);">
                        Luồng nhập/xuất rõ ràng, hạn chế nhầm lẫn dữ liệu.
                    </p>
                </article>
                <article class="glass-card" style="padding:20px;">
                    <h3 style="margin:0 0 10px;">Kết nối dữ liệu</h3>
                    <p style="margin:0; color:rgba(255,255,255,.8);">
                        Đồng bộ theo chuẩn ngành, hỗ trợ báo cáo và đối soát.
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

