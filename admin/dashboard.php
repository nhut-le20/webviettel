<?php

require_once __DIR__ . '/../includes/session.php';
requireAdmin();

$adminTitle = 'Dashboard';
$activeAdminPage = 'dashboard';

?>
<?php require __DIR__ . '/partials/header.php'; ?>
<div class="container">
    <p class="eyebrow">Admin</p>
    <h1>Bảng điều khiển</h1>
    <div class="stats-grid admin-stats">
        <article>
            <strong>12</strong>
            <span>Yêu cầu tư vấn</span>
        </article>
        <article>
            <strong>8</strong>
            <span>Dịch vụ đang hiển thị</span>
        </article>
        <article>
            <strong>3</strong>
            <span>Bài viết nháp</span>
        </article>
    </div>
</div>
<?php require __DIR__ . '/partials/footer.php'; ?>
