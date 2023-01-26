<?php
session_start();
include 'union.php';
$user = $_POST['user'];
$email = $_POST['email'];
$password = $_POST['password'];

//CREAMOS LA QUERY PARA GUARDAR LOS DATOS
$sql = "INSERT INTO usuarios (user,email,password)
    VALUES('$user','$email','$password')";

//EJECUTAMOS LA QUERY Y COMPROVAMOS SI HA SIDO EXTITOSO
if($conn->query($sql) === TRUE) {
   $_SESSION['createduser']=true;
    header("Location: logeo.php");
} else{
    echo "Error: " .$sql . "<br>" . $conn->error;
}

//Cerramos la conexión con la BD
$conn->close();
?>