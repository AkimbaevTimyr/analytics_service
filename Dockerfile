FROM php:fpm-alpine

COPY . /var/www/html

WORKDIR /var/www/html
