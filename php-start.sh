---
#!/bin/bash

echo "Allocate memory limit to composer"
php -d memory_limit=-1 /usr/bin/composer install

echo "php site in live mode"
php artisan up
