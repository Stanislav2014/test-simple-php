FROM php:7.4-fpm

ARG DEBIAN_FRONTEND=noninteractive

WORKDIR /srv/broker

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    libpq-dev \
    libmemcached-dev

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo pdo_pgsql mbstring exif pcntl bcmath opcache gd zip

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer