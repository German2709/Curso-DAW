<?php
session_start();
include 'union.php';
if (isset($_SESSION['logged']) && $_SESSION['type_user'] == 'admin') {
    $sql = "SELECT * FROM usuarios";
} elseif (isset($_SESSION['logged']) && $_SESSION['type_user'] == 'user') {
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM usuarios WHERE id='$id'";
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Mochiy+Pop+One&display=swap');

        html,
        body {
            background: linear-gradient(90deg, #e3ffe7 0%, #d9e7ff 100%);
            height: 100vh;
            margin: 0;
        }

        .container {
            overflow-x: auto;
            overflow-y: hidden;

            display: flex;
            align-items: center;
            flex-direction: column;

            text-align: center;
            font-family: 'Mochiy Pop One', sans-serif;
        }

        h1:first-child{
            margin-top: 70px;
        }

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

        .option {
            background: none;
            border: none;
            color: black;
            font-size: 22px;
            text-align: center;
            cursor: pointer;
            position: relative;
        }

        .option:hover {
            top: 5px;
        }


        .btn {
            appearance: none;
            background-color: transparent;
            border: 2px solid #1A1A1A;
            border-radius: 15px;
            box-sizing: border-box;
            color: #3B3B3B;
            cursor: pointer;
            display: inline-block;
            font-family: 'Mochiy Pop One', sans-serif;
            font-size: 16px;
            line-height: normal;
            margin: 0;
            min-height: 60px;
            min-width: 0;
            outline: none;
            padding: 16px 24px;
            text-align: center;
            text-decoration: none;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            width: 100%;
        }

        .btn:disabled {
            pointer-events: none;
        }

        .btn:hover {
            color: #fff;
            background-color: #1A1A1A;
            box-shadow: rgba(0, 0, 0, 0.25) 0 8px 15px;
            transform: translateY(-2px);
        }

        .btn:active {
            box-shadow: none;
            transform: translateY(0);
        }

        @media (width <=580px) {
            h1 {
                font-size: 1em;
                transition: all 1s;
            }

            th,
            td {
                font-size: 12px;
                height: auto;
                transition: all 1s;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Tabla de los usuarios de la BD</h1>
        <?php include 'filtro.php' ?>
        <table>
            <?php
                if (isset($_SESSION['update'])) {
                    echo "<p style='color:green; font-weight: bold;'>Datos Actualizados con exito</p>";
                    unset($_SESSION['update']);

                } elseif (isset($_SESSION['delete'])) {
                    echo "<p style='color:red; font-weight: bold;'>Datos Eliminados con exito</p>";
                    unset($_SESSION['delete']);

                }elseif (isset($_SESSION['createduser'])) {
                    echo '<p style="color:green">
                        Se ha creado cuenta con exito</p>';
                    // unset hace que se elimine la variable si existe(porque solo se requiere cuando se crea una cuenta)
                    unset($_SESSION['createduser']);
                }
            ?>
        </table><br>
        <?php
        if (isset($_SESSION['logged']) && $_SESSION['type_user'] == 'admin') {
            include "registro-simple.php";
        }
        ?>
        <br>
        <a href="page_inicio.php">
            <button class="btn">Regresar al inicio</button>
        </a>
    </div>
</body>
<script type="text/javascript">
    function confirmation() {
        if (confirm("¿Realmente desea eliminar este usuario?")) {
            return true;
        }
        return false;
    }
</script>

</html>