<?php
session_start();
include 'union.php';
$user = $_POST['user'];
$email = $_POST['email'];
$password = $_POST['password'];

//COMPROBAMOS SI EL USURARIO YA EXISTE
$sqlerror = "SELECT * FROM usuarios 
WHERE user ='$user' OR email ='$email'";
$result = $conn->query($sqlerror);
//COMPROBAMOS LA QUERY SI HA HABIDO COICIDENCIAS
if($result->num_rows > 0){
   //si hay algun resultado de ejecuta el mensaje de error
    header("Location: registro.php?error=true");
}

//CREAMOS LA QUERY PARA GUARDAR LOS DATOS
$sql = "INSERT INTO usuarios (user,email,password)
    VALUES('$user','$email','$password')";

//EJECUTAMOS LA QUERY Y COMPROVAMOS SI HA SIDO EXTITOSO
if($conn->query($sql) === TRUE) {
   $_SESSION['createduser']=true;

   if (isset($_SESSION['logged']) && $_SESSION['type_user'] == 'admin') {
    header("Location: panel-user.php");
   }else{header("Location: logeo.php");}
} else{
    echo "Error: " .$sql . "<br>" . $conn->error;
}

//Cerramos la conexión con la BD
$conn->close();
?>