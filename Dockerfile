FROM php:8.3.0-apache-bookworm
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable mysqli pdo pdo_mysql
RUN apt-get update && apt-get upgrade -y
RUN pecl install xdebug \
  && docker-php-ext-enable xdebug \
  && a2enmod rewrite
RUN apt-get update \
  && apt-get install -y git
#Install Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php --install-dir=. --filename=composer
RUN mv composer /usr/local/bin/
