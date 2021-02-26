# i2b2-demo-server
A Docker image of the i2b2 demo service (version 1.7.12a) that contains all the i2b2 cells.

## Run the Pre-built Image in a Container
A pre-built [Docker image](https://hub.docker.com/r/kvb2univpitt/i2b2-demo-server) is provided on Docker Hub.

### Prerequisites
- [Docker 19.x](https://docs.docker.com/get-docker/)

Open up a terminal and execute the following command to run the i2b2 services on port 9090 in a container:

```bash
docker run -d --name=i2b2-demo-server \
--network=host \
-p 9090:9090 \
kvb2univpitt/i2b2-demo-server:v1
```

## Build the Image

### Prerequisites
- [Docker 19.x](https://docs.docker.com/get-docker/)

Open up a terminal in the director **i2b2-demo-server** where the Dockerfile is located and run the following command to build the Docker image:

```bash
docker build -t local/i2b2-demo-server .
```

To run the i2b2 services on port 9090 in a container, execute the following command in a terminal:

```bash
docker run -d --name=i2b2-demo-server \
--network=host \
-p 9090:9090 \
local/i2b2-demo-server
```