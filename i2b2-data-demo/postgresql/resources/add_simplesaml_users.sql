INSERT INTO pm_user_data (user_id,full_name,"password",entry_date,status_cd) VALUES ('demo@i2b2.org','i2b2 SimpleSAML Demo User','08606e5a5267981d3fb99ae15bc610',current_timestamp,'A');

INSERT INTO pm_project_user_roles (project_id,user_id,user_role_cd,entry_date,status_cd) VALUES ('Demo','demo@i2b2.org','USER',current_timestamp,'A');
INSERT INTO pm_project_user_roles (project_id,user_id,user_role_cd,entry_date,status_cd) VALUES ('Demo','demo@i2b2.org','DATA_DEID',current_timestamp,'A');
INSERT INTO pm_project_user_roles (project_id,user_id,user_role_cd,entry_date,status_cd) VALUES ('Demo','demo@i2b2.org','DATA_OBFSC',current_timestamp,'A');
INSERT INTO pm_project_user_roles (project_id,user_id,user_role_cd,entry_date,status_cd) VALUES ('Demo','demo@i2b2.org','DATA_AGG',current_timestamp,'A');
INSERT INTO pm_project_user_roles (project_id,user_id,user_role_cd,entry_date,status_cd) VALUES ('Demo','demo@i2b2.org','DATA_LDS',current_timestamp,'A');
INSERT INTO pm_project_user_roles (project_id,user_id,user_role_cd,entry_date,status_cd) VALUES ('Demo','demo@i2b2.org','EDITOR',current_timestamp,'A');
INSERT INTO pm_project_user_roles (project_id,user_id,user_role_cd,entry_date,status_cd) VALUES ('Demo','demo@i2b2.org','DATA_PROT',current_timestamp,'A');

INSERT INTO pm_user_params (datatype_cd,user_id,param_name_cd,value,entry_date,status_cd) VALUES ('T','demo@i2b2.org','authentication_method','SAML',current_timestamp,'A');