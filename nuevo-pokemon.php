<?php
session_start();
if(!isset($_SESSION['usuario'])){
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
    <?php include("includes/headerAdmin.php"); ?>

    <main class="container">
        <h2>Subir un nuevo Pokémon</h2>
        <form action="procesar_formulario.php" method="post" enctype="multipart/form-data">
            <div class="form-group mb-3">
                <label for="numero">Número Identificador:</label>
                <input type="number" class="form-control" id="numero" name="numero" required>
            </div>
            <div class="form-group mb-3">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group mb-3">
                <label for="tipos">Tipos (mínimo 1, máximo 2):</label>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="tipoFuego" name="tipos[]" value="Fuego">
                    <label class="form-check-label" for="tipoFuego">Fuego</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="tipoAgua" name="tipos[]" value="Agua">
                    <label class="form-check-label" for="tipoAgua">Agua</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="tipoPlanta" name="tipos[]" value="Planta">
                    <label class="form-check-label" for="tipoPlanta">Planta</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="tipoBicho" name="tipos[]" value="Bicho">
                    <label class="form-check-label" for="tipoBicho">Bicho</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="tipoVolador" name="tipos[]" value="Volador">
                    <label class="form-check-label" for="tipoVolador">Volador</label>
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="imagen">Imagen:</label>
                <input type="file" class="form-control-file" id="imagen" name="imagen" accept="image/*" required>
            </div>
            <div class="form-group mb-3">
                <label for="descripcion">Descripción:</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-outline-success">Guardar pokémon</button>
        </form>
    </main>

    <?php include("includes/footer.php"); ?>
  </body>
</html>
