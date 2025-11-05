# 🚀 HƯỚNG DẪN DEPLOY DỰ ÁN LÊN RAILWAY.APP

## ✅ CÁC FILE ĐÃ TẠO SẴN:
- `Procfile` - Lệnh chạy server
- `nixpacks.toml` - Config build cho Railway
- `.railwayignore` - Ignore files không cần thiết

---

## 📋 BƯỚC 1: CHUẨN BỊ DỰ ÁN

### 1.1. Commit code lên GitHub
```bash
git add .
git commit -m "Prepare for Railway deployment"
git push origin main
```

### 1.2. Đảm bảo file .env.example đầy đủ
Kiểm tra file `.env.example` có đầy đủ các biến cần thiết

---

## 🚂 BƯỚC 2: DEPLOY LÊN RAILWAY

### 2.1. Đăng ký Railway
1. Truy cập: https://railway.app
2. Đăng ký/Đăng nhập bằng GitHub

### 2.2. Tạo Project Mới
1. Click **"New Project"**
2. Chọn **"Deploy from GitHub repo"**
3. Chọn repository của bạn: `LearningSupportAndExamSys`
4. Railway sẽ tự động detect Laravel và build

### 2.3. Thêm MySQL Database
1. Trong project Railway, click **"New"**
2. Chọn **"Database"** → **"Add MySQL"**
3. Railway sẽ tự động tạo database

### 2.4. Config Environment Variables
Click vào **service Laravel** → Tab **"Variables"**

Thêm các biến sau:

```env
APP_NAME="Santuy Restaurant"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-app-name.up.railway.app

# Database (Railway sẽ tự động inject)
DB_CONNECTION=mysql
DB_HOST=${MYSQL_HOST}
DB_PORT=${MYSQL_PORT}
DB_DATABASE=${MYSQL_DATABASE}
DB_USERNAME=${MYSQL_USER}
DB_PASSWORD=${MYSQL_PASSWORD}

# Session & Cache
SESSION_DRIVER=database
CACHE_STORE=database
QUEUE_CONNECTION=database

# Mail (tùy chọn)
MAIL_MAILER=log
```

**LƯU Ý:** Railway tự động inject các biến `MYSQL_*` từ database service!

### 2.5. Generate APP_KEY
1. Trong tab Variables, thêm biến:
```env
APP_KEY=
```
2. Railway sẽ tự động generate key khi deploy

**HOẶC** generate local rồi copy:
```bash
php artisan key:generate --show
```

### 2.6. Kết nối Database với Laravel Service
1. Click vào **MySQL service**
2. Tab **"Connect"**
3. Copy các biến `MYSQL_*`
4. Railway sẽ tự động reference trong Laravel service

---

## 🔧 BƯỚC 3: CHỈNH SỬA CODE (NẾU CẦN)

### 3.1. Update TrustProxies Middleware
File: `app/Http/Middleware/TrustProxies.php`

```php
protected $proxies = '*';
```

### 3.2. Update storage path (nếu cần upload file)
Railway không persistent storage, nên để sau config S3/Cloudinary

---

## 🎉 BƯỚC 4: DEPLOY & KIỂM TRA

### 4.1. Deploy
1. Railway sẽ tự động deploy sau khi push code
2. Xem logs trong tab **"Deployments"**

### 4.2. Kiểm tra
1. Click **"Settings"** → Copy **Public URL**
2. Mở URL trong browser
3. Kiểm tra website hoạt động

### 4.3. Chạy Migration thủ công (nếu cần)
Trong Railway, mở **Terminal** và chạy:
```bash
php artisan migrate --force
php artisan db:seed --force
```

---

## 🌐 BƯỚC 5: SETUP DOMAIN RIÊNG (TÙY CHỌN)

### 5.1. Mua Domain
- Namecheap.com
- GoDaddy.com
- Tên miền .vn: Mat Bao, Nhân Hòa

### 5.2. Config DNS
1. Trong Railway: **Settings** → **Domains** → **Custom Domain**
2. Thêm domain của bạn: `santuyrestaurant.com`
3. Copy CNAME record
4. Vào DNS provider, thêm CNAME:
```
Type: CNAME
Name: www (hoặc @)
Value: <railway-url>
```

---

## ⚡ BƯỚC 6: TỐI ƯU PERFORMANCE

### 6.1. Cache Config
Trong Railway Terminal:
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### 6.2. Enable OPcache
Railway đã enable sẵn PHP OPcache

---

## 🔐 BẢO MẬT

### 7.1. Checklist
- ✅ `APP_DEBUG=false` trong production
- ✅ `APP_ENV=production`
- ✅ `.env` không commit lên Git
- ✅ Strong `APP_KEY`
- ✅ HTTPS enabled (Railway tự động)

---

## 📊 GIÁM SÁT

### 8.1. Logs
- Railway Console → **Logs** tab
- Hoặc: `php artisan pail` trong Terminal

### 8.2. Monitoring
- Railway tự động monitor: CPU, Memory, Network
- Tab **"Metrics"**

---

## 💰 CHI PHÍ

### Free Tier
- $5 credit/tháng (miễn phí)
- Đủ cho website nhỏ/medium
- Database MySQL miễn phí

### Nếu vượt quá
- Pay as you go: ~$5-10/tháng
- Hoặc nâng cấp plan: $20/tháng (unlimited)

---

## 🆘 TROUBLESHOOTING

### Lỗi "500 Internal Server Error"
1. Check logs: Railway Console → Logs
2. Kiểm tra `APP_KEY` đã set
3. Kiểm tra database connection

### Lỗi "Mix manifest not found"
```bash
npm run build
git add public/build
git commit -m "Add build files"
git push
```

### Lỗi Migration
```bash
# Railway Terminal
php artisan migrate:fresh --force
```

### Lỗi Permission
```bash
chmod -R 775 storage bootstrap/cache
```

---

## 🔄 UPDATE CODE

Mỗi lần update code:
```bash
git add .
git commit -m "Update features"
git push origin main
```
Railway sẽ tự động redeploy!

---

## 📱 CÁC LỰA CHỌN KHÁC

### 1. Deploy lên Render.com (Miễn phí)
- Tương tự Railway
- Free PostgreSQL database
- Docs: https://render.com

### 2. Deploy lên VPS (DigitalOcean)
- Control hoàn toàn
- $4-6/tháng
- Cần setup: Nginx, PHP-FPM, MySQL

### 3. Laravel Forge (Dễ nhất)
- Auto setup VPS
- $12/tháng + VPS cost
- Recommend cho production

---

## 📚 TÀI LIỆU THAM KHẢO

- Railway Docs: https://docs.railway.app
- Laravel Deployment: https://laravel.com/docs/deployment
- Laravel Forge: https://forge.laravel.com

---

## 🎯 CHECKLIST TRƯỚC KHI DEPLOY

- [ ] Code đã commit lên GitHub
- [ ] `.env.example` đầy đủ
- [ ] `APP_DEBUG=false` trong production
- [ ] Database connection config đúng
- [ ] `npm run build` đã chạy
- [ ] Test local trước khi deploy

---

**Chúc bạn deploy thành công! 🚀**

Có vấn đề gì cứ hỏi tôi nhé!
