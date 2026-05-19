<?php

require_once __DIR__ . '/../includes/session.php';
require_once __DIR__ . '/../includes/functions.php';
requireAdmin();

?>
<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quản lý dịch vụ</title>
    <link rel="stylesheet" href="../assets/css/variables.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<main class="section">
    <div class="container">
        <p class="eyebrow">Admin</p>
        <h1>Dịch vụ</h1>
        <div class="cards-grid">
            <?php foreach (getServices() as $service): ?>
                <article class="service-card">
                    <h2><?php echo htmlspecialchars($service['title'], ENT_QUOTES, 'UTF-8'); ?></h2>
                    <p><?php echo htmlspecialchars($service['description'], ENT_QUOTES, 'UTF-8'); ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</main>
</body>
</html>
