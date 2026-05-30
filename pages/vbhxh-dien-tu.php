<?php
// Trang chi tiết dịch vụ BHXH điện tử
?>
<video autoplay muted loop playsinline class="video-bg">
    <source src="video/videovBGXHDT.webm" type="video/webm">
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
        <p class="eyebrow">BHXH điện tử</p>
        <h1>Quản lý hồ sơ BHXH trực tuyến, chính xác và minh bạch</h1>
        <p>Giải pháp BHXH điện tử Viettel giúp doanh nghiệp kê khai, theo dõi và lưu trữ hồ sơ bảo hiểm xã hội hiệu quả.</p>
    </div>
</section>

<section class="section">
    <div class="container section-heading">
        <p class="eyebrow">Tổng quan</p>
        <h2>Quản lý bảo hiểm xã hội không giấy tờ</h2>
        <p>Hệ thống tự động cập nhật dữ liệu đơn vị, giảm sai sót thủ công và giúp đơn vị tuân thủ quy định báo cáo BHXH.</p>
        <div class="row g-4 mt-4">
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title text-danger">Kê khai tự động</h5>
                        <p class="card-text text-muted">Giảm thiểu lỗi nhập liệu và đảm bảo tiêu chuẩn dữ liệu đúng quy định.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title text-danger">Theo dõi tiến độ</h5>
                        <p class="card-text text-muted">Xem trạng thái xử lý hồ sơ BHXH theo từng đơn vị và kỳ báo cáo.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title text-danger">Lưu trữ số</h5>
                        <p class="card-text text-muted">Hồ sơ BHXH được lưu trữ tập trung, dễ dàng tra cứu khi cần.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container section-heading">
        <p class="eyebrow">Lợi ích</p>
        <h2>Giảm chi phí, tăng tốc quy trình BHXH</h2>
        <p>Doanh nghiệp có thể xử lý hồ sơ nhanh hơn, đối chiếu dữ liệu chính xác và giảm thiểu rủi ro phạt do sai sót.</p>
        <div class="row g-4 mt-4">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm bg-white h-100">
                    <div class="card-body">
                        <h5 class="card-title text-danger">Tối ưu vận hành</h5>
                        <p class="card-text text-muted">Tiết kiệm thời gian cho bộ phận nhân sự và kế toán.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-0 shadow-sm bg-white h-100">
                    <div class="card-body">
                        <h5 class="card-title text-danger">Đảm bảo tuân thủ</h5>
                        <p class="card-text text-muted">Bảo đảm dữ liệu BHXH chuẩn quy định và dễ dàng kiểm tra.</p>
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

