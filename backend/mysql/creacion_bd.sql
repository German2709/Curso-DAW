-- Crear una BD llamada 'Tienda' y comenzar a usarla
CREATE DATABASE IF NOT EXISTS Tienda;

DROP TABLE IF EXISTS existencias,localidad,pub,pub_empleado,titular;
use tienda;
-- Crear una tabla 'Productos'
-- Codigo con 3 caracteres
-- Nombre
-- Precio con 2 decimales
-- Fechaalta de tipo fecha
CREATE TABLE productos(
  codigo VARCHAR(3) PRIMARY KEY,
  nombre VARCHAR(45),
  precio INT(2),
  fecha  DATE
);
ALTER TABLE productos 
  MODIFY COLUMN precio DECIMAL(6,2), -- cambiar el tipo de dato
  RENAME COLUMN fecha TO fecha_alta; -- cambiar nombre de una columna
  -- ADD CONSTRAINT pk_productos PRIMARY KEY (codigo) //es por si no asignamos la llave primaria a una columna
ALTER TABLE productos MODIFY COLUMN fecha_alta DATETIME DEFAULT CURRENT_TIMESTAMP;-- es para q la columna se rellene con la fecha y hora del sistema

  -- insertar datos en la tabla
  INSERT INTO productos (codigo, nombre, precio) VALUES ('a01','Afilador',2.50); 
  INSERT INTO productos (codigo, nombre, precio) VALUES ('s01','Silla mod. ZAZ',20); 
  INSERT INTO productos (codigo, nombre, precio) VALUES ('s02','Silla mod. XAX',25); 

SELECT * FROM productos;

-- Añadir una nueva columna con la categoria de los productos
ALTER TABLE productos ADD COLUMN categoria VARCHAR(15);

-- Ahora mismo, todas la categorias tienen valor 'NULL', vamos a corregir esto añadiendo un valor a todos los productos
UPDATE productos SET categoria = 'herramienta' WHERE categoria IS NULL;

-- Modificamos la categoria de las sillas a un termino correcto
UPDATE productos SET categoria='silla' WHERE codigo LIKE 's%';
  --Forma compleja ↓↓
UPDATE productos SET categoria = 'silla' WHERE LEFT(nombre,5) = 'Silla';

-- Ejercicios de repaso:
  -- Datos del producto 'Afilador'
  SELECT * FROM productos WHERE nombre='Afilador';
  -- Productos cuyo nombre empieza con 'S'
  SELECT * FROM productos WHERE nombre LIKE 's%';
  -- Nombre y precio de los productos con su valor superior a 22
  SELECT nombre,precio FROM productos WHERE precio>22;
  -- Precio medio de las sillas
  SELECT categoria, AVG(precio)'Media' FROM productos WHERE categoria='silla';
  -- Lista de categorias sin duplicados
  SELECT categoria FROM productos GROUP BY categoria;
  SELECT DISTINCT(categoria) FROM productos;
  -- Cantidad de productos por categoria 
  SELECT categoria, COUNT(nombre) FROM productos GROUP BY categoria;

  -- Producto cuyo valor es inferior a la media del precio de las sillas
  SELECT nombre,precio,(SELECT AVG(precio) FROM productos WHERE categoria='silla')'Media de precios' 
  FROM productos 
  WHERE precio<(SELECT AVG(precio) FROM productos WHERE categoria='silla');