FROM php:8.0-fpm

RUN apt-get update && apt-get install -y libpq-dev git libzip-dev zip
RUN docker-php-ext-install pdo pdo_mysql pdo_pgsql
RUN pecl install xdebug \
    && docker-php-ext-install zip \
    && docker-php-ext-enable xdebug

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/laravel
EXPOSE 9000
CMD ["php-fpm"]
