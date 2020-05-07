---
#! /bin/bash

echo "Start Docker Container"
docker exec -it chat_app /bin/bash

echo "php application running on port - localhost:9000"
php artisan serve --host:0.0.0.0 --port=9000

