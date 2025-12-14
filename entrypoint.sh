#!/bin/bash
set -e

# Create Laravel's storage directories if they don't exist.
mkdir -p /var/www/html/storage/app/public
mkdir -p /var/www/html/storage/framework/sessions
mkdir -p /var/www/html/storage/framework/views
mkdir -p /var/www/html/storage/framework/cache/data
mkdir -p /var/www/html/storage/logs

# Set correct permissions.
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

echo "🚀 Running deployment tasks..."

# Run database migrations
php artisan migrate --force

# Clear and OPTIMIZE caches. This is a critical diagnostic step.
# It will either fix the silent crash or fail with a clear error message.
echo "Attempting to build application caches..."
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear
php artisan config:cache
php artisan view:cache
php artisan event:cache

echo "✅ Deployment tasks completed. Starting server."

# Execute the original CMD
exec apache2-foreground
