<?php

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../includes/helpers.php';
require_once __DIR__ . '/../includes/session.php';



function isEmployeeLoggedIn(): bool
{
    return !empty($_SESSION['employee_logged_in']);
}

function logoutEmployee(): void
{
    $_SESSION = [];

    if (ini_get('session.use_cookies')) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }

    session_destroy();
}

function requireEmployee(): void
{
    if (!isEmployeeLoggedIn()) {
        header('Location: ' . appUrl('employee/login.php'));
        exit;
    }
}

requireEmployee();

$employeeName = $_SESSION['employee_username'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'logout') {
    logoutEmployee();
    header('Location: ' . appUrl('employee/login.php'));
    exit;
}

?>
<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trang nhân viên</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div style="max-width:900px;margin:40px auto;padding:20px;">

    <h2>Xin chào, <?= htmlspecialchars($employeeName, ENT_QUOTES, 'UTF-8'); ?></h2>

    <p>Đây là trang <strong>nhân viên</strong> (tách khỏi admin).</p>

    <form method="post" style="margin-top:20px;">
        <input type="hidden" name="action" value="logout">
        <button type="submit" style="padding:10px 16px;border:0;border-radius:8px;background:#6c63ff;color:#fff;cursor:pointer;">
            Đăng xuất
        </button>
    </form>

</div>

</body>
</html>

