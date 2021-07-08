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

#### Run the i2b2 data demo

Linux / Mac:

```
docker run -d --name=i2b2-demo-db \
-e POSTGRESQL_ADMIN_PASSWORD=demouser \
-p 5432:5432 \
kvb2univpitt/i2b2-demo-db:v1.2021.7
```

Windows:

```
docker run -d --name=i2b2-demo-db ^
-e POSTGRESQL_ADMIN_PASSWORD=demouser ^
-p 5432:5432 ^
kvb2univpitt/i2b2-demo-db:v1.2021.7
```

The above command will run PostgreSQL database on port 5432.

#### Run the i2b2 core server demo

Linux / Mac:

```
docker run -d --name=i2b2-demo-server \
-p 9090:9090 \
kvb2univpitt/i2b2-demo-server:v1.2021.7
```

Windows:

```
docker run -d --name=i2b2-demo-server ^
-p 9090:9090 ^
kvb2univpitt/i2b2-demo-server:v1.2021.7
```

The above command will run i2b2 services on port 9090.

#### Run the i2b2 webclient demo

Linux / Mac:

```
docker run -d \
--name=i2b2-demo-webclient-saml \
-p 80:80 -p 443:443 \
kvb2univpitt/i2b2-demo-webclient-saml:v1.2021.7
```

Windows:

```
docker run -d --name=i2b2-demo-webclient-saml ^
-p 80:80 -p 443:443 ^
kvb2univpitt/i2b2-demo-webclient-saml:v1.2021.7
```
