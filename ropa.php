<?php
    session_start();
    $_SESSION["categoria"]="ropa";
    if(isset($_SESSION["msj_admin"])){
        $mensaje = $_SESSION["msj_admin"];
    }
    else{
        $mensaje = 0;
    }

    echo '<input type="hidden" id="mensaje_2" value="' . $mensaje . '">';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>G.I.N.A - Ropa</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/fa821c9639.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    <?php
        include('navbar.php');
    ?>
    
    <div class="container margen-pagina-completa">
        <h2 class="text-center mb-3">¡Elige entre una enorme variedad de productos!</h2>
        <h4 class="text-center text-secondary">La mejor selección de ropa deportiva para que destaques en cualquier competencia.</h4>
        <?php
            if(!empty($_SESSION["cuenta"])){
                if($_SESSION["cuenta"]=='Administrador')
                    echo '<div class="text-center">
                            <a class="btn btn-info col-6 mt-5" href="administrar.php"><span class="fas fa-tools"></span> Administrar</a>
                        </div>';
            }
        ?>
        <div class="row row-cols-1 row-cols-md-3 g-4 mt-5 mb-4">
            <?php
                include('php_mysql/productos.php');
            ?>
        </div>
    </div>
    <div style="height: 87vh; width: 300px; background-color: rgba(0,100,0, 0.7); position: fixed; bottom: 50px; right: 0; z-index: 2;">
        <h2 class="text-info text-center">Carrito</h2>
        <ul>
        
        <?php 
        $nombre=$_SESSION["carrito"];
        $precio=$_SESSION["costo"];
        // $cantidad=$_SESSION["cantidad"];
            for($j=0;$j<count($_SESSION["carrito"]);$j++){
                echo "<li class='text-light'>".$nombre[$j].",  $".$precio[$j]."</li>";//.", ".$precio[$j].", ";//. $cantidad[$j];

            }
        ?>
        </ul>
        <a class="btn btn-info" href="Pago.php">Pagar</a>
    </div>
    <?php
        include('footer.php');
    ?>

    <script>
        function alertaAdmin(){
            let mensaje = document.getElementById("mensaje_2").value;

            if(mensaje != 0){
                swal({
                    title: 'Información para el administrador',
                    text: mensaje,
                    icon: "success",
                    button: "Entendido",
                });
                <?php unset($_SESSION["msj_admin"]) ?>
            }
        }

        alertaAdmin();
    </script>
</body>
</html>