<?php

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function appUrl(string $path = ''): string
{
    $path = trim($path, '/');

    if ($path === '') {
        return APP_URL === '' ? '/' : APP_URL . '/';
    }

    return rtrim(APP_URL, '/') . '/' . $path;
}

function activeClass(string $currentPage, string $page): string
{
    return $currentPage === $page ? 'is-active' : '';
}

function asset(string $path): string
{
    return appUrl('assets/' . ltrim($path, '/'));
}
