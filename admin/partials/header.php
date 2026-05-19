<?php

$adminTitle = $adminTitle ?? 'Quản trị';
$activeAdminPage = $activeAdminPage ?? '';

?>
<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo e($adminTitle); ?> - <?php echo e(APP_NAME); ?></title>
    <link rel="stylesheet" href="<?php echo e(asset('css/variables.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>
<body>
<header class="admin-header">
    <div class="container admin-nav">
        <a class="brand" href="<?php echo e(appUrl('admin/dashboard.php')); ?>">
            <span class="brand-mark" aria-hidden="true">viettel</span>
            <span class="brand-label">Admin</span>
        </a>
        <nav aria-label="Điều hướng quản trị">
            <a class="<?php echo e(activeClass($activeAdminPage, 'dashboard')); ?>" href="<?php echo e(appUrl('admin/dashboard.php')); ?>">Tổng quan</a>
            <a class="<?php echo e(activeClass($activeAdminPage, 'services')); ?>" href="<?php echo e(appUrl('admin/services.php')); ?>">Dịch vụ</a>
            <a class="<?php echo e(activeClass($activeAdminPage, 'customers')); ?>" href="<?php echo e(appUrl('admin/customers.php')); ?>">Khách hàng</a>
            <a href="<?php echo e(appUrl('admin/login.php?logout=1')); ?>">Đăng xuất</a>
        </nav>
    </div>
</header>
<main class="section admin-main">
