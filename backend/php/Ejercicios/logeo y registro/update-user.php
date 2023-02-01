<?php
session_start();
include 'union.php';
//cargamos los datos del usuario
if (isset($_SESSION['logged'])) {
    // $user = $_SESSION['username'];
    $user = $_POST['modiuser'];
    $sql = "SELECT * FROM usuarios WHERE user='$user'";
}
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar/actualizar</title>
</head>
<style>
    body{
        margin-top: 25vh;
    }
    h1,div{
        text-align: center;
    }
</style>
<body>
    <h1>Actulizacion de Datos</h1>
    <div>
        <?php
        while ($row = $result->fetch_assoc()) {
            $user = $row['user'];
            $email = $row['email'];
            $password = $row['password'];
            $typeuser = $row['type_user'];
            $user1 = 'user';
            $user2 = 'admin';
            if ($typeuser == 'admin') {
                $user1 = 'admin';
                $user2 = 'user';
            }
            echo "<form action='updatebd.php' method='post'>
                    <input type='text' name='user' value='$user'>
                    <input type='text' name='email' value='$email'>
                    <input type='text' name='password' value='$password'>
                    <select name='type_user'>
                        <option value='$user1' selected>$user1</option>
                        <option value='$user2'>$user2</option>
                    </select>
                    <input type='hidden' name='modiuser' value='$user'>
                    <input type='submit' value='Actualizar'>
                </form><br>";
        }


        ?>
    </div>
</body>

</html>