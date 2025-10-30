FROM php:8.4-apache

LABEL maintainer="Kevin Bui"

# Utilities
RUN apt update && apt -y install --install-recommends libapache2-mod-shib
RUN apt clean && apt autoclean && rm -r /var/lib/apt/lists/*

# COPY i2b2-webclient-1.8.2.tar.gz /tmp
RUN curl -s -L -o /tmp/i2b2-webclient-1.8.2.tar.gz https://github.com/i2b2/i2b2-webclient/archive/refs/tags/v1.8.2.tar.gz
RUN tar xzf /tmp/i2b2-webclient-1.8.2.tar.gz -C /var/www/html/
RUN mv /var/www/html/i2b2-webclient-1.8.2 /var/www/html/webclient
RUN rm -f /tmp/i2b2-webclient-1.8.2.tar.gz

COPY resources/www/ /var/www/html/

# Configure SSL
RUN openssl req -x509 -newkey rsa:2048 -keyout /etc/ssl/private/server.key -out /etc/ssl/certs/server.crt -sha256 -days 3652 -nodes -subj "/CN=localhost"
ADD resources/apache2/sites-available/default-ssl.conf /etc/apache2/sites-available/default-ssl.conf

# Configure Apache
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
ADD resources/apache2/ports.conf /etc/apache2/ports.conf
COPY resources/apache2/sites-available/ /etc/apache2/sites-available/

# Configure Shibboleth
# RUN shib-keygen -h localhost -e https://localhost/shibboleth -n sp-signing
# RUN shib-keygen -h localhost -e https://localhost/shibboleth -n sp-encrypt
COPY resources/shibboleth/ /etc/shibboleth/

# Disable Sites
RUN a2dissite 000-default.conf

# Enable Sites
RUN a2ensite default-ssl.conf
RUN a2ensite wildfly.conf
RUN a2ensite shib.conf

# Enable Modules
RUN a2enmod proxy && a2enmod proxy_http
RUN a2enmod ssl && a2enmod rewrite
RUN a2enmod shib

ADD resources/bin/shibd-apache2 /sbin/shibd-apache2

EXPOSE 80 443

ENTRYPOINT ["shibd-apache2"]
