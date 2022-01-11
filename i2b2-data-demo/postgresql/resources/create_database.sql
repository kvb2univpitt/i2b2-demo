-- POSTGRESQL
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
