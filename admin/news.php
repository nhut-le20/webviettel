
<?php

require_once __DIR__ . '/../includes/session.php';
require_once __DIR__ . '/../includes/functions.php';

requireAdmin();

require_once __DIR__ . '/../config/database.php';

$pdo = getDatabaseConnection();

$adminTitle = 'Quản lý tin tức';
$activeAdminPage = 'news';

// Lấy danh sách tin
$stmt = $pdo->query("
    SELECT *
    FROM news
    ORDER BY id DESC
");

$newsList = $stmt->fetchAll();

$success = isset($_GET['news_saved'])
    ? 'Đăng tin thành công!'
    : '';

$error = '';

?>

<?php require __DIR__ . '/partials/header.php'; ?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

<style>

body{
    background:#f5f5f5;
}

/* LAYOUT */

.news-admin-layout{
    display:flex;
    min-height:100vh;
    background:#f5f5f5;
}

/* SIDEBAR */

.news-sidebar{
    width:270px;
    background:#111827;
    color:#fff;
    padding:30px 20px;
    border-right:1px solid rgba(255,255,255,0.06);
}

.news-sidebar .logo{
    margin-bottom:40px;
}

.news-sidebar .logo h2{
    margin:0;
    font-size:28px;
    font-weight:900;
    letter-spacing:1px;
}

.news-sidebar nav{
    display:flex;
    flex-direction:column;
    gap:14px;
}

.news-sidebar nav a{
    padding:15px 16px;
    border-radius:16px;
    color:#cbd5e1;
    text-decoration:none;
    display:flex;
    gap:12px;
    align-items:center;
    font-weight:700;
    transition:0.25s;
}

.news-sidebar nav a i{
    font-size:20px;
    color:#ff5b67;
}

.news-sidebar nav a.active,
.news-sidebar nav a:hover{
    background:#e60012;
    color:#fff;
    box-shadow:0 10px 30px rgba(230,0,18,0.22);
}

/* MAIN */

.news-main{
    flex:1;
    padding:30px;
}

/* TOPBAR */

.topbar{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:24px;
}

.topbar h1{
    margin:0;
    font-size:38px;
    font-weight:900;
    color:#111827;
}

.topbar p{
    margin-top:8px;
    color:#6b7280;
}

.publish-btn{
    background:#e60012;
    color:#fff;
    border:none;
    padding:15px 24px;
    border-radius:16px;
    font-weight:800;
    cursor:pointer;
    transition:0.25s;
    box-shadow:0 10px 25px rgba(230,0,18,0.22);
}

.publish-btn:hover{
    background:#b4000f;
}

/* GRID */

.editor-layout{
    display:grid;
    grid-template-columns:1fr 360px;
    gap:24px;
}

/* PANEL */

.editor-panel{
    background:#fff;
    padding:30px;
    border-radius:28px;
    box-shadow:0 10px 35px rgba(0,0,0,0.05);
}

/* TITLE */

.title-input{
    width:100%;
    border:none;
    font-size:42px;
    font-weight:900;
    margin-bottom:24px;
    outline:none;
    color:#111827;
}

/* UPLOAD */

.upload-box{
    background:#fff5f5;
    border:2px dashed rgba(230,0,18,0.2);
    border-radius:20px;
    padding:24px;
    margin-bottom:24px;
}

.upload-box label{
    display:block;
    margin-bottom:12px;
    font-weight:800;
    color:#111827;
}

.upload-box input[type="file"]{
    width:100%;
    background:#fff;
    border-radius:14px;
    padding:12px;
    border:1px solid #e5e7eb;
}

/* RIGHT PANEL */

.right-panel{
    display:flex;
    flex-direction:column;
    gap:22px;
}

.card-box{
    background:#fff;
    padding:24px;
    border-radius:24px;
    box-shadow:0 10px 35px rgba(0,0,0,0.05);
}

.card-box h3{
    margin-top:0;
    margin-bottom:18px;
    color:#111827;
}

/* WORKFLOW */

.workflow-list{
    display:flex;
    flex-direction:column;
    gap:12px;
}

.workflow-list button{
    border:none;
    background:#e60012;
    color:#fff;
    padding:14px;
    border-radius:14px;
    font-weight:800;
    cursor:pointer;
    transition:0.25s;
}

.workflow-list button:hover{
    background:#b4000f;
}

/* BUTTONS */

.action-bar{
    margin-top:24px;
    display:flex;
    gap:14px;
}

.save-btn{
    background:#e60012;
    color:#fff;
}

.save-btn:hover{
    background:#b4000f;
}

.draft-btn{
    background:#111827;
    color:#fff;
}

.save-btn,
.draft-btn{
    border:none;
    padding:15px 22px;
    border-radius:14px;
    font-weight:800;
    cursor:pointer;
    transition:0.25s;
}

/* NEWS CARD */

.news-card{
    display:flex;
    gap:14px;
    margin-bottom:16px;
    padding:12px;
    border-radius:16px;
    transition:0.25s;
}

.news-card:hover{
    background:#f9fafb;
}

.news-card img{
    width:90px;
    height:70px;
    object-fit:cover;
    border-radius:14px;
}

.news-card strong{
    display:block;
    margin-bottom:6px;
    color:#111827;
    font-size:15px;
}

.news-card span{
    color:#6b7280;
    font-size:13px;
}

.news-actions{
    display:flex;
    gap:10px;
    margin-top:10px;
}

.news-actions a{
    font-size:13px;
    text-decoration:none;
    font-weight:700;
}

.news-actions a:first-child{
    color:#2563eb;
}

.news-actions a:last-child{
    color:#dc2626;
}

/* ALERT */

.form-alert{
    padding:14px 16px;
    border-radius:14px;
    font-weight:800;
    margin-bottom:20px;
    border:1px solid rgba(230,0,18,0.12);
    background:#fff5f5;
    color:#b91c1c;
}

/* CKEDITOR */

.ck-editor__editable{
    min-height:450px;
    border-radius:0 0 16px 16px !important;
}

.ck-toolbar{
    border-radius:16px 16px 0 0 !important;
}

/* MOBILE */

@media(max-width:1200px){

    .editor-layout{
        grid-template-columns:1fr;
    }
}

@media(max-width:768px){

    .news-sidebar{
        display:none;
    }

    .news-main{
        padding:20px;
    }

    .topbar{
        flex-direction:column;
        align-items:flex-start;
        gap:18px;
    }

    .title-input{
        font-size:30px;
    }
}

</style>

<div class="news-admin-layout">

    <!-- SIDEBAR -->

    <aside class="news-sidebar">

        <div class="logo">
            <h2>VIETTEL CMS</h2>
        </div>

        <nav>

            <a class="active" href="#">
                <i class="ri-newspaper-line"></i>
                Tin tức
            </a>

            <a href="#">
                <i class="ri-folder-line"></i>
                Danh mục
            </a>

            <a href="#">
                <i class="ri-image-line"></i>
                Media
            </a>

            <a href="#">
                <i class="ri-settings-3-line"></i>
                Cài đặt
            </a>

        </nav>

    </aside>

    <!-- MAIN -->

    <main class="news-main">

        <div class="topbar">

            <div>
                <h1>Quản lý tin tức</h1>
                <p>CMS quản lý bài viết chuyên nghiệp</p>
            </div>

            <button class="publish-btn" type="button">
                <i class="ri-send-plane-fill"></i>
                Publish
            </button>

        </div>

        <div class="editor-layout">

            <!-- LEFT -->

            <section class="editor-panel">

                <?php if ($success): ?>
                    <div class="form-alert">
                        <?= htmlspecialchars($success) ?>
                    </div>
                <?php endif; ?>

                <?php if ($error): ?>
                    <div class="form-alert">
                        <?= htmlspecialchars($error) ?>
                    </div>
                <?php endif; ?>

                <form
                    method="POST"
                    action="<?= htmlspecialchars(appUrl('admin/save_news.php')) ?>"
                    enctype="multipart/form-data"
                >

                    <input
                        class="title-input"
                        type="text"
                        name="title"
                        placeholder="Nhập tiêu đề bài viết..."
                        required
                    >

                    <div class="upload-box">

                        <label>Ảnh đại diện bài viết</label>

                        <input
                            type="file"
                            name="image"
                            accept="image/*"
                        >

                    </div>

                    <textarea
                        id="editor"
                        name="content"
                    ></textarea>

                    <div class="action-bar">

                        <button
                            type="submit"
                            class="save-btn"
                            name="news_submit"
                        >
                            Đăng bài
                        </button>

                        <button
                            type="button"
                            class="draft-btn"
                        >
                            Lưu nháp
                        </button>

                    </div>

                </form>

            </section>

            <!-- RIGHT -->

            <aside class="right-panel">

                <div class="card-box">

                    <h3>Workflow</h3>

                    <div class="workflow-list">

                        <button type="button">
                            Publish
                        </button>

                        <button type="button">
                            Approve
                        </button>

                        <button type="button">
                            Save Draft
                        </button>

                        <button type="button">
                            Request Changes
                        </button>

                    </div>

                </div>

                <div class="card-box">

                    <h3>Danh sách bài viết</h3>

                    <?php if (empty($newsList)): ?>

                        <p style="color:#6b7280; font-weight:800;">
                            Chưa có tin tức nào.
                        </p>

                    <?php else: ?>

                        <?php foreach ($newsList as $news): ?>

                            <?php

                            $id = (int)($news['id'] ?? 0);

                            $title = (string)($news['title'] ?? '');

                            $createdAt = !empty($news['created_at'])
                                ? date('d/m/Y', strtotime((string)$news['created_at']))
                                : '';

                            $img = (string)($news['image'] ?? '');

                            $src = $img;

                            $try = preg_replace(
                                '#^uploads/#',
                                'assets/images/blog/',
                                $img
                            );

                            if (!empty($try)) {
                                $src = $try;
                            }

                            ?>

                            <div class="news-card">

                                <?php if (!empty($img)): ?>

                                    <img
                                        src="<?= htmlspecialchars($src) ?>"
                                        alt=""
                                    >

                                <?php endif; ?>

                                <div>

                                    <strong>
                                        <?= htmlspecialchars($title) ?>
                                    </strong>

                                    <span>
                                        <?= htmlspecialchars($createdAt) ?>
                                    </span>

                                    <div class="news-actions">

                                        <a href="<?= htmlspecialchars(appUrl('admin/edit_news.php?id=' . $id)) ?>">
                                            Sửa
                                        </a>

                                        <a
                                            href="<?= htmlspecialchars(appUrl('admin/delete_news.php?id=' . $id)) ?>"
                                            onclick="return confirm('Xóa bài viết?');"
                                        >
                                            Xóa
                                        </a>

                                    </div>

                                </div>

                            </div>

                        <?php endforeach; ?>

                    <?php endif; ?>

                </div>

            </aside>

        </div>

    </main>

</div>

<script>

ClassicEditor
    .create(document.querySelector('#editor'))
    .catch(error => {
        console.error(error);
    });

</script>

<?php require __DIR__ . '/partials/footer.php'; ?>
```
