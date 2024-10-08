FROM php:7.4 as php

RUN apt-get update -y
RUN apt-get install -y unzip libpq-dev libcurl4-gnutls-dev
RUN docker-php-ext-install pdo pdo_mysql bcmath

#RUN pecl install -o -f redis \
#    && rm -rf /tmp/pear \
#    && docker-php-ext-enable redis

WORKDIR /app
COPY . .

COPY --from=composer:2.7.4 /usr/bin/composer /usr/bin/composer

ENV PORT=8000
ENTRYPOINT [ "/app/docker/entrypoint.sh" ]

# ==============================================================================
#  node
#FROM node:14-alpine as node
#
#WORKDIR /var/www
#COPY . .
#
#RUN npm install --global cross-env
#RUN npm install
#
#VOLUME /var/www/node_modules
