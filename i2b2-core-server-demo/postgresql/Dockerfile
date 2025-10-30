FROM quay.io/wildfly/wildfly:37.0.1.Final-jdk17

LABEL maintainer="Kevin Bui"

COPY resources/opt/wildfly-37.0.1.Final/standalone/deployments/ /opt/jboss/wildfly/standalone/deployments/
ADD resources/opt/wildfly-37.0.1.Final/standalone/configuration/standalone.xml /opt/jboss/wildfly/standalone/configuration/
