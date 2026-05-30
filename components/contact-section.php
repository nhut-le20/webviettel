<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../includes/helpers.php';
require_once __DIR__ . '/../config/config.php';

$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = trim($_POST['name'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $service = trim($_POST['service'] ?? '');
    $message = trim($_POST['message'] ?? '');

    $aiReply = '';
    $success = '';
    $error = '';

    if ($name && $phone && $service && $message) {


        try {

            $pdo = getDatabaseConnection();

            $stmt = $pdo->prepare("
                INSERT INTO contacts (
                    name,
                    phone,
                    service,
                    message
                )
                VALUES (?, ?, ?, ?)
            ");

            $stmt->execute([
                $name,
                $phone,
                $service,
                $message
            ]);

            $success = 'Gửi thông tin thành công';

            // Hiển thị AI reply (demo) ngay trên trang
            $aiReply = 'Cảm ơn bạn ' . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . '! Chúng tôi đã ghi nhận yêu cầu: ' . htmlspecialchars($service, ENT_QUOTES, 'UTF-8') . '. Nhân viên sẽ liên hệ trong thời gian sớm nhất.';


        } catch (PDOException $e) {

            $error = $e->getMessage();
        }

    } else {

        $error = 'Vui lòng nhập đầy đủ thông tin';
    }
}
?>

<section class="section contact-section" id="contacts">
    <div class="container">
        <div class="contact-panel glass-card reveal">
            <div class="contact-panel-copy">
                <p class="eyebrow">Đăng ký tư vấn</p>
                <h2>Chỉ cần để lại thông tin, chúng tôi sẽ liên hệ ngay.</h2>
                <p>Nhập yêu cầu, quy mô và dịch vụ quan tâm để nhận đề xuất giải pháp phù hợp nhất.</p>
            </div>
            <form class="contact-form" method="post">

            <label>

                Họ và tên

                <input
                    type="text"
                    name="name"
                    autocomplete="name"
                    required
                >

            </label>

            <label>

                Số điện thoại

                <input
                    type="tel"
                    name="phone"
                    autocomplete="tel"
                    required
                >

            </label>

            <label>

                Dịch vụ quan tâm

                <select name="service" required>

                    <option value="">
                        Chọn dịch vụ
                    </option>

                    <?php foreach (getServices() as $service): ?>

                        <option value="<?php echo e($service['title']); ?>">

                            <?php echo e($service['title']); ?>

                        </option>

                    <?php endforeach; ?>

                </select>

            </label>

            <label>

                Nội dung

                <textarea
                    name="message"
                    rows="5"
                    required
                ></textarea>

            </label>

            <button class="btn" type="submit">Đăng ký tư vấn</button>

            <?php if ($success !== ''): ?>
                <p class="form-status form-status--success"><?php echo e($success); ?></p>
                <?php if (!empty($aiReply)): ?>
                    <p class="form-status form-status--note"><?php echo e($aiReply); ?></p>
                <?php endif; ?>
            <?php elseif (($_GET['success'] ?? '') === '1'): ?>
                <p class="form-status form-status--success">Bạn đã đăng ký thành công. Sẽ có nhân viên tư vấn bạn.</p>
                <p class="form-status form-status--note">AI: Cảm ơn bạn! Chúng tôi đã ghi nhận nhu cầu. Vui lòng giữ máy, nhân viên sẽ liên hệ sớm.</p>
            <?php endif; ?>

            <?php if ($error !== ''): ?>
                <p class="form-status form-status--error"><?php echo e($error); ?></p>
            <?php endif; ?>

        </form>

    </div>

    <a class="mobile-call" href="tel:18008098">

        Gọi nhanh

    </a>

</section>