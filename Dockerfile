# ==========================================
# Stage 1: Frontend asset build (Node.js Alpine)
# ==========================================
FROM node:20-alpine AS frontend-builder

WORKDIR /var/www

# Copy package manifests and install dependencies
COPY package*.json ./
RUN npm install

# Copy application files and build static assets
COPY . .
RUN npm run build

# ==========================================
# Stage 2: Backend build & Composer (PHP Alpine)
# ==========================================
FROM php:8.3-fpm-alpine AS builder

# Install system dependencies and PHP extensions for Laravel with MySQL support.
# Dependencies in this stage are only required for building the final image.
RUN apt-get update && apt-get install -y --no-install-recommends \
    curl \
    unzip \
    libpq-dev \
    libonig-dev \
    libssl-dev \
    libxml2-dev \
    libcurl4-openssl-dev \
    libicu-dev \
    libzip-dev \
    && docker-php-ext-install -j$(nproc) \
    pdo_mysql \
    intl \
    zip \
    bcmath \
    soap \
    && pecl install redis \
    && docker-php-ext-enable redis \
    && apt-get autoremove -y && apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

WORKDIR /var/www

# Copy app code
COPY . /var/www

# Fixes DL4006 by ensuring piped command errors fail the build
SHELL ["/bin/ash", "-o", "pipefail", "-c"]

# Install Composer dependencies without dev tools
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && composer install --no-dev --optimize-autoloader --no-interaction --no-progress --prefer-dist

# ==========================================
# Stage 3: Minimal Production Runtime (PHP Alpine)
# ==========================================
FROM php:8.3-fpm-alpine AS production

# Install only runtime libraries needed in production
# libfcgi-bin and procps are required for the php-fpm-healthcheck script
RUN apt-get update && apt-get install -y --no-install-recommends \
    libpq-dev \
    libicu-dev \
    libzip-dev \
    libfcgi-bin \
    procps \
    && apt-get autoremove -y && apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Health check script for PHP-FPM
RUN curl -o /usr/local/bin/php-fpm-healthcheck \
    https://raw.githubusercontent.com/renatomefi/php-fpm-healthcheck/master/php-fpm-healthcheck \
    && chmod +x /usr/local/bin/php-fpm-healthcheck

RUN sed -i 's/;ping.path = \/ping/ping.path = \/ping/' /usr/local/etc/php-fpm.d/www.conf \
    && sed -i 's/;pm.status_path = \/status/pm.status_path = \/status/' /usr/local/etc/php-fpm.d/www.conf

# Copy compiled PHP extensions from the Alpine builder stage
COPY --from=builder /usr/local/lib/php/extensions/ /usr/local/lib/php/extensions/
COPY --from=builder /usr/local/etc/php/conf.d/ /usr/local/etc/php/conf.d/
COPY --from=builder /usr/local/bin/docker-php-ext-* /usr/local/bin/

# Use production PHP settings
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

# Copy PHP application code and Composer vendor files
COPY --from=builder /var/www /var/www

# Copy compiled frontend assets from the Node stage
COPY --from=frontend-builder /var/www/public/build /var/www/public/build

WORKDIR /var/www

# Set proper permissions for Laravel storage and cache
RUN chown -R www-data:www-data /var/www \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache

COPY start.sh /var/www/start.sh
RUN chmod +x /var/www/start.sh

USER www-data

EXPOSE 9000
ENTRYPOINT ["/var/www/start.sh"]
