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

    <main class="container mt-4 mx-auto">
        <div class="row">
            <div class="col-md-4 bg-light rounded">
                <img src="./img/pokemon/bulbasaur.png" alt="bulbasaur" class="img-fluid">
            </div>
            <!-- Información del Pokémon -->
            <div class="col-md-8">
                <h2><img src="./img/tipos/Tipo_planta.webp" alt="tipo1"><img src="./img/tipos/Tipo_veneno.webp" alt="tipo2"> | Bulbasaur</h2>
                <p>
                    Bulbasaur es un Pokémon cuadrúpedo de color verde y manchas más oscuras de formas geométricas. Su cabeza representa cerca de un tercio de su cuerpo. En su frente se ubican tres manchas que pueden cambiar dependiendo del ejemplar. Tiene orejas pequeñas y puntiagudas. Sus ojos son grandes y de color rojo. Las patas son cortas con tres garras cada una. Este Pokémon tiene plantado un bulbo en el lomo desde que nace. Esta semilla crece y se desarrolla a lo largo del ciclo de vida de Bulbasaur a medida que suceden sus evoluciones.
                </p>
            </div>
        </div>
    </main>

    <?php include("includes/footer.php"); ?>
  </body>
</html>
