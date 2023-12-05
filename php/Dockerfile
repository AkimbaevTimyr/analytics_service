FROM php:fpm-alpine


WORKDIR /app

COPY . .

RUN docker-php-ext-install pdo pdo_mysql
