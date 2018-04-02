FROM php:7.1-fpm-jessie

ARG host_ip
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && echo "xdebug.remote_host=$host_ip" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_port=9000" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_enable=on" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "env[XDEBUG_CONFIG] = \"idekey=PHPSTORM\"" >> /usr/local/etc/php-fpm.d/www.conf \
    && echo "env[PHP_IDE_CONFIG] = \"serverName=DockerComposeServer\"" >> /usr/local/etc/php-fpm.d/www.conf

RUN apt-get update && apt-get install git -y

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer