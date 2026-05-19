<?php

$scriptDir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? ''));
$baseUrl = $scriptDir === '/' ? '' : rtrim($scriptDir, '/');

define('APP_NAME', 'Viettel dịch vụ giải pháp');
define('APP_URL', $baseUrl);
define('APP_DESCRIPTION', 'Giải pháp công nghệ thông tin và chuyển đổi số Viettel cho doanh nghiệp.');

define('CONTACT_PHONE', '1800 8098');
define('CONTACT_EMAIL', 'support@viettelbusiness.vn');
define('CONTACT_ADDRESS', 'Hà Nội, Việt Nam');
