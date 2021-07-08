# i2b2-webclient-demo

A Docker image of i2b2-webclient version 1.7.12a.

## Run the Prebuilt Image in a Container

### Prerequisites

- [Docker 19.x](https://docs.docker.com/get-docker/)

A prebuilt [Docker image](https://hub.docker.com/r/kvb2univpitt/i2b2-webclient-demo) is provided on Docker Hub.  Open up a terminal and execute the following command:

Linux / macOS:

```
docker run -d --name=i2b2-webclient-demo \
--network host \
-p 80:80 -p 443:443 \
kvb2univpitt/i2b2-webclient-demo:v1.2021.7
```

Windows:

```
docker run -d --name=i2b2-webclient-demo ^
--network host ^
-p 80:80 -p 443:443 ^
kvb2univpitt/i2b2-webclient-demo:v1.2021.7
```

The above command will run the i2b2-webclient on port 80 (http) and port 443 (https).

## Build the Image

### Prerequisites

- [Docker 19.x](https://docs.docker.com/get-docker/)

Open up a terminal in the folder ***i2b2-webclient-demo***, containing the file **Dockerfile**, and execute the following command:

```
docker build -t local/i2b2-webclient-demo .
```

To verify that the image has been buit, execute the following command:

```
docker images
```

The output should be similar to the following:

```
REPOSITORY                           TAG              IMAGE ID       CREATED             SIZE
local/i2b2-webclient-demo            v1.2021.7        d12cc0f781d5   4 minutes ago       451MB
```

### Run the Image In the Container

Execute the following command to run the image in a Docker container:

Linux / macOS:

```
docker run -d --name=i2b2-webclient-demo \
--network host \
-p 80:80 -p 443:443 \
local/i2b2-webclient-demo
```

Windows:

```
docker run -d --name=i2b2-webclient-demo ^
--network host ^
-p 80:80 -p 443:443 ^
local/i2b2-webclient-demo
```

### Access the Application

Launch a web browser and type in the following URL:

[http://localhost/webclient/](http://localhost/webclient/)

For SSL, type the following URL:

[https://localhost/webclient/](https://localhost/webclient/)
