# i2b2-demo

#### Run i2b2 demo data

```bash
docker run -d --name=i2b2-demo-db \
-e POSTGRESQL_ADMIN_PASSWORD=demouser \
-p 5432:5432 \
kvb2univpitt/i2b2-demo-db:v1
```

```bash
docker run -d --name=i2b2-demo-server \
--network=host \
-p 9090:9090 \
kvb2univpitt/i2b2-demo-server:v1
```

```bash
docker run -d \
--name=i2b2-demo-webclient-saml \
--network=host \
-p 80:80 -p 443:443 \
kvb2univpitt/i2b2-demo-webclient-saml:v1
```