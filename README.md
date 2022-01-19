# i2b2-demo

A collection of Docker images preinstalled with [i2b2 software](https://www.i2b2.org/software/index.html) (version 1.7.12a) for demo purposes.

Docker images have been created for the following i2b2 software:

- [i2b2-data](https://github.com/i2b2/i2b2-data)
- [i2b2-core-server](https://github.com/i2b2/i2b2-core-server)
- [i2b2-webclient](https://github.com/i2b2/i2b2-webclient)

For documentations on the i2b2 software please visit the [i2b2 Community Wiki](https://community.i2b2.org/wiki/)

## i2b2 Web Application Diagram

![i2b2 flow diagram](./img/i2b2_flow.png)


## Run the i2b2 Demo

Follow the instructions to run the prebuilt Docker images in a Docker container for the demo.

### Prerequisites

- [Docker 19.x or above](https://docs.docker.com/get-docker/)

### Create Docker User-defined Bridge Network

Containers on a user-defined bridge network can communicate with each other by their names.  The i2b2-core-server container needs to communicate with the i2b2-data container, and the i2b2-webclient container needs to communicate with the i2b2-core-server container.

Open up a terminal and execute the following command to create a user-defined bridge network **i2b2-demo-net**.

```
docker network create i2b2-demo-net
```

Execute the following command to verify that network **i2b2-demo-net** is created:

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

### Run the i2b2 Prebuild Docker Images in Containers

To demonstrate the i2b2 application, all of the Docker images must be running in a Docker container.

#### Run the i2b2-data-demo

The i2b2-data-demo is the database.  There are two vendors of database to choose, PostgreSQL 12 and SQL Server 2017.

##### PostgreSQL 12

###### Linux / macOS:

```
docker run -d --name=i2b2-data-demo \
--network i2b2-demo-net \
-e POSTGRESQL_ADMIN_PASSWORD=demouser \
-p 5432:5432 \
kvb2univpitt/i2b2-data-demo-postgresql:v1.7.12a.2022.01
```

###### Windows

```
docker run -d --name=i2b2-data-demo ^
--network i2b2-demo-net ^
-e POSTGRESQL_ADMIN_PASSWORD=demouser ^
-p 5432:5432 ^
kvb2univpitt/i2b2-data-demo-postgresql:v1.7.12a.2022.01
```

##### SQL Server 2017

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

###### Windows

```
docker run -d --name=i2b2-data-demo ^
--network i2b2-demo-net ^
-e MSSQL_AGENT_ENABLED=true ^
-e ACCEPT_EULA=Y ^
-e SA_PASSWORD=Demouser123! ^
-p 1433:1433 ^
kvb2univpitt/i2b2-data-demo-sqlserver:v1.7.12a.2022.01
```

**Run i2b2-core-server-demo container:**

The i2b2-core-server-demo is the SOAP web services (i2b2 Hive).  The web services communicate directly with i2b2 web application and the i2b2 database.

> Make sure you choose the correct Docker image containing the same database vendor that you choose for i2b2-data-demo.

##### PostgreSQL 12

###### Linux / macOS:

```
docker run -d --name=i2b2-core-server-demo \
--network i2b2-demo-net \
-p 9090:9090 \
kvb2univpitt/i2b2-core-server-demo-postgresql:v1.7.12a.2022.01
```

###### Windows

```
docker run -d --name=i2b2-core-server-demo ^
--network i2b2-demo-net ^
-p 9090:9090 ^
kvb2univpitt/i2b2-core-server-demo-postgresql:v1.7.12a.2022.01
```

##### SQL Server 2017

###### Linux / macOS:

```
docker run -d --name=i2b2-core-server-demo \
--network i2b2-demo-net \
-p 9090:9090 \
kvb2univpitt/i2b2-core-server-demo-sqlserver:v1.7.12a.2022.01
```

###### Windows

```
docker run -d --name=i2b2-core-server-demo ^
--network i2b2-demo-net ^
-p 9090:9090 ^
kvb2univpitt/i2b2-core-server-demo-sqlserver:v1.7.12a.2022.01
```

**Run i2b2-webclient-demo container:**

The i2b2-webclient-demo is the web application

###### Linux / macOS:

```
docker run -d \
--name=i2b2-webclient-demo \
--network i2b2-demo-net \
-p 80:80 -p 443:443 \
kvb2univpitt/i2b2-webclient-demo:v1.7.12a.2022.01
```

###### Windows

```
docker run -d ^
--name=i2b2-webclient-demo ^
--network i2b2-demo-net ^
-p 80:80 -p 443:443 ^
kvb2univpitt/i2b2-webclient-demo:v1.7.12a.2022.01
```

### Access the i2b2 Web Application

Open up your favorite web browser and enter the URL [https://localhost/webclient/](https://localhost/webclient/).

You will get a security warning from your browser because the SSL certificate is *self-signed*, not signed by verified signer such as VeriSign.  Just click "Accept the Risk and Continue".

![SSL Warning Page](./img/ssl_warning.png)

You should see the login page, as shown below.  The username is **demo** and the password is **demouser**.

![Login Page](./img/login_page.png)

Once you log in, you should see the main page like the one below:

![Main Page](./img/main_page.png)

### Stop the Docker Containers

Stop the **i2b2-webclient-demo** container:

```
docker stop i2b2-webclient-demo
```

Stop the **i2b2-core-server-demo** container:

```
docker stop i2b2-core-server-demo
```

Stop the **i2b2-data-demo** container:

```
docker stop i2b2-data-demo
```

### Remove the Docker Containers

Remove the **i2b2-webclient-demo** container:

```
docker rm i2b2-webclient-demo
```

Remove the **i2b2-core-server-demo** container:

```
docker rm i2b2-core-server-demo
```

Remove the **i2b2-data-demo** container:

```
docker rm i2b2-data-demo
```

### Delete the Docker Images


Delete the **i2b2-webclient-demo** container:

```
docker rmi kvb2univpitt/i2b2-webclient-demo:v1.7.12a.2022.01
```

Delete the **i2b2-core-server-demo** container (**PostgreSQL**):

```
docker rmi kvb2univpitt/i2b2-core-server-demo-postgresql:v1.7.12a.2022.01
```

Delete the **i2b2-core-server-demo** container (**SQL Server**):

```
docker rmi kvb2univpitt/i2b2-core-server-demo-sqlserver:v1.7.12a.2022.01
```

Delete the **i2b2-data-demo** container (**PostgreSQL**):

```
docker rmi kvb2univpitt/i2b2-data-demo-postgresql:v1.7.12a.2022.01
```

Delete the **i2b2-data-demo** container (**SQL Server**):

```
docker rmi kvb2univpitt/i2b2-data-demo-sqlserver:v1.7.12a.2022.01
```
