FROM php:8.2-apache

# Enable Apache rewrite (useful for APIs)
RUN a2enmod rewrite

# Copy your files
COPY . /var/www/html/

# Permissions
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
