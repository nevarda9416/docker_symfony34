#!/usr/bin/env bash
set -e

# ensure var dirs exist and owned by www-data
mkdir -p /var/www/symfony/var/cache /var/www/symfony/var/logs /var/www/symfony/var/sessions
chown -R www-data:www-data /var/www/symfony/var || true

# if vendor missing, install dependencies (non-interactive)
if [ ! -d /var/www/symfony/vendor ]; then
  echo "Composer install (first run)..."
  composer install --no-interaction --prefer-dist --optimize-autoloader || true
fi

# run php-fpm in foreground
php-fpm
