#!/bin/bash
set -e

cd /var/www

composer install

chmod -R 777 storage/ bootstrap/cache

mkdir -p public/images
chmod -R 777 public/images

php artisan down

php artisan migrate --force
php artisan route:clear
php artisan view:clear
php artisan config:clear
php artisan cache:clear
php artisan package:discover

service supervisor start
supervisorctl reread
supervisorctl update
supervisorctl restart all
php artisan queue:restart

php artisan up
