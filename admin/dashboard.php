<?php

require_once __DIR__ . '/../includes/session.php';
require_once __DIR__ . '/../includes/contacts.php';
requireAdmin();

$adminTitle = 'Dashboard';
$activeAdminPage = 'dashboard';
$stats = [
    'total' => 0,
    'today' => 0,
    'popular_service' => null,
    'latest' => [],
];
$statsError = '';

try {
    $stats = getContactStats();
} catch (PDOException $e) {
    error_log($e->getMessage());
    $statsError = 'Không thể tải thống kê liên hệ lúc này.';
}

?>
<?php require __DIR__ . '/partials/header.php'; ?>
<div class="container">
    <p class="eyebrow">Admin</p>
    <h1>Bảng điều khiển</h1>
    <?php if ($statsError !== ''): ?>
        <p class="form-alert" role="alert"><?php echo e($statsError); ?></p>
    <?php endif; ?>
    <div class="stats-grid admin-stats">
        <article>
            <strong><?php echo e((string) $stats['total']); ?></strong>
            <span>Tổng liên hệ</span>
        </article>
        <article>
            <strong><?php echo e((string) $stats['today']); ?></strong>
            <span>Liên hệ hôm nay</span>
        </article>
        <article>
            <strong><?php echo e((string) ($stats['popular_service']['total'] ?? 0)); ?></strong>
            <span><?php echo e((string) ($stats['popular_service']['service'] ?? 'Chưa có dịch vụ nổi bật')); ?></span>
        </article>
    </div>

    <section class="admin-panel">
        <div class="admin-panel-heading">
            <div>
                <p class="eyebrow">Mới nhất</p>
                <h2>Liên hệ gần đây</h2>
            </div>
            <a class="btn btn-small" href="<?php echo e(appUrl('admin/customers.php')); ?>">Xem tất cả</a>
        </div>

        <?php if (empty($stats['latest'])): ?>
            <p class="admin-empty">Chưa có khách hàng đăng ký tư vấn.</p>
        <?php else: ?>
            <div class="admin-table-wrap">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Khách hàng</th>
                            <th>Số điện thoại</th>
                            <th>Dịch vụ</th>
                            <th>Ngày gửi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($stats['latest'] as $contact): ?>
                            <tr>
                                <td><?php echo e((string) $contact['name']); ?></td>
                                <td><?php echo e((string) $contact['phone']); ?></td>
                                <td><?php echo e((string) $contact['service']); ?></td>
                                <td><?php echo e(date('H:i d/m/Y', strtotime((string) $contact['created_at']))); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </section>
</div>
<?php require __DIR__ . '/partials/footer.php'; ?>
 
