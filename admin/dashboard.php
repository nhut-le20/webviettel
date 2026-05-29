<?php

require_once __DIR__ . '/../includes/session.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../includes/functions.php';
requireAdmin();

$adminTitle = 'Dashboard';
$activeAdminPage = 'dashboard';
$pdo = getDatabaseConnection();

// Đếm yêu cầu tư vấn (giảm theo số đã consulted=1)
$hasConsultedColumn = false;
try {
    $colStmt = $pdo->query("SHOW COLUMNS FROM contacts LIKE 'consulted'");
    $hasConsultedColumn = (bool)$colStmt->fetch();
} catch (Throwable $e) {
    $hasConsultedColumn = false;
}

if ($hasConsultedColumn) {
    $consultedCount = (int)$pdo->query("SELECT COUNT(*) FROM contacts WHERE consulted = 1")->fetchColumn();
    $totalContacts = (int)$pdo->query("SELECT COUNT(*) FROM contacts")->fetchColumn();
    $totalContacts = max(0, $totalContacts - $consultedCount);
} else {
    $totalContacts = $pdo->query("SELECT COUNT(*) FROM contacts")->fetchColumn();
}


// Đếm dịch vụ (có thể chưa tồn tại bảng services trong DB)
try {
    $totalServices = $pdo->query("SELECT COUNT(*) FROM services")->fetchColumn();
} catch (PDOException $e) {
    $totalServices = 0;
}

// Đếm bài viết nháp (có thể chưa tồn tại bảng posts trong DB)
try {
    $totalDrafts = $pdo->query("SELECT COUNT(*) FROM posts WHERE status = 'draft'")->fetchColumn();
} catch (PDOException $e) {
    $totalDrafts = 0;
}
$stmt = $pdo->query("
    SELECT * FROM contacts
    ORDER BY id DESC
");

$customers = $stmt->fetchAll();

// Thông báo nếu có khách đăng ký mới kể từ lần admin gần nhất truy cập dashboard
$lastSeenId = isset($_SESSION['dashboard_last_seen_contact_id'])
    ? (int)$_SESSION['dashboard_last_seen_contact_id']
    : 0;

$latestContactId = 0;
if (!empty($customers)) {
    // $customers được ORDER BY id DESC nên phần tử [0] là id mới nhất
    $latestContactId = (int)($customers[0]['id'] ?? 0);
}

$hasNewContact = ($latestContactId > $lastSeenId) && ($latestContactId > 0);


// Cập nhật mốc đã xem (để lần sau chỉ báo khi có bản ghi mới hơn)
$_SESSION['dashboard_last_seen_contact_id'] = $latestContactId;

?>

<?php require __DIR__ . '/partials/header.php'; ?>


<div class="container">

    <p class="eyebrow">Admin</p>
    <h1>Bảng điều khiển</h1>

<?php if ($hasNewContact): ?>
        <div class="success-box" style="margin:16px 0; padding:14px; border-radius:10px; background:#dcfce7; color:#166534; display:flex; align-items:center; gap:10px;">
            <span aria-hidden="true" style="font-size:18px; line-height:1;">🔔</span>
            <div>
                <div style="font-weight:700;">Bạn có khách hàng đăng ký mới!</div>
                <div style="opacity:0.9; font-size:13px;">Tổng số yêu cầu tư vấn hiện tại: <strong><?= $totalContacts ?></strong></div>
            </div>
        </div>
<?php endif; ?>





    <div class="stats-grid admin-stats">


        <article>
            <strong><?= $totalContacts ?></strong>
            <span>Yêu cầu tư vấn</span>
        </article>

        <article>
            <strong><?= $totalServices ?></strong>
            <span>Dịch vụ đang hiển thị</span>
        </article>

        <article>
            <strong><?= $totalDrafts ?></strong>
            <span>Bài viết nháp</span>
        </article>

    </div>

</div>

<?php require __DIR__ . '/partials/footer.php'; ?>