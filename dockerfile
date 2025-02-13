FROM php:8.0-apache

RUN docker-php-ext-install mysqli

COPY ./www /var/www/html

RUN chown -R www-data:www-data /var/www/html

EXPOSE 80 443

CMD ["apache2-foreground"]
