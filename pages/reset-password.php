<?php

$error = '';
$success = '';
$token = trim((string)($_GET['token'] ?? $_POST['token'] ?? ''));

if (isUserLoggedIn()) {
    header('Location: ' . appUrl());
    exit;
}

if ($token === '') {
    $error = 'Liên kết đặt lại mật khẩu không hợp lệ.';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $error === '') {
    $password = (string)($_POST['password'] ?? '');
    $passwordConfirm = (string)($_POST['password_confirm'] ?? '');
    $csrfToken = $_POST['csrf_token'] ?? null;

    if (!verifyCsrfToken(is_string($csrfToken) ? $csrfToken : null)) {
        $error = 'Phiên đặt lại không hợp lệ. Vui lòng thử lại.';
    } elseif ($password === '' || $passwordConfirm === '') {
        $error = 'Vui lòng nhập đầy đủ mật khẩu mới và xác nhận.';
    } elseif ($password !== $passwordConfirm) {
        $error = 'Mật khẩu xác nhận không khớp.';
    } elseif (strlen($password) < 8) {
        $error = 'Mật khẩu phải có ít nhất 8 ký tự.';
    } elseif (!resetPasswordWithToken($token, $password)) {
        $error = 'Liên kết đặt lại không hợp lệ hoặc đã hết hạn.';
    } else {
        header('Location: ' . appUrl('login?reset=1'));
        exit;
    }
}

if ($error === '' && $_SERVER['REQUEST_METHOD'] !== 'POST') {
    if (!getPasswordResetRequest($token)) {
        $error = 'Liên kết đặt lại không hợp lệ hoặc đã hết hạn.';
    }
}
?>

<section class="section auth-section">
    <div class="auth-card">
        <div class="auth-card__visual">
            <span class="eyebrow">Đặt lại mật khẩu</span>
            <h2>Nhập mật khẩu mới cho tài khoản</h2>
            <p>Cho phép bạn khôi phục quyền truy cập bằng mật khẩu mới an toàn.</p>
            <ul>
                <li><i class="fa-solid fa-key"></i> Mật khẩu mới an toàn</li>
                <li><i class="fa-solid fa-clock"></i> Liên kết có hiệu lực 1 giờ</li>
                <li><i class="fa-solid fa-shield"></i> Xóa tất cả phiên đăng nhập cũ</li>
            </ul>
        </div>
        <div class="auth-card__form">
            <h1>Đặt lại mật khẩu</h1>
            <p class="auth-description">Nhập mật khẩu mới để hoàn tất quá trình phục hồi tài khoản.</p>

            <?php if ($error !== ''): ?>
                <div class="alert alert--error"><?php echo e($error); ?></div>
            <?php endif; ?>

            <?php if ($error === ''): ?>
                <form method="post" action="<?php echo e(appUrl('reset-password?token=' . $token)); ?>">
                    <input type="hidden" name="csrf_token" value="<?php echo e(csrfToken()); ?>">
                    <input type="hidden" name="token" value="<?php echo e($token); ?>">

                    <div class="form-control">
                        <label for="password">Mật khẩu mới</label>
                        <input id="password" name="password" type="password" autocomplete="new-password" required>
                    </div>

                    <div class="form-control">
                        <label for="password_confirm">Xác nhận mật khẩu</label>
                        <input id="password_confirm" name="password_confirm" type="password" autocomplete="new-password" required>
                    </div>

                    <button type="submit" class="btn btn-full">Cập nhật mật khẩu</button>
                </form>
            <?php endif; ?>

            <div class="auth-footer">
                <p>Quay lại <a class="text-link" href="<?php echo e(appUrl('login')); ?>">Đăng nhập</a></p>
                <a class="text-link" href="<?php echo e(appUrl('contact')); ?>">Liên hệ hỗ trợ</a>
            </div>
        </div>
    </div>
</section>
