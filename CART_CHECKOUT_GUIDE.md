# Hệ thống Giỏ hàng và Thanh toán - Santuy Restaurant

## 📋 Tổng quan

Hệ thống giỏ hàng và thanh toán đã được tích hợp hoàn chỉnh vào website Santuy Restaurant, cho phép khách hàng:
- Thêm món ăn vào giỏ hàng
- Quản lý giỏ hàng (cập nhật số lượng, xóa món)
- Tiến hành thanh toán
- Nhận email xác nhận đơn hàng

## 🗂️ Cấu trúc Files đã tạo

### 1. Models
- **`app/Models/Order.php`** - Model quản lý đơn hàng
- **`app/Models/OrderItem.php`** - Model quản lý chi tiết đơn hàng

### 2. Controllers
- **`app/Http/Controllers/CartController.php`** - Xử lý giỏ hàng (thêm, sửa, xóa)
- **`app/Http/Controllers/OrderController.php`** - Xử lý đơn hàng và thanh toán

### 3. Migrations
- **`database/migrations/2025_12_27_180612_create_orders_table.php`**
- **`database/migrations/2025_12_27_180623_create_order_items_table.php`**

### 4. Views
- **`resources/views/checkout.blade.php`** - Trang thanh toán
- **`resources/views/order-success.blade.php`** - Trang xác nhận đơn hàng
- **`resources/views/emails/order-confirmation.blade.php`** - Email xác nhận

### 5. Layout Updates
- **`resources/views/layouts/frontend.blade.php`** - Đã thêm:
  - Icon giỏ hàng trong header
  - Modal giỏ hàng
  - JavaScript xử lý giỏ hàng
  - Meta CSRF token

### 6. Routes
- **`routes/web.php`** - Đã thêm routes cho cart và order

## 🚀 Tính năng

### 1. Giỏ hàng
- **Thêm món**: Click nút "Add to Cart" trên trang menu
- **Xem giỏ hàng**: Click icon giỏ hàng ở header
- **Cập nhật số lượng**: Dùng nút +/- trong modal giỏ hàng
- **Xóa món**: Click icon thùng rác
- **Xóa toàn bộ**: Click nút "Xóa giỏ hàng"

### 2. Thanh toán
- Form nhập thông tin khách hàng
- Chọn phương thức thanh toán:
  - Thanh toán khi nhận hàng
  - Thanh toán bằng thẻ
  - Chuyển khoản ngân hàng
- Xem tóm tắt đơn hàng
- Ghi chú đơn hàng (tùy chọn)

### 3. Xác nhận đơn hàng
- Hiển thị thông tin đơn hàng
- Mã đơn hàng duy nhất (ORD-xxxxx)
- Chi tiết món ăn đã đặt
- Thông tin giao hàng

### 4. Email tự động
- Gửi email xác nhận sau khi đặt hàng thành công
- Template email chuyên nghiệp
- Chứa đầy đủ thông tin đơn hàng

## 🛠️ Cấu hình cần thiết

### 1. Cấu hình Email (quan trọng!)

Để gửi email xác nhận, bạn cần cấu hình email trong file `.env`:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=phunganhluc3105@gmail.com 
MAIL_PASSWORD="duwc rchb ecwx idcs"
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your-email@gmail.com
MAIL_FROM_NAME="Santuy Restaurant"
```

**Lưu ý cho Gmail:**
1. Bật xác thực 2 bước
2. Tạo App Password tại: https://myaccount.google.com/apppasswords
3. Sử dụng App Password thay vì mật khẩu thường

### 2. Session Configuration
Giỏ hàng sử dụng Session để lưu trữ. Đảm bảo trong `config/session.php`:

```php
'driver' => env('SESSION_DRIVER', 'file'),
```

## 📊 Database Schema

### Bảng `orders`
- `id` - ID đơn hàng
- `user_id` - ID người dùng (nullable)
- `order_number` - Mã đơn hàng (unique)
- `customer_name` - Tên khách hàng
- `customer_email` - Email
- `customer_phone` - Số điện thoại
- `customer_address` - Địa chỉ giao hàng
- `subtotal` - Tổng tiền hàng
- `tax` - Thuế (10%)
- `total` - Tổng thanh toán
- `payment_method` - Phương thức thanh toán
- `payment_status` - Trạng thái thanh toán (pending/paid/failed)
- `order_status` - Trạng thái đơn hàng (pending/processing/completed/cancelled)
- `notes` - Ghi chú
- `timestamps`

### Bảng `order_items`
- `id` - ID chi tiết
- `order_id` - ID đơn hàng
- `menu_id` - ID món ăn
- `menu_name` - Tên món
- `menu_price` - Giá món
- `quantity` - Số lượng
- `subtotal` - Tổng tiền
- `timestamps`

## 🔧 API Endpoints

### Cart APIs
```
POST   /cart/add        - Thêm món vào giỏ
POST   /cart/update     - Cập nhật số lượng
POST   /cart/remove     - Xóa món khỏi giỏ
POST   /cart/clear      - Xóa toàn bộ giỏ hàng
GET    /cart/get        - Lấy thông tin giỏ hàng
```

### Order APIs
```
GET    /checkout                      - Trang thanh toán
POST   /order                         - Tạo đơn hàng mới
GET    /order/success/{orderNumber}   - Trang xác nhận đơn hàng
```

## 🎨 Frontend Features

### JavaScript Functions
- `addToCart(menuId, quantity)` - Thêm món vào giỏ
- `updateCartQuantity(itemId, quantity)` - Cập nhật số lượng
- `removeFromCart(itemId)` - Xóa món
- `loadCart()` - Tải giỏ hàng
- `formatCurrency(amount)` - Format tiền tệ
- `showNotification(message, type)` - Hiển thị thông báo

### Modal Cart
- Hiển thị khi click icon giỏ hàng
- Cập nhật real-time
- Tính tự động thuế và tổng tiền
- Responsive design

## 📱 Responsive Design
- Mobile-friendly
- Tablet-optimized
- Desktop-enhanced
- Touch-friendly buttons

## 🔐 Security Features
- CSRF Protection
- Input Validation
- SQL Injection Prevention
- XSS Protection

## 🧪 Testing

### Test thủ công:
1. **Thêm vào giỏ hàng:**
   - Vào trang `/menu`
   - Click "Add to Cart" ở món bất kỳ
   - Kiểm tra số đếm giỏ hàng tăng lên

2. **Xem giỏ hàng:**
   - Click icon giỏ hàng
   - Kiểm tra món đã thêm hiển thị đúng
   - Test +/- số lượng
   - Test xóa món

3. **Thanh toán:**
   - Click "Thanh toán" trong giỏ hàng
   - Điền form thông tin
   - Chọn phương thức thanh toán
   - Submit form

4. **Kiểm tra email:**
   - Kiểm tra email đã nhận được
   - Xác nhận nội dung email đầy đủ

## 🐛 Troubleshooting

### Email không gửi được:
- Kiểm tra cấu hình `.env`
- Test với: `php artisan tinker` -> `Mail::raw('Test', function($m) { $m->to('test@example.com')->subject('Test'); });`
- Kiểm tra log: `storage/logs/laravel.log`

### Giỏ hàng không lưu:
- Xóa cache: `php artisan cache:clear`
- Xóa config cache: `php artisan config:clear`
- Kiểm tra quyền folder `storage/framework/sessions`

### Modal không hiển thị:
- Kiểm tra console browser (F12) xem có lỗi JS
- Đảm bảo đã load CSS Tailwind
- Clear browser cache

## 📈 Improvements có thể thêm

1. **Payment Gateway Integration:**
   - Stripe
   - PayPal
   - VNPay
   - MoMo

2. **Advanced Features:**
   - Wishlist
   - Order tracking
   - Review system
   - Loyalty points
   - Coupon/Discount codes

3. **Admin Panel:**
   - Quản lý đơn hàng
   - Thống kê doanh thu
   - Export orders
   - Print invoice

4. **Notifications:**
   - SMS notifications
   - Real-time order updates
   - Push notifications

## 📞 Support

Nếu có vấn đề, kiểm tra:
1. Log file: `storage/logs/laravel.log`
2. Browser console (F12)
3. Network tab trong Developer Tools

## ✅ Checklist triển khai

- [x] Database migrations đã chạy
- [x] Models đã tạo
- [x] Controllers đã tạo
- [x] Views đã tạo
- [x] Routes đã cập nhật
- [x] JavaScript đã thêm
- [x] CSS đã tùy chỉnh
- [ ] Email đã cấu hình (cần làm thủ công)
- [ ] Test thử nghiệm hoàn chỉnh

## 🎉 Hoàn tất!

Hệ thống giỏ hàng và thanh toán đã sẵn sàng sử dụng! 
Nhớ cấu hình email trong file `.env` để tính năng gửi email hoạt động.

Chúc bạn thành công! 🚀
