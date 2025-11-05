@echo off
echo 🚀 Building for Production...

REM Install dependencies
echo 📦 Installing dependencies...
call composer install --no-dev --optimize-autoloader --no-interaction
call npm ci

REM Build assets
echo 🎨 Building assets...
call npm run build

REM Cache config
echo ⚡ Caching config...
call php artisan config:cache
call php artisan route:cache
call php artisan view:cache

REM Optimize
echo 🔧 Optimizing...
call php artisan optimize

echo ✅ Build completed!
pause
