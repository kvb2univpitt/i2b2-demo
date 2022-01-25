# i2b2-core-server-demo (PostgreSQL 12)

A Docker image of the i2b2-core-server (version 1.7.12a) working with PostgreSQL database.

## Ensure i2b2-demo-net Network Exists

Containers need to be run on the **i2b2-demo-net** network so that they can communicate with each other.

To verify that network **i2b2-demo-net** exists, open up a terminal and execute the following command:

```
docker network ls
```

You should see **i2b2-demo-net** from the output similar to this:

```
NETWORK ID     NAME            DRIVER    SCOPE
d86843421945   bridge          bridge    local
58593240ad9d   host            host      local
9a82abc00473   i2b2-demo-net   bridge    local
```

If the **i2b2-demo-net** network does not exists, execute the following command to create one:

```
docker network create i2b2-demo-net
```

## Run the Prebuilt Image in a Container

### Prerequisites

- [Docker 19.x](https://docs.docker.com/get-docker/)

A prebuilt [Docker image](https://hub.docker.com/r/kvb2univpitt/i2b2-core-server-demo-postgresql) is provided on Docker Hub.  Open up a terminal and execute the following command:

###### Linux / macOS:

```
docker run -d --name=i2b2-core-server-demo \
--network i2b2-demo-net \
-p 9090:9090 \
kvb2univpitt/i2b2-core-server-demo-postgresql:v1.7.12a.2022.01
```

###### Windows:

```
docker run -d --name=i2b2-core-server-demo ^
--network i2b2-demo-net ^
-p 9090:9090 ^
kvb2univpitt/i2b2-core-server-demo-postgresql:v1.7.12a.2022.01
```

## Build the Image

### Prerequisites

- [Docker 19.x](https://docs.docker.com/get-docker/)

Open up a terminal in the directory ***i2b2-demo/i2b2-core-server-demo/postgresql***, containing the file **Dockerfile**, and execute the following command to build the Docker image:

```
docker build -t local/i2b2-core-server-demo-postgresql .
```

To verify that the image has been built, execute the following command to see the list of Docker images:

```
docker images
```

The output should be similar to the following:

```
REPOSITORY                               TAG          IMAGE ID       CREATED              SIZE
local/i2b2-core-server-demo-postgresql   latest       c7f0e84900b0   About a minute ago   891MB
```

### Run the Image In a Container

Execute the following command to run the image ***local/i2b2-core-server-demo-postgresql*** in a Docker container named ***i2b2-core-server-demo***:

###### Linux / macOS:

```
docker run -d --name=i2b2-core-server-demo \
--network i2b2-demo-net \
-p 9090:9090 \
local/i2b2-core-server-demo-postgresql
```

###### Windows:

```
docker run -d --name=i2b2-core-server-demo ^
--network i2b2-demo-net ^
-p 9090:9090 ^
local/i2b2-core-server-demo-postgresql
```

### Stop the Container

```
docker stop i2b2-data-demo
```

### Delete the Container

```
docker rm i2b2-data-demo
```

### Delete the Image

```
docker rmi local/i2b2-core-server-demo-postgresql
```
