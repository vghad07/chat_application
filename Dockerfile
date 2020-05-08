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
WORKDIR /var/www/html/chat_application/
CMD php artisan migrate
CMD php artisan optimize:clear
EXPOSE 80
