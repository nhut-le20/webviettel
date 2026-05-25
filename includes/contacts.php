<?php

require_once __DIR__ . '/../config/database.php';

function cleanContactText(?string $value): string
{
    return trim((string) $value);
}

function buildContactPayload(array $source): array
{
    return [
        'name' => cleanContactText($source['name'] ?? $source['fullname'] ?? ''),
        'phone' => cleanContactText($source['phone'] ?? ''),
        'service' => cleanContactText($source['service'] ?? ''),
        'message' => cleanContactText($source['message'] ?? ''),
    ];
}

function validateContactPayload(array $payload): array
{
    $errors = [];

    if ($payload['name'] === '') {
        $errors[] = 'Vui lòng nhập họ và tên.';
    }

    if ($payload['phone'] === '') {
        $errors[] = 'Vui lòng nhập số điện thoại.';
    } elseif (!preg_match('/^[0-9+\s().-]{8,20}$/', $payload['phone'])) {
        $errors[] = 'Số điện thoại không hợp lệ.';
    }

    if ($payload['service'] === '') {
        $errors[] = 'Vui lòng chọn dịch vụ quan tâm.';
    }

    if ($payload['message'] === '') {
        $errors[] = 'Vui lòng nhập nội dung cần tư vấn.';
    }

    return $errors;
}

function saveContact(array $payload): bool
{
    $pdo = getDatabaseConnection();
    $stmt = $pdo->prepare(
        'INSERT INTO contacts (name, phone, service, message)
         VALUES (:name, :phone, :service, :message)'
    );

    return $stmt->execute([
        ':name' => $payload['name'],
        ':phone' => $payload['phone'],
        ':service' => $payload['service'],
        ':message' => $payload['message'],
    ]);
}

function getContactServices(): array
{
    $pdo = getDatabaseConnection();
    $stmt = $pdo->query(
        "SELECT DISTINCT service
         FROM contacts
         WHERE service IS NOT NULL AND service <> ''
         ORDER BY service ASC"
    );

    return $stmt->fetchAll(PDO::FETCH_COLUMN);
}

function getContacts(array $filters = [], int $page = 1, int $perPage = 15): array
{
    $pdo = getDatabaseConnection();
    $where = [];
    $params = [];

    $q = trim((string) ($filters['q'] ?? ''));
    if ($q !== '') {
        $where[] = '(name LIKE :q OR phone LIKE :q OR message LIKE :q)';
        $params[':q'] = '%' . $q . '%';
    }

    $service = trim((string) ($filters['service'] ?? ''));
    if ($service !== '') {
        $where[] = 'service = :service';
        $params[':service'] = $service;
    }

    $whereSql = $where ? ' WHERE ' . implode(' AND ', $where) : '';
    $countStmt = $pdo->prepare('SELECT COUNT(*) FROM contacts' . $whereSql);
    $countStmt->execute($params);
    $total = (int) $countStmt->fetchColumn();

    $page = max(1, $page);
    $perPage = max(1, min(100, $perPage));
    $offset = ($page - 1) * $perPage;

    $stmt = $pdo->prepare(
        'SELECT id, name, phone, service, message, created_at
         FROM contacts' . $whereSql . '
         ORDER BY id DESC
         LIMIT :limit OFFSET :offset'
    );

    foreach ($params as $key => $value) {
        $stmt->bindValue($key, $value, PDO::PARAM_STR);
    }

    $stmt->bindValue(':limit', $perPage, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();

    return [
        'items' => $stmt->fetchAll(),
        'total' => $total,
        'page' => $page,
        'per_page' => $perPage,
        'pages' => max(1, (int) ceil($total / $perPage)),
    ];
}

function getContactStats(): array
{
    $pdo = getDatabaseConnection();

    $total = (int) $pdo->query('SELECT COUNT(*) FROM contacts')->fetchColumn();
    $today = (int) $pdo
        ->query('SELECT COUNT(*) FROM contacts WHERE DATE(created_at) = CURDATE()')
        ->fetchColumn();

    $latestStmt = $pdo->query(
        'SELECT name, phone, service, created_at
         FROM contacts
         ORDER BY id DESC
         LIMIT 5'
    );

    $popularStmt = $pdo->query(
        "SELECT service, COUNT(*) AS total
         FROM contacts
         WHERE service IS NOT NULL AND service <> ''
         GROUP BY service
         ORDER BY total DESC, service ASC
         LIMIT 1"
    );

    $popular = $popularStmt->fetch() ?: null;

    return [
        'total' => $total,
        'today' => $today,
        'popular_service' => $popular,
        'latest' => $latestStmt->fetchAll(),
    ];
}
