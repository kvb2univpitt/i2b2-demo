# i2b2-core-server-demo

A Docker image of the i2b2-core-server.

## Run the Prebuilt Image in a Container

### Prerequisites

- [Docker 19.x](https://docs.docker.com/get-docker/)

A prebuilt [Docker image](https://hub.docker.com/r/kvb2univpitt/i2b2-core-server-demo) is provided on Docker Hub.  Open up a terminal and execute the following command:

Linux / macOS:

```
docker run -d --name=i2b2-core-server-demo \
--network host \
-p 9090:9090 \
kvb2univpitt/i2b2-core-server-demo:v1.2021.7
```

Windows:

```
docker run -d --name=i2b2-core-server-demo ^
--network host ^
-p 9090:9090 ^
kvb2univpitt/i2b2-core-server-demo:v1.2021.7
```

## Build the Image

### Prerequisites

- [Docker 19.x](https://docs.docker.com/get-docker/)

Open up a terminal in the directory ***i2b2-core-server-demo***, containing the file **Dockerfile**, and execute the following command to build the Docker image:

```
docker build -t local/i2b2-core-server-demo .
```

To verify that the image has been buit, execute the following command:

```
docker images
```

The output should be similar to the following:

```
REPOSITORY                      TAG              IMAGE ID       CREATED              SIZE
local/i2b2-core-server-demo     latest           acce652edbe4   About a minute ago   865MB
```

### Run the Image In a Container

Execute the following command to run the image in a Docker container:

Linux / macOS:

```
docker run -d --name=i2b2-core-server-demo \
--network host \
-p 9090:9090 \
local/i2b2-core-server-demo
```

Windows:

```
docker run -d --name=i2b2-core-server-demo ^
--network host ^
-p 9090:9090 ^
local/i2b2-core-server-demo
```
