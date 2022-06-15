-- using docker container name as host
UPDATE pm_cell_data SET url = 'http://i2b2-core-server-demo:9090/i2b2/services/QueryToolService/' WHERE cell_id  = 'CRC';
UPDATE pm_cell_data SET url = 'http://i2b2-core-server-demo:9090/i2b2/services/FRService/' WHERE cell_id  = 'FRC';
UPDATE pm_cell_data SET url = 'http://i2b2-core-server-demo:9090/i2b2/services/OntologyService/' WHERE cell_id  = 'ONT';
UPDATE pm_cell_data SET url = 'http://i2b2-core-server-demo:9090/i2b2/services/WorkplaceService/' WHERE cell_id  = 'WORK';
UPDATE pm_cell_data SET url = 'http://i2b2-core-server-demo:9090/i2b2/services/IMService/' WHERE cell_id  = 'IM';
