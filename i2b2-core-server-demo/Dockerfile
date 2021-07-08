FROM kvb2univpitt/centos7-openjdk8:v1.2021.7

LABEL maintainer="Kevin Bui"

RUN curl -s -L -o /tmp/wildfly-17.0.1.Final.zip https://download.jboss.org/wildfly/17.0.1.Final/wildfly-17.0.1.Final.zip \
    && unzip /tmp/wildfly-17.0.1.Final.zip -d /opt/ \
    && rm -f /tmp/wildfly-17.0.1.Final.zip

COPY resources/opt/wildfly-17.0.1.Final/standalone/  /opt/wildfly-17.0.1.Final/standalone/

EXPOSE 9090

CMD ["/opt/wildfly-17.0.1.Final/bin/standalone.sh", "-b", "0.0.0.0"]
