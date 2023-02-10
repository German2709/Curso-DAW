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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap');

        body {
            background: rgb(13, 8, 110);
            background: linear-gradient(90deg, rgba(13, 8, 110, 1) 0%, rgba(165, 165, 247, 1) 50%, rgba(47, 156, 179, 1) 100%);

            display: flex;
            justify-content: center;
            align-items: center;

            height: 100vh;
        }

        .container {
            background: cornflowerblue;

            display: flex;
            flex-direction: column;
            align-items: center;

            border-radius: 10px;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;

            width: 350px;
            height: 550px;
        }

        h1 {
            font-family: 'Roboto', sans-serif;
            color: #2c409f;
            margin-top: 80px;
            text-align: center;
            width: 50%;
        }

        p {
            margin-top: 15px;
        }

        .login {
            display: flex;
            flex-direction: column;
        }

        input[type=submit] {
            cursor: pointer;
            margin: 5px 0 10PX;
            border-radius: 7px;
            border: none;
            padding: 5px 8px;

            background-color: rgba(86, 52, 217, 1);
            position: relative;
            box-shadow: rgba(140, 46, 270, 0.4) 0px 5px, rgba(140, 46, 270, 0.3) 0px 10px, rgba(140, 46, 270, 0.2) 0px 15px, rgba(140, 46, 270, 0.1) 0px 20px, rgba(140, 46, 270, 0.05) 0px 25px;
        }

        input[type=submit]:hover {
            top: 10px;
            box-shadow: none;
        }

        input[type=text],
        [type=password] {
            margin: 5px 0px;
            border: none;
            border-radius: 12px;
            padding: 7px 20px;

            font-family: 'Roboto', sans-serif;
            color: black;
            font-weight: bold;

            position: relative;
        }

        .eye{
            background: none;
            border: none;
            cursor: pointer;

            position: absolute;
            transform: translate(-100%,25%);
        }

        a {
            font-family: 'Roboto', sans-serif;
            margin-top: 5px;
            color: blue;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>INGRESAR CUENTA</h1>
        <?php
        if (isset($_SESSION['createduser'])) {
            echo '<p style="color:green">
                Se ha creado cuenta con exito, porfavor inicia sesión
              </p>';
            // unset hace que se elimine la variable si existe(porque solo se requiere cuando se crea una cuenta)
            unset($_SESSION['createduser']);
        }
        ?>
        <form class="login" action="page_welcome.php" method="post">
            <input type="text" placeholder="Ingrese Usuario o Correo" name="user" required>
            <div class="pass">
                <input ID="txtPassword" type="password" placeholder="Ingrese contraseña" name="password" required>
                <button type="button" class="eye" onclick="mostrarPassword()">
                <span class="material-symbols-outlined">visibility</span></button>
            </div>

            <input type="submit" value="Entrar">

            <?php
            if (isset($_GET["fallo"]) && $_GET["fallo"] == 'true') {
                echo "<p style='color:red; font-weight: bold;'>Usuario o contraseña invalido.<br> o no existe</p>";
                unset($_GET["fallo"]);
            }
            ?>

            <a href="registro.php">Crear Cuenta</a>
        </form>
    </div>
</body>
<script>
    function mostrarPassword(){
		var cambio = document.getElementById("txtPassword");
        let txtchange = document.querySelector(".eye > span");
		if(cambio.type == "password"){
			cambio.type = "text";
			txtchange.innerHTML = "visibility_off";
            return;
		}else{
			cambio.type = "password";
			txtchange.innerHTML = "visibility";
            return;
		}
	}
   
</script>
</html>