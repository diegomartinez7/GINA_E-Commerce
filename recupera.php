<?php
    // ----------------------- Script para validar que exista el usuario y si la clave es correcta -------------
    session_start();
    include('php_mysql/conexion.php');
    include('cadenaAleatoria.php');

    if($_SERVER["REQUEST_METHOD"] == 'POST'){
        $usuario = $_POST["usuario"];
        $clave = $_POST["clave"];

        // query para asegurarnos de recuperar los datos del usuario correcto
        $query = "select * from usuario where cuenta='$usuario' and respaldo='$clave'";

        $resultado = $conexion->query($query);

        while($tupla = $resultado->fetch_assoc()){
            if($tupla["Cuenta"] == $usuario){
                if($tupla["Respaldo"] == $clave){
                    // Aquí se efectuaría la llamada al correo
                    $contraNueva = randomText(6); // nueva contraseña que se va a envia por correo
                    
                    $encriptada = md5($contraNueva); // contraseña encriptada 
                    
                    $cuenta = $tupla["Cuenta"];
                    
                    $update = "update usuario set clave='$encriptada', habilitado=0 where cuenta='$cuenta'";

                    $_SESSION["nombreCorreo"] = $cuenta;
                    $_SESSION["claveCorreo"] = $contraNueva;
                  
                    
                    
                    $conexion ->query($update);

                    header("Location: correoContra.php");

                    
                }
            }
        }

    } 

?>