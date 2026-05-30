<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo e(APP_DESCRIPTION); ?>">
    <meta name="theme-color" content="#EE0033">
    <title><?php echo e($pageTitle ?? 'Viettel Digital'); ?></title>

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- AOS CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo asset('css/style.css'); ?>">

    <style>
        :root {
            --viettel-red: #EE0033;
            --nav-bg: #111111;
            --page-bg: #F8F9FA;
            --text-light: #f5f5f5;
            --text-muted: #adb5bd;
            --card-bg: #ffffff;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--page-bg);
            color: #212529;
        }

        .navbar-custom {
            background-color: var(--nav-bg);
        }

        .navbar-custom .nav-link {
            color: #dee2e6;
            transition: color .3s ease, transform .3s ease;
        }

        .navbar-custom .nav-link:hover,
        .navbar-custom .nav-link.active {
            color: var(--viettel-red);
            transform: translateY(-1px);
        }

        .btn-tech {
            background: linear-gradient(135deg, #EE0033, #FF4466);
            color: #fff;
            border: none;
            box-shadow: 0 16px 30px rgba(238, 0, 51, 0.18);
            transition: transform .25s ease, box-shadow .25s ease, background .3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-tech:hover,
        .btn-tech:focus {
            transform: translateY(-3px);
            background: linear-gradient(135deg, #ff2140, #ff6b88);
            box-shadow: 0 22px 40px rgba(238, 0, 51, 0.25);
        }

        .btn-tech::after {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(circle, rgba(255,255,255,.3) 10%, transparent 10.01%);
            transform: scale(0);
            opacity: 0;
            transition: transform .45s ease, opacity .45s ease;
        }

        .btn-tech:active::after {
            transform: scale(3);
            opacity: 1;
            transition: 0s;
        }

        .bg-page {
            background-color: var(--page-bg);
        }

        .text-accent {
            color: var(--viettel-red) !important;
        }

        .navbar-brand strong {
            color: #fff;
        }
    </style>
</head>
<body class="bg-page">
<a class="skip-link" href="#main-content">Bỏ qua điều hướng</a>
<?php require __DIR__ . '/navbar.php'; ?>
<main id="main-content">
