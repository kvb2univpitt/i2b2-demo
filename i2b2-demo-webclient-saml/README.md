# i2b2-demo-webclient-saml
A Docker image of i2b2 webclient with SAML and local authentication.

## Run the Pre-built Image in a Container
A pre-built [Docker image](https://hub.docker.com/r/kvb2univpitt/i2b2-demo-webclient-saml) is provided on Docker Hub.

### Prerequisites
- [Docker 19.x](https://docs.docker.com/get-docker/)

Open up a terminal and execute the following command to run the i2b2 webclient on port 80 and port 443 in a container:

```bash
docker run -d \
--name=i2b2-demo-webclient-saml \
--network=host \
-p 80:80 -p 443:443 \
kvb2univpitt/i2b2-demo-webclient-saml:v1
```

## Build the Image

### Prerequisites
- [Docker 19.x](https://docs.docker.com/get-docker/)
- i2b2 demo data running locally in PostgreSQL on port 5432.
- i2b2 cells (PM, Ontology, etc) running locally in Wildfly on port 9090.

Open up a terminal in the folder ***i2b2-demo-webclient-saml*** where the **Dockerfile** is.  Run the following command to build the image:

```bash
docker build -t local/i2b2-demo-webclient-saml .
```

Run ```docker images``` to see the downloaded images:

```bash
REPOSITORY                                 TAG       IMAGE ID       CREATED          SIZE
local/i2b2-demo-webclient-saml             latest    14174e607802   46 minutes ago   504MB
```

To run the i2b2 webclient in a Docker container, run the following command:

```bash
docker run -d \
--name=i2b2-demo-webclient-saml \
--network=host \
-p 80:80 -p 443:443 \
local/i2b2-demo-webclient-saml
```

Run ```docker ps -a``` to verify that the container is running:

```bash
CONTAINER ID   IMAGE                            COMMAND                  CREATED          STATUS                    PORTS     NAMES
a9d1af44b691   local/i2b2-demo-webclient-saml   "/usr/local/bin/star…"   49 minutes ago   Up 49 minutes (healthy)             i2b2-demo-webclient-saml
```
