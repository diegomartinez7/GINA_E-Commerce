<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Preguntas Frecuentes</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
  <!------------ Navbar -->
  <?php
        include('navbar.php');
  ?>
  <!-------- Sección inicial -->
   <div class="container margen-pagina-completa">
    <h1 class="m-1 text-center">Preguntas Frecuentes</h1>
    <div class="jumbotron">
      <div class="d-flex">
        <img src="img/clientes.png" alt="clientes" class="w-50">
        <p class="h2 p-5"><span class="text-success"> Como cliente eres nuestra prioridad </span><br>
        Si tus dudas no se aclaran puedes escribirnos en el apartado de <b>contacto</b> </p>
      </div>
    </div>
   </div>
   <!------------------- Panel de preguntas con respuestas -------------->
   <div class="container margen-pagina-completa">
   <div class="jumbotron">
    <div class="row">
      <div class="col-4">
        <div class="list-group" id="list-tab" role="tablist">
          <a class="list-group-item list-group-item-action active list-group-item-info" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Costos de envío</a>
          <a class="list-group-item list-group-item-action list-group-item-info" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Formas de pago</a>
          <a class="list-group-item list-group-item-action list-group-item-info" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Descuentos</a>
          <a class="list-group-item list-group-item-action list-group-item-info" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Autenticidad de los productos</a>
          <a class="list-group-item list-group-item-action list-group-item-info" id="list-envio-list" data-toggle="list" href="#list-envio" role="tab" aria-controls="settings">Tiempo de entrega</a>
        </div>
      </div>
      <div class="col-8">
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show h3 active p-3" id="list-home" role="tabpanel" aria-labelledby="list-home-list">Nuestros envíos son nacionales e internacionales únicamente para Estados Unidos de América. El envío nacional tiene un costo de $300. Si el total de compra es mayor a $2999 el envío es gratis. <br> El envío es gratis para los Estados Unidos.</div>
          <div class="tab-pane fade h3 p-5" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list"> Puedes hacer depósitos en OXXO o en los bancos Santander y BBVA</div>
          <div class="tab-pane fade h3 p-5" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list"> Todos nuestros usuarios al registrarse tienen derecho a un descuento. Este te llegará al correo con el cual te registraste.</div>
          <div class="tab-pane fade h3 p-5" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">Todos nuestros productos son originales. <br> Nuestros proveedores son directamente las marcas que los producen</div>
          <div class="tab-pane fade h3 p-5" id="list-envio" role="tabpanel" aria-labelledby="list-envio-list">El tiempo de entrega varía según tu ciudad. <br> En promedio nos toma de 3 a 7 días</div>
        </div>
      </div>
    </div>
   </div>
   </div>

   <?php
      include('footer.php');
   ?>

  
</body>
</html>