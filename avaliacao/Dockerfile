FROM php:8.2-fpm

# Arguments defined in docker-compose.yml
ARG user=phpuser
ARG uid=1000

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    nano \
    zip \
    unzip \
    bash \
    sudo \
    default-mysql-client \
    libcurl4-openssl-dev \
    pkg-config \
    libssl-dev \
    libicu-dev

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-configure zip
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip opcache
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug
RUN docker-php-ext-configure intl && docker-php-ext-install intl && docker-php-ext-enable intl

RUN mv /usr/local/etc/php/php.ini-production /usr/local/etc/php/php.ini

#php.ini config
RUN echo "memory_limit=8196M" >> /usr/local/etc/php/php.ini
RUN echo "date.timezone = America/Sao_Paulo" >> /usr/local/etc/php/php.ini
RUN echo "post_max_size = 500M" >> /usr/local/etc/php/php.ini
RUN echo "upload_max_filesize = 250M" >> /usr/local/etc/php/php.ini
RUN echo "file_uploads = On" >> /usr/local/etc/php/php.ini
RUN echo "max_execution_time = 300" >> /usr/local/etc/php/php.ini

# RUN apt-get install ca-certificates
# RUN update-ca-certificates

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Set working directory
WORKDIR /var/www

RUN mkdir /var/www/storage
RUN chmod -R 777 /var/www/storage
RUN chown -R $user:$user /var/www

USER $user