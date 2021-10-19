# i2b2-data-demo

A Docker image of the i2b2-data (version 1.7.12a) demo.

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

A prebuilt [Docker image](https://hub.docker.com/r/kvb2univpitt/i2b2-data-demo) is provided on Docker Hub.  Open up a terminal and execute the following command:

###### Linux / macOS:

```
docker run -d --name=i2b2-data-demo \
--network i2b2-demo-net \
-e POSTGRESQL_ADMIN_PASSWORD=demouser \
-p 5432:5432 \
kvb2univpitt/i2b2-data-demo:v1.2021.10
```

###### Windows:

```
docker run -d --name=i2b2-data-demo ^
--network i2b2-demo-net ^
-e POSTGRESQL_ADMIN_PASSWORD=demouser ^
-p 5432:5432 ^
kvb2univpitt/i2b2-data-demo:v1.2021.10
```

The above command will run PostgreSQL 12 on port 5432 in a Docker container with the following default PostgreSQL admin account:

| Username | Password |
|----------|----------|
| postgres | demouser |

> The admin account is associated with PostgreSQL and is only used for managing the database.  It is NOT for logging into the i2b2 webclient application.

The following user account has been created and stored in the database for logging into the i2b2 webclient application:

| Username | Password |
|----------|----------|
| demo     | demouser |

## Build the Image

### Prerequisites

- [Docker 19.x](https://docs.docker.com/get-docker/)
-  Java SDK 8 or higher ([Oracle JDK](https://www.oracle.com/java/technologies/javase-downloads.html) or [OpenJDK](https://adoptopenjdk.net/))
- [Apache Ant 1.10.x](https://ant.apache.org/bindownload.cgi)
- [PostgreSQL 12](https://www.postgresql.org/download/)

### Build the Docker Image:

Open up a terminal to where the Dockerfile is in the directory ***i2b2-data-demo***, containing the file **Dockerfile**, and execute the following command:

```
docker build -t local/i2b2-data-demo .
```

The above command will build a Docker image with CentOS 7 and PostgreSQL 12 installed.

To verify that the image has been buit, execute the following command:

```
docker images
```

The output should be similar to the following:

```
REPOSITORY                      TAG              IMAGE ID       CREATED          SIZE
local/i2b2-data-demo            latest           45a0846d2c20   28 minutes ago   541MB
centos/postgresql-12-centos7    latest           d12590213acd   11 days ago      372MB
```

### Run the Image In a Container

Execute the following command:

###### Linux / macOS:

```
docker run -d --name=i2b2-data-demo \
--network i2b2-demo-net \
-e POSTGRESQL_ADMIN_PASSWORD=demouser \
-p 5432:5432 \
local/i2b2-data-demo
```

###### Windows:

```
docker run -d --name=i2b2-data-demo ^
--network i2b2-demo-net ^
-e POSTGRESQL_ADMIN_PASSWORD=demouser ^
-p 5432:5432 ^
local/i2b2-data-demo
```

The above command will run PostgreSQL on port 5432 in a Docker container.

To verify that PostgreSQL is running in a container, execute the following command:

```
docker ps -a
```

You should see the output similar to this:

```
CONTAINER ID   IMAGE                  COMMAND                  CREATED          STATUS          PORTS                    NAMES
3dbd4be00a26   local/i2b2-data-demo   "container-entrypoin…"   41 seconds ago   Up 40 seconds   0.0.0.0:5432->5432/tcp   i2b2-data-demo
```

### Create Database i2b2 and Database Users

Open up a terminal in the directory ***i2b2-data-demo*** and execute the following command the run the SQL script to create a database called **i2b2** along with the database users:

```
psql postgresql://postgres:demouser@localhost:5432/postgres -f ./resources/create_database.sql
```

You should see the following output:

```
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

> The i2b2 database users are associated with the i2b2 database and are used by the i2b2 core-server to access the database.

### Insert i2b2 Demo Data to the Database

#### Download the i2b2 Software

Download the [i2b2-data-1.7.12a.0001.zip](https://github.com/i2b2/i2b2-data/archive/refs/tags/v1.7.12a.0001.zip) and unzip the file to the directory ***i2b2-data-demo***.

#### Copy the Database Property Files to the i2b2-data Software

Open up a terminal in the directory ***i2b2-data-demo***, where the **i2b2-data-1.7.12a.0001.zip** was extracted.  Execute the following command to copy the database property files over:

###### Linux / macOS:

```
cp ./resources/db_configs/Crcdata/db.properties ./i2b2-data-1.7.12a.0001/edu.harvard.i2b2.data/Release_1-7/NewInstall/Crcdata/
cp ./resources/db_configs/Hivedata/db.properties ./i2b2-data-1.7.12a.0001/edu.harvard.i2b2.data/Release_1-7/NewInstall/Hivedata/
cp ./resources/db_configs/Imdata/db.properties ./i2b2-data-1.7.12a.0001/edu.harvard.i2b2.data/Release_1-7/NewInstall/Imdata/
cp ./resources/db_configs/Metadata/db.properties ./i2b2-data-1.7.12a.0001/edu.harvard.i2b2.data/Release_1-7/NewInstall/Metadata/
cp ./resources/db_configs/Pmdata/db.properties ./i2b2-data-1.7.12a.0001/edu.harvard.i2b2.data/Release_1-7/NewInstall/Pmdata/
cp ./resources/db_configs/Workdata/db.properties ./i2b2-data-1.7.12a.0001/edu.harvard.i2b2.data/Release_1-7/NewInstall/Workdata/
```

###### Windows:

```
copy ./resources/db_configs/Crcdata/db.properties ./i2b2-data-1.7.12a.0001/edu.harvard.i2b2.data/Release_1-7/NewInstall/Crcdata/
copy ./resources/db_configs/Hivedata/db.properties ./i2b2-data-1.7.12a.0001/edu.harvard.i2b2.data/Release_1-7/NewInstall/Hivedata/
copy ./resources/db_configs/Imdata/db.properties ./i2b2-data-1.7.12a.0001/edu.harvard.i2b2.data/Release_1-7/NewInstall/Imdata/
copy ./resources/db_configs/Metadata/db.properties ./i2b2-data-1.7.12a.0001/edu.harvard.i2b2.data/Release_1-7/NewInstall/Metadata/
copy ./resources/db_configs/Pmdata/db.properties ./i2b2-data-1.7.12a.0001/edu.harvard.i2b2.data/Release_1-7/NewInstall/Pmdata/
copy ./resources/db_configs/Workdata/db.properties ./i2b2-data-1.7.12a.0001/edu.harvard.i2b2.data/Release_1-7/NewInstall/Workdata/
```

#### Run the Ant Script

Execute the following command to run the ant script to insert the i2b2 demo data into the database:

###### Linux / macOS:

```
./i2b2-data-1.7.12a.0001/edu.harvard.i2b2.data/Release_1-7/apache-ant/bin/ant \
-f ./i2b2-data-1.7.12a.0001/edu.harvard.i2b2.data/Release_1-7/NewInstall/build.xml \
create_database load_demodata
```

###### Windows:

```
./i2b2-data-1.7.12a.0001/edu.harvard.i2b2.data/Release_1-7/apache-ant/bin/ant ^
-f ./i2b2-data-1.7.12a.0001/edu.harvard.i2b2.data/Release_1-7/NewInstall/build.xml ^
create_database load_demodata
```

The process should take about 15-20 minutes, depending on how fast your computer is.

### Update the pm_cell_data Table

The i2b2 webclient requests will no longer be made directly to the i2b2 hives (Wildfly server).  All of the requests will be proxy over to the Wildfly server from the Apache server that is hosting the i2b2 webclient. The urls in the **pm_cell_data** table must be updated.

Open up a terminal in the directory ***i2b2-data-saml-demo*** and execute the following command to run the SQL script to update the **pm_cell_data** table:

```
psql postgresql://postgres:demouser@localhost:5432/i2b2 -f ./resources/update_tables.sql
```

### Save the Docker Container State to the Docker Image

After the i2b2 demo data has been inserted into the database, we need to persist the changes to the Docker image so that the demo data is still there when we rerun the imagine in a container.

To save the Docker container state to the Docker image, we first need the **container ID**.  Execute the following command to get the container ID:

```
docker ps
```

The output similar to this:

```
CONTAINER ID   IMAGE                  COMMAND                  CREATED          STATUS          PORTS                    NAMES
3dbd4be00a26   local/i2b2-data-demo   "container-entrypoin…"   41 seconds ago   Up 40 seconds   0.0.0.0:5432->5432/tcp   i2b2-data-demo
```

From the above example output, the container ID is ***3dbd4be00a26***.

Execute the following command to persist the container state to the image:

```
docker commit 3dbd4be00a26 local/i2b2-data-demo
```
