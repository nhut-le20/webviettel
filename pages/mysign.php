<?php
// Trang chi tiết dịch vụ MySign
?>
<video autoplay muted loop playsinline class="video-bg">
    <source src="video/videomysign.mp4" type="video/mp4">
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
        <p class="eyebrow">MySign</p>
        <h1>Ký số từ xa trên nền tảng đám mây</h1>
        <p>MySign giúp ký số nhanh chóng mọi lúc mọi nơi, không cần thiết bị phần cứng, phù hợp cho quy trình nội bộ và giao dịch điện tử.</p>
    </div>
</section>

<section class="section">
    <div class="container section-heading">
        <p class="eyebrow">Tổng quan</p>
        <h2>Chữ ký số từ xa linh hoạt cho doanh nghiệp</h2>
        <p>MySign cho phép ký số tiện lợi bằng trình duyệt hoặc điện thoại, giúp doanh nghiệp hoàn thiện thủ tục giấy tờ mà không cần thiết bị vật lý.</p>
        <div class="row g-4 mt-4">
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title text-danger">Ký mọi lúc</h5>
                        <p class="card-text text-muted">Thực hiện ký số trên trình duyệt và thiết bị di động mà không cần USB Token.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title text-danger">Bảo mật cao</h5>
                        <p class="card-text text-muted">Chữ ký và khóa được bảo vệ an toàn với thiết kế HSM và mã hóa nghiêm ngặt.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title text-danger">Pháp lý rõ ràng</h5>
                        <p class="card-text text-muted">Đáp ứng quy định Việt Nam và có giá trị pháp lý trong giao dịch điện tử.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container section-heading">
        <p class="eyebrow">Lợi ích</p>
        <h2>Tiết kiệm thời gian, vận hành nhanh chóng</h2>
        <p>MySign giúp doanh nghiệp ký tài liệu dễ dàng, tối ưu quá trình phê duyệt và giảm chi phí đầu tư thiết bị chữ ký số.</p>
        <div class="row g-4 mt-4">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm bg-white h-100">
                    <div class="card-body">
                        <h5 class="card-title text-danger">Tiếp cận nhanh</h5>
                        <p class="card-text text-muted">Đăng nhập và ký chỉ với vài bước, phù hợp cho nhóm làm việc phân tán.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-0 shadow-sm bg-white h-100">
                    <div class="card-body">
                        <h5 class="card-title text-danger">Giảm chi phí</h5>
                        <p class="card-text text-muted">Không cần đầu tư USB Token, giảm chi phí phần cứng và bảo trì.</p>
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

