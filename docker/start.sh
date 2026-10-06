#!/bin/sh
set -e

# Render tells us which port to listen on.
PORT="${PORT:-10000}"
sed -ri "s/Listen 80/Listen ${PORT}/" /etc/apache2/ports.conf
sed -ri "s/<VirtualHost \*:80>/<VirtualHost *:${PORT}>/" /etc/apache2/sites-available/000-default.conf

cd /var/www/html

# Optional persistent disk (paid Render plan): keep the SQLite file and blog images on it.
if [ -n "$DATA_DIR" ]; then
    mkdir -p "$DATA_DIR/uploads"
    rm -rf storage/app/public
    ln -s "$DATA_DIR/uploads" storage/app/public
    export DB_DATABASE="${DB_DATABASE:-$DATA_DIR/database.sqlite}"
fi

DB_DATABASE="${DB_DATABASE:-/var/www/html/database/database.sqlite}"
export DB_DATABASE
touch "$DB_DATABASE"

mkdir -p storage/app/public
php artisan storage:link --force
chown -R www-data:www-data storage bootstrap/cache "$(dirname "$DB_DATABASE")" "$DB_DATABASE" storage/app/public/ 2>/dev/null || true

php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan migrate --force
php artisan db:seed --force

exec apache2-foreground
