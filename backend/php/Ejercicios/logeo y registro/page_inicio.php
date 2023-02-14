<?php
session_start();

if (isset($_POST['logout'])) {
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
        body {
            background: linear-gradient(235deg, #FFFFFF 0%, #000F25 100%),
                linear-gradient(180deg, #6100FF 0%, #000000 100%),
                linear-gradient(235deg, #FFA3AC 0%, #FFA3AC 40%, #00043C calc(40% + 1px), #00043C 60%, #005D6C calc(60% + 1px), #005D6C 70%, #00C9B1 calc(70% + 1px), #00C9B1 100%),
                linear-gradient(125deg, #FFA3AC 0%, #FFA3AC 40%, #00043C calc(40% + 1px), #00043C 60%, #005D6C calc(60% + 1px), #005D6C 70%, #00C9B1 calc(70% + 1px), #00C9B1 100%);
            background-blend-mode: soft-light, screen, darken, normal;
            height: 100vh;
            margin: 0;
            overflow: hidden;
        }

        div {
            height: 75%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            font-size: 90px;
            text-transform: uppercase;
        }

        input {
            font-size: 40px;
            text-transform: uppercase;
            padding: 26px 42px;
            border-radius: 25px;
            cursor: pointer;
            background: cornflowerblue;
            border: none;
            color: #FFFFFF;

            position: relative;
            box-shadow: 0 5px 0 0 rgb(180, 180, 180);
        }

        input:hover {
            top: 5px;
            box-shadow: 0 0 0 0 rgb(180, 180, 180);
        }

        @media (width <=580px) {
            h1 {
                margin-top: 50px;
            }

            h1 {
                font-size: 45px;
            }

            input {
                font-size: 15px;
            }
        }
    </style>
</head>

<body onload="Javascript:history.go(1);" onunload="Javascript:history.go(1);">
    <!-- panel de usuario -->
    <div>
        <?php
        if (isset($_SESSION['logged'])) {
            // aqui va el panel/boton/contenido del usuario
            echo "<h1>Bienvenido</h1>
        <a href='panel-user.php'><input type='submit' value='Ir a Cuenta'></a><br>";
            echo "<form action='page_inicio.php' method='post'>
                    <input type='submit' value='Cerrar sesión' name='logout'>
                </form>";
        } else { //si no está logeado, mostrará el boton de conectarse
            echo "<form action='logeo.php'>
                <h1>Bienvenido</h1>
                <input type='submit' value='Conectarse'>
                </form>";
        }
        ?>
    </div>
</body>

</html>