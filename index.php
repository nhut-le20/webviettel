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
];

$page = isset($_GET['page']) ? trim((string) $_GET['page']) : 'home';
$currentPage = array_key_exists($page, $routes) ? $page : 'home';
$pageFile = __DIR__ . '/' . $routes[$currentPage];
$pageNames = [
    'home' => 'Trang chủ',
    'about' => 'Giới thiệu',
    'services' => 'Dịch vụ',
    'pricing' => 'Bảng giá',
    'contact' => 'Liên hệ',
    'blog' => 'Tin tức',
];
$pageTitle = $pageNames[$currentPage] . ' - ' . APP_NAME;

require __DIR__ . '/components/header.php';
require $pageFile;
require __DIR__ . '/components/footer.php';
