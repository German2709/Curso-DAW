<?php
$servername = 'localhost';
$username = 'root';
$password = 'zaicer';
$dbname = 'check_user';

//Crear la conexión a la BD
$conn = new mysqli($servername,$username,$password,$dbname);

//Comprobamos la conexión
 if ($conn->connect_error) {
    die("Fallo en la conexión: " . $conn->connect_error);
 }

?>