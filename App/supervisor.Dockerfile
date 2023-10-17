FROM php:8.1-fpm-alpine3.16

RUN apk add --no-cache --update sudo supervisor && docker-php-ext-install pdo pdo_mysql

RUN addgroup -g 1000 -S laravel && adduser -u 1000 -G laravel -S laravel

COPY --from=composer:2.5.4 /usr/bin/composer /usr/bin/composer

COPY php.ini /usr/local/etc/php/

COPY www.conf /usr/local/etc/php-fpm.d/www.conf

COPY supervisord.conf /etc/supervisor/supervisord.conf

COPY --chown=laravel:laravel crontab /home/laravel/

RUN crontab -u laravel /home/laravel/crontab

ENTRYPOINT ["/usr/bin/supervisord", "-n", "-c", "/etc/supervisor/supervisord.conf"]
