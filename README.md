# i2b2-demo

Docker images preinstalled with [i2b2 software](https://www.i2b2.org/software/index.html) (version 1.7.12a) for demo purposes:

- [i2b2-data](https://github.com/i2b2/i2b2-data)
- [i2b2-core-server](https://github.com/i2b2/i2b2-core-server)
- [i2b2-webclient](https://github.com/i2b2/i2b2-webclient)

For documentations on the i2b2 software please visit the [i2b2 Community Wiki](https://community.i2b2.org/wiki/)

## i2b2 Web Application Diagram

![i2b2 flow diagram](./img/i2b2_flow.png)

## Run the i2b2 Demo

Below are commands to run the prebuilt Docker images of the i2b2 demo.

### Prerequisites

- [Docker 19.x or above](https://docs.docker.com/get-docker/)

### Create Docker User-defined Bridge Network

Containers on a user-defined bridge network can communicate with each other by their names.  The i2b2-core-server container needs to communicate with the i2b2-data container.  The i2b2-webclient container needs to communicate with the i2b2-core-server container.

Open up a terminal and execute the following command to create a user-defined bridge network **i2b2-demo-net**.

```
docker network create i2b2-demo-net
```

Execute the following command to verify that network **i2b2-demo-net** is created:

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

### Run i2b2 Prebuild Docker Images in Containers

Execute the commands below to run prebuild Docker images in contains on the i2b2-demo-net network.

**Run i2b2-data-demo container:**

###### Linux / macOS:

```
docker run -d --name=i2b2-data-demo \
--network i2b2-demo-net \
-e POSTGRESQL_ADMIN_PASSWORD=demouser \
-p 5432:5432 \
kvb2univpitt/i2b2-data-demo:v1.2021.7
```

###### Windows

```
docker run -d --name=i2b2-data-demo ^
--network i2b2-demo-net ^
-e POSTGRESQL_ADMIN_PASSWORD=demouser ^
-p 5432:5432 ^
kvb2univpitt/i2b2-data-demo:v1.2021.7
```

**Run i2b2-core-server-demo container:**

###### Linux / macOS:

```
docker run -d --name=i2b2-core-server-demo \
--network i2b2-demo-net \
-p 9090:9090 \
kvb2univpitt/i2b2-core-server-demo:v1.2021.7
```

###### Windows

```
docker run -d --name=i2b2-core-server-demo ^
--network i2b2-demo-net ^
-p 9090:9090 ^
kvb2univpitt/i2b2-core-server-demo:v1.2021.7
```

**Run i2b2-webclient-demo container:**

###### Linux / macOS:

```
docker run -d --name=i2b2-webclient-demo \
--network i2b2-demo-net \
-p 80:80 -p 443:443 \
kvb2univpitt/i2b2-webclient-demo:v1.2021.7
```

###### Windows

```
docker run -d --name=i2b2-webclient-demo ^
--network i2b2-demo-net ^
-p 80:80 -p 443:443 ^
kvb2univpitt/i2b2-webclient-demo:v1.2021.7
```
