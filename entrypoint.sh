#!/bin/bash
set -e

# Set correct permissions. This is important because the storage volume is mounted at runtime.
chown -R www-data:www-data /var/www/html/storage /var/w/html/bootstrap/cache
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

echo "🚀 Running deployment tasks..."

# Clear caches (without caching)
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear

echo "✅ Deployment tasks completed. Starting server."

# Execute the original CMD
exec apache2-foreground
