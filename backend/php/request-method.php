<?php
// Si venimos del boton de cerrar sesion, la destruimos
if (isset($_POST['close'])) {
    session_destroy();
    header("refresh:0");
}

    // preguntamos si el usuario viene del formulario de logeo o si ya ha iniciado sessión
    if ($_SERVER['REQUEST_METHOD']=="POST" || isset($_SESSION['usertype'])) {
        //Iniciamos la sesion
        session_start();

        //Guardamos el tipo de usuario en el array de sesion;
        $_SESSION['usertype']= $_POST['usertype'];

        // si el usuario es admin
        if($_SESSION['usertype'] == "admin"){
            //Mostramos contenido exclusivo del administrador
            echo "Bienvenido, Administrador.";
        } elseif($_SESSION['usertype'] == "user"){
            //Mostramos contenido exclusivo del usuario
            echo "Hola, Usuario.";
        }
        //Fuera del if, podemos poner contenido para todos los tipos de usuarios
        
        // Boton para cerrar la sesion. Debe de ser submit que haga refrescar la pagina
        echo "<form action=" . $_SERVER["PHP_SELF"] . " method = 'post'>
        <input type='submit' name='close' value='Cerrar Sesión'>
        </form>";

    }else{
        //Si hemos venido directamente a esta pagina, seremos redirigidos
        header("Location: request-method-form.php");
        exit();
    }
    ?>
