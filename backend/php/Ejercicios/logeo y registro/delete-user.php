<?php
session_start();
include 'union.php';
$user = $_POST['deletuser'];

//CREAMOS LA QUERY PARA ELEMINAR LOS DATOS
$sqldelete="DELETE FROM usuarios WHERE user='$user'";
if ($conn->query($sqldelete) === TRUE && $_SESSION['type_user'] == 'admin') {
    $_SESSION['delete']=TRUE;
    header("Location: panel-user.php");
}else{
    $_SESSION['delete']=TRUE;
    session_destroy();
    header("Location: page_inicio.php");
}
?>