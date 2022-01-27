FROM kvb2univpitt/centos7-php:v1.2022.01

LABEL maintainer="Kevin Bui"

RUN rm /etc/httpd/conf.d/welcome.conf

RUN curl -s -L -o /tmp/webclient.zip https://github.com/i2b2/i2b2-webclient/archive/v1.7.12a.0002.zip \
    && unzip /tmp/webclient.zip -d /var/www/html/ \
    && mv /var/www/html/i2b2-webclient-1.7.12a.0002 /var/www/html/webclient \
    && rm -f /tmp/webclient.zip

COPY resources/www/ /var/www/html/webclient/

EXPOSE 80 443

# Start Apache
CMD ["/usr/sbin/httpd","-D","FOREGROUND"]
