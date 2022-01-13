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
GO