# i2b2-data-demo (SQL Server 2017)

A Docker image of SQL Server 2017 database containing i2b2 demo data.

## Run the Prebuilt Image

A prebuilt [Docker image](https://hub.docker.com/r/kvb2univpitt/i2b2-data-demo-sqlserver) is provided to get the database up and running quickly.

### Prerequisites

- [Docker 19.x](https://docs.docker.com/get-docker/)

### Create a User-defined Bridge Network

The Docker containers will run on a user-defined bridge network **i2b2-demo-net** so that they can communicate with each other using their container names instead of IP addresses.

To verify that the **i2b2-demo-net** network exists, open up a terminal and execute the following command:

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

If the **i2b2-demo-net** network does not exists, execute the following command to create it:

```
docker network create i2b2-demo-net
```

### Run the Prebuilt Image in a Container

Open a terminal and execute the following command to download the prebuilt image from Docker Hub and run it in a Docker container. 

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

The Docker image ***kvb2univpitt/i2b2-data-demo-sqlserver:v1.7.12a.2022.01*** is now running inside a Docker container named ***i2b2-data-demo***.

To verify that the container is running, execute the following command:

```
docker ps
```

You should see an output similar to this:

```
CONTAINER ID   IMAGE                                                    COMMAND                  CREATED         STATUS         PORTS                                       NAMES
d4df49a71267   kvb2univpitt/i2b2-data-demo-sqlserver:v1.7.12a.2022.01   "/bin/sh -c /opt/mss…"   6 minutes ago   Up 6 minutes   0.0.0.0:1433->1433/tcp, :::1433->1433/tcp   i2b2-data-demo
```

The database can be accessed with any database tool by using the following configurations:

| Attribute | Value        |
|-----------|--------------|
| Host      | localhost    |
| Port      | 1433         |
| Database  | master       |
| Username  | sa           |
| Password  | Demouser123! |

## Build the Docker Image:

### Prerequisites

- [Docker 19.x](https://docs.docker.com/get-docker/)
-  Java SDK 8 ([Oracle JDK](https://www.oracle.com/java/technologies/javase-downloads.html) or [OpenJDK](https://adoptopenjdk.net/))
- [SQL Server command-line tools](https://docs.microsoft.com/en-us/sql/linux/sql-server-linux-setup-tools?view=sql-server-ver15)

Open up a terminal in the directory **i2b2-data-demo/sqlserver** where the file ***Dockerfile*** is and execute the following command:

```
docker build -t local/i2b2-data-demo-sqlserver .
```

### Run the Image In a Container

Execute the command below to run SQL Server 2017 on port 1433 from the Docker image ***local/i2b2-data-demo-sqlserver*** in a Docker container named ***i2b2-data-demo***.

###### Linux / macOS:

```
docker run -d --name=i2b2-data-demo \
-e MSSQL_AGENT_ENABLED=true \
-e ACCEPT_EULA=Y \
-e SA_PASSWORD=Demouser123! \
-p 1433:1433 \
local/i2b2-data-demo-sqlserver
```

###### Windows:

```
docker run -d --name=i2b2-data-demo ^
-e MSSQL_AGENT_ENABLED=true ^
-e ACCEPT_EULA=Y \
-e SA_PASSWORD=Demouser123! ^
-p 1433:1433 ^
local/i2b2-data-demo-sqlserver
```

### Run SQL Scripts to Setup the Database

Open up a terminal in the directory ***i2b2-data-demo/sqlserver***.

#### Create Database i2b2

execute the following command the run the SQL script to create a database called **i2b2**:

```
sqlcmd -S localhost -U sa -P Demouser123! -i ./resources/create_database.sql -e
```

You should see the following output:

```
-- SQL Server
CREATE DATABASE i2b2demodata;
CREATE DATABASE i2b2hive;
CREATE DATABASE i2b2imdata;
CREATE DATABASE i2b2metadata;
CREATE DATABASE i2b2pm;
CREATE DATABASE i2b2workdata;
```

#### Create Users For i2b2 Database

Execute the following command

```
sqlcmd -S localhost -U sa -P Demouser123! -i ./resources/create_users.sql -e
```

You should see the following output:

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

### Insert i2b2 Demo Data into the Database

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

> The process should take about 20-30 minutes, depending on how fast your computer is.

### Update the pm_cell_data Table

As mentioned above, the Docker containers run on a user-defined bridge network **i2b2-demo-net** so that the containers can communicate with eacher using the container names.  The **pm_cell_data** table contains URLs for the web application to communicate with the **i2b2-core-server**.  The URLs need to be updated from ***localhost*** to the Docker container name ***i2b2-core-server-demo***.

Open up a terminal in the directory ***i2b2-data-saml-demo***.  Execute the following command to run PostgreSQL to execute the SQL script that updates the IP address to the container name in the **pm_cell_data** table:

```
sqlcmd -S localhost -U sa -P Demouser123! -i ./resources/update_tables.sql -e
```

You should see the following output:

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

After the i2b2 demo data has been inserted into the database, we need to persist the changes to the Docker image so that the demo data is still there when we rerun the imagine in a container.

To save the Docker container state to the Docker image, we first need the **container ID**.  Execute the following command to get the container ID:

```
docker ps
```

The output similar to this:

```
CONTAINER ID   IMAGE                            COMMAND                  CREATED         STATUS         PORTS                                       NAMES
c8f5d7d22e32   local/i2b2-data-demo-sqlserver   "/bin/sh -c /opt/mss…"   6 minutes ago   Up 6 minutes   0.0.0.0:1433->1433/tcp, :::1433->1433/tcp   i2b2-data-demo
```

From the above example output, the container ID is ***c8f5d7d22e32***.

Execute the following command to persist the container state to the image:

```
docker commit c8f5d7d22e32 local/i2b2-data-demo-sqlserver
```
