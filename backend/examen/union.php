<?php
$servername = 'localhost';
$username = 'root';
$clavebd = 'zaicer';
$dbname = 'check_user';

//Crear la conexión a la BD
$conn = new mysqli($servername,$username,$clavebd,$dbname);

//Comprobamos la conexión
 if ($conn->connect_error) {
    die("Fallo en la conexión: " . $conn->connect_error);
 }

?>