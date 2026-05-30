<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../includes/session.php';

$pdo = getDatabaseConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!verifyCsrfToken($_POST['csrf_token'] ?? '')) {
        error_log('save_contact.php: CSRF verification failed from ' . ($_SERVER['REMOTE_ADDR'] ?? 'unknown'));
        http_response_code(403);
        die('Yêu cầu không hợp lệ.');
    }

    $fullname = strip_tags(trim((string)($_POST['fullname'] ?? $_POST['name'] ?? '')));
    $fullname = preg_replace('/\s+/', ' ', $fullname);

    $email = filter_var(trim((string)($_POST['email'] ?? '')), FILTER_SANITIZE_EMAIL);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL) ? $email : '';

    $phone = strip_tags(trim((string)($_POST['phone'] ?? '')));
    $phone = preg_replace('/\s+/', ' ', $phone);

    $service = strip_tags(trim((string)($_POST['service'] ?? '')));
    $service = preg_replace('/\s+/', ' ', $service);

    $message = strip_tags(trim((string)($_POST['message'] ?? '')));
    $message = preg_replace('/\s+/', ' ', $message);

    // Nếu DB đang dùng schema theo form site: (name, phone, service, message)
    // thì email không bắt buộc.
    if ($fullname === '' || $phone === '' || $message === '') {
        echo 'Thiếu dữ liệu bắt buộc.';
        exit;
    }

    try {
        $sql = "INSERT INTO contacts (name, phone, service, message)\n                VALUES (:name, :phone, :service, :message)";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':name' => $fullname,
            ':phone' => $phone,
            ':service' => $service,
            ':message' => $message,
        ]);

        $source = trim((string)($_POST['source'] ?? ''));

        if ($source === 'contact') {
            header('Location: /webviettel-main/contact?success=1');
        } else {
            header('Location: /webviettel-main/admin/customers.php');
        }
        exit;
    } catch (PDOException $e) {
        error_log('save_contact.php: database insert failed - ' . $e->getMessage());
        echo 'Đã xảy ra lỗi máy chủ. Vui lòng thử lại sau.';
    }
}

