<?php
    session_start();

    if(empty($_SESSION["cuenta"])){
        header ("Location: index.php");
    }

    if($_SESSION["pais"] == "México"){
        $envio = 0;
    }else{
        $envio = 200;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formas de Pago</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/fa821c9639.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php
        include('navbar.php');
    ?>

    <div class="container margen-pagina-completa">
        <h1>Pago de artículos</h1>
        <div class="jumbotron bg-light">
            <p class="h5">Articulos: 
            <?php 
                $aux = $_SESSION["carrito"];
                for($i=0;$i<count($aux); $i++){
                    echo $aux[$i] ." ";
                }
            ?>
            </p>
            <!-- for para el carrito -->
            <p class="h5 text-success">Total de compra: </p>
            <?php 
                $aux = $_SESSION["costo"];
                $aux2 = 0;
                for($i=0;$i<count($aux); $i++){
                    $aux2 += intval($aux[$i]);
                }
                $aux2+= $envio;
                echo "$ ".$aux2;
            ?>
            <p class="h5">Impuesto: <?php echo "$ ". $envio;?> </p>
            <label for="cupon">Cupón:</label>
            <input type="text" id="cupon" class="form-control">
            
        </div>
    </div>

    <div class="container margen-pagina-completa">
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <h4 class="m-3 text-center">Datos de envío</h4>
        <div class="form-group">
            <label for="dir">Dirección:</label>
            <input type="text" name="direccion" value="<?php echo $_SESSION["dir"];?>" class="form-control" id="dir">
        </div>
        <div class="form-group">
            <label for="cp">CP:</label>
            <input type="text" name="cp" value="<?php echo $_SESSION["cp"];?>" class="form-control" id="cp">
        </div>
        <div class="form-group">
            <label for="city">Ciudad:</label>
            <input type="text" name="cd" value="<?php echo $_SESSION["ciudad"];?>" class="form-control" id="city">
        </div>
        <div class="form-group">
            <label for="pais">País:</label>
            <input type="text" name="country" value="<?php echo $_SESSION["pais"];?>" class="form-control" id="country">
        </div>
        <h4 class="m-3 text-center">Formas de pago</h4>
        <table class="table">
            <thead>
                <tr>
                    <th>Depósito en banco</th>
                    <th>Transferencia</th>
                    <th>Otro</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="radio" name="pago" value="1" class="mr-2"><img src="img/bbva.png" alt="bbva" class="w-25"></td>
                    <td><input type="radio" name="pago" value="2" class="mr-2"><img src="img/bbva.png" alt="bbva" class="w-25"></td>
                    <td><input type="radio" name="pago" value="3" class="mr-2"><img src="img/oxxo.svg" alt="bbva" class="w-25"></td>
                </tr>
                <tr>
                    <td><input type="radio" name="pago" value="4" class="mr-2"><img src="img/banorte.png" alt="banorte" class="w-25"></td>
                    <td><input type="radio" name="pago" value="5" class="mr-2"><img src="img/santander.png" alt="santader" class="w-25"></td>
                    <td><input type="radio" name="pago" value="6" class="mr-2"><img src="img/western.png" alt="westernUnion" class="w-25"></td>
                </tr>
            </tbody>
        </table>
        <input type="submit" class="btn btn-success" value="Confirmar">
    </form>
    </div>
    <div class="container margen-pagina-completa mb-3">
        <div class="bg-light p-3">
        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                echo "<h4 class='text-danger text-center'>Datos para depósito</h4>";
                switch($_POST["pago"]){
                    case '1': echo "<p class='m-4 h5 text-center'>Convenio BBVA: 2345678 <br>Referencia: 00234323</p>"; break;
                    case '2': echo "<p class='m-4 h5 text-center'>Referencia BBVA: 2345678 <br>Nombre: BancoBBVA</p>"; break;
                    case '3': echo "<p class='m-4 h5 text-center'>Referencia OXXO: 234561234561234562 <br>De lunes a viernes 8am-8pm</p>"; break;
                    case '4': echo "<p class='m-4 h5 text-center'>Convenio Banorte: 9021343 <br>Referencia: 56782345</p>"; break;
                    case '5': echo "<p class='m-4 h5 text-center'>Referencia Santander: 3456712 <br>Nombre: Banco Santander</p>"; break;
                    case '6': echo "<p class='m-4 h5 text-center'>Referencia Western Union: 980909765768765432<br>De lunes a domingo 9am-9pm</p>"; break;
                }
                
            }
        ?>
        </div>
    </div>


    
    <?php
        include('footer.php');
    ?>
   
</body>
</html>