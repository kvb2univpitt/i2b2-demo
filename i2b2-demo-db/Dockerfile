FROM centos/postgresql-12-centos7

LABEL maintainer="Kevin Bui"

USER root

RUN yum -y update \
    && yum -y clean all

USER postgres
