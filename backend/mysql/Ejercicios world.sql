-- Escribir una consulta SQL que muestre las columnas Id, Name, Population de la tabla city y que limite los resultados a 10 filas.
SELECT id, name, population FROM world.city LIMIT 10;
-- Escribir una consulta SQL que muestre las columnas Id, Name, Population de la tabla city y que limite los resultados a las filas 31-40.
SELECT id, name, population FROM world.city WHERE id BETWEEN 31 and 40;
	-- otra forma seria
SELECT id, name, population FROM world.city limit 30,10;
-- Escribir una consulta SQL que muestre las ciudades de la tabla city que tengan una población mayor a 2000000.
SELECT name,Population FROM world.city WHERE Population > 2000000;
-- Escribir una consulta SQL que muestre las ciudades de la tabla city cuyo nombre empiece por Be.
SELECT name FROM world.city WHERE name LIKE 'Be%';
-- Escribir una consulta SQL que muestre las ciudades de la tabla city cuya población se encuentre entre 500000-1000000.
SELECT name, population FROM world.city WHERE Population BETWEEN 500000 and 1000000;
-- Escribir una consulta SQL que muestre las ciudades de la tabla city ordenadas por nombre.
SELECT name FROM world.city ORDER BY name asc;
-- Escribir una consulta SQL que muestre la ciudad con la menor población.
SELECT name,population FROM world.city ORDER BY Population asc LIMIT 1;
-- Escribir una consulta SQL que muestre la ciudad con la mayor población.
SELECT name, population FROM world.city ORDER BY population desc LIMIT 1;
-- Escribir una consulta SQL que muestre la lista de todos los idiomas hablados en la región del Caribe.
SELECT DISTINCT(language), region FROM world.country 
INNER JOIN world.countrylanguage ON country.code = countrylanguage.countrycode
WHERE region = 'caribbean';
	-- DISTINCT(nombre_de_columna) es un metodo para que los resultados no se repitan
-- Escribir una consulta SQL que muestre la capital de España.
SELECT country.name País,city.name Capital FROM world.country
INNER JOIN world.city ON country.capital=city.id
WHERE country.name='argentina';
-- Escribir una consulta SQL que muestre el país con mayor esperanza de vida.
SELECT name País, LifeExpectancy FROM world.country ORDER BY LifeExpectancy desc LIMIT 1;
-- Escribir una consulta SQL que muestre todas las ciudades de Europa.
SELECT city.name,continent FROM world.city 
INNER JOIN world.country ON country.code=city.countrycode
WHERE Continent='Europe';
-- Escribir una consulta SQL que muestre todas las ciudades de Sudamerica con poblacion de menos de 1000000.
SELECT city.name,continent,city.Population FROM world.city INNER JOIN world.country ON country.code=city.countrycode
WHERE Continent='South America' AND city.Population < 1000000;
-- Escribir una consulta SQL que muestre la ciudad más poblada de la tabla city.
SELECT name Ciudad, Population FROM world.city ORDER BY Population desc LIMIT 1;
-- Escribir una consulta SQL que muestre la ciudad menos poblada de la tabla city.
SELECT name Ciudad, Population FROM world.city ORDER BY Population LIMIT 1;
-- Escribir una consulta SQL que calcule el número de resultados de la tabla city.
SElECT COUNT(*) CANTIDAD_CIUDADES FROM world.city;
-- Escribir una consulta SQL que calcule el número de ciudades de China en la tabla city.
SElECT COUNT(*) CANTIDAD FROM world.city WHERE CountryCode='CHN';
	-- Sino hubiera el codigo 'CHN' en la tabla city seria juntar las dos tablas