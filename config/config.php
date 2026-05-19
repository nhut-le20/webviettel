<?php

function envValue(string $key, ?string $default = null): ?string
{
    $value = getenv($key);

    return $value === false ? $default : $value;
}

function detectBaseUrl(): string
{
    $documentRoot = realpath($_SERVER['DOCUMENT_ROOT'] ?? '');
    $applicationRoot = realpath(__DIR__ . '/..');

    if ($documentRoot && $applicationRoot && strpos($applicationRoot, $documentRoot) === 0) {
        $basePath = substr($applicationRoot, strlen($documentRoot));
        return rtrim(str_replace('\\', '/', $basePath), '/');
    }

    $scriptDir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? ''));
    return $scriptDir === '/' ? '' : rtrim($scriptDir, '/');
}

define('APP_NAME', envValue('APP_NAME', 'Viettel Dịch vụ giải pháp'));
define('APP_URL', envValue('APP_URL', detectBaseUrl()));
define('APP_DESCRIPTION', envValue('APP_DESCRIPTION', 'Giải pháp công nghệ thông tin và chuyển đổi số Viettel cho doanh nghiệp.'));

define('CONTACT_PHONE', envValue('CONTACT_PHONE', '1800 8098'));
define('CONTACT_EMAIL', envValue('CONTACT_EMAIL', 'support@viettelbusiness.vn'));
define('CONTACT_ADDRESS', envValue('CONTACT_ADDRESS', 'Hà Nội, Việt Nam'));

define('ADMIN_USERNAME', envValue('ADMIN_USERNAME', 'admin'));
define('ADMIN_PASSWORD_HASH', envValue('ADMIN_PASSWORD_HASH', '$2y$12$HxmHhBcFocL.dZaNPzuG9OavLUm1Mp9h9Cfw9H1aG3MJl21tUg4B2'));
