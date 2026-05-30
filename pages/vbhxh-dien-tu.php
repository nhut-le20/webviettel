<?php
// Trang chi tiết dịch vụ Ví bảo hiểm xã hội điện tử
?>
   <video autoplay muted loop playsinline class="video-bg">
    <source src="video/videovBGXHDT.WEBM" type="video/mp4">
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
            <p class="eyebrow">Ví bảo hiểm xã hội điện tử</p>
            <h1>Quản lý hồ sơ BHXH trực tuyến — đúng quy định, gọn quy trình</h1>
            <p>
                Trang chi tiết cho dịch vụ <strong>Ví bảo hiểm xã hội điện tử</strong>. Tối ưu việc kê khai, nộp và theo dõi hồ sơ
                trực tuyến, giảm thao tác thủ công và hạn chế sai sót.
            </p>
        </div>
    </section>

    <section class="section">
        <div class="container section-heading">
            <p class="eyebrow">Tổng quan</p>
            <h2>Minh bạch trạng thái — xử lý nhanh, đúng chuẩn</h2>
            <p>
                Hệ thống giúp doanh nghiệp/đơn vị quản lý hồ sơ BHXH tập trung, theo dõi tiến độ xử lý và lưu trữ chứng từ số
                phục vụ tra cứu khi cần.
            </p>
        </div>

        <div class="container" style="margin-top:24px;">
            <div class="cards-grid" style="gap:16px;">
                <article class="glass-card" style="padding:20px;">
                    <h3 style="margin:0 0 10px;">Kê khai nhanh</h3>
                    <p style="margin:0; color:rgba(255,255,255,.8);">
                        Giảm thao tác lặp lại, chuẩn hóa dữ liệu đầu vào.
                    </p>
                </article>
                <article class="glass-card" style="padding:20px;">
                    <h3 style="margin:0 0 10px;">Theo dõi tiến độ</h3>
                    <p style="margin:0; color:rgba(255,255,255,.8);">
                        Xem trạng thái xử lý theo từng hồ sơ một cách rõ ràng.
                    </p>
                </article>
                <article class="glass-card" style="padding:20px;">
                    <h3 style="margin:0 0 10px;">Lưu trữ & tra cứu</h3>
                    <p style="margin:0; color:rgba(255,255,255,.8);">
                        Lưu chứng từ số tập trung, tra cứu tiện lợi theo thời gian.
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

