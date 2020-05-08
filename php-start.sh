---
#! /bin/bash

echo "Start Docker Container"
docker exec --tty chat_app /bin/bash
php -d memory_limit=-1 /usr/bin/composer install
php artisan optimize:clear
php artisan migrate
php artisan serve --host=0.0.0.0 --port=9000

