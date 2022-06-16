FROM kvb2univpitt/centos7-php-shibboleth:v1.2022.06

LABEL maintainer="Kevin Bui"

COPY resources/bin/startup.sh /usr/local/bin/

# COPY v1.7.12a.0002.zip /tmp
RUN curl -s -L -o /tmp/v1.7.12a.0002.zip https://github.com/i2b2/i2b2-webclient/archive/v1.7.12a.0002.zip
RUN unzip /tmp/v1.7.12a.0002.zip -d /var/www/html/ \
    && mv /var/www/html/i2b2-webclient-1.7.12a.0002 /var/www/html/webclient \
    && rm -f /tmp/v1.7.12a.0002.zip

COPY resources/shibboleth/ /etc/shibboleth/
COPY resources/httpd/conf/ /etc/httpd/conf/
COPY resources/httpd/conf.d/ /etc/httpd/conf.d/
COPY resources/www/ /var/www/html/

RUN test -d /var/run/lock || mkdir -p /var/run/lock \
    && test -d /var/lock/subsys/ || mkdir -p /var/lock/subsys/ \
    && chmod +x /etc/shibboleth/shibd-redhat \
    && echo $'export LD_LIBRARY_PATH=/opt/shibboleth/lib64:$LD_LIBRARY_PATH\n' > /etc/sysconfig/shibd \
    && chmod +x /etc/sysconfig/shibd /etc/shibboleth/shibd-redhat /usr/local/bin/startup.sh

RUN rm /etc/httpd/conf.d/welcome.conf

HEALTHCHECK --interval=1m --timeout=30s \
    CMD curl -k -f https://127.0.0.1/Shibboleth.sso/Status || exit 1

EXPOSE 80 443

CMD ["/usr/local/bin/startup.sh"]
