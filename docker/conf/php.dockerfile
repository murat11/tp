FROM php:7.2-cli
MAINTAINER Murat Erkenov <murat@11bits.net>

RUN apt-get update && apt-get install -y --no-install-recommends libssl-dev libmcrypt-dev libxml2-dev libzip-dev git libcurl4-openssl-dev

RUN docker-php-ext-install opcache xml zip

RUN pecl install xdebug

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY /php/conf.d/* /usr/local/etc/php/conf.d/
