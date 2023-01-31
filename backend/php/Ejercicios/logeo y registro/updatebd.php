<?php
session_start();
include 'union.php';
$user = $_POST['user'];
$email = $_POST['email'];
$password = $_POST['password'];
$typeuser = $_POST['type_user'];

$olduser= $_POST['olduser'];
// CREAMOS LA QUERY PARAR ACTUALIZAR LOS DATOS
$sqlupdate = "UPDATE usuarios 
SET  user='$user', email='$email', password='$password',type_user='$typeuser'
WHERE user='$olduser'";

if ($conn->query($sqlupdate) === TRUE) {
    $_SESSION['update']=TRUE;
    header("Location: update-user.php");
}

//CREAMOS LA QUERY PARA ELEMINAR LOS DATOS
// $sqldelete="DELETE FROM usuarios WHERE user='$user'";
// if ($conn->query($sqldelete) === TRUE) {
//     $_SESSION['delete']=TRUE;
//     header("Location: update-user.php");
// }

?>