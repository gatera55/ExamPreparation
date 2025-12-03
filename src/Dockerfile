FROM php:8.2-apache

# Enable mysqli extension for PHP
RUN docker-php-ext-install mysqli

# Copy your PHP source code into the container
COPY ./src /var/www/html/

EXPOSE 80