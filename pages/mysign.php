<?php
// Trang chi tiết dịch vụ Mysign
// Trang này được render bởi index.php qua ?page=mysign
?>
    <video autoplay muted loop playsinline class="video-bg">
    <source src="video/videomysign.mp4" type="video/mp4">
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
.section-heading p::-webkit-scrollbar{
    width:6px;
}

.section-heading p::-webkit-scrollbar-track{
    background:transparent; /* ẩn nền trắng */
}

.section-heading p::-webkit-scrollbar-thumb{
    background:#ffffff;
    border-radius:20px;
    border:none;
}

.section-heading p::-webkit-scrollbar-thumb:hover{
    background:#d9d9d9;
}

/* Firefox */
.section-heading p{
    scrollbar-width:thin;
    scrollbar-color:#ffffff transparent;
}


</style>
<div class="video-overlay"></div>
    <section class="section page-hero">
        <div class="container narrow">
            <p class="eyebrow">Mysign</p>
            <h1>Ký số từ xa — tối ưu quy trình phê duyệt nội bộ</h1>
            <p>
                Trang chi tiết cho dịch vụ <strong>Mysign</strong>
            </p>
        </div>
    </section>
   <section class="section">
    <div class="container section-heading">

        <p style="color:white;" class="eyebrow">
            Tổng quan
        </p>

        <h2 style="color:white;">
            Một luồng ký số rõ ràng, dễ vận hành
        </h2>

        <p style="
            color:white;
            max-height:300px;
            overflow-y:auto;
            padding-right:10px;
        ">
            MYSIGN
            Giải pháp chữ ký số từ xa của Viettel
            Dịch vụ chữ ký số từ xa MYSIGN là một loại chữ ký điện tử sử dụng công nghệ điện toán đám mây (cloud based) có giá trị pháp lý, giúp người dùng có thể thực hiện ký số ngay trên thiết bị di động mọi lúc, mọi nơi, nhanh chóng, giảm thiểu sự phụ thuộc vào các thiết bị phần cứng như USB Token hay SIM CA..
       MySign Viettel là dịch vụ chữ ký số từ xa được phát triển bởi Viettel-CA, đơn vị chuyên cung cấp giải pháp chứng thực điện tử thuộc Viettel. Đây là một hình thức chữ ký điện tử tiên tiến, khác biệt so với các giải pháp truyền thống như USB Token hay SIM-CA nhờ việc loại bỏ hoàn toàn yêu cầu sử dụng thiết bị phần cứng để lưu trữ khóa bí mật. Thay vào đó, MySign sử dụng công nghệ HSM (Hardware Security Module) được triển khai trên máy chủ đám mây của Viettel-CA, cho phép người dùng ký số thông qua ứng dụng di động hoặc trình duyệt web với kết nối internet.

MySign được thiết kế để phục vụ nhiều đối tượng, từ cá nhân, hộ kinh doanh nhỏ lẻ đến doanh nghiệp lớn, trong các hoạt động như nộp tờ khai thuế điện tử, ký hóa đơn điện tử, xác nhận hợp đồng trực tuyến, hoặc thực hiện các giao dịch với cơ quan nhà nước qua cổng dịch vụ công quốc gia. Giải pháp này tuân thủ nghiêm ngặt các quy định pháp lý tại Việt Nam, bao gồm Luật Giao dịch điện tử 2005, Nghị định 130/2018/NĐ-CP và Thông tư 16/2019/TT-BTTTT, đồng thời đạt các tiêu chuẩn quốc tế như eIDAS (Electronic Identification, Authentication and Trust Services) của Liên minh châu Âu.
        </p>
    </div>
</section>
    <?php
    // Nếu hệ thống của bạn đã có section quy trình/FAQ/contact thì giữ nguyên để đồng bộ giao diện.
    require __DIR__ . '/../components/process.php';
    require __DIR__ . '/../components/contact-section.php';
    require __DIR__ . '/../components/faq.php';
    ?>

