<?php
// Trang chi tiết dịch vụ Chữ ký số CA
?>

    <section class="section page-hero">
        <div class="container narrow">
            <p class="eyebrow">Chữ ký số CA</p>
            <h1>Chứng thư số an toàn — xác thực giao dịch điện tử</h1>
            <p>
                Trang chi tiết cho dịch vụ <strong>Chữ ký số CA</strong>. Hỗ trợ doanh nghiệp/đơn vị sử dụng chứng thư số
                tin cậy để ký số, đảm bảo tính toàn vẹn dữ liệu và giá trị pháp lý của giao dịch.
            </p>
        </div>
    </section>

    <section class="section">
        <div class="container section-heading">
            <p class="eyebrow">Tổng quan</p>
            <h2>Bảo mật theo chuẩn — tin cậy khi ký số</h2>
            <p>
                Chứng thư số CA giúp xác thực danh tính người ký bằng cơ chế kiểm tra nguồn gốc và tính toàn vẹn dữ liệu.
                Từ đó giảm rủi ro giả mạo và tăng mức độ sẵn sàng cho hệ thống giao dịch điện tử.
            </p>
        </div>

        <div class="container" style="margin-top:24px;">
            <div class="cards-grid" style="gap:16px;">
                <article class="glass-card" style="padding:20px;">
                    <h3 style="margin:0 0 10px;">Xác thực danh tính</h3>
                    <p style="margin:0; color:rgba(255,255,255,.8);">
                        Đảm bảo chữ ký số gắn đúng người ký và được kiểm chứng.
                    </p>
                </article>
                <article class="glass-card" style="padding:20px;">
                    <h3 style="margin:0 0 10px;">Tính toàn vẹn</h3>
                    <p style="margin:0; color:rgba(255,255,255,.8);">
                        Dữ liệu không bị thay đổi trái phép sau khi ký.
                    </p>
                </article>
                <article class="glass-card" style="padding:20px;">
                    <h3 style="margin:0 0 10px;">Giá trị pháp lý</h3>
                    <p style="margin:0; color:rgba(255,255,255,.8);">
                        Phục vụ tuân thủ quy định và lưu trữ chứng từ số.
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

