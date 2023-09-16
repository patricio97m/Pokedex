<?php
session_start();
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
<main>
    <?php
        if(isset($_SESSION["errorBusqueda"])){
            $errorBusqueda = $_SESSION["errorBusqueda"];
            echo "<h2 class='alert alert-danger' role='alert'>$errorBusqueda</h2>";
            unset($_SESSION["errorBusqueda"]);
        }
    ?>

    <table class="table table-light table-hover table-bordered mt-3">
        <thead>
        <tr>
            <th scope="col">Foto</th>
            <th scope="col">Tipo</th>
            <th scope="col">Número pokedex</th>
            <th scope="col">Nombre</th>
            <?php if ($admin) {
                echo "<th scope='col'>Acciones</th>";
            } ?>
        </tr>
        </thead>
        <tbody>
        <?php
            $pokedex->listarPokemones($admin, $listaDePokemones);
            unset($_SESSION["listaDePokemones"]);
        ?>
        </tbody>
    </table>
    <?php if ($admin): ?>
        <div class='d-grid gap-2'>
            <a href='nuevo-pokemon.php' class='btn btn-outline-success'>Nuevo Pokémon</a>
        </div>
    <?php endif; ?>
</main>

<?php include("includes/footer.php"); ?>
</body>
</html>
