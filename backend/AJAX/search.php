<?php
require("union.php");

$text = $_REQUEST['term'];

//Voy hacer una lista de todos los usuarios
$sql = "SELECT user FROM usuarios WHERE user LIKE '$text' OR email LIKE '$text'";
$result = $conn->query($sql);

//declaro un array en el que se guarde la lista de los usuarios
$array[] = '';

if ($result -> num_rows > 0) {
    while ($row = $result -> fetch_assoc()){
        $array[] = $row['user'];
    }
}

foreach ($array as $user) {
    // cada item del array se imprimirá seguido de un br, formando una lista
    echo $user . '<br>';
}
?>