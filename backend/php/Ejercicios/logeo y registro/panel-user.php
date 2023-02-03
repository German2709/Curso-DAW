<?php
session_start();
include 'union.php';
if(isset($_SESSION['logged']) && $_SESSION['type_user']=='admin'){
    $sql = "SELECT * FROM usuarios";   
}elseif (isset($_SESSION['logged']) && $_SESSION['type_user']=='user') {
    $user = $_SESSION['username'];
    $sql = "SELECT * FROM usuarios WHERE user='$user'";
}
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos de cuentas</title>

    <style>
        body{
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
            display: flex;
            align-items: center;
            flex-direction: column;
        }
        table{
            border: 2px solid black;
            border-collapse: collapse;
        }
        th{
            background-color: #aabbcc;
            border: 2px solid black;
            padding: 2px 5px;
        }
        td{
            border: 1px solid black;
            padding: 2px 5px;
        }
    </style>
</head>
<body>
    <h1>Tabla de los usuarios de la BD</h1>
    <table>
        <tr>
            <th>Usuario</th>
            <th>Email</th>
            <th>Contraseña</th>
            <th>Tipo de usuario</th>
            <th colspan="2">Opciones</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // imprimir los datos de cada fila
            while ($row = $result->fetch_assoc()){
                echo "<tr> <td>" . $row['user']. "</td>".
                        "<td>" . $row['email']. "</td>".
                        "<td>" . $row['password']. "</td>".
                        "<td>" . $row['type_user']. "</td>".

                        "<td>" . "<form action='update-user.php' method='post'>
                        <input type='hidden' name='modiuser' value='".$row['user']."'>
                        <input type='submit' value='Modificar'></form>". "</td>".

                        "<td>" . "<form action='delete-user.php' method='post' onsubmit='return confirmation()'>
                        <input type='hidden' name='deletuser' value='".$row['user']."'>
                        <a ><input type='submit' value='Eliminar'></form>". "</td> </tr>";
            }
            if (isset($_SESSION['update'])) {
                echo "<p style='color:green; font-weight: bold;'>Datos Actualizados con exito</p>";
                unset($_SESSION['update']);
            }
            elseif (isset($_SESSION['delete'])) {
                echo "<p style='color:red; font-weight: bold;'>Datos Eliminados con exito</p>";
                unset($_SESSION['delete']);
            }
            
        }
        ?>
    </table><br>
    <a href="page_inicio.php">
            <button>Regresar al inicio</button>
        </a>
</body>
<script type="text/javascript">
function confirmation() {
    if(confirm("Realmente desea eliminar?"))
    {
        return true;
    }
    return false;
}
</script>
</html>