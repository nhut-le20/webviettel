<?php

require_once __DIR__ . '/../includes/session.php';
require_once __DIR__ . '/../includes/contacts.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_POST['csrf_token'] ?? null;
    $payload = buildContactPayload($_POST);
    $source = trim((string) ($_POST['source'] ?? 'admin'));

    if (!verifyCsrfToken(is_string($token) ? $token : null)) {
        http_response_code(419);
        echo 'Phiên gửi thông tin không hợp lệ.';
        exit;
    }

    $errors = validateContactPayload($payload);
    if ($errors) {
        http_response_code(422);
        echo $errors[0];
        exit;
    }

    try {
        saveContact($payload);

        if ($source === 'contact') {
            header('Location: ' . appUrl('contact?success=1#contacts'));
        } else {
            header('Location: ' . appUrl('admin/customers.php?created=1'));
        }
        exit;
    } catch (PDOException $e) {
        error_log($e->getMessage());
        http_response_code(500);
        echo 'Không thể lưu liên hệ lúc này.';
    }
}

http_response_code(405);
echo 'Phương thức không được hỗ trợ.';

