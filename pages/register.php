<?php

$error = '';
$success = '';

if (isUserLoggedIn()) {
    header('Location: ' . appUrl());
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim((string)($_POST['username'] ?? ''));
    $password = (string)($_POST['password'] ?? '');
    $passwordConfirm = (string)($_POST['password_confirm'] ?? '');
    $token = $_POST['csrf_token'] ?? null;

    if (!verifyCsrfToken(is_string($token) ? $token : null)) {
        $error = 'Phiên đăng ký không hợp lệ. Vui lòng thử lại.';
    } elseif ($username === '' || $password === '' || $passwordConfirm === '') {
        $error = 'Vui lòng điền đầy đủ thông tin.';
    } elseif ($password !== $passwordConfirm) {
        $error = 'Mật khẩu xác nhận không khớp.';
    } elseif (strlen($password) < 8) {
        $error = 'Mật khẩu phải có ít nhất 8 ký tự.';
    } elseif (!registerUser($username, $password)) {
        $error = 'Tên đăng nhập đã tồn tại, vui lòng chọn tên khác.';
    } else {
        header('Location: ' . appUrl('login?registered=1'));
        exit;
    }
}
?>

<section class="section auth-section">
    <div class="auth-card">
        <div class="auth-card__visual">
            <span class="eyebrow">Đăng ký tài khoản</span>
            <h2>Bắt đầu sử dụng dịch vụ ngay</h2>
            <p>Tạo tài khoản mới để quản lý dịch vụ, theo dõi đơn hàng và nhận thông báo quan trọng.</p>
            <ul>
                <li><i class="fa-solid fa-check-circle"></i> Tạo tài khoản nhanh gọn</li>
                <li><i class="fa-solid fa-lock"></i> Lưu trữ bảo mật</li>
                <li><i class="fa-solid fa-bolt"></i> Kích hoạt ngay sau đăng ký</li>
            </ul>
        </div>
        <div class="auth-card__form">
            <h1>Đăng ký</h1>
            <p class="auth-description">Đăng ký tài khoản mới để truy cập dịch vụ và quản lý nhu cầu của bạn hiệu quả.</p>

            <?php if ($error !== ''): ?>
                <div class="alert alert--error"><?php echo e($error); ?></div>
            <?php endif; ?>

            <form method="post" action="<?php echo e(appUrl('register')); ?>">
                <input type="hidden" name="csrf_token" value="<?php echo e(csrfToken()); ?>">

                <div class="form-control">
                    <label for="username">Tên đăng nhập</label>
                    <input id="username" name="username" type="text" autocomplete="username" required value="<?php echo e($_POST['username'] ?? ''); ?>">
                </div>

                <div class="form-control">
                    <label for="password">Mật khẩu</label>
                    <input id="password" name="password" type="password" autocomplete="new-password" required>
                </div>

                <div class="form-control">
                    <label for="password_confirm">Xác nhận mật khẩu</label>
                    <input id="password_confirm" name="password_confirm" type="password" autocomplete="new-password" required>
                </div>

                <button type="submit" class="btn btn-full">Tạo tài khoản</button>
            </form>

            <div class="auth-footer">
                <p>Đã có tài khoản? <a class="text-link" href="<?php echo e(appUrl('login')); ?>">Đăng nhập</a></p>
                <a class="text-link" href="<?php echo e(appUrl('contact')); ?>">Liên hệ hỗ trợ</a>
            </div>
        </div>
    </div>
</section>
