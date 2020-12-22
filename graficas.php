<?php
    session_start();
    
    //Validamos que sólo el administrador pueda entrar a esta página
    if(!empty($_SESSION["cuenta"])){
        if($_SESSION["cuenta"] != 'Administrador'){
            header("Location: index.php");
        }
    }
    else {
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gráficas</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!--------------------- CDN PARA CHARTJS  -------------------------------------->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/fa821c9639.js" crossorigin="anonymous"></script>
</head>
<body>

    <?php
        include('navbar.php')
    ?>

    <div class="container margen-pagina-completa">
        <canvas id="categorias" ></canvas>
    </div>
    <div class="container margen-pagina-completa">
        <canvas id="paises"></canvas>
    </div>

    <?php
        include('footer.php');
    ?>

<script>
    let ropa = <?php echo "27" ?>; // query para numero de artículos vendidos de la categoría ropa
    let equipo = <?php echo "34" ?>; // query para numero de artículos vendidos de la categoría equipo y accesorios
    let mx = <?php echo "7" ?>; // query para numero de usuarios de México
    let usa = <?php echo "4" ?>; // query para numero de usuarios de Estados Unidos
    let aus = <?php echo "10" ?>; // query para numero de usuarios de Australia
    
    let canvas = document.getElementById("categorias").getContext("2d");

    var grafica = new Chart(canvas,{
        type: "bar",
        data: {
            labels: ["Ropa","","Equipo y Accesorios"],
            datasets: [
                {
                    label: "Compras totales por categoría",
                    backgroundColor: "rgb(114,199,150)",
                    data: [ropa,0,equipo] // se establecen en la gráfica los valores de las variables
                }
            ]
        }
    });

    let canvas2 = document.getElementById('paises').getContext("2d");

    var grafica2 = new Chart(canvas2,{
        type: "line",
        data: {
            labels: ["Mexico", "Estados Unidos", "Australia",""],
            datasets: [
                {
                    label: "Países de usuarios",
                    backgroundColor: "rgb(99,204,172)",
                    data: [mx,usa,aus,0] // se establecen en la gráfica los valores de las variables
                }
            ]
        }
    });

</script>
    
</body>
</html>