<?php
require("union.php");
$username = $_REQUEST['term'];

//Voy hacer una lista de todos los usuarios
$sql = "SELECT user FROM usuarios WHERE user LIKE '$username' OR email LIKE '$username'";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    echo 'true';
}else echo 'false';