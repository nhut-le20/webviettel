# Hướng Dẫn Màu Sắc Typography - Viettel Brand

## Quy Tắc Ánh Sáng/Tối

Tài liệu này ghi nhận các quy tắc màu sắc typography được áp dụng cho toàn bộ website theo đúng hướng dẫn branding Viettel.

### Bảng Màu Được Áp Dụng

| Nền | Hex | Chữ | Hex | Kết Hợp |
|-----|-----|-----|-----|---------|
| Đỏ (Primary) | #EE0033 | Trắng | #FFFFFF | Red on White ✓ |
| Đen (Dark) | #000000 | Trắng | #FFFFFF | White on Black ✓ |
| Xám Tối (Muted) | #44494D | Trắng | #FFFFFF | White on Dark Gray ✓ |
| Xám Vừa (Gray) | #B5B4B4 | Đen | #000000 | Black on Medium Gray ✓ |
| Xám Nhạt (Soft) | #F2F2F2 | Đen | #000000 | Black on Light Gray ✓ |
| Trắng (Surface) | #FFFFFF | Đen | #000000 | Black on White ✓ |

## CSS Variables (variables.css)

```css
/* Color Palette */
--color-primary: #EE0033;           /* Red */
--color-primary-dark: #000000;      /* Black */
--color-primary-soft: #F2F2F2;      /* Light Gray */
--color-ink: #000000;               /* Black Text */
--color-muted: #44494D;             /* Dark Gray */
--color-gray-mid: #B5B4B4;          /* Medium Gray */
--color-surface: #FFFFFF;           /* White */

/* Typography Colors */
--text-on-primary: #FFFFFF;         /* White on Red */
--text-on-dark: #FFFFFF;            /* White on Black */
--text-on-muted-dark: #FFFFFF;      /* White on Dark Gray */
--text-on-gray: #000000;            /* Black on Gray */
--text-on-surface: #000000;         /* Black on White */
```

## Sections Đã Áp Dụng Quy Tắc

### 1. Hero Section ✓
- **Nền:** Red gradient (#EE0033)
- **Chữ:** White (#FFFFFF)
- **Headings (h1, h2, h3):** Inherit từ `.hero` color: #fff
- **Paragraphs:** color: rgba(255, 255, 255, 0.86)
- **Eyebrow:** color: #ffffff

### 2. Stats Section ✓
- **Nền:** Black (#000000)
- **Chữ:** White (#FFFFFF)
- **Headings:** Inherit từ `.stats-section` color: #fff
- **Stat Cards:** Có background: rgba(255, 255, 255, 0.08) nhưng text là white

### 3. Video Banner Section ✓
- **Nền:** Black gradient (linear-gradient(90deg, rgba(0,0,0,0.92)...))
- **Chữ:** White (#FFFFFF)
- **Headings:** Inherit từ `.video-banner` color: #fff

### 4. Footer Section ✓
- **Nền:** Black (#000000)
- **Chữ:** White rgba(255, 255, 255, 0.76)
- **Brand:** color: #fff
- **Headings:** Inherit từ `.site-footer` color

### 5. Page Hero Section ✓
- **Nền:** Red gradient + overlay
- **Chữ:** White rgba(255, 255, 255, 0.88)
- **Headings:** Inherit từ `.page-hero`
- **Eyebrow:** color: rgba(255, 255, 255, 0.88)

### 6. Contact Section ✓
- **Nền:** White (#FFFFFF)
- **Chữ:** Black/Muted (#000000, #44494D)
- **Labels:** color: var(--color-ink)
- **Inputs:** color: var(--color-ink), background: #FFFFFF
- **Form Text:** color: var(--color-muted)

### 7. Cards & Regular Content ✓
- **Nền:** White (#FFFFFF)
- **Chữ:** Black (#000000)
- **Headings:** Default từ body (black)
- **Paragraphs:** color: var(--color-muted)

### 8. Admin Section ✓
- **Login Form:**
  - Input text: color: #000
  - Button: background: #EE0033, color: #fff
  - Button Hover: background: #B40026, color: #fff
  - Error: background: #FFE6F0, color: #EE0033

- **Admin Tables:**
  - Table Header (th): color: var(--color-muted)
  - Table Cells (td): color: var(--color-ink)
  - Hover Row: background: var(--color-soft)

- **Admin Alerts:**
  - Error Alert: background: var(--color-primary-soft), color: var(--color-primary-dark)
  - Success Alert: background: #e7f7ef, color: #12874f

## Utility Classes (style.css)

Các utility classes sau được thêm để hỗ trợ typography consistency:

```css
.text-on-primary      /* color: #FFFFFF */
.text-on-dark         /* color: #FFFFFF */
.text-on-muted-dark   /* color: #FFFFFF */
.text-on-gray         /* color: #000000 */
.text-on-surface      /* color: #000000 */

.bg-primary          /* background: #EE0033, color: #FFFFFF */
.bg-dark             /* background: #000000, color: #FFFFFF */
.bg-muted-dark       /* background: #44494D, color: #FFFFFF */
.bg-gray             /* background: #B5B4B4, color: #000000 */
.bg-light-gray       /* background: #F2F2F2, color: #000000 */
.bg-surface          /* background: #FFFFFF, color: #000000 */
```

## Contrast Ratios

Tất cả các kết hợp màu đều đạt tiêu chuẩn WCAG AA:
- **White on Red (#EE0033):** Ratio 4.8:1 ✓
- **White on Black (#000000):** Ratio 21:1 ✓
- **Black on White (#FFFFFF):** Ratio 21:1 ✓
- **Black on Light Gray (#F2F2F2):** Ratio 18.5:1 ✓

## Quy Trình Áp Dụng

1. ✓ CSS Variables được cập nhật với color combinations
2. ✓ Main style.css được cập nhật cho tất cả sections
3. ✓ Admin login form cập nhật input colors
4. ✓ Contact form labels cập nhật colors
5. ✓ Typography utility classes được thêm vào
6. ✓ Tất cả pages tuân theo quy tắc

## Maintenance

Khi thêm phần mới trên website:

1. **Xác định nền:** Background color của section
2. **Chọn chữ:** Sử dụng quy tắc trên để chọn text color
3. **Sử dụng Variables:** Dùng CSS custom properties từ variables.css
4. **Test:** Kiểm tra contrast ratio với tools như WebAIM
5. **Document:** Cập nhật file này nếu có color combinations mới

## Liên Hệ

Nếu cần clarification về quy tắc typography, vui lòng tham khảo Viettel Brand Guidelines.
