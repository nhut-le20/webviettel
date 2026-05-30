<?php

require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/includes/helpers.php';
require_once __DIR__ . '/includes/functions.php';

$routes = [

    'home' => 'pages/home.php',

    'about' => 'pages/about.php',

    'services' => 'pages/services.php',

    'pricing' => 'pages/pricing.php',

    'contact' => 'pages/contact.php',

    'blog' => 'pages/blog.php',

    // THÊM DÒNG NÀY
    'blog-detail' => 'pages/blog-detail.php',

    // MY SIGN
    'mysign' => 'pages/mysign.php',

    // GIẢI PHÁP KHÁC (THEO SLUG)
    'vbhxh-dien-tu' => 'pages/vbhxh-dien-tu.php',
    'hop-dong-dien-tu' => 'pages/hop-dong-dien-tu.php',
    'hoa-don-dien-tu' => 'pages/hoa-don-dien-tu.php',
    'chu-ky-so-ca' => 'pages/chu-ky-so-ca.php',
    'quan-ly-nha-thuoc' => 'pages/quan-ly-nha-thuoc.php',
    'ke-toan-viettel' => 'pages/ke-toan-viettel.php',

];

$page = isset($_GET['page'])
    ? trim((string) $_GET['page'])
    : 'home';

$currentPage = array_key_exists($page, $routes)
    ? $page
    : 'home';

$pageFile = __DIR__ . '/' . $routes[$currentPage];

$pageNames = [

    'home' => 'Trang chủ',

    'about' => 'Giới thiệu',

    'services' => 'Dịch vụ',

    'pricing' => 'Bảng giá',

    'contact' => 'Liên hệ',

    'blog' => 'Tin tức',

    // THÊM DÒNG NÀY
    'blog-detail' => 'Chi tiết tin tức',

    // MY SIGN
    'mysign' => 'Mysign',

    // GIẢI PHÁP KHÁC
    'vbhxh-dien-tu' => 'Ví bảo hiểm xã hội điện tử',
    'hop-dong-dien-tu' => 'Hợp đồng điện tử',
    'hoa-don-dien-tu' => 'Hóa đơn điện tử',
    'chu-ky-so-ca' => 'Chữ ký số CA',
    'quan-ly-nha-thuoc' => 'Quản lý nhà thuốc',
    'ke-toan-viettel' => 'Kế toán Viettel',

];

$pageTitle = ($pageNames[$currentPage] ?? $pageNames['home']) . ' - ' . APP_NAME;

require __DIR__ . '/components/header.php';

require $pageFile;

require __DIR__ . '/components/footer.php';