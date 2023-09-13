<header class="bg-light p-3">
    <nav class="navbar navbar-light justify-content-between">
        <a class="navbar-brand" href="../home.php"><img src="./img/Poké_Ball_icon.svg.png" alt="pokeball"
                class="pokeball" />Pokédex</a>

        <h3>Usuario ADMIN</h3>
    </nav>

    <div>
        <form class="form-inline my-2 my-lg-0 d-flex">
            <input class="form-control mx-1" type="text" name="busqueda"
                placeholder="Ingrese nombre, tipo o número de pokémon" />
            <button method="post" action="buscar.php" class="btn btn-outline-success ml-2 my-2 my-sm-0" type="submit">
                Buscar
            </button>
        </form>
    </div>
</header>