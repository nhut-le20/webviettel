<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo e(APP_DESCRIPTION); ?>">
    <meta name="theme-color" content="#EE0033">
    <title><?php echo e($pageTitle ?? ''); ?></title>
    <link rel="preload" href="<?php echo e(asset('css/variables.css')); ?>" as="style">
    <link rel="stylesheet" href="<?php echo e(asset('css/variables.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/animations.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/responsive.css')); ?>">
</head>
<body>
<a class="skip-link" href="#main-content">Bỏ qua điều hướng</a>
<?php require __DIR__ . '/navbar.php'; ?>
<main id="main-content">
