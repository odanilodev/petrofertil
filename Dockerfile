FROM php:7.2-apache

# Copie seu arquivo php.ini (se necessário)
COPY conf/php.ini /usr/local/etc/php/php.ini

# Ative o mod_rewrite do Apache
RUN a2enmod rewrite

# Instale extensões e dependências necessárias
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install gd mysqli calendar

# Limpeza de pacotes para reduzir o tamanho da imagem
RUN apt-get clean && rm -rf /var/lib/apt/lists/*
