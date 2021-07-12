FROM ubuntu:18.04

ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get update && apt-get install -y software-properties-common
RUN add-apt-repository ppa:ondrej/php

RUN apt-get update && apt-get install -yq --no-install-recommends \
    apt-utils \
    curl \
    # Install git
    git \
    # Install apache
    apache2 

    # Install php 7.3
RUN apt-get install -y php7.3 \
    libapache2-mod-php7.3 \
    php7.3-cli \
    php7.3-json \
    php7.3-curl \
    php7.3-fpm \
    php7.3-gd \
    php7.3-ldap \
    php7.3-mbstring \
    php7.3-mysql \
    php7.3-soap \
    php7.3-sqlite3 \
    php7.3-xml \
    php7.3-zip \
    php7.3-intl \
    php-imagick \
    php-redis \
    # Install tools
    openssl \
    nano \
    graphicsmagick \
    imagemagick \
    ghostscript \
    mysql-client \
    iputils-ping \
    locales \
    sqlite3 \
    ca-certificates \
    zip \
    unzip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*


# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add apache config to enable .htaccess and do some stuff you want
COPY apache_default /etc/apache2/sites-available/000-default.conf

# Enable mod rewrite and listen to localhost
RUN a2enmod rewrite && \
	echo "ServerName localhost" >> /etc/apache2/apache2.conf

################################################################
# Example, deploy a default CakePHP 3 installation from source #
################################################################

# Clone your application (cloning CakePHP 3 / app instead of composer create project to demonstrate application deployment example)
RUN rm -rf /var/www/apachephp
ADD ./ /var/www/apachephp
WORKDIR /var/www/apachephp
RUN mkdir -p logs tmp

# Copy the app.php file
# Inject some non random salt for this example
RUN	sed -i -e "s/__SALT__/somerandomsalt/" config/app.php && \
	# Make sessionhandler configurable via environment
	sed -i -e "s/'php',/env('SESSION_DEFAULTS', 'php'),/" config/app.php  && \
	# Set write permissions for webserver
	chgrp -R www-data logs tmp webroot && \
	chmod -R g+rw logs tmp webroot
    
RUN composer install
RUN composer dumpautoload

####################################################
# Expose port and run Apache webserver             #
####################################################

EXPOSE 80
CMD ["/usr/sbin/apache2ctl", "-DFOREGROUND"]
