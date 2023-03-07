<?php
session_start();
if ($_SERVER['REQUEST_METHOD']='POST') {
    //Recibimos las variables del formulario logeo
    include 'union.php';
    $user = $_POST['user'];
    $pass = $_POST['password'];

     //Hacemos la query para buscar si existe un usuario con estos datos
     $sql = "SELECT * FROM usuarios 
     WHERE user = '$user' AND password='$pass'";
     $result = $conn->query($sql);

     echo '<div>';
    if ($result->num_rows > 0) {
        $_SESSION['logged']=true;
        while($row = $result->fetch_assoc()) {
            //Creamos una array $row con los resultados de la query del usuario
            $_SESSION['nombres'] = $row['nombres'];
            $_SESSION['tipo_usuario'] = $row['tipo_usuario'];
            $_SESSION['dni'] = $row['dni']; //primary key
        }
    }
}
?>