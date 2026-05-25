<?php

// Landing page cho admin để dễ truy cập
require_once __DIR__ . '/../includes/session.php';
requireAdmin();

$adminTitle = 'Admin';
$activeAdminPage = 'dashboard';

require __DIR__ . '/dashboard.php';

