# Use PHP base image
FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpq-dev libonig-dev libxml2-dev \
    libzip-dev libcurl4-openssl-dev \
    nodejs npm \
    && docker-php-ext-install pdo pdo_pgsql mbstring zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy project files
COPY . .

# Install Laravel backend dependencies
RUN composer install --no-dev --optimize-autoloader

# Install and build frontend (Vite)
RUN npm install && npm run build

# Laravel cache optimization
RUN php artisan config:cache && php artisan route:cache

# Expose port for Laravel server
EXPOSE 8000

# Start Laravel server
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]