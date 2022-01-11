# mssql-agent-fts-ha-tools
# Maintainers: Microsoft Corporation (twright-msft on GitHub)
# GitRepo: https://github.com/Microsoft/mssql-docker

# Base OS layer: Latest Ubuntu LTS
FROM ubuntu:18.04

RUN export DEBIAN_FRONTEND=noninteractive

# Install prerequistes since it is needed to get repo config for SQL server
RUN export DEBIAN_FRONTEND=noninteractive && \
    apt-get update && \
    apt-get install -yq gnupg curl apt-transport-https

# Get official Microsoft repository configuration
RUN curl https://packages.microsoft.com/keys/microsoft.asc | apt-key add - && \
    curl https://packages.microsoft.com/config/ubuntu/18.04/mssql-server-2017.list | tee /etc/apt/sources.list.d/mssql-server.list && \
    apt-get update

# Install SQL Server from apt
RUN apt-get install -y mssql-server

# Install optional packages
RUN apt-get install -y mssql-server-ha && \
    apt-get install -y mssql-server-fts

# Cleanup the Dockerfile
RUN apt-get clean && \
    rm -rf /var/lib/apt/lists

# Run SQL Server process
CMD /opt/mssql/bin/sqlservr
