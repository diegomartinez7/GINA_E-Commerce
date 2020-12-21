<?php
    include('conexion.php');
    session_start();

    if($_SERVER["REQUEST_METHOD"]=='POST'){
        $cuenta = $_POST["cuenta"];
        $clave = $_POST["clave"];  //DEBEMOS ENCRIPTARLA ANTES DE QUE SE COMPARE EN EL WHILE
        $captcha = strtolower($_POST["codigoCaptcha"]);  //se convierte a minúsculas para comparar
        
        //Consulta para obtener el registro del usuario si es que existe
        $query = "select * from usuario where cuenta='$cuenta'";
        $resultado = $conexion->query($query);

        //Si se mantiene en 0: El usuario no existía o existe y puso bien su contraseña
        $_SESSION["intentos"] = 0;
        
        while($tupla = $resultado->fetch_assoc()){
            if($tupla["Cuenta"]==$cuenta){
                if($tupla["Clave"]==$clave){
                    //Se separa el captcha porque no es motivo de penalización
                    if($captcha==$_SESSION['captcha_text']){
                        $_SESSION['id'] = $tupla['ID'];
                        $_SESSION['nombre'] = $tupla['Nombre'];
                        $_SESSION['cuenta'] = $tupla['Cuenta'];
                    }

                    //No ha agotado los intentos, ingresa contraseña correcta pero mal captcha, le reiniciamos los intentos
                    if(intval($tupla["Habilitado"]) < 3){
                        $query = "update usuario set habilitado = 0 where cuenta = '$cuenta'";
                        $conexion->query($query);
                    }
                }
                else{
                    //Si aumentan los intentos: El usuario existe y puso mal su contraseña
                    $_SESSION["intentos"] = intval($tupla["Habilitado"]) + 1;

                    //Si sus intentos no han llegado a 3, los incrementamos en la BD
                    if($_SESSION["intentos"] <= 3){
                        $query = "update usuario set habilitado = " . $_SESSION['intentos'] . " where cuenta = '$cuenta'";
                        $conexion->query($query);
                    }
                    
                    //Si ya llegamos a 3 intentos en la BD, siempre obtendremos 3 y se sumará 1 para el valor de $_SESSION["intentos"]
                    if($_SESSION["intentos"]==4)
                        $_SESSION["intentos"] = 3;  //asignamos un 3 si se pasa, para mostrar un valor correcto en el alert al regresar
                }
            }
        }
    }
    //Redireccionamos en cualquier caso hacia el index
    header("Location: ../index.php");
    exit();  //salimos del script
?>