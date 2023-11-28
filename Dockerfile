# Use the official PHP image from the Docker Hub
FROM php:7.4-apache

# Install dependencies
RUN apt-get update && apt-get install -y \
   libpng-dev \
   libjpeg-dev \
   libfreetype6-dev \
   libzip-dev \
   libonig-dev \
   zip \
   unzip \
   libmysqli-dev

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Install Composer globally
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Enable directory listing and specify the default index file
RUN sed -i 's/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf
RUN echo "DirectoryIndex index.php index.html" >> /etc/apache2/apache2.conf

# Set up web server
WORKDIR /var/www/html/

# Copy the application files to the Docker container
COPY . .

# Install PHP extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN service mysql start
RUN mysql -u root -e "CREATE DATABASE IF NOT EXISTS Dresser;"
RUN mysql -u root Dresser < /var/www/html/query.sql

# Suppress a message
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Expose port 80
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
