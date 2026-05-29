<section class="section page-hero">
    <div class="container narrow">
        <p class="eyebrow">Dịch vụ</p>
        <h1>Danh mục giải pháp cho kết nối, nội dung và nền tảng số.</h1>
        <p>Thiết kế theo nhu cầu vận hành của cửa hàng, văn phòng, chuỗi bán lẻ và doanh nghiệp nhiều chi nhánh.</p>
    </div>
</section>

<?php
$serviceSlug = trim((string)($_GET['service'] ?? ''));

$services = getServices();
$matchedService = null;

if ($serviceSlug !== '') {
    foreach ($services as $s) {
        $slug = (string)($s['slug'] ?? '');
        if ($slug !== '' && $slug === $serviceSlug) {
            $matchedService = $s;
            break;
        }
    }
}
?>

<?php if ($matchedService !== null): ?>
    <section class="section">
        <div class="container section-heading">
            <p class="eyebrow">Dịch vụ</p>
            <h2><?= htmlspecialchars((string)$matchedService['title'], ENT_QUOTES, 'UTF-8') ?></h2>
            <p><?= htmlspecialchars((string)$matchedService['description'], ENT_QUOTES, 'UTF-8') ?></p>
        </div>

        <div class="container" style="margin-top:24px;">
            <a class="text-link" href="<?= htmlspecialchars(appUrl('services.php'), ENT_QUOTES, 'UTF-8') ?>">&larr; Quay lại danh sách</a>
        </div>
    </section>
<?php else: ?>
    <?php require __DIR__ . '/../components/services.php'; ?>
<?php endif; ?>

<section class="section muted-section">

    <div class="container process-grid">
        <article><span>01</span><h3>Tư vấn</h3><p>Làm rõ nghiệp vụ cần số hóa và mục tiêu chuyển đổi.</p></article>
        <article><span>02</span><h3>Thiết kế</h3><p>Chọn dịch vụ, luồng phê duyệt và tích hợp phù hợp.</p></article>
        <article><span>03</span><h3>Vận hành</h3><p>Theo dõi sử dụng, tiếp nhận yêu cầu và tối ưu định kỳ.</p></article>
    </div>
</section>
