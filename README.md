# i2b2-demo

### Run i2b2 demo

#### Run the IdP for SAML authentication

```bash
docker run -d --name=saml-idp-simplesamlphp-demo \
-p 8080:8080 \
-p 8443:8443 \
-e SIMPLESAMLPHP_ADMIN_PASSWORD=letmein \
-e SIMPLESAMLPHP_UID=1 \
-e SIMPLESAMLPHP_USER=ckent \
-e SIMPLESAMLPHP_PASSWORD=batman \
-e SIMPLESAMLPHP_GROUP="Daily Planet" \
-e SIMPLESAMLPHP_EMAIL=ckent@dailyplanet.com \
-e SIMPLESAMLPHP_FIRST_NAME=Clark \
-e SIMPLESAMLPHP_LAST_NAME=Kent \
kvb2univpitt/saml-idp-simplesamlphp-demo:v1
```

The above command with run the IdP on port 8080 and port 8443 with the following account:

| Username | Password |
|----------|----------|
| ckent    | batman   |

#### Run the i2b2 demo data

```bash
docker run -d --name=i2b2-demo-db \
-e POSTGRESQL_ADMIN_PASSWORD=demouser \
-p 5432:5432 \
kvb2univpitt/i2b2-demo-db:v1
```

The above command will run PostgreSQL database on port 5432.

#### Run the i2b2 demo server

```bash
docker run -d --name=i2b2-demo-server \
--network=host \
-p 9090:9090 \
kvb2univpitt/i2b2-demo-server:v1
```

The above command will run i2b2 services on port 9090.

#### Run the i2b2 demo webclient

```bash
docker run -d \
--name=i2b2-demo-webclient-saml \
--network=host \
-p 80:80 -p 443:443 \
kvb2univpitt/i2b2-demo-webclient-saml:v1
```

The above command will run i2b2 webclient on port 80 and port 443.