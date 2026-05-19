<?php

$database = [
    'host' => 'localhost',
    'name' => 'webviettel',
    'user' => 'root',
    'password' => '',
    'charset' => 'utf8mb4',
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

