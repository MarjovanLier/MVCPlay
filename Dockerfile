# Use the official PHP 8.3 image from Docker Hub
FROM php:8.3-cli AS builder

# Add composer to the image from the official Composer image
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip

# Set the working directory inside the container
WORKDIR /var/www

COPY . .

# Install any dependencies
RUN /usr/bin/composer install --no-interaction --prefer-dist --optimize-autoloader

# Expose port 8000 to the outside world
EXPOSE 8000

# Command to run the PHP built-in server
CMD ["php", "-S", "0.0.0.0:8000", "-t", "public"]
