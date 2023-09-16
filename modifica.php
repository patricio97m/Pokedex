<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: home.php');
    exit();
}
if(isset($_GET['numPokemon'])&&$_GET['numPokemon']!=""){
    include ("includes/cargarPokemon.php");
} else {
    header('Location: home.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous"/>
    <link rel="stylesheet" href="./css/style.css" />
    <title>Pokédex</title>
  </head>
  <body>
    <?php include("includes/header.php"); ?>

    <main class="container">
        <h2>Subir un nuevo Pokémon</h2>
        <form action="graba_modificacion.php" method="post" enctype="multipart/form-data">
            <div class="form-group mb-3">
                <label for="numero">Número Identificador:</label>
                <input type="hidden" class="form-control" id="codigoPokemon" name="codigoPokemon" value="<?= $pokemon[0]['codigoPokemon']?>">
                <input type="number" class="form-control" id="numero" name="numero" required value="<?= $pokemon[0]['numeroPokedex']?>">
            </div>
            <div class="form-group mb-3">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required value="<?= $pokemon[0]['nombre']?>">
            </div>
            <div class="form-group mb-3">
                <label for="tipos">Tipos (mínimo 1, máximo 2):</label>
                <?php
                foreach ($tiposPokemon as $tipos){
                    ?>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="tipo_<?=$tipos['codigo']?>" name="tipos[]" value="<?=$tipos['codigo']?>"
                            <?php
                        foreach ($pokemon[0]["tipos"] as $tipo) {
                            if($tipo == $tipos['codigo']){
                                echo "checked"
                                ?>
                                <?php
                            }
                        }
                        ?>>
                        <label class="form-check-label" for="tipo_<?=$tipos['codigo']?>"><?=$tipos['nombre']?></label>

                    </div>
                <?php
                }
                ?>
            </div>
            <div class="form-group mb-3">
                <label for="imagen">Imagen:</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="imagen" name="imagen" accept="image/*">
                    <label class="custom-file-label" for="imagen">Seleccionar archivo</label>
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="descripcion">Descripción:</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="4" required><?= $pokemon[0]['descripcion']?></textarea>
            </div>
            <button type="submit" class="btn btn-outline-success">Guardar pokémon</button>
        </form>
    </main>
    <?php include("includes/footer.php"); ?>
  </body>
</html>
