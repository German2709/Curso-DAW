<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variables Globales</title>
</head>
<body>
    <h1>Variables Globales</h1>
    <p>
        Son variables accesibles desde cualquier punto del codigo, función, archivo... sin necesidad de hacer nada particular.
    </p>
    <h2>$GLOBALS</h2>
    <p>
        Es una array donde podemos almacenar variables que queremos que tengan propiedad global. Se puede acceder a estar mediante <code>$GLOBALS[index]</code> 
    </p>
    <!-- Ejemplo: -->
    <?php
    $x = 75;
    $y = 25;

    function suma(){
        $GLOBALS['z'] = $GLOBALS['x'] + $GLOBALS['y'];
    }
    suma();
    echo $z;
    ?>

    <hr>
    <h2>$_SESSION</h2>
    <p>
        Array global que se usa para guardar información que vamos a utilizar en multiples paginas. No guarda información en el navegador, a diferencias que las cookies.
    </p>
    <p>
        Por lo tanto estas variables se perderan al cerrar el navegador.
    </p>

</body>
</html>