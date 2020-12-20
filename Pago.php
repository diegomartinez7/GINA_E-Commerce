<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formas de Pago</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
    <?php
        include('navbar.php');
    ?>

    <div class="container margen-pagina-completa">
        <h1>Pago de artículos</h1>
        <div class="jumbotron bg-light">
            <p class="h5">Articulos: </p>
            <!-- for para el carrito -->
            <p class="h5">Total de compra: </p>
            <p class="h5">Impuesto: <?php if(true) echo "0";?> </p>
            <p class="h5 text-success">Total a pagar: $ </p>
            
        </div>
    </div>

    <div class="container margen-pagina-completa">
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
    </div>
    
    <?php
        include('footer.php');
    ?>
   
</body>
</html>