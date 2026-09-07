# ====================================================
# Stage 1: Build environment and Composer dependencies
# ====================================================
FROM php:8.3-fpm-alpine AS builder

# Install system dependencies and PHP extensions for Laravel with MySQL support.
# Dependencies in this stage are only required for building the final image.
# hadolint ignore=DL3018,SC2046
RUN apk update && apk add --no-cache \
    curl \
    unzip \
    postgresql-dev \
    oniguruma-dev \
    openssl-dev \
    libxml2-dev \
    curl-dev \
    icu-dev \
    libzip-dev \
    linux-headers \
    build-base \
    autoconf \
    && docker-php-ext-install -j$(nproc) \
    pdo_mysql \
    pdo_pgsql \
    pgsql \
    intl \
    zip \
    bcmath \
    soap \
    && pecl install redis \
    && docker-php-ext-enable redis

# Set the working directory inside the container
WORKDIR /var/www

# Copy the entire Laravel application code into the container AFTER dependencies are cached
COPY . /var/www

# Fixes DL4006 by ensuring piped command errors fail the build
SHELL ["/bin/ash", "-o", "pipefail", "-c"]

# Install Composer and dependencies
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && composer install --no-dev --optimize-autoloader --no-interaction --no-progress --prefer-dist

# ==========================================
# Stage 2: Production environment
# ==========================================
FROM php:8.3-fpm-alpine AS production

# Install only runtime libraries needed in production
# hadolint ignore=DL3018
RUN apk update && apk upgrade --no-cache && apk add --no-cache \
    postgresql-libs \
    icu-libs \
    libzip \
    fcgi

# Download and install php-fpm health check script
RUN curl -o /usr/local/bin/php-fpm-healthcheck \
    https://raw.githubusercontent.com/renatomefi/php-fpm-healthcheck/master/php-fpm-healthcheck \
    && chmod +x /usr/local/bin/php-fpm-healthcheck

# Copy the initialization script
COPY docker/php-fpm/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# Copy the initial storage structure
COPY storage /var/www/storage-init

# Copy PHP extensions and libraries from the builder stage
COPY --from=builder /usr/local/lib/php/extensions/ /usr/local/lib/php/extensions/
COPY --from=builder /usr/local/etc/php/conf.d/ /usr/local/etc/php/conf.d/
COPY --from=builder /usr/local/bin/docker-php-ext-* /usr/local/bin/

# Use production PHP settings
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

# Keep the image-provided FPM global config intact and add pool overrides separately
COPY docker/php-fpm/conf.d/*.conf /usr/local/etc/php-fpm.d/

# Copy the application code and dependencies from the build stage
COPY --from=builder /var/www /var/www

# Set working directory
WORKDIR /var/www

# Ensure correct permissions
RUN chown -R www-data:www-data /var/www

# Switch to the non-privileged user to run the application
USER www-data

# Change the default command to run the entrypoint script
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
