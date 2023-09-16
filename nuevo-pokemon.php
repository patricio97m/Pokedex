<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: home.php');
    exit();
}
include ("includes/buscarPokemon.php");
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
        <?php
            if(isset($_SESSION["errorAlta"])){
                $resultado = $_SESSION["errorAlta"];
                echo "<h2 class='alert alert-danger' role='alert'>$resultado</h2>";
                unset($_SESSION["errorAlta"]);
            }
            elseif (isset($_SESSION["successAlta"])){
                $resultado = $_SESSION["successAlta"];
                echo "<h2 class='alert alert-success' role='alert'>$resultado</h2>";
                unset($_SESSION["successAlta"]);
            }
        ?>
        
        <h2>Subir un nuevo Pokémon</h2>
        <form action="alta.php" method="post" enctype="multipart/form-data">
            <div class="form-group mb-3">
                <label for="numero">Número Identificador:</label>
                <input type="number" class="form-control" id="numero" name="numero" required>
            </div>
            <div class="form-group mb-3">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group mb-3">
                <label for="tipos">Tipos:</label>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="Fuego" name="tipos[]" value="1">
                    <label class="form-check-label" for="Fuego">Fuego</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="Planta" name="tipos[]" value="2">
                    <label class="form-check-label" for="Planta">Planta</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="Bicho" name="tipos[]" value="3">
                    <label class="form-check-label" for="Vicho">Veneno</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="Volador" name="tipos[]" value="4">
                    <label class="form-check-label" for="Volador">Volador</label>
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="imagen">Imagen:</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="imagen" name="imagen" accept="image/*" required>
                    <label class="custom-file-label" for="imagen">Seleccionar archivo</label>
                </div>
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
