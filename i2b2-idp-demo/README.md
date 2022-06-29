# i2b2-idp-demo

A Docker image of identity provider (IdP) for demonstration purposes.

The following platforms are used:

- The official [PHP7 Apache](https://hub.docker.com/_/php/) docker image.
- [SimpleSAMLphp](https://simplesamlphp.org/)

### SAML Attributes

Below is a table containing the user details associated with the SAML attributes that are used.

| User Detail    | SAML Attribute         |
|----------------|------------------------|
| Username       |                        |
| Password       |                        |
| UID            | uid                    |
| NetID          | eduPersonPrincipalName |
| Affiliation    | eduPersonAffiliation   |
| Email          | mail                   |
| First Name     | givenName              |
| Last Name      | sn                     |
| Preferred Name | displayName            |

### IdP Users

The IdP contains the following user accounts:

| Username    | Password  | UID         | NetID                 | Affiliation | Email                 | First Name | Last Name | Preferred Name      |
|-------------|-----------|-------------|-----------------------|-------------|-----------------------|------------|-----------|---------------------|
| lex         | luthor    | lex         | lex@lexcorp.com       | staff       | lex@lexcorp.com       | Alexander  | Luthor    | Lex Luthor          |
| ckent       | superman  | ckent       | ckent@dailyplanet.com | staff       | ckent@dailyplanet.com | Clark      | Kent      | Clark Kent (Kal-El) |
| karadanvers | supergirl | karadanvers | karadanvers@catco.com | staff       | karadanvers@catco.com | Kara       | Danvers   | Kara Zor-El         |
| clarkkent   | superman  | clarkkent   | clarkkent@catco.com   | staff       | clarkkent@catco.com   | Clark      | Kent      | Kal-El              |

## Docker User-defined Bridge Network

The container runs on a user-defined bridge network ***i2b2-demo-net***.  The user-defined bridge network provides better isolation and allows containers on the same network to communicate with each other using their container names instead of their IP addresses.

### Ensure User-defined Bridge Network Exists

To verify that the network ***i2b2-demo-net*** exists, execute the following command to list all of the Docker's networks:

```
docker network ls
```

The output should be similar to this:

```
NETWORK ID     NAME                 DRIVER    SCOPE
9ea1de540506   bridge               bridge    local
bf7e75025889   host                 host      local
88a9b525113e   i2b2-demo-net   bridge    local
```

If ***i2b2-demo-net*** network is **not** listed, execute the following command to create it:

```
docker network create i2b2-demo-net
```

## Run the Prebuilt Image

A prebuilt Docker image is provided on [Docker Hub](https://hub.docker.com/r/kvb2univpitt/i2b2-idp-demo).

### Prerequisites

- [Docker 19 or above](https://docs.docker.com/get-docker/)

Open up a terminal and execute the following command to download and run the prebuilt image in a container named ***i2b2-idp-demo***.

###### Linux / macOS:

```
docker run -d --name=i2b2-idp-demo \
--network i2b2-demo-net \
-p 8080:8080 \
-p 8443:8443 \
-e SIMPLESAMLPHP_ADMIN_PASSWORD=demouser \
kvb2univpitt/i2b2-idp-demo:v1.7.13.2022.06
```

###### Windows:

```
docker run -d --name=i2b2-idp-demo ^
--network i2b2-demo-net ^
-p 8080:8080 ^
-p 8443:8443 ^
-e SIMPLESAMLPHP_ADMIN_PASSWORD=demouser ^
kvb2univpitt/i2b2-idp-demo:v1.7.13.2022.06
```

### Access the Identity Provider (IdP)

Open up a web browser and go to the URL [http://localhost:8080/simplesaml](http://localhost:8080/simplesaml).

To configure the IdP, [sign in](http://localhost:8080/simplesaml/module.php/core/login-admin.php?ReturnTo=http%3A%2F%2Flocalhost%3A8080%2Fsimplesaml%2Fmodule.php%2Fcore%2Ffrontpage_federation.php) using the following admin credentials:

| Username | Password |
|----------|----------|
| admin    | demouser |

### Docker Container and Image Management

Execute the following to stop the running Docker container:

```
docker stop i2b2-idp-demo
```

Execute the following to delete the Docker container:

```
docker rm i2b2-idp-demo
```

Execute the following to delete the Docker image:

```
docker rmi kvb2univpitt/i2b2-idp-demo:v1.7.13.2022.06
```
## Build the Image

### Prerequisites

- [Docker or above](https://docs.docker.com/get-docker/)

### Build the Docker Image:

Open up a terminal in the directory **i2b2-demo/i2b2-idp-demo**, where the ***Dockerfile*** file is, and execute the following command to build the image:

```
docker build -t local/i2b2-idp-demo .
```

To verify that the image has been built, execute the following command to list the Docker images:

```
docker images
```

The output should be similar to the following:

```
REPOSITORY                 TAG             IMAGE ID       CREATED          SIZE
local/i2b2-idp-demo   latest          82611c5d3ede   18 seconds ago   566MB
php                        7.4.27-apache   4d3d9fe4d89c   6 days ago       469MB
```

### Run the Image In a Container

Execute the following command the run the image in a Docker container name ***i2b2-idp-demo*** on the user-defined bridge network ***i2b2-demo-net***:

###### Linux / macOS:

```
docker run -d --name=i2b2-idp-demo \
--network i2b2-demo-net \
-p 8080:8080 \
-p 8443:8443 \
-e SIMPLESAMLPHP_ADMIN_PASSWORD=demouser \
local/i2b2-idp-demo
```

###### Windows:

```
docker run -d --name=i2b2-idp-demo ^
--network i2b2-demo-net ^
-p 8080:8080 ^
-p 8443:8443 ^
-e SIMPLESAMLPHP_ADMIN_PASSWORD=demouser ^
local/i2b2-idp-demo
```

To verify that the container is running, execute the following command to list the Docker containers:

```
docker ps
```

The output should be similar to the following:

```
bca9e4ef64fe   local/i2b2-idp-demo   "docker-php-entrypoi…"   2 seconds ago   Up 2 seconds   0.0.0.0:8080->8080/tcp, :::8080->8080/tcp, 80/tcp, 0.0.0.0:8443->8443/tcp, :::8443->8443/tcp   i2b2-idp-demo
```

### Docker Container and Image Management

Execute the following to stop the running Docker container:

```
docker stop i2b2-idp-demo
```

Execute the following to delete the Docker container:

```
docker rm i2b2-idp-demo
```

Execute the following to delete the Docker image:

```
docker rmi local/i2b2-idp-demo
```
