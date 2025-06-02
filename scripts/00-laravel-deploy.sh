#!/usr/bin/env bash

# Install Node.js (Render doesn't include it by default)
curl -fsSL https://deb.nodesource.com/setup_16.x | bash -
apt-get install -y nodejs

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