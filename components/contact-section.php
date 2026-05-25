<?php

require_once __DIR__ . '/../includes/session.php';
require_once __DIR__ . '/../includes/contacts.php';
require_once __DIR__ . '/../includes/helpers.php';
require_once __DIR__ . '/../config/config.php';

$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['contact_form'] ?? '') === '1') {
    $token = $_POST['csrf_token'] ?? null;
    $payload = buildContactPayload($_POST);

    if (!verifyCsrfToken(is_string($token) ? $token : null)) {
        $error = 'Phiên gửi thông tin không hợp lệ. Vui lòng thử lại.';
    } else {
        $errors = validateContactPayload($payload);

        if ($errors) {
            $error = $errors[0];
        } else {
            try {
                saveContact($payload);
                $success = 'Bạn đã đăng ký thành công. Sẽ có nhân viên tư vấn bạn.';
            } catch (PDOException $e) {
                error_log($e->getMessage());
                $error = 'Không thể gửi thông tin lúc này. Vui lòng thử lại sau.';
            }
        }
    }
}
?>

<section class="section contact-section" id="contacts">

    <div class="container contact-grid">

        <div class="contact-copy reveal">

            <p class="eyebrow">
                Liên hệ tư vấn
            </p>

            <h2>
                Sẵn sàng số hóa quy trình của bạn?
            </h2>

            <p>
                Để lại thông tin, chuyên viên sẽ liên hệ để tư vấn giải pháp,
                chi phí và lộ trình triển khai phù hợp.
            </p>

            <div class="contact-methods">

                <a href="tel:18008098">
                    Hotline:
                    <?php echo e(CONTACT_PHONE); ?>
                </a>

                <a href="mailto:<?php echo e(CONTACT_EMAIL); ?>">
                    Email:
                    <?php echo e(CONTACT_EMAIL); ?>
                </a>

                <a
                    href="https://zalo.me/18008098"
                    target="_blank"
                    rel="noopener"
                >
                    Chat Zalo
                </a>

            </div>

            <div class="map-placeholder">

                <span>
                    <?php echo e(CONTACT_ADDRESS); ?>
                </span>

            </div>

        </div>

        <!-- FORM -->

        <form
            class="contact-form glass-card reveal"
            method="post"
            action="<?php echo e(appUrl($currentPage === 'contact' ? 'contact#contacts' : '#contacts')); ?>"
        >
            <input type="hidden" name="contact_form" value="1">
            <input type="hidden" name="csrf_token" value="<?php echo e(csrfToken()); ?>">

            <label>

                Họ và tên

                <input
                    type="text"
                    name="name"
                    autocomplete="name"
                    value="<?php echo e((string) ($_POST['name'] ?? '')); ?>"
                    required
                >

            </label>

            <label>

                Số điện thoại

                <input
                    type="tel"
                    name="phone"
                    autocomplete="tel"
                    value="<?php echo e((string) ($_POST['phone'] ?? '')); ?>"
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

                        <option
                            value="<?php echo e($service['title']); ?>"
                            <?php echo (($_POST['service'] ?? '') === $service['title']) ? 'selected' : ''; ?>
                        >

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
                ><?php echo e((string) ($_POST['message'] ?? '')); ?></textarea>

            </label>

            <button class="btn" type="submit">

                Đăng ký tư vấn

            </button>

            <!-- SUCCESS -->

            <?php if ($success !== ''): ?>

                <p
                    style="
                        color: green;
                        font-weight: bold;
                        margin-top: 10px;
                    "
                >
                    <?php echo e($success); ?>
                </p>

            <?php else: ?>

                <?php if (($_GET['success'] ?? '') === '1'): ?>

                    <p
                        style="
                            color: green;
                            font-weight: bold;
                            margin-top: 10px;
                        "
                    >
                        Bạn đã đăng ký thành công. Sẽ có nhân viên tư vấn bạn.
                    </p>

                <?php endif; ?>

            <?php endif; ?>


            <!-- ERROR -->

            <?php if ($error !== ''): ?>

                <p
                    style="
                        color: red;
                        font-weight: bold;
                        margin-top: 10px;
                    "
                >
                    <?php echo e($error); ?>
                </p>

            <?php endif; ?>

        </form>

    </div>

    <a class="mobile-call" href="tel:18008098">

        Gọi nhanh

    </a>

</section>
