# Image php
FROM php:7.1-fpm

RUN apt-get update && apt-get install -y libmcrypt-dev \
    mariadb-client libmagickwand-dev --no-install-recommends \
    && pecl install imagick \
    && docker-php-ext-enable imagick \
&& docker-php-ext-install mcrypt pdo_mysql

# Set timezone
RUN rm /etc/localtime
RUN ln -s /usr/share/zoexitneinfo/Europe/Paris /etc/localtime
RUN "date"

RUN usermod -u 1000 www-data
