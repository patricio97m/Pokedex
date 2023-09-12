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
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row"><img src="./img/pokemon/bulbasaur.png" alt="poke1" class="imgpoke"></th>
                    <td><img src="./img/tipos/Tipo_planta.webp" alt="tipo" class="imgtipo"><img src="./img/tipos/Tipo_veneno.webp" alt="tipo"></td>
                    <td>#1</td>
                    <td>Bulbasaur</td>
                </tr>
                <tr>
                    <th scope="row"><img src="./img/pokemon/ivysaur.png" alt="poke2" class="imgpoke"></th>
                    <td><img src="./img/tipos/Tipo_planta.webp" alt="tipo" class="imgtipo"><img src="./img/tipos/Tipo_veneno.webp" alt="tipo"></td>
                    <td>#2</td>
                    <td>Ivysaur</td>
                </tr>
                <tr>
                    <th scope="row"><img src="./img/pokemon/venusaur.png" alt="poke3" class="imgpoke"></th>
                    <td><img src="./img/tipos/Tipo_planta.webp" alt="tipo" class="imgtipo"><img src="./img/tipos/Tipo_veneno.webp" alt="tipo"></td>
                    <td>#3</td>
                    <td>Venusaur</td>
                </tr>
                <tr>
                    <th scope="row"><img src="./img/pokemon/charmander.png" alt="poke4" class="imgpoke"></th>
                    <td><img src="./img/tipos/Tipo_fuego.webp" alt="tipo" class="imgtipo"></td>
                    <td>#4</td>
                    <td>Charmander</td>
                </tr>
                <tr>
                    <th scope="row"><img src="./img/pokemon/charmeleon.png" alt="poke5" class="imgpoke"></th>
                    <td><img src="./img/tipos/Tipo_fuego.webp" alt="tipo" class="imgtipo"></td>
                    <td>#5</td>
                    <td>Charmeleon</td>
                </tr>
                <tr>
                    <th scope="row"><img src="./img/pokemon/charizard.png" alt="poke6" class="imgpoke"></th>
                    <td><img src="./img/tipos/Tipo_fuego.webp" alt="tipo" class="imgtipo"><img src="./img/tipos/Tipo_volador.webp" alt="tipo" class="imgtipo"></td>
                    <td>#5</td>
                    <td>Charizard</td>
                </tr>
            </tbody>
        </table>
    </main>
    
    <?php include("includes/footer.php"); ?>
  </body>
</html>
