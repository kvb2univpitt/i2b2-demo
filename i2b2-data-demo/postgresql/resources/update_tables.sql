-- any request using these URLs will be proxy over to the i2b2 hives via AJP
UPDATE pm_cell_data SET url = 'http://127.0.0.1/i2b2/services/QueryToolService/' WHERE cell_id  = 'CRC';
UPDATE pm_cell_data SET url = 'http://127.0.0.1/i2b2/services/FRService/' WHERE cell_id  = 'FRC';
UPDATE pm_cell_data SET url = 'http://127.0.0.1/i2b2/services/OntologyService/' WHERE cell_id  = 'ONT';
UPDATE pm_cell_data SET url = 'http://127.0.0.1/i2b2/services/WorkplaceService/' WHERE cell_id  = 'WORK';
UPDATE pm_cell_data SET url = 'http://127.0.0.1/i2b2/services/IMService/' WHERE cell_id  = 'IM';