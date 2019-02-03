FROM php:7.2-fpm

COPY ./custom.php.ini $PHP_INI_DIR/conf.d/

RUN apt-get update && apt-get install --no-install-recommends -y \
        wget \
        vim \
        git \
        unzip \
        zlib1g-dev \
        libssl-dev \
        openssl \
        && pecl install redis \
        && pecl install xdebug 

RUN docker-php-ext-install  \
    mysqli \
    pdo \
    pdo_mysql \
    mysqli \
    zip \
&& docker-php-ext-enable \
        redis \
        xdebug