FROM php:8.3-cli-alpine

RUN apk add --no-cache git unzip oniguruma-dev libxml2-dev \
    && docker-php-ext-install -j$(nproc) pdo_mysql pcntl mbstring dom xml xmlwriter

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
