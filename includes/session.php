<?php

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/helpers.php';

if (session_status() === PHP_SESSION_NONE) {
    session_set_cookie_params([
        'httponly' => true,
        'samesite' => 'Lax',
        'secure' => !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off',
    ]);

    session_start();
}

function isAdminLoggedIn(): bool
{
    return !empty($_SESSION['admin_logged_in']);
}

function loginAdmin(string $username, string $password): bool
{
    if (!hash_equals(ADMIN_USERNAME, $username) || !password_verify($password, ADMIN_PASSWORD_HASH)) {
        return false;
    }

    session_regenerate_id(true);
    $_SESSION['admin_logged_in'] = true;
    $_SESSION['admin_username'] = $username;

    return true;
}

function logoutAdmin(): void
{
    $_SESSION = [];

    if (ini_get('session.use_cookies')) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }

    session_destroy();
}

function requireAdmin(): void
{
    if (!isAdminLoggedIn()) {
        header('Location: ' . appUrl('admin/login.php'));
        exit;
    }
}

function isUserLoggedIn(): bool
{
    return !empty($_SESSION['user_logged_in']);
}

function currentUser(): ?string
{
    return $_SESSION['user_username'] ?? null;
}

function loginUser(string $username, string $password): bool
{
    $pdo = getDatabaseConnection();
    $stmt = $pdo->prepare('SELECT id, username, password FROM users WHERE username = :username LIMIT 1');
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch();

    if (!$user) {
        return false;
    }

    if (password_verify($password, $user['password'])) {
        // ok
    } elseif ($user['password'] === $password) {
        $update = $pdo->prepare('UPDATE users SET password = :password WHERE id = :id');
        $update->execute([
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'id' => $user['id'],
        ]);
    } else {
        return false;
    }

    session_regenerate_id(true);
    $_SESSION['user_logged_in'] = true;
    $_SESSION['user_username'] = $user['username'];

    return true;
}

function registerUser(string $username, string $password): bool
{
    $pdo = getDatabaseConnection();
    $stmt = $pdo->prepare('SELECT id FROM users WHERE username = :username LIMIT 1');
    $stmt->execute(['username' => $username]);

    if ($stmt->fetch()) {
        return false;
    }

    $insert = $pdo->prepare('INSERT INTO users (username, password) VALUES (:username, :password)');
    return $insert->execute([
        'username' => $username,
        'password' => password_hash($password, PASSWORD_DEFAULT),
    ]);
}

function ensurePasswordResetTableExists(PDO $pdo): void
{
    $pdo->exec(
        'CREATE TABLE IF NOT EXISTS password_resets (
            id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(50) NOT NULL,
            token VARCHAR(64) NOT NULL,
            expires_at DATETIME NOT NULL,
            created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            INDEX (token)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4'
    );
}

function cleanupExpiredPasswordResets(PDO $pdo): void
{
    $statement = $pdo->prepare('DELETE FROM password_resets WHERE expires_at < NOW()');
    $statement->execute();
}

function createPasswordResetToken(string $username): string|false
{
    $pdo = getDatabaseConnection();
    $stmt = $pdo->prepare('SELECT id FROM users WHERE username = :username LIMIT 1');
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch();

    if (!$user) {
        return false;
    }

    ensurePasswordResetTableExists($pdo);
    cleanupExpiredPasswordResets($pdo);

    $token = bin2hex(random_bytes(32));
    $expiresAt = (new DateTime('+1 hour'))->format('Y-m-d H:i:s');

    $insert = $pdo->prepare('INSERT INTO password_resets (username, token, expires_at) VALUES (:username, :token, :expires_at)');
    $insert->execute([
        'username' => $username,
        'token' => $token,
        'expires_at' => $expiresAt,
    ]);

    return $token;
}

function getPasswordResetRequest(string $token): ?array
{
    $pdo = getDatabaseConnection();
    ensurePasswordResetTableExists($pdo);
    cleanupExpiredPasswordResets($pdo);

    $stmt = $pdo->prepare('SELECT username, expires_at FROM password_resets WHERE token = :token LIMIT 1');
    $stmt->execute(['token' => $token]);
    $request = $stmt->fetch();

    if (!$request) {
        return null;
    }

    return $request;
}

function resetPasswordWithToken(string $token, string $password): bool
{
    $pdo = getDatabaseConnection();
    ensurePasswordResetTableExists($pdo);
    cleanupExpiredPasswordResets($pdo);

    $stmt = $pdo->prepare('SELECT username FROM password_resets WHERE token = :token AND expires_at > NOW() LIMIT 1');
    $stmt->execute(['token' => $token]);
    $request = $stmt->fetch();

    if (!$request) {
        return false;
    }

    $update = $pdo->prepare('UPDATE users SET password = :password WHERE username = :username');
    $updated = $update->execute([
        'password' => password_hash($password, PASSWORD_DEFAULT),
        'username' => $request['username'],
    ]);

    $delete = $pdo->prepare('DELETE FROM password_resets WHERE username = :username');
    $delete->execute(['username' => $request['username']]);

    return $updated;
}

function logoutUser(): void
{
    unset($_SESSION['user_logged_in'], $_SESSION['user_username']);
    session_regenerate_id(true);
}

function csrfToken(): string
{
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }

    return $_SESSION['csrf_token'];
}

function verifyCsrfToken(?string $token): bool
{
    return is_string($token) && !empty($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}
