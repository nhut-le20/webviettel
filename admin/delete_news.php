<?php

require_once __DIR__ . '/../includes/session.php';
require_once __DIR__ . '/../includes/functions.php';
requireAdmin();

require_once __DIR__ . '/../config/database.php';

$pdo = getDatabaseConnection();

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

if ($id <= 0) {
    header('Location: ' . appUrl('admin/news.php'));
    exit;
}

// Lấy ảnh hiện tại để xóa file (nếu có)
$stmt = $pdo->prepare('SELECT image FROM news WHERE id = ? LIMIT 1');
$stmt->execute([$id]);
$row = $stmt->fetch();

$imgPath = is_array($row) ? (string)($row['image'] ?? '') : '';

$delete = $pdo->prepare('DELETE FROM news WHERE id = ?');
$delete->execute([$id]);

// Xóa file ảnh khỏi server
if (!empty($imgPath) && is_string($imgPath)) {
    $absolute = __DIR__ . '/../' . ltrim($imgPath, '/');
    if (file_exists($absolute)) {
        @unlink($absolute);
    }
}

header('Location: ' . appUrl('admin/news.php'));
exit;

