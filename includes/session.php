<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function requireAdmin(): void
{
    if (empty($_SESSION['admin_logged_in'])) {
        header('Location: login.php');
        exit;
    }
}

