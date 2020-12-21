<?php
    $servidor = 'localhost';
    $cuenta = 'root';
    $password = '';
    $bd = 'tienda';

    $conexion = new mysqli($servidor, $cuenta, $password, $bd);

    if($conexion->connect_errno){
        die('Error: No se pudo establecer la conexión con la BD');
    }
?>