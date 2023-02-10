<?php
session_start();
include 'union.php';
$user = $_POST['user'];
$email = $_POST['email'];
$password = $_POST['password'];
$typeuser = $_POST['type_user'];

$olduser= $_POST['modiuser'];
// CREAMOS LA QUERY PARAR ACTUALIZAR LOS DATOS
$sqlupdate = "UPDATE usuarios 
SET  user='$user', email='$email', password='$password',type_user='$typeuser'
WHERE user='$olduser'";

//VERIFICAMOS SI ALGUN DATO EXISTE PARA ADVERTIR
$sqlcopy = "SELECT * FROM usuarios WHERE user = '$user' OR email = '$user'";
$result = $conn->query($sqlcopy);

if ($result->num_rows > 0){
    header("Location: update-user.php?duplicado=true");
}
elseif ($conn->query($sqlupdate) === TRUE) {
    $_SESSION['update']=TRUE;
    header("Location: panel-user.php");
}


?>