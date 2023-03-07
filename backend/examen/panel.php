<?php
include 'union.php';

if (isset($_SESSION['logged']) && $_SESSION['tipo_usuario'] == 'admin') {
    $sql = "SELECT * FROM usuarios";
}elseif (isset($_SESSION['logged']) && $_SESSION['tipo_usuario'] == 'usuario') {
    $dni = $_SESSION['dni'];
    $sql = "SELECT * FROM usuarios WHERE dni='$dni'";
}elseif (isset($_SESSION['logged']) && $_SESSION['tipo_usuario'] == 'colabodaror') {
    $dni = $_SESSION['dni'];
    $sql = "SELECT * FROM usuarios WHERE dni='$dni'";
}
$result = $conn->query($sql);

?>