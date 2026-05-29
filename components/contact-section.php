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
        >

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

            <button class="btn" type="submit">

                Đăng ký tư vấn

            </button>

            <!-- SUCCESS / AI REPLY -->

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

                <?php if (!empty($aiReply)): ?>
                    <p
                        style="
                            color: #1b5e20;
                            font-weight: 600;
                            margin-top: 8px;
                        "
                    >
                        <?php echo e($aiReply); ?>
                    </p>
                <?php endif; ?>

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

                    <p
                        style="
                            color: #1b5e20;
                            font-weight: 600;
                            margin-top: 8px;
                        "
                    >
                        AI: Cảm ơn bạn! Chúng tôi đã ghi nhận nhu cầu của bạn. Vui lòng giữ máy, nhân viên sẽ liên hệ sớm.
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