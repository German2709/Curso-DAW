<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registro de cuenta</title>
    <link rel="stylesheet" href="registro.css">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
</head>

<div class="conten">
    <?php include "registro-simple.php" ?><br>
    <!-- <a id="slide">
        Iniciar Sesión
        <div class="logeo" style="display: none;">
            <?php include 'logeo.php' ?></div>
    </a> -->
</div>

</html>
<script>
    $('#slide').click(function() {
        $('.logeo').slideToggle();
    })
</script>