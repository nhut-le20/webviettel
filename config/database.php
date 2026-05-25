<?php

if (!function_exists('envValue')) {
    require_once __DIR__ . '/config.php';
}

$database = [
    'host' => envValue('DB_HOST', 'localhost'),
    'name' => envValue('DB_NAME', 'webviettel'),
    'user' => envValue('DB_USER', 'root'),
    'password' => envValue('DB_PASSWORD', ''),
    'charset' => envValue('DB_CHARSET', 'utf8mb4'),
];

function getDatabaseConnection(): PDO
{
    global $database;

    $dsn = sprintf(
        'mysql:host=%s;dbname=%s;charset=%s',
        $database['host'],
        $database['name'],
        $database['charset']
    );

    return new PDO($dsn, $database['user'], $database['password'], [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
}
