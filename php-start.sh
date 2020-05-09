---
#! /bin/bash

echo "Start Docker Container"
docker exec --tty chat_app /bin/bash
echo "composer install"
php -d memory_limit=-1 /usr/bin/composer install
echo "Clear cache memory"
php artisan optimize:clear
echo "Migrate database"
php artisan migrate
echo "PHP Site live"
php artisan serve --host=0.0.0.0 --port=9000

