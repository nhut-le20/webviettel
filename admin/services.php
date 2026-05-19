<?php

require_once __DIR__ . '/../includes/session.php';
require_once __DIR__ . '/../includes/functions.php';
requireAdmin();

$adminTitle = 'Quản lý dịch vụ';
$activeAdminPage = 'services';

?>
<?php require __DIR__ . '/partials/header.php'; ?>
<div class="container">
    <p class="eyebrow">Admin</p>
    <h1>Dịch vụ</h1>
    <div class="cards-grid">
        <?php foreach (getServices() as $service): ?>
            <article class="service-card">
                <h2><?php echo e($service['title']); ?></h2>
                <p><?php echo e($service['description']); ?></p>
            </article>
        <?php endforeach; ?>
    </div>
</div>
<?php require __DIR__ . '/partials/footer.php'; ?>
