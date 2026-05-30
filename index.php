<?php

require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/includes/helpers.php';
require_once __DIR__ . '/includes/functions.php';

$allowed_pages = [
    'home',
    'services',
    'blog',
    'blog-detail',
    'contact',
    'hoa-don-dien-tu',
    'chu-ky-so-ca',
    'vbhxh-dien-tu',
    'mysign',
    'ke-toan-viettel',
    'hop-dong-dien-tu',
    'quan-ly-nha-thuoc',
];

$page = isset($_GET['page'])
    ? trim((string) $_GET['page'])
    : 'home';

$currentPage = in_array($page, $allowed_pages, true) ? $page : '404';

$pageMap = [
    'home' => 'pages/home.php',
    'services' => 'pages/services.php',
    'blog' => 'pages/blog.php',
    'blog-detail' => 'pages/blog-detail.php',
    'contact' => 'pages/contact.php',
    'hoa-don-dien-tu' => 'pages/hoa-don-dien-tu.php',
    'chu-ky-so-ca' => 'pages/chu-ky-so-ca.php',
    'vbhxh-dien-tu' => 'pages/vbhxh-dien-tu.php',
    'hop-dong-dien-tu' => 'pages/hop-dong-dien-tu.php',
    'quan-ly-nha-thuoc' => 'pages/quan-ly-nha-thuoc.php',
    'mysign' => 'pages/mysign.php',
    'ke-toan-viettel' => 'pages/ke-toan-viettel.php',
    '404' => 'pages/404.php',
];

$pageNames = [
    'home' => 'Trang chủ',
    'services' => 'Dịch vụ',
    'blog' => 'Tin tức',
    'blog-detail' => 'Chi tiết tin tức',
    'contact' => 'Liên hệ',
    'hoa-don-dien-tu' => 'Hóa đơn điện tử',
    'chu-ky-so-ca' => 'Chữ ký số CA',
    'vbhxh-dien-tu' => 'BHXH điện tử',
    'hop-dong-dien-tu' => 'Hợp đồng điện tử',
    'quan-ly-nha-thuoc' => 'Quản lý nhà thuốc',
    'mysign' => 'MySign',
    'ke-toan-viettel' => 'Kế toán Viettel',
    '404' => 'Trang không tìm thấy',
];

$pageFile = __DIR__ . '/' . ($pageMap[$currentPage] ?? $pageMap['404']);
if (!file_exists($pageFile)) {
    $currentPage = '404';
    $pageFile = __DIR__ . '/pages/404.php';
}

$pageTitle = ($pageNames[$currentPage] ?? 'Trang') . ' - ' . APP_NAME;

require __DIR__ . '/components/header.php';
require $pageFile;
require __DIR__ . '/components/footer.php';
