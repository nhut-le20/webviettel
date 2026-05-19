<?php

require_once __DIR__ . '/../includes/session.php';
requireAdmin();

$customers = [
    ['name' => 'Công ty ABC', 'service' => 'Internet doanh nghiệp', 'status' => 'Đang tư vấn'],
    ['name' => 'Chuỗi bán lẻ XYZ', 'service' => 'Cloud và bảo mật', 'status' => 'Đang triển khai'],
];

?>
<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Khách hàng</title>
    <link rel="stylesheet" href="../assets/css/variables.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<main class="section">
    <div class="container">
        <p class="eyebrow">Admin</p>
        <h1>Khách hàng</h1>
        <div class="cards-grid">
            <?php foreach ($customers as $customer): ?>
                <article class="service-card">
                    <h2><?php echo htmlspecialchars($customer['name'], ENT_QUOTES, 'UTF-8'); ?></h2>
                    <p><?php echo htmlspecialchars($customer['service'], ENT_QUOTES, 'UTF-8'); ?></p>
                    <strong><?php echo htmlspecialchars($customer['status'], ENT_QUOTES, 'UTF-8'); ?></strong>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</main>
</body>
</html>
