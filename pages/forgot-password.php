<?php

$error = '';
$success = '';
$resetLink = '';

if (isUserLoggedIn()) {
    header('Location: ' . appUrl());
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim((string)($_POST['username'] ?? ''));
    $token = $_POST['csrf_token'] ?? null;

    if (!verifyCsrfToken(is_string($token) ? $token : null)) {
        $error = 'Phiên yêu cầu không hợp lệ. Vui lòng thử lại.';
    } elseif ($username === '') {
        $error = 'Vui lòng nhập tên đăng nhập.';
    } else {
        $resetToken = createPasswordResetToken($username);

        if ($resetToken === false) {
            $error = 'Tên đăng nhập không tồn tại. Vui lòng kiểm tra lại.';
        } else {
            $success = 'Liên kết đặt lại mật khẩu đã được tạo.';
            $resetLink = appUrl('reset-password?token=' . $resetToken);
        }
    }
}
?>

<section class="section auth-section">
    <div class="auth-card">
        <div class="auth-card__visual">
            <span class="eyebrow">Quên mật khẩu</span>
            <h2>Khôi phục truy cập dễ dàng</h2>
            <p>Nhập tên đăng nhập của bạn để tạo liên kết đặt lại mật khẩu.</p>
            <ul>
                <li><i class="fa-solid fa-lock-open"></i> An toàn và nhanh chóng</li>
                <li><i class="fa-solid fa-clock"></i> Liên kết có hiệu lực 1 giờ</li>
                <li><i class="fa-solid fa-users"></i> Hỗ trợ cả tài khoản cá nhân</li>
            </ul>
        </div>
        <div class="auth-card__form">
            <h1>Quên mật khẩu</h1>
            <p class="auth-description">Nếu bạn quên mật khẩu, chúng tôi sẽ tạo một liên kết đặt lại ngay lập tức.</p>

            <?php if ($error !== ''): ?>
                <div class="alert alert--error"><?php echo e($error); ?></div>
            <?php elseif ($success !== ''): ?>
                <div class="alert"><?php echo e($success); ?></div>
            <?php endif; ?>

            <?php if ($success === ''): ?>
                <form method="post" action="<?php echo e(appUrl('forgot-password')); ?>">
                    <input type="hidden" name="csrf_token" value="<?php echo e(csrfToken()); ?>">

                    <div class="form-control">
                        <label for="username">Tên đăng nhập</label>
                        <input id="username" name="username" type="text" autocomplete="username" required value="<?php echo e($_POST['username'] ?? ''); ?>">
                    </div>

                    <button type="submit" class="btn btn-full">Tạo liên kết đặt lại</button>
                </form>
            <?php else: ?>
                <div class="form-control">
                    <label>Liên kết đặt lại</label>
                    <input type="text" readonly value="<?php echo e($resetLink); ?>">
                </div>
                <p class="auth-description">Sao chép liên kết này và mở để đặt lại mật khẩu của bạn. Liên kết có hiệu lực trong 1 giờ.</p>
            <?php endif; ?>

            <div class="auth-footer">
                <p>Quay lại <a class="text-link" href="<?php echo e(appUrl('login')); ?>">Đăng nhập</a></p>
                <a class="text-link" href="<?php echo e(appUrl('contact')); ?>">Liên hệ hỗ trợ</a>
            </div>
        </div>
    </div>
</section>
