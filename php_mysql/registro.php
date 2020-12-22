<?php
    include('conexion.php');
    include('../cadenaAleatoria.php');

    if($_SERVER["REQUEST_METHOD"]=='POST'){
        //Obtenemos los valores del formulario de registro
        $nombre = $_POST["nombre"];
        $cuenta = $_POST["cuenta"];
        $clave = md5($_POST["contrasena"]);
        $correo = $_POST["correo"];
        //El campo de habilitado iría aquí pero se establece siempre en 0 en un registro nuevo
        $pais = $_POST["pais"];
        $ciudad = $_POST["ciudad"];
        $direccion = $_POST["direccion"];
        $cp = $_POST["cp"];
        $respaldo = $_POST["recuperar"];

        //Variable para saber si la cuenta de usuario y correo ya están registrados
        $existe = 0;

        //Seleccionamos únicamente la cuenta o el correo para saber si existen en algún registro
        $query = "SELECT Cuenta, Correo FROM usuario WHERE Cuenta = '$cuenta' OR Correo = '$correo'";
        $resultado = $conexion->query($query);

        //Si regresa un cierto número de columnas sabemos que sí existe la cuenta o correo registrado
        if($resultado->num_rows){
            //Definir algo para hacerle saber al usuario al regresar que la cuenta y correo ya existen
        }
        else{  //No había registros que coincidieran así que insertamos el nuevo registro
            $query = "INSERT INTO usuario (`Nombre`, `Cuenta`, `Clave`, `Correo`, `Habilitado`, `Pais`, `Direccion`, `Ciudad`, `CP`, `Respaldo`) 
                  VALUES ('$nombre','$cuenta','$clave','$correo',0,'$pais','$ciudad','$direccion','$cp','$respaldo')";
            $conexion->query($query);
            
            $desc = '';
            // ------------------------ nos aseguramos de generar un código distinto
            do{
                $descuento = randomText(6);
                $desc = $descuento;
                $queryDesc = "SELECT Codigo FROM cupones WHERE Codigo = '$descuento'";
                $result = $conexion->query($queryDesc);


            }while($result->num_rows);
            // .---------------------Vamos a buscar el ID del usuario nuevo para insertarlo en la tabla cupones
            $userQuery = $conexion->query("SELECT ID FROM usuario WHERE Cuenta='$cuenta'");
            
            $idUsuario = [];
            
            $first_row = $userQuery->fetch_assoc();
            
            $idUsuario= $first_row['ID'];
            
            while($sub_row = $userQuery->fetch_assoc()) {
                $idUsuario = implode('', array($idUsuario, $sub_row['ID']));
            }
            
            // ----------------- aqui enviamos a la tabla cupones un registro nuevo -----------
            $queryInserta = "INSERT INTO cupones (`Codigo`,`ID_Usuario`,`Disponible`) VALUES ('$desc','$idUsuario',0)";
            $conexion->query($queryInserta);


        }
    }

    //Redireccionamos hacia el index
    header("Location: ../index.php");  //CHECAR SI SE HACE UNA PÁGINA PARA CONFIRMAR QUE SE CREÓ EXITÓSAMENTE EL USUARIO
    exit();  //salimos del script
?>