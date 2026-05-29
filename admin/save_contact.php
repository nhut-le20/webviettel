<?php

require_once __DIR__ . '/../config/database.php';

$pdo = getDatabaseConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = trim((string)($_POST['fullname'] ?? $_POST['name'] ?? ''));
    $email = trim((string)($_POST['email'] ?? ''));
    $phone = trim((string)($_POST['phone'] ?? ''));
    $service = trim((string)($_POST['service'] ?? ''));
    $message = trim((string)($_POST['message'] ?? ''));

    // Nếu DB đang dùng schema theo form site: (name, phone, service, message)
    // thì email không bắt buộc.
    if ($fullname === '' || $phone === '' || $message === '') {
        echo 'Thiếu dữ liệu bắt buộc.';
        exit;
    }

    try {
        $sql = "INSERT INTO contacts (name, phone, service, message)
                VALUES (:name, :phone, :service, :message)";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':name' => $fullname,
            ':phone' => $phone,
            ':service' => $service,
            ':message' => $message,
        ]);

        $source = trim((string)($_POST['source'] ?? ''));

        if ($source === 'contact') {
            // quay về trang khách và hiển thị thông báo đăng ký thành công
            header('Location: /webviettel-main/contact?success=1');
        } else {
            header('Location: /webviettel-main/admin/customers.php');
        }
        exit;
    } catch (PDOException $e) {
        echo 'Lỗi: ' . $e->getMessage();
    }
}

