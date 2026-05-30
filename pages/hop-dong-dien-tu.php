<?php
// Trang chi tiết dịch vụ Hợp đồng điện tử
?>
<video autoplay muted loop playsinline class="video-bg">
    <source src="video/videoHDDT.WEBM" type="video/mp4">
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
    <section class="section page-hero">
        <div class="container narrow">
            <p class="eyebrow">Hợp đồng điện tử</p>
            <h1>Tạo - gửi - ký - lưu trữ hợp đồng tập trung, đúng pháp lý</h1>
            <p>
                Trang chi tiết cho dịch vụ <strong>Hợp đồng điện tử</strong>. Tối ưu hóa quy trình soạn thảo,
                luân chuyển phê duyệt và quản lý phiên bản hợp đồng, giảm giấy tờ và tăng tốc độ ký.
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
            Hợp đồng điện tử Viettel là một dạng hợp đồng được thực hiện dưới dạng điện tử. Đây được xem là dịch vụ số hóa cho phép doanh nghiệp quản lý hợp đồng, tài liệu với khách hàng thông qua mạng Internet., website, email hoặc các nền tảng trực tuyến khác của Tập đoàn Viettel. Các doanh nghiệp hoàn toàn có thể thực hiện các giao dịch, ký kết hợp đồng và thực hiện các cam kết mà không cần phải gặp mặt trực tiếp hoặc sử dụng các thủ tục giấy tờ truyền thống.

Theo điều 33 và điều 34 của Luật giao dịch điện tử 2005, thì hợp đồng điện tử được coi là hợp đồng thiết lập dưới dạng thông điệp dữ liệu và có giá trị pháp lý theo quy định của luật này. Vì vậy, hợp đồng điện tử Viettel cũng có giá trị pháp lý tương đương đương như một hợp đồng điện tử theo luật định.

Điều 33. Hợp đồng điện tử: Hợp đồng điện tử là hợp đồng được thiết lập dưới dạng thông điệp dữ liệu theo quy định của Luật này.
Điều 34. Thừa nhận giá trị pháp lý của hợp đồng điện tử: Giá trị pháp lý của hợp đồng điện tử không thể bị phủ nhận chỉ vì hợp đồng đó được thể hiện dưới dạng thông điệp dữ liệu
Hợp đồng điện tử vContract có những tính năng cụ thể như sau:

Tạo hợp đồng, gửi tài liệu, lưu trữ, gửi thông báo nhắc nhở đến các bên tham gia ký kết hợp đồng
Đa dạng nhiều hình thức ký số như Token CA, OTP, ký tự động . 
Cho phép doanh nghiệp ký linh hoạt trên nhiều thiết bị như smartphone, máy tính bảng và máy tính để bàn mọi lúc, mọi nơi
Doanh nghiệp có thể ký đồng loạt nhiều hợp đồng cùng một lúc
Hợp đồng điện tử Viettel có khả năng tương thích với các phần mềm khác như HRM, CRM, ERP …. 
Đáp ứng đầy đủ các tiêu chuẩn pháp lý theo quy định của Luật Giao dịch điện tử và các văn bản pháp luật liên quan khác.
        </p>
    </div>
</section>
    <?php
    require __DIR__ . '/../components/process.php';
    require __DIR__ . '/../components/contact-section.php';
    require __DIR__ . '/../components/faq.php';
    ?>

