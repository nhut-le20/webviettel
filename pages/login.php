<?php

$error = '';
$success = '';

if (isUserLoggedIn()) {
    header('Location: ' . appUrl());
    exit;
}

if (isset($_GET['registered'])) {
    $success = 'Tạo tài khoản thành công. Vui lòng đăng nhập.';
} elseif (isset($_GET['logout'])) {
    $success = 'Bạn đã đăng xuất thành công.';
} elseif (isset($_GET['reset'])) {
    $success = 'Mật khẩu của bạn đã được cập nhật. Vui lòng đăng nhập lại.';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim((string)($_POST['username'] ?? ''));
    $password = (string)($_POST['password'] ?? '');
    $token = $_POST['csrf_token'] ?? null;

    if (!verifyCsrfToken(is_string($token) ? $token : null)) {
        $error = 'Phiên đăng nhập không hợp lệ. Vui lòng thử lại.';
    } elseif ($username === '' || $password === '') {
        $error = 'Vui lòng nhập tên đăng nhập và mật khẩu.';
    } elseif (loginUser($username, $password)) {
        header('Location: ' . appUrl());
        exit;
    } else {
        $error = 'Tên đăng nhập hoặc mật khẩu không đúng.';
    }
}
?>

<section class="section auth-section">
    <div class="auth-card">
        <div class="auth-card__visual">
            <span class="eyebrow">Đăng nhập chuyên nghiệp</span>
            <h2>Quản lý tài khoản nhanh chóng</h2>
            <p>Truy cập đầy đủ báo cáo, dịch vụ và hỗ trợ một cách an toàn với hệ thống xác thực chuyên nghiệp.</p>
            <ul>
                <li><i class="fa-solid fa-shield-halved"></i> Bảo mật chuẩn SSL</li>
                <li><i class="fa-solid fa-rocket"></i> Tốc độ đăng nhập tối ưu</li>
                <li><i class="fa-solid fa-user-check"></i> Dễ dàng quản lý hồ sơ</li>
            </ul>
        </div>
        <div class="auth-card__form">
            <h1>Đăng nhập</h1>
            <p class="auth-description">Nhập thông tin để truy cập vào hệ thống. Nếu bạn chưa có tài khoản, đăng ký ngay.</p>

            <?php if ($error !== ''): ?>
                <div class="alert alert--error"><?php echo e($error); ?></div>
            <?php elseif ($success !== ''): ?>
                <div class="alert"><?php echo e($success); ?></div>
            <?php endif; ?>

            <form method="post" action="<?php echo e(appUrl('login')); ?>">
                <input type="hidden" name="csrf_token" value="<?php echo e(csrfToken()); ?>">

                <div class="form-control">
                    <label for="username">Tên đăng nhập</label>
                    <input id="username" name="username" type="text" autocomplete="username" required value="<?php echo e($_POST['username'] ?? ''); ?>">
                </div>

                <div class="form-control">
                    <label for="password">Mật khẩu</label>
                    <input id="password" name="password" type="password" autocomplete="current-password" required>
                </div>

                <button type="submit" class="btn btn-full">Đăng nhập</button>
            </form>

            <div class="auth-footer">
                <p><a class="text-link" href="<?php echo e(appUrl('forgot-password')); ?>">Quên mật khẩu?</a></p>
                <p>Bạn chưa có tài khoản? <a class="text-link" href="<?php echo e(appUrl('register')); ?>">Đăng ký ngay</a></p>
                <a class="text-link" href="<?php echo e(appUrl('contact')); ?>">Yêu cầu hỗ trợ</a>
            </div>
        </div>
    </div>
</section>
