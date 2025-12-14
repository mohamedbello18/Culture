#!/bin/bash

# Exit immediately if a command exits with a non-zero status.
set -e

echo "🚀 Starting Laravel deployment tasks..."

# Clear and optimize caches
echo "🧹 Clearing and optimizing caches..."
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache

# Run database migrations
echo "⬆️ Running database migrations..."
php artisan migrate --force

# Set correct permissions for storage and bootstrap cache
echo "🔒 Setting file permissions..."
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache

echo "✅ Deployment tasks completed."

# IMPORTANT: Do NOT start the web server here. The Dockerfile's CMD will handle it.
