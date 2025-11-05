#!/bin/bash

echo "🚀 Building for Production..."

# Install dependencies
echo "📦 Installing dependencies..."
composer install --no-dev --optimize-autoloader --no-interaction
npm ci

# Build assets
echo "🎨 Building assets..."
npm run build

# Cache config
echo "⚡ Caching config..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Optimize
echo "🔧 Optimizing..."
php artisan optimize

echo "✅ Build completed!"
