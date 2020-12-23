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
    <div class="container margen-pagina-completa">
        <canvas id="bloqueados"></canvas>
    </div>

    <?php
        include('footer.php');
    ?>

<script>
    <?php 
        include('php_mysql/conexion.php');
        $query = "SELECT SUM(Cantidad) AS numero FROM producto, ventas WHERE producto.ID = ventas.ID_Producto AND producto.Categoria = 'Ropa'";
        $ropa = $conexion->query($query)->fetch_assoc();
        $query = "SELECT SUM(Cantidad) AS numero FROM producto, ventas WHERE producto.ID = ventas.ID_Producto AND producto.Categoria = 'Equipo_Accesorio'";
        $equipo = $conexion->query($query)->fetch_assoc();
        $query = "SELECT COUNT(*) AS numero FROM usuario WHERE Pais = 'México'";
        $mx = $conexion->query($query)->fetch_assoc();
        $query = "SELECT COUNT(*) AS numero FROM usuario WHERE Pais = 'USA'";
        $usa = $conexion->query($query)->fetch_assoc();
        $query = "SELECT COUNT(*) AS numero FROM usuario WHERE Pais = 'Australia'";
        $aus = $conexion->query($query)->fetch_assoc();
        $query = "SELECT COUNT(*) AS numero FROM usuario WHERE Habilitado = 0";
        $habilitado = $conexion->query($query)->fetch_assoc();
        $query = "SELECT COUNT(*) AS numero FROM usuario WHERE Habilitado = 1 || Habilitado = 2";
        $cercanas = $conexion->query($query)->fetch_assoc();
        $query = "SELECT COUNT(*) AS numero FROM usuario WHERE Habilitado = 3";
        $bloqueado = $conexion->query($query)->fetch_assoc();
    ?>
    let ropa = <?php echo $ropa["numero"] ?>;  //número de artículos vendidos de la categoría ropa
    let equipo = <?php echo $equipo["numero"] ?>;  //número de artículos vendidos de la categoría equipo y accesorios
    let mx = <?php echo $mx["numero"] ?>;  //número de usuarios de México
    let usa = <?php echo $usa["numero"] ?>;  //número de usuarios de Estados Unidos
    let aus = <?php echo $aus["numero"] ?>;  //número de usuarios de Australia
    let habilitado = <?php echo $habilitado["numero"] ?>;  //número de usuarios con cuenta habilitada
    let cercanas = <?php echo $cercanas["numero"] ?>;  //número de usuarios con cuenta cercana al bloqueo
    let bloqueado = <?php echo $bloqueado["numero"] ?>;  //número de usuarios con cuenta bloqueada
    
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
    
    let canvas3 = document.getElementById("bloqueados").getContext("2d");

    var grafica3 = new Chart(canvas3,{
        type: "bar",
        data: {
            labels: ["Cuentas Habilitadas","Cuentas cercanas al bloqueo","Cuentas Bloqueadas"],
            datasets: [
                {
                    label: "Acceso a cuentas",
                    backgroundColor: "rgb(60,150,110)",
                    data: [habilitado,cercanas,bloqueado,0] // se establecen en la gráfica los valores de las variables
                }
            ]
        }
    });
</script>
    
</body>
</html>