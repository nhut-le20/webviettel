<?php

require_once __DIR__ . '/../includes/session.php';
require_once __DIR__ . '/../includes/contacts.php';
requireAdmin();

$adminTitle = 'Quản lý khách hàng';
$activeAdminPage = 'customers';

$filters = [
    'q' => trim((string) ($_GET['q'] ?? '')),
    'service' => trim((string) ($_GET['service'] ?? '')),
];
$page = max(1, (int) ($_GET['page'] ?? 1));
$perPage = 15;
$services = [];
$result = [
    'items' => [],
    'total' => 0,
    'page' => $page,
    'per_page' => $perPage,
    'pages' => 1,
];
$loadError = '';

try {
    $services = getContactServices();
    $result = getContacts($filters, $page, $perPage);
} catch (PDOException $e) {
    error_log($e->getMessage());
    $loadError = 'Không thể tải danh sách khách hàng lúc này.';
}

$buildPageUrl = static function (int $targetPage) use ($filters): string {
    $params = array_filter([
        'q' => $filters['q'],
        'service' => $filters['service'],
        'page' => $targetPage,
    ], static fn ($value): bool => $value !== '' && $value !== null);

    return appUrl('admin/customers.php' . ($params ? '?' . http_build_query($params) : ''));
};

?>
<?php require __DIR__ . '/partials/header.php'; ?>
<div class="container">
    <div class="admin-panel-heading">
        <div>
            <p class="eyebrow">Admin</p>
            <h1>Danh sách khách hàng</h1>
        </div>
        <span class="admin-count"><?php echo e((string) $result['total']); ?> liên hệ</span>
    </div>

    <?php if (($_GET['created'] ?? '') === '1'): ?>
        <p class="form-alert form-alert-success" role="status">Đã lưu liên hệ mới.</p>
    <?php endif; ?>

    <?php if ($loadError !== ''): ?>
        <p class="form-alert" role="alert"><?php echo e($loadError); ?></p>
    <?php endif; ?>

    <form class="admin-filter" method="get" action="<?php echo e(appUrl('admin/customers.php')); ?>">
        <label>
            Tìm kiếm
            <input
                type="search"
                name="q"
                value="<?php echo e($filters['q']); ?>"
                placeholder="Tên, số điện thoại hoặc nội dung"
            >
        </label>
        <label>
            Dịch vụ
            <select name="service">
                <option value="">Tất cả dịch vụ</option>
                <?php foreach ($services as $service): ?>
                    <option value="<?php echo e((string) $service); ?>" <?php echo $filters['service'] === $service ? 'selected' : ''; ?>>
                        <?php echo e((string) $service); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </label>
        <button class="btn btn-small" type="submit">Lọc</button>
        <a class="admin-link" href="<?php echo e(appUrl('admin/customers.php')); ?>">Xóa lọc</a>
    </form>

    <section class="admin-panel">
        <?php if (empty($result['items'])): ?>
            <p class="admin-empty">Chưa có dữ liệu khách hàng phù hợp.</p>
        <?php else: ?>
            <div class="admin-table-wrap">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Họ tên</th>
                            <th>Số điện thoại</th>
                            <th>Dịch vụ</th>
                            <th>Nội dung</th>
                            <th>Ngày gửi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($result['items'] as $customer): ?>
                            <tr>
                                <td class="text-muted">#<?php echo e((string) $customer['id']); ?></td>
                                <td><strong><?php echo e((string) ($customer['name'] ?? '')); ?></strong></td>
                                <td><a class="admin-link" href="tel:<?php echo e((string) ($customer['phone'] ?? '')); ?>"><?php echo e((string) ($customer['phone'] ?? '')); ?></a></td>
                                <td><span class="admin-badge"><?php echo e((string) ($customer['service'] ?? 'Chưa chọn')); ?></span></td>
                                <td><?php echo nl2br(e((string) ($customer['message'] ?? ''))); ?></td>
                                <td class="text-muted">
                                    <?php echo isset($customer['created_at']) && $customer['created_at'] !== '' ? e(date('H:i d/m/Y', strtotime((string) $customer['created_at']))) : '-'; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </section>

    <?php if ($result['pages'] > 1): ?>
        <nav class="admin-pagination" aria-label="Phân trang khách hàng">
            <?php if ($result['page'] > 1): ?>
                <a href="<?php echo e($buildPageUrl($result['page'] - 1)); ?>">Trước</a>
            <?php endif; ?>

            <span>Trang <?php echo e((string) $result['page']); ?> / <?php echo e((string) $result['pages']); ?></span>

            <?php if ($result['page'] < $result['pages']): ?>
                <a href="<?php echo e($buildPageUrl($result['page'] + 1)); ?>">Sau</a>
            <?php endif; ?>
        </nav>
    <?php endif; ?>
</div>
<?php require __DIR__ . '/partials/footer.php'; ?>
