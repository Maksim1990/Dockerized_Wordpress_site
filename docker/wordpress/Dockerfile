FROM wordpress:php7.3-fpm

# Set working directory PHP
WORKDIR /var/www/html

# copy files to image
COPY . /var/www/html

# Run PHP-FPM server
CMD ["php-fpm"]