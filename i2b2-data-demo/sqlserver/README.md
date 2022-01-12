# i2b2-data-demo: SQL Server 2017

A SQL Server Docker image containing i2b2 demo data (version 1.7.12a).

## Build the i2b2-data-demo Docker Image

### Prerequisites

- [Docker 19.x](https://docs.docker.com/get-docker/)
-  Java SDK 8 or higher ([Oracle JDK](https://www.oracle.com/java/technologies/javase-downloads.html) or [OpenJDK](https://adoptopenjdk.net/))
- [Apache Ant 1.10.x](https://ant.apache.org/bindownload.cgi)
- [SQL Server command-line tools](https://docs.microsoft.com/en-us/sql/linux/sql-server-linux-setup-tools?view=sql-server-ver15)

### Build the Docker Image:

Open up a terminal in the directory ***i2b2-data-demo/sqlserver*** where the file ***Dockerfile*** is and execute the following command:

```
docker build -t local/i2b2-data-demo-sqlserver .
```

### Run the Image In a Container

Execute the following command:

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

The above command will run SQL Server 2017 on port 1433 in a Docker container.

To verify that database is running in a container, execute the following command:

```
docker ps
```

You should see the output similar to this:

```
CONTAINER ID   IMAGE                            COMMAND                  CREATED         STATUS         PORTS                                       NAMES
c8f5d7d22e32   local/i2b2-data-demo-sqlserver   "/bin/sh -c /opt/mss…"   6 minutes ago   Up 6 minutes   0.0.0.0:1433->1433/tcp, :::1433->1433/tcp   i2b2-data-demo
```

To stop the container, execute the following:

```
docker stop i2b2-data-demo
```

To delete the container, execute the following:

```
docker rm i2b2-data-demo
```

### Run SQL Scripts to Setup Database

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

> The process should take about 15-20 minutes, depending on how fast your computer is.

### Update the pm_cell_data Table

The i2b2 webclient requests will no longer be made directly to the i2b2 hives (Wildfly server).  All of the requests will be proxy over to the Wildfly server from the Apache server that is hosting the i2b2 webclient. The urls in the **pm_cell_data** table must be updated.

Open up a terminal in the directory ***i2b2-data-saml-demo*** and execute the following command to run the SQL script to update the **pm_cell_data** table:

```
sqlcmd -S localhost -U sa -P Demouser123! -i ./resources/update_tables.sql -e
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
