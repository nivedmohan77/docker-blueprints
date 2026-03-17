FROM php:8.2-apache
COPY . /var/www/html/
COPY apache.conf /etc/apache2/sites-available/000-default.conf
RUN a2enmod rewrite
EXPOSE 80
