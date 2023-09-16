<?php
session_start();
require_once("includes/funciones.php");
$pokedex = new pokedex();
if(isset($_GET['numPokemon'])&&$_GET['numPokemon']!=""&&isset($_SESSION['usuario'])){
    $resultado = $pokedex->bajaPokemon($_GET['numPokemon']);
    if (!$resultado){
        $_SESSION['error'] = "No se pudo eliminar pokemon";
    }else{
        $_SESSION['success'] = $resultado;
    }
}
header('Location: home.php');
exit();
