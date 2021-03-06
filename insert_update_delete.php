<?php
    if($_SERVER["REQUEST_METHOD"]=='POST'){
        session_start();
        include('php_mysql/conexion.php');

        $accion = $_POST["accion"];

        if($accion != 'delete'){
            $nombre = $_POST["nombre"];
            $categoria = $_POST["categoria"];
            $descripcion = $_POST["descripcion"];
            $precio = $_POST["precio"];
            $existencia = $_POST["existencia"];
            
            if(isset($_FILES['imagen'])){
                //Tomamos el nombre de la imagen
                $imagen = $_FILES['imagen']['name'];
                
                //Si la imagen existe
                if(isset($imagen) && $imagen != ""){
                    $tipo = $_FILES['imagen']['type'];  //extensión o tipo de archivo
                    $tam = $_FILES['imagen']['size'];  //tamaño del archivo
                    $nom_temp = $_FILES['imagen']['tmp_name'];  //nombre temporal que tiene en el servidor

                    //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
                    if(!((strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tam < 5000000))){
                        header("Location: administrar.php");
                    }
                    else {
                        //Subimos la imagen si tiene extensión y tamaño válidos
                        if(move_uploaded_file($nom_temp, 'img/' . basename($imagen))){
                            //Establecemos permisos 777 para evitar restricciones
                            chmod('img/' . $imagen, 0777);
                        }
                        else {
                            //Hubo error al subir la imagen
                            header("Location: administrar.php");
                        }
                    }
                }
            }

            if($accion=='insert'){
                $query = "SELECT * FROM producto WHERE Nombre = '$nombre'";
                $existe = $conexion->query($query);
                if(!($existe->num_rows)){
                    $query = "INSERT INTO producto (`Nombre`, `Categoria`, `Descripcion`, `Precio`, `Existencia`, `Imagen`)
                              VALUES ('$nombre', '$categoria', '$descripcion', '$precio', '$existencia', 'img/$imagen')";
                }
            }
            else{
                $nom_Actual = $_POST["nom_Actual"];
                $query = "UPDATE producto SET Nombre = '$nombre', Categoria = '$categoria', Descripcion = '$descripcion', 
                          Precio = '$precio', Existencia = '$existencia', Imagen = 'img/$imagen' WHERE Nombre = '$nom_Actual'";
            }
        }
        else{
            $nombre = $_POST["nombre"];
            $query = "DELETE FROM producto WHERE Nombre = '$nombre'";
            $_SESSION["msj_admin"] = 'El producto ha sido eliminado con éxito';
        }

        $conexion->query($query);

        if($accion=='insert' || $accion=='update'){
            $_SESSION["msj_admin"] = "La operación se realizó con éxito";
            if($categoria=='Ropa')
                header("Location: ropa.php");
            else
                header("Location: accesorios.php");
            exit();
        }
    }
    //Redireccionamos en cualquier caso hacia el index
    header("Location: index.php");
    exit();  //salimos del script
?>