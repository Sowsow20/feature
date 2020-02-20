
DROP TABLE groupe;
CREATE TABLE groupe(id int , groupe_name VARCHAR(255), PRIMARY KEY (id));
ALTER TABLE membres ADD(id_groupe INT);
ALTER TABLE membres ADD FOREIGN KEY (id_groupe) REFERENCES groupe(id);