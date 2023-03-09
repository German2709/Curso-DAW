<?php
session_start();
include 'union.php';
//cargamos los datos del usuario
if (isset($_SESSION['logged'])) {
    // $user = $_SESSION['username'];
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
        <?php
        while ($row = $result->fetch_assoc()) {
            $user = $row['nombres'];
            $password = $row['contraseña'];
            $mac= $row['mac'];
            $bio= $row['biometrica'];
            $foto= $row['foto_dni'];
            $user_type = $row['tipo_usuario'];
            $user1 = 'usuario';
            $user2 = 'colaborador';
            // $user3 = 'admin';
            $disabled = 'hidden';
            if ($user_type == 'admin') {
                $user1 = 'colaborador';
                $user2 = 'usuario';
                $disabled = '';
            }elseif($user_type == 'usuario'){
                $user1 = 'usuario';
            }elseif($user_type == 'colaborador'){
                $user1 = 'colaborador';
            }
            include 'form_update.php';
        }
        
        ?>
    </div>
</body>
</html>