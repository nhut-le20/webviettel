<?php

require_once __DIR__ . '/../includes/session.php';
requireAdmin();

?>
<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/css/variables.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<main class="section">
    <div class="container">
        <p class="eyebrow">Admin</p>
        <h1>Bảng điều khiển</h1>
        <div class="stats-grid">
            <div><strong>12</strong><span>Yêu cầu tư vấn</span></div>
            <div><strong>8</strong><span>Dịch vụ đang hiển thị</span></div>
            <div><strong>3</strong><span>Bài viết nháp</span></div>
        </div>
    </div>
</main>
</body>
</html>
