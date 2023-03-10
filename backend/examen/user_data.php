<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] = 'POST') {
    //Recibimos las variables del formulario logeo
    include 'union.php';
    if (isset($_POST['user'])) {
        $user = $_POST['user'];
        $pass = $_POST['password'];


        //Hacemos la query para buscar si existe un usuario con estos datos
        $sql = "SELECT * FROM usuarios 
     WHERE nombres = '$user' AND contraseña ='$pass'";
        $result = $conn->query($sql);

        echo '<div>';
        if ($result->num_rows > 0) {
            $_SESSION['logged'] = true;
            while ($row = $result->fetch_assoc()) {
                //Creamos una array $row con los resultados de la query del usuario
                $_SESSION['nombres'] = $row['nombres'];
                $_SESSION['tipo_usuario'] = $row['tipo_usuario'];
                $_SESSION['dni'] = $row['dni']; //primary key

            }
            
        } else {
            header("Location: logeo.php?fallo=true");
        }
    }
    include 'panel_type.php';
}
if (isset($_SESSION['update'])) {
    echo "<p style='color:green; font-weight: bold;'>Datos Actualizados con exito</p>";
    unset($_SESSION['update']);
}
?>
<link rel="stylesheet" href="css/user_data.css">
<table>
    <tr>
        <th>DNI</th>
        <th>Usuario</th>
        <th>Contraseña</th>
        <th>Dirección MAC</th>
        <th>Biometrica</th>
        <th>Foto del DNI</th>
        <th>Tipo de usuario</th>
        <th>Actualización</th>
    </tr>

    <?php
    //contenido de la tabla
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr> <td>" . $row['dni'] . "</td>" .
                "<td>" . $row['nombres'] . "</td>" .
                "<td>" . $row['contraseña'] . "</td>" .
                "<td>" . $row['mac'] . "</td>" .
                "<td>" . $row['biometrica'] . "</td>" .
                "<td>" . $row['foto_dni'] . "</td>" .
                "<td>" . $row['tipo_usuario'] . "</td>" .
                "<td>" . "<form action='update_user.php' method='post'>
                        <input type='hidden' name='modiuser' value='" . $row['nombres'] . "'>
                        <button class='option' type='submit'><span class='material-symbols-outlined'>
                        drive_file_rename_outline
                        </span></button></form>" . "</td> </tr>";
        }
    }
    
    ?>
</table>
<a href="logeo.php">
    <button class="btn">Cerrar Sesión</button>
</a>