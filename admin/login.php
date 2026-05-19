<?php

require_once __DIR__ . '/../includes/session.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['admin_logged_in'] = true;
    header('Location: dashboard.php');
    exit;
}

?>
<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng nhập quản trị</title>
    <link rel="stylesheet" href="../assets/css/variables.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<main class="section">
    <form class="container narrow contact-form" method="post">
        <h1>Đăng nhập quản trị</h1>
        <label>Tài khoản
            <input type="text" name="username" required>
        </label>
        <label>Mật khẩu
            <input type="password" name="password" required>
        </label>
        <button class="btn" type="submit">Đăng nhập</button>
    </form>
</main>
</body>
</html>
