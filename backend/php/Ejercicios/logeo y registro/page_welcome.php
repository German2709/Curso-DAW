<head>
  <meta http-equiv="Expires" CONTENT="0">
  <meta http-equiv="Cache-Control" CONTENT="no-cache">
  <meta http-equiv="Pragma" CONTENT="no-cache">
</head>
<title>Bienvenida</title>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Mochiy+Pop+One&display=swap');

    body {
        background: linear-gradient(90deg, #efd5ff 0%, #515ada 100%);
    }

    div {
        text-align: center;
        height: 700px;
        font-family: 'Mochiy Pop One', sans-serif;

        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }

    p {
        margin: 0;
        font-size: 80px;
    }

    button {
        align-self: center;
        background-color: #fff;
        background-image: none;
        background-position: 0 90%;
        background-repeat: repeat no-repeat;
        background-size: 4px 3px;
        border-radius: 15px 225px 255px 15px 15px 255px 225px 15px;
        border-style: solid;
        border-width: 2px;
        box-shadow: rgba(0, 0, 0, .2) 15px 28px 25px -18px;
        box-sizing: border-box;
        color: #41403e;
        cursor: pointer;
        display: inline-block;
        font-family: 'Mochiy Pop One', sans-serif;
        font-size: 2rem;
        line-height: 53px;
        outline: none;
        padding: .75rem;
        margin-top: 25px;
        text-decoration: none;
        transition: all 235ms ease-in-out;
        border-bottom-left-radius: 15px 255px;
        border-bottom-right-radius: 225px 15px;
        border-top-left-radius: 255px 15px;
        border-top-right-radius: 15px 225px;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
    }

    button:hover {
        box-shadow: rgba(0, 0, 0, .3) 2px 8px 8px -5px;
        transform: translate3d(0, 2px, 0);
    }

    button:focus {
        box-shadow: rgba(0, 0, 0, .3) 2px 8px 4px -6px;
    }

    /* @media (max-width: 600px){
        p{
           font-size: 80px;
        }
    } */
</style>
<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] = 'POST') {
    // Recibimos las variables del form
    include 'union.php';
    $user = $_POST['user'];
    $password = $_POST['password'];

    //Hacemos la query para buscar si existe un usuario con estos datos
    $sql = "SELECT * FROM usuarios 
    WHERE (user = '$user' OR email = '$user') 
    AND password='$password'";
    $result = $conn->query($sql);
    echo '<div>';
    if ($result->num_rows > 0) {
        $_SESSION['logged'] = true;
        while ($row = $result->fetch_assoc()) {
            //Creamos una array $row con los resultados de la query del usuario
            $_SESSION['username'] = $row['user'];
            $_SESSION['type_user'] = $row['type_user'];
            $_SESSION['id'] = $row['id']; //primary key
        }
        $user1 =  $_SESSION['username'];
        // Si hay un resultado, es que hay una cuenta con esos datos
        echo '<p>Has iniciado sesión</p>';
        echo "<p>Bienvenido <br> $user1 </p>";

        //redirigir
        echo '<a href="page_inicio.php">
                <button>Pagina Principal</button>
            </a>';
    } else {
        header("Location: logeo.php?fallo=true");
    }
    echo '</div>';
}
?>

