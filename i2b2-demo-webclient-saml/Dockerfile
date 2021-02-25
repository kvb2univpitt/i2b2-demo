FROM kvb2univpitt/centos7_shibboleth_php:v1

LABEL maintainer="Kevin Bui"

RUN yum -y update \
    && yum -y install unzip \
    && yum -y clean all

COPY resources/bin/startup.sh /usr/local/bin/

COPY resources/httpd/ssl/localhost.key /etc/pki/tls/private/
COPY resources/httpd/ssl/localhost.crt /etc/pki/tls/certs/

COPY resources/shibboleth/ /etc/shibboleth/

RUN test -d /var/run/lock || mkdir -p /var/run/lock \
    && test -d /var/lock/subsys/ || mkdir -p /var/lock/subsys/ \
    && chmod +x /etc/shibboleth/shibd-redhat \
    && echo $'export LD_LIBRARY_PATH=/opt/shibboleth/lib64:$LD_LIBRARY_PATH\n' > /etc/sysconfig/shibd \
    && chmod +x /etc/sysconfig/shibd /etc/shibboleth/shibd-redhat /usr/local/bin/startup.sh

COPY resources/httpd/conf/httpd.conf /etc/httpd/conf/
COPY resources/httpd/conf/ssl.conf /etc/httpd/conf.d/

RUN rm /etc/httpd/conf.d/welcome.conf

RUN curl -s -L -o /tmp/webclient.zip https://github.com/i2b2/i2b2-webclient/archive/v1.7.12a.0002.zip \
    && unzip /tmp/webclient.zip -d /var/www/html/ \
    && mv /var/www/html/i2b2-webclient-1.7.12a.0002/* /var/www/html/ \
    && rm -f /tmp/webclient.zip \
    && rm -rf /var/www/html/i2b2-webclient-1.7.12a.0002

COPY resources/www/ /var/www/html/

HEALTHCHECK --interval=1m --timeout=30s \
    CMD curl -k -f https://127.0.0.1/Shibboleth.sso/Status || exit 1

EXPOSE 80 443

CMD ["/usr/local/bin/startup.sh"]
