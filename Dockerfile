FROM php:7.2.10-apache-stretch

RUN apt-get update -yqq && \
  apt-get install -y apt-utils zip unzip && \
  apt-get install -y nano && \
  apt-get install -y libzip-dev && \
  a2enmod rewrite && \
  docker-php-ext-install mysqli pdo pdo_mysql && \
  docker-php-ext-configure zip --with-libzip && \
  docker-php-ext-install zip && \
  rm -rf /var/lib/apt/lists/*

RUN php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer

COPY ./chat_application /var/www/html

WORKDIR /var/www/html

CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]

EXPOSE 80