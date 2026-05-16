FROM node:20-bullseye AS frontend
WORKDIR /app
COPY package.json package-lock.json* ./
RUN apt-get update \
    && apt-get install -y --no-install-recommends build-essential python3 python-is-python3 \
    && rm -rf /var/lib/apt/lists/* \
    && export npm_config_build_from_source=true \
    && npm ci --prefer-offline --no-audit --progress=false \
    && npm rebuild --build-from-source || true

# Workaround: ensure Rollup native optional binary is present (fixes npm optional deps bug in some CI)
RUN npm i @rollup/rollup-linux-x64-gnu --no-save || true
COPY resources ./resources
COPY public ./public
COPY vite.config.js postcss.config.js tailwind.config.js ./
RUN npm run build

FROM php:8.2-apache AS app

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libssl-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql \
    && pecl install mongodb \
    && docker-php-ext-enable mongodb \
    && a2enmod rewrite

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
    && sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

WORKDIR /var/www/html

COPY composer.json composer.lock* ./
RUN composer install --no-interaction --no-dev --optimize-autoloader --prefer-dist

COPY . .
COPY --from=frontend /app/public/build ./public/build

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 80
CMD ["apache2-foreground"]
