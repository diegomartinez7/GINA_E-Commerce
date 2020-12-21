<?php
    include('conexion.php');
    session_start();

    if($_SERVER["REQUEST_METHOD"]=='POST'){
        $cuenta = $_POST["cuenta"];
        $clave = $_POST["clave"];  //DEBEMOS ENCRIPTARLA ANTES DE QUE SE COMPARE EN EL WHILE
        $captcha = strtolower($_POST["codigoCaptcha"]);  //$_SESSION['captcha_text']
        

        $query = "select * from usuario where cuenta='$cuenta'";
        $resultado = $conexion->query($query);

        //Si se mantiene en 0: El usuario no existía o existe y puso bien su contraseña
        if(!isset($_SESSION["intentos"])){
            $_SESSION["intentos"] = 0;
        }

        if($_SESSION["intentos"] != 40){
            while($tupla = $resultado->fetch_assoc()){
                if($tupla["Cuenta"]==$cuenta){
                    if($tupla["Clave"]==$clave){
                        //echo '<br>' . $_SESSION['captcha_text'];
                        //Se separa el captcha porque no es motivo de penalización
                        if($captcha==$_SESSION['captcha_text']){
                            $_SESSION['id'] = $tupla['ID'];
                            $_SESSION['nombre'] = $tupla['Nombre'];
                            $_SESSION['cuenta'] = $tupla['Cuenta'];
                            //echo $tupla['ID'];
                        }
                    }
                    else{
                        //Si cambia a 1: El usuario existe y puso mal su contraseña
                        $_SESSION["intentos"] += 1;
                    }
                }
            }
        }   
    }
    header("Location: index.php");
    exit();  //salimos del script
?>