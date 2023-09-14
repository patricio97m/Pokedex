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

    <main>
        <table class="table table-light table-hover table-bordered mt-3">
            <thead>
                <tr>
                    <th scope="col">Foto</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Número</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row"><img src="./img/pokemon/bulbasaur.png" alt="poke1" class="imgpoke"></th>
                    <td><img src="./img/tipos/Tipo_planta.webp" alt="tipo" class="imgtipo"><img src="./img/tipos/Tipo_veneno.webp" alt="tipo"></td>
                    <td>#1</td>
                    <td>Bulbasaur</td>
                    <td>
                        <button method="post" action="modificacion.php" class="btn btn-outline-primary ml-2 my-2 my-sm-0" type="submit">Modificación</button>
                        <button method="post" action="baja.php" class="btn btn-outline-danger ml-2 my-2 my-sm-0" type="submit">Baja</button>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><img src="./img/pokemon/ivysaur.png" alt="poke1" class="imgpoke"></th>
                    <td><img src="./img/tipos/Tipo_planta.webp" alt="tipo" class="imgtipo"><img src="./img/tipos/Tipo_veneno.webp" alt="tipo"></td>
                    <td>#2</td>
                    <td>Ivysaur</td>
                    <td>
                        <button method="post" action="modificacion.php" class="btn btn-outline-primary ml-2 my-2 my-sm-0" type="submit">Modificación</button>
                        <button method="post" action="baja.php" class="btn btn-outline-danger ml-2 my-2 my-sm-0" type="submit">Baja</button>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><img src="./img/pokemon/venusaur.png" alt="poke1" class="imgpoke"></th>
                    <td><img src="./img/tipos/Tipo_planta.webp" alt="tipo" class="imgtipo"><img src="./img/tipos/Tipo_veneno.webp" alt="tipo"></td>
                    <td>#3</td>
                    <td>Venusaur</td>
                    <td>
                        <button method="post" action="modificacion.php" class="btn btn-outline-primary ml-2 my-2 my-sm-0" type="submit">Modificación</button>
                        <button method="post" action="baja.php" class="btn btn-outline-danger ml-2 my-2 my-sm-0" type="submit">Baja</button>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="d-grid gap-2">
            <button method="post" action="nuevo-pokemon.php" class="btn btn-outline-success" type="submit">Nuevo pokémon</button>
          </div>
    </main>

    <?php include("includes/footer.php"); ?>
  </body>
</html>
