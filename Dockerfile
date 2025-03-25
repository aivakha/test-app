# Use official PHP image with necessary extensions
FROM php:8.2-cli

# Install dependencies for PHP extensions and Node.js
RUN apt-get update && apt-get install -y \
    git unzip curl libzip-dev zip nodejs npm

# Enable zip extension for Laravel
RUN docker-php-ext-install zip

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy Laravel app files
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Install Node modules and build assets
RUN npm install && npm run build

# Set permissions
RUN chmod -R 755 storage bootstrap/cache

# Expose port 8000 for artisan serve
EXPOSE 8000

# Run Laravel dev server
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
