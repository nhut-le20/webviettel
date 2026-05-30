<?php
// Trang chi tiết dịch vụ Hợp đồng điện tử
?>
<video autoplay muted loop playsinline class="video-bg">
    <source src="video/videoHDDT.WEBM" type="video/webm">
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
        <p class="eyebrow">Hợp đồng điện tử</p>
        <h1>Tạo - gửi - ký - lưu trữ hợp đồng tập trung, đúng pháp lý</h1>
        <p>Giải pháp hợp đồng điện tử Viettel tối ưu hóa quy trình soạn thảo, phê duyệt và quản lý phiên bản hợp đồng, giảm giấy tờ và tăng tốc độ ký.</p>
    </div>
</section>

<section class="section">
    <div class="container section-heading">
        <p class="eyebrow">Tổng quan</p>
        <h2>Một luồng ký số rõ ràng, dễ vận hành</h2>
        <p>Hợp đồng điện tử Viettel là dịch vụ số hóa cho phép doanh nghiệp quản lý hợp đồng và tài liệu thông qua mạng Internet. Các doanh nghiệp hoàn toàn có thể thực hiện các giao dịch, ký kết hợp đồng mà không cần phải gặp mặt trực tiếp hoặc sử dụng các thủ tục giấy tờ truyền thống.</p>
        <div class="row g-4 mt-4">
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title text-danger">Tạo hợp đồng</h5>
                        <p class="card-text text-muted">Tạo, gửi tài liệu và gửi thông báo nhắc nhở đến các bên tham gia ký kết.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title text-danger">Đa dạng hình thức ký</h5>
                        <p class="card-text text-muted">Hỗ trợ Token CA, OTP, ký tự động và linh hoạt trên nhiều thiết bị.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title text-danger">Lưu trữ tập trung</h5>
                        <p class="card-text text-muted">Quản lý phiên bản hợp đồng, ký đồng loạt và kết nối với ERP, CRM.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container section-heading">
        <p class="eyebrow">Lợi ích</p>
        <h2>Tối ưu hóa quy trình hợp đồng, giảm thời gian ký</h2>
        <p>Giải pháp giúp doanh nghiệp loại bỏ giấy tờ truyền thống, tăng tốc độ ký kết và đảm bảo giá trị pháp lý đầy đủ theo luật giao dịch điện tử.</p>
        <div class="row g-4 mt-4">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm bg-white h-100">
                    <div class="card-body">
                        <h5 class="card-title text-danger">Giảm chi phí</h5>
                        <p class="card-text text-muted">Tiết kiệm chi phí in ấn, gửi fax và lưu trữ hồ sơ giấy tờ.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-0 shadow-sm bg-white h-100">
                    <div class="card-body">
                        <h5 class="card-title text-danger">Đảm bảo pháp lý</h5>
                        <p class="card-text text-muted">Tuân thủ Luật giao dịch điện tử 2005 và có giá trị pháp lý đầy đủ.</p>
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

