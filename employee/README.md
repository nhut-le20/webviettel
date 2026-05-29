# Employee login

Luồng đăng nhập employee dùng session riêng với admin.

## Cách tạo tài khoản mật khẩu
Trong `employee/login.php`, hệ thống sẽ đọc 2 biến môi trường:

- `EMPLOYEE_USERNAME`
- `EMPLOYEE_PASSWORD_HASH` (bcrypt hash)

Nếu `EMPLOYEE_PASSWORD_HASH` không tồn tại, hệ thống sẽ dùng hash mặc định (hardcode).

## Ví dụ tạo bcrypt hash
Bạn cần tạo bcrypt hash cho mật khẩu và set vào `EMPLOYEE_PASSWORD_HASH`.

Một cách nhanh trên PHP:
```bash
php -r "echo password_hash('YOUR_PASSWORD', PASSWORD_BCRYPT);"
```

Sau đó set:
- `EMPLOYEE_USERNAME=...`
- `EMPLOYEE_PASSWORD_HASH=<hash vừa tạo>`

## File cấu hình mẫu
Xem: `employee/.env.example`

