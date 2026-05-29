<?php

require_once __DIR__ . '/../includes/session.php';
require_once __DIR__ . '/../includes/functions.php';
requireAdmin();

require_once __DIR__ . '/../config/database.php';

$pdo = getDatabaseConnection();

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id <= 0) {
    header('Location: customers.php');
    exit;
}

// Chỉ cập nhật nếu cột consulted tồn tại (để tránh lỗi DB)
$hasConsultedColumn = false;
try {
    $colStmt = $pdo->query("SHOW COLUMNS FROM contacts LIKE 'consulted'");
    $hasConsultedColumn = (bool)$colStmt->fetch();
} catch (Throwable $e) {
    $hasConsultedColumn = false;
}

if ($hasConsultedColumn) {
    // cập nhật consulted = 1
    $stmt = $pdo->prepare('UPDATE contacts SET consulted = 1 WHERE id = :id');
    $stmt->execute([':id' => $id]);
}

header('Location: customers.php');
exit;

