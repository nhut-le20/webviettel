
<?php

require_once __DIR__ . '/../includes/session.php';
require_once __DIR__ . '/../includes/functions.php';
requireAdmin();

require_once __DIR__ . '/../config/database.php';

$pdo = getDatabaseConnection();

$adminTitle = 'Chỉnh sửa tin tức';
$activeAdminPage = 'news';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

$stmt = $pdo->prepare('SELECT * FROM news WHERE id = ? LIMIT 1');
$stmt->execute([$id]);

$news = $stmt->fetch();

if (!$news) {
    header('Location: ' . appUrl('admin/news.php'));
    exit;
}

$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['news_update'])) {

    $title = trim((string)($_POST['title'] ?? ''));
    $content = trim((string)($_POST['content'] ?? ''));

    if ($title === '' || $content === '') {

        $error = 'Vui lòng nhập tiêu đề và nội dung.';

    } else {

        $image = (string)($news['image'] ?? '');

        if (
            isset($_FILES['image']) &&
            isset($_FILES['image']['error']) &&
            $_FILES['image']['error'] === 0 &&
            !empty($_FILES['image']['name'])
        ) {

            $uploadDir = __DIR__ . '/../assets/images/blog/';

            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $fileName = time() . '_' . basename((string)$_FILES['image']['name']);

            $targetFile = $uploadDir . $fileName;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {

                $image = 'assets/images/blog/' . $fileName;
            }
        }

        $update = $pdo->prepare("
            UPDATE news
            SET title = ?, content = ?, image = ?
            WHERE id = ?
        ");

        $update->execute([
            $title,
            $content,
            $image,
            $id
        ]);

        $success = 'Cập nhật bài viết thành công!';
    }
}

?>

<?php require __DIR__ . '/partials/header.php'; ?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

<style>

body{
    background:#f5f5f5;
}

/* LAYOUT */

.news-editor-layout{
    display:flex;
    min-height:100vh;
    background:#f5f5f5;
}

/* SIDEBAR */

.editor-sidebar{
    width:260px;
    background:#111827;
    color:#fff;
    padding:30px 20px;
    position:fixed;
    left:0;
    top:0;
    bottom:0;
}

.editor-logo{
    font-size:28px;
    font-weight:900;
    margin-bottom:40px;
    color:#fff;
    letter-spacing:1px;
}

.editor-menu{
    display:flex;
    flex-direction:column;
    gap:14px;
}

.editor-menu a{
    color:#cbd5e1;
    text-decoration:none;
    padding:14px 16px;
    border-radius:14px;
    display:flex;
    align-items:center;
    gap:12px;
    font-weight:700;
    transition:0.25s;
}

.editor-menu a i{
    color:#ff5a67;
    font-size:20px;
}

.editor-menu a:hover,
.editor-menu a.active{
    background:#e60012;
    color:#fff;
    box-shadow:0 10px 24px rgba(230,0,18,0.25);
}

/* MAIN */

.editor-main{
    flex:1;
    margin-left:260px;
    padding:30px;
}

/* TOPBAR */

.editor-topbar{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:24px;
}

.editor-topbar h1{
    margin:0;
    font-size:36px;
    font-weight:900;
    color:#111827;
    letter-spacing:-1px;
}

.editor-topbar p{
    margin-top:8px;
    color:#64748b;
    font-size:15px;
}

/* BUTTONS */

.publish-button{
    border:none;
    background:#e60012;
    color:#fff;
    padding:14px 22px;
    border-radius:14px;
    font-weight:800;
    cursor:pointer;
    transition:0.25s;
}

.publish-button:hover{
    background:#b4000f;
}

/* GRID */

.editor-grid{
    display:grid;
    grid-template-columns:1fr 340px;
    gap:24px;
}

/* PANEL */

.editor-panel{
    background:#fff;
    border-radius:24px;
    padding:30px;
    box-shadow:0 8px 30px rgba(230,0,18,0.06);
}

/* TITLE */

.title-input{
    width:100%;
    border:none;
    font-size:42px;
    font-weight:900;
    outline:none;
    margin-bottom:24px;
    color:#111827;
}

/* UPLOAD */

.upload-box{
    border:2px dashed rgba(230,0,18,0.25);
    border-radius:20px;
    padding:24px;
    margin-bottom:24px;
    background:#fff5f5;
}

.upload-box label{
    display:block;
    font-weight:800;
    margin-bottom:12px;
    color:#111827;
}

.upload-box input[type="file"]{
    width:100%;
    background:#fff;
    border-radius:12px;
    padding:12px;
    border:1px solid #e5e7eb;
}

/* IMAGE */

.current-image{
    margin-top:20px;
}

.current-image img{
    width:100%;
    max-height:320px;
    object-fit:cover;
    border-radius:18px;
    border:4px solid #fff;
    box-shadow:0 8px 20px rgba(0,0,0,0.08);
}

/* ACTIONS */

.editor-actions{
    display:flex;
    gap:14px;
    margin-top:28px;
}

.save-btn{
    background:#e60012;
    color:#fff;
    border:none;
    padding:15px 24px;
    border-radius:14px;
    font-weight:800;
    cursor:pointer;
    transition:0.25s;
}

.save-btn:hover{
    background:#b4000f;
}

.delete-btn{
    background:#111827;
    color:#fff;
    text-decoration:none;
    padding:15px 24px;
    border-radius:14px;
    font-weight:800;
    transition:0.25s;
}

.delete-btn:hover{
    background:#000;
}

/* RIGHT */

.editor-right{
    display:flex;
    flex-direction:column;
    gap:20px;
}

.side-card{
    background:#fff;
    border-radius:24px;
    padding:24px;
    box-shadow:0 8px 30px rgba(230,0,18,0.06);
}

.side-card h3{
    margin-top:0;
    margin-bottom:18px;
    color:#111827;
}

/* WORKFLOW */

.workflow-buttons{
    display:flex;
    flex-direction:column;
    gap:12px;
}

.workflow-buttons button{
    border:none;
    background:#e60012;
    color:#fff;
    padding:14px;
    border-radius:14px;
    font-weight:800;
    cursor:pointer;
    transition:0.25s;
}

.workflow-buttons button:hover{
    background:#b4000f;
}

/* META */

.meta-info{
    color:#64748b;
    line-height:1.8;
}

/* ALERT */

.alert-success{
    background:#dcfce7;
    color:#166534;
    padding:16px;
    border-radius:16px;
    margin-bottom:20px;
    font-weight:700;
}

.alert-error{
    background:#fee2e2;
    color:#991b1b;
    padding:16px;
    border-radius:16px;
    margin-bottom:20px;
    font-weight:700;
}

/* CKEDITOR */

.ck-editor__editable{
    min-height:420px;
    border-radius:0 0 16px 16px !important;
}

.ck-toolbar{
    border-radius:16px 16px 0 0 !important;
}

/* MOBILE */

@media(max-width:1100px){

    .editor-grid{
        grid-template-columns:1fr;
    }

    .editor-right{
        order:-1;
    }
}

@media(max-width:768px){

    .editor-sidebar{
        display:none;
    }

    .editor-main{
        margin-left:0;
        padding:20px;
    }

    .editor-topbar{
        flex-direction:column;
        align-items:flex-start;
        gap:18px;
    }

    .title-input{
        font-size:30px;
    }
}

</style>

<div class="news-editor-layout">

    <!-- SIDEBAR -->

    <aside class="editor-sidebar">

        <div class="editor-logo">
            VIETTEL CMS
        </div>

        <div class="editor-menu">

            <a class="active">
                <i class="ri-newspaper-line"></i>
                Tin tức
            </a>

            <a>
                <i class="ri-folder-line"></i>
                Danh mục
            </a>

            <a>
                <i class="ri-image-line"></i>
                Media
            </a>

            <a>
                <i class="ri-settings-3-line"></i>
                Cài đặt
            </a>

        </div>

    </aside>

    <!-- MAIN -->

    <main class="editor-main">

        <div class="editor-topbar">

            <div>
                <h1>Chỉnh sửa bài viết</h1>
                <p>Hệ thống quản lý nội dung Viettel CMS</p>
            </div>

            <button class="publish-button">
                Publish
            </button>

        </div>

        <?php if ($success): ?>
            <div class="alert-success">
                <?= htmlspecialchars($success) ?>
            </div>
        <?php endif; ?>

        <?php if ($error): ?>
            <div class="alert-error">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <div class="editor-grid">

            <!-- LEFT -->

            <section class="editor-panel">

                <form
                    method="POST"
                    action="<?= htmlspecialchars(appUrl('admin/edit_news.php?id=' . $id)) ?>"
                    enctype="multipart/form-data"
                >

                    <input
                        type="text"
                        name="title"
                        class="title-input"
                        placeholder="Nhập tiêu đề bài viết..."
                        value="<?= htmlspecialchars((string)($news['title'] ?? '')) ?>"
                        required
                    >

                    <div class="upload-box">

                        <label>Ảnh đại diện bài viết</label>

                        <input
                            type="file"
                            name="image"
                            accept="image/*"
                        >

                        <?php if (!empty($news['image'])): ?>

                            <div class="current-image">

                                <img
                                    src="<?= htmlspecialchars((string)$news['image']) ?>"
                                    alt=""
                                >

                            </div>

                        <?php endif; ?>

                    </div>

                    <textarea
                        id="editor"
                        name="content"
                    ><?= htmlspecialchars((string)($news['content'] ?? '')) ?></textarea>

                    <div class="editor-actions">

                        <button
                            type="submit"
                            name="news_update"
                            class="save-btn"
                        >
                            Cập nhật bài viết
                        </button>

                        <a
                            href="<?= htmlspecialchars(appUrl('admin/delete_news.php?id=' . $id)) ?>"
                            class="delete-btn"
                            onclick="return confirm('Xóa bài viết này?');"
                        >
                            Xóa bài viết
                        </a>

                    </div>

                </form>

            </section>

            <!-- RIGHT -->

            <aside class="editor-right">

                <div class="side-card">

                    <h3>Workflow</h3>

                    <div class="workflow-buttons">

                        <button type="button">
                            Publish
                        </button>

                        <button type="button">
                            Save Draft
                        </button>

                        <button type="button">
                            Approve
                        </button>

                        <button type="button">
                            Request Changes
                        </button>

                    </div>

                </div>

                <div class="side-card">

                    <h3>Thông tin bài viết</h3>

                    <div class="meta-info">

                        <p>
                            <strong>ID:</strong>
                            #<?= (int)$news['id'] ?>
                        </p>

                        <p>
                            <strong>Ngày tạo:</strong><br>
                            <?= !empty($news['created_at'])
                                ? date('H:i d/m/Y', strtotime((string)$news['created_at']))
                                : '-' ?>
                        </p>

                    </div>

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
