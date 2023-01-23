<?php
include 'conn.php';
$user = $_POST['user'];
$email = $_POST['email'];

//CREAMOS LA QUERY PARA GUARDAR LOS DATOS
$sql = "INSERT INTO usuarios (user,email)
    VALUES('$user','$email')";

//EJECUTAMOS LA QUERY Y COMPROVAMOS SI HA SIDO EXTITOSO
if($conn->query($sql) === TRUE) {
    echo 'Datos guardados con exito';
} else{
    echo "Error: " .$sql . "<br>" . $conn->error;
}

//Cerramos la conexión con la BD
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
</head>
<body>
    <p>Bienvenido,<?php echo $user;?>.</p>
    <p>Tu email es: <?php echo $email;?>.</p>
</body>
</html>