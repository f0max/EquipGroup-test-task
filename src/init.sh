#!/bin/bash

chown -R www-data:www-data .
chmod -R o+rwx .

composer install

php artisan key:generate
php artisan config:cache
php artisan migrate
