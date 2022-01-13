-- any request using these URLs will be proxy over to the i2b2 hives via AJP
UPDATE i2b2pm.dbo.pm_cell_data SET url = 'http://i2b2-core-server-demo-sqlserver:9090/i2b2/services/QueryToolService/' WHERE cell_id  = 'CRC';
UPDATE i2b2pm.dbo.pm_cell_data SET url = 'http://i2b2-core-server-demo-sqlserver:9090/i2b2/services/FRService/' WHERE cell_id  = 'FRC';
UPDATE i2b2pm.dbo.pm_cell_data SET url = 'http://i2b2-core-server-demo-sqlserver:9090/i2b2/services/OntologyService/' WHERE cell_id  = 'ONT';
UPDATE i2b2pm.dbo.pm_cell_data SET url = 'http://i2b2-core-server-demo-sqlserver:9090/i2b2/services/WorkplaceService/' WHERE cell_id  = 'WORK';
UPDATE i2b2pm.dbo.pm_cell_data SET url = 'http://i2b2-core-server-demo-sqlserver:9090/i2b2/services/IMService/' WHERE cell_id  = 'IM';
GO
