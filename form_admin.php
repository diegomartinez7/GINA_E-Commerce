<?php
    if(session_status() == PHP_SESSION_NONE){
        //La sesión no ha sido iniciada así que la comenzamos
        session_start();
    }
    
    //Validamos que sólo el administrador pueda entrar a esta página
    if(!empty($_SESSION["cuenta"])){
        if($_SESSION["cuenta"] != 'Administrador'){
            header("Location: index.php");
        }
    }
    else {
        header("Location: index.php");
    }

    if(!isset($accion)){
        header("Location: index.php");
    }

    echo '<form action="php_mysql/insert_update_delete.php" method="post" enctype="multipart/form-data" class="bg-form p-3">
            <div class="form-group">
                <label for="nombre_Accion" class="h4">Nombre del producto:</label>
                <input type="text" class="form-control" id="nombre_Accion" name="nombre" required>
            </div>';

    if($accion=='insert' || $accion=='update'){
    echo    '<div class="form-group">';
        
        if($accion=='update'){
            echo '<div class="form-group">
                    <label for="actual_Accion" class="h4">Nombre actual del producto: <small>(a modificar)</small></label>
                    <input type="text" class="form-control" id="actual_Accion" name="nom_Actual" required>
                </div>';
        }

    echo        '<label for="categoria_Accion" class="h4">Categoría:</label>
                <select class="form-control" id="categoria_Accion" name="categoria" required>
                    <option value="" selected>Seleccione</option>
                    <option value="Ropa">Ropa deportiva</option>
                    <option value="Equipo_Accesorio">Equipo y accesorios</option>
                </select>
            </div>
            <div class="form-group">
                <label for="descripcion_Accion" class="h4">Descripción:</label>
                <input type="text" class="form-control" id="descripcion_Accion" name="descripcion" minlength="10" maxlength="80" required>
            </div>
            <div class="form-group d-flex mt-4" style="justify-content: space-between;">
                <div>
                    <label for="precio_Accion" class="h4 mr-2">Precio:</label>
                    <input type="number" id="precio_Accion" name="precio" min="15" max="10000" required>
                </div>
                <div>
                    <label for="existencia_Accion" class="h4 mr-2">Existencia:</label>
                    <input type="number" id="existencia_Accion" name="existencia" min="0" max="1000" required>
                </div>
                <div>
                    <label for="imagen" class="h4 mr-2">Imagen</label>
                    <input type="button" class="btn btn-info" value="Elegir archivo..." onclick="imagen.click()">
                    <input type="file" id="imagen" name="imagen" style="display: none;" required>
                </div>
            </div>';
    }

    echo    '<input type="hidden" name="accion" value="' . $accion . '">
            <button class="btn btn-warning btn-block" type="submit">Realizar movimiento</button>
        </form>';
?>