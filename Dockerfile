FROM php:7.4-apache

ENV DEBIAN_FRONTEND=noninteractive

RUN  apt-get update && apt-get install -y && apt-get install software-properties-common && add-apt-repository ppa:ondrej/php \
     libfreetype6-dev \
     libjpeg62-turbo-dev \
     libmcrypt-dev \
     libpng-dev \
     g++

RUN apt-get install php-pear php7.3-curl php7.3-dev php7.3-gd php7.3-mbstring php7.3-zip php7.3-mysql php7.3-xml
RUN RUN docker-php-ext-configure intl  mcrypt gd
RUN docker-php-ext-install intl mcrypt gd
#&& docker-php-ext-install -j$(nproc) iconv mcrypt gd mbstring zip


#RUN apt-get update && apt-get install -yq --no-install-recommends \
#    apt-utils \
#    curl \
#    # Install git
#    git \
#    # Install apache
#    apache2 \
#    # Install php 7.2
#    libapache2-mod-php7.2 \
#    php7.2-cli \
#    php7.2-json \
#    php7.2-curl \
#    php7.2-fpm \
#    php7.2-gd \
#    php7.2-ldap \
#    php7.2-mbstring \
#    php7.2-mysql \
#    php7.2-soap \
#    php7.2-sqlite3 \
#    php7.2-xml \
#    php7.2-zip \
#    php7.2-intl \
#    php-imagick \
#    php-redis \
#    # Install tools
#    openssl \
#    nano \
#    graphicsmagick \
#    imagemagick \
#    ghostscript \
#    mysql-client \
#    iputils-ping \
#    locales \
#    sqlite3 \
#    ca-certificates \
#    php7.2-dev \
#    && apt-get clean && rm -rf /var/lib/apt/lists/*


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
ADD ./app /var/www/apachephp
WORKDIR /var/www/apachephp
#RUN mkdir logs tmp

# Copy the app.php file
# Inject some non random salt for this example
#RUN	sed -i -e "s/__SALT__/somerandomsalt/" config/app.php && \
#	# Make sessionhandler configurable via environment
#	sed -i -e "s/'php',/env('SESSION_DEFAULTS', 'php'),/" config/app.php  && \
#	# Set write permissions for webserver
#	chgrp -R www-data logs tmp && \
#	chmod -R g+rw logs tmp

####################################################
# Expose port and run Apache webserver             #
####################################################

EXPOSE 80
CMD ["/usr/sbin/apache2ctl", "-DFOREGROUND"]
