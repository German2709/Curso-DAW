<?php
session_start();

if(isset($_POST['logout'])){
    unset($_SESSION['logged']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Principal</title>
    <style>
        div{
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20vh;
        }
        h1{
            font-size: 70px;
        }
        input{
            font-size: 50px;
            border-radius: 25px;
            cursor: pointer;
            margin: 15px;
        }
    </style>
</head>
<body>
    <!-- panel de usuario -->
    <div>
    <?php
    if (isset($_SESSION['logged'])) {
        // aqui va el panel/boton/contenido del usuario
        echo "<h1>Bienvenido</h1>
        <a href='panel-user.php'><input type='submit' value='Ir a Cuenta'></a>";
        echo "<form action='page_inicio.php' method='post'>
        <input type='submit' value='Cerrar sesión' name='logout'>
        </form>";
    }else{ //si no está logeado, mostrará el boton de conectarse
    echo "<form action='logeo.php'>
        <h1>Bienvenido</h1>
        <input type='submit' value='Conectarse'>
    </form>";
    }
    ?>
    </div>
</body>
</html>