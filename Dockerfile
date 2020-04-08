FROM php:7.4-apache

ENV DEBIAN_FRONTEND=noninteractive

# Install all required extensions
RUN apt-get update  && apt-get install -y \
        build-essential \
        libfreetype6-dev \
        autoconf \
        ruby \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng-dev \
        zlib1g-dev \
        libxml2-dev \
        libzip-dev \
        libonig-dev \
        graphviz \

    && docker-php-ext-configure gd \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install intl \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install mysqli \
    && docker-php-ext-install zip \
    && docker-php-source delete


# Install composer
RUN curl -sSL https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer \
    && apt-get update \
    && apt-get install -y zlib1g-dev git \
    && docker-php-ext-install zip \
    && apt-get purge -y --auto-remove zlib1g-dev \
    && rm -rf /var/lib/apt/lists/*


## COPY apache configuration setting web.local as server name
COPY apache_default /etc/apache2/sites-available/000-default.conf



RUN a2enmod rewrite && \
	echo "ServerName localhost" >> /etc/apache2/apache2.conf

################################################################
# Example, deploy a default CakePHP 3 installation from source #
################################################################

# Clone your application (cloning CakePHP 3 / app instead of composer create project to demonstrate application deployment example)
RUN rm -rf /var/www/apachephp
ADD ./app /var/www/apachephp
WORKDIR /var/www/apachephp
RUN mkdir -p \
    tmp/cache/models \
    tmp/cache/persistent \
  && chown -R :www-data \
    tmp \
  && chmod -R 770 \
    tmp


EXPOSE 80

CMD ['mkdir','-p', "tmp/cache/models","tmp/cache/persistent", "&&" , 'chown','R',':www-data','tmp','&&','chmod','-R','tmp']
CMD ["/usr/sbin/apache2ctl", "-DFOREGROUND"]
