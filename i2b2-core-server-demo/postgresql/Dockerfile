FROM kvb2univpitt/centos7-openjdk8:v1.2022.06

LABEL maintainer="Kevin Bui"

# COPY wildfly-17.0.1.Final.zip /tmp/
RUN curl -s -L -o /tmp/wildfly-17.0.1.Final.zip https://download.jboss.org/wildfly/17.0.1.Final/wildfly-17.0.1.Final.zip
RUN unzip /tmp/wildfly-17.0.1.Final.zip -d /opt/ \
    && rm -f /tmp/wildfly-17.0.1.Final.zip
RUN mv /opt/wildfly-17.0.1.Final /opt/wildfly

RUN groupadd -r wildfly \
    && useradd -r -g wildfly -d /opt/wildfly -s /sbin/nologin wildfly

RUN mkdir /etc/wildfly
RUN cp /opt/wildfly/docs/contrib/scripts/systemd/wildfly.conf /etc/wildfly/
RUN cp /opt/wildfly/docs/contrib/scripts/systemd/launch.sh /opt/wildfly/bin/
RUN sh -c 'chmod +x /opt/wildfly/bin/*.sh'

COPY resources/opt/wildfly-17.0.1.Final/standalone/  /opt/wildfly/standalone/

RUN chown -RH wildfly: /opt/wildfly/

EXPOSE 9090

USER wildfly

CMD ["/opt/wildfly/bin/standalone.sh", "-b", "0.0.0.0"]
