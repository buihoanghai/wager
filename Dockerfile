FROM php:8.3-fpm

WORKDIR /var/www/html
COPY src/. /var/www/html/
# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql

# Install required dependencies for Composer and Xdebug
RUN apt-get update && apt-get install -y \
    autoconf \
    dpkg-dev \
    file \
    g++ \
    gcc \
    libc-dev \
    make \
    pkg-config \
    re2c \
    unzip \
    git \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && rm -rf /var/lib/apt/lists/*

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


# Install PHP dependencies
RUN composer update --no-dev --optimize-autoloader

# Copy the rest of the project files
COPY --chown=www-data:www-data . /var/www/html

# Ensure necessary directories exist and have correct permissions
RUN mkdir -p /var/www/html/storage \
    && mkdir -p /var/www/html/bootstrap/cache \
    && chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache \
