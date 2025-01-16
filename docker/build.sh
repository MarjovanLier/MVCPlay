#!/usr/bin/env bash

cd /var/www

# Install dependencies
composer install

# Run migrations
composer db:init

# Start the server
php -S 0.0.0.0:8000 -t public
