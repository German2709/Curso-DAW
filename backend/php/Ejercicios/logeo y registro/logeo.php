<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logeo de cuenta</title>
    <style>
        div {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 25vh;
        }

        p {
            margin: 0px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input[type=submit] {
            cursor: pointer;
            margin-top: 5px;
        }

        input[type=text],[type=password] {
            margin: 5px 0px;
        }

        a{
            color: blue;
        }
    </style>
</head>

<body>
    <div>
        <h1>Inserción de cuenta</h1>
        <?php
        if (isset($_SESSION['createduser'])) {
            echo '<p style="color:green">
                Se ha creado cuenta con exito, porfavor inicia sesión
              </p>';
            // unset hace que se elimine la variable si existe(porque solo se requiere cuando se crea una cuenta)
            unset($_SESSION['createduser']);
        }
        ?>
        <form action="page_login.php" method="post">
            <input type="text" placeholder="Ingrese Usuario o Correo" name="user" require>
            <input type="password" placeholder="Ingrese contraseña" name="password" require>

            <input type="submit" value="Entrar">

            <?php
       if(isset($_GET["fallo"]) && $_GET["fallo"] == 'true')
       {
          echo "<p style='color:red; font-weight: bold;'>Usuario o contraseña invalido </p>";
          unset($_GET["fallo"]);
       }
     ?>

            <a href="registro.php">Crear Cuenta</a>
        </form>
    </div>
</body>

</html>