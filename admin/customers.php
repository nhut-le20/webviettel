<?php

require_once __DIR__ . '/../includes/session.php';
requireAdmin();

$adminTitle = 'Khách hàng';
$activeAdminPage = 'customers';
$customers = [
    ['name' => 'Công ty ABC', 'service' => 'Internet doanh nghiệp', 'status' => 'Đang tư vấn'],
    ['name' => 'Chuỗi bán lẻ XYZ', 'service' => 'Cloud và bảo mật', 'status' => 'Đang triển khai'],
];

?>
<?php require __DIR__ . '/partials/header.php'; ?>
<div class="container">
    <p class="eyebrow">Admin</p>
    <h1>Khách hàng</h1>
    <div class="cards-grid">
        <?php foreach ($customers as $customer): ?>
            <article class="service-card">
                <h2><?php echo e($customer['name']); ?></h2>
                <p><?php echo e($customer['service']); ?></p>
                <strong><?php echo e($customer['status']); ?></strong>
            </article>
        <?php endforeach; ?>
    </div>
</div>
<?php require __DIR__ . '/partials/footer.php'; ?>
