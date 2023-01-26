<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registro de cuenta</title>
    <style>
        div {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 25vh;
        }
        input[type=text],[type=password] {
            margin: 5px 0px;
        }
        input[type=submit]{
            cursor: pointer;
        }
    </style>
</head>
<body>
<div>
        <h1>Formulario para registro de cuenta</h1>
        <form action="datosbd.php" method="post">
            <input type="text" placeholder="Usuario" name="user" require><br>
            <input type="email" placeholder="Email" name="email" require><br>
            <input type="password" placeholder="Contraseña" name="password" require><br>

            <input type="submit" value="Enviar">
        </form>
    </div>
</body>
</html>