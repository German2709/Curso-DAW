-- Esto es un comentario (crtl + /) 
-- seleccionar o extraer datos de una tabla
select * from world.country;

-- actualizar o modificar datos existentes de una tabla
update  academia.alumnos set poblacion = 'Barakaldo' where dni = '12345678F';
-- Es importante recordar integrar un WHERE al usar UPDATE. Ya que sin este, se actualizarán TODOS los datos de la tabla.ALTER

-- Borrar datos de una tabla
DELETE FROM nombre_de_tabla WHERE condicion;
-- sin el WHERE, se borrarán TODOS los datos de la tabla!

-- Añadir datos a una tabla
INSERT INTO academia.alumnos (dni, nombre, apellido1, apellido2, movil)
	VALUES ('16415187A', 'Victoria', ' Pérez', 'García', 621404442);
    -- Una query puede contener tantas lineas como sean necesarias, pero el final siempre deben llevar ";"
    -- Si se van a agregar valores para todos las columnas de una tabla, no es necesario indicar las columnas
    INSERT INTO academia.alumnos
		VALUES ('45634487G', 'Armando', 'Casas', 'Rodriguez', 682511325, 'Portugalete', 48920);
        
-- SELECT DISTINCT
-- Se usa cuando queremos mostrar datos NO DUPLICADOS de una tabla
SELECT DISTINCT(language), Continent FROM world.country c 
JOIN world.countrylanguage l ON c.code = l.countrycode
WHERE Continent = 'south america';

-- MIN() y MAX()  
SELECT name,MIN(population) FROM world.city;

-- COUNT(), AVG(), SUM(()
-- COUNT() retorna el número de registros que coicidan con la query
SELECT COUNT(*) FROM world.city
WHERE Population>1500000;

-- AVG() retorna el promedio de los valores de una columna
SELECT AVG(city.Population) FROM world.city
JOIN world.country ON country.code=city.countryCode
WHERE country.name='spain';

-- SUM() retorna la suma de los valores de una columna 
SELECT SUM(city.population) 'Total de habitantes de las ciudades de España, de la base de datos' FROM world.city 
 JOIN world.country ON country.Code=city.countryCode
 WHERE country.name='spain';
 
 -- IN y NOT IN, se usa para indicar varias opciones para una columna en una clausula WHERE
 SELECT language, name FROM world.country c
 JOIN world.countrylanguage l ON c.code=l.CountryCode
 -- WHERE name = 'germany' or name='france' or name='belgius'
 WHERE name IN ('germany','france','belgius');
 
 -- BETWEEN, se usa para buscar resultados que esten contenidos entre dos valores
 SELECT name, population FROM world.city
 WHERE Population
 -- NOT
 BETWEEN 250000 AND 500000;
 -- OR population BETWEEN 750000 AND 850000;
 
 -- ALIAS "AS()"
 SELECT CONCAT(nombre,' ',apellido1) AS 'Nombre Completo' FROM academia.alumnos;
 
 -- GROUP BY, Agrupa columnas calculadas AVG(), COUNT(), SUM(), MAX(), MIN()
 SELECT COUNT(city.name) 'Cantidad de Ciudades', country.Name FROM world.city
 JOIN world.country ON city.countryCode=country.code
 WHERE Continent='africa'
 GROUP BY country.name;
 
 -- HAVING, es lel condicional para el GROUP BY ya que la clausula WHERE no se puede usar despues de esta
 SELECT COUNT(city.name) 'Cantidad de Ciudades', country.Name FROM world.city
 JOIN world.country ON city.countryCode=country.code
 WHERE Continent='africa'
 GROUP BY country.name
 -- si queremos añadir una condicion a que grupos queremos visualizar, usamos el HAVING
HAVING COUNT(city.name)>=5;
 -- solo mostrar aquellos paises con 5 ciudades o más 
 
 -- EXISTS, se usa con el WHERE y una subquery cuyo resultado retorna TRUE o FALSE dependiendo si se cumple o no.
 -- Sirve para filtrar datos con condiciones más avanzadas
 SELECT name,countrycode FROM world.city 
 WHERE EXISTS(SELECT LifeExpectancy FROM world.country WHERE city.CountryCode=country.code AND LifeExpectancy >=75 AND Continent = 'ASIA')
 ORDER BY countrycode;
 
 SELECT c.name,countrycode FROM world.city c
 JOIN world.country ON c.CountryCode=country.Code 
 WHERE LifeExpectancy >=75 AND Continent = 'ASIA';
 
  -- ANY, ALL
  SELECT name FROM world.country
  WHERE code= ANY(
  SELECT countrycode FROM city
  WHERE Population > 2000000);
  -- ANY: Si alguna cumple la condicion, retorna TRUE
 
 SELECT name FROM world.country
  WHERE code= ALL(
  SELECT countrycode FROM city
  WHERE Population > 2200000);
  -- ALL retorna false si no TODOS los resultados se cumplen
  
  -- INSERT SELECT, es un INSERT con una subquery, copia los resultados de esta y los introduce en la tabla que le indicamos
   --  creamos una tabla de ejemplo
  CREATE TABLE ejercicios.ciudades(
  id INT PRIMARY KEY,
  Nombre VARCHAR(50),
  Pais VARCHAR(50),
  Continente VARCHAR(50));
  
  -- insetamos en la tabla las ciudades con su respectivo pais y continente
  INSERT INTO ejercicios.ciudades
  SELECT c.id, c.name, p.name, p.continent FROM world.city c
  JOIN world.country p ON c.CountryCode=p.code
  WHERE Continent IN('south america','asia','oceania');
  
  SELECT * FROM ejercicios.ciudades ORDER BY pais;
  
  -- CASE, es el if/else de MySQL, retorna un dato que podemos mostrar en un columna
SELECT name, lifeExpectancy,
CASE 
WHEN lifeExpectancy < 50 THEN 'Lo tiene jodido'
WHEN lifeExpectancy BETWEEN 50 AND 70 THEN 'Es aceptable'
WHEN lifeExpectancy >70 THEN 'Viven muy bien'
ELSE 'No hay Información al respecto'
END AS 'Calidad de vida'
FROM world.country;

-- IFNULL(), COALESCE(),-- Sirve para manejar resultadps cuando nos encontramos con un null
	-- Retorna el segundo parametro cuando el primero es null
 SELECT CONCAT(nombre,' ',apellido1,' ',IFNULL(apellido2,'')) AS 'Nombre Completo' FROM academia.alumnos;
	-- Retorna el primer valor de una lista de parametros que no sea nulo 
 SELECT CONCAT(nombre,' ',apellido1,' ',COALESCE(apellido2,apellido1,'')) AS 'Nombre Completo' FROM academia.alumnos;