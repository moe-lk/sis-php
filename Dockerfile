FROM php:7.2-apache
RUN apt-get update
RUN apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libxml2-dev \
    libmcrypt-dev \
    libldap2-dev 
RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/
RUN docker-php-ext-install -j$(nproc) gd
     
RUN apt-get install -y libxml2-dev 
RUN apt-get install -y libldb-dev
RUN apt-get install -y libldap2-dev 
RUN apt-get install -y libxml2-dev
RUN apt-get install -y libssl-dev
RUN apt-get install -y libxslt-dev
RUN apt-get install -y libpq-dev
RUN apt-get install -y mariadb-client 
RUN apt-get install -y libsqlite3-dev
RUN apt-get install -y libsqlite3-0
RUN apt-get install -y libc-client-dev
RUN apt-get install -y libkrb5-dev
RUN apt-get install -y curl
RUN apt-get install -y libcurl3-dev
RUN apt-get install -y firebird-dev
RUN apt-get install -y libpspell-dev
RUN apt-get install -y aspell-en
RUN apt-get install -y aspell-de  
RUN apt-get install -y libtidy-dev
RUN apt-get install -y libsnmp-dev
RUN apt-get install -y librecode0
RUN apt-get install -y librecode-dev
RUN apt-get install -y libmagickwand-dev

RUN pecl install mcrypt-1.0.2
RUN docker-php-ext-enable mcrypt
RUN docker-php-ext-configure ldap --with-libdir=lib/x86_64-linux-gnu
RUN docker-php-ext-install ldap
RUN docker-php-ext-install pdo pdo_mysql
RUN docker-php-ext-install soap
RUN docker-php-ext-install zip
RUN docker-php-ext-install -j$(nproc) intl
RUN pecl install imagick
RUN docker-php-ext-enable imagick
RUN pecl install -o -f redis
RUN docker-php-ext-enable redis
RUN a2enmod rewrite
RUN service apache2 restart

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"


ADD ./ /var/www/html

RUN mkdir tmp logs
RUN chgrp -R www-data logs tmp
RUN chmod -R g+rw logs tmp

RUN ["chmod", "+x", "/var/www/html/build.sh"]

EXPOSE 9000