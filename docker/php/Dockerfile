# Use a PHP version compatible with Symfony 3.4, with active Debian repos
FROM php:7.3-fpm

RUN set -eux; \
    apt-get update; \
    apt-get install -y --no-install-recommends \
        git \
        unzip \
        libpq-dev \
        libicu-dev \
        libxml2-dev \
        libzip-dev \
        zlib1g-dev \
    ; \
    docker-php-ext-configure intl; \
    docker-php-ext-install -j"$(nproc)" pdo_mysql intl zip; \
    rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Provide custom PHP configuration
COPY php.ini /usr/local/etc/php/conf.d/99-custom.ini

# php-fpm is the default CMD for this base image