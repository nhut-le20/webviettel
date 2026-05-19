<?php

require_once __DIR__ . '/../includes/session.php';

$error = '';

if (isset($_GET['logout'])) {
    logoutAdmin();
    header('Location: ' . appUrl('admin/login.php'));
    exit;
}

if (isAdminLoggedIn()) {
    header('Location: ' . appUrl('admin/dashboard.php'));
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim((string) ($_POST['username'] ?? ''));
    $password = (string) ($_POST['password'] ?? '');
    $token = $_POST['csrf_token'] ?? null;

    if (!verifyCsrfToken(is_string($token) ? $token : null)) {
        $error = 'Phiên đăng nhập không hợp lệ. Vui lòng thử lại.';
    } elseif (loginAdmin($username, $password)) {
        header('Location: ' . appUrl('admin/dashboard.php'));
        exit;
    } else {
        $error = 'Tài khoản hoặc mật khẩu không đúng.';
    }
}

?>
<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng nhập quản trị - <?php echo e(APP_NAME); ?></title>
    <link rel="stylesheet" href="<?php echo e(asset('css/variables.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>
<body>
<main class="section">
    <form class="container narrow contact-form" method="post" action="<?php echo e(appUrl('admin/login.php')); ?>">
        <h1>Đăng nhập quản trị</h1>
        <?php if ($error !== ''): ?>
            <p class="form-alert" role="alert"><?php echo e($error); ?></p>
        <?php endif; ?>
        <input type="hidden" name="csrf_token" value="<?php echo e(csrfToken()); ?>">
        <label>Tài khoản
            <input type="text" name="username" autocomplete="username" required>
        </label>
        <label>Mật khẩu
            <input type="password" name="password" autocomplete="current-password" required>
        </label>
        <button class="btn" type="submit">Đăng nhập</button>
    </form>
</main>
</body>
</html>
