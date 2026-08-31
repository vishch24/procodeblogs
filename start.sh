#!/bin/sh
set -e   # if any command below fails, stop immediately — don't limp forward into a broken app

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

echo "Running migrations..."
php artisan migrate --seed --force   # --force is required because this is a production environment

echo "Starting php-fpm..."
exec php-fpm   # 'exec' replaces this script's process with php-fpm, instead of running it as a child
               # — this matters so Docker's stop/restart signals reach php-fpm directly
