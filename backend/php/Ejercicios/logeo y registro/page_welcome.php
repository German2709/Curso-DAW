<title>Bienvenida</title>
<style>
    body {
        background: linear-gradient(90deg, #efd5ff 0%, #515ada 100%);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    div {
        /* border: 1px solid black; */
        text-align: center;
        height: 500px;
    }
    p{
        font-size: 50px;
        /* text-align: center; */
    }
    /* button{
        
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
        // Si hay un resultado, es que hay una cuenta con esos datos
        echo '<p>Has iniciado sesión con éxito</p>';
        echo "<p>Bienvenido, $user</p>";

        $_SESSION['logged'] = true;
        while ($row = $result->fetch_assoc()) {
            //Creamos una array $row con los resultados de la query del usuario
            $_SESSION['username'] = $row['user']; //primary key
            $_SESSION['type_user'] = $row['type_user'];
        }
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