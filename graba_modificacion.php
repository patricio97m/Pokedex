<?php
session_start();
require_once("includes/funciones.php");
$pokedex = new pokedex();
if($_POST){
    echo "voy a actualizar el pokemon ".$_POST['nombre'];
    $resultado = $pokedex->modificaPokemon($_POST['codigoPokemon'],$_POST['nombre'],$_POST['numero'],$_POST['descripcion'],$_POST['tipos']);
    if (!$resultado){
        $_SESSION['error'] = "No se pudo actualizar pokemon";
    }else{
        $_SESSION['success'] = $resultado;
    }
}
header('Location: home.php');
exit();


