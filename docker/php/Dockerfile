FROM php:8.2-fpm

ENV PHP_INI_SCAN_DIR=/usr/local/etc/php/conf.d:/usr/local/etc/php/dev.conf.d

RUN docker-php-ext-install pdo_mysql

RUN pecl install xdebug-3.2.0 \
    && docker-php-ext-enable xdebug

RUN apt-get update && apt-get install git wget unzip -y

COPY --from=composer:2.5 /usr/bin/composer /bin/composer

WORKDIR /www
