<?php
// recogemos la variable enviada por el GET
$value = $_GET['value'];
$filtro = $_GET['filtro'];

// realizamos la conexion a la BD
$conn = mysqli_connect('localhost', 'root', 'zaicer');

mysqli_select_db($conn, 'logeo_registro');
$sqlsearch = "SELECT * FROM usuarios WHERE $filtro LIKE '%$value%'";

$result = mysqli_query($conn, $sqlsearch);
?>
<br><table>
    <tr>
        <th>Usuario</th>
        <th>Email</th>
        <th>Contraseña</th>
        <th>Tipo de usuario</th>
        <th colspan="2">Opciones</th>
    </tr>

    <?php
    //contenido de la tabla
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr> <td>" . $row['user'] . "</td>" .
                "<td>" . $row['email'] . "</td>" .
                "<td>" . $row['password'] . "</td>" .
                "<td>" . $row['type_user'] . "</td>" .
                "<td>" . "<form action='update-user.php' method='post'>
                        <input type='hidden' name='modiuser' value='" . $row['user'] . "'>
                        <button class='option' type='submit'><i class='fa fa-edit'></i></button></form>" . "</td>" .
                "<td>" . "<form action='delete-user.php' method='post' onsubmit='return confirmation()'>
                        <input type='hidden' name='deletuser' value='" . $row['user'] . "'>
                        <button class='option' type='submit'><i class='fa fa-trash'></i></button></form>" . "</td> </tr>";
        }
    }
    mysqli_close($conn);
    ?>
    </table>