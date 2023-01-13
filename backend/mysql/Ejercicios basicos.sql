-- crear base de datos
DROP SCHEMA IF EXISTS ejercicios;
CREATE DATABASE ejercicios;
-- la misma orden pero evitando errores
CREATE DATABASE IF NOT EXISTS ejercicios;

-- Seleccionar base de datos
USE ejercicios;

-- Crear una tabla 
DROP TABLE IF EXISTS usuarios;
CREATE TABLE usuarios(
	usuario VARCHAR(15), 
    contraseña VARCHAR(15)
    );
    -- entre parentesis van separadas por comas las columnas cada una seguida del tipo de datos
    
 -- Modificar una tabla
	-- Añadir una restriccion 
 ALTER TABLE usuarios ADD PRIMARY KEY(usuario);
	-- Añadir una columna
ALTER TABLE usuarios ADD email VARCHAR(15);
	-- Modificar una columna 
ALTER TABLE usuarios MODIFY email TEXT(15);
	-- Eliminar una columna
ALTER TABLE usuarios DROP COLUMN email;
 
 -- Insertar datos
 INSERT INTO usuarios VALUES(
	'Tortal16', 'papapa'),
    ('Pancake13', 'tetete');

-- Extraer o seleccionar datos de una tabla
SELECT * FROM usuarios;


-- Crear una tabla de datos de amigos
	-- Primero eliminamos la existencia de la tabla "agenda" si es que existe
DROP TABLE IF EXISTS agenda;
	-- Creamos tabla
CREATE TABLE IF NOT EXISTS agenda(
	nombre VARCHAR(20),
	domicilio VARCHAR(30),
	telefono INT(11));
