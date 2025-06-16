FROM php:8.1.4-cli

# Atualiza os pacotes e instala dependências do sistema
RUN apt-get update && apt-get upgrade -y && \
    apt-get install -y \
    bash \
    git \
    sudo \
    openssh-client \
    libxml2-dev \
    libonig-dev \
    autoconf \
    gcc \
    g++ \
    make \
    npm \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libzip-dev \
    libssl-dev \
    libcurl4-openssl-dev \
    libicu-dev \
    libssh2-1-dev \
    unzip \
    pkg-config \
    libpq-dev

# Instala extensões PHP
RUN pecl install pcov ssh2 && \
    pecl install mongodb-1.15.0
RUN docker-php-ext-enable pcov ssh2 mongodb
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install mbstring xml pcntl gd zip sockets pdo pdo_mysql bcmath soap intl

# Instala o Swoole
RUN cd /tmp && git clone https://github.com/swoole/swoole-src.git && \
    cd swoole-src && \
    phpize && \
    ./configure && \
    make -j$(nproc) && make install

RUN echo "extension=swoole.so" > /usr/local/etc/php/conf.d/swoole.ini

# Instalar o Composer
RUN curl -sS https://getcomposer.org/installer | php -- \
    --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/app
CMD php artisan octane:start --server="swoole" --host="0.0.0.0"
