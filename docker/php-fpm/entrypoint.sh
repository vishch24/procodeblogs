#!/bin/sh
set -e   # if any command below fails, stop immediately — don't limp forward into a broken app

# Initialize storage directory if empty
# -----------------------------------------------------------
# If the storage directory is empty, copy the initial contents
# and set the correct permissions.
# -----------------------------------------------------------
if [ ! "$(ls -A /var/www/storage)" ]; then
  echo "Initializing storage directory..."
  cp -R /var/www/storage-init/. /var/www/storage
  chown -R www-data:www-data /var/www/storage
fi

# Remove storage-init directory
rm -rf /var/www/storage-init

# Run Laravel migrations
# -----------------------------------------------------------
# Ensure the database schema is up to date.
# -----------------------------------------------------------

echo "Running migrations..."
php artisan migrate --force   # --force is required because this is a production environment

# Clear and cache configurations
# -----------------------------------------------------------
# Improves performance by caching config and routes.
# -----------------------------------------------------------

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

# Run the default command

echo "Starting php-fpm..."
exec "$@" # 'exec' replaces this script's process with php-fpm, instead of running it as a child
                    # — this matters so Docker's stop/restart signals reach php-fpm directly
