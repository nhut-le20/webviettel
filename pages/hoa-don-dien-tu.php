<?php
// Trang chi tiết dịch vụ Hóa đơn điện tử
?>
<video autoplay muted loop playsinline class="video-bg">
    <source src="video/hoadondientu.webm" type="video/webm">
</video>
<div class="video-overlay"></div>
<style>
.video-bg {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    z-index: -2;
}

.video-overlay {
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.55);
    z-index: -1;
}

.section-heading p::-webkit-scrollbar {
    width: 6px;
}

.section-heading p::-webkit-scrollbar-track {
    background: transparent;
}

.section-heading p::-webkit-scrollbar-thumb {
    background: #ffffff;
    border-radius: 20px;
}

.section-heading p {
    scrollbar-width: thin;
    scrollbar-color: #ffffff transparent;
}
</style>
<section class="section page-hero">
    <div class="container narrow">
        <p class="eyebrow">Hóa đơn điện tử</p>
        <h1>Quản lý hóa đơn điện tử nhanh chóng, an toàn và chính xác</h1>
        <p>Giải pháp hóa đơn điện tử Viettel giúp doanh nghiệp phát hành, tra cứu và lưu trữ hóa đơn theo chuẩn pháp lý, giảm thời gian xử lý và tối ưu quy trình kế toán.</p>
    </div>
</section>

<section class="section">
    <div class="container section-heading">
        <p class="eyebrow">Tổng quan</p>
        <h2>Giải pháp hóa đơn điện tử toàn diện cho doanh nghiệp</h2>
        <p>Viettel cung cấp nền tảng xuất hóa đơn, gửi thông báo, lưu trữ và đối soát tự động. Hệ thống hỗ trợ kê khai thuế và báo cáo nhanh theo quy định mới nhất.</p>
        <div class="row g-4 mt-4">
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title text-danger">Phát hành tức thì</h5>
                        <p class="card-text text-muted">Tạo và gửi hóa đơn ngay khi hoàn thành giao dịch, đồng bộ với sổ sách kế toán.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title text-danger">Tra cứu chính xác</h5>
                        <p class="card-text text-muted">Tìm kiếm theo số hóa đơn, mã khách hàng, thời gian phát hành và trạng thái.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title text-danger">Lưu trữ tuân thủ</h5>
                        <p class="card-text text-muted">Bảo mật dữ liệu theo chuẩn lưu trữ điện tử, hỗ trợ truy xuất nhanh khi cần.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container section-heading">
        <p class="eyebrow">Lợi ích</p>
        <h2>Tiết kiệm thời gian và nâng cao hiệu suất kế toán</h2>
        <p>Hóa đơn điện tử Viettel giúp doanh nghiệp giảm chi phí in ấn, hạn chế sai sót nhập liệu và gia tăng tốc độ quyết toán thuế.</p>
        <div class="row g-4 mt-4">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm bg-white h-100">
                    <div class="card-body">
                        <h5 class="card-title text-danger">Tự động hóa quy trình</h5>
                        <p class="card-text text-muted">Kết nối với ERP, CRM và phần mềm kế toán để tự động đồng bộ hóa dữ liệu.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-0 shadow-sm bg-white h-100">
                    <div class="card-body">
                        <h5 class="card-title text-danger">Đáp ứng pháp lý</h5>
                        <p class="card-text text-muted">Tuân thủ thông tư, nghị định và quy định bảo quản hồ sơ điện tử của cơ quan thuế.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-5">
            <a href="<?php echo appUrl('?page=services'); ?>" class="btn btn-outline-danger">Quay lại danh sách dịch vụ</a>
        </div>
    </div>
</section>

<?php
require __DIR__ . '/../components/process.php';
require __DIR__ . '/../components/contact-section.php';
require __DIR__ . '/../components/faq.php';
?>

