#!/bin/bash

cd /var/www/app

git config --global --add safe.directory /var/www/app

if [ ! -d "vendor" ]; then
  echo "Instalando dependências com composer..."
  composer install --no-interaction --prefer-dist --optimize-autoloader
fi

exec "$@"