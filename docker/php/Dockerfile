FROM php:8.4-fpm

# Установка системных пакетов и PHP расширений
RUN apt-get update && apt-get install -y \
    git curl libpq-dev libzip-dev unzip zip \
    && docker-php-ext-install pdo pdo_pgsql zip

# Установка Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

RUN chown -R www-data:www-data /var/www
