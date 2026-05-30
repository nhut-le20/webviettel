<?php
// Trang chi tiết dịch vụ Kế toán Viettel
?>
<video autoplay muted loop playsinline class="video-bg">
    <source src="video/KTVIETTEL.webm" type="video/webm">
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
        <p class="eyebrow">Kế toán Viettel</p>
        <h1>Số hóa quản trị tài chính — báo cáo nhanh, minh bạch</h1>
        <p>Giải pháp kế toán Viettel giúp chủ doanh nghiệp theo dõi số liệu tài chính, báo cáo và kiểm soát chi phí hiệu quả.</p>
    </div>
</section>

<section class="section">
    <div class="container section-heading">
        <p class="eyebrow">Tổng quan</p>
        <h2>Quản lý tài chính xuyên suốt với dữ liệu số</h2>
        <p>Nền tảng kế toán Viettel hợp nhất thông tin, giúp doanh nghiệp kiểm soát dòng tiền, kế hoạch ngân sách và báo cáo nhanh chóng.</p>
        <div class="row g-4 mt-4">
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title text-danger">Tổng hợp dữ liệu</h5>
                        <p class="card-text text-muted">Hợp nhất dữ liệu kế toán và tài chính vào một nền tảng duy nhất.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title text-danger">Báo cáo trực quan</h5>
                        <p class="card-text text-muted">Biểu đồ và báo cáo giúp ra quyết định nhanh chóng, chính xác.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title text-danger">Kiểm soát chi phí</h5>
                        <p class="card-text text-muted">Theo dõi chi phí, dòng tiền và phân bổ ngân sách thông minh.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container section-heading">
        <p class="eyebrow">Lợi ích</p>
        <h2>Nâng cao chất lượng quản trị và ra quyết định</h2>
        <p>Giải pháp cung cấp cảnh báo chi phí, dự báo dòng tiền và báo cáo phân tích để doanh nghiệp lập kế hoạch hiệu quả.</p>
        <div class="row g-4 mt-4">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm bg-white h-100">
                    <div class="card-body">
                        <h5 class="card-title text-danger">Minh bạch dữ liệu</h5>
                        <p class="card-text text-muted">Tất cả số liệu tài chính được hiển thị rõ ràng và cập nhật real-time.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-0 shadow-sm bg-white h-100">
                    <div class="card-body">
                        <h5 class="card-title text-danger">Quyết định nhanh</h5>
                        <p class="card-text text-muted">Báo cáo trực quan giúp lãnh đạo đánh giá hiệu quả và điều chỉnh kế hoạch kịp thời.</p>
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

