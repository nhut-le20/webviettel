<?php
// Trang chi tiết dịch vụ Quản lý nhà thuốc
?>
<video autoplay muted loop playsinline class="video-bg">
    <source src="video/QLNT.webm" type="video/webm">
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
        <p class="eyebrow">Quản lý nhà thuốc</p>
        <h1>Quản lý tồn kho • bán hàng • đơn thuốc • kết nối dữ liệu</h1>
        <p>Giải pháp quản lý nhà thuốc Viettel tối ưu việc quản lý vận hành, giảm thất thoát và nâng cao chất lượng phục vụ thông qua dữ liệu tập trung.</p>
    </div>
</section>

<section class="section">
    <div class="container section-heading">
        <p class="eyebrow">Tổng quan</p>
        <h2>Chuẩn hóa quy trình — rõ ràng từng bước</h2>
        <p>Quản lý theo dõi tồn kho, đơn thuốc và luồng bán hàng. Hỗ trợ kết nối dữ liệu theo chuẩn ngành để giảm thao tác thủ công.</p>
        <div class="row g-4 mt-4">
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title text-danger">Tồn kho thông minh</h5>
                        <p class="card-text text-muted">Theo dõi biến động và cảnh báo sớm theo ngưỡng, hạn chế tình trạng hết hàng.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title text-danger">Bán hàng & đơn thuốc</h5>
                        <p class="card-text text-muted">Luồng nhập/xuất rõ ràng, hạn chế nhầm lẫn dữ liệu và tăng tốc độ phục vụ.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title text-danger">Kết nối dữ liệu</h5>
                        <p class="card-text text-muted">Đồng bộ theo chuẩn ngành, hỗ trợ báo cáo và đối soát với các hệ thống khác.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container section-heading">
        <p class="eyebrow">Lợi ích</p>
        <h2>Tối ưu vận hành, giảm thất thoát hàng hoá</h2>
        <p>Giải pháp giúp nhà thuốc quản lý hiệu quả, giảm chi phí tồn kho, nâng cao chất lượng phục vụ và tuân thủ quy định của ngành dược.</p>
        <div class="row g-4 mt-4">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm bg-white h-100">
                    <div class="card-body">
                        <h5 class="card-title text-danger">Giảm thất thoát</h5>
                        <p class="card-text text-muted">Quản lý chặt chẽ tồn kho và hạn chế hao hụt, hỗ trợ kỳ kiểm kho dễ dàng.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-0 shadow-sm bg-white h-100">
                    <div class="card-body">
                        <h5 class="card-title text-danger">Tuân thủ pháp lý</h5>
                        <p class="card-text text-muted">Ghi chép đầy đủ theo quy định ngành dược và hỗ trợ kiểm tra đôi khi cần.</p>
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

