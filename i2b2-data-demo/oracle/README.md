# i2b2-data-demo (Oracle)

A Docker image of Oracle database containing i2b2 demo data ([Release 1.7.12a](https://github.com/i2b2/i2b2-data/releases/tag/v1.7.12a.0001)) for demonstration purposes.

## Docker User-defined Bridge Network

The container runs on a user-defined bridge network ***i2b2-demo-net***.  The user-defined bridge network provides better isolation and allows containers on the same network to communicate with each other using their container names instead of their IP addresses.

### Ensure User-defined Bridge Network Exists

To verify that the network ***i2b2-demo-net*** exists, execute the following command to list all of the Docker's networks:

```
docker network ls
```

The output should be similar to this:

```
NETWORK ID     NAME            DRIVER    SCOPE
d86843421945   bridge          bridge    local
58593240ad9d   host            host      local
9a82abc00473   i2b2-demo-net   bridge    local
```

If ***i2b2-demo-net*** network is **not** listed, execute the following command to create it:

```
docker network create i2b2-demo-net
```

## Run the Prebuilt Image

A prebuilt Docker image is provided on [Docker Hub](https://hub.docker.com/r/kvb2univpitt/i2b2-data-demo-oracle).

### Prerequisites

- [Docker 19 or above](https://docs.docker.com/get-docker/)

Open up a terminal and execute the following command to download and run the prebuilt image in a container named ***i2b2-data-demo***.

###### Linux / macOS:

```
docker run -d --name i2b2-data-demo \
--network i2b2-demo-net \
--shm-size="4G" \
-p 1521:1521 -p 5500:5500 \
-e ORACLE_PWD=demouser \
kvb2univpitt/i2b2-data-demo-oracle:v1.7.12a.2022.01
```

###### Windows:

```
docker run -d --name i2b2-data-demo ^
--network i2b2-demo-net ^
--shm-size="4G" ^
-p 1521:1521 -p 5500:5500 ^
-e ORACLE_PWD=demouser ^
kvb2univpitt/i2b2-data-demo-oracle:v1.7.12a.2022.01
```

### Application Users

Below is a list of user accounts for logging into the i2b2 web client:

| Username | Password |
|----------|----------|
| demo     | demouser |

> Note that the user accounts above is not the database admin account.

### Access the Database

The database can be accessed with any database tool by using the following configurations:

| Attribute      | Value     |
|----------------|-----------|
| Host           | localhost |
| Port           | 1521      |
| Database (SID) | xe        |
| Username       | system    |
| Password       | demouser  |

### Docker Container and Image Management

Execute the following to stop the running Docker container:

```
docker stop i2b2-data-demo
```

Execute the following to delete the Docker container:

```
docker rm i2b2-data-demo
```

Execute the following to delete the Docker image:

```
docker rmi kvb2univpitt/i2b2-data-demo-oracle:v1.7.12a.2022.01
```

## Build the Image

### Prerequisites

- [Docker or above](https://docs.docker.com/get-docker/)
-  Java SDK 8 ([Oracle JDK](https://www.oracle.com/java/technologies/javase-downloads.html) or [OpenJDK](https://adoptopenjdk.net/))
- [Oracle Instant Client](https://www.oracle.com/database/technologies/instant-client/downloads.html)

### Build the Docker Image:

Follow the instruction on how to build and run [Oracle Docker Images](https://github.com/oracle/docker-images/blob/main/OracleDatabase/SingleInstance/README.md).

 >In this demo, Oracle database version **11.2.0.2-xe** is used.  You will need to download ***oracle-xe-11.2.0-1.0.x86_64.rpm.zip*** file separately.

To verify that the image has been built, execute the following command to list the Docker images:

```
docker images
```

The output should be similar to the following:

```
REPOSITORY        TAG           IMAGE ID       CREATED          SIZE
oracle/database   11.2.0.2-xe   72df7424fd41   34 minutes ago   1.15GB
oraclelinux       7-slim        4133e87bc7fa   2 weeks ago      132MB
```

### Run the Image In a Container

Execute the following command the run the Docker image **oracle/database:11.2.0.2-xe** in a Docker container name ***i2b2-data-demo***:

###### Linux / macOS:

```
docker run -d --name i2b2-data-demo \
--shm-size="4G" \
-p 1521:1521 -p 5500:5500 \
-e ORACLE_PWD=demouser \
oracle/database:11.2.0.2-xe
```

###### Windows:

```
docker run -d --name i2b2-data-demo ^
--shm-size="4G" ^
-p 1521:1521 -p 5500:5500 ^
-e ORACLE_PWD=demouser ^
oracle/database:11.2.0.2-xe
```

To verify that the container is running, execute the following command to list the Docker containers:

```
docker ps
```

The output should be similar to the following:

```
CONTAINER ID   IMAGE                         COMMAND                  CREATED         STATUS                            PORTS                                                                                  NAMES
2af16c8d74b2   oracle/database:11.2.0.2-xe   "/bin/sh -c 'exec $O…"   7 seconds ago   Up 6 seconds (health: starting)   0.0.0.0:1521->1521/tcp, :::1521->1521/tcp, 0.0.0.0:5500->5500/tcp, :::5500->5500/tcp   i2b2-data-demo
```

### Changing Datafile Size

The ***MAXBYTES*** for the datafile ***/u01/app/oracle/oradata/XE/system.dbf*** is **629,145,600** bytes.  It is not enough for importing the i2b2 data.  Execute the following command to run the Oracle client to execute the SQL script that will increase the size to **34,359,721,984** bytes

```
sqlplus system/demouser@localhost:1521/xe @./resources/change_datafile_size.sql
```

To verify, run the following query:

```sql
SELECT FILE_NAME,MAXBYTES FROM DBA_DATA_FILES WHERE TABLESPACE_NAME='SYSTEM';
```

### Create i2b2 Database and Users

Open up a terminal in the directory **i2b2-demo/i2b2-data-demo/oracle**.  Execute the following command to run Oracle client to execute the SQL script that creates i2b2 database and i2b2 database users:

```
sqlplus system/demouser@localhost:1521/xe @./resources/create_database.sql
```

The output should be similar to the following:

```
SQL*Plus: Release 21.0.0.0.0 - Production on Wed Feb 2 13:00:31 2022
Version 21.3.0.0.0

Copyright (c) 1982, 2021, Oracle.  All rights reserved.

Connected to:
Oracle Database 11g Express Edition Release 11.2.0.2.0 - 64bit Production

User created.
User created.
User created.
User created.
User created.
User created.

Grant succeeded.
Grant succeeded.
Grant succeeded.
Grant succeeded.
Grant succeeded.
Grant succeeded.

Commit complete.

Disconnected from Oracle Database 11g Express Edition Release 11.2.0.2.0 - 64bit Production
```

### Import the i2b2 Demo Data into the Database

Download the zip file [i2b2-data-1.7.12a.0001.zip](https://github.com/i2b2/i2b2-data/archive/refs/tags/v1.7.12a.0001.zip) and extract it to the directory **i2b2-demo/i2b2-data-demo/oracle**.

#### Copy the Database Property Files to the i2b2-data Software

Open up a terminal in the directory **i2b2-demo/i2b2-data-demo/oracle**, where the ***i2b2-data-1.7.12a.0001.zip*** was extracted, and execute the following command to copy the database property files over:

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

#### Run the Ant Script to Import the i2b2 Demo Data

Execute the following command to run the ant script to import the i2b2 demo data into the database:

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

The **pm_cell_data** table contains URLs used by the i2b2 web application to communicate with the i2b2 core servers.  As mentioned above, Docker containers that run on the same Docker network communicate with eacher using their container names. The URLs need to be updated from ***localhost*** to the i2b2-core-server's container name ***i2b2-core-server-demo***.

Open up a terminal in the directory **i2b2-demo/i2b2-data-demo/oracle** and execute the following command to run Oracle client to execute the SQL script that updates the IP address to the container name in the **pm_cell_data** table:

```
sqlplus system/demouser@localhost:1521/xe @./resources/update_tables.sql
```

### Save the Docker Container State to the Docker Image

The changes made to the Docker container need to be saved to the Docker image so that the data is still there when the image is launched into a new container.

The container ID is required to commit the changes to the image.  Execute the following to get the container ID:

```
docker ps
```

The output should be similar to the following:

```
CONTAINER ID   IMAGE                         COMMAND                  CREATED         STATUS                            PORTS                                                                                  NAMES
2af16c8d74b2   oracle/database:11.2.0.2-xe   "/bin/sh -c 'exec $O…"   7 seconds ago   Up 6 seconds (health: starting)   0.0.0.0:1521->1521/tcp, :::1521->1521/tcp, 0.0.0.0:5500->5500/tcp, :::5500->5500/tcp   i2b2-data-demo
```

The container ID is **2af16c8d74b2** in this example.  execute the following command to save the state of the container to the image:

```
docker commit 2af16c8d74b2 local/i2b2-data-demo-oracle
```

### Docker Container and Image Management

Execute the following to stop the running Docker container:

```
docker stop i2b2-data-demo
```

Execute the following to delete the Docker container:

```
docker rm i2b2-data-demo
```

Execute the following to delete the Docker image:

```
docker rmi local/i2b2-data-demo-oracle
```
