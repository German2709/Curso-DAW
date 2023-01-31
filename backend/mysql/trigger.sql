-- Active: 1673602447684@@127.0.0.1@3306@academia


-- Creamos una tabla para auditar los cambios en los datos de la tabla "usuarios"
CREATE TABLE audit(  
    id_audit INT PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key',
    create_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    id_user INT,
    old_user VARCHAR(50),
    new_user VARCHAR(50)
);

ALTER TABLE audit 
ADD CONSTRAINT fk_audit
Foreign Key (id_user) REFERENCES usuarios(id);

-- El delimitador es el caracter que completa una sentencia (por ejemplo ';')
DELIMITER $$
-- Cambiamos el delimitador con el fin de que el trigger se ejecute como un solo bloque

-- Creamos un TRIGGER que almacenará los datos viejos cuando hay una modificación
CREATE TRIGGER after_usuarios_update
AFTER UPDATE
ON usuarios FOR EACH ROW
BEGIN
    -- sin el delimitador esta sentencia se ejecutaría al momento
    INSERT INTO audit (id_user,old_user,new_user)
    VALUES(old.id,old.user,new.user);
END$$

-- Una vez hemos terminado de crear los triggers, restauramos el delimitador
DELIMITER ;

SHOW TRIGGERS;

drop TRIGGER after_usuarios_update;

UPDATE usuarios SET user='pepe' WHERE user='pepito';

ALTER TABLE audit ADD COLUMN query_type VARCHAR(28) DEFAULT'AFTER_UPDATE';

DELIMITER $$

--Este TRIGGER guarda los datos de las filas borradas
CREATE TRIGGER before_usuarios_delete
BEFORE DELETE 
ON usuarios FOR EACH ROW
BEGIN
    INSERT INTO audit (id_user,old_user,query_type)
    VALUES(old.id,old.user,'BEFORE_DELETE');

END $$

DELIMITER ;

drop TRIGGER before_usuarios_delete;
ALTER TABLE audit DROP FOREIGN key fk_audit;
DELETE FROM usuarios WHERE id=3;
