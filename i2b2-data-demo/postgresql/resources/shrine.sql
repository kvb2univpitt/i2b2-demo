INSERT INTO pm_user_data (user_id,full_name,"password",status_cd) VALUES ('shrine','SHRINE User','9117d59a69dc49807671a51f10ab7f','A');
INSERT INTO pm_project_data (project_id,project_name,project_wiki,project_path,status_cd) VALUES ('SHRINE','SHRINE Ontology','http://open.catalyst.harvard.edu/display/SHRINE','/SHRINE','A');
INSERT INTO pm_project_user_roles (project_id,user_id,user_role_cd,entry_date,status_cd) VALUES ('SHRINE','shrine','USER',current_timestamp,'A');
INSERT INTO pm_project_user_roles (project_id,user_id,user_role_cd,entry_date,status_cd) VALUES ('SHRINE','shrine','DATA_AGG',current_timestamp,'A');
