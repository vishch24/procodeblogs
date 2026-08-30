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

# Install build dependencies using Alpine's 'apk'
RUN apk add --no-cache \
    curl=8.21.0-r0 \
    unzip=6.0-r16 \
    oniguruma-dev=6.0-r16 \
    openssl-dev=3.5.8-r0 \
    libxml2-dev=2.13.9-r2 \
    curl-dev=8.21.0-r0 \
    icu-dev=78.1-r0 \
    libzip-dev=1.11.4-r2 \
    linux-headers=7.2.1-r0 \
    "$PHPIZE_DEPS" \
    && docker-php-ext-install -j$(nproc) \
    pdo_mysql \
    intl \
    zip=3.0-r13 \
    bcmath \
    soap \
    && pecl install redis \
    && docker-php-ext-enable redis \
    && apk del "$PHPIZE_DEPS" # Remove heavy build tools to save space

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

# Install ONLY the runtime libraries needed for the compiled extensions
RUN apk add --no-cache \
    icu-libs=78.1-r0 \
    libzip=1.11.4-r2 \
    fcgi=2.4.6-r0 \
    procps=3.3.17-r1 

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
