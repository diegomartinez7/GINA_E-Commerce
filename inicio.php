<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>G.I.N.A</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
<!------------ Navbar -->
<?php
        include('navbar.php');
?>
<!------------ Buscador con AJAX -------------->
<div class="container margen-pagina-completa">
    <form>
        <div class="form-group row">
            <label class="col-2 h5" for="buscador">¿Buscas algo?</label>
            <input onkeyup="mostrarResultados(this.value)" type="text" class="form-control w-25 mr-5" id="buscador" placeholder="Ingresa tu búsqueda">
            <label class="ml-3 h5">Resultados: <a id="resultados" href="#"> </a></label>
        </div>
    </form>
</div>

<div class="container margen-pagina-completa">
   
    <div class="jumbotron">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
             <div class="carousel-item active">
                <img src="img/tienda.jpg" class="d-block w-100" alt="...">
             </div>
             <div class="carousel-item">
                <img src="img/deportivos.jpg" class="d-block w-100" alt="...">
             </div>
             <div class="carousel-item">
                 <img src="img/chaqueta.jpg" class="d-block w-100" alt="...">
             </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>
    </div>
</div>

<div class="container margen-pagina-completa">
    <div class="jumbotron">
        <h3 class="text-center">¿Quieres obtener un descuento?</h3>
        <button class="btn btn-block btn-danger m-4" data-toggle="modal" data-target="#modalRegistro">Suscríbete ahora</button>
    </div>
</div>

<?php
    include('footer.php');
?>


<!----------- Script para el buscador con AJAX  -->
<script>
    
function mostrarResultados(str) {
    
  var xhttp;
  if (str.length == 0) { 
    document.getElementById("resultados").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        
        let a  =  document.getElementById("resultados");
        
        a.innerHTML = this.responseText;
        
        let aux = this.responseText.trim().toLocaleLowerCase();

      if( aux == 'jersey' || aux == 'ropa'){
        // Ingresamos la ruta a la categoría de ropa
        a.href = 'ropa.php'; //todavía no existe

      }else if( aux == 'equipo' || aux == 'accesorios' || aux == 'tenis'){
        a.href = 'accesorios.php';
      }else{
          a.href='#'
      }
    }
  };
  xhttp.open("GET", "resultadosBusqueda.php?q="+str, true);
  xhttp.send();   
}
</script>
  
</body>
</html>