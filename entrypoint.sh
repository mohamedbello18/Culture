#!/bin/bash
set -e

# Set correct permissions. This is important because the storage volume is mounted at runtime.
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

echo "🚀 Running deployment tasks..."

# Run database migrations
php artisan migrate --force

# Clear and optimize caches
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache

echo "✅ Deployment tasks completed. Starting server."

# Execute the original CMD
exec apache2-foreground
