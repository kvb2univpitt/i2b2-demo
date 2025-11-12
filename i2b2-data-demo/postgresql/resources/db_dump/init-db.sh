#!/usr/bin/env bash

set -e

psql -v ON_ERROR_STOP=1 --username "$POSTGRES_USER" --dbname "$POSTGRES_DB" <<-EOSQL
    CREATE DATABASE i2b2;

    CREATE USER i2b2demodata WITH PASSWORD 'demouser';
    CREATE USER i2b2hive WITH PASSWORD 'demouser';
    CREATE USER i2b2imdata WITH PASSWORD 'demouser';
    CREATE USER i2b2metadata WITH PASSWORD 'demouser';
    CREATE USER i2b2pm WITH PASSWORD 'demouser';
    CREATE USER i2b2workdata WITH PASSWORD 'demouser';

    GRANT ALL PRIVILEGES ON DATABASE i2b2 TO i2b2demodata;
    GRANT ALL PRIVILEGES ON DATABASE i2b2 TO i2b2hive;
    GRANT ALL PRIVILEGES ON DATABASE i2b2 TO i2b2imdata;
    GRANT ALL PRIVILEGES ON DATABASE i2b2 TO i2b2metadata;
    GRANT ALL PRIVILEGES ON DATABASE i2b2 TO i2b2pm;
    GRANT ALL PRIVILEGES ON DATABASE i2b2 TO i2b2workdata;
    GRANT ALL PRIVILEGES ON DATABASE i2b2 TO i2b2demodata;
EOSQL

pg_restore --verbose --username="$POSTGRES_USER" --dbname=i2b2 --format=c /var/lib/postgresql/i2b2-data-demo_1.8.2.dump

# rm -f /var/lib/postgresql/i2b2-data-demo_1.8.2.dump
