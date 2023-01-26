<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Recibir variable</h1>
    <?php
    if (isset($_SESSION['exito'])) {
        echo '<p>
                Se ha recibido la variable con exito
              </p>';
    }

    ?>
</body>
</html>