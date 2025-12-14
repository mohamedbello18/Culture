#!/bin/bash
set -e

# Create Laravel's storage directories if they don't exist.
# This is crucial because the persistent disk is mounted as an empty directory.
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

# Clear caches (without caching)
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear

echo "✅ Deployment tasks completed. Starting server."

# Execute the original CMD
exec apache2-foreground
