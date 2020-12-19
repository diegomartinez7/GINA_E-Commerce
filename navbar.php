<?php
    
?>

<!------------------------------------------------------------ Menú de navegación -------------------------------------------------------->
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-navbar">
        <a class="navbar-brand mr-3 ml-5" href="index.php">
            <img class="d-inline-block" width="80" src="img/logo.png" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Inicio</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Tienda
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="infoCertificados.php">Ropa</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="examen.php">Equipo y accesorios</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contacto.php">Contacto</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="acercaDe.php">Acerca de</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="acercaDe.php">FAQ</a>
            </li>
        </ul>

        <!----------------- Login -------------------------------> 
        <ul class="nav navbar-nav flex-row justify-content-between ml-auto">
            <!-- Este li muestra el nombre del usuario -->
            <li class="nav-item order-2 order-md-1">
                <?php 
                    if(!empty($_SESSION["usuario"])){
                        $nombre = $_SESSION["usuario"];
                        echo "<span class='text-light font-weight-bold btn btn-dark mr-2'> <i class='fas fa-user-circle text-success'></i> " . $nombre . "</span>";
                    }
                ?>
            </li>
            <li class="dropdown order-1">
                <button type="button" id="dropdownMenu1" data-toggle="dropdown" class="btn btn-outline-light dropdown-toggle">
                <!---------------------- Validación para iniciar/cerrar sesión ------------------------------>
                <?php
                    if(empty($_SESSION["usuario"])){
                        echo "Login";   
                    }
                    else{
                        echo "Cerrar Sesión";
                    }
                ?>
                <span class="caret"></span></button>
                <?php
                    if(empty($_SESSION["usuario"])){
                        echo "<ul class='dropdown-menu dropdown-menu-right mt-2'>";
                            echo "<li class='px-3 py-2'>";
                                echo "<form class='form' role='form' action='login.php' method='post'>";
                                    echo "<div class='form-group'>";
                                        echo "<input name='nombre' id='emailInput' placeholder='Usuario' class='form-control form-control-sm' type='text' required=''>";
                                    echo "</div>";
                                    echo "<div class='form-group'>";
                                        echo "<input name='clave' id='passwordInput' placeholder='Contraseña' class='form-control form-control-sm' type='password' required=''>";
                                    echo "</div>";
                                    echo "<div class='form-group'>";
                                        echo "<button type='submit' class='btn btn-success btn-block'>Login</button>";
                                    echo "</div>";
                                    echo "<div class='form-group text-center'>";
                                        echo "<small><a href='#' data-toggle='modal' data-target='#modalPassword'>¿No te has registrado?</a></small>";
                                    echo "</div>";
                                echo "</form>";
                            echo "</li>";
                        echo "</ul>";
                    }else{
                            echo "<ul class='dropdown-menu dropdown-menu-right mt-2'><li class='px-3 py-2'><a href='logout.php' class='btn btn-danger text-light'>Salir</a></li></ul>";
                    }
                ?>
            </li>
        </ul>
        <!---------------------- Fin de Validación para iniciar/cerrar sesión ------------------------------>
        </div>
    </nav>
    <h1 class="text-center m-3">Gusto Innovador para Nuestros Atletas</h1>
    <!------------------------------- Mensaje de bienvenida ------------------------->
    <?php
        /*if(!empty($_SESSION["usuario"])){
            $nombre = $_SESSION["usuario"];
            date_default_timezone_set("America/Mexico_City");
            $hora = localtime();
            
            if($hora[2]>=1 && $hora[2]<=11){
                echo "<span class='font-weight-bold text-success m-3 p-4' >Buenos días ";
            }else if($hora[2]>=12 && $hora[2]<=19){
                echo "<span class='font-weight-bold text-success m-3 p-4' >Buenas tardes ";
            }else{
                echo "<span class='font-weight-bold text-success m-3 p-4' >Buenas noches ";
            }
            echo $nombre . "</span>";
        }*/
    ?>
    <h2 class="text-secondary text-center">Los campeones no nacen, G.I.N.A los hace</h2>
</header>

<!-- Apertura del div que es cerrado en footer.php -->
<div class="pagina-completa">