<?php
// Trang chi tiết dịch vụ Hóa đơn điện tử
?>
<video autoplay muted loop playsinline class="video-bg">
    <source src="video/hoadondientu.webm" type="video/mp4">
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
            <p class="eyebrow">Hóa đơn điện tử</p>
            <h1>Phát hành • quản lý • tra cứu hóa đơn điện tử dễ dàng</h1>
            <p>
                Trang chi tiết cho dịch vụ <strong>Hóa đơn điện tử</strong>. Giúp doanh nghiệp phát hành và quản lý hóa đơn
                số tập trung, hỗ trợ tra cứu nhanh để phục vụ kế toán và báo cáo.
            </p>
        </div>
    </section>
    <div class="container section-heading">

        <p style="color:white;" class="eyebrow">
            Tổng quan
        </p>

        <h2 style="color:white;">
            Hóa đơn điện tử Viettel 
            
        </h2>

        <p style="
            color:white;
            max-height:300px;
            overflow-y:auto;
            padding-right:10px;
        ">
            Hóa đơn điện tử
        </p>
    </div>
</section>

    <?php
    require __DIR__ . '/../components/process.php';
    require __DIR__ . '/../components/contact-section.php';
    require __DIR__ . '/../components/faq.php';
    ?>

