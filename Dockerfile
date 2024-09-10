FROM php:7.2-apache
COPY conf/php.ini /usr/local/etc/php/php.ini
RUN a2enmod rewrite
RUN docker-php-ext-install mysqli
RUN docker-php-ext-install calendar