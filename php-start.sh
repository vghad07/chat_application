---
#! /bin/bash

echo "Start Docker Container"
docker exec -i --tty chat_app /bin/bash
echo "composer install"
php -d memory_limit=-1 /usr/bin/composer install
echo "Clear cache memory"
php artisan optimize:clear
echo "Migrate database"
php artisan migrate
