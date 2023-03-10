<?php
session_start();
include 'union.php';
// variables del formulario de actualización
$password = $_POST['password'];
$mac = $_POST['mac'];
$bio = $_POST['bio'];
$foto = $_POST['foto'];
$user_type = $_POST['tipo_usuario'];

$check= $_POST['check'];

$olduser= $_POST['modiuser'];
// CREAMOS LA QUERY PARAR ACTUALIZAR LOS DATOS
$sql = "UPDATE usuarios 
SET  contraseña='$password',mac='$mac',biometrica='$bio',foto_dni='$foto',tipo_usuario='$user_type'
WHERE nombres='$olduser'";

if ($conn->query($sql) === TRUE ) {
    $_SESSION['update']=TRUE;
    header("Location: user_data.php");
}


?>