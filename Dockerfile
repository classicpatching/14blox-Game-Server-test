FROM php:8.2-apache

# Enable useful modules
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copy your site files
COPY . /var/www/html/

# Fix permissions (optional)
RUN chown -R www-data:www-data /var/www/html

# Expose port (Render uses 10000 internally)
EXPOSE 80
