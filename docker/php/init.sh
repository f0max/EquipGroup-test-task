#!/bin/sh

composer install --no-interaction --prefer-dist --optimize-autoloader

chown -R www-data:www-data .
chmod -R o+rwx .

php artisan key:generate
php artisan config:cache
php artisan migrate

