<?php

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function activeClass(string $currentPage, string $page): string
{
    return $currentPage === $page ? 'is-active' : '';
}

function asset(string $path): string
{
    return APP_URL . '/assets/' . ltrim($path, '/');
}

