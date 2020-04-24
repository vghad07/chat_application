---
#!/bin/bash

echo "Allocate memory limit to composer"
php -d memory_limit=-1 /usr/bin/composer install

echo "php site in live mode"
php artisan up

echo "php application running on port - localhost:8080"
php artisan serve --host:0.0.0.0 --port=8080
