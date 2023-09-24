<?php
require_once("includes/funciones.php");
$pokedex = new pokedex();
if(isset($_POST["buscarSubmit"])){
    $busqueda = $_POST["busqueda"];
    $_SESSION["listaDePokemones"] = $pokedex->buscarPokemones($busqueda);
}
else{
    $_SESSION["listaDePokemones"] = $pokedex->cargarPokemones();
}
$admin = isset($_SESSION['usuario']);
$listaDePokemones = $_SESSION["listaDePokemones"];
?>
