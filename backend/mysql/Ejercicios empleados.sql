-- Obtener los datos de los empleados con cargo ‘Secretaria’.
SELECT * from empleados_departamentos.empleados WHERE cargoE = 'Secretaria';

-- Obtener el nombre y salario de los empleados.
SELECT nomEmp, salEmp FROM empleados_departamentos.empleados;

-- Obtener los datos de los empleados vendedores, ordenado por nombre.
SELECT * FROM empleados_departamentos.empleados WHERE cargoE='Vendedor' ORDER BY nomEmp;

-- Listar el nombre de los departamentos.
SELECT DISTINCT(nombreDpto) FROM empleados_departamentos.departamentos;

-- Obtener el nombre y cargo de todos los empleados, ordenado por salario.
SELECT nomEmp, cargoE, salEmp FROM empleados_departamentos.empleados ORDER BY salEmp;

-- Listar los salarios y comisiones de los empleados del departamento 2000, ordenado por comisión.
SELECT salEmp, comisionE FROM empleados_departamentos.empleados WHERE codDepto=2000 ORDER BY comisionE;

-- Listar todas las comisiones.
SELECT comisionE FROM empleados_departamentos.empleados;

-- Obtener el valor total a pagar que resulta de sumar a los empleados del departamento 3000 una bonificación de 500.000, en orden alfabético del empleado
SELECT nomEmp, salEmp, (salEmp+500000) as 'pago estimado' 
FROM empleados_departamentos.empleados 
WHERE codDepto=3000
ORDER BY nomEmp;

-- Obtener la lista de los empleados que ganan una comisión superior a su sueldo.
SELECT nomEmp, comisionE FROM empleados_departamentos.empleados WHERE comisionE>salEmp;

-- Listar los empleados cuya comisión es menor o igual que el 30% de su sueldo.
SELECT nomEmp, comisionE FROM empleados_departamentos.empleados WHERE comisionE<=(0.3*salEmp);

-- Elabore un listado donde para cada fila, figure ‘Nombre’ y ‘Cargo’ antes del valor respectivo para cada empleado.
SELECT nomEmp Nombre, cargoE Cargo FROM empleados_departamentos.empleados;

-- Hallar el salario y la comisión de aquellos empleados cuyo número de documento de identidad es superior al ‘19.709.802’.
SELECT nDIEmp, salEmp, comisionE 
FROM empleados_departamentos.empleados 
WHERE nDIEmp>'19.709.802';

-- Muestra los empleados cuyo nombre empiece entre las letras J y Z (rango). Liste estos empleados y su cargo por orden alfabético.
SELECT nomEmp, cargoE 
FROM empleados_departamentos.empleados 
WHERE nomEmp >'J%'AND nomEmp <'Z%'
ORDER BY nomEmp, cargoE;

-- Listar el salario, la comisión, el salario total (salario + comisión), documento de identidad del empleado y nombre, 
-- de aquellos empleados que tienen comisión superior a 1.000.000, ordenar el informe por el número del documento de identidad
SELECT nDIEmp DNI, nomEmp Nombre, salEmp Salario, comisionE Comisión, (salEmp + comisionE) as 'Salario Total'
FROM empleados_departamentos.empleados
WHERE comisionE>1000000
ORDER BY nDIEmp;

-- Obtener un listado similar al anterior, pero de aquellos empleados que NO tienen comisión
SELECT nDIEmp DNI, nomEmp Nombre, salEmp Salario, comisionE Comisión, (salEmp + comisionE) as 'Salario Total'
FROM empleados_departamentos.empleados
WHERE comisionE=0
ORDER BY nDIEmp;

-- Hallar los empleados cuyo nombre no contiene la cadena «MA»
SELECT * FROM empleados_departamentos.empleados 
WHERE NOT lower(nomEmp) LIKE '%ma%';

-- Obtener los nombres de los departamentos que no sean “Ventas” ni “Investigación” NI ‘MANTENIMIENTO’.
SELECT nombreDpto
FROM empleados_departamentos.departamentos
WHERE lower(nombreDpto) != 'ventas'
AND lower(nombreDpto) !='investigación'
AND lower(nombreDpto) !='mantenimiento';
	-- tambien se puede hacer "where lower(nombreDpto) not in ('ventas', 'investigación', 'mantenimiento');"

-- Obtener el nombre y el departamento de los empleados con cargo ‘Secretaria’ o ‘Vendedor’, que no trabajan en el departamento de “PRODUCCION”, 
-- cuyo salario es superior a $1.000.000, ordenados por fecha de incorporación.
SELECT e.nomEmp, e.cargoE, d.nombreDpto
FROM empleados_departamentos.empleados e,empleados_departamentos.departamentos d
WHERE e.codDepto=d.codDepto AND (lower(e.cargoE)='secretaria' OR lower(e.cargoE)='vendedor') 
AND lower(d.nombreDpto) <> 'producción' 
AND e.salEmp>1000000
ORDER BY e.fecIncorporacion;

-- Obtener información de los empleados cuyo nombre tiene exactamente 11 caracteres
SELECT * FROM empleados_departamentos.empleados WHERE char_length(nomEmp)=11;

-- Obtener información de los empleados cuyo nombre tiene al menos 11 caracteres
SELECT * FROM empleados_departamentos.empleados WHERE char_length(nomEmp)<11;

-- Listar los datos de los empleados cuyo nombre inicia por la letra ‘M’, su salario es mayor a $800.000 o reciben comisión y trabajan para el departamento de ‘VENTAS’
SELECT DISTINCT(e.nomEmp), d.nombreDpto, e.salEmp
FROM empleados_departamentos.empleados e, empleados_departamentos.departamentos d
WHERE e.nomEmp like 'M%' AND (e.salEmp>800000 OR e.comisionE>0) 
AND lower(d.nombreDpto)='ventas';
-- Listar los datos de los empleados cuyo nombre inicia por la letra ‘M’, su salario es mayor a $800.000 o reciben comisión y no trabajan para el departamento de ‘VENTAS’(utilizando JOIN
SELECT e.nomEmp, d.nombreDpto, e.salEmp
FROM empleados_departamentos.departamentos d
JOIN empleados_departamentos.empleados e ON e.codDepto=d.codDepto
WHERE e.nomEmp like 'M%' AND (e.salEmp>800000 OR e.comisionE>0) 
AND lower(d.nombreDpto)!='ventas';

-- Obtener los nombres, salarios y comisiones de los empleados que reciben un salario situado entre la mitad de la comisión la propia comisión.
SELECT nomEmp, salEmp, comisionE FROM empleados_departamentos.empleados WHERE salEmp BETWEEN (comisionE/2) AND comisionE;

-- Mostrar el salario más alto de la empresa.
SELECT nomEmp, salEmp AS 'Salario Mayor' FROM empleados_departamentos.empleados ORDER BY salEmp desc LIMIT 1;

-- Número de empleados por departamento
SELECT COUNT(empleados.codDepto) 'Cantidad de Empleados', departamentos.nombreDpto FROM empleados_departamentos.empleados
 JOIN empleados_departamentos.departamentos ON empleados.codDepto=departamentos.codDepto
 GROUP BY departamentos.nombreDpto;
 
 -- Mostrar cada una de las comisiones y el número de empleados que las reciben. Solo si tiene comisión.
 SELECT comisionE, COUNT(nomEmp) 'Reciben comision' FROM empleados_departamentos.empleados WHERE comisionE>0 GROUP BY comisionE;
 
 -- Mostrar el nombre del último empleado de la lista por orden alfabético.
 SELECT nomEmp 'Ultimo empleado de la lista Alfabetica' 
 FROM empleados_departamentos.empleados 
 ORDER BY nomEmp desc LIMIT 1 ;
	-- forma simplificada
 SELECT MAX(nomEmp)'Ultimo empleado de la lista Alfabetica' FROM empleados_departamentos.empleados;
 
 -- Hallar el salario más alto, el más bajo y la diferencia entre ellos.
 SELECT MAX(salEmp)'Salario maximo', MIN(salEmp)'Salario Minimo', ( MAX(salEmp)-MIN(salEmp))'DIferencia' FROM empleados_departamentos.empleados;
 
 -- Mostrar el número de empleados de sexo femenino y de sexo masculino, por departamento.
 SELECT codDepto, sexEmp, COUNT(codDepto) 'Nº Empleados Fem y Masc'
 FROM empleados_departamentos.empleados 
 GROUP BY codDepto, sexEmp;
 
 -- Hallar el salario promedio por departamento.
 SELECT AVG(salEmp),nombreDpto FROM empleados_departamentos.departamentos
 JOIN empleados_departamentos.empleados ON empleados.codDepto=departamentos.codDepto
 GROUP BY nombreDpto;
 
-- Mostrar la lista de los empleados cuyo salario es mayor o igual que el promedio de la empresa. Ordenarlo por departamento.
SELECT nomEmp, salEmp, codDepto FROM empleados_departamentos.empleados 
WHERE salEmp>=(SELECT AVG(salEmp) FROM empleados) 
ORDER BY codDepto;

-- Hallar los departamentos que tienen más de tres empleados. Mostrar el número de empleados de esos departamentos.
SELECT departamentos.codDepto, nombreDpto,COUNT(empleados.codDepto)'Nº de Empleados' FROM empleados_departamentos.departamentos 
JOIN empleados_departamentos.empleados ON empleados.codDepto=departamentos.codDepto
GROUP BY codDepto,nombreDpto
HAVING COUNT(empleados.codDepto)>2;

-- Mostrar el código y nombre de cada jefe, junto al número de empleados que dirige. Solo los que tengan mas de dos empleados (2 incluido).
SELECT jefeID ID_Jefes,(SELECT nomEmp FROM empleados_departamentos.empleados WHERE nDIEmp= ID_Jefes)'Nombre de Jefes', COUNT(*)'Nº Empleados'
FROM empleados_departamentos.empleados
GROUP BY jefeID
HAVING COUNT(*)>=2;

-- Hallar los departamentos que no tienen empleados
SELECT departamentos.codDepto, nombreDpto,COUNT(empleados.codDepto)'Nº de Empleados' FROM empleados_departamentos.departamentos 
JOIN empleados_departamentos.empleados ON empleados.codDepto=departamentos.codDepto
GROUP BY codDepto,nombreDpto
HAVING COUNT(empleados.codDepto)<1;

-- Mostrar el nombre del departamento cuya suma de salarios sea la más alta, indicando el valor de la suma.
SELECT nombreDpto, SUM(empleados.salEmp)'Dpto con Mayor Salario' FROM empleados_departamentos.departamentos
JOIN empleados_departamentos.empleados ON empleados.codDepto=departamentos.codDepto
GROUP BY nombreDpto
ORDER BY SUM(empleados.salEmp) desc LIMIT 1;