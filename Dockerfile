FROM php:5.6-apache

RUN apt-get update \
 && apt-get install git zlib1g-dev nano -y --no-install-recommends \
 && rm -r /var/lib/apt/lists/* \
 && docker-php-ext-install zip \
 && curl -sS https://getcomposer.org/installer \
  | php -- --install-dir=/usr/local/bin --filename=composer \
 && a2enmod rewrite \
 && sed -i 's!/var/www/html!/var/www/public!g' /etc/apache2/apache2.conf \
 && echo "AllowEncodedSlashes On" >> /etc/apache2/apache2.conf \
 && mv /var/www/html /var/www/public \
 && cp /usr/src/php/php.ini-production /usr/local/etc/php/php.ini \
 && printf '[Date]\ndate.timezone=UTC' > /usr/local/etc/php/conf.d/timezone.ini

WORKDIR /var/www

COPY . .

RUN chown www-data.www-data /var/www/data/cache \
 && composer install

