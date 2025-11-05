# 🚀 Quick Deploy Guide - Santuy Restaurant

## Deploy Options (Chọn 1)

### Option 1️⃣: Railway.app (MIỄN PHÍ - RECOMMEND)
**Ưu điểm:** Miễn phí, tự động deploy, có MySQL free
**Thời gian:** 5-10 phút

📖 **[Xem hướng dẫn chi tiết tại DEPLOY.md](./DEPLOY.md)**

**Tóm tắt:**
1. Push code lên GitHub
2. Vào https://railway.app → Deploy from GitHub
3. Add MySQL database
4. Set environment variables
5. Done! ✅

---

### Option 2️⃣: Render.com (MIỄN PHÍ)
**Ưu điểm:** Miễn phí, PostgreSQL free
**Nhược điểm:** Slower cold start

1. Push code lên GitHub
2. Vào https://render.com → New Web Service
3. Connect GitHub repo
4. Add PostgreSQL database
5. Set build command: `./build.sh`
6. Set start command: `php artisan serve --host=0.0.0.0 --port=$PORT`

---

### Option 3️⃣: VPS (DigitalOcean, Vultr, etc.)
**Chi phí:** $4-6/tháng
**Ưu điểm:** Control hoàn toàn, hiệu năng tốt

**Setup cần:**
- Ubuntu 22.04
- Nginx
- PHP 8.2
- MySQL 8
- Composer
- Node.js 20

**Script tự động:** (sẽ update sau)

---

### Option 4️⃣: Laravel Forge + VPS
**Chi phí:** $12/tháng + VPS cost
**Ưu điểm:** Dễ nhất, tự động hết

1. Đăng ký Laravel Forge: https://forge.laravel.com
2. Connect VPS provider (DigitalOcean, Vultr, etc.)
3. Create server
4. Deploy site từ GitHub
5. Done! ✅

---

## 🔧 Build trước khi deploy

### Windows:
```bash
.\build.bat
```

### Linux/Mac:
```bash
chmod +x build.sh
./build.sh
```

---

## 📝 Environment Variables cần set

```env
APP_NAME="Santuy Restaurant"
APP_ENV=production
APP_DEBUG=false
APP_KEY=base64:... (generate bằng: php artisan key:generate --show)
APP_URL=https://your-domain.com

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password

SESSION_DRIVER=database
CACHE_STORE=database
QUEUE_CONNECTION=database
```

---

## ✅ Checklist trước khi deploy

- [ ] Code đã commit lên GitHub
- [ ] Đã chạy `npm run build`
- [ ] APP_DEBUG=false
- [ ] APP_ENV=production
- [ ] Database credentials đúng
- [ ] APP_KEY đã generate

---

## 🆘 Cần giúp đỡ?

Đọc file **DEPLOY.md** để xem hướng dẫn chi tiết!

---

**Made with ❤️ by Santuy Team**
