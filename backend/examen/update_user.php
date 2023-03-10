<?php
session_start();
include 'union.php';
//cargamos los datos del usuario
if (isset($_SESSION['logged'])) {
    $user = $_POST['modiuser'];
    $sql = "SELECT * FROM usuarios WHERE nombres='$user'";
}
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualización de Datos</title>
</head>
<body>
<h1>Actualizacion de Datos</h1>
    <div>
        <!-- declaramos las variables para la actualizacion de datos -->
        <?php
        while ($row = $result->fetch_assoc()) {
            $dni = $row['dni'];
            $user = $row['nombres'];
            $password = $row['contraseña'];
            $mac= $row['mac'];
            $bio= $row['biometrica'];
            $foto= $row['foto_dni'];
            $user_type = $row['tipo_usuario'];
            $user1 = 'usuario';
            $user2 = 'colaborador';
            $user3 = 'admin';
            $disabled = 'hidden';
            // condicional segun tipo de usuario
            if ($user_type == 'admin') {
                $user1 = 'colaborador';
                $user2 = 'colaborador';
                $disabled = 'hidden';
            }elseif($user_type == 'colaborador'){
                $user1 = 'colaborador';
                $user2 = 'usuario';
                $disabled = 'hidden';
            }
            // se vincula el php donde muestra un formulario distinto segun el tipo de usuario
             include 'form_update.php';
        }
        
        ?>
    </div>
</body>

</html>