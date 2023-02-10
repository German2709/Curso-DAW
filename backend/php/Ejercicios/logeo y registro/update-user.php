<?php
session_start();
include 'union.php';
//cargamos los datos del usuario
if (isset($_SESSION['logged'])) {
    // $user = $_SESSION['username'];
    $user = $_POST['modiuser'];
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
    <title>Modificar/actualizar</title>
</head>
<style>
    body {
        margin-top: 20vh;
        background: linear-gradient(135deg, #8BC6EC 0%, #9599E2 100%);
        height: 100vh;

        display: flex;
        flex-direction: column;
        align-items: center;
    }

    h1{
        font-size: 50px;    
    }

    div {
        text-align: center;
        box-shadow: rgba(0, 0, 0, 0.17) 0px -23px 25px 0px inset,
            rgba(0, 0, 0, 0.15) 0px -36px 30px 0px inset,
            rgba(0, 0, 0, 0.1) 0px -79px 40px 0px inset,
            rgba(0, 0, 0, 0.06) 0px 2px 1px, rgba(0, 0, 0, 0.09) 0px 4px 2px,
            rgba(0, 0, 0, 0.09) 0px 8px 4px, rgba(0, 0, 0, 0.09) 0px 16px 8px,
            rgba(0, 0, 0, 0.09) 0px 32px 16px;
        border-radius: 20px;
        border: 1px solid;
        width: 30%;
        height: 450px;
    }

    form {
        display: flex;
        flex-direction: column;
        align-items: center;

        margin-top: 55px;
    }

    .data {
        margin: 7px;
        font-size: 24px;
        width: 300px;
        padding: 0 25px 5px 5px;
        border-radius: 14px;
    }

    select {
        margin: 10px;
        padding: 5px 17px;
        width: 200px;
        font-size: 24px;
        border-radius: 14px;
    }

    .update {
        margin-top: 25px;
        align-items: center;
        background-image: linear-gradient(144deg, #AF40FF, #5B42F3 50%, #00DDEB);
        border: 0;
        border-radius: 8px;
        box-shadow: rgba(151, 65, 252, 0.2) 0 15px 30px -5px;
        box-sizing: border-box;
        color: #FFFFFF;
        display: flex;
        font-family: Phantomsans, sans-serif;
        font-size: 20px;
        justify-content: center;
        line-height: 1em;
        max-width: 100%;
        min-width: 140px;
        padding: 3px;
        text-decoration: none;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        white-space: nowrap;
        cursor: pointer;
    }

    .update:active,
    .update:hover {
        outline: 0;
    }

    .update span {
        background-color: rgb(5, 6, 45);
        padding: 16px 24px;
        border-radius: 6px;
        width: 100%;
        height: 100%;
        transition: 300ms;
    }

    .update:hover span {
        background: none;
    }

    @media (min-width: 768px) {
        .update {
            font-size: 24px;
            min-width: 196px;
        }
    }
</style>

<body>
    <h1>Actualizacion de Datos</h1>
    <div>
        <?php
        while ($row = $result->fetch_assoc()) {
            $user = $row['user'];
            $email = $row['email'];
            $password = $row['password'];
            $typeuser = $row['type_user'];
            $user1 = 'user';
            $user2 = 'admin';
            $disabled = 'hidden';
            if ($typeuser == 'admin') {
                $user1 = 'admin';
                $user2 = 'user';
                $disabled = '';
            }elseif($typeuser == 'user'){
                $user1 = 'user';
                
            }
            echo "<form action='updatebd.php' method='post'>
                    <input class='data' type='text' name='user' value='$user'>
                    <input class='data' type='text' name='email' value='$email'>
                    <input class='data' type='text' name='password' value='$password'>
                    <select " . $disabled . " name='type_user'>
                        <option value='$user1' selected>$user1</option>
                        <option " . $disabled . " value='$user2'>$user2</option>
                    </select>
                    <input type='hidden' name='modiuser' value='$user'>
                    <button class='update' type='submit'><span>Actualizar</span></button>
                </form><br>";
        }if(isset($_GET["duplicado"]) && $_GET["duplicado"] == 'true'){
            echo "<p style='color:red; font-weight: bold;'>Datos ya existentes</p>";
                unset($_GET["duplicado"]);
        }


        ?>
    </div>
</body>

</html>