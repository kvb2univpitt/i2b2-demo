# i2b2-data-demo (PostgreSQL)

A Docker image of PostgreSQL database containing the i2b2 demo data ([Release 1.8.2](https://github.com/i2b2/i2b2-data/releases/tag/v1.8.2)) for demonstration purposes.

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

A prebuilt Docker image is provided on [Docker Hub](https://hub.docker.com/r/kvb2univpitt/i2b2-data-demo-postgresql).

### Prerequisites

- [Docker 28 or above](https://docs.docker.com/get-docker/)

Open up a terminal and execute the following command to download and run the prebuilt image in a container named ***i2b2-data-demo***.

###### Linux / macOS:

```
docker run -d --name=i2b2-data-demo \
--network i2b2-demo-net \
-e POSTGRESQL_ADMIN_PASSWORD=demouser \
-p 5432:5432 \
kvb2univpitt/i2b2-data-demo-postgresql:v1.8.2.2025.10
```

###### Windows:

```
docker run -d --name=i2b2-data-demo ^
--network i2b2-demo-net ^
-e POSTGRESQL_ADMIN_PASSWORD=demouser ^
-p 5432:5432 ^
kvb2univpitt/i2b2-data-demo-postgresql:v1.8.2.2025.10
```

### Application Users

Below is a list of user accounts pre-populated in the database:

| Username            | Password | Account Type  | Login Type |
|---------------------|----------|---------------|------------|
| i2b2                | demouser | admin/manager | local      |
| AGG_SERVICE_ACCOUNT | demouser | manager       | local      |
| demo                | demouser | user          | local      |
| demo@i2b2.org       |          | user          | federated  |

> Note that the user accounts above is not the database admin account.

### Access the Database

The database can be accessed with any database tool by using the following configurations:

| Attribute | Value     |
|-----------|-----------|
| Host      | localhost |
| Port      | 5432      |
| Database  | i2b2      |
| Username  | postgres  |
| Password  | demouser  |

> Note that the user accounts above is the database admin account.

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
docker rmi kvb2univpitt/i2b2-data-demo-postgresql:v1.8.2.2025.10
```

## Build the Image

### Prerequisites

- [Docker version 28 or above](https://docs.docker.com/get-docker/)
-  Java SDK 17 ([Oracle JDK](https://www.oracle.com/java/technologies/javase-downloads.html) or [OpenJDK](https://learn.microsoft.com/en-us/java/openjdk/download))
- [PostgreSQL](https://www.postgresql.org/download/)

### Build the Docker Image:

Open up a terminal in the directory **i2b2-demo/i2b2-data-demo/postgresql** and execute the following command to run the image:

###### Linux / macOS:

```
docker run -d --name=i2b2-data-demo \
--network i2b2-demo-net \
-e POSTGRES_PASSWORD=demouser \
-e PGDATA=/var/lib/postgresql/pgdata \
-p 5432:5432 \
postgres:14.19-alpine3.22
```

###### Windows:

```
docker run -d --name=i2b2-data-demo ^
--network i2b2-demo-net ^
-e POSTGRES_PASSWORD=demouser ^
-e PGDATA=/var/lib/postgresql/pgdata ^
-p 5432:5432 ^
postgres:14.19-alpine3.22
```

To verify that the container is running, execute the following command to list the Docker containers:

```
docker ps
```

The output should be similar to the following:

```
CONTAINER ID   IMAGE                       COMMAND                  CREATED         STATUS         PORTS                                         NAMES
28640240d7c9   postgres:14.19-alpine3.22   "docker-entrypoint.s…"   6 seconds ago   Up 5 seconds   0.0.0.0:5432->5432/tcp, [::]:5432->5432/tcp   i2b2-data-demo
```

### Create i2b2 Database and Users

Open up a terminal in the directory **i2b2-demo/i2b2-data-demo/postgresql**.  Execute the following command to run PostgreSQL to execute the SQL script that creates i2b2 database and i2b2 database users:

```
psql postgresql://postgres:demouser@localhost:5432/postgres -f ./resources/create_database.sql
```

The output should be similar to the following:

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

### Import the i2b2 Demo Data into the Database

Download the zip file [i2b2-data-1.8.2.zip](https://github.com/i2b2/i2b2-data/archive/refs/tags/v1.8.2.zip) and extract it to the directory **i2b2-demo/i2b2-data-demo/postgresql**.

#### Copy the Database Property Files to the i2b2-data Software

Open up a terminal in the directory **i2b2-demo/i2b2-data-demo/postgresql**, where the ***i2b2-data-1.8.1a.0001.zip*** was extracted, and execute the following command to copy the database property files over:

###### Linux / macOS:

```
cp ./resources/db_configs/Crcdata/db.properties ./i2b2-data-1.8.2/edu.harvard.i2b2.data/Release_1-8/NewInstall/Crcdata/
cp ./resources/db_configs/Hivedata/db.properties ./i2b2-data-1.8.2/edu.harvard.i2b2.data/Release_1-8/NewInstall/Hivedata/
cp ./resources/db_configs/Imdata/db.properties ./i2b2-data-1.8.2/edu.harvard.i2b2.data/Release_1-8/NewInstall/Imdata/
cp ./resources/db_configs/Metadata/db.properties ./i2b2-data-1.8.2/edu.harvard.i2b2.data/Release_1-8/NewInstall/Metadata/
cp ./resources/db_configs/Pmdata/db.properties ./i2b2-data-1.8.2/edu.harvard.i2b2.data/Release_1-8/NewInstall/Pmdata/
cp ./resources/db_configs/Workdata/db.properties ./i2b2-data-1.8.2/edu.harvard.i2b2.data/Release_1-8/NewInstall/Workdata/
```

###### Windows:

```
copy ./resources/db_configs/Crcdata/db.properties ./i2b2-data-1.8.2/edu.harvard.i2b2.data/Release_1-8/NewInstall/Crcdata/
copy ./resources/db_configs/Hivedata/db.properties ./i2b2-data-1.8.2/edu.harvard.i2b2.data/Release_1-8/NewInstall/Hivedata/
copy ./resources/db_configs/Imdata/db.properties ./i2b2-data-1.8.2/edu.harvard.i2b2.data/Release_1-8/NewInstall/Imdata/
copy ./resources/db_configs/Metadata/db.properties ./i2b2-data-1.8.2/edu.harvard.i2b2.data/Release_1-8/NewInstall/Metadata/
copy ./resources/db_configs/Pmdata/db.properties ./i2b2-data-1.8.2/edu.harvard.i2b2.data/Release_1-8/NewInstall/Pmdata/
copy ./resources/db_configs/Workdata/db.properties ./i2b2-data-1.8.2/edu.harvard.i2b2.data/Release_1-8/NewInstall/Workdata/
```

#### Run the Ant Script to Import the i2b2 Demo Data

Execute the following command to run the ant script to import the i2b2 demo data into the database:

###### Linux / macOS:

```
./i2b2-data-1.8.2/edu.harvard.i2b2.data/Release_1-8/apache-ant/bin/ant \
-f ./i2b2-data-1.8.2/edu.harvard.i2b2.data/Release_1-8/NewInstall/build.xml \
create_database load_demodata
```

###### Windows:

```
./i2b2-data-1.8.2/edu.harvard.i2b2.data/Release_1-8/apache-ant/bin/ant ^
-f ./i2b2-data-1.8.2/edu.harvard.i2b2.data/Release_1-8/NewInstall/build.xml ^
create_database load_demodata
```

The process should take about 15-20 minutes, depending on how fast your computer is.

### Add Additional User Accounts For Federated Login

Currently, the database has the following user account pre-populated:

| Username            | Password | Account Type  | Login Type |
|---------------------|----------|---------------|------------|
| i2b2                | demouser | admin/manager | local      |
| AGG_SERVICE_ACCOUNT | demouser | manager       | local      |
| demo                | demouser | user          | local      |

Open up a terminal in the directory **i2b2-demo/i2b2-data-demo/postgresql** and execute the following command to populate additional user account in the database for federated login:

```
psql postgresql://postgres:demouser@localhost:5432/i2b2 -f ./resources/add_simplesaml_users.sql
```

The following user accounts was added in database:

| Username            | Password | Account Type  | Login Type |
|---------------------|----------|---------------|------------|
| demo@i2b2.org       |          | user          | federated  |

For Shrine user, execute the following command:
```
psql postgresql://postgres:demouser@localhost:5432/i2b2 -f ./resources/shrine.sql
```

The following user accounts was added in database:

| Username            | Password | Account Type  | Login Type |
|---------------------|----------|---------------|------------|
| shrine              | demouser | user          | local      |

### Save the Docker Container State to the Docker Image

The changes made to the Docker container need to be saved to the Docker image so that the data is still there when the image is launched into a new container.

The container ID is required to commit the changes to the image.  Execute the following to get the container ID:

```
docker ps
```

The output should be similar to the following:

```
CONTAINER ID   IMAGE                       COMMAND                  CREATED         STATUS         PORTS                                         NAMES
28640240d7c9   postgres:14.19-alpine3.22   "docker-entrypoint.s…"   6 seconds ago   Up 5 seconds   0.0.0.0:5432->5432/tcp, [::]:5432->5432/tcp   i2b2-data-demo
```

The container ID is **28640240d7c9** in this example.  execute the following command to save the state of the container to the image:

```
docker commit 28640240d7c9 local/i2b2-data-demo-postgresql
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
docker rmi local/i2b2-data-demo-postgresql
```
