FROM php:8.1.4-apache

COPY * /var/www/html
COPY php.ini /usr/local/etc/php/php.ini
RUN docker-php-ext-install pdo pdo_mysql