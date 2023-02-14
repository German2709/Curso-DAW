-- Active: 1673602447684@@127.0.0.1@3306@logeo_registro
CREATE TABLE audito(  
    id_audit int NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key',
    fecha_modif TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    id_user INT,
    old_user VARCHAR(15),
    new_user VARCHAR(15),
    old_email VARCHAR(45),
    new_email VARCHAR(45),
    old_typeuser VARCHAR(5),
    new_typeuser VARCHAR(5),
    tipo_trigger VARCHAR(20) DEFAULT 'AFTER_UPDATE'
);

DELIMITER $$
CREATE TRIGGER after_user_update
AFTER UPDATE
ON usuarios FOR EACH ROW
BEGIN
    INSERT INTO audito(id_user,old_user,new_user,old_email,new_email,old_typeuser,new_typeuser)
    VALUES(old.id,old.user,new.user,old.email,new.email,old.type_user,new.type_user);
END $$

CREATE TRIGGER before_user_delete
BEFORE DELETE
ON usuarios FOR EACH ROW
BEGIN
    INSERT INTO audito(id_user,old_user,old_email,old_typeuser,tipo_trigger)
    VALUES(old.id,old.user,old.email,old.type_user,'BEFORE_DELETE');

END $$

DELIMITER ;

DROP TRIGGER IF EXISTS after_user_update;
DROP TRIGGER IF EXISTS before_user_delete;

DROP TABLE IF EXISTS audito;

ALTER TABLE audito
MODIFY COLUMN old_user VARCHAR(45),
MODIFY COLUMN new_user VARCHAR(45);
