<?php
class pokedex
{
    function debug_to_console($data) {
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);
    
        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }
    public function cargarPokemones() {
        $conexion = mysqli_connect('localhost', 'root', '', 'pokedex');
        $sql = "select P.nombre as nombrePokemon, P.descripcion, P.codigo as numeroPokemon, P.numeroPokedex, T.nombre as Tipo
                from Pokemon P join Tipo_Pokemon TP on P.codigo = TP.codigoPokemon
                                join Tipo T on T.codigo = TP.codigoTipo
                order by numeroPokemon, Tipo";
        $consulta = mysqli_query($conexion, $sql);

        $listaDePokemones = array();
        while ($fila = mysqli_fetch_assoc($consulta)){
            $coincidencia = false;
            foreach ($listaDePokemones as $key => $pokemon) {
                if ($pokemon["numero"] == $fila["numeroPokemon"]){
                    $listaDePokemones[$key]["tipos"][] = $fila["Tipo"];
                    $coincidencia = true;
                }
            }
            $this->debug_to_console($coincidencia);
            if(!$coincidencia){
                $pokemon = array();
                $pokemon["nombre"] = $fila["nombrePokemon"];
                $pokemon["tipos"][] = $fila["Tipo"];
                $pokemon["numero"] = $fila["numeroPokemon"];
                $pokemon["descripcion"] = $fila["descripcion"];
                $pokemon["numeroPokedex"] = $fila["numeroPokedex"];
                $listaDePokemones[] = $pokemon;
                $_SESSION['datos_para_detalles'] = $listaDePokemones;
            }
        }
        return $listaDePokemones;
    }

    public function buscarPokemones($busqueda){
        $conexion = mysqli_connect('localhost', 'root', '', 'pokedex');
        $sql = "select P.nombre as nombrePokemon, P.descripcion, P.codigo as numeroPokemon, P.numeroPokedex, T.nombre as Tipo
                from Pokemon P join Tipo_Pokemon TP on P.codigo = TP.codigoPokemon
                join Tipo T on T.codigo = TP.codigoTipo
                where P.codigo in (select codigo
                                   from pokemon
                                   where nombre like '$busqueda')
                order by numeroPokemon, Tipo";
        $consulta = mysqli_query($conexion, $sql);
        $nfilas = mysqli_num_rows($consulta);

        if ($nfilas == 0){
            $_SESSION["errorBusqueda"] = "Pokemon no encontrado";
            return $this->cargarPokemones();
        }

        $listaDePokemones = array();
        while ($fila = mysqli_fetch_assoc($consulta)){
            $coincidencia = false;
            foreach ($listaDePokemones as $key => $pokemon) {
                if ($pokemon["numero"] == $fila["numeroPokemon"]){
                    $listaDePokemones[$key]["tipos"][] = $fila["Tipo"];
                    $coincidencia = true;
                }
            }
            $this->debug_to_console($coincidencia);
            if(!$coincidencia){
                $pokemon = array();
                $pokemon["nombre"] = $fila["nombrePokemon"];
                $pokemon["tipos"][] = $fila["Tipo"];
                $pokemon["numero"] = $fila["numeroPokemon"];
                $pokemon["descripcion"] = $fila["descripcion"];
                $pokemon["numeroPokedex"] = $fila["numeroPokedex"];
                $listaDePokemones[] = $pokemon;
            }
        }
        return $listaDePokemones;
    }

    public function listarPokemones($admin, $listaDePokemones){
        foreach ($listaDePokemones as $pokemon) {
            $nombrePokemon = $pokemon["nombre"];
            $numeroPokemon = $pokemon["numero"];
            $numeroPokedex = $pokemon["numeroPokedex"];
            $imagenPokemon = "./img/pokemon/" . $nombrePokemon . ".png";

            echo "<tr>
                    <th scope='row'>
                    <a href='detalles.php?numero_pokemon=$numeroPokemon'>
                        <img src=$imagenPokemon alt='poke1' class='imgpoke'>
                    </a>
                    </th>
                    <td>";

                    foreach ($pokemon["tipos"] as $tipo) {
                        $imagenTipo = "./img/tipos/Tipo_" . $tipo . ".webp";
                        echo "<img src=$imagenTipo alt='tipo' class='imgtipo'>";
                    }

            echo "</td>
                    <td>#$numeroPokedex</td>
                    <td>
                        <a href='detalles.php?numero_pokemon=$numeroPokemon' class='text-decoration-none'>$nombrePokemon</a>
                    </td>";

            if ($admin) {
                echo "<td>
                        <a href='modifica.php?numPokemon=$numeroPokemon' class='btn btn-outline-primary'>Modifica</a>
                        <a href='baja.php?numPokemon=$numeroPokemon' class='btn btn-outline-danger'>Baja</a>
                      </td>";
            }
            echo "</tr>";
        }
    }

    public function bajaPokemon($codigoPokemon) {
        $conexion = mysqli_connect('localhost', 'root', '', 'pokedex');
        $sql = "delete from tipo_pokemon where codigoPokemon = $codigoPokemon";
        $mensaje ="";
        $consulta = mysqli_query($conexion, $sql);
        $sql2 = "delete from pokemon where codigo = $codigoPokemon";
        $consulta2 = mysqli_query($conexion, $sql2);
        echo $sql;
        var_dump($consulta2);
        if($consulta2){
            $mensaje = "Pokemon ".$codigoPokemon." eliminado correctamente";
        } else {
            $mensaje = false;
        }
        return $mensaje;
    }
    public function cargarPokemon($codigo) {
        $conexion = mysqli_connect('localhost', 'root', '', 'pokedex');
        $sql = "select P.nombre as nombrePokemon, P.descripcion, P.codigo as numeroPokemon, P.numeroPokedex, T.nombre as Tipo,T.codigo as Tipo_codigo
                from Pokemon P join Tipo_Pokemon TP on P.codigo = TP.codigoPokemon
                                join Tipo T on T.codigo = TP.codigoTipo
                where P.codigo = $codigo
                order by numeroPokemon, Tipo";
        $consulta = mysqli_query($conexion, $sql);

        $listaDePokemones = array();
        while ($fila = mysqli_fetch_assoc($consulta)){
            $coincidencia = false;
            foreach ($listaDePokemones as $key => $pokemon) {
                if ($pokemon["numero"] == $fila["numeroPokemon"]){
                    $listaDePokemones[$key]["tipos"][] = $fila["Tipo_codigo"];
                    $coincidencia = true;
                }
            }
            $this->debug_to_console($coincidencia);
            if(!$coincidencia){
                $pokemon = array();
                $pokemon["nombre"] = $fila["nombrePokemon"];
                $pokemon["tipos"][] = $fila["Tipo_codigo"];
                $pokemon["numero"] = $fila["numeroPokemon"];
                $pokemon["descripcion"] = $fila["descripcion"];
                $pokemon["numeroPokedex"] = $fila["numeroPokedex"];
                $pokemon["codigoPokemon"] = $fila["numeroPokemon"];
                $listaDePokemones[] = $pokemon;
                $_SESSION['datos_para_detalles'] = $listaDePokemones;
            }
        }
        return $listaDePokemones;
    }
    public function tiposPokemon() {
        $conexion = mysqli_connect('localhost', 'root', '', 'pokedex');
        $sql = "select * from Tipo";
        $consulta = mysqli_query($conexion, $sql);
        $tiposPokemon = array();
        foreach ($consulta as $tipos){
            $tiposPokemon[] = array("codigo"=>$tipos['codigo'],"nombre"=>$tipos['nombre']);
        }
        return $tiposPokemon;
    }
    public function modificaPokemon($codigoPokemon, $nombre,$numero,$descripcion,$tipos) {
        $conexion = mysqli_connect('localhost', 'root', '', 'pokedex');
        $sql = "update pokemon set 
                    nombre ='$nombre',
                    numeroPokedex=$numero,
                    descripcion='$descripcion'
                    where codigo=$codigoPokemon";
        $consulta = mysqli_query($conexion, $sql);

        $borraTipo = false;
        $resultadoInsertaTipo=false;
        if(!empty($tipos)){
            $sqlTipo = "delete from tipo_pokemon where codigoPokemon = $codigoPokemon";
            $borraTipo = mysqli_query($conexion, $sqlTipo);
            foreach ($tipos as $tipo){
                $sqlInsertTipo = "insert into tipo_pokemon value($codigoPokemon,$tipo)";
                $resultadoInsertaTipo = mysqli_query($conexion, $sqlInsertTipo);
            }
        }

        if($consulta&&$resultadoInsertaTipo&&$borraTipo){
            $mensaje = "Pokemon ".$codigoPokemon." modificado correctamente";
        } else {
            $mensaje = false;
        }
        return $mensaje;
    }
}
?>