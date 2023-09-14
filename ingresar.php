<?php
if($_POST){
    $usuarioIngresado = $_POST['usuario'];
    $passwordIngresada = md5($_POST['password']);
    $conexion = mysqli_connect('localhost','root','','pokedex',3306) or die ("No se pudo conectar");
    $query = "select  * from usuario where usuario='$usuarioIngresado' and password='$passwordIngresada'";
    $consulta = mysqli_query($conexion, $query) or die ("No se pudo obtener usuario");
    if(mysqli_num_rows($consulta)==0){
        session_start();
        $_SESSION['error'] = "Usuario o password incorrecta";
        header('Location: home.php');
    } else {
        session_start();
        $_SESSION['usuario'] = $usuarioIngresado;
        header('Location: home.php');
    }
    mysqli_close($conexion);
} else{
    header('Location: home.php');
}
exit();
