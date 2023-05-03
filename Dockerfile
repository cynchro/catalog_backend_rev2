FROM php:8.2-rc-apache

# Instala las dependencias necesarias
RUN apt-get update && apt-get install -y \
    libicu-dev \
    libonig-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    curl

# Habilita los módulos necesarios de PHP
RUN docker-php-ext-install pdo_mysql intl zip

# Instala Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copia los archivos del proyecto al contenedor
COPY . /var/www/html

# Da permisos de escritura al directorio de logs
RUN chmod -R 777 /var/www/html/storage/logs

COPY ./apache/000-default.conf /etc/apache2/sites-available/000-default.conf

RUN composer install

RUN composer require laravel/pint --dev

RUN composer require nunomaduro/larastan:^2.0 --dev

# Configura el servidor Apache
RUN a2enmod rewrite

# Define las variables de entorno necesarias
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
ENV APACHE_LOG_DIR /var/log/apache2

RUN cp /usr/local/etc/php/php.ini-production /usr/local/etc/php/php.ini

RUN sed -i 's/upload_max_filesize\s*=\s*2M/upload_max_filesize = 10M/' /usr/local/etc/php/php.ini

COPY ./.env.example /var/www/html/.env.example

RUN cp /var/www/html/.env.example /var/www/html/.env

WORKDIR /var/www/html

RUN php artisan key:generate

# Expone el puerto 80
EXPOSE 80

# Inicia el servidor Apache
CMD ["apache2-foreground"]
