FROM php:8.1.4-cli-alpine

RUN apk --no-cache upgrade && \
    apk --no-cache  \
    add  \
    bash  \
    git  \
    sudo  \
    openssh \
    libxml2-dev  \
    oniguruma-dev \
    autoconf \
    gcc \
    g++ \
    make \
    npm \
    freetype-dev \
    libjpeg-turbo-dev \
    libpng-dev \
    libzip-dev \
    openssl-dev \
    curl-dev \
    icu-dev

# PHP: Install php extensions
RUN pecl channel-update pecl.php.net
RUN pecl install pcov ssh2 mongodb
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install mbstring xml pcntl gd zip sockets pdo pdo_mysql bcmath soap
RUN docker-php-ext-enable mbstring xml gd zip pcov pcntl sockets bcmath pdo pdo_mysql soap mongodb
RUN docker-php-ext-configure intl && docker-php-ext-install intl

# install and compile swoole from source
RUN cd /tmp && git clone https://github.com/swoole/swoole-src.git && \
    cd swoole-src && \
    phpize  && \
    ./configure && \
    make && make install
#config swoole
RUN touch /usr/local/etc/php/conf.d/openswoole.ini && \
    echo 'extension=swoole.so' > /usr/local/etc/php/conf.d/swoole.ini

RUN curl -sS https://getcomposer.org/installer | php -- \
     --install-dir=/usr/local/bin --filename=composer

# Application directory
WORKDIR "/var/www/app"

CMD php artisan octane:start --server="swoole" --host="0.0.0.0"
