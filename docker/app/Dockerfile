FROM php:8.2-apache

# Устанавливаем необходимые зависимости и расширения PHP
RUN apt-get update && apt-get install -y \
    zip unzip git curl libpng-dev libonig-dev libxml2-dev libicu-dev libzip-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd intl zip \
    && a2enmod rewrite \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Установка Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Рабочая директория
WORKDIR /var/www/html

# Копируем конфиг Apache
COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf
# Порт
EXPOSE 80
