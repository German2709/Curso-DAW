<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
    <form action="request-method.php" method="post">
        <h1>Indica que tipo de usuario eres</h1>
        <select name="usertype">
            <option value="user">Usuario</option>
            <option value="admin">Admin</option>
        </select>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>