# i2b2-demo-db
A Docker image of the i2b2 demo database version 1.7.12a.

## Run the Pre-built Image in a Container

### Prerequisites
- [Docker 19.x](https://docs.docker.com/get-docker/)

#### Run in the Container
A pre-built [Docker image](https://hub.docker.com/r/kvb2univpitt/i2b2-demo-db) is provided on Docker Hub.

```console
docker run -d --name=i2b2-demo-db \
-e POSTGRESQL_ADMIN_PASSWORD=demouser \
-p 5432:5432 \
kvb2univpitt/i2b2-demo-db:v1
```

The above command will run a Docker container with PostgreSQL on port 5432 having the following database admin account:

| Username | Password |
|----------|----------|
| postgres | demouser |

## Build the Image

### Prerequisites
- [Docker 19.x](https://docs.docker.com/get-docker/)
-  Java SDK 8 or higher ([Oracle JDK](https://www.oracle.com/java/technologies/javase-downloads.html) or [OpenJDK](https://adoptopenjdk.net/))
- [Apache Ant 1.10.x](https://ant.apache.org/bindownload.cgi)
- [PostgreSQL 9 or above](https://www.postgresql.org/download/)

### Buid and Run PostgreSQL in Docker Container
Open up a terminal in the directory **i2b2-demo-db**, where the file Dockerfile is located.

*Run the following command to build the image with the latest OS update:*

```console
docker build -t local/i2b2-demo-db .
```

Run ```docker images``` to see the downloaded images:

```console
REPOSITORY                                 TAG       IMAGE ID       CREATED          SIZE
local/i2b2-demo-db                         latest    df51a33c35ec   15 minutes ago   541MB
```

*Run the following command to run the image in a container:*

```console
docker run -d --name=i2b2-demo-db \
-e POSTGRESQL_ADMIN_PASSWORD=demouser \
-p 5432:5432 \
local/i2b2-demo-db
```

The above command will run a Docker container with PostgreSQL on port 5432 having the following database admin account:

| Username | Password |
|----------|----------|
| postgres | demouser |

Run ```docker ps -a``` to see that the container is running:

```console
CONTAINER ID   IMAGE                COMMAND                  CREATED         STATUS         PORTS                    NAMES
09cbaa3fe008   local/i2b2-demo-db   "container-entrypoin…"   7 seconds ago   Up 6 seconds   0.0.0.0:5432->5432/tcp   i2b2-demo-db
```

### Create i2b2 Database and Admin Users

*Run the following command to execute the SQL script that creates the i2b2 database and admin users.*

```console
psql postgresql://postgres:demouser@localhost:5432/postgres -f ./resources/create_database.sql
```

You should see the following output:

```console
CREATE DATABASE
CREATE ROLE
CREATE ROLE
CREATE ROLE
CREATE ROLE
CREATE ROLE
CREATE ROLE
GRANT
GRANT
GRANT
GRANT
GRANT
GRANT
GRANT
```

### Download the i2b2 Software

Download and unzip the [i2b2-data (v1.7.12a.0001)](https://github.com/i2b2/i2b2-data/releases/tag/v1.7.12a.0001), the software for importing demo data, to the directory **i2b2-demo-db**.  Since we are creating a new database, we are only interest in the directory **./i2b2-data-1.7.12a.0001/edu.harvard.i2b2.data/Release_1-7/NewInstall**

Copy the database property files from the ***resources/db_configs*** to the director ***i2b2-data-1.7.12a.0001/edu.harvard.i2b2.data/Release_1-7/NewInstall****.

For Linux and Mac OS, run the following command to copy and the replace the files:

```console
cp ./resources/db_configs/Crcdata/db.properties ./i2b2-data-1.7.12a.0001/edu.harvard.i2b2.data/Release_1-7/NewInstall/Crcdata/
cp ./resources/db_configs/Hivedata/db.properties ./i2b2-data-1.7.12a.0001/edu.harvard.i2b2.data/Release_1-7/NewInstall/Hivedata/
cp ./resources/db_configs/Imdata/db.properties ./i2b2-data-1.7.12a.0001/edu.harvard.i2b2.data/Release_1-7/NewInstall/Imdata/
cp ./resources/db_configs/Metadata/db.properties ./i2b2-data-1.7.12a.0001/edu.harvard.i2b2.data/Release_1-7/NewInstall/Metadata/
cp ./resources/db_configs/Pmdata/db.properties ./i2b2-data-1.7.12a.0001/edu.harvard.i2b2.data/Release_1-7/NewInstall/Pmdata/
cp ./resources/db_configs/Workdata/db.properties ./i2b2-data-1.7.12a.0001/edu.harvard.i2b2.data/Release_1-7/NewInstall/Workdata/
```

### Run the Ant Scripts

*Run the following command to import the demo data into the database:*

```console
./i2b2-data-1.7.12a.0001/edu.harvard.i2b2.data/Release_1-7/apache-ant/bin/ant \
-f ./i2b2-data-1.7.12a.0001/edu.harvard.i2b2.data/Release_1-7/NewInstall/build.xml \
create_database load_demodata
```

The process should take about 15-20 minutes, depending on how fast your computer is.

### Save the Docker Container to Docker Image

Now that the database running in the Docker container has the i2b2 data, we want to save it to a Docker image so that we can run it again in the future.

*Get the **CONTAINER ID** by running the following:*

```console
docker ps
```

You should see the output similar to this:

```console
CONTAINER ID   IMAGE                COMMAND                  CREATED         STATUS         PORTS                    NAMES
09cbaa3fe008   local/i2b2-demo-db   "container-entrypoin…"   7 seconds ago   Up 6 seconds   0.0.0.0:5432->5432/tcp   i2b2-demo-db
```

In this example, the **CONTAINER ID** is ***09cbaa3fe008***.

*Run the following command to save the container to image:*

```console
docker commit 09cbaa3fe008 local/i2b2-demo-db:v1
```

The above command with create a Docker image **local/i2b2-demo-db** with a tag version **v1**.

To run the above image in a container, run the following command:

```console
docker run -d --name=i2b2-demo-db \
-e POSTGRESQL_ADMIN_PASSWORD=demouser \
-p 5432:5432 \
local/i2b2-demo-db:v1
```
