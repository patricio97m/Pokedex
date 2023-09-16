<?php
    session_start();
    require_once("includes/funciones.php");
    $pokedex = new pokedex();
    $nombre = $_POST["nombre"];
    $numero = $_POST["numero"];
    $tipos = $_POST["tipos"];
    $descripcion = $_POST["descripcion"];
    
    $mensaje = $pokedex->altaPokemon($nombre, $numero, $tipos, $descripcion);
    if($mensaje){
        $_SESSION["errorAlta"] = $mensaje;
    }
    else {
        $pathImagenesPokemon = "img/pokemon/";
        $extensionDelArchivo = pathinfo(basename($_FILES["imagen"]["name"]), PATHINFO_EXTENSION);
        $destinoArchivo = $pathImagenesPokemon . $nombre . ".png";
    
        if($extensionDelArchivo != "png"){
            $_SESSION["errorAlta"] = "Solo se permiten imagenes en formato PNG";
        }
        else if(move_uploaded_file($_FILES["imagen"]["tmp_name"], $destinoArchivo)){
            $_SESSION["successAlta"] = "Pokemón añadido con éxito";
        }
        else{
            $_SESSION["errorAlta"] = "Ha ocurrido un error";
        }
    }
    header('Location: nuevo-pokemon.php');
    exit();   
?>