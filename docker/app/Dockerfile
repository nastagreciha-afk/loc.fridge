FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    libpng-dev \
    libzip-dev \
    zip unzip \
    git \
    curl \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-install pdo_mysql bcmath gd zip \
    && a2enmod rewrite \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

WORKDIR /var/www

COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf

EXPOSE 80
