# Use the official PHP-Apache image
FROM php:8.2-apache
# Enable Apache rewrite module (needed for .htaccess routing)
RUN a2enmod rewrite
# Copy all files into the container
COPY . /var/www/html/
# Set the working directory
WORKDIR /var/www/html
# Set the public folder as the Apache DocumentRoot
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf
# Allow .htaccess overrides in the Apache config
RUN echo '<Directory /var/www/html/public>\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>' > /etc/apache2/conf-available/public.conf \
    && a2enconf public
# Set file permissions
RUN chown -R www-data:www-data /var/www/html
# Enable PHP error display for debugging (you can turn this off later)
RUN { \
    echo 'display_errors = On'; \
    echo 'display_startup_errors = On'; \
    echo 'error_reporting = E_ALL'; \
} > /usr/local/etc/php/conf.d/errors.ini
# Expose port 80 for Render
EXPOSE 80
# Start Apache
CMD ["apache2-foreground"]