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


RUN curl -o /tmp/composer-setup.php https://getcomposer.org/installer \
&& curl -o /tmp/composer-setup.sig https://composer.github.io/installer.sig \
# Make sure we're installing what we think we're installing!
&& php -r "if (hash('SHA384', file_get_contents('/tmp/composer-setup.php')) !== trim(file_get_contents('/tmp/composer-setup.sig'))) { unlink('/tmp/composer-setup.php'); echo 'Invalid installer' . PHP_EOL; exit(1); }" \
&& php /tmp/composer-setup.php --no-ansi --install-dir=/usr/local/bin --filename=composer --snapshot \
&& rm -f /tmp/composer-setup.*