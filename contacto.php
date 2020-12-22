<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>G.I.N.A</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/fa821c9639.js" crossorigin="anonymous"></script>
</head>
<body>
<!------------ Navbar -->
<?php
        include('navbar.php');
?>
<!------------ Buscador con AJAX -------------->
<div class="margen-pagina-completa">
  <div class="container">
    <p class="alert alert-info">En G.I.N.A estamos comprometidos con la autenticidad y la calidad de todos nuestros productos, si tienes alguna duda o queja, asi como una sugerencia, es de vital importancia que nos lo hagas saber.</p>
  </div>
  <h1 class="text-info" style="margin-left: 3%;">Contactanos</h1>
  <form id="form1" action="mail.php" method="post" style="width: 35%; margin-left: 3%;">
   <div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control" name="nombre" aria-describedby="nombre" placeholder="" required>
  </div>
  <div class="form-group">
    <label for="last">Apellidos</label>
    <input type="text" class="form-control" name="last" aria-describedby="last" placeholder="" required>
  </div>
  <div class="form-group">
    <label for="email1">Correo Electronico</label>
    <input type="email" class="form-control" name="email" aria-describedby="email" placeholder="" required>
  </div>
  <div class="form-group">
    <label for="secret">Contraseña</label>
    <input type="password" class="form-control" name="secret" aria-describedby="secret" placeholder="" required>
  </div>
  <div class="form-group">
    <label for="telefono">Telefono</label>
    <input type="text" class="form-control" name="telefono" aria-describedby="telefono" placeholder="" required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Comentarios</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="area" required></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>
<br>
<div class="alert alert-dark" role="alert" style="margin-left: 3%; width: 65%;">
  O si lo prefieres estamos ubicados en el Centro Comercial Altaria Boulevard a y Luis Donaldo Colosio
</div>

<br>
<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3595.8929872177832!2d-102.28966953429455!3d21.924528222641808!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2smx!4v1608512940618!5m2!1sen!2smx" width="400" height="300" frameborder="0" style="border:0; margin-left:3%;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
<br><br>
</div>
<?php
    include('footer.php');
?>
  
</body>
</html>