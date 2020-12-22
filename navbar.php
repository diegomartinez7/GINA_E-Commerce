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
            <li class="nav-item">
                <a class="nav-link" href="index.php">Inicio</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Tienda
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="ropa.php">Ropa</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="accesorios.php">Equipo y accesorios</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contacto.php">Contacto</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about.php">Acerca de</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pFrecuentes.php">FAQ</a>
            </li>
            <!------------------------------------------ Botón para reportes del Admin ------------------------------------------>
            <?php
                if(!empty($_SESSION["cuenta"])){
                    if($_SESSION["cuenta"]=='Administrador'){
                        echo '<li class="nav-item">
                                <a class="nav-link" href="graficas.php">Reportes</a>
                             </li>';
                    }
                }
            ?>
        </ul>

        <!----------------- Login -------------------------------> 
        <ul class="nav navbar-nav flex-row justify-content-between ml-auto">
            <!-- Este li muestra el nombre del usuario -->
            <li class="nav-item order-2 order-md-1">
                <?php 
                    if(!empty($_SESSION["cuenta"])){
                        $nombre = $_SESSION["cuenta"];
                        echo "<span class='text-light font-weight-bold btn btn-secondary mr-2'> <i class='fas fa-user-circle text-success'></i> " . $nombre . "</span>";
                    }
                ?>
            </li>
            <li class="dropdown order-1">
                <button type="button" id="dropdownMenu1" data-toggle="dropdown" class="btn btn-outline-light dropdown-toggle">
                <!---------------------- Validación para iniciar/cerrar sesión ------------------------------>
                <?php
                    if(empty($_SESSION["cuenta"])){
                        echo "Login";   
                    }
                    else{
                        echo "Cerrar Sesión";
                    }
                ?>
                <span class="caret"></span></button>
                <?php
                    if(empty($_SESSION["cuenta"])){
                        echo "<ul class='dropdown-menu dropdown-menu-right mt-2'>";
                            echo "<li class='px-3 py-2'>";
                                echo "<form class='form' role='form' action='login.php' method='post'>";
                                    echo "<div class='form-group'>";
                                        echo "<input name='cuenta' id='cuentaInput' placeholder='Usuario' class='form-control form-control-sm' type='text' required=''>";
                                    echo "</div>";
                                    echo "<div class='form-group'>";
                                        echo "<input name='clave' id='claveInput' placeholder='Contraseña' class='form-control form-control-sm' type='password' required=''>";
                                    echo "</div>";
                                    echo "<div class='form-group'>";
                                        echo "<img src='captchaFondo.php' alt='' class='mb-2'>";
                                        echo "<input name='codigoCaptcha' id='captcha' class='form-control form-control-sm' type='text' required=''>";
                                    echo "</div>";
                                    echo "<div class='form-group'>";
                                        echo "<button type='submit' class='btn btn-success btn-block'>Login</button>";
                                    echo "</div>";
                                    echo "<div class='form-group text-center'>";
                                        echo "<small><a href='#' data-toggle='modal' data-target='#modalRegistro'>¿No te has registrado?</a></small>";
                                    echo "</div>";
                                    echo "<div class='form-group text-center'>";
                                        echo "<small><a href='#' data-toggle='modal' data-target='#modalRecuperar'>¿Olvidaste tu contraseña?</a></small>";
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
    <!---------------------- Modal de Regisro ----------------------------->
    <div class="modal fade" id="modalRegistro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registro de cuenta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="php_mysql/registro.php" method="post">
                        <div class="form-group">
                            <label for="nombre">Nombre Completo:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="cuenta">Cuenta de usuario:</label>
                            <input type="text" class="form-control" id="cuenta" name="cuenta" required>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="pais">País:</label>
                                <select name="pais" id="pais" class="form-control">
                                    <option value="" selected>Seleccione</option>
                                    <option value="México">México</option>
                                    <option value="USA">Estados Unidos</option>
                                    <option value="Australia">Australia</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="ciudad">Ciudad:</label>
                                <input type="text" id="ciudad" class="form-control" name="ciudad" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="direccion">Dirección:</label>
                                <input type="text" id="direccion" class="form-control" name="direccion" required>
                            </div>
                            <div class="form-group col-6">
                                <label for="cp">Código Postal:</label>
                                <input type="number" id="cp" class="form-control" name="cp" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="correo">Correo electrónico:</label>
                            <input type="email" id="correo" class="form-control" name="correo" required>
                        </div>
                        <div class="form-group">
                            <label for="recuperar">Clave de recuperación:</label>
                            <input type="text" id="recuperar" class="form-control" name="recuperar" required>
                            <small class="text-success">En caso de perder tu contraseña necesitas este campo. Ejemplo: Nombre de tu perro</small>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="contra">Contraseña:</label>
                                <input type="password" class="form-control" id="contra" name="contrasena">
                            </div>
                            <div class="form-group col-6">
                                <label for="recontra">Confirmar contraseña:</label>
                                <input type="password" class="form-control" id="recontra">
                                <small id="msg" class="text-danger"></small>
                            </div>
                        </div>
                        <p class="text-danger m-4 small" id="failed"></p>
                        <button class="btn btn-lg btn-warning mb-3" id="validar" type="button">Validar</button>
                        <input type="submit" class="btn btn-info btn-block d-none" value="Enviar" id="enviar">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--------------------------------------- Modal recuperar contraseña  ------------------------------------->
    <div class="modal fade" id="modalRecuperar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Recuperar Contraseña</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="recupera.php" method="post">
                        <div class="form-group">
                            <label for="usuario">Usuario:</label>
                            <input type="text" class="form-control" id="usuario" required name="usuario">
                        </div>
                        <div class="form-group">
                            <label for="clave">Clave de recuperación:</label>
                            <input type="text" class="form-control" id="clave" required name="clave">
                        </div>
                        <input type="submit" class="btn btn-info btn-block" value="Enviar" id="enviaR">
                    </form>
                </div>
            </div>
        </div>
    </div>

    


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