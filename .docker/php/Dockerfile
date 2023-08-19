FROM php:8.2-fpm

# Установка необходимых зависимостей
RUN apt-get update && \
    apt-get install -y \
        git \
        zip \
        unzip \
        libpq-dev \
        libonig-dev \
        libxml2-dev \
        libjpeg62-turbo-dev \
        libfreetype6-dev \
        libwebp-dev \
        libpng-dev \
        libjpeg-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install pdo pdo_pgsql mysqli mbstring exif pcntl bcmath gd

# Установка Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Установка MySQL расширения
RUN docker-php-ext-install pdo_mysql

WORKDIR /var/www/html

CMD ["php-fpm"]
