<?php

require_once __DIR__ . '/../includes/session.php';
require_once __DIR__ . '/../includes/functions.php';
requireAdmin();

require_once __DIR__ . '/../config/database.php';

$pdo = getDatabaseConnection();

$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['news_submit'])) {

    $title = trim((string)($_POST['title'] ?? ''));
    $content = trim((string)($_POST['content'] ?? ''));

    if ($title === '' || $content === '') {
        $error = 'Vui lòng nhập tiêu đề và nội dung bài viết.';
    } else {
        $image = '';

        if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
            $uploadDir = __DIR__ . '/../assets/images/blog/';

            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $fileName = time() . '_' . basename((string)($_FILES['image']['name'] ?? ''));
            $targetFile = $uploadDir . $fileName;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                $image = 'assets/images/blog/' . $fileName;
            }
        }

        $stmt = $pdo->prepare(
            "INSERT INTO news(title, content, image) VALUES (:title, :content, :image)"
        );

        $stmt->execute([
            ':title' => $title,
            ':content' => $content,
            ':image' => $image,
        ]);

        $success = 'Đăng tin thành công!';
    }
}

// Redirect về trang admin gần nhất (nếu cần) hoặc giữ trên trang này
$baseUrl = rtrim((string)(APP_URL ?? ''), '/');
if ($baseUrl === '') {
    $baseUrl = '/webviettel-main';
}

header('Location: ' . $baseUrl . '/?page=blog&news_saved=1');
exit;

