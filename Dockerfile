FROM php:8.1.4-apache

COPY * /var/www/html
RUN docker-php-ext-install pdo pdo_mysql