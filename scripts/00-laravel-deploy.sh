#!/usr/bin/env bash
# echo "Running composer"
# composer global require hirak/prestissimo
echo "Running composer..."
composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader --working-dir=/var/www/html

echo "Installing npm dependencies..."
npm ci --no-audit --prefer-offline

echo "Running npm run build..."
npm run build --if-present

echo "generating application key..."
php artisan key:generate --show

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

echo "Running migrations..."
php artisan migrate --force