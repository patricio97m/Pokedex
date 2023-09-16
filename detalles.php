<?php
session_start();
if (isset($_GET['numero_pokemon'])) {
$numeroPokemon = $_GET['numero_pokemon'];
$listaDePokemones = $_SESSION['datos_para_detalles'];

$pokemonEncontrado = null;
foreach ($listaDePokemones as $pokemon) {
    if ($pokemon["numero"] == $numeroPokemon) {
        $pokemonEncontrado = $pokemon;
        break;
    }
}
include ("includes/buscarPokemon.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous"/>
    <link rel="stylesheet" href="./css/style.css"/>
    <title>Pokédex</title>
</head>
<body>
<?php include("includes/header.php"); ?>

<main class="container mt-4 mx-auto">
    <div class="row">
        <?php
        if ($pokemonEncontrado) {
            $nombrePokemon = $pokemonEncontrado['nombre'];
            $numeroPokedex = $pokemonEncontrado['numeroPokedex'];
            $imagenPokemon = "./img/pokemon/" . $nombrePokemon . ".png";

            echo "<div class='col-md-4 bg-light rounded'>
                            <img src='$imagenPokemon' alt='$nombrePokemon' class='img-fluid'>
                        </div>
                        <div class='col-md-8'>
                            <h2>";

            foreach ($pokemonEncontrado["tipos"] as $tipo) {
                $imagenTipo = "./img/tipos/Tipo_" . $tipo . ".webp";
                echo "<img src='$imagenTipo' alt='$tipo'>";
            }

            echo " | $nombrePokemon <b>#$numeroPokedex</b></h2>
                            <p>{$pokemonEncontrado['descripcion']}</p>
                        </div>";
        } else {
            echo "<div class='col-md-12'><p>Pokémon no encontrado. <a href='home.php' class='text-decoration-none'>Volver al inicio.</a></p></div>";
        }
        } else {
            echo "<div class='col-md-12'><p>Número de Pokémon no especificado.</p></div>";
        }
        ?>
    </div>
</main>

<?php include("includes/footer.php"); ?>
</body>
</html>