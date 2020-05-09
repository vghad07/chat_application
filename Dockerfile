FROM php:7.3-apache
#Install git
RUN apt-get update \
    && apt-get install -y git
RUN docker-php-ext-install pdo pdo_mysql mysqli
RUN a2enmod rewrite
#Install Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php --install-dir=. --filename=composer
RUN mv composer /usr/local/bin/
COPY ./chat_application /var/www/html/
#Allocate memory limit to composer"
RUN php -d memory_limit=-1 /usr/local/bin/composer install
#Clear cache memory
RUN php artisan optimize:clear
#Migrate Database
RUN php artisan migrate
#change uid and gid of apache to docker user uid/gid
RUN usermod -u 1000 www-data && groupmod -g 1000 www-data
#change the web_root to laravel /var/www/html/public folder
RUN sed -i -e "s/html/html\/public/g" /etc/apache2/sites-enabled/000-default.conf
RUN chown -R www-data:www-data \
        /var/www/html/storage \
        /var/www/html/bootstrap/cache \
        /var/www/html
WORKDIR /var/www/html/
EXPOSE 80
