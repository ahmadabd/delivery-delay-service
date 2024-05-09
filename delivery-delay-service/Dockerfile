### stage 1 ###
FROM composer:2 as vendor

COPY database tests composer.json composer.lock ./

RUN composer install \
    --ignore-platform-reqs \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --prefer-dist \
    --optimize-autoloader && \
    composer dump-autoload

### stage 2 ###
FROM php:8.3-cli

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

# Install php dependencies
RUN apt-get update -y && apt-get install -y git nano libzip-dev \
    libpng-dev libfreetype6-dev libjpeg62-turbo-dev libxpm-dev libicu-dev libxslt1-dev libmemcached-dev supervisor \
    && apt-get clean && rm -rf /var/lib/apt/lists/* && \
    chmod +x /usr/local/bin/install-php-extensions && \
    install-php-extensions gd tokenizer && \
    docker-php-ext-install bcmath pdo_mysql zip pcntl && \
    pecl install swoole && docker-php-ext-enable swoole

# Install Postgre PDO
RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql pgsql \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql

#copy backend files
WORKDIR /var/www/html
COPY . .
COPY --from=vendor /app/vendor/ ./vendor/

#copy php configs
COPY ./_docker-config/custom.ini /usr/local/etc/php/conf.d/custom.ini

#copy entrypoint script and make it executable
COPY ./_docker-config/entrypoint.sh /usr/local/bin/entrypoint
RUN chmod u+x /usr/local/bin/entrypoint && \
    chgrp -fR www-data ./storage ./bootstrap/cache ./resources/views && \
    chmod -fR ug+rwx ./storage ./bootstrap/cache ./resources/views

COPY ./_docker-config/supervisord* /etc/supervisor/conf.d/

CMD ["/usr/local/bin/entrypoint"]
