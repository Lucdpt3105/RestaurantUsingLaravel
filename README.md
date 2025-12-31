
# 🍽️ Santuy Restaurant - Nhà hàng F&B

> **Môn học:** Nhập Môn Công Nghệ Phần Mềm  
> **Năm học:** 2025-2026  
> **Team:** Nhóm 8

---

## 📋 Mục Lục

- [Giới thiệu](#giới-thiệu)
- [Yêu cầu hệ thống](#yêu-cầu-hệ-thống)
- [Công nghệ sử dụng](#công-nghệ-sử-dụng)
- [Hướng dẫn cài đặt](#hướng-dẫn-cài-đặt)
- [Cấu hình Database](#cấu-hình-database)
- [Chạy dự án](#chạy-dự-án)
- [Cấu trúc dự án](#cấu-trúc-dự-án)
- [Troubleshooting](#troubleshooting)
- [Team](#team)
- [License](#license)

---

## 🌟 Giới thiệu

**Santuy Restaurant** là website quản lý thực đơn nhà hàng F&B, xây dựng bằng Laravel 12, PHP 8.2, MySQL, Tailwind CSS và Vite. Hệ thống cho phép quản trị viên thực hiện đầy đủ chức năng CRUD (thêm, sửa, xóa, xem) món ăn với các trường: tên món, mô tả, giá, danh mục, hình ảnh, trạng thái còn hàng.

---

## 💻 Yêu cầu Hệ thống

- **PHP** >= 8.2
- **Composer** >= 2.x
- **Node.js** >= 18.x và **npm**
- **MySQL** >= 8.0 (hoặc MariaDB)
- **Git**

---

## 🛠️ Công nghệ Sử dụng

- **Laravel 12**
- **MySQL**
- **Blade Templates**
- **Tailwind CSS v4**
- **Vite**
- **Laravel Artisan**

---

## 📥 Hướng dẫn Cài đặt

### 1. Clone Repository

```bash
git clone https://github.com/Lucdpt3105/SantuyProject.git
cd SantuyProject
```

### 2. Cài đặt Dependencies

```bash
composer install
npm install
```

### 3. Tạo file Environment

```bash
copy .env.example .env   # Windows
cp .env.example .env     # Linux/Mac
```

### 4. Generate Application Key

```bash
php artisan key:generate
```

---

## 🗄️ Cấu hình Database

1. Tạo database trong MySQL:
  ```sql
  CREATE DATABASE santuy_db;
  ```
2. Mở file `.env` và chỉnh sửa thông tin database:
  ```env
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=santuy_db
  DB_USERNAME=root
  DB_PASSWORD=your_password_here
  ```
3. Chạy migration để tạo bảng:
  ```bash
  php artisan migrate
  ```
4. (Tùy chọn) Seed dữ liệu mẫu:
  ```bash
  php artisan db:seed --class=MenuSeeder
  ```

---

## 🚀 Chạy Dự án

1. Khởi động server Laravel:
  ```bash
  php artisan serve
  ```
2. Khởi động Vite để build frontend:
  ```bash
  npm run dev
  ```
3. Truy cập website:
  - Trang chủ: `http://localhost:8000`
  - Quản lý menu: `http://localhost:8000/menus`

---

## 📁 Cấu trúc Dự án

```
SantuyProject/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       └── MenuController.php
│   └── Models/
│       └── Menu.php
├── database/
│   ├── migrations/
│   │   └── ...
│   └── seeders/
│       └── MenuSeeder.php
├── resources/
│   ├── views/
│   │   ├── layouts/app.blade.php
│   │   └── menus/
│   │       ├── index.blade.php
│   │       ├── create.blade.php
│   │       ├── edit.blade.php
│   │       └── show.blade.php
│   ├── css/app.css
│   └── js/app.js
├── routes/
│   └── web.php
├── public/
├── .env
├── composer.json
├── package.json
└── vite.config.js
```

---

## 🐛 Troubleshooting

- **Lỗi: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost'**
  - Kiểm tra lại `DB_USERNAME` và `DB_PASSWORD` trong `.env`
- **Lỗi: Base table or view not found**
  - Chưa chạy migration: `php artisan migrate`
- **Lỗi: Vite manifest not found**
  - Chưa chạy: `npm run dev` hoặc `npm run build`
- **Lỗi: APP_KEY missing**
  - Chưa chạy: `php artisan key:generate`

---

## 👥 Team

- **Luc Dang** - [GitHub](https://github.com/Lucdpt3105)
- *Thêm tên các thành viên khác ở đây*

---

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
Project for educational purposes only (NMCNPM - 2025).

---

## 🆘 Support

Nếu gặp vấn đề, vui lòng:
- Kiểm tra phần Troubleshooting
- Tạo issue trên GitHub
- Liên hệ team members

**Happy Coding! 🚀**
