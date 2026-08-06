FROM php:8.4-cli-alpine3.23

RUN apk add --no-cache libxml2-dev \
    && docker-php-ext-install dom xml

COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer

WORKDIR /app

CMD ["tail", "-f", "/dev/null"]
