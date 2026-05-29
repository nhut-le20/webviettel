<?php

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../includes/helpers.php';
require_once __DIR__ . '/../includes/session.php';
require_once __DIR__ . '/../config/database.php';

// Employee auth (separate from admin)

function isEmployeeLoggedIn(): bool
{
    return !empty($_SESSION['employee_logged_in']);
}

function loginEmployee(string $username, string $password): bool
{
    $username = trim($username);
    if ($username === '') {
        return false;
    }

    // Fetch from DB: employee_users
    $db = getDatabaseConnection();

    $stmt = $db->prepare('SELECT password FROM employee_users WHERE username = :username LIMIT 1');
    $stmt->execute([':username' => $username]);
    $row = $stmt->fetch();

    // Debug option: ?debug=1 (ONLY for development)
    if (isset($_GET['debug']) && $_GET['debug'] === '1') {
        header('Content-Type: text/plain; charset=utf-8');
        echo "username_input=" . $username . "\n";
        echo "row_exists=" . ($row ? '1' : '0') . "\n";
        echo "hash_db=" . (isset($row['password']) ? (string)$row['password'] : '') . "\n";
        // stop further rendering
        exit;
    }


    if (!$row || empty($row['password'])) {
        return false;
    }

    $hash = (string)$row['password'];

    // For troubleshooting: sometimes DB field contains a plain string.
    // If it's not a bcrypt hash, reject to avoid false positives.
    if (!str_starts_with($hash, '$2y$') && !str_starts_with($hash, '$2a$') && !str_starts_with($hash, '$2b$')) {
        return false;
    }

    if (!password_verify($password, $hash)) {
        return false;
    }


    session_regenerate_id(true);
    $_SESSION['employee_logged_in'] = true;
    $_SESSION['employee_username'] = $username;

    return true;
}


$error = '';

if (isEmployeeLoggedIn()) {
    header('Location: ' . appUrl('employee/nhanvien.php'));
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim((string)($_POST['username'] ?? ''));
    $password = (string)($_POST['password'] ?? '');

    if (loginEmployee($username, $password)) {
        header('Location: ' . appUrl('employee/nhanvien.php'));
        exit;
    }

    $error = 'Sai tài khoản hoặc mật khẩu.';
}

?>

<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Đăng nhập nhân viên</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Poppins',sans-serif;
        }

        body{
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            background:#f3f4f6;
            padding:20px;
        }

        .login-container{
            width:950px;
            max-width:100%;
            background:#fff;
            display:grid;
            grid-template-columns:1fr 1fr;
            overflow:hidden;
            border-radius:16px;
            box-shadow:0 10px 30px rgba(0,0,0,0.1);
        }

        .left-side{ position:relative; }

        .left-side img{
            width:100%;
            height:100%;
            object-fit:cover;
            display:block;
        }

        .right-side{
            display:flex;
            justify-content:center;
            align-items:center;
            padding:50px;
            background:#fff;
        }

        .login-box{
            width:100%;
            max-width:350px;
        }

        .login-box h1{
            text-align:center;
            font-size:30px;
            margin-bottom:30px;
            color:#333;
            font-weight:600;
        }

        .error-message{
            background:#ffe5e5;
            color:#d60000;
            padding:12px;
            border-radius:8px;
            margin-bottom:20px;
            font-size:14px;
        }

        .input-group{ position:relative; margin-bottom:20px; }

        .input-group input{
            width:100%;
            height:50px;
            border:1px solid #ddd;
            border-radius:8px;
            padding:0 45px 0 15px;
            font-size:14px;
            outline:none;
            transition:0.3s;
        }

        .input-group input:focus{
            border-color:#6c63ff;
            box-shadow:0 0 0 3px rgba(108,99,255,0.15);
        }

        .input-group i{
            position:absolute;
            right:15px;
            top:50%;
            transform:translateY(-50%);
            color:#999;
        }

        .login-btn{
            width:100%;
            height:50px;
            border:none;
            border-radius:8px;
            background:#6c63ff;
            color:#fff;
            font-size:15px;
            font-weight:500;
            cursor:pointer;
            transition:0.3s;
        }

        .login-btn:hover{ background:#5a52e0; }

        .extra{
            margin-top:20px;
            text-align:center;
            color:#777;
            font-size:14px;
        }

        @media(max-width:768px){
            .login-container{ grid-template-columns:1fr; }
            .left-side{ height:250px; }
            .right-side{ padding:35px 25px; }
        }
    </style>

</head>
<body>

<div class="login-container">

    <div class="left-side">
        <img src="../assets/images/Login.webp" alt="Login">
    </div>

    <div class="right-side">

        <div class="login-box">

            <h1>Nhân Viên Login</h1>

            <?php if ($error !== ''): ?>
                <div class="error-message"><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></div>
            <?php endif; ?>

            <form method="post">

                <div class="input-group">
                    <input type="text" name="username" placeholder="Tên đăng nhập" required>
                    <i class="fa-regular fa-user"></i>
                </div>

                <div class="input-group">
                    <input type="password" name="password" placeholder="Mật khẩu" required>
                    <i class="fa-solid fa-lock"></i>
                </div>

                <button class="login-btn" type="submit">Đăng nhập</button>

            </form>

            <div class="extra">Trang nhân viên</div>

        </div>

    </div>

</div>

</body>
</html>

