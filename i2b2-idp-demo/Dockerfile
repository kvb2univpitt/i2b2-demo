FROM php:8.4.8-apache

LABEL maintainer="Kevin Bui"

# Utilities
RUN apt update
RUN apt clean && apt autoclean && rm -r /var/lib/apt/lists/*

# SimpleSAMLphp
ARG SIMPLESAMLPHP_VERSION=2.4.3

# COPY simplesamlphp-2.4.3-slim.tar.gz /tmp/simplesamlphp.tar.gz
RUN curl -s -L -o /tmp/simplesamlphp.tar.gz https://github.com/simplesamlphp/simplesamlphp/releases/download/v$SIMPLESAMLPHP_VERSION/simplesamlphp-$SIMPLESAMLPHP_VERSION-slim.tar.gz
RUN tar xzf /tmp/simplesamlphp.tar.gz -C /tmp
RUN rm -f /tmp/simplesamlphp.tar.gz
RUN mv /tmp/simplesamlphp-* /var/www/simplesamlphp

ADD resources/phpinfo.php /var/www/simplesamlphp/public/phpinfo.php

RUN mkdir -p /var/cache/simplesamlphp
RUN chown www-data:www-data /var/cache/simplesamlphp

# RUN openssl req -newkey rsa:3072 -new -x509 -days 3652 -nodes -out /var/www/simplesamlphp/cert/server.crt -keyout /var/www/simplesamlphp/cert/server.pem -subj "/C=/ST=/L=/O=/OU=/CN=localhost"
# RUN chmod 644 /var/www/simplesamlphp/cert/server.crt
# RUN chmod 644 /var/www/simplesamlphp/cert/server.pem

# Configure SimpleSAMLphp
COPY resources/simplesamlphp/cert/ /var/www/simplesamlphp/cert/
COPY resources/simplesamlphp/config/ /var/www/simplesamlphp/config/
COPY resources/simplesamlphp/metadata/ /var/www/simplesamlphp/metadata/

# Configure Apache
COPY resources/apache/ports.conf /etc/apache2
COPY resources/apache/simplesamlphp.conf /etc/apache2/sites-available
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Install SSL
RUN openssl req -x509 -newkey rsa:2048 -keyout /etc/ssl/private/server.key -out /etc/ssl/certs/server.crt -sha256 -days 3652 -nodes -subj "/CN=localhost"

# Enable Modules
RUN a2enmod ssl

# Enable Sites
RUN a2dissite 000-default.conf default-ssl.conf
RUN a2ensite simplesamlphp.conf

# Set work dir
WORKDIR /var/www/simplesamlphp

# General setup
EXPOSE 8080 8443
