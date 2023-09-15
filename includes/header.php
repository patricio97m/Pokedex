<header class="bg-light p-3">
    <nav class="navbar navbar-light justify-content-between">
        <a class="navbar-brand" href="home.php"><img src="./img/Poké_Ball_icon.svg.png" alt="pokeball"class="pokeball" />Pokédex</a>
        <?php
        if(isset($_SESSION['usuario'])){
            ?>
            <h3>Usuario <?= $_SESSION['usuario']?></h3>
            <form class="form-inline my-2 my-lg-0 d-flex" method="post" action="logout.php" >
                <button class="btn btn-outline-danger ml-2 my-2 my-sm-0" type="submit">
                    Logout
                </button>
            </form>
        <?php

        }else{
        ?>
            <form class="form-inline my-2 my-lg-0 d-flex" method="post" action="ingresar.php" >
            <?php
            if(isset($_SESSION['error'])){
                ?>
                <div class="alert alert-danger" role="alert">
                    <?= $_SESSION['error'];?>
                </div>
            <?php
                session_destroy();
            }
            ?>
                <input class="form-control mx-2" type="text" placeholder="Usuario" name="usuario" />
                <input class="form-control mx-2" type="password" placeholder="Contraseña" name="password" />
                <button class="btn btn-outline-success ml-2 my-2 my-sm-0" type="submit">
                    Ingresar
                </button>
            </form>
        <?php
        }
        ?>

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