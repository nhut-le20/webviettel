<?php

require_once __DIR__ . '/../includes/session.php';
require_once __DIR__ . '/../includes/functions.php';
requireAdmin();

require_once __DIR__ . '/../config/database.php';

$pdo = getDatabaseConnection();

$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['news_submit'])) {

    $title = trim((string)($_POST['title'] ?? ''));
    $content = trim((string)($_POST['content'] ?? ''));

    if ($title === '' || $content === '') {
        $error = 'Vui lòng nhập tiêu đề và nội dung bài viết.';
    } else {
        $image = '';

        // Secure image upload
        if (isset($_FILES['image']) && is_uploaded_file($_FILES['image']['tmp_name']) && ($_FILES['image']['error'] ?? UPLOAD_ERR_NO_FILE) === UPLOAD_ERR_OK) {
            $maxFileSize = 5 * 1024 * 1024; // 5 MB
            $allowedExt = ['jpg', 'jpeg', 'png', 'webp'];
            $uploadDir = __DIR__ . '/../assets/images/blog/';

            if (!is_dir($uploadDir) && !mkdir($uploadDir, 0755, true) && !is_dir($uploadDir)) {
                error_log('save_news.php: unable to create upload directory: ' . $uploadDir);
                $error = 'Không thể lưu ảnh. Vui lòng thử lại sau.';
            } else {
                $tmpPath = $_FILES['image']['tmp_name'];
                $origName = (string)($_FILES['image']['name'] ?? '');
                $fileSize = (int)($_FILES['image']['size'] ?? 0);

                if ($fileSize <= 0 || $fileSize > $maxFileSize) {
                    error_log('save_news.php: uploaded file size invalid or too large. size=' . $fileSize . ' user=' . ($_SESSION['admin_username'] ?? 'unknown'));
                    $error = 'Kích thước ảnh không hợp lệ (tối đa 5MB).';
                } else {
                    // Detect MIME type using finfo
                    $finfo = finfo_open(FILEINFO_MIME_TYPE);
                    $mime = $finfo ? finfo_file($finfo, $tmpPath) : '';
                    if ($finfo) {
                        finfo_close($finfo);
                    }

                    // Basic image checks
                    $imageInfo = @getimagesize($tmpPath);

                    $mimeToExt = [
                        'image/jpeg' => 'jpg',
                        'image/png' => 'png',
                        'image/webp' => 'webp',
                    ];

                    $detectedExt = $mimeToExt[$mime] ?? null;

                    if ($imageInfo === false || $detectedExt === null) {
                        error_log('save_news.php: uploaded file failed image validation. mime=' . ($mime ?? 'unknown') . ' getimagesize=' . var_export($imageInfo, true) . ' orig=' . $origName . ' user=' . ($_SESSION['admin_username'] ?? 'unknown'));
                        $error = 'Tệp tải lên không hợp lệ. Vui lòng chọn file ảnh (jpg, png, webp).';
                    } else {
                        // Use detected extension to avoid trusting user-supplied extension
                        $useExt = $detectedExt;

                        if (!in_array($useExt, $allowedExt, true)) {
                            error_log('save_news.php: detected extension not allowed: ' . $useExt . ' mime=' . $mime . ' orig=' . $origName);
                            $error = 'Định dạng ảnh không được hỗ trợ.';
                        } else {
                            // Generate safe random filename
                            try {
                                $random = bin2hex(random_bytes(8));
                            } catch (Throwable $e) {
                                // Fallback if random_bytes unavailable
                                $random = substr(md5(uniqid((string)microtime(true), true)), 0, 16);
                            }

                            $safeName = 'img_' . $random . '_' . time() . '.' . $useExt;
                            $targetFile = $uploadDir . $safeName;

                            if (move_uploaded_file($tmpPath, $targetFile)) {
                                // ensure non-executable permissions
                                @chmod($targetFile, 0644);
                                $image = 'assets/images/blog/' . $safeName;
                            } else {
                                error_log('save_news.php: move_uploaded_file failed. tmp=' . $tmpPath . ' target=' . $targetFile . ' user=' . ($_SESSION['admin_username'] ?? 'unknown'));
                                $error = 'Không thể lưu file. Vui lòng thử lại sau.';
                            }
                        }
                    }
                }
            }
        }

        $stmt = $pdo->prepare(
            "INSERT INTO news(title, content, image) VALUES (:title, :content, :image)"
        );

        $stmt->execute([
            ':title' => $title,
            ':content' => $content,
            ':image' => $image,
        ]);

        $success = 'Đăng tin thành công!';
    }
}

// Redirect về trang admin gần nhất (nếu cần) hoặc giữ trên trang này
$baseUrl = rtrim((string)(APP_URL ?? ''), '/');
if ($baseUrl === '') {
    $baseUrl = '/webviettel-main';
}

header('Location: ' . $baseUrl . '/?page=blog&news_saved=1');
exit;

