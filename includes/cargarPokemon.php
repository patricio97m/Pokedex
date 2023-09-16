<?php
require_once("includes/funciones.php");
$pokedex = new pokedex();
$codigoPokemon = $_GET['numPokemon'];
$pokemon = $pokedex->cargarPokemon($codigoPokemon);
$tiposPokemon = $pokedex->tiposPokemon();
if(empty($pokemon)){
    header('Location: home.php');
    exit();
}
?>
