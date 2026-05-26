<?php

require_once __DIR__ . '/../includes/session.php';

$error = '';

if (isset($_GET['logout'])) {
    logoutAdmin();
    header('Location: ' . appUrl('admin/login.php'));
    exit;
}

if (isAdminLoggedIn()) {
    header('Location: ' . appUrl('admin/dashboard.php'));
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim((string)($_POST['username'] ?? ''));
    $password = (string)($_POST['password'] ?? '');
    $token = $_POST['csrf_token'] ?? null;

    if (!verifyCsrfToken(is_string($token) ? $token : null)) {
        $error = 'Phiên đăng nhập không hợp lệ. Vui lòng thử lại.';
    } elseif (loginAdmin($username, $password)) {
        header('Location: ' . appUrl('admin/dashboard.php'));
        exit;
    } else {
        $error = 'Tài khoản hoặc mật khẩu không đúng.';
    }
}

?>
<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Đăng nhập quản trị</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

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

        .left-side{
            position:relative;
        }

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
            background:#FFE6F0;
            color:#EE0033;
            padding:12px;
            border-radius:8px;
            margin-bottom:20px;
            font-size:14px;
        }

        .input-group{
            position:relative;
            margin-bottom:20px;
        }

        .input-group input{
            width:100%;
            height:50px;
            border:1px solid #ddd;
            border-radius:8px;
            padding:0 45px 0 15px;
            font-size:14px;
            color:#000;
            outline:none;
            transition:0.3s;
        }

        .input-group input:focus{
            border-color:#EE0033;
            box-shadow:0 0 0 3px rgba(238,0,51,0.15);
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
            background:#EE0033;
            color:#fff;
            font-size:15px;
            font-weight:500;
            cursor:pointer;
            transition:0.3s;
        }

        .login-btn:hover{
            background:#B40026;
        }

        .extra{
            margin-top:20px;
            text-align:center;
            color:#777;
            font-size:14px;
        }

        @media(max-width:768px){

            .login-container{
                grid-template-columns:1fr;
            }

            .left-side{
                height:250px;
            }

            .right-side{
                padding:35px 25px;
            }
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

            <h1>Admin Login</h1>

            <?php if ($error !== ''): ?>
                <div class="error-message">
                    <?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?>
                </div>
            <?php endif; ?>

            <form method="post" action="<?php echo e(appUrl('admin/login.php')); ?>">
                <input type="hidden" name="csrf_token" value="<?php echo e(csrfToken()); ?>">

                <div class="input-group">
                    <input type="text"
                           name="username"
                           placeholder="Tên đăng nhập"
                           autocomplete="username"
                           required>

                    <i class="fa-regular fa-user"></i>
                </div>

                <div class="input-group">
                    <input type="password"
                           name="password"
                           placeholder="Mật khẩu"
                           autocomplete="current-password"
                           required>

                    <i class="fa-solid fa-lock"></i>
                </div>

                <button class="login-btn" type="submit">
                    Đăng nhập
                </button>

            </form>

            <div class="extra">
                Trang quản trị hệ thống
            </div>

        </div>

    </div>

</div>

</body>
</html>
