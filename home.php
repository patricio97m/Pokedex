<?php
$conexion = mysqli_connect('localhost', 'root', '', 'pokedex');
$sql = "select P.nombre as nombrePokemon, P.codigo as numeroPokemon, T.nombre as Tipo
                            from Pokemon P join Tipo_Pokemon TP on P.codigo = TP.codigoPokemon
                                    join Tipo T on T.codigo = TP.codigoTipo
                            order by numeroPokemon, Tipo";
$consulta = mysqli_query($conexion, $sql);
$nfilas = mysqli_num_rows($consulta);

$listaDePokemones = array();
while ($fila = mysqli_fetch_assoc($consulta)) {
    $numeroPokemon = $fila["numeroPokemon"];
    if (isset($listaDePokemones[$numeroPokemon - 1])) {
        $listaDePokemones[$numeroPokemon - 1]["tipos"][] = $fila["Tipo"];
    } else {
        $pokemon = array();
        $pokemon["nombre"] = $fila["nombrePokemon"];
        $pokemon["tipos"][] = $fila["Tipo"];
        $pokemon["numero"] = $fila["numeroPokemon"];
        $listaDePokemones[] = $pokemon;
    }
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

    <main>
        <table class="table table-light table-hover table-bordered mt-3">
            <thead>
                <tr>
                    <th scope="col">Foto</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Número</th>
                    <th scope="col">Nombre</th>
                    <?php if(isset($_SESSION['usuario'])){
                        echo "<th scope='col'>Acciones</th>";}?>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($listaDePokemones as $pokemon) {
                        $nombrePokemon = $pokemon["nombre"];
                        $numeroPokemon = $pokemon["numero"];
                        $imagenPokemon = "./img/pokemon/" . $nombrePokemon . ".png";
                        echo "<tr>
                                <th scope='row'><img src=$imagenPokemon alt='poke1' class='imgpoke'></th>
                            <td> "; 
                            
                            foreach ($pokemon["tipos"] as $tipo) {
                                $imagenTipo = "./img/tipos/Tipo_" . $tipo . ".webp";
                                echo "<img src=$imagenTipo alt='tipo' class='imgtipo'>";
                            } 

                        echo " </td>
                            <td>$numeroPokemon</td>
                            <td>$nombrePokemon</td>";
                        if(isset($_SESSION['usuario'])){
                            echo "<td> <button method='post' action='nuevo-pokemon.php' class='btn btn-outline-primary ml-2 my-2 my-sm-0' type='submit'>Modificación</button> 
                            <button method='post' action='baja.php' class='btn btn-outline-danger ml-2 my-2 my-sm-0' type='submit'>Baja</button></td>";
                        }
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
        <?php if(isset($_SESSION['usuario'])): ?>
            <div class='d-grid gap-2'>
                <a href='nuevo-pokemon.php' class='btn btn-outline-success'>Nuevo pokémon</a>
            </div>
        <?php endif; ?>
    </main>
    
    <?php include("includes/footer.php"); ?>
  </body>
</html>
