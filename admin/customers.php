<?php

require_once __DIR__ . '/../includes/session.php';
require_once __DIR__ . '/../includes/functions.php';
requireAdmin();

require_once __DIR__ . '/../config/database.php';

$pdo = getDatabaseConnection();

$success = '';
$error = '';

if (($_GET['export'] ?? '') === 'excel') {
    // Export Excel-compatible (CSV) để mở được bằng Excel.
    $stmt = $pdo->query("SELECT * FROM contacts ORDER BY id DESC");
    $customers = $stmt->fetchAll();

    $hasConsultedColumn = false;
    try {
        $colStmt = $pdo->query("SHOW COLUMNS FROM contacts LIKE 'consulted'");
        $hasConsultedColumn = (bool)$colStmt->fetch();
    } catch (Throwable $e) {
        $hasConsultedColumn = false;
    }

    $filename = 'contacts_' . date('Y-m-d_H-i-s') . '.xls';

    header('Content-Type: application/vnd.ms-excel; charset=UTF-8');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    header('Cache-Control: max-age=0');

    // BOM UTF-8 giúp Excel hiển thị tiếng Việt đúng
    echo "\xEF\xBB\xBF";

    $delimiter = "\t"; // tab-separated (Excel đọc tốt)

    $headers = ['ID', 'Họ tên', 'Số điện thoại', 'Dịch vụ', 'Nội dung', 'Ngày gửi'];
    if ($hasConsultedColumn) {
        $headers[] = 'Trạng thái';
    }

    echo implode($delimiter, $headers) . "\r\n";

    foreach ($customers as $customer) {
        $id = (int)($customer['id'] ?? 0);
        $name = (string)($customer['name'] ?? '');
        $phone = (string)($customer['phone'] ?? '');
        $service = (string)($customer['service'] ?? '');
        $message = (string)($customer['message'] ?? '');

        $createdAt = isset($customer['created_at']) && $customer['created_at'] !== ''
            ? date('H:i:s d/m/Y', strtotime($customer['created_at']))
            : '-';

        $row = [$id, $name, $phone, $service, str_replace(["\r", "\n"], ' ', $message), $createdAt];

        if ($hasConsultedColumn) {
            $consulted = (string)($customer['consulted'] ?? '');
            $isConsulted = ($consulted === '1' || strtolower($consulted) === 'true');
            $row[] = $isConsulted ? '✅ Đã tư vấn' : '📞 Chưa tư vấn';
        }

        // Dùng tab delimiter => chỉ cần thay tab/newline
        $row = array_map(function ($v) {
            $v = (string)$v;
            return str_replace(["\t"], ' ', $v);
        }, $row);

        echo implode($delimiter, $row) . "\r\n";
    }

    exit;
}

$stmt = $pdo->query("SELECT * FROM contacts ORDER BY id DESC");
$customers = $stmt->fetchAll();


// Dữ liệu thống kê/hiển thị "Đã tư vấn" (nếu bạn đã có cột consulted trong DB)
$hasConsultedColumn = false;
try {
    $colStmt = $pdo->query("SHOW COLUMNS FROM contacts LIKE 'consulted'");
    $hasConsultedColumn = (bool)$colStmt->fetch();
} catch (Throwable $e) {
    $hasConsultedColumn = false;
}

?>

<!DOCTYPE html>

<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý khách hàng</title>

    <style>

        *{
            box-sizing:border-box;
            margin:0;
            padding:0;
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body{
            background:#f8f9fa;
            color:#333;
            padding:30px;
        }

        .container{
            max-width:1200px;
            margin:auto;
            background:#fff;
            padding:24px;
            border-radius:12px;
            box-shadow:
                0 4px 6px rgba(0,0,0,0.05),
                0 1px 3px rgba(0,0,0,0.1);
        }

        .header-section{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:24px;
            padding-bottom:12px;
            border-bottom:2px solid #edf2f7;
        }

        h1{
            font-size:24px;
            color:#1a202c;
            font-weight:600;
        }

        .badge-count{
            background:#e2e8f0;
            color:#25ba63;
            padding:4px 12px;
            border-radius:20px;
            font-size:14px;
            font-weight:bold;
        }

        .success-box{
            background:#dcfce7;
            color:#166534;
            padding:14px;
            border-radius:8px;
            margin-bottom:20px;
        }

        .error-box{
            background:#fee2e2;
            color:#991b1b;
            padding:14px;
            border-radius:8px;
            margin-bottom:20px;
        }

        .table-responsive{
            width:100%;
            overflow-x:auto;
        }

        table{
            width:100%;
            border-collapse:collapse;
            text-align:left;
            font-size:15px;
        }

        th{
            background:#f7fafc;
            color:#4a5568;
            font-weight:600;
            padding:14px 16px;
            border-bottom:2px solid #edf2f7;
            text-transform:uppercase;
            font-size:12px;
            letter-spacing:0.5px;
        }

        td{
            padding:14px 16px;
            border-bottom:1px solid #edf2f7;
            color:#2d3748;
            max-width:300px;
            word-wrap:break-word;
        }

        tr:hover{
            background:#f8fafc;
        }

        .text-id{
            color:#a0aec0;
            font-weight:500;
        }

        .text-phone{
            color:#3182ce;
            font-weight:500;
        }

        .badge-service{
            display:inline-block;
            padding:4px 8px;
            border-radius:6px;
            font-size:13px;
            font-weight:500;
            background:#ebf8ff;
            color:#2b6cb0;
        }

        .text-date{
            font-size:13px;
            color:#718096;
        }

        .btn-phone{
            display:inline-flex;
            align-items:center;
            justify-content:center;
            gap:8px;
            padding:8px 12px;
            border-radius:8px;
            background:#25ba63;
            color:white;
            font-weight:600;
            text-decoration:none;
            font-size:13px;
        }

        .done-phone{
            display:inline-flex;
            align-items:center;
            justify-content:center;
            gap:8px;
            padding:8px 12px;
            border-radius:8px;
            background:#e2e8f0;
            color:#2d3748;
            font-weight:600;
            font-size:13px;
        }

    </style>
</head>

<body>

<div class="container">

    <div class="header-section">
        <h1>Quản lý khách hàng & Tin tức</h1>

        <a
            class="btn-phone"
            style="background:#3182ce;"
            href="customers.php?export=excel"
            onclick="return confirm('Xuất Excel danh sách khách hàng?');"
        >
            ⬇️ Xuất Excel
        </a>


<?php
        $totalContacts = count($customers);
        $consultedCount = 0;
        if ($hasConsultedColumn) {
            foreach ($customers as $c) {
                $v = (string)($c['consulted'] ?? '');
                if ($v === '1' || strtolower($v) === 'true') {
                    $consultedCount++;
                }
            }
        }
        $unconsultedCount = $hasConsultedColumn ? max(0, $totalContacts - $consultedCount) : $totalContacts;
        ?>

        <span class="badge-count">
            <?= $unconsultedCount ?> Liên hệ
        </span>
    </div>

    <?php if($success): ?>
        <div class="success-box">
            <?= $success ?>
        </div>
    <?php endif; ?>

    <?php if($error): ?>
        <div class="error-box">
            <?= $error ?>
        </div>
    <?php endif; ?>

    <div class="table-responsive">

        <table>

            <thead>
                <tr>
                    <th width="60">ID</th>
                    <th>Họ tên</th>
                    <th>Số điện thoại</th>
                    <th>Dịch vụ</th>
                    <th>Nội dung</th>
                    <th width="180">Ngày gửi</th>
                    <th width="160">Trạng thái</th>
                </tr>
            </thead>

            <tbody>

            <?php if(empty($customers)): ?>

                <tr>
                    <td colspan="7"
                        style="
                            text-align:center;
                            color:#a0aec0;
                            padding:30px;
                        ">
                        Chưa có dữ liệu khách hàng đăng ký.
                    </td>
                </tr>

            <?php else: ?>

                <?php foreach($customers as $customer): ?>

                <tr>

                    <td class="text-id">
                        #<?= (int)($customer['id'] ?? 0) ?>
                    </td>

                    <td>
                        <strong>
                            <?= htmlspecialchars($customer['name'] ?? '') ?>
                        </strong>
                    </td>

                    <td class="text-phone">
                        <?= htmlspecialchars($customer['phone'] ?? '') ?>
                    </td>

                    <td>
                        <span class="badge-service">
                            <?= htmlspecialchars($customer['service'] ?? 'Chưa chọn') ?>
                        </span>
                    </td>

                    <td>
                        <?= nl2br(htmlspecialchars($customer['message'] ?? '')) ?>
                    </td>

                    <td class="text-date">
                        <?= isset($customer['created_at']) && $customer['created_at'] !== ''
                            ? date('H:i:s d/m/Y', strtotime($customer['created_at']))
                            : '-' ?>
                    </td>

                    <td>
                        <?php
                            $consulted = $hasConsultedColumn ? (string)($customer['consulted'] ?? '') : '';
                            $isConsulted = ($consulted === '1' || strtolower($consulted) === 'true');
                            $id = (int)($customer['id'] ?? 0);
                        ?>

                        <?php if (!$hasConsultedColumn): ?>
                            <span class="done-phone" style="background:#fff; border:1px solid #edf2f7; color:#718096;">
                                Chưa có cột consulted
                            </span>
                        <?php else: ?>
                            <?php if (!$isConsulted): ?>
                                <a
                                    class="btn-phone"
                                    href="mark_consulted.php?id=<?= $id ?>"
                                    onclick="return confirm('Xác nhận đã tư vấn xong cho khách #<?= $id ?>?');"
                                >
                                    📞 chưa tư vấn
                                </a>
                            <?php else: ?>
                                <span class="done-phone">✅ Đã tư vấn</span>
                            <?php endif; ?>
                        <?php endif; ?>
                    </td>

                </tr>

                <?php endforeach; ?>

            <?php endif; ?>

            </tbody>

        </table>

    </div>

</div>

</body>
</html>

