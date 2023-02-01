<?php
session_start();
include 'union.php';
$user = $_POST['deletuser'];

//CREAMOS LA QUERY PARA ELEMINAR LOS DATOS
$sqldelete="DELETE FROM usuarios WHERE user='$user'";
if ($conn->query($sqldelete) === TRUE) {
    $_SESSION['delete']=TRUE;
    header("Location: panel-user.php");
}
?>