# TODO

## Mục tiêu: sửa source để chạy được (ưu tiên admin)

- [x] 1) Fix `admin/save_contact.php`: include đúng file DB, khởi tạo `$pdo`, đảm bảo PHP chạy không fatal.
- [x] 2) Fix `admin/partials/header.php`: include `includes/helpers.php` và `config/config.php` để có `e(), appUrl(), asset(), activeClass()` và constant `APP_NAME`.
- [x] 3) Đồng bộ `admin/login.php` để dùng `loginAdmin()` và `ADMIN_PASSWORD_HASH` từ `config/config.php`.
- [x] 4) Cập nhật `admin/save_contact.php` để insert đúng schema `contacts (name, phone, service, message)`.
- [x] 5) Xác nhận `admin/customers.php` đọc đúng bảng `contacts` (id, name, phone, service, message, created_at).

