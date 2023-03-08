<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
</head>

<body>
    <div>
        <h1>INGRESA USUARIO</h1>
        <form action="user_data.php" method="post">
            <input type="text" name="user" placeholder="Nombre de Usuario" required>
            <div class="pass">
                <input type="password" name="password" placeholder="Ingresa Contraseña" required>
                <button type="button" class="eye" onclick="verpass()">
                    <span class="material-symbols-outlined">visibility</span></button>
            </div>
            <input type="submit" value="Entrar">
            <?php
                if (isset($_GET["fallo"]) && $_GET["fallo"] == 'true') {
                    echo "<p style='color:red; font-weight: bold;'>Usuario o contraseña invalido.<br> o no existe</p>";
                    unset($_GET["fallo"]);
                }
                ?>
        </form>
    </div>
</body>

</html>