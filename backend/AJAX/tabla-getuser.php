<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tabla-getUser</title>
</head>
<style>
     table {
            border: 2px solid black;
            border-collapse: collapse;
        }

        th {
            background-color: #aabbcc;
            border: 2px solid black;
            padding: 2px 5px;
        }

        td {
            border: 1px solid black;
            padding: 2px 5px;
            font-family: Verdana;
            user-select: none;
        }
        tr:hover{
            background-color: lightblue;
        }
</style>
<body>
    <?php
        // recogemos la variable enviada por el GET
        $q = $_GET['q'];

        // realizamos la conexion a la BD
        $conn = mysqli_connect('localhost','root','zaicer');

        mysqli_select_db($conn,'logeo_registro');
        $sql = "SELECT * FROM usuarios WHERE user LIKE '%$q%' OR email LIKE '%$q%' ORDER BY id ASC";

        $result = mysqli_query($conn, $sql);

        // Imprimimos los datos en una tabla
       echo "<br><table>
        <tr>
            <th>Nombre de Usuario</th>
            <th>Email</th>
            <th>Permisos</th>
        </tr>";
        //contenido de la tabla
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>" . $row['user'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['type_user'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";

        mysqli_close($conn);
    ?>
</body>
</html>