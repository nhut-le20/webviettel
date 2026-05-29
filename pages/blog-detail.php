<?php

require_once __DIR__ . '/../config/database.php';

$pdo = getDatabaseConnection();

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

$stmt = $pdo->prepare("SELECT * FROM news WHERE id = ?");
$stmt->execute([$id]);
$news = $stmt->fetch();

?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $news ? htmlspecialchars((string)$news['title']) : 'Tin tức' ?> - Viettel</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>

<div class="container">

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <div class="logo">
            <h1>viettel</h1>
            <p>Theo cách của bạn</p>
        </div>

        <nav class="menu">
            <a href="<?= rtrim((string)APP_URL, '/') ?>/?page=home">

                <i class="fa-solid fa-house"></i>
                Trang chủ
            </a>

            <a href="<?= rtrim((string)APP_URL, '/') ?>/?page=blog" class="active">

                <i class="fa-regular fa-clock"></i>
                Tin tức
            </a>

            <a href="<?= rtrim((string)APP_URL, '/') ?>/?page=services">

                <i class="fa-solid fa-microchip"></i>
                Dịch vụ
            </a>

            <a href="<?= rtrim((string)APP_URL, '/') ?>/?page=about">

                <i class="fa-solid fa-tower-cell"></i>
                Giới thiệu
            </a>
        </nav>

        <div class="banner">
            <h2>Viettel 5G</h2>
            <p>Siêu tốc độ khắp mọi nơi</p>
            <button onclick="location.href='<?= rtrim((string)APP_URL, '/') ?>/?page=blog'">Khám phá ngay</button>

        </div>
    </aside>

    <!-- MAIN -->
    <main class="main">
        <header class="header">
            <div class="search-box">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Tìm kiếm tin tức...">
            </div>
        </header>

        <section class="news-section">
            <div class="section-title">
                <h2>Chi tiết tin tức</h2>
                <?php if (!$news): ?>
                    <p>Không tìm thấy tin tức.</p>
                <?php else: ?>
                    <p>Cập nhật thông tin và ưu đãi mới.</p>
                <?php endif; ?>
            </div>

            <?php if ($news): ?>
                <article class="news-card">
                    <?php if (!empty($news['image'])): ?>
                        <?php
                            $img = (string) ($news['image'] ?? '');
                            $try1 = $img;
                            $try2 = preg_replace('#^uploads/#', 'assets/images/blog/', $img);
                            $src = $try1;
                            if (!empty($img) && !file_exists(__DIR__ . '/..' . '/' . ltrim($try1, '/')) && !empty($try2)) {
                                $src = $try2;
                            }
                        ?>
                        <img src="<?= htmlspecialchars($src) ?>" alt="" style="width:100%;max-height:420px;object-fit:cover;border-radius:20px;" />
                    <?php endif; ?>

                    <div class="news-content" style="margin-top:18px; padding:0 6px;">
                        <h3 style="margin-bottom:10px;"><?= htmlspecialchars((string)$news['title']) ?></h3>

                        <div style="display:flex; align-items:center; gap:10px; margin-bottom:14px; flex-wrap:wrap;">
                            <span class="news-date" style="font-weight:700; color:#e60012; font-size:13px;">
                                <?= !empty($news['created_at']) ? date('d/m/Y H:i', strtotime((string)$news['created_at'])) : '' ?>
                            </span>
                        </div>

                        <div style="color:#4b5563; font-size:16px; line-height:1.8; white-space:pre-wrap;">
                            <?= nl2br(htmlspecialchars((string)$news['content'])) ?>
                        </div>

                        <?php if (!empty($news['video_url'])): ?>
                            <?php
                                $video = trim((string)$news['video_url']);
                            ?>
                            <div class="news-video" style="margin-top:22px;">
                                <h3 style="font-size:18px; margin-bottom:10px;">Video</h3>
                                <div style="position:relative; width:100%; padding-top:56.25%; border-radius:16px; overflow:hidden; background:#000;">
                                    <iframe
                                        src="<?= htmlspecialchars($video) ?>"
                                        title="Video tin tức"
                                        frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        allowfullscreen
                                        style="position:absolute; inset:0; width:100%; height:100%;"
                                    ></iframe>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>
                </article>
            <?php endif; ?>
        </section>
    </main>

</div>

<style>
    *{margin:0;padding:0;box-sizing:border-box;font-family:Arial;}
    body{background:#f5f5f5;}
    .container{display:flex;}

    /* SIDEBAR */
    .sidebar{width:260px;background:#fff;min-height:100vh;padding:30px 20px;border-right:1px solid #eee;}
    .logo h1{color:#e60012;font-size:42px;}
    .logo p{color:#777;margin-top:5px;font-size:14px;}

    .menu{margin-top:40px;display:flex;flex-direction:column;gap:12px;}
    .menu a{text-decoration:none;color:#333;padding:14px;border-radius:12px;transition:0.3s;font-weight:600;}
    .menu a i{margin-right:10px;}
    .menu a:hover,.menu .active{background:#e60012;color:#fff;}

    .banner{margin-top:50px;background:linear-gradient(135deg,#ff002b,#ff5a5a);color:#fff;padding:25px;border-radius:20px;}
    .banner h2{font-size:32px;}
    .banner p{margin:15px 0;}
    .banner button{border:none;background:#fff;color:#e60012;padding:12px 20px;border-radius:10px;font-weight:bold;cursor:pointer;}

    /* MAIN */
    .main{flex:1;padding:30px;}

    /* HEADER */
    .header{display:flex;justify-content:space-between;align-items:center;}
    .search-box{width:500px;background:#fff;padding:15px 20px;border-radius:50px;display:flex;align-items:center;gap:10px;}
    .search-box input{border:none;outline:none;width:100%;font-size:16px;}

    /* NEWS */
    .news-section{margin-top:40px;}
    .section-title h2{font-size:30px;}

    .news-card{background:#fff;border-radius:20px;overflow:hidden;transition:0.3s;}
    .news-card:hover{transform:translateY(-5px);}

    .news-content{padding:20px;}
    .news-content h3{margin:0;line-height:1.4;font-size:18px;}

    /* MOBILE */
    @media(max-width:1100px){
        .sidebar{display:none;}
        .search-box{width:100%;}
    }
</style>

</body>
</html>


