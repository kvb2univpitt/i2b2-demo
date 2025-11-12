FROM postgres:14.19-alpine3.22

ENV PGDATA=/var/lib/postgresql/pgdata

ADD resources/db_dump/i2b2-data-demo_1.8.2.dump /var/lib/postgresql/i2b2-data-demo_1.8.2.dump

ADD resources/db_dump/init-db.sh /docker-entrypoint-initdb.d/init-db.sh
