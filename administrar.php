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
    <title>G.I.N.A - Administración</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/fa821c9639.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php
        include('navbar.php');
    ?>

    <div class="container margen-pagina-completa">
        <div class="list-group list-group-horizontal" id="acciones" role="tablist">
            <a class="list-group-item list-group-item-action list-group-item-info" id="accionInsertar" data-toggle="list" href="#insertar" role="tab" aria-controls="profile">Añadir un producto nuevo</a>
            <a class="list-group-item list-group-item-action list-group-item-info" id="accionActualizar" data-toggle="list" href="#actualizar" role="tab" aria-controls="messages">Actualizar un producto existente</a>
            <a class="list-group-item list-group-item-action list-group-item-info" id="accionEliminar" data-toggle="list" href="#eliminar" role="tab" aria-controls="settings">Eliminar un producto</a>
        </div>
        <div class="col-8 mt-5 ml-auto mr-auto">
            <div class="tab-content" id="accionesContenido">
                <div class="tab-pane fade" id="insertar" role="tabpanel" aria-labelledby="accionInsertar">
                <?php
                    $accion = 'insert';
                    include('form_admin.php');
                ?>
                </div>
                <div class="tab-pane fade" id="actualizar" role="tabpanel" aria-labelledby="accionActualizar">
                <?php
                    $accion = 'update';
                    include('form_admin.php');
                ?>
                </div>
                <div class="tab-pane fade" id="eliminar" role="tabpanel" aria-labelledby="accionEliminar">
                <?php
                    $accion = 'delete';
                    include('form_admin.php');
                ?>
                </div>
            </div>
        </div>
    </div>
    

    <?php
        include('footer.php');
    ?>
</body>
</html>