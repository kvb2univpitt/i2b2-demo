# i2b2-data-demo (SQL Server)

A Docker image of SQL Server database containing i2b2 demo data ([Release 1.7.12a](https://github.com/i2b2/i2b2-data/releases/tag/v1.7.12a.0001)).

## Docker User-defined Bridge Network

The container will run on a user-defined bridge network ***i2b2-demo-net***.  The user-defined bridge network provides better isolation and allows containers on the same network to communicate with each other using their container names instead of their IP addresses.

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

A prebuilt Docker image is provided on [Docker Hub](https://hub.docker.com/r/kvb2univpitt/i2b2-data-demo-sqlserver).

### Prerequisites

- [Docker 19 or above](https://docs.docker.com/get-docker/)

Open up a terminal and execute the following command to download and run the prebuilt image in a container named ***i2b2-data-demo***.

###### Linux / macOS:

```
docker run -d --name=i2b2-data-demo \
--network i2b2-demo-net \
-e MSSQL_AGENT_ENABLED=true \
-e ACCEPT_EULA=Y \
-e SA_PASSWORD=Demouser123! \
-p 1433:1433 \
kvb2univpitt/i2b2-data-demo-sqlserver:v1.7.12a.2022.01
```

###### Windows:

```
docker run -d --name=i2b2-data-demo ^
--network i2b2-demo-net ^
-e MSSQL_AGENT_ENABLED=true ^
-e ACCEPT_EULA=Y ^
-e SA_PASSWORD=Demouser123! ^
-p 1433:1433 ^
kvb2univpitt/i2b2-data-demo-sqlserver:v1.7.12a.2022.01
```

### Access the Database

The database can be accessed with any database tool by using the following configurations:

| Attribute | Value        |
|-----------|--------------|
| Host      | localhost    |
| Port      | 1433         |
| Database  | master       |
| Username  | sa           |
| Password  | Demouser123! |

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
docker rmi kvb2univpitt/i2b2-data-demo-sqlserver:v1.7.12a.2022.01
```

## Build the Image

### Prerequisites

- [Docker or above](https://docs.docker.com/get-docker/)
-  Java SDK 8 ([Oracle JDK](https://www.oracle.com/java/technologies/javase-downloads.html) or [OpenJDK](https://adoptopenjdk.net/))
- [SQL Server command-line tools](https://docs.microsoft.com/en-us/sql/linux/sql-server-linux-setup-tools?view=sql-server-ver15)

### Build the Docker Image:

Open up a terminal in the directory **i2b2-demo/i2b2-data-demo/sqlserver**, where the ***Dockerfile*** file is, and execute the following command to build the image:

```
docker build -t local/i2b2-data-demo-sqlserver .
```

To verify that the image has been built, execute the following command to list the Docker images:

```
docker images
```

The output should be similar to the following:

```
REPOSITORY                       TAG       IMAGE ID       CREATED              SIZE
local/i2b2-data-demo-sqlserver   latest    7910804874d9   About a minute ago   2.03GB
ubuntu                           18.04     886eca19e611   2 weeks ago          63.1MB
```

### Run the Image In a Container

Execute the following command the run the image in a Docker container name ***i2b2-data-demo*** on the user-defined bridge network ***i2b2-demo-net***:

###### Linux / macOS:

```
docker run -d --name=i2b2-data-demo \
--network i2b2-demo-net \
-e MSSQL_AGENT_ENABLED=true \
-e ACCEPT_EULA=Y \
-e SA_PASSWORD=Demouser123! \
-p 1433:1433 \
local/i2b2-data-demo-sqlserver
```

###### Windows:

```
docker run -d --name=i2b2-data-demo ^
--network i2b2-demo-net ^
-e MSSQL_AGENT_ENABLED=true ^
-e ACCEPT_EULA=Y ^
-e SA_PASSWORD=Demouser123! ^
-p 1433:1433 ^
local/i2b2-data-demo-sqlserver
```

To verify that the container is running, execute the following command to list the Docker containers:

```
docker ps
```

The output should be similar to the following:

```
CONTAINER ID   IMAGE                            COMMAND                  CREATED         STATUS         PORTS                                       NAMES
334dce6e182d   local/i2b2-data-demo-sqlserver   "/bin/sh -c /opt/mss…"   5 seconds ago   Up 4 seconds   0.0.0.0:1433->1433/tcp, :::1433->1433/tcp   i2b2-data-demo
```

### Create i2b2 Database

Open up a terminal in the directory **i2b2-demo/i2b2-data-demo/sqlserver**.  Execute the following command to run SQL Server to execute the SQL script that creates i2b2 database:

```
sqlcmd -S localhost -U sa -P Demouser123! -i ./resources/create_database.sql -e
```

The output should be similar to the following:

```
-- SQL Server
CREATE DATABASE i2b2demodata;
CREATE DATABASE i2b2hive;
CREATE DATABASE i2b2imdata;
CREATE DATABASE i2b2metadata;
CREATE DATABASE i2b2pm;
CREATE DATABASE i2b2workdata;
```

### Create i2b2 Users

Open up a terminal in the directory **i2b2-demo/i2b2-data-demo/sqlserver**.  Execute the following command to run SQL Server to execute the SQL script that creates i2b2 database users:

```
sqlcmd -S localhost -U sa -P Demouser123! -i ./resources/create_users.sql -e
```

The output should be similar to the following:

```
-- SQL Server
CREATE LOGIN i2b2demodata WITH PASSWORD = 'demouser',CHECK_POLICY=OFF,CHECK_EXPIRATION=OFF;
CREATE LOGIN i2b2hive WITH PASSWORD = 'demouser',CHECK_POLICY=OFF,CHECK_EXPIRATION=OFF;
CREATE LOGIN i2b2imdata WITH PASSWORD = 'demouser',CHECK_POLICY=OFF,CHECK_EXPIRATION=OFF;
CREATE LOGIN i2b2metadata WITH PASSWORD = 'demouser',CHECK_POLICY=OFF,CHECK_EXPIRATION=OFF;
CREATE LOGIN i2b2pm WITH PASSWORD = 'demouser',CHECK_POLICY=OFF,CHECK_EXPIRATION=OFF;
CREATE LOGIN i2b2workdata WITH PASSWORD = 'demouser',CHECK_POLICY=OFF,CHECK_EXPIRATION=OFF;

USE i2b2demodata;CREATE USER i2b2demodata FOR LOGIN i2b2demodata;
USE i2b2hive;CREATE USER i2b2hive FOR LOGIN i2b2hive;
USE i2b2imdata;CREATE USER i2b2imdata FOR LOGIN i2b2imdata;
USE i2b2metadata;CREATE USER i2b2metadata FOR LOGIN i2b2metadata;
USE i2b2pm;CREATE USER i2b2pm FOR LOGIN i2b2pm;
USE i2b2workdata;CREATE USER i2b2workdata FOR LOGIN i2b2workdata;

USE i2b2demodata;GRANT CONTROL TO i2b2demodata;
USE i2b2hive;GRANT CONTROL TO i2b2hive;
USE i2b2imdata;GRANT CONTROL TO i2b2imdata;
USE i2b2metadata;GRANT CONTROL TO i2b2metadata;
USE i2b2pm;GRANT CONTROL TO i2b2pm;
USE i2b2workdata;GRANT CONTROL TO i2b2workdata;

Changed database context to 'i2b2demodata'.
Changed database context to 'i2b2hive'.
Changed database context to 'i2b2imdata'.
Changed database context to 'i2b2metadata'.
Changed database context to 'i2b2pm'.
Changed database context to 'i2b2workdata'.
Changed database context to 'i2b2demodata'.
Changed database context to 'i2b2hive'.
Changed database context to 'i2b2imdata'.
Changed database context to 'i2b2metadata'.
Changed database context to 'i2b2pm'.
Changed database context to 'i2b2workdata'.
```

### Import the i2b2 Demo Data into the Database

Download the zip file [i2b2-data-1.7.12a.0001.zip](https://github.com/i2b2/i2b2-data/archive/refs/tags/v1.7.12a.0001.zip) and extract it to the directory **i2b2-demo/i2b2-data-demo/sqlserver**.

#### Copy the Database Property Files to the i2b2-data Software

Open up a terminal in the directory **i2b2-demo/i2b2-data-demo/sqlserver**, where the ***i2b2-data-1.7.12a.0001.zip*** was extracted, and execute the following command to copy the database property files over:

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

Open up a terminal in the directory **i2b2-demo/i2b2-data-demo/sqlserver** and execute the following command to run SQL Server to execute the SQL script that updates the IP address to the container name in the **pm_cell_data** table:

```
sqlcmd -S localhost -U sa -P Demouser123! -i ./resources/update_tables.sql -e
```

The output should be similar to the following:

```
-- any request using these URLs will be proxy over to the i2b2 hives via AJP
UPDATE i2b2pm.dbo.pm_cell_data SET url = 'http://i2b2-core-server-demo:9090/i2b2/services/QueryToolService/' WHERE cell_id  = 'CRC';
UPDATE i2b2pm.dbo.pm_cell_data SET url = 'http://i2b2-core-server-demo:9090/i2b2/services/FRService/' WHERE cell_id  = 'FRC';
UPDATE i2b2pm.dbo.pm_cell_data SET url = 'http://i2b2-core-server-demo:9090/i2b2/services/OntologyService/' WHERE cell_id  = 'ONT';
UPDATE i2b2pm.dbo.pm_cell_data SET url = 'http://i2b2-core-server-demo:9090/i2b2/services/WorkplaceService/' WHERE cell_id  = 'WORK';
UPDATE i2b2pm.dbo.pm_cell_data SET url = 'http://i2b2-core-server-demo:9090/i2b2/services/IMService/' WHERE cell_id  = 'IM';


(1 rows affected)

(1 rows affected)

(1 rows affected)

(1 rows affected)

(1 rows affected)
```

### Save the Docker Container State to the Docker Image

The changes made to the Docker container need to be saved to the Docker image so that the data is still there when the image is launched into a new container.

The container ID is required to commit the changes to the image.  Execute the following to get the container ID:

```
docker ps
```

The output should be similar to the following:

```
CONTAINER ID   IMAGE                            COMMAND                  CREATED             STATUS             PORTS                                       NAMES
334dce6e182d   local/i2b2-data-demo-sqlserver   "/bin/sh -c /opt/mss…"   About an hour ago   Up About an hour   0.0.0.0:1433->1433/tcp, :::1433->1433/tcp   i2b2-data-demo
```

The container ID is **334dce6e182d** in this example.  execute the following command to save the state of the container to the image:

```
docker commit 334dce6e182d local/i2b2-data-demo-sqlserver
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
docker rmi local/i2b2-data-demo-sqlserver
```
